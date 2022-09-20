15/09/2022



"{
    "title": "ErrorException",
    "type": "ErrorException",
    "code": 500,
    "message": "Undefined property: Modules\\Admin\\Controllers\\addtocartcontroller::$cart",
    "file": "C:\\xampp\\htdocs\\ghaseel\\modules\\Admin\\Controllers\\addtocartcontroller.php",
    "line": 97,
    "trace": [
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\modules\\Admin\\Controllers\\addtocartcontroller.php",
            "line": 97,
            "function": "errorHandler",
            "class": "CodeIgniter\\Debug\\Exceptions",
            "type": "->",
            "args": [
                8,
                "Undefined property: Modules\\Admin\\Controllers\\addtocartcontroller::$cart",
                "C:\\xampp\\htdocs\\ghaseel\\modules\\Admin\\Controllers\\addtocartcontroller.php",
                97,
                {
                    "output": "",
                    "no": 0
                }
            ]
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\modules\\Admin\\Controllers\\addtocartcontroller.php",
            "line": 89,
            "function": "show_cart",
            "class": "Modules\\Admin\\Controllers\\addtocartcontroller",
            "type": "->",
            "args": []
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\system\\CodeIgniter.php",
            "line": 896,
            "function": "add_to_cart",
            "class": "Modules\\Admin\\Controllers\\addtocartcontroller",
            "type": "->",
            "args": []
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\system\\CodeIgniter.php",
            "line": 466,
            "function": "runController",
            "class": "CodeIgniter\\CodeIgniter",
            "type": "->",
            "args": [
                {
                    "admin_users_model": {
                        "data": null,
                        "pager": null,
                        "primary_key": [],
                        "date": []
                    },
                    "admin_roles_model": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    },
                    "settings_model": {
                        "data": null,
                        "pager": null,
                        "primary_key": [],
                        "date": []
                    },
                    "admin_roles_accesses_model": {
                        "primary_key": [],
                        "data": [],
                        "pager": null
                    },
                    "admin_users_accesses_model": {
                        "primary_key": [],
                        "data": [],
                        "pager": null
                    },
                    "admin_menuitems_model": {
                        "pager": null,
                        "primary_key": [],
                        "date": []
                    },
                    "cars_db_model": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    },
                    "cities_model": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    },
                    "locations_model": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    },
                    "company_users": {
                        "pager": null,
                        "primary_key": [],
                        "date": []
                    },
                    "services_model": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    },
                    "category_db": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    },
                    "product_info_db": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    }
                }
            ]
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\system\\CodeIgniter.php",
            "line": 349,
            "function": "handleRequest",
            "class": "CodeIgniter\\CodeIgniter",
            "type": "->",
            "args": [
                null,
                {
                    "handler": "file",
                    "backupHandler": "dummy",
                    "storePath": "C:\\xampp\\htdocs\\ghaseel\\writable\\cache/",
                    "cacheQueryString": false,
                    "prefix": "",
                    "ttl": 60,
                    "reservedCharacters": "{}()/\\@:",
                    "file": {
                        "storePath": "C:\\xampp\\htdocs\\ghaseel\\writable\\cache/",
                        "mode": 416
                    },
                    "memcached": {
                        "host": "127.0.0.1",
                        "port": 11211,
                        "weight": 1,
                        "raw": false
                    },
                    "redis": {
                        "host": "127.0.0.1",
                        "password": null,
                        "port": 6379,
                        "timeout": 0,
                        "database": 0
                    },
                    "validHandlers": {
                        "dummy": "CodeIgniter\\Cache\\Handlers\\DummyHandler",
                        "file": "CodeIgniter\\Cache\\Handlers\\FileHandler",
                        "memcached": "CodeIgniter\\Cache\\Handlers\\MemcachedHandler",
                        "predis": "CodeIgniter\\Cache\\Handlers\\PredisHandler",
                        "redis": "CodeIgniter\\Cache\\Handlers\\RedisHandler",
                        "wincache": "CodeIgniter\\Cache\\Handlers\\WincacheHandler"
                    }
                },
                false
            ]
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\index.php",
            "line": 55,
            "function": "run",
            "class": "CodeIgniter\\CodeIgniter",
            "type": "->",
            "args": []
        }
    ]
}"















