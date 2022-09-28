<?php

namespace Modules\Admin\Controllers;
use Modules\Admin\Controllers\BaseController;

use App\Models\Cities as Cities_Model;
use App\Models\Cars_Db as Cars_Db_Model;
use App\Models\Brands_Db as Brands_Db_Model;
class Vehicleselect extends BaseController
{



    public function __construct()
    {

        $this->cities_model = new Cities_Model;
        $this->cars_db_model = new Cars_Db_Model;
        $this->brands_db_model = new Brands_Db_Model;
        helper(['form', 'url', 'string']);
       
    }
        
    public function index()
    {
        helper('cookie');
        $data['cities'] = $this->cities_model->viewcities();
        $data['cars'] = $this->cars_db_model->orderBy('id', 'DESC')->findAll();
        // echo '<pre>';
        // print_r($data['cities']);
        // exit;
        return view('Modules\Admin\Views\pages\frontend\index',  $data);
     
    }

    public function brands()
    {
        helper('cookie');
        $data['brands'] = $this->brands_db_model->orderBy('id', 'DESC')->findAll();
        $data['cities'] = $this->cities_model->viewcities();
        return view('Modules\Admin\Views\pages\frontend\brand1',  $data);
    }


    public function locate(){
        if ($this->request->getMethod() == 'post') {
            extract($this->request->getPost());
        helper("cookie");
      
        set_cookie("location", "$product_name", 3600);
        //delete_cookie("location");
        return   get_cookie("location");
        }

         // remove cookie value 
    }

}