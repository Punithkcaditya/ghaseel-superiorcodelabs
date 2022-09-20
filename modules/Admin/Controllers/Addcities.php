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







class Addcities extends BaseController
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
        $data['title'] = 'City Details';
        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
        $data['cities'] = $this->cities_model->viewcities();
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New Cities';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this->request->uri->getSegment(1);
       
    //  echo '<pre>';
    //  print_r($data);
    //  exit;
        return view('Modules\Admin\Views\pages\cities\citylist', $data);
    }



    public function addNewCity()
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
     
        $data['session'] = $session;
        $data['title'] = 'Add City Details';
        $data['pade_title2'] = 'Add City Name';
        $data['pade_title1'] = 'Add Locations';
        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New Users';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this->request->uri->getSegment(1);
        return view('Modules\Admin\Views\pages\cities\addnewcities', $data);
    }


    public function editcity($id=''){


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
        $data['title'] = 'Edit City Details';
        $data['pade_title2'] = 'Edit City Name';
        $data['pade_title1'] = 'Edit Locations';
        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
        $data['query'] = $this->cities_model->get_row($id);
        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
        $data['page_heading'] = 'Add New City';
        $data['request'] = $this->request;
        $data['menuslinks'] = $this->request->uri->getSegment(1);
        //  echo '<pre>';
        // print_r($data);
        // exit;
        return view('Modules\Admin\Views\pages\cities\addnewcities', $data);

    }


    public function addnewcities()
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
                    'city_name' => 'required',
                    'location' => 'required',
                ]);


                if (!empty($input)) {

                    if (!empty($city_id_hidd)) {
                        // echo '<pre>';
                        // print_r($city_id_hidd);
                        // exit;
                        if (!empty($city_name)) {
                            $udata = [];
                            $udata['city_name'] = $city_name;
                            $udata['status_ind'] = 1;
                            $udata['created_date'] = date('Y-m-d');
                            $udata['added_by'] =  $pot[0]['user_id'];
    
                            $update = $this->cities_model->where('id', $city_id_hidd)->set($udata)->update();
                            if (!empty($update)) {
                                $delete = $this->locations_model->where('city_id', $city_id_hidd)->delete();

                                if ($delete) {
                                foreach ($location as $key => $sid) {
                                    if (empty($location[$key])) {
            
                                            unset($location[$key]);
                                    }
                            }
                                  
                                    foreach ($location as $locations) {
                                   
                                    $data = [
                                        'locations_name'                => $locations,
                                        'city_id'                => $city_id_hidd,
                                        'status_ind'            => 1,
                                        'created_date' => date('Y-m-d'),
                                        'added_by' =>  $pot[0]['user_id']
    
                                    ];
                             
    
                                    $saved = $this->locations_model->save($data);
                                    if ($saved) {
                                        $status = true;
                                        $session->setFlashdata('success', 'Updated Successfully');
                                    } else {
                                        $session->setFlashdata('error', 'Failed to Update'); 
                                    }
                                }
                            }
                            else{
                                $session->setFlashdata('error', 'Failed to Update'); 
                            }
                            }
                        } else {
                            $session->setFlashdata('error', 'Enter All Fields');
                        }





                    }


                    else{

                    if (!empty($city_name)) {
                        $udata = [];
                        $udata['city_name'] = $city_name;
                        $udata['status_ind'] = 1;
                        $udata['created_date'] = date('Y-m-d');
                        $udata['added_by'] =  $pot[0]['user_id'];

                        $save = $this->cities_model->dataInsert($udata);

                        if (!empty($save)) {


                            foreach ($location as $key => $sid) {
                                if (empty($location[$key])) {
        
                                        unset($location[$key]);
                                }
                        }
                              
                                foreach ($location as $locations) {
                               
                                $data = [
                                    'locations_name'                => $locations,
                                    'city_id'                => $save,
                                    'status_ind'            => 1,
                                    'created_date' => date('Y-m-d'),
                                    'added_by' =>  $pot[0]['user_id']

                                ];
                            

                                $saved = $this->locations_model->save($data);
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
                    $session->setFlashdata('error', 'Enter All Fields');
                }
            }
        } else {
            $session->setFlashdata('error', 'Login AS Admin||SuperAdmin');
            return   redirect()->to('/Auth/index');
        }
        //     $this->session->set_flashdata('msg', $msg);
      //  $this->index();
        return redirect("city");
    }







public function city_delete($id=''){
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
    $data['title'] = 'City Details';
    $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
    $data['cities'] = $this->cities_model->viewcities();
    // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
    $data['page_heading'] = 'Add New Cities';
    $delete = $this->cities_model->where('id', $id)->delete();
    if ($delete) {
        $deletetwo = $this->locations_model->where('city_id', $id)->delete();
        if ($deletetwo) {
            $session->setFlashdata('success', 'City and Locations has been deleted successfully.');
    } else {
            $session->setFlashdata('error', 'City and Locations failed due to unknown ID.');
    }
}
else{
    $session->setFlashdata('error', 'City and Locations failed due to unknown ID.');
}
    $data['request'] = $this->request;
    $data['menuslinks'] = $this->request->uri->getSegment(1);
   
//  echo '<pre>';
//  print_r($data);
//  exit;
return redirect("city");

}




}
