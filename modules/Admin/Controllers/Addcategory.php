<?php

namespace Modules\Admin\Controllers;

use Modules\Admin\Controllers\BaseController;

use App\Models\Admin_Users as Admin_Users_Model;
use App\Models\Admin_Roles as Admin_Roles_Model;
use App\Models\Admin_Menuitems as Admin_Menuitems_Model;
use App\Models\Admin_Roles_Accesses_Model as Admin_Roles_Accesses_Model;
use App\Models\Admin_Users_Accesses_Model as Admin_Users_Accesses_Model;
use App\Models\Settings_Model as Settings_Model;
use App\Models\Cars_Db as Cars_Db_Model;
use App\Models\Category_Db as Category_Db_Model;
use App\Models\Cities as Cities_Model;
use App\Models\Locations as Locations_Model;

class Addcategory extends BaseController
{

    public function __construct()
    {
        $this->admin_users_model = new Admin_Users_Model;
        $this->admin_roles_model = new Admin_Roles_Model;
        $this->settings_model = new Settings_Model;
        $this->admin_roles_accesses_model = new Admin_Roles_Accesses_Model;
        $this->admin_users_accesses_model = new Admin_Users_Accesses_Model;
        $this->admin_menuitems_model = new Admin_Menuitems_Model;
        $this->cars_db_model = new Cars_Db_Model;
        $this->category_db_model = new Category_Db_Model;
        $this->cities_model = new Cities_Model;
        $this->locations_model = new Locations_Model;
        $this->request = \Config\Services::request();
        helper(['form', 'url', 'string']);
        $this->session = session();
        $this->data = ['session' => $this->session, 'request' => $this->request];
        $session = session();
        $data['user_data'] = [];
        $pot = json_decode(json_encode($session->get('userdata')) , true);
        // echo '<pre>';
        // print_r($pot[0]);
        // exit;
        if (empty($pot[0]))
        {
            return redirect()->to('/Auth/index');
        }
        else
        {
            $user_id = $pot[0]['user_id'];
            $role_id = $pot[0]['role_id'];
        }
        $this
            ->admin_roles_accesses_model->primary_key = array(
            'role_id' => $role_id
        );
        $this
            ->admin_users_model->primary_key = array(
            'user_id' => $user_id
        );
        $user_session_id = $this
            ->admin_users_model
            ->session_id();
        if (empty($user_id) && $this
            ->session
            ->userdata['logged_session_id'] != md5($user_session_id))
        {
            redirect('');
        }
        else
        {
            $side_menu_roles = $this
                ->admin_roles_accesses_model
                ->get_role_access($role_id);

            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
        }
    }

    public function index()
    {
        $session = session();
        $data['session'] = $session;
        $data['title'] = 'Category Details';
        $data['roles'] = $this
            ->admin_roles_model
            ->orderBy('role_id', 'DESC')
            ->findAll();
        $data['category'] = $this
            ->category_db_model
            ->orderBy('id', 'DESC')
            ->findAll();
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New Category';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this
            ->request
            ->uri
            ->getSegment(1);

        //  echo '<pre>';
        //  print_r($data);
        //  exit;
        return view('Modules\Admin\Views\pages\category\categorylist', $data);
    }

    public function addNewCategory()
    {

        $session = session();
        $data['session'] = $session;
        $data['title'] = 'Add Category Details';
        $data['title2'] = 'Add Category Image';
        $data['title3'] = 'Add Category Description';
        $data['pade_title'] = 'Add Category Name';
        $data['roles'] = $this
            ->admin_roles_model
            ->orderBy('role_id', 'DESC')
            ->findAll();
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New Users';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this
            ->request
            ->uri
            ->getSegment(1);
        return view('Modules\Admin\Views\pages\category\addnewcategory', $data);

    }