"C:\xampp\htdocs\ghaseel\system\Database\MySQLi\Connection.php"
"{
    "title": "mysqli_sql_exception",
    "type": "mysqli_sql_exception",
    "code": 500,
    "message": "Unknown column 'created_by' in 'field list'",
    "file": "C:\\xampp\\htdocs\\ghaseel\\system\\Database\\MySQLi\\Connection.php",
    "line": 292,
    "trace": [
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\system\\Database\\MySQLi\\Connection.php",
            "line": 292,
            "function": "query",
            "class": "mysqli",
            "type": "->",
            "args": [
                "INSERT INTO `addtocart` (`product_id`, `product_name`, `product_price`, `qty`, `created_date`, `created_by`) VALUES ('2', 'Seat Cover Black', '1000', '2', '2022-09-15', '1')",
                0
            ]
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\system\\Database\\BaseConnection.php",
            "line": 695,
            "function": "execute",
            "class": "CodeIgniter\\Database\\MySQLi\\Connection",
            "type": "->",
            "args": [
                "INSERT INTO `addtocart` (`product_id`, `product_name`, `product_price`, `qty`, `created_date`, `created_by`) VALUES ('2', 'Seat Cover Black', '1000', '2', '2022-09-15', '1')"
            ]
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\system\\Database\\BaseConnection.php",
            "line": 609,
            "function": "simpleQuery",
            "class": "CodeIgniter\\Database\\BaseConnection",
            "type": "->",
            "args": [
                "INSERT INTO `addtocart` (`product_id`, `product_name`, `product_price`, `qty`, `created_date`, `created_by`) VALUES ('2', 'Seat Cover Black', '1000', '2', '2022-09-15', '1')"
            ]
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\system\\Database\\BaseBuilder.php",
            "line": 1904,
            "function": "query",
            "class": "CodeIgniter\\Database\\BaseConnection",
            "type": "->",
            "args": [
                "INSERT INTO `addtocart` (`product_id`, `product_name`, `product_price`, `qty`, `created_date`, `created_by`) VALUES (:product_id:, :product_name:, :product_price:, :qty:, :created_date:, :created_by:)",
                {
                    "product_id": [
                        "2",
                        true
                    ],
                    "product_name": [
                        "Seat Cover Black",
                        true
                    ],
                    "product_price": [
                        "1000",
                        true
                    ],
                    "qty": [
                        "2",
                        true
                    ],
                    "created_date": [
                        "2022-09-15",
                        true
                    ],
                    "created_by": [
                        "1",
                        true
                    ]
                },
                false
            ]
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\modules\\Admin\\Controllers\\addtocartcontroller.php",
            "line": 88,
            "function": "insert",
            "class": "CodeIgniter\\Database\\BaseBuilder",
            "type": "->",
            "args": [
                {
                    "product_id": "2",
                    "product_name": "Seat Cover Black",
                    "product_price": "1000",
                    "qty": "2",
                    "created_date": "2022-09-15",
                    "created_by": "1"
                }
            ]
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\system\\CodeIgniter.php",
            "line": 896,
            "function": "add_to_cart",
            "class": "Modules\\Admin\\Controllers\\addtocartcontroller",
            "type": "->",
            "args": []
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\system\\CodeIgniter.php",
            "line": 466,
            "function": "runController",
            "class": "CodeIgniter\\CodeIgniter",
            "type": "->",
            "args": [
                {
                    "admin_users_model": {
                        "data": null,
                        "pager": null,
                        "primary_key": [],
                        "date": []
                    },
                    "admin_roles_model": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    },
                    "settings_model": {
                        "data": null,
                        "pager": null,
                        "primary_key": [],
                        "date": []
                    },
                    "admin_roles_accesses_model": {
                        "primary_key": [],
                        "data": [],
                        "pager": null
                    },
                    "admin_users_accesses_model": {
                        "primary_key": [],
                        "data": [],
                        "pager": null
                    },
                    "admin_menuitems_model": {
                        "pager": null,
                        "primary_key": [],
                        "date": []
                    },
                    "cars_db_model": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    },
                    "cities_model": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    },
                    "locations_model": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    },
                    "company_users": {
                        "pager": null,
                        "primary_key": [],
                        "date": []
                    },
                    "services_model": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    },
                    "category_db": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    },
                    "product_info_db": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    }
                }
            ]
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\system\\CodeIgniter.php",
            "line": 349,
            "function": "handleRequest",
            "class": "CodeIgniter\\CodeIgniter",
            "type": "->",
            "args": [
                null,
                {
                    "handler": "file",
                    "backupHandler": "dummy",
                    "storePath": "C:\\xampp\\htdocs\\ghaseel\\writable\\cache/",
                    "cacheQueryString": false,
                    "prefix": "",
                    "ttl": 60,
                    "reservedCharacters": "{}()/\\@:",
                    "file": {
                        "storePath": "C:\\xampp\\htdocs\\ghaseel\\writable\\cache/",
                        "mode": 416
                    },
                    "memcached": {
                        "host": "127.0.0.1",
                        "port": 11211,
                        "weight": 1,
                        "raw": false
                    },
                    "redis": {
                        "host": "127.0.0.1",
                        "password": null,
                        "port": 6379,
                        "timeout": 0,
                        "database": 0
                    },
                    "validHandlers": {
                        "dummy": "CodeIgniter\\Cache\\Handlers\\DummyHandler",
                        "file": "CodeIgniter\\Cache\\Handlers\\FileHandler",
                        "memcached": "CodeIgniter\\Cache\\Handlers\\MemcachedHandler",
                        "predis": "CodeIgniter\\Cache\\Handlers\\PredisHandler",
                        "redis": "CodeIgniter\\Cache\\Handlers\\RedisHandler",
                        "wincache": "CodeIgniter\\Cache\\Handlers\\WincacheHandler"
                    }
                },
                false
            ]
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\index.php",
            "line": 55,
            "function": "run",
            "class": "CodeIgniter\\CodeIgniter",
            "type": "->",
            "args": []
        }
    ]
}"


