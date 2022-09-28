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
use App\Models\Company_Users as Company_Users;
use App\Models\Services_Model as Services_Model;

class Addcompanylist extends BaseController
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
        $this->company_users = new Company_Users;
        $this->services_model = new Services_Model;
        $this->request = \Config\Services::request();
        helper(['form', 'url', 'string']);

    }

    public function index()
    {

        $this->session = session();
        $this->data = ['session' => $this->session, 'request' => $this->request];
        $session = session();
        $data['user_data'] = [];
        $pot = json_decode(json_encode($session->get('userdata')) , true);
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
        $data['session'] = $session;
        $data['title'] = 'Company Details';
        $data['company'] = $this
            ->company_users
            ->viewcompany();
          
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New Company';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this
            ->request
            ->uri
            ->getSegment(1);
        //          echo '<pre>';
        // print_r($data);
        // exit;
        return view('Modules\Admin\Views\pages\companylist\companylist', $data);
    }

    public function addNewCompany()
    {

        $this->session = session();
        $this->data = ['session' => $this->session, 'request' => $this->request];
        $session = session();
        $data['user_data'] = [];
        $pot = json_decode(json_encode($session->get('userdata')) , true);
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
        $data['city'] = $this
            ->cities_model
            ->orderBy('id', 'DESC')
            ->findAll();
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
        $data['session'] = $session;
        $data['role_id'] = $role_id;
        $data['title'] = 'Add Company Details';
        $data['title2'] = 'Add Company Image';
        $data['title3'] = 'Add Company Location';
        $data['pade_title'] = 'Add Company Name';
        $data['roles'] = $this
            ->admin_roles_model
            ->orderBy('role_id', 'DESC')
            ->findAll();
        $data['company'] = $this
            ->company_users
            ->orderBy('company_user_id', 'DESC')
            ->findAll();
            $data['services'] = $this
            ->services_model
            ->orderBy('id', 'DESC')
            ->findAll();
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New Company';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this
            ->request
            ->uri
            ->getSegment(1);
        return view('Modules\Admin\Views\pages\companylist\addnewcompany', $data);

    }

    public function depedentselecttwo()
    {

        $request = service('request');
        helper(['form', 'url', 'validation']);
        $data = array();

        $postData = array(
            'city' => $this
                ->request
                ->getPost('city') ,
        );

        $data = $this
            ->locations_model
            ->dependentdata($postData);

        echo json_encode($data);

    }

    public function savenewcompany()
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


        if ($this
            ->request
            ->getMethod() == 'post')
        {
            extract($this
                ->request
                ->getPost());
        }
        // echo '<pre>';
        // print_r($this
        // ->request
        // ->getPost());
        // exit;

        $input = $this->validate(['first_name' => 'required|min_length[3]', 'email' => 'required|valid_email', 'phone_number' => 'required|numeric|regex_match[/^[0-9]{10}$/]', 'status_ind' => 'required', 'role_id' => 'required', 'customer_location_id' => 'required']);
       
        if (!empty($input))
        {
                $validated = $this->validate(['file' => ['uploaded[file]', 'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]', 'max_size[file,4096]', ], ]);

                
            if (!empty($company_id_hidd))
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

                    if ($password !== $cpassword)
                    {
                        $session->setFlashdata('error', "Password does not match.");
                    }
                    else
                    {

                        $data = [

                        'profile_pic' => $avatar->getClientName() , 'company_name' => $first_name, 'phone_number' => $phone_number, 'company_email' => $email, 'role_id' => $role_id, 'status_ind' => $status_ind, 'created_date' => date('Y-m-d') , 'created_by' => $user_id, 'company_id' => rand(1000, 9999) , 'customer_location_id' => $customer_location_id

                        ];
                        if (!empty($password))
                        {
                            $data['password'] = md5($password);
                        }
                        if (!empty($location))
                        {
                            
                            $data['customer_city_branches_id'] = implode(', ', $location);
                        }
                        if(!empty($company_service_id)){
                            $data['company_service_id'] = implode(', ', $service_id);
                        }

                        $checkMail = $this
                            ->company_users
                            ->where('company_email', $email)->where('company_user_id!=', $company_id_hidd)->countAllResults();
                        if ($checkMail > 0)
                        {
                            $session->setFlashdata('error', "User Email Already Taken.");
                        }
                        else
                        {

                            $update = $this
                                ->company_users
                                ->where('company_user_id', $company_id_hidd)->set($data)->update();
                                if (!empty($update)) {
                                       
                               
                                       
                                        foreach ($service_id as $key => $sid) {
                                            if (empty($service_id[$key])) {
                    
                                                    unset($service_id[$key]);
                                            }
                                    }
            
                                    foreach ($service_id as $locations) {
                                               
                                        $data = [
                                            'company_id'                => $company_id_hidd,
                                        ];
                                 
            
                                       
                                        $update = $this->services_model->where('id', $locations)->set($data)->update();
                                      
                                    }
                        
                                                        if ($update)
                                                        {
                                                            $session->setFlashdata('success', 'Saved Successfully');
                                                        }
                                                        else
                                                        {
                                                            $session->setFlashdata('error', 'Service Details has failed to save.');
                                                        }
                                                    
                                      
                                }
                                else{
                                        $session->setFlashdata('error', 'Failed to Update'); 
                                }
                        }
                    }

           
                }
                else
                {

                        if ($password !== $cpassword)
                        {
                            $session->setFlashdata('error', "Password does not match.");
                        }
                        else
                        {
    
                            $data = [
    
                             'company_name' => $first_name, 'phone_number' => $phone_number, 'company_email' => $email, 'role_id' => $role_id, 'status_ind' => $status_ind, 'created_date' => date('Y-m-d') , 'created_by' => $user_id, 'company_id' => rand(1000, 9999) , 'customer_location_id' => $customer_location_id
    
                            ];
                            if (!empty($password))
                            {
                                $data['password'] = md5($password);
                            }
                            if (!empty($location))
                            {
                                
                                $data['customer_city_branches_id'] = implode(', ', $location);
                            }

                            if(!empty($service_id)){
                                $data['company_service_id'] = implode(', ', $service_id);
                            }
                            // echo '<pre>';
                            // print_r($data);
                            // exit;
    
                            $checkMail = $this
                                ->company_users
                                ->where('company_email', $email)->where('company_user_id!=', $company_id_hidd)->countAllResults();
                            if ($checkMail > 0)
                            {
                                $session->setFlashdata('error', "User Email Already Taken.");
                            }
                            else{
                                $update = $this
                                ->company_users
                                ->where('company_user_id', $company_id_hidd)->set($data)->update();
                                if (!empty($update)) {
                                       
                               
                                       
                                    foreach ($service_id as $key => $sid) {
                                        if (empty($service_id[$key])) {
                
                                                unset($service_id[$key]);
                                        }
                                }
                              
                                $null = [
                                    'company_id'                => '',
                                ];
                                $update = $this->services_model->where('company_id', $company_id_hidd)->set($null)->update();
                                foreach ($service_id as $locations) {
                                           
                                    $data = [
                                        'company_id'                => $company_id_hidd,
                                    ];
                                    
                             
                                    // echo '<pre>';
                                    // print_r($locations);
                                    // exit;
                                  
                                    $update = $this->services_model->where('id', $locations)->set($data)->update();
                                  
                                }
                    
                                                    if ($update)
                                                    {
                                                        $session->setFlashdata('success', 'Saved Successfully');
                                                    }
                                                    else
                                                    {
                                                        $session->setFlashdata('error', 'Service Details has failed to save.');
                                                    }
                                                
                                  
                            }
                                else{
                                        $session->setFlashdata('error', 'Failed to Update'); 
                                }
                            }
                  
                }
            }
        }
            else
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

                    'profile_pic' => $avatar->getClientName() , 'company_name' => $first_name, 'phone_number' => $phone_number, 'company_email' => $email, 'role_id' => $role_id, 'status_ind' => $status_ind, 'created_date' => date('Y-m-d') , 'created_by' => $user_id, 'company_id' => rand(1000, 9999) , 'customer_location_id' => $customer_location_id , 'customer_city_branches_id' => implode(', ', $location) , 'company_service_id' => implode(', ', $service_id) 

                    ];

                    if (!empty($password))
                    {
                        $data['password'] = md5($password);
                    }

                    $checkMail = $this
                        ->company_users
                        ->where('company_email', $email)->where('phone_number', $phone_number)->countAllResults();
                    $checkEmployee_id = $this
                        ->company_users
                        ->where('company_id', $data['company_id'])->countAllResults();
                    if ($checkMail > 0)
                    {
                        $session->setFlashdata('error', "User Email Already Taken.");
                    }
                    else
                    {
                        
                        $save = $this
                            ->company_users
                            ->dataInsert($data);
                        if ($save)
                        {
                            foreach ($service_id as $key => $sid) {
                                if (empty($service_id[$key])) {
        
                                        unset($service_id[$key]);
                                }
                        }

                        foreach ($service_id as $locations) {
                                   
                            $data = [
                                'company_id'                => $save,
                            ];
                     

                           
                            $update = $this->services_model->where('id', $locations)->set($data)->update();
                          
                        }
                            $session->setFlashdata('success', 'Saved Successfully');
                        }
                        else
                        {
                            $session->setFlashdata('error', 'Company Details has failed to save.');
                            $data['session'] = $session;
                            $data['pade_title'] = 'Admin Dashboard - ';
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
                            return view('Modules\Admin\Views\pages\addnewcompany', $data);
                        }
                    }

                }
                else
                {
                    $session->setFlashdata('error', 'Please select a valid file');
                }
            }

        }
        else
        {
            $session->setFlashdata('error', 'Enter All Fields');
        }

        return redirect('companylist');
        // return redirect()->to(base_url('Modules\Admin\Views\pages\addnewcars'))->with('msg', $data);
        
    }

    public function company_edit($id = '')
    {
        if ($id == null)
        {
            return redirect('Admindashboard');
        }
        else
        {

            $this->session = session();
            $this->data = ['session' => $this->session, 'request' => $this->request];
            $session = session();
            $data['user_data'] = [];
            $pot = json_decode(json_encode($session->get('userdata')) , true);
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
            $data['city'] = $this
                ->cities_model
                ->orderBy('id', 'DESC')
                ->findAll();
                $data['services'] = $this
                ->services_model
                ->orderBy('id', 'DESC')
                ->findAll();
                $data['locates'] = $this
                ->locations_model
                ->orderBy('location_id', 'DESC')
                ->findAll();
                $data['services'] = $this
                ->services_model
                ->orderBy('id', 'DESC')
                ->findAll();
            $data['query'] = $this
                ->company_users
                ->get_row($id);
                // echo '<pre>';
                // print_r( $data['query']);
                // exit;

            $data['session'] = $session;
            $data['title'] = 'Add Company Details';
            $data['title2'] = 'Add Company Image';
            $data['title3'] = 'Add Company Location';
            $data['pade_title'] = 'Add Company Name';
            $data['roles'] = $this
                ->admin_roles_model
                ->orderBy('role_id', 'DESC')
                ->findAll();
            $data['company'] = $this
                ->company_users
                ->orderBy('company_user_id', 'DESC')
                ->findAll();
            // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
            $data['page_heading'] = 'Add New Company';
            $data['request'] = $this->request;
            $data['menuslinks'] = $this
                ->request
                ->uri
                ->getSegment(1);

            return view('Modules\Admin\Views\pages\companylist\addnewcompany', $data);
        }
    }

    public function company_delete($id = '')
    {

        $this->session = session();
        $this->data = ['session' => $this->session, 'request' => $this->request];
        $session = session();
        $data['user_data'] = [];
        $pot = json_decode(json_encode($session->get('userdata')) , true);
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
        $data['session'] = $session;
        $data['title'] = 'Companyy Details';
        $data['company'] = $this
            ->company_users
            ->viewcompany();
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New Company';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this
            ->request
            ->uri
            ->getSegment(1);
        $delete = $this
            ->company_users
            ->where('company_user_id', $id)->delete();
        if ($delete)
        {
            $null = [
                'company_id'                => '',
            ];
            $deletetwo = $this->services_model->where('company_id', $id)->set($null)->update();
           
            if ($deletetwo)
            {
                $session->setFlashdata('success', 'Company and Services has been deleted successfully.');
            }
            else
            {
                $session->setFlashdata('error', 'Company and Services failed due to unknown ID.');
            }
        }
        else
        {
            $session->setFlashdata('error', 'Company and Services failed due to unknown ID.');
        }

        //  echo '<pre>';
        //  print_r($data);
        //  exit;
        return redirect("companylist");

    }

}

