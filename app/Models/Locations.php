<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class Locations extends Model {

    protected $table            = 'locations';
    protected $primaryKey       = 'location_id';
    protected $allowedFields = ['locations_name', 'city_id', 'status_ind', 'created_date' , 'added_by'];
    public $data;
    protected $db;
    function __construct() {
        parent::__construct();
        $this->db = Database::connect();
        $this->table = 'locations';
        $this->primary_key = array();
        $this->data = array();
       
    }

    public function dependentdata($postData){
        $sql3 = ' SELECT * from '.$this->table . '  where city_id = '.$postData['city'].' and status_ind = 1';
        $query = $this->db->query($sql3);
        return $query->getResult();
    }

}