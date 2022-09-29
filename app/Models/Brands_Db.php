<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class Brands_Db extends Model {

    protected $table            = 'brand';
    protected $primaryKey       = 'id';
    protected $allowedFields = ['model_name', 'avatar',  'created_at'];
    public $data;
    protected $db;
    function __construct() {
        parent::__construct();
        $this->db = Database::connect();
        $this->table = 'brand';
        $this->primary_key = array();
        $this->data = array();
       
    }

 

    public function get_row($id){

        $sql3 = 'SELECT * FROM '.$this->table .' where id = '.$id.'';
        // echo '<pre>';
        // print_r($sql3);
        // exit;
        $query = $this->db->query($sql3);
        $result = $query->getResultObject();
        return $result;
    }

}