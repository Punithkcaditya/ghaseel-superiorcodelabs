<?php

namespace Modules\Admin\Models;

use CodeIgniter\Model;

class Admin_Roles_Model extends Model {

    protected $table;
    public $primary_key;
    public $data;
    protected $db;
    function __construct() {
        parent::__construct();
        $this->db = \Modules\Admin\Config\Database::connect();
        $this->table = substr(strtolower(get_class($this)), 0, -6);
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
       return $this->db->table($this->table)->$query->result();
   }



    // public function get_max_value($field) {
    //     $this->db->select_max($field);
    //     $query = $this->db->get($this->table);
    //     $row = $query->row();
    //     return $row->$field;
    // }

    // public function get_row() {
    //     $this->db->where($this->primary_key);
    //     $query = $this->db->get($this->table);
    //     $row = $query->row();
    //     $this->reset_pk();
    //     return $row;
    // }

    // public function is_exist() {
    //     $this->db->where($this->primary_key);
    //     $this->db->select('COUNT(*) as counter');
    //     $query = $this->db->get($this->table);
    //     $row = $query->row();
    //     return $row->counter;
    // }
    //  public function get_row_rolename($role_id){ //print_r($name); exit;
    //    $query = $this->db->get_where('admin_roles', array("role_id"=>$role_id));//$this ->db ->get('admin_users');
    //    //print_r($query->result());
    //    //exit;
    //    return $query->result();
    // }


    // public function view() {
    //      //$this->db->order_by('role_id ASC');
    //     $this->db->order_by('ar.modified_date DESC');
    //    // $this->db->where('ar.role_id >', '1');
    //     $this->db->select('ar.*,u.username as last_modified_user,au.username as created_user');
    //     $this->db->from($this->table . ' as ar');
    //     $this->db->join('admin_users as u', 'ar.last_modified_by = u.user_id' , 'left');
    //     $this->db->join('admin_users as au', 'ar.created_by = au.user_id' , 'left');
    //     $this->db->where('is_superadmin','0');
    //     $query = $this->db->get();
    //     //$query = $this->db->get($this->table);
    //     return $query->result();
    // }


    //     public function view1() {
    //     $this->db->group_by('role_id');
    //     $this->db->where('u.role_id >', '0');
    //     $this -> db -> select('u.*,s.role_id,s.role_name');
    //     $this -> db -> from($this -> table . ' as u');
    //     $this->db->where('u.status_ind', '1');
    //     $this -> db -> join('admin_roles as s', 's.role_id = u.role_id', 'left');
    //         $this->db->where('is_superadmin','0');
    //     $query = $this->db->get($this->table);
    //     return $query->result();
    // }
 



    // public function viewrol(){ //print_r($name); exit;
    //    $query = $this->db->get_where('admin_users', array('status_ind' =>1));//$this ->db ->get('admin_users');
    //    //print_r($query->result());
    //    //exit;
    //    return $query->result();
    // }
    // public function insert() {
    //     $this->db->insert($this->table, $this->data);
    //     $this->reset_data();
    //     return true;
    // }

    // public function update() {
    //     $this->db->update($this->table, $this->data, $this->primary_key);
    //     $this->reset();
    //     return true;
    // }

    // public function delete() {
    //     $this->db->delete($this->table, $this->primary_key);
    //     $this->reset_pk();
    //     return true;
    // }
    // public function get_maxx_value($table,$field) {
    //     $this->db->select_max($field);
    //     $query = $this->db->get($table);
    //     $row = $query->row();
    //     return $row->$field;
    // }

    // public function get_datarow($table_name) {
    //     $this->db->where($this->primary_key);
    //     $query = $this->db->get($table_name);
    //     $row = $query->row();
    //     $this->reset_pk();
    //     return $row;
    // }
    // public function get_data($table_name) {
    //     $this->db->select('*');
    //     $this->db->from($table_name);
    //     $query = $this->db->get();
	// 	$row = $query->result();
    //     return $row;
    // }
    // public function insertdata($table_name) {
    //     $this->db->insert($table_name, $this->data);
    //     $this->reset_data();
    //     return $this->db->insert_id();
    // }
    // public function updatedata($table_name) {
    //     $this->db->update($table_name, $this->data, $this->primary_key);
    //     $this->reset();
    //     return true;
    // }
    // public function deleterow($table) {
    //     $this->db->delete($table, $this->primary_key);
    //     $this->reset_pk();
    //     return true;
    // }
}