<?php


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
























  <div class="card shadow" style="padding-bottom: 74px;">
                                                            <div class="card-header">
                                                                <h2 class="mb-0"><?= $pade_title1 ?></h2>
                                                            </div>
                                                            <div class="card-body" id="addanother">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="grid-margin">
                                                                            <div class="">
                                                                                <div class="table-responsive">
                                                                                    <?php
               
                                                                                            //    echo '<pre>';
                                                                                            //    print_r( round($fraction));
                                                                                        $i = 1; ?>
                                                                                    <input type="hidden"
                                                                                        name="service_id_hidd"
                                                                                        id="service_id_hidd"
                                                                                        value="<?php echo (!empty($query[0]->id)) ? $query[0]->id : "" ?>" />
                                                                                    <table
                                                                                        class="table card-table table-vcenter text-nowrap  align-items-center">
                                                                                        <thead class="thead-light">
                                                                                            <tr>
                                                                                                <th><input
                                                                                                        class='check_all'
                                                                                                        type='checkbox'
                                                                                                        onclick="select_all()" />
                                                                                                    Select All</th>
                                                                                                <th>S. No</th>
                                                                                                <th></th>
                                                                                                <th></th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php if ( !empty($query[0]->Services)){ 
                                                                                            $k=0; $p=1;
                                                                                           
                                                                                          
                                                                                            // $fraction = count($str_arr)/2;
                                                                                            for ($j=1; $j <= 1 ; $j++) {  ?>

                                                                                            <tr>
                                                                                                <td><input
                                                                                                        type='checkbox'
                                                                                                        class='case' />
                                                                                                </td>
                                                                                                <td><span
                                                                                                        id='snum'><?= $j ?>.</span>
                                                                                                </td>
                                                                                                <td> <input type='text'
                                                                                                        class="form-control"
                                                                                                        placeholder="Enter Service"
                                                                                                        id='services<?= $p++ ?>'
                                                                                                        name='services[]'
                                                                                                        value="<?=  $query[0]->Services  ?>" />
                                                                                                </td>

                                                                                                <td><input type="text"
                                                                                                        class="form-control  state-valid"
                                                                                                        placeholder="Enter Service"
                                                                                                        id='services<?= $p++ ?>'
                                                                                                        name="services[]"
                                                                                                        value="<?=  '' ?>">
                                                                                                </td>

                                                                                            </tr>


                                                                                            <?php } } else { ?>


                                                                                            <!-- below -->

                                                                                            <tr>
                                                                                                <td><input
                                                                                                        type='checkbox'
                                                                                                        class='case' />
                                                                                                </td>
                                                                                                <td><span
                                                                                                        id='snum'>1.</span>
                                                                                                </td>
                                                                                                <td> <input type='text'
                                                                                                        class="form-control"
                                                                                                        placeholder="Enter Services"
                                                                                                        id='services<?= $i++ ?>'
                                                                                                        name='services[]' />
                                                                                                </td>

                                                                                                <td><input type="text"
                                                                                                        class="form-control  state-valid"
                                                                                                        placeholder="Enter Services"
                                                                                                        id='services<?= $i++ ?>'
                                                                                                        name="services[]">
                                                                                                </td>

                                                                                            </tr>

                                                                                            <?php } ?>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>



                                                                    </div>






                                                                </div>
                                                                <input type="hidden" name="count_items" id="count_items"
                                                                    value="<?= $i ?>" />
                                                            </div>
                                                            <div class="col-md-12 button_holder">
                                                                <div class="card-body">
                                                                    <button type="submit"
                                                                        class="btn rounded-0 btn-primary bg-gradient">Submit</button>
                                                                    <button type="button" class="btn btn-info mt-1 mb-1"
                                                                        id="addmoreservice"><i
                                                                            class="fas fa-plus-circle"></i>
                                                                        Add Fields</button>
                                                                    <button type="button"
                                                                        class="btn hideing btn-danger mt-1 mb-1"
                                                                        id="delete"><i class="fas fa-minus"></i> Delete
                                                                        Fields</button>
                                                                </div>
                                                            </div>
                                                        </div>













