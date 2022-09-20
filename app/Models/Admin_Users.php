<?php



namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class Admin_Users extends Model
{
   
        protected $table = 'admin_users';
        protected $primaryKey       = 'user_id';
        protected $db;
        protected $allowedFields    = ['employee_id' , 'first_name', 'username', 'user_session_id', 'profile_pic', 'customer_location_id', 'is_type', 'last_active', 'login_token', 'modified_by' , 'modified_date',  'last_name', 'phone_number', 'role_id' , 'status_ind' , 'created_by', 'created_date', 'email', 'password'];
        public function __construct()
        {
            parent::__construct();
            $this->db = Database::connect();
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

        $builder = $this->db->table($this->table);
        $this->db->table($this->table)->where('a.role_id', $data['role_id']);
        $this->db->table($this->table)->where('a.password', md5($data['password']));
        $this->db->table($this->table)->where('a.status_ind', '1');
        $this->db->table($this->table)->from($this->table . ' as a');
        $this->db->table($this->table)->join('admin_roles as ar', 'a.role_id=ar.role_id', 'left');
        // $sql[] = '('. $builder->getCompiledSelect() .')';

    }


	public function loginnew( $data) { 
        $sql1 = 'SELECT role_id from admin_users where password = "' .md5($data['password']). '" and email = "'.$data['email'].'"';
        $query1 = $this->db->query($sql1);
        $result1 = $query1->getResultObject();
        foreach($result1 as $value1){
            $id1  = $value1;
                }
                if (empty($id1) ) {
                    return false;
                }
		$sql = 'SELECT a.*   FROM ' . $this->table . ' a LEFT JOIN admin_roles ar ON a.role_id = ar.role_id where a.role_id = ' .$id1->role_id. ' AND  a.password = "' .md5($data['password']). '" AND a.status_ind = 1 AND a.email = "'.$data['email'].'"'; 
        // echo '<pre>';
        // print_r($sql);
        // exit;
		$query = $this->db->query($sql);
		$result = $query->getResultObject();
		return $result;
	}





    public function updateData()
{
        $builder = $this->db->table("admin_users");
  
        $updated_data = $this->data;
  	    
        $builder->where([
            "user_id" => $this->primary_key
        ]);
        $builder->set($updated_data);
  
        return $builder->update(); 
}


public function findroles($role_id){
    $sql3 = 'SELECT * FROM '.$this->table .' where role_id = '.$role_id.'';
    // echo '<pre>';
    // print_r($sql3);
    // exit;
    $query = $this->db->query($sql3);
    $result = $query->getResultObject();
    return $result;
}

public function session_id() {

    
    foreach($this->primary_key as $value){
$id  = $value;
    }
   
    $sql = 'SELECT *   FROM ' . $this->table . '  where user_id = ' .$id. ' AND  status_ind = 1';
    $query = $this->db->query($sql);
    $result = $query->getResultObject();
        if (!empty($result['user_session_id'])) {
            return $result['user_session_id'];
        } else {
            return false;
        }
}
   
        public function insert_data($data = array())
        {
            $this->db->table($this->table)->insert($data);
            return $this->db->insertID();
        }



        public function get_row() {
            foreach($this->primary_key as $value){
                $id  = $value;
                    }
            $sql2 = 'SELECT u.* , r.role_name from admin_users as u LEFT JOIN admin_roles as r ON u.role_id = r.role_id where user_id =  '.$id.' ';
            $query = $this->db->query($sql2);
            $result = $query->getResultObject();
            return $result;
        //     echo '<pre>';
        // print_r($sql2);
        // exit;
        }
    
}