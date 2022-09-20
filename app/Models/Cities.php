<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class Cities extends Model {

    protected $table            = 'cities';
    protected $primaryKey       = 'id';
    protected $allowedFields = ['city_name', 'status_ind', 'created_date' , 'added_by'];
    public $data;
    protected $db;
    function __construct() {
        parent::__construct();
        $this->db = Database::connect();
        $this->table = 'cities';
        $this->primary_key = array();
        $this->data = array();
       
    }




    public function viewcities() {
    
        $this->db->table($this->table)->orderBy('ar.id' ,'DESC');
        $sql = 'SELECT ar.*,u.locations_name as locations_name, GROUP_CONCAT(locations_name) as differentlocations from '.$this->table . ' as ar LEFT JOIN locations as u ON ar.id = u.city_id where ar.status_ind = 1 GROUP BY ar.id, ar.city_name';
       // $sql = ' SELECT ar.*,u.locations_name as locations_name from '.$this->table . ' as ar LEFT JOIN locations as u ON ar.id = u.city_id where ar.status_ind = 1';

       $query = $this->db->query($sql);
       $result = $query->getResultObject();
       return $result;
   }




   public function get_row($id){
 $sql3 = ' SELECT ar.*,u.locations_name as locations_name from '.$this->table . ' as ar LEFT JOIN locations as u ON ar.id = u.city_id   where id = '.$id.'';
    // echo '<pre>';
    // print_r($sql3);
    // exit;
    $query = $this->db->query($sql3);
    $result = $query->getResultObject();
    return $result;
}







    public function dataInsert(array $data) {
		$db      = \Config\Database::connect();
		$builder = $db->table('cities'); 

		if ($builder->insert($data)) {
			return $db->insertID();
		} else {
			return FALSE;
		}
	}



   
   

}