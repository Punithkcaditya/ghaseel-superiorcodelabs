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







class Addservices extends BaseController
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
        $data['title'] = 'Service Details';
        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
        $data['services'] = $this->services_model->viewcompany();
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New Service';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this->request->uri->getSegment(1);
       
    //  echo '<pre>';
    //  print_r($data);
    //  exit;
        return view('Modules\Admin\Views\pages\services\servicelist', $data);
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
        $data['pade_title1'] = 'Add Services';
        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
        $data['company'] = $this->company_users->orderBy('company_user_id', 'DESC')->findAll();
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New Services';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this->request->uri->getSegment(1);
        return view('Modules\Admin\Views\pages\services\addnewservices', $data);
    }




    public function savenewservices()
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

        if ($user_id  == 1 || $user_id  == 2) {
            if ($this->request->getMethod() == 'post') {
                extract($this->request->getPost());
                $input = $this->validate([
                    
                    'services' => 'required',
                ]);


                if (!empty($input)) {

                    if (!empty($service_id_hidd)) {
                        // echo '<pre>';
                        // print_r($city_id_hidd);
                        // exit;
                     
                            $udata = [];
                              
                                foreach ($services as $key => $sid) {
                                    if (empty($services[$key])) {
            
                                            unset($services[$key]);
                                    }
                            }
                                  
                                    foreach ($services as $servicesind) {
                                   
                                        $data = [
                                            'Services'                => $servicesind,
                                            'status_ind'            => 1,
                                            'created_date' => date('Y-m-d'),
                                            'added_by' =>  $pot[0]['user_id']
        
                                        ];
                             
    
                                  
                                    $update = $this->services_model->where('id',$service_id_hidd)->set($data)->update();
                                    if ($update) {
                                        $status = true;
                                        $session->setFlashdata('success', 'Updated Successfully');
                                    } else {
                                        $session->setFlashdata('error', 'Failed to Update'); 
                                    }
                                }
                           

                    }


                    else{

             
                        $udata = [];
                       

                            foreach ($services as $key => $sid) {
                                if (empty($services[$key])) {
        
                                        unset($services[$key]);
                                }
                        }
                              
                                foreach ($services as $servicesind) {
                               
                                $data = [
                                    'Services'                => $servicesind,
                                    'status_ind'            => 1,
                                    'created_date' => date('Y-m-d'),
                                    'added_by' =>  $pot[0]['user_id']

                                ];
                            

                                $saved = $this->services_model->save($data);
                                if ($saved) {
                                    $status = true;
                                    $session->setFlashdata('success', 'Saved Successfully');
                                } else {
                                    $session->setFlashdata('error', 'Failed to save'); 
                                }
                            }
                        
                  
                }
                } else {
                    $session->setFlashdata('error', 'Enter All Fields');
                }
            }
        } else {
            $session->setFlashdata('error', 'Login AS Admin||SuperAdmin');
            return   redirect()->to('/Auth/index');
        }
        //     $this->session->set_flashdata('msg', $msg);
      //  $this->index();
        return redirect("addservices");
    }










    public function service_edit($id=''){


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
        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
        $data['company'] = $this->company_users->orderBy('company_user_id', 'DESC')->findAll();
        $data['query'] = $this->services_model->get_row($id);
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New City';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this->request->uri->getSegment(1);
        //  echo '<pre>';
        // print_r($data);
        // exit;
        return view('Modules\Admin\Views\pages\services\addnewservices', $data);

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
    return redirect("addservices");
    
    }
    

}
