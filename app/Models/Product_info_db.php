<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class Product_info_db extends Model {

    protected $table            = 'product_info';
    protected $primaryKey       = 'id';
    protected $allowedFields = ['product_name', 'product_description', 'product_category_id' , 'product_image', 'retail_price', 'selling_price', 'quantity', 'created_date', 'added_by'];
    public $data;
    protected $db;
    function __construct() {
        parent::__construct();
        $this->db = Database::connect();
        $this->table = 'product_info';
        $this->primary_key = array();
        $this->data = array();
       
    }

    


    public function get_row($id){

        $sql3 = 'SELECT a.*, b.id as category_id FROM '.$this->table .' a Left JOIN category b on b.id = a.product_category_id where a.id = '.$id.'';
        // echo '<pre>';
         //print_r($sql3);
        //exit;
        $query = $this->db->query($sql3);
        $result = $query->getResultObject();
        return $result;
    }
	
	 public function get_row_list($id){
        $sql5 = 'SELECT a.*, GROUP_CONCAT(b.Services ORDER BY b.id) Services FROM company a INNER JOIN services b ON FIND_IN_SET(b.id, a.company_service_id) > 0 where a.company_user_id ='.$id.'  GROUP BY a.company_service_id';
        //    echo '<pre>';
        //    print_r($sql5);
        //    exit;
           $query = $this->db->query($sql5);
           $result = $query->getResultObject();
           return $result;
       }

}