<?php

$routes->setDefaultNamespace('Modules\Admin\Controllers');

$routes->get('admin2', '\Modules\Admin\Controllers\AdminController::index');

$routes->get('admin', '\Modules\Admin\Controllers\index::index',['filter' => 'authenticated']);
$routes->match(['post'], 'adminlogin', 'index::index');
$routes->get('adminlogout', 'Auth::logout');
$routes->get('add', '\Modules\Admin\Controllers\index::add');
$routes->get('addrole', '\Modules\Admin\Controllers\index::addrole');
$routes->match(['post'], 'settingsupdate', 'index::settingsupdate');
$routes->get('settings', '\Modules\Admin\Controllers\index::settings');
$routes->get('Admindashboard', '\Modules\Admin\Controllers\index::dashboard');
$routes->get('addNew', '\Modules\Admin\Controllers\index::addNew');
$routes->get('addNewCars', '\Modules\Admin\Controllers\index::addNewCars');
$routes->get('addNewCity', '\Modules\Admin\Controllers\Addcities::addNewCity');
$routes->get('addNewCategory', '\Modules\Admin\Controllers\Addcategory::addNewCategory');
$routes->get('addNewCompanyList', '\Modules\Admin\Controllers\Addcompanylist::addNewCompany');
$routes->get('addnewroles', '\Modules\Admin\Controllers\index::addnewroles');
$routes->get('addproduct', '\Modules\Admin\Controllers\AddProduct');
$routes->get('addNewProduct', '\Modules\Admin\Controllers\AddProduct::createnewproduct');
$routes->get('addtocart', '\Modules\Admin\Controllers\addtocartcontroller');
$routes->get('productload_cart', '\Modules\Admin\Controllers\addtocartcontroller::load_cart');
$routes->get('servicelist', '\Modules\Admin\Controllers\Servicelist');
$routes->get('servicelistwo', '\Modules\Admin\Controllers\Servicelist::addNewServices');
$routes->get('brandslist', '\Modules\Admin\Controllers\Brandslist');
$routes->get('addNewBrands', '\Modules\Admin\Controllers\Brandslist::addNewBrands');



$routes->match(['post'], 'addnewuser', 'index::addnewuser');
$routes->match(['post'], 'savenewroles', 'index::savenewroles');
$routes->match(['post'], 'editnewuser', 'index::editnewuser/$1');
$routes->match(['post'], 'editnewroles', 'index::editnewroles/$1');
$routes->match(['post'], 'saveaccess', 'index::saveaccess');
$routes->match(['post'], 'savepermission', 'index::savepermission');
$routes->match(['post'], 'formstore', 'index::formstore');
$routes->match(['post'], 'addnewcities', '\Modules\Admin\Controllers\Addcities::addnewcities');
$routes->match(['post'], 'savenewcategories', '\Modules\Admin\Controllers\Addcategory::savenewcategories');
$routes->match(['post'], 'savenewcompany', '\Modules\Admin\Controllers\Addcompany::savenewcompany');
$routes->match(['post'], 'savenewcompanylist', '\Modules\Admin\Controllers\Addcompanylist::savenewcompany');
$routes->match(['post'], '/depedentselecttwo', '\Modules\Admin\Controllers\Addcompany::depedentselecttwo');
$routes->match(['post'], '/depedentselectthree', '\Modules\Admin\Controllers\Addcompanylist::depedentselecttwo');
$routes->match(['post'], 'savenewservices', '\Modules\Admin\Controllers\Addservices::savenewservices');
$routes->match(['post'], 'savenewproductinfo', '\Modules\Admin\Controllers\AddProduct::savenewproductinfo');
$routes->match(['post'], '/productadd_to_cart', '\Modules\Admin\Controllers\addtocartcontroller::add_to_cart');
$routes->match(['post'], '/productdelete_cart', '\Modules\Admin\Controllers\addtocartcontroller::delete_cart');
$routes->match(['post'], 'savenewserviceinfo', '\Modules\Admin\Controllers\Servicelist::savenewserviceinfo');
$routes->match(['post'], 'savebrands', '\Modules\Admin\Controllers\Brandslist::savebrands');

