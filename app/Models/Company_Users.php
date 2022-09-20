<?php



namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class Company_Users extends Model
{
   
        protected $table = 'company';
        protected $primaryKey       = '	company_user_id';
        protected $db;
        protected $allowedFields    = ['company_id' , 'company_name',  'user_session_id', 'profile_pic', 'customer_location_id', 'is_type', 'last_active', 'login_token', 'modified_by' , 'modified_date',  'company_email', 'phone_number', 'role_id' , 'status_ind' , 'created_by', 'created_date',  'password', 'customer_city_branches_id', 'company_service_id'];
        public function __construct()
        {
            parent::__construct();
            $this->db = Database::connect();
            $this->primary_key = array();
            $this->date = array();
           
            // OR $this->db = db_connect();
        }
     
        public function dataInsert(array $data) {
            $db      = \Config\Database::connect();
            $builder = $db->table('company'); 
    
            if ($builder->insert($data)) {
                return $db->insertID();
            } else {
                return FALSE;
            }
        }
    

        public function viewcompany() {
    
            $this->db->table($this->table)->orderBy('ar.company_user_id' ,'DESC');
            $sql = 'SELECT ar.*,u.Services as Services, GROUP_CONCAT(Services) as differentservices from '.$this->table . ' as ar LEFT JOIN services as u ON ar.company_user_id = u.company_id where ar.status_ind = 1 GROUP BY ar.company_user_id';
           // $sql = ' SELECT ar.*,u.locations_name as locations_name from '.$this->table . ' as ar LEFT JOIN locations as u ON ar.id = u.city_id where ar.status_ind = 1';
    //    echo '<pre>';
    //        print_r($sql);
    //        exit;
           $query = $this->db->query($sql);
           $result = $query->getResultObject();
           return $result;
       }
      

       public function get_row($id){
        $sql3 = ' SELECT ar.*,u.Services as Services, GROUP_CONCAT(Services) as differentservices, u.company_id as company_reference_id from '.$this->table . ' as ar LEFT JOIN services as u ON ar.company_user_id = u.company_id   where ar.company_user_id = '.$id.' GROUP BY ar.company_user_id';
        //    echo '<pre>';
        //    print_r($sql3);
        //    exit;
           $query = $this->db->query($sql3);
           $result = $query->getResultObject();
           return $result;
       }

       public function viewlists() {
        $gap = " ";
        $nogap = "";
        $sql4 = ' SELECT company.*, GROUP_CONCAT(services.Services) as tagsname FROM company LEFT JOIN services ON FIND_IN_SET(services.id,REPLACE(company.company_service_id, " ", "")) > 0 GROUP BY company.company_user_id';
        // $sql4 = "SELECT a.*, GROUP_CONCAT(b.Services ORDER BY b.id) Services FROM company a INNER JOIN services b ON FIND_IN_SET(b.id, a.company_service_id) > 0 GROUP BY a.company_service_id";
        //      echo '<pre>';
        //    print_r($sql4);
        //    exit;
        $query = $this->db->query($sql4);
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