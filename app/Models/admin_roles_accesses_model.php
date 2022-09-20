<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_Roles_Accesses_Model extends Model {

    protected $table = 'admin_roles_accesses';
    public $primary_key;
    public $data;
    protected $allowedFields    = ['role_id' , 'menuitem_id', 'add_permission', 'edit_permission', 'delete_permission'];


    function __construct() {
        parent::__construct();
        $this->db = \Modules\Admin\Config\Database::connect();
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

    public function get_role_access($role_id, $parent_menuitem_id = NULL) {
        if (empty($parent_menuitem_id)) {
            $sql = 'SELECT *   FROM admin_menuitems as am  LEFT JOIN ' . $this->table . ' as ua ON am.menuitem_id = ua.menuitem_id where am.parent_menuitem_id IS NULL    AND ua.role_id =  '.$role_id.'  AND am.status_ind =  1  ORDER BY `display_order` asc'; 
        } else {

// personal try

 $sql = 'SELECT *   FROM admin_menuitems as am  LEFT JOIN ' . $this->table . ' as ua ON am.menuitem_id = ua.menuitem_id where am.parent_menuitem_id ='.$parent_menuitem_id.'   AND ua.role_id =  '.$role_id.'  AND am.status_ind =  1  ORDER BY `display_order` asc'; 
       
        }
        
        $query = $this->db->query($sql);
        if ($query->getNumRows() > 0) {
            $result = $query->getResultObject();
            $tmpresult = $result;
            
            for ($i = 0; $i < count($tmpresult); $i++) {
                $tmpresult[$i]->submenus = $this->get_role_access($role_id, $tmpresult[$i]->menuitem_id);
            }
            return $tmpresult;
        } else {
            return;
        }
    }


public function view($role_id = 1){
    $sqle = 'SELECT *   FROM ' . $this->table . '  where role_id = ' . $role_id . ' ';
        // echo '<pre>';
        // print_r($sql);
        // exit;
        $query = $this->db->query($sqle);
        $result = $query->getResultObject();
        return $result;

}


public function view_access($role_id){
    $sql = 'SELECT a.* , am.parent_menuitem_id, am.menuitem_link, am.menuitem_text FROM admin_roles_accesses as a  LEFT JOIN admin_menuitems as am ON a.menuitem_id = am.menuitem_id where a.role_id = '.$role_id.'  '; 
    //  echo '<pre>';
    //     print_r($sql);
    //     exit;
    $query = $this->db->query($sql);
    $result = $query->getResultObject();
    return $result;
}


}