<?php


namespace Modules\Admin\Controllers;



class AdminController extends \CodeIgniter\Controller{
    public function index(){
        // echo "Admin Module Index Function";
       return view("Modules\Admin\Views\admin");
}

}