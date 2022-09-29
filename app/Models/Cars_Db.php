<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class Cars_Db extends Model {

    protected $table            = 'vehicle_type';
    protected $primaryKey       = 'id';
    protected $allowedFields = ['vehicle_name', 'name', 'type' , 'created_at'];
    public $data;
    protected $db;
    function __construct() {
        parent::__construct();
        $this->db = Database::connect();
        $this->table = 'vehicle_type';
        $this->primary_key = array();
        $this->data = array();
       
    }

    private function reset() {
        $this->primary_key = array();
        $this->data = array();
    }

    private function reset_pk() {
        $this->primary_key = array();
    }

    private function reset_data() {
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