14/09/2022





<!-- <script type="text/javascript" src="<?php echo base_url('assets/js/multiple/jquery-3.4.1.min.js'); ?>"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/js/multiple/bootstrap.bundle.js'); ?>"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/js/multiple/bootstrap-select.js'); ?>"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.2/js/bootstrap-multiselect.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.2/css/bootstrap-multiselect.css"  crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-select.css'); ?>">







 public function depedentselectrrb(){

$request = service('request');
$postData = $request->getPost();

$data = array();

// Read new token and assign in $data['token']
$data['token'] = csrf_hash();

## Validation
$validation = \Config\Services::validation();

$input = $validation->setRules([
  'customer_location_id' => 'required'
]);

if ($validation->withRequest($this->request)->run() == FALSE){

   $data['success'] = 0;
   $data['error'] = $validation->getError('customer_location_id');// Error response

}else{

   $data['success'] = 1;
   
   // Fetch record

   $user = $this->locations_model->select('*')
          ->where('city_id',$postData['customer_location_id'])
          ->findAll();

   $data['user'] = $user;

}

return $this->response->setJSON($data);

}








"{
    "title": "ErrorException",
    "type": "ErrorException",
    "code": 500,
    "message": "Undefined variable: postData",
    "file": "C:\\xampp\\htdocs\\ghaseel\\app\\Controllers\\Home.php",
    "line": 34,
    "trace": [
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\app\\Controllers\\Home.php",
            "line": 34,
            "function": "errorHandler",
            "class": "CodeIgniter\\Debug\\Exceptions",
            "type": "->",
            "args": [
                8,
                "Undefined variable: postData",
                "C:\\xampp\\htdocs\\ghaseel\\app\\Controllers\\Home.php",
                34,
                {
                    "request": {
                        "uri": {},
                        "config": {
                            "baseURL": "http://localhost/ghaseel/",
                            "indexPage": "",
                            "uriProtocol": "PATH_INFO",
                            "defaultLocale": "en",
                            "negotiateLocale": false,
                            "supportedLocales": [
                                "en"
                            ],
                            "appTimezone": "Asia/Manila",
                            "charset": "UTF-8",
                            "forceGlobalSecureRequests": false,
                            "sessionDriver": "CodeIgniter\\Session\\Handlers\\FileHandler",
                            "sessionCookieName": "ci_session",
                            "sessionExpiration": 7200,
                            "sessionSavePath": "C:\\xampp\\htdocs\\ghaseel\\writable\\session",
                            "sessionMatchIP": false,
                            "sessionTimeToUpdate": 300,
                            "sessionRegenerateDestroy": false,
                            "cookiePrefix": "",
                            "cookieDomain": "",
                            "cookiePath": "/",
                            "cookieSecure": false,
                            "cookieHTTPOnly": true,
                            "cookieSameSite": "Lax",
                            "proxyIPs": "",
                            "CSRFTokenName": "csrf_test_name",
                            "CSRFHeaderName": "X-CSRF-TOKEN",
                            "CSRFCookieName": "csrf_cookie_name",
                            "CSRFExpire": 7200,
                            "CSRFRegenerate": true,
                            "CSRFRedirect": true,
                            "CSRFSameSite": "Lax",
                            "CSPEnabled": false
                        }
                    },
                    "data": []
                }
            ]
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\system\\CodeIgniter.php",
            "line": 896,
            "function": "depedentselect",
            "class": "App\\Controllers\\Home",
            "type": "->",
            "args": []
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\system\\CodeIgniter.php",
            "line": 466,
            "function": "runController",
            "class": "CodeIgniter\\CodeIgniter",
            "type": "->",
            "args": [
                {
                    "locations_model": {
                        "data": [],
                        "pager": null,
                        "primary_key": []
                    }
                }
            ]
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\system\\CodeIgniter.php",
            "line": 349,
            "function": "handleRequest",
            "class": "CodeIgniter\\CodeIgniter",
            "type": "->",
            "args": [
                null,
                {
                    "handler": "file",
                    "backupHandler": "dummy",
                    "storePath": "C:\\xampp\\htdocs\\ghaseel\\writable\\cache/",
                    "cacheQueryString": false,
                    "prefix": "",
                    "ttl": 60,
                    "reservedCharacters": "{}()/\\@:",
                    "file": {
                        "storePath": "C:\\xampp\\htdocs\\ghaseel\\writable\\cache/",
                        "mode": 416
                    },
                    "memcached": {
                        "host": "127.0.0.1",
                        "port": 11211,
                        "weight": 1,
                        "raw": false
                    },
                    "redis": {
                        "host": "127.0.0.1",
                        "password": null,
                        "port": 6379,
                        "timeout": 0,
                        "database": 0
                    },
                    "validHandlers": {
                        "dummy": "CodeIgniter\\Cache\\Handlers\\DummyHandler",
                        "file": "CodeIgniter\\Cache\\Handlers\\FileHandler",
                        "memcached": "CodeIgniter\\Cache\\Handlers\\MemcachedHandler",
                        "predis": "CodeIgniter\\Cache\\Handlers\\PredisHandler",
                        "redis": "CodeIgniter\\Cache\\Handlers\\RedisHandler",
                        "wincache": "CodeIgniter\\Cache\\Handlers\\WincacheHandler"
                    }
                },
                false
            ]
        },
        {
            "file": "C:\\xampp\\htdocs\\ghaseel\\index.php",
            "line": 55,
            "function": "run",
            "class": "CodeIgniter\\CodeIgniter",
            "type": "->",
            "args": []
        }
    ]
}"






