$routes->get('vehicleaddition', '\Modules\Admin\Controllers\index::vehicleaddition');
$routes->get('city', '\Modules\Admin\Controllers\Addcities');
$routes->get('addservices', '\Modules\Admin\Controllers\Addservices');
$routes->get('addNewServices', '\Modules\Admin\Controllers\Addservices::addNewServices');
$routes->get('category', '\Modules\Admin\Controllers\Addcategory');
$routes->get('company', '\Modules\Admin\Controllers\Addcompany');
$routes->get('companylist', '\Modules\Admin\Controllers\Addcompanylist');
$routes->get('user_delete/(:any)', '\Modules\Admin\Controllers\index::user_delete/$1');
$routes->get('vehicle_delete/(:any)', '\Modules\Admin\Controllers\index::vehicle_delete/$1');
$routes->get('city_delete/(:any)', '\Modules\Admin\Controllers\Addcities::city_delete/$1');
$routes->get('category_delete/(:any)', '\Modules\Admin\Controllers\Addcategory::category_delete/$1');
$routes->get('company_delete/(:any)', '\Modules\Admin\Controllers\Addcompany::company_delete/$1');
$routes->get('service_delete/(:any)', '\Modules\Admin\Controllers\Addservices::service_delete/$1');
$routes->get('delete_service/(:any)', '\Modules\Admin\Controllers\Servicelist::service_delete/$1');
$routes->get('product_delete/(:any)', '\Modules\Admin\Controllers\AddProduct::product_delete/$1');
$routes->get('brand_delete/(:any)', '\Modules\Admin\Controllers\Brandslist::brand_delete/$1');


$routes->get('access/(:any)', '\Modules\Admin\Controllers\index::access/$1');
$routes->get('permission/(:any)', '\Modules\Admin\Controllers\index::permission/$1');
$routes->get('user_edit/(:any)', '\Modules\Admin\Controllers\index::user_edit/$1/$2');
$routes->get('user_rolesedit/(:segment)', '\Modules\Admin\Controllers\index::user_rolesedit/$1/$2');
$routes->get('vehicle_edit/(:segment)', '\Modules\Admin\Controllers\index::vehicle_edit/$1');
$routes->get('city_edit/(:segment)', '\Modules\Admin\Controllers\Addcities::editcity/$1');
$routes->get('category_edit/(:segment)', '\Modules\Admin\Controllers\Addcategory::category_edit/$1');
$routes->get('company_edit/(:segment)', '\Modules\Admin\Controllers\Addcompany::company_edit/$1');
$routes->get('delete_company/(:segment)', '\Modules\Admin\Controllers\Addcompanylist::company_delete/$1');
$routes->get('edit_company/(:segment)', '\Modules\Admin\Controllers\Addcompanylist::company_edit/$1');
$routes->get('service_edit/(:segment)', '\Modules\Admin\Controllers\Addservices::service_edit/$1');
$routes->get('product_edit/(:segment)', '\Modules\Admin\Controllers\AddProduct::product_edit/$1');
$routes->get('edit_service/(:segment)', '\Modules\Admin\Controllers\Servicelist::edit_service/$1');
$routes->get('brand_edit/(:segment)', '\Modules\Admin\Controllers\Brandslist::brand_edit/$1');

// $routes->match(['post'], 'user_edit/(:num)', 'Modules\Admin\Controllers\index::user_edit/$1');



// ghaseel front end


$routes->get('vehicleselect', '\Modules\Admin\Controllers\Vehicleselect');
$routes->get('brands', '\Modules\Admin\Controllers\Vehicleselect::brands');
$routes->match(['post'], '/locate', '\Modules\Admin\Controllers\Vehicleselect::locate');