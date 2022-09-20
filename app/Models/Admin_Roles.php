<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class Admin_Roles extends Model {

    protected $table            = 'admin_roles';
    protected $primaryKey       = 'role_id';
    protected $allowedFields = ['role_name', 'status_ind', 'created_date' , 'created_by', 'last_modified_by'];
    public $data;
    protected $db;
    function __construct() {
        parent::__construct();
        $this->db = Database::connect();
        $this->table = 'admin_roles';
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


    public function viewrole() {
        //$this->db->order_by('role_id ASC');
        $this->db->table($this->table)->orderBy('ar.modified_date' ,'DESC');
      // $this->db->where('ar.role_id >', '1');
       //$this->db->where('ar.admin_disp', '1');
       $this->db->table($this->table)->select('ar.*,u.username as last_modified_user,au.username as created_user');
       $this->db->table($this->table)->from($this->table . ' as ar');
       $this->db->table($this->table)->join('admin_users as u', 'ar.last_modified_by = u.user_id' , 'left');
       $this->db->table($this->table)->join('admin_users as au', 'ar.created_by = au.user_id' , 'left');
       $this->db->table($this->table)->where('is_superadmin','0');
       $query = $this->db->table($this->table)->get();
       //$query = $this->db->get($this->table);
   
       return $this->db->table($this->table)->$query->getRowArray();
   }


   public function get_row() {

    foreach($this->primary_key as $value){
        $id  = $value;
            }
    $sql2 = 'SELECT *   from admin_roles  where role_id =  '.$id.' ';
    $query = $this->db->query($sql2);
    $result = $query->getResultObject();
    return $result;
   }

}