"<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>403 Forbidden</title>
</head><body>
<h1>Forbidden</h1>
<p>You don't have permission to access this resource.</p>
<hr>
<address>Apache/2.4.53 (Win64) OpenSSL/1.1.1n PHP/7.4.29 Server at localhost Port 80</address>
</body></html>
"


"<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>500 Internal Server Error</title>
</head><body>
<h1>Internal Server Error</h1>
<p>The server encountered an internal error or
misconfiguration and was unable to complete
your request.</p>
<p>Please contact the server administrator at 
 postmaster@localhost to inform them of the time this error occurred,
 and the actions you performed just before this error.</p>
<p>More information about this error may be available
in the server error log.</p>
<hr>
<address>Apache/2.4.53 (Win64) OpenSSL/1.1.1n PHP/7.4.29 Server at localhost Port 80</address>
</body></html>
"
"

<script>
    reloadTable()
    function reloadTable() {
      $.ajax({
        url: "<?php echo site_url(); ?>/CrudController/user_table",
        beforeSend: function (f) {
          $('#userTable').html('Load Table ...');
        },
        success: function (data) {
          $('#userTable').html(data);
        }
      })
    }
</script>



"<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Welcome to XAMPP</title>

    <meta name="description" content="XAMPP is an easy to install Apache distribution containing MariaDB, PHP and Perl." />
    <meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution" />

    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" /><link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>


    <link href="/dashboard/images/favicon.png" rel="icon" type="image/png" />


  </head>

  <body class="index">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=277385395761685";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div class="contain-to-grid">
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <li class="name">
            <h1><a href="/dashboard/index.html">Apache Friends</a></h1>
          </li>
          <li class="toggle-topbar menu-icon">
            <a href="#">
              <span>Menu</span>
            </a>
          </li>
        </ul>

        <section class="top-bar-section">
          <!-- Right Nav Section -->
          <ul class="right">
              <li class=""><a href="/applications.html">Applications</a></li>
              <li class=""><a href="/dashboard/faq.html">FAQs</a></li>
              <li class=""><a href="/dashboard/howto.html">HOW-TO Guides</a></li>
              <li class=""><a target="_blank" href="/dashboard/phpinfo.php">PHPInfo</a></li>
              <li class=""><a href="/phpmyadmin/">phpMyAdmin</a></li>
          </ul>
        </section>
      </nav>
    </div>

    <div id="wrapper">
      <div class="hero">
  <div class="row">
    <div class="large-12 columns">
      <h1><img src="/dashboard/images/xampp-logo.svg" />XAMPP <span>Apache + MariaDB + PHP + Perl</span></h1>
    </div>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <h2>Welcome to XAMPP for Windows 7.4.29</h2>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <p>
      You have successfully installed XAMPP on this system! Now you can start using Apache, MariaDB, PHP and other components.
      You can find more info in the <a href="/dashboard/faq.html">FAQs</a> section or check the <a href="/dashboard/howto.html">HOW-TO Guides</a> for getting started with PHP applications.
    </p>
    <p>
      XAMPP is meant only for development purposes. It has certain configuration settings that make it easy to develop locally but that are insecure if you want to have your installation accessible to others.
      If you want have your XAMPP accessible from the internet, make sure you understand the implications and you checked the <a href="/dashboard/faq.html">FAQs</a> to learn how to protect your site. Alternatively you can use <a href="https://bitnami.com/stack/wamp">WAMP</a>, <a href="https://bitnami.com/stack/mamp">MAMP</a> or <a href="https://bitnami.com/stack/lamp">LAMP</a> which are similar packages which are more suitable for production.
    </p>
    <p>
      Start the XAMPP Control Panel to check the server status.
    </p>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <h3>Community</h3>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <p>
      XAMPP has been around for more than 10 years &ndash; there is a huge community behind it. You can get involved by joining our <a href="https://community.apachefriends.org">Forums</a>, adding yourself to the <a href="https://www.apachefriends.org/community.html#mailing_list">Mailing List</a>, and liking us on <a href="https://www.facebook.com/we.are.xampp">Facebook</a>, following our exploits on <a href="https://twitter.com/apachefriends">Twitter</a>, or adding us to your <a href="https://plus.google.com/+xampp/posts">Google+</a> circles.
    </p>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <h3>Contribute to XAMPP translation at <a href="https://translate.apachefriends.org/">translate.apachefriends.org</a>.</h3>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <p>
      Can you help translate XAMPP for other community members? We need your help to translate XAMPP into different languages. We have set up a site, <a href="https://translate.apachefriends.org/">translate.apachefriends.org</a>, where users can contribute translations.
    </p>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <h3>Install applications on XAMPP using Bitnami</h3>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <p>
    Apache Friends and Bitnami are cooperating to make dozens of open source applications available on XAMPP, for free. Bitnami-packaged applications include Wordpress, Drupal, Joomla! and dozens of others and can be deployed with one-click installers.
    Visit the <a target="_blank" href="http://bitnami.com/stack/xampp?utm_source=bitnami&amp;utm_medium=installer&amp;utm_campaign=XAMPP%2BModule">Bitnami XAMPP page</a> for details on the currently available apps.
    </p>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <a href="http://bitnami.com/stack/xampp?utm_source=bitnami&utm_medium=installer&utm_campaign=XAMPP%2BModule" target="_blank"><img alt="Bitnami XAMPP page" src="/dashboard/images/bitnami-xampp.png" /></a>
  </div>
