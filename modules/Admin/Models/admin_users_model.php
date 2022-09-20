<?php



namespace Modules\Admin\Models;

use CodeIgniter\Model;

class Admin_Users_Model extends Model
{
   
        protected $table = 'admin_users';
        // .. other member variables
        protected $db;
        public $primary_key;
    
        public function __construct()
        {
            parent::__construct();
            $this->db = \Modules\Admin\Config\Database::connect();
            $this->table = substr(strtolower(get_class($this)), 0, -6);
            $this->primary_key = array();
            $this->date = array();
            // OR $this->db = db_connect();
        }
     
       
    
        public function update_data()
        {
            $this->db->table($this->table)->update($this->data, $this->primary_key);
            return $this->db->affectedRows();
        }



        // public function update() {
        //     $this->db->update($this->table, $this->data, $this->primary_key);
        //     $this->reset();
        //     return true;
        // }





    
        public function delete_data($id)
        {
            return $this->db->table($this->table)->delete(array(
                "id" => $id,
            ));
        }
    
        public function get_all_data()
        {
            $query = $this->db->query('select * from ' . $this->table);
            return $query->getResult();
        }
    
    

  
    public $data;

   

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

 

    public function login($data) {
        $this->db->table($this->table)->where('a.role_id', $data['role_id']);
        $this->db->table($this->table)->where('a.password', md5($data['password']));
        $this->db->table($this->table)->where('a.status_ind', '1');
        $this->db->table($this->table)->from($this->table . ' as a');
        $this->db->table($this->table)->join('admin_roles as ar', 'a.role_id=ar.role_id', 'left');
        $query = $this->db->table($this->table)->get();
        $row = $this->db->table($this->table)->$query->row();
        return $row;
    }

   
        public function insert_data($data = array())
        {
            $this->db->table($this->table)->insert($data);
            return $this->db->insertID();
        }

        // public function is_exist($data) {
        //     $this->db->where('email', $data['email']);
        //     $this->db->where('status_ind', '1');
        //     $query = $this->db->get($this->table);
        //     $row = $query->row();
        //     return $row;
        // }
        // public function change_password($email,$newpassword,$table) {
        //     $this->db->set('password', md5($newpassword));
        //     $this->db->where('email',$email);
        //     $this->db->update($table);
        //     $this->reset();
        //     return true;
        // }


        // public function get_row() {
        //     $this->db->where($this->primary_key);
        //     $this->db->select('u.*,r.role_name');
        //     $this->db->from($this->table . ' as u');
        //     $this->db->join('admin_roles as r', 'u.role_id=r.role_id', 'left');
        //     $query = $this->db->get();
        //     $row = $query->row();
        //     return $row;
        // }
    
        // public function session_id() {
        //     $this->db->where($this->primary_key);
        //     $this->db->where('status_ind', '1');
        //     $query = $this->db->get($this->table);
        //     $row = $query->row();
        //     if (!empty($row->user_session_id)) {
        //         return $row->user_session_id;
        //     } else {
        //         return false;
        //     }
        // }
    
       
    
       
    
        // public function delete() {
        //     $this->db->delete($this->table, $this->primary_key);
        //     $this->reset();
        //     return true;
        // }
        
        // public function get_result($table){
        //     $this->db->select('*');
        //     $this->db->from($table);
        //     $q = $this->db->get();
        //     return $q->result();    
        // }
        // public function check_email($table,$field_name,$field_value){
        //     $this->db->select('*');
        //     $this->db->where($field_name,$field_value);
        //     $q = $this->db->get($table);
        //     $this->reset_pk();
        //     return $q->result();
        //     }
        // public function check_settings($table,$field_name,$field_value){
        //     $this->db->select('*');
        //     $this->db->where($field_name,$field_value);
        //     $q = $this->db->get($table);
        //     $this->reset_pk();
        //     return $q->result();
        //     }
    
        //     public function view_row($table){
        //         return $this->db->select('*')->where('user_id',$this->session->userdata('user_id'))->get($table)->row();
        //     }
    
        //     public function get_rowdata($table){
        //         $q = $this->db->select('*')->where($this->primary_key)->get($table)->row();
        //         $this->reset_pk();
        //         return $q;
        //     }
        //     public function get_data($table){
        //         $q = $this->db->select('*')->where($this->primary_key)->get($table)->result();
        //         $this->reset_pk();
        //         return $q;
        //     }
    
            // public function insert_data($table){
            //     $q = $this->db->insert($table, $this->data);
            //     $this->reset();
            //     return true;
            // }
}