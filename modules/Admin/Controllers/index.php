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
use CodeIgniter\Files\File;

class Index extends BaseController
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
                $this->request = \Config\Services::request();
                helper(['form', 'url', 'string']);
                $this->session = session();
                $this->data = ['session' => $this->session, 'request' => $this->request];
        }

        public function index()
        {
                $data = [];
                $session = session();
                $msg = array();
                helper(['form', 'url', 'string']);
                $pot = json_decode(json_encode($session->get('userdata')), true);
                // echo '<pre>';
                // print_r($pot);
                // exit;
                if (!empty($pot[0])) {
                        $user_id = $pot[0]['user_id'];
                }

                if (!empty($user_id)) {
                        return  redirect('Admindashboard');
                }
                $input = $this->validate([
                        'password' => 'required|min_length[3]',
                        'email' => 'required|valid_email'
                ]);


                if (!empty($input)) {



                        $login_detail = (array)$this->admin_users_model->loginnew($this->request->getPost());

                        if (!empty($login_detail[0]) && $login_detail > 0) {
                                unset($login_detail['user_session_id']);
                                $user_session_id = rand('2659748135965', '088986555510245579');
                                $this->admin_users_model->data['user_session_id'] = $user_session_id;
                                $login_detail['logged_session_id'] = md5($user_session_id);
                                $session->set('userdata', $login_detail);
                                $pot = json_decode(json_encode($session->userdata), true);
                                // echo '<pre>';
                                // print_r( $session->userdata );
                                // exit;
                                $this->admin_users_model->primary_key = array('user_id' => $pot[0]['user_id']);
                                $this->admin_users_model->updateData();
                                return redirect()->to('Admindashboard');
                        } else {
                                $session->setFlashdata('error', 'Incorrect Email and Password');
                                $data['session'] = $session;
                                redirect()->to('/Auth/index');
                        }
                }
                // $session->setFlashdata('error', 'Enter Email and Password');
                $data['session'] = $session;
                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                $data['page_title'] = "Login";
                return view('Modules\Admin\Views\auth\logintwo', $data);
        }





        public function dashboard($rowno = 0)
        {
                $session = session();
                $data['user_data'] = [];
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

         $data['page_title'] = 'Welcome - ' . ucfirst($pot[0]['first_name']) . " " . ucfirst($pot[0]['last_name']);
                $data['page_heading'] = 'Welcome - ' . ucfirst($pot[0]['first_name']) . " " . ucfirst($pot[0]['last_name']);
                $data['sub_heading'] = 'Welcome - ' . ucfirst($pot[0]['first_name']) . " " . ucfirst($pot[0]['last_name']);
                $data['breadcrumb'] = "Admindashboard";
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                return view('Modules\Admin\Views\pages\hometwo', $data);
        }



        public function add()
        {
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

                $this->admin_users_model->primary_key = array('user_id' => $user_id);
                $user_session_id = $this->admin_users_model->session_id();
                if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                        redirect('');
                } else {
                        $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

                        $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
                }
                $data['session'] = $session;
                $data['view'] = 'User/adminroles/form';
                $data['title'] = 'Administrator Dashboard - ';
                // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                $data['page_heading'] = 'Add Admin Roles';
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                $data['users'] = $this->admin_users_model->orderBy('user_id', 'ASCE')->findAll();
                return view('Modules\Admin\Views\pages\datatable', $data);
        }



        public function addrole()
        {
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

                $this->admin_users_model->primary_key = array('user_id' => $user_id);
                $user_session_id = $this->admin_users_model->session_id();
                if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                        redirect('');
                } else {
                        $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

                        $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
                }
                $data['session'] = $session;
                $data['view'] = 'User/adminroles/form';
                $data['page_title'] = 'Admin Roles Add ';
                // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                $data['page_heading'] = 'Add Admin Roles';
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                $data['q'] = $this->admin_users_model->findroles($role_id);
                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'ASCE')->findAll();
                return view('Modules\Admin\Views\pages\datatablerole', $data);
        }


        public function addNew()
        {
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

                $this->admin_users_model->primary_key = array('user_id' => $user_id);
                $user_session_id = $this->admin_users_model->session_id();
                if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                        redirect('');
                } else {
                        $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

                        $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
                }
                $data['session'] = $session;
                $data['pade_title'] = 'Admin Dashboard - ';
                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                $data['page_heading'] = 'Add New Users';
                $data['request'] = $this->request;
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                return view('Modules\Admin\Views\pages\addnew', $data);
        }




        public function addnewroles()
        {
                $data = [];
                $session = session();
                $data['user_data'] = [];
                $pot = json_decode(json_encode($session->get('userdata')), true);
                helper(['form', 'url', 'string']);
                // echo '<pre>';
                // print_r($pot[0]);
                // exit;
                if (empty($pot[0])) {
                        return   redirect()->to('/Auth/index');
                } else {
                        $user_id = $pot[0]['user_id'];
                        $role_id = $pot[0]['role_id'];
                }

                $this->admin_users_model->primary_key = array('user_id' => $user_id);
                $this->admin_roles_model->primary_key = array('role_id' => $role_id);
                $user_session_id = $this->admin_users_model->session_id();
                if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                        redirect('');
                } else {
                        $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

                        $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
                }
                $data['session'] = $session;
                $data['view'] = 'User/adminroles/form';
                $data['page_title'] = 'Admin Roles Add ';
                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                $data['page_heading'] = 'Add New Users';
                $data['request'] = $this->request;
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                return view('Modules\Admin\Views\pages\addnewroles', $data);
        }











        public function addnewuser()
        {
                $session = session();
                $pot = json_decode(json_encode($session->get('userdata')), true);

                // echo '<pre>';
                // print_r($pot[0]['user_id'] );
                // exit;


                $input = $this->validate([
                        'first_name' => 'required|min_length[3]',
                        'last_name' => 'required|min_length[3]',
                        'email' => 'required|valid_email',
                        'phone_number' => 'required|numeric|regex_match[/^[0-9]{10}$/]',
                        'username' => 'required|min_length[3]',
                        'status_ind' => 'required',
                        'role_id' => 'required',

                ]);

                if (!empty($input)) {

                        if ($this->request->getMethod() == 'post') {
                                extract($this->request->getPost());

                                if ($password !== $cpassword) {
                                        $this->session->setFlashdata('error', "Password does not match.");
                                } else {
                                        $udata = [];
                                        $udata['first_name'] = $first_name;
                                        $udata['last_name'] = $last_name;
                                        $udata['phone_number'] = $phone_number;
                                        $udata['username'] = $username;
                                        $udata['role_id'] = $role_id;
                                        $udata['status_ind'] = $status_ind;
                                        $udata['email'] = $email;
                                        $udata['employee_id'] = rand(1000, 9999);
                                        $udata['created_date'] = date('Y-m-d');
                                        $udata['created_by'] =  $pot[0]['user_id'];
                                        if (!empty($password))
                                                $udata['password'] = md5($password);
                                        $checkMail = $this->admin_users_model->where('email', $email)->countAllResults();
                                        $checkEmployee_id = $this->admin_users_model->where('employee_id', $udata['employee_id'])->countAllResults();
                                        if ($checkMail > 0) {
                                                $this->session->setFlashdata('error', "User Email Already Taken.");
                                        } else {
                                                $save = $this->admin_users_model->save($udata);
                                                if ($save) {
                                                        $session->setFlashdata('success', 'Saved Successfully');
                                                        $data['session'] = $session;
                                                        $data['pade_title'] = 'Admin Dashboard - ';
                                                        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                                                        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                                                        $data['page_heading'] = 'Add New Users';
                                                        $data['request'] = $this->request;
                                                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                                                        return view('Modules\Admin\Views\pages\addnew', $data);
                                                } else {
                                                        $session->setFlashdata('error', 'User Details has failed to save.');
                                                        $data['session'] = $session;
                                                        $data['pade_title'] = 'Admin Dashboard - ';
                                                        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                                                        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                                                        $data['page_heading'] = 'Add New Users';
                                                        $data['request'] = $this->request;
                                                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                                                        return view('Modules\Admin\Views\pages\addnew', $data);
                                                }
                                        }
                                }
                        }
                        // $session->setFlashdata('success', 'All Fine');
                } else {

                        $session->setFlashdata('error', 'Enter All Fields');
                        $data['session'] = $session;
                        $data['pade_title'] = 'Admin Dashboard - ';
                        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                        $data['page_heading'] = 'Add New Users';
                        $data['request'] = $this->request;
                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                        return view('Modules\Admin\Views\pages\addnew', $data);
                }




                $data['session'] = $session;
                $data['pade_title'] = 'Admin Dashboard - ';
                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                $data['page_heading'] = 'Add New Users';
                $data['request'] = $this->request;
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                return redirect("addNew");
                //return view('Modules\Admin\Views\pages\addnew', $data);
                // return view('pages/users/add', $this->data);
        }




        public function savenewroles()
        {
                $session = session();
                $pot = json_decode(json_encode($session->get('userdata')), true);
                // echo '<pre>';
                // print_r($pot[0]['user_id'] );
                // exit;

                $input = $this->validate([
                        'role_name' => 'required|min_length[3]',
                        'status_ind' => 'required'
                ]);


                if (!empty($input)) {


                        if ($this->request->getMethod() == 'post') {
                                extract($this->request->getPost());


                                $udata = [];
                                $udata['role_name'] = $role_name;
                                $udata['status_ind'] = $status_ind;
                                $udata['created_date'] = date('Y-m-d');
                                $udata['created_by'] =  $pot[0]['user_id'];
                                $udata['last_modified_by'] = $pot[0]['user_id'];
                                // echo '<pre>';
                                // print_r($udata);
                                // exit;
                                $save = $this->admin_roles_model->save($udata);
                                if ($save) {
                                        $session->setFlashdata('success', 'Saved Successfully');
                                        $data['session'] = $session;
                                        $data['request'] = $this->request;
                                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                                        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                                        $data['users'] = $this->admin_users_model->orderBy('user_id', 'ASCE')->findAll();
                                        return view('Modules\Admin\Views\pages\addnewroles', $data);
                                } else {
                                        $session->setFlashdata('error', 'Failed to save');
                                        $data['session'] = $session;
                                        $data['request'] = $this->request;
                                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                                        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                                        $data['users'] = $this->admin_users_model->orderBy('user_id', 'ASCE')->findAll();
                                        return view('Modules\Admin\Views\pages\addnewroles', $data);
                                }
                        }
                        $session->setFlashdata('success', 'All Fine');
                } else {
                        $session->setFlashdata('error', 'Enter All Fields');
                        $data['session'] = $session;
                        $data['request'] = $this->request;
                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                        $data['users'] = $this->admin_users_model->orderBy('user_id', 'ASCE')->findAll();
                        return view('Modules\Admin\Views\pages\addnewroles', $data);
                }

                $data['session'] = $session;
                $data['request'] = $this->request;
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                $data['page_title'] = "Add User";
                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                $data['users'] = $this->admin_users_model->orderBy('user_id', 'ASCE')->findAll();
                return view('Modules\Admin\Views\pages\datatablerole', $data);
                // return view('pages/users/add', $this->data);
        }

        public function editnewuser()
        {
                $session = session();
                $pot = json_decode(json_encode($session->get('userdata')), true);
                // echo '<pre>';
                // print_r($pot[0]['user_id'] );
                // exit;


                $input = $this->validate([
                        'first_name' => 'required|min_length[3]',
                        'last_name' => 'required|min_length[3]',
                        'email' => 'required|valid_email',
                        'username' => 'required|min_length[3]',
                        'status_ind' => 'required',
                        'role_id' => 'required',

                ]);


                if (!empty($input)) {

                        if ($this->request->getMethod() == 'post') {
                                extract($this->request->getPost());


                                if (!empty($user_id_hidd)) {


                                        
                                        if ($password !== $cpassword) {
                                                $session->setFlashdata('error', "Password does not match.");
                                        } else {
                                                $udata = [];
                                                $udata['first_name'] = $first_name;
                                                $udata['last_name'] = $last_name;
                                                $udata['phone_number'] = $phone_number;
                                                $udata['username'] = $username;
                                                $udata['role_id'] = $role_id;
                                                $udata['status_ind'] = $status_ind;
                                                $udata['email'] = $email;
                                                $udata['modified_date'] = date('Y-m-d');
                                                $udata['modified_by'] =  $pot[0]['user_id'];
                                                if (!empty($password)) {
                                                        $udata['password'] = md5($password);
                                                }

                                                $checkMail = $this->admin_users_model->where('email',$email)->where('user_id!=',$user_id_hidd)->countAllResults();

                                                if($checkMail > 0){
                                                         $session->setFlashdata('error',"User Email Already Taken.");
                                                         $data['session'] = $session;
                                                         $data['pade_title'] = 'Admin Dashboard - ';
                                                         $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                                                         // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                                                         $data['page_heading'] = 'Edit  Users';
                                                         $data['request'] = $this->request;
                                                         $data['menuslinks'] = $this->request->uri->getSegment(1);
                                                         return view('Modules\Admin\Views\pages\addnew', $data);
                                                    }else{
                                                $update = $this->admin_users_model->where('user_id', $user_id_hidd)->set($udata)->update();

                                        
                                                if ($update) {
                                                        $session->setFlashdata('success', 'Updated Successfully');
                                                        $data['session'] = $session;
                                                        $data['pade_title'] = 'Admin Dashboard - ';
                                                        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                                                        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                                                        $data['page_heading'] = 'Edit  Users';
                                                        $data['request'] = $this->request;
                                                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                                                        return view('Modules\Admin\Views\pages\addnew', $data);
                                                } else {
                                                        $session->setFlashdata('error', 'Failed to Update');
                                                        $data['session'] = $session;
                                                        $data['pade_title'] = 'Admin Dashboard - ';
                                                        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                                                        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                                                        $data['page_heading'] = 'Edit  Users';
                                                        $data['request'] = $this->request;
                                                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                                                        return view('Modules\Admin\Views\pages\addnew', $data);
                                                }

                                        }
                                        }
                                }
                        }

                        // $session->setFlashdata('success', 'All Fine');
                } else {

                        $session->setFlashdata('error', 'Enter All Fields');
                        $data['session'] = $session;
                        $data['pade_title'] = 'Admin Dashboard - ';
                        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                        $data['page_heading'] = 'Add New Users';
                        $data['request'] = $this->request;
                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                        return view('Modules\Admin\Views\pages\addnew', $data);
                }
                $data['request'] = $this->request;
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                $data['page_title'] = "Add User";
                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                $data['users'] = $this->admin_users_model->orderBy('user_id', 'ASCE')->findAll();
               // return redirect()->to('Main/user_edit/'.$id);
              //  return view('Modules\Admin\Views\pages\datatable', $data);
              return redirect("addNew");
        }





        public function editnewroles()
        {
                $session = session();
                $pot = json_decode(json_encode($session->get('userdata')), true);
                // echo '<pre>';
                // print_r($pot[0]['user_id'] );
                // exit;
                $input = $this->validate([
                        'role_name' => 'required|min_length[3]',
                        'status_ind' => 'required'
                ]);


                if (!empty($input)) {
                        if ($this->request->getMethod() == 'post') {
                                extract($this->request->getPost());


                                if (!empty($user_id_hidd)) {

                                        $udata = [];
                                        $udata['role_name'] = $role_name;
                                        $udata['status_ind'] = $status_ind;
                                        $udata['modified_date'] = date('Y-m-d');
                                        $udata['modified_by'] =  $pot[0]['user_id'];


                                        $update = $this->admin_roles_model->where('role_id', $user_id_hidd)->set($udata)->update();

                                        //     echo '<pre>';
                                        //     print_r($update);
                                        //     exit;
                                        if ($update) {
                                                $session->setFlashdata('success', 'Updated Successfully!!');
                                                $data['session'] = $session;
                                                $data['request'] = $this->request;
                                                $data['menuslinks'] = $this->request->uri->getSegment(1);
                                                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                                                $data['users'] = $this->admin_users_model->orderBy('user_id', 'ASCE')->findAll();
                                                return view('Modules\Admin\Views\pages\addnewroles', $data);
                                        } else {
                                                $session->setFlashdata('success', 'Failed To Update');
                                                $data['session'] = $session;
                                                $data['request'] = $this->request;
                                                $data['menuslinks'] = $this->request->uri->getSegment(1);
                                                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                                                $data['users'] = $this->admin_users_model->orderBy('user_id', 'ASCE')->findAll();
                                                return view('Modules\Admin\Views\pages\addnewroles', $data);
                                        }
                                }
                        }
                        $session->setFlashdata('success', 'All Fine');
                } else {
                        $session->setFlashdata('error', 'Enter All Fields');
                        $data['session'] = $session;
                        $data['request'] = $this->request;
                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                        $data['users'] = $this->admin_users_model->orderBy('user_id', 'ASCE')->findAll();
                        return view('Modules\Admin\Views\pages\addnewroles', $data);
                }
                $data['request'] = $this->request;
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                $data['page_title'] = "Add User";
                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                $data['users'] = $this->admin_users_model->orderBy('user_id', 'ASCE')->findAll();
                return view('Modules\Admin\Views\pages\datatable', $data);
        }

        public function user_delete($id = '')
        {
                $session = session();
                $pot = json_decode(json_encode($session->get('userdata')), true);
                // echo '<pre>';
                // print_r($id);
                // exit;
                if (empty($id)) {
                        $this->session->setFlashdata('main_error', "user Deletion failed due to unknown ID.");
                        return redirect()->to('Admindashboard');
                }
                $delete = $this->admin_users_model->where('user_id', $id)->delete();
                if ($delete) {
                        $session->setFlashdata('success', 'User has been deleted successfully.');
                } else {
                        $session->setFlashdata('error', 'User Deletion failed due to unknown ID.');
                }
                $data['session'] = $session;
                $data['request'] = $this->request;
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                $data['page_title'] = "Add User";
                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                $data['users'] = $this->admin_users_model->orderBy('user_id', 'ASCE')->findAll();
              //  return view('Modules\Admin\Views\pages\datatable', $data);
              return redirect("addNew");
        }


        public function vehicle_delete($id = '')
        {

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
                $delete = $this->cars_db_model->where('id', $id)->delete();
                if ($delete) {
                        $session->setFlashdata('success', 'Vehicle type has been deleted successfully.');
                } else {
                        $session->setFlashdata('error', 'Vehicle Type Deletion failed due to unknown ID.');
                }
                $this->admin_users_model->primary_key = array('user_id' => $user_id);
                $user_session_id = $this->admin_users_model->session_id();
                if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                        redirect('');
                } else {
                        $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

                        $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
                }
                $data['session'] = $session;
                $data['view'] = 'User/adminroles/form';
                $data['page_title'] = 'Adding Vehicles';
                // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                $data['page_heading'] = 'Adding Vehicles';
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                $data['q'] = $this->admin_users_model->findroles($role_id);
                $data['cars'] = $this->cars_db_model->orderBy('id', 'DESC')->findAll();
                $data['users'] = $this->admin_users_model->orderBy('user_id', 'ASCE')->findAll();
                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'ASCE')->findAll();
                return view('Modules\Admin\Views\pages\vehiclelist', $data);
        }


        public function access($id = '')
        {

                $session = session();
                $pot = json_decode(json_encode($session->get('userdata')), true);
                // echo '<pre>';
                // print_r($id);
                // exit;
                if (empty($id)) {
                        $this->session->setFlashdata('main_error', "user Deletion failed due to unknown ID.");
                        return redirect()->to('Admindashboard');
                }

                if (empty($pot[0])) {
                        return   redirect()->to('/Auth/index');
                } else {
                        $user_id = $pot[0]['user_id'];
                        $role_id = $pot[0]['role_id'];
                }
                $accesses = array();
                $data['query'] = $this->admin_menuitems_model->view();
                $roles_accesses = $this->admin_roles_accesses_model->view($id);
                foreach ($roles_accesses as $row) {
                        $accesses[] = $row->menuitem_id;
                }

                $this->admin_users_model->primary_key = array('user_id' => $id);
                $user_session_id = $this->admin_users_model->session_id();
                if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                        redirect('');
                } else {
                        $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

                        $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
                }


                $data['view'] = 'User/adminroles/form';
                $data['title'] = 'Administrator Dashboard - ';
                $data['request'] = $this->request;
                $data['role_id'] = $id;
                $data['admin_users_accesses'] = $accesses;
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                //    echo '<pre>';
                // print_r($data);
                // exit;
                return view('Modules\Admin\Views\pages\access', $data);
        }



        public function user_edit($id = '')
        {
                if ($id == null) {
                        return  redirect('Admindashboard');
                } else {
                        $data['userInfo'] = $this->admin_users_model->where("user_id= '{$id}'")->findAll();
                        $this->global['pageTitle'] = 'CodeInsect : Edit User';
                        $session = session();
                        $data['user_data'] = [];
                        $pot = json_decode(json_encode($session->get('userdata')), true);

                        if (empty($pot[0])) {
                                return   redirect()->to('/Auth/index');
                        } else {
                                $user_id = $pot[0]['user_id'];
                                $role_id = $pot[0]['role_id'];
                        }
                        $this->admin_users_model->primary_key = array('user_id' => $id);
                        $user_session_id = $this->admin_users_model->session_id();
                        if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                                redirect('');
                        } else {
                                $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

                                $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
                        }
                        $data['view'] = 'User/adminroles/form';
                        $data['title'] = 'Administrator Dashboard - ';
                        $data['query'] = $this->admin_users_model->get_row();
                        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                        $data['page_heading'] = 'edit  Users';
                        $data['request'] = $this->request;
                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                        $returnArr = [];
                        foreach ($data['userInfo'] as $k => $v) {
                                $returnArr = array_merge($returnArr, $v);
                        }
                        $a = (object) $returnArr;
                        //    echo '<pre>';
                        // print_r($data);
                        // exit;
                        return view('Modules\Admin\Views\pages\editnew', $data);
                }
        }





        public function user_rolesedit($id = '')
        {
                if ($id == null) {
                        return  redirect('Admindashboard');
                } else {
                        $data['userInfo'] = $this->admin_roles_model->where("role_id= '{$id}'")->findAll();
                        $this->global['pageTitle'] = 'CodeInsect : Edit Roles';
                        $session = session();
                        $data['user_data'] = [];
                        $pot = json_decode(json_encode($session->get('userdata')), true);

                        if (empty($pot[0])) {
                                return   redirect()->to('/Auth/index');
                        } else {
                                $user_id = $pot[0]['user_id'];
                                $role_id = $pot[0]['role_id'];
                        }
                        $this->admin_roles_model->primary_key = array('role_id' => $id);
                        $this->admin_users_model->primary_key = array('role_id' => $id);
                        $user_session_id = $this->admin_users_model->session_id();
                        if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                                redirect('');
                        } else {
                                $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

                                $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
                        }
                        $data['view'] = 'User/adminroles/form';
                        $data['title'] = 'Administrator Dashboard - ';
                        $data['query'] = $this->admin_roles_model->get_row();
                        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                        $data['page_heading'] = 'edit  Roles';
                        $data['request'] = $this->request;
                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                        //    echo '<pre>';
                        // print_r($_SESSION['sidebar_menuitems']);
                        // exit;
                        return view('Modules\Admin\Views\pages\editnewroles', $data);
                }
        }















        function editOld($userId = NULL)
        {


                if (empty($id))
                        return redirect()->to('Admindashboard');
                if ($this->request->getMethod() == 'post') {
                        extract($this->request->getPost());
                        $udata = [];
                        $udata['code'] = $code;
                        $udata['name'] = $name;
                        $checkCode = $this->dept_model->where('code', $code)->where("id!= '{$id}'")->countAllResults();
                        if ($checkCode) {
                                $this->session->setFlashdata('error', "Department Code Already Taken.");
                        } else {
                                $update = $this->dept_model->where('id', $id)->set($udata)->update();
                                if ($update) {
                                        $this->session->setFlashdata('success', "Department Details has been updated successfully.");
                                        return redirect()->to('Main/department_edit/' . $id);
                                } else {
                                        $this->session->setFlashdata('error', "Department Details has failed to update.");
                                }
                        }
                }

                $this->data['page_title'] = "Edit Department";
                $this->data['department'] = $this->dept_model->where("id ='{$id}'")->first();
                return view('pages/departments/edit', $this->data);
        }




        public function saveaccess()
        {
                $session = session();
                $request = \Config\Services::request();
                $pot = json_decode(json_encode($session->get('userdata')), true);
                if (empty($pot[0])) {
                        return   redirect()->to('/Auth/index');
                } else {
                        $user_id = $pot[0]['user_id'];
                        $role_id = $pot[0]['role_id'];
                }
                if ($user_id  == 1 || $user_id  == 2) {
                        if ($this->request->getMethod() == 'post') {
                                extract($this->request->getPost());
                                $status = true;
                                $role_id =  $request->getPost('role_id');
                                $this->admin_roles_accesses_model->primary_key = array('role_id' => $role_id);
                                $delete = $this->admin_roles_accesses_model->where('role_id', $role_id)->delete();
                                if ($delete) {

                                        $menuitem_ids = $request->getPost('menuitem_id');

                                        foreach ($menuitem_ids as $menuitem_id) {
                                                $data = [
                                                        'menuitem_id'                => $menuitem_id,
                                                        'role_id'                => $role_id,
                                                ];
                                                // $this->admin_roles_accesses_model->data = array('menuitem_id' => $menuitem_id, 'role_id' => $role_id);
                                                // echo '<pre>';
                                                // print_r($data);
                                                // exit;
                                                $save = $this->admin_roles_accesses_model->save($data);
                                                if ($save) {
                                                        $status = true;
                                                }
                                        }
                                }

                                if ($status) {
                                        $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Save Changes Updated Successfully');
                                } else {
                                        $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Delete.');
                                }
                        }
                } else {
                        $msg = array();
                        $msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
                }
                //     $this->session->set_flashdata('msg', $msg);
                return redirect("Admindashboard");
        }




        public function permission($id)
        {
                $session = session();
                $pot = json_decode(json_encode($session->get('userdata')), true);
                if (empty($id)) {
                        $this->session->setFlashdata('main_error', "user Deletion failed due to unknown ID.");
                        return redirect()->to('Admindashboard');
                }

                if (empty($pot[0])) {
                        return   redirect()->to('/Auth/index');
                } else {
                        $user_id = $pot[0]['user_id'];
                        $role_id = $pot[0]['role_id'];
                }


                $this->admin_users_model->primary_key = array('user_id' => $id);
                $user_session_id = $this->admin_users_model->session_id();
                if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                        redirect('');
                } else {
                        $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

                        $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
                }
                if (!empty($id)) {
                        $accesses = array();
                        $roles_accesses = $this->admin_roles_accesses_model->view_access($id);
                        foreach ($roles_accesses as $row) {
                                $accesses[] = $row->menuitem_id;
                        }
                        $data['role_id'] = $id;
                        $data['query'] = $roles_accesses; //$_SESSION['sidebar_menuitems'];
                        $data['title'] = 'Role Access - ';
                        $data['page_heading'] = 'Role Access';
                        $data['breadcrumb'] = "Role Access";
                        $data['request'] = $this->request;
                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                        return view('Modules\Admin\Views\pages\permission', $data);
                } else {
                        $msg = array();
                        $msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
                        $this->session->set_flashdata('msg', $msg);
                        return redirect()->to('Admindashboard');
                }
        }


        public function savepermission()
        {
                $session = session();
                $udata = [];
                $request = \Config\Services::request();
                $pot = json_decode(json_encode($session->get('userdata')), true);

                if (empty($pot[0])) {
                        return   redirect()->to('/Auth/index');
                } else {
                        $user_id = $pot[0]['user_id'];
                        $role_id = $pot[0]['role_id'];
                }

                if ($user_id  == 1 || $role_id == 2) {
                        $status = true;
                        $role_id =  $request->getPost('role_id');
                        $i = 0;
                        $menuitem_ids = $request->getPost('menuitem_id');

                        foreach ($menuitem_ids as $menuitem_id) {
                                $add_permission = $request->getPost('add_permission');

                                if (!empty($add_permission[$i])) {
                                        // echo '<pre>';
                                        // print_r($add_permission[$i]);
                                        // exit;
                                        $add_permission = $add_permission[$i];
                                } else {
                                        $add_permission = 0;
                                }
                                if (!empty($request->getPost('edit_permission')[$i])) {
                                        $edit_permission = $request->getPost('edit_permission')[$i];
                                } else {
                                        $edit_permission = 0;
                                }
                                if (!empty($request->getPost('delete_permission')[$i])) {
                                        $delete_permission = $request->getPost('delete_permission')[$i];
                                } else {
                                        $delete_permission = 0;
                                }
                                $udata['add_permission'] = $add_permission;
                                $udata['role_id'] = $role_id;
                                $udata['edit_permission'] = $edit_permission;
                                $udata['delete_permission'] = $delete_permission;

                                $update = $this->admin_roles_accesses_model->where('menuitem_id', $menuitem_id)->set($udata)->update();


                                if ($update) {
                                        $status = true;
                                        $udata = [];
                                }
                                $i++;
                        }
                        return redirect()->to('Admindashboard');
                        if ($status) {
                                $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Save Changes Updated Successfully');
                        } else {
                                $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Delete.');
                        }
                } else {
                        $msg = array();
                        $msg = array('type' => 'error', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
                }
                return redirect()->to('Admindashboard');
        }


        public function settings()
        {
                $session = session();
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

                $data['query'] = $this->settings_model->view();
                // echo'<pre>';
                // print_r($data['query']);
                // exit;
                $data['session'] = $session;
                $data['title'] = 'Settings';
                $data['page_heading'] = 'Settings';
                $data['breadcrumb'] = "Settings";
                $data['sub_heading'] = 'Configuration';
                $data['request'] = $this->request;
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                return view('Modules\Admin\Views\pages\settings', $data);
        }

        public function settingsupdate()
        {
                $session = session();
                $data_all = [];
                $data = [];
                $request = \Config\Services::request();
                $pot = json_decode(json_encode($session->get('userdata')), true);

                if (empty($pot[0])) {
                        return   redirect()->to('/Auth/index');
                } else {
                        $user_id = $pot[0]['user_id'];
                        $role_id = $pot[0]['role_id'];
                }
                if ($this->request->getMethod() == 'post') {
                        extract($this->request->getPost());
                        $data_all['setting_value'] = $setting_value;
                        $data_all['setting_id'] = $setting_id;
                }



                $this->settings_model->data['setting_value'] = '';
                $this->settings_model->update_data();



                foreach ($data_all['setting_id'] as $key => $sid) {
                        if (empty($data_all['setting_value'][$key])) {

                                unset($data_all['setting_id'][$key]);
                        }
                }


                foreach ($data_all['setting_id'] as $key => $sid) {
                        $status = true;

                        $this->settings_model->data = array('setting_id' => $sid, 'setting_value' => $data_all['setting_value'][$key]);
                        // foreach ($languages as $lang_id) {
                        $this->settings_model->primary_key = array('setting_id' => $sid);
                        if (!$this->settings_model->is_exist()) {
                                $this->db->query("INSERT INTO `settings`( `setting_id`,  `type`, `setting_key`, `setting_name`, `setting_value`, `status_ind`)
                                        SELECT `setting_id`, `type`, `setting_key`, `setting_name`, `setting_value`, `status_ind` FROM `settings` WHERE `setting_id` = $sid ");
                        }
                        if (!$this->settings_model->update_data()) {
                                $status = false;
                        }
                        // }
                }

                if ($status) {
                        $session->setFlashdata('success', "Save Changes Updated Successfully.");
                } else {
                        $session->setFlashdata('error', "Sorry! Unable to Delete.");
                }




                $this->admin_users_model->primary_key = array('user_id' => $user_id);
                $user_session_id = $this->admin_users_model->session_id();
                if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                        redirect('');
                } else {
                        $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

                        $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
                }

                $data['query'] = $this->settings_model->view();
                $data['session'] = $session;
                $data['session'] = $session;
                $data['title'] = 'Settings';
                $data['page_heading'] = 'Settings';
                $data['breadcrumb'] = "Settings";
                $data['sub_heading'] = 'Configuration';
                $data['request'] = $this->request;
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                return view('Modules\Admin\Views\pages\settings', $data);
        }




        public function vehicleaddition()
        {

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

                $this->admin_users_model->primary_key = array('user_id' => $user_id);
                $user_session_id = $this->admin_users_model->session_id();
                if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                        redirect('');
                } else {
                        $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

                        $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
                }
                $data['session'] = $session;
                $data['view'] = 'User/adminroles/form';
                $data['page_title'] = 'Adding Vehicles';
                // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                $data['page_heading'] = 'Adding Vehicles';
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                $data['q'] = $this->admin_users_model->findroles($role_id);
                $data['cars'] = $this->cars_db_model->orderBy('id', 'DESC')->findAll();
                $data['users'] = $this->admin_users_model->orderBy('user_id', 'ASCE')->findAll();
                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'ASCE')->findAll();
                return view('Modules\Admin\Views\pages\vehiclelist', $data);
        }




        public function addNewCars()
        {
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

                $this->admin_users_model->primary_key = array('user_id' => $user_id);
                $user_session_id = $this->admin_users_model->session_id();
                if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                        redirect('');
                } else {
                        $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

                        $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
                }
                $data['session'] = $session;
                $data['title'] = 'Add Vehicle Type';
                $data['pade_title'] = 'Admin Dashboard - ';
                $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                $data['page_heading'] = 'Add New Users';
                $data['request'] = $this->request;
                $data['menuslinks'] = $this->request->uri->getSegment(1);
                return view('Modules\Admin\Views\pages\addnewcars', $data);
        }



        public function formstore()
        {

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
                $builder = $db->table('cars_db');

                $validated = $this->validate([
                        'file' => [
                                'uploaded[file]',
                                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                                'max_size[file,4096]',
                        ],
                ]);
                if ($this->request->getMethod() == 'post') {
                        extract($this->request->getPost());
                }
                if (!empty($car_id_hidd)) {
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

                                        'name' =>  $avatar->getClientName(),
                                        'type'  => $avatar->getClientMimeType(),
                                        'vehicle_name' => $vehicle_name
                                ];




                                $update = $this->cars_db_model->where('id', $car_id_hidd)->set($data)->update();
                                if ($update) {
                                        $status = true;
                                        $udata = [];
                                        $session->setFlashdata('success', 'Data has been updated');
                                } else {
                                        $session->setFlashdata('error', 'Failed to update');
                                }
                        } else {
                                $data = [
                                        'vehicle_name' => $vehicle_name
                                ];
                                $update = $this->cars_db_model->where('id', $car_id_hidd)->set($data)->update();


                                if ($update) {
                                        $status = true;
                                        $udata = [];
                                        $session->setFlashdata('success', 'Data has been updated');
                                } else {
                                        $session->setFlashdata('error', 'Failed to update');
                                }
                        }
                } else {

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

                                        'name' =>  $avatar->getClientName(),
                                        'type'  => $avatar->getClientMimeType(),
                                        'vehicle_name' => $vehicle_name
                                ];

                                $save = $builder->insert($data);
                                $session->setFlashdata('success', 'File has been uploaded');
                        } else {
                                $session->setFlashdata('error', 'Please select a valid file');
                        }
                }
                return redirect('vehicleaddition');
                // return redirect()->to(base_url('Modules\Admin\Views\pages\addnewcars'))->with('msg', $data);
        }





        public function vehicle_edit($id = '')
        {
                if ($id == null) {
                        return  redirect('Admindashboard');
                } else {
                        $data['userInfo'] = $this->cars_db_model->where("id= '{$id}'")->findAll();
                        $this->global['pageTitle'] = 'CodeInsect : Edit Vehicles';
                        $session = session();
                        $data['user_data'] = [];
                        $pot = json_decode(json_encode($session->get('userdata')), true);

                        if (empty($pot[0])) {
                                return   redirect()->to('/Auth/index');
                        } else {
                                $user_id = $pot[0]['user_id'];
                                $role_id = $pot[0]['role_id'];
                        }
                        $this->cars_db_model->primary_key = array('id' => $id);
                        $this->admin_users_model->primary_key = array('user_id' => $user_id);
                        $user_session_id = $this->admin_users_model->session_id();
                        if (empty($user_id) && $this->session->userdata['logged_session_id'] != md5($user_session_id)) {
                                redirect('');
                        } else {
                                $side_menu_roles = $this->admin_roles_accesses_model->get_role_access($role_id);

                                $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $side_menu_roles;
                        }
                        $data['title'] = 'Edit Vehicle Type';
                        $data['session'] = $session;
                        $data['query'] = $this->cars_db_model->get_row($id);
                        $data['cars'] = $this->cars_db_model->orderBy('id', 'DESC')->findAll();
                        $data['roles'] = $this->admin_roles_model->orderBy('role_id', 'DESC')->findAll();
                        // $data['breadcrumb'] = "<a href=User/$this->class_name>Roles</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add Role";
                        $data['page_heading'] = 'edit  Vehicles';
                        $data['request'] = $this->request;
                        $data['menuslinks'] = $this->request->uri->getSegment(1);
                        //    echo '<pre>';
                        // print_r($data);
                        // exit;
                        return view('Modules\Admin\Views\pages\addnewcars', $data);
                }
        }
}