</div>

    </div>

    <footer>
      <div class="row">
        <div class="large-12 columns">
          <div class="row">
            <div class="large-8 columns">
              <ul class="social">
  <li class="twitter"><a href="https://twitter.com/apachefriends">Follow us on Twitter</a></li>
  <li class="facebook"><a href="https://www.facebook.com/we.are.xampp">Like us on Facebook</a></li>
  <li class="google"><a href="https://plus.google.com/+xampp/posts">Add us to your G+ Circles</a></li>
</ul>

              <ul class="inline-list">
                <li><a href="https://www.apachefriends.org/blog.html">Blog</a></li>
                <li><a href="https://www.apachefriends.org/privacy_policy.html">Privacy Policy</a></li>
                <li>
<a target="_blank" href="http://www.fastly.com/">                    CDN provided by
                    <img width="48" data-2x="/dashboard/images/fastly-logo@2x.png" src="/dashboard/images/fastly-logo.png" />
</a>                </li>
              </ul>
            </div>
            <div class="large-4 columns">
              <p class="text-right">Copyright (c) 2018, Apache Friends</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/dashboard/javascripts/all.js" type="text/javascript"></script>
  </body>
</html>
"




"<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
<hr>
<address>Apache/2.4.53 (Win64) OpenSSL/1.1.1n PHP/7.4.29 Server at localhost Port 80</address>
</body></html>
"




localhost inside htaccess

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]




inside module admini


<IfModule authz_core_module>
    Require all denied
</IfModule>
<IfModule !authz_core_module>
    Deny from all
</IfModule>