    public function savenewcategories()
    {

        $session = session();
        $data = [];
        $pot = json_decode(json_encode($session->get('userdata')) , true);
        // echo '<pre>';
        // print_r($pot[0]);
        // exit;
        if (empty($pot[0]))
        {
            return redirect()->to('/Auth/index');
        }
        else
        {
            $user_id = $pot[0]['user_id'];
            $role_id = $pot[0]['role_id'];
        }
        helper(['form', 'url']);

        $db = \Config\Database::connect();
        $builder = $db->table('category');

        $validated = $this->validate(['file' => ['uploaded[file]', 'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]', 'max_size[file,4096]', ], ]);

        if ($this
            ->request
            ->getMethod() == 'post')
        {
            extract($this
                ->request
                ->getPost());
        }

        $input = $this->validate(['category_name' => 'required|min_length[3]', 'category_description' => 'required|min_length[10]']);

        if (!empty($category_id_hidd))
        {
            if ($validated)
            {
                $avatar = $this
                    ->request
                    ->getFile('file');
                //$avatar->move(WRITEPATH . 'uploads');
                if ($avatar->isValid() && !$avatar->hasMoved())
                {

                    $name = $avatar->getName();
                    $ext = $avatar->getClientExtension();
                    $avatar->move('uploads/', $name);
                    //$avatar->move(WRITEPATH . 'uploads', $name);
                    $filepath = base_url() . "/uploads/" . $name;

                    // File path to display preview
                    // $filepath = WRITEPATH . "uploads";
                    session()->setFlashdata('filepath', $filepath);
                    session()->setFlashdata('extension', $ext);
                }

                $data = [

                'category_image' => $avatar->getClientName() , 'category_name' => $category_name, 'category_description' => $category_description, 'created_at' => date('Y-m-d') , 'created_by' => $user_id

                ];

                $update = $this
                    ->category_db_model
                    ->where('id', $category_id_hidd)->set($data)->update();
                if ($update)
                {
                    $status = true;
                    $udata = [];
                    $session->setFlashdata('success', 'Data has been updated');
                }
                else
                {
                    $session->setFlashdata('error', 'Failed to update');
                }
            }
            else
            {
                $data = [

                'category_name' => $category_name, 'category_description' => $category_description, 'created_at' => date('Y-m-d') , 'created_by' => $user_id, ];

                $update = $this
                    ->category_db_model
                    ->where('id', $category_id_hidd)->set($data)->update();

                if ($update)
                {
                    $status = true;
                    $udata = [];
                    $session->setFlashdata('success', 'Data has been updated');
                }
                else
                {
                    $session->setFlashdata('error', 'Failed to update');
                }
            }
        }
        else
        {

            if (!empty($input))
            {
                if ($validated)
                {
                    $avatar = $this
                        ->request
                        ->getFile('file');
                    //$avatar->move(WRITEPATH . 'uploads');
                    if ($avatar->isValid() && !$avatar->hasMoved())
                    {

                        $name = $avatar->getName();
                        $ext = $avatar->getClientExtension();
                        $avatar->move('uploads/', $name);
                        //$avatar->move(WRITEPATH . 'uploads', $name);
                        $filepath = base_url() . "/uploads/" . $name;
                        // File path to display preview
                        // $filepath = WRITEPATH . "uploads";
                        session()->setFlashdata('filepath', $filepath);
                        session()->setFlashdata('extension', $ext);
                    }

                    $data = [

                    'category_image' => $avatar->getClientName() , 'category_name' => $category_name, 'category_description' => $category_description, 'created_at' => date('Y-m-d') , 'created_by' => $user_id

                    ];

                    $save = $builder->insert($data);
                    $session->setFlashdata('success', 'File has been uploaded');
                }
                else
                {
                    $session->setFlashdata('error', 'Please select a valid file');
                }
            }
            else
            {
                $session->setFlashdata('error', 'Enter All Fields');
            }
        }

        return redirect('category');
        // return redirect()->to(base_url('Modules\Admin\Views\pages\addnewcars'))->with('msg', $data);
        
    }

    public function category_edit($id = '')
    {
        if ($id == null)
        {
            return redirect('Admindashboard');
        }
        else
        {

            $this->global['pageTitle'] = 'CodeInsect : Edit Categories';
            $session = session();
            $data['title'] = 'Edit Category Details';
            $data['title2'] = 'Edit Category Image';
            $data['title3'] = 'Edit Category Description';
            $data['pade_title'] = 'Edit Category Name';
            $data['session'] = $session;
            $data['query'] = $this
                ->category_db_model
                ->get_row($id);
            $data['roles'] = $this
                ->admin_roles_model
                ->orderBy('role_id', 'DESC')
                ->findAll();
            // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
            $data['page_heading'] = 'edit  Categories';
            $data['request'] = $this->request;
            $data['menuslinks'] = $this
                ->request
                ->uri
                ->getSegment(1);
            //    echo '<pre>';
            // print_r($data);
            // exit;
            return view('Modules\Admin\Views\pages\category\addnewcategory', $data);
        }
    }

    public function category_delete($id = '')
    {
        $session = session();
        $data['session'] = $session;
        $data['title'] = 'Add Category Details';
        $data['title2'] = 'Add Category Image';
        $data['title3'] = 'Add Category Description';
        $data['pade_title'] = 'Add Category Name';
        $data['roles'] = $this
            ->admin_roles_model
            ->orderBy('role_id', 'DESC')
            ->findAll();
        $data['cities'] = $this
            ->cities_model
            ->viewcities();
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New Cities';
        $delete = $this
            ->category_db_model
            ->where('id', $id)->delete();
        if ($delete)
        {

            $session->setFlashdata('success', 'Category has been deleted successfully.');

        }
        else
        {
            $session->setFlashdata('error', 'Category Deleting failed  due to unknown ID.');
        }
        $data['request'] = $this->request;
        $data['menuslinks'] = $this
            ->request
            ->uri
            ->getSegment(1);

        return redirect("category");

    }

}

