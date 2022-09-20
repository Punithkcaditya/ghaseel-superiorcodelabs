<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class Services_Model extends Model {

    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $allowedFields = ['Services', 'company_id', 'status_ind',  'created_at', 'added_by', 'addservicesdescription', 'duration', 'Service_thumbnail'];
    public $data;
    protected $db;
    function __construct() {
        parent::__construct();
        $this->db = Database::connect();
        $this->table = 'services';
        $this->primary_key = array();
        $this->data = array();
       
    }




    public function viewcompany() {
    
        $this->db->table($this->table)->orderBy('ar.id' ,'DESC');
        $sql = 'SELECT ar.*,u.company_name  from '.$this->table . ' as ar LEFT JOIN company as u ON ar.company_id = u.company_user_id where ar.status_ind = 1 ';
       // $sql = ' SELECT ar.*,u.locations_name as locations_name from '.$this->table . ' as ar LEFT JOIN locations as u ON ar.id = u.city_id where ar.status_ind = 1';
// echo '<pre>';
// print_r($sql);
// exit;
       $query = $this->db->query($sql);
       $result = $query->getResultObject();
       return $result;
   }



   public function get_row($id) {

    $sql2 = 'SELECT *   from services  where id =  '.$id.' ';
    $query = $this->db->query($sql2);
    $result = $query->getResultObject();
    return $result;
   }

}