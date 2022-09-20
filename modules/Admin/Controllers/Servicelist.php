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
use App\Models\Cities as Cities_Model;
use App\Models\Locations as Locations_Model;
use App\Models\Company_Users as Company_Users;
use App\Models\Services_Model as Services_Model;
use App\Models\Category_Db as Category_Db;
use App\Models\Product_info_db as Product_info_db;








class Servicelist extends BaseController
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
        $this->cities_model = new Cities_Model;
        $this->locations_model = new Locations_Model;
        $this->company_users = new Company_Users;
        $this->services_model = new Services_Model;
        $this->category_db = new Category_Db;
        $this->product_info_db = new Product_info_db;
        $this->request = \Config\Services::request();
        helper(['form', 'url', 'string']);
       
    }



    public function index()
    {
    
        $this->session = session();
        $this->data = ['session' => $this->session, 'request' => $this->request];
        $session = session();
        $data['user_data'] = [];
        $pot = json_decode(json_encode($session->get('userdata')), true);
        // echo '<pre>';
        // print_r($pot[0]);
        // exit;
        if (empty($pot[0])) {
            return   redirect()->to('/Auth/index');
        } else {
            $user_id = $pot[0]['user_id'];
            $role_id = $pot[0]['role_id'];
        }
    
        $this->admin_roles_accesses_model->primary_key = array('role_id' => $role_id);
        $this->admin_users_model->primary_key = array('user_id' => $user_id);
        $user_session_id = $this->admin_users_model->session_id();
        if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
            redirect('');
        } else {
            $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);
    
            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
        }
        $session = session();
        $data['session'] = $session;
        $data['role_id'] = $role_id;
        $data['user_id'] = $user_id;
        $data['title'] = 'Service Details';
        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
        $data['company'] = $this->company_users->orderBy('company_user_id', 'DESC')->findAll();
        $data['services'] = $this->services_model->viewcompany();
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New Service';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this->request->uri->getSegment(1);
       
    //  echo '<pre>';
    //  print_r($data);
    //  exit;
        return view('Modules\Admin\Views\pages\servicestwo\servicelist', $data);
    
    
    }



    public function addNewServices(){
        $this->session = session();
        $this->data = ['session' => $this->session, 'request' => $this->request];
        $session = session();
        $data['user_data'] = [];
        $pot = json_decode(json_encode($session->get('userdata')), true);
        // echo '<pre>';
        // print_r($pot[0]);
        // exit;
        if (empty($pot[0])) {
            return   redirect()->to('/Auth/index');
        } else {
            $user_id = $pot[0]['user_id'];
            $role_id = $pot[0]['role_id'];
        }

        $this->admin_roles_accesses_model->primary_key = array('role_id' => $role_id);
        $this->admin_users_model->primary_key = array('user_id' => $user_id);
        $user_session_id = $this->admin_users_model->session_id();
        if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
            redirect('');
        } else {
            $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
        }
     
        $data['session'] = $session;
        $data['title'] = 'Add Service Details';
        $data['pade_title2'] = 'Select Company Name';
        $data['pade_title1'] = 'Add Services Description';
        $data['pade_title3'] = 'Add Service  Name';
        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
        $data['company'] = $this->company_users->orderBy('company_user_id', 'DESC')->findAll();
        $data['category'] = $this->category_db->orderBy('id', 'DESC')->findAll();
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New Services';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this->request->uri->getSegment(1);
        return view('Modules\Admin\Views\pages\servicestwo\addnewservicestwo', $data);
    }




    public function savenewserviceinfo(){
        $session = session();
        $data = [];
        $pot = json_decode(json_encode($session->get('userdata')), true);
        if (empty($pot[0])) {
                return   redirect()->to('/Auth/index');
        } else {
                $user_id = $pot[0]['user_id'];
                $role_id = $pot[0]['role_id'];
        }
    
        $this->admin_users_model->primary_key = array('user_id' => $user_id);
        $user_session_id = $this->admin_users_model->session_id();
        if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                redirect('');
        } else {
                $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);
    
                $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
        }
    
    
        helper(['form', 'url']);
    
        $db      = \Config\Database::connect();
        $builder = $db->table('services');
    
     
        if ($this->request->getMethod() == 'post') {
                extract($this->request->getPost());
        }
    
        $input = $this->validate(['service_name' => 'required|min_length[3]', 'editor1' => 'required|min_length[10]', 'serviceduration' => 'required', 'status_ind' => 'required']);
    
    // echo '<pre>';
    // print_r($this->request->getPost());
    // exit;
    
    
       
            if (!empty($input)) {
                $validated = $this->validate([
                    'file' => [
                            'uploaded[file]',
                            'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                            'max_size[file,4096]',
                    ],
            ]);
            if (!empty($service_id_hidd)) {
                if ($validated) {
                        $avatar = $this->request->getFile('file');
                        //$avatar->move(WRITEPATH . 'uploads');
    
                        if ($avatar->isValid() && !$avatar->hasMoved()) {
    
    
                                $name = $avatar->getName();
                                $ext = $avatar->getClientExtension();
                                $avatar->move('uploads/', $name);
                                //$avatar->move(WRITEPATH . 'uploads', $name);
                                $filepath = base_url()."/uploads/".$name;
                                // File path to display preview
                               // $filepath = WRITEPATH . "uploads";
                                session()->setFlashdata('filepath', $filepath);
                                session()->setFlashdata('extension', $ext);
                        }
    
    
                        $data = [
    
                            'Service_thumbnail' =>  $avatar->getClientName(),
                            'Services' => $service_name,
                            'addservicesdescription' => $editor1,
                            'duration' => $serviceduration,
                            'status_ind' =>  $status_ind,
                            'created_at' => date('Y-m-d'),
                            'added_by' =>  $pot[0]['user_id']
                    ];
    
    
    
    
                        $update = $this->services_model->where('id', $service_id_hidd)->set($data)->update();
                        if ($update) {
                                $status = true;
                                $udata = [];
                                $session->setFlashdata('success', 'Product Data has been updated');
                        } else {
                                $session->setFlashdata('error', 'Product Failed to update');
                        }
                } else {
                       
                    $data = [
    
                       
                        'Services' => $service_name,
                        'addservicesdescription' => $editor1,
                        'duration' => $serviceduration,
                        'status_ind' =>  $status_ind,
                        'created_at' => date('Y-m-d'),
                        'added_by' =>  $pot[0]['user_id']
                ];
                 $update = $this->services_model->where('id', $service_id_hidd)->set($data)->update();
    
    
                        if ($update) {
                                $status = true;
                                $udata = [];
                                $session->setFlashdata('success', 'Product Data has been updated');
                        } else {
                                $session->setFlashdata('error', 'Product Failed to update');
                        }
                }
        } else{
    
    
    
        if ($validated) {
            $avatar = $this->request->getFile('file');
            //$avatar->move(WRITEPATH . 'uploads');
    
            if ($avatar->isValid() && !$avatar->hasMoved()) {
    
    
                    $name = $avatar->getName();
                    $ext = $avatar->getClientExtension();
                    $avatar->move('uploads/', $name);
                    //$avatar->move(WRITEPATH . 'uploads', $name);
                    $filepath = base_url()."/uploads/".$name;
    
                   
                    // File path to display preview
                   // $filepath = WRITEPATH . "uploads";
    
                    session()->setFlashdata('filepath', $filepath);
                    session()->setFlashdata('extension', $ext);
            }
    
    
            $data = [
    
                'Service_thumbnail' =>  $avatar->getClientName(),
                'Services' => $service_name,
                'addservicesdescription' => $editor1,
                'duration' => $serviceduration,
                'status_ind' =>  $status_ind,
                'created_at' => date('Y-m-d'),
                'added_by' =>  $pot[0]['user_id']
        ];

            $save = $builder->insert($data);
            if( $save){
                $session->setFlashdata('success', 'Product Saved Successsfully');
            }else{
                $session->setFlashdata('error', 'Product Failed to Save');
            }
          
    } else {
            $session->setFlashdata('error', 'Please select a valid file');
    }
        }
    
    }else {
        $session->setFlashdata('error', 'Fill All Fields');
    }
   
    return redirect('servicelist');
    
    }



    public function edit_service($id=''){


        $this->session = session();
        $this->data = ['session' => $this->session, 'request' => $this->request];
        $session = session();
        $data['user_data'] = [];
        $pot = json_decode(json_encode($session->get('userdata')), true);
        // echo '<pre>';
        // print_r($pot[0]);
        // exit;
        if (empty($pot[0])) {
            return   redirect()->to('/Auth/index');
        } else {
            $user_id = $pot[0]['user_id'];
            $role_id = $pot[0]['role_id'];
        }

        $this->admin_roles_accesses_model->primary_key = array('role_id' => $role_id);
        $this->admin_users_model->primary_key = array('user_id' => $user_id);
        $user_session_id = $this->admin_users_model->session_id();
        if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
            redirect('');
        } else {
            $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
        }
        $data['session'] = $session;
        $data['title'] = 'Edit Services Details';
        $data['pade_title2'] = 'Edit Company Name';
        $data['pade_title1'] = 'Edit Sevices';
        $data['pade_title3'] = 'Edit Service  Name';
        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
        $data['company'] = $this->company_users->orderBy('company_user_id', 'DESC')->findAll();
        $data['query'] = $this->services_model->get_row($id);
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Edit Sevice Thumbnail';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this->request->uri->getSegment(1);
        //  echo '<pre>';
        // print_r($data);
        // exit;
        return view('Modules\Admin\Views\pages\servicestwo\addnewservicestwo', $data);

    }


    public function service_delete($id=''){
        $this->session = session();
            $this->data = ['session' => $this->session, 'request' => $this->request];
            $session = session();
            $data['user_data'] = [];
            $pot = json_decode(json_encode($session->get('userdata')), true);
            // echo '<pre>';
            // print_r($pot[0]);
            // exit;
            if (empty($pot[0])) {
                return   redirect()->to('/Auth/index');
            } else {
                $user_id = $pot[0]['user_id'];
                $role_id = $pot[0]['role_id'];
            }
    
            $this->admin_roles_accesses_model->primary_key = array('role_id' => $role_id);
            $this->admin_users_model->primary_key = array('user_id' => $user_id);
            $user_session_id = $this->admin_users_model->session_id();
            if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                redirect('');
            } else {
                $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);
    
                $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
            }
        $data['session'] = $session;
        $data['title'] = 'Service Details';
        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
        $data['services'] = $this->services_model->viewcompany();
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New Service';
        $delete = $this->services_model->where('id', $id)->delete();
        if($delete){
            $session->setFlashdata('success', 'Deleted Successfully');
        }
        else{
            $session->setFlashdata('error', 'Failed to Delete');
        }
        $data['request'] = $this->request;
        $data['menuslinks'] = $this->request->uri->getSegment(1);
       
    //  echo '<pre>';
    //  print_r($data);
    //  exit;
    return redirect("servicelist");
    
    }


}