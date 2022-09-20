<?php


namespace Modules\Admin\Controllers;

use Modules\Admin\Controllers\BaseController;

use App\Models\Admin_Users as Admin_Users_Model;
use App\Models\Admin_Roles as Admin_Roles_Model;
use App\Models\Admin_Menuitems as Admin_Menuitems_Model;
use App\Models\Admin_Roles_Accesses_Model as Admin_Roles_Accesses_Model;
use App\Models\Admin_Users_Accesses_Model as Admin_Users_Accesses_Model;
use App\Models\Settings_Model as Settings_Model;
use App\Models\Cars_Db as Cars_Db_Model;
use App\Models\Cities as Cities_Model;
use App\Models\Locations as Locations_Model;
use App\Models\Company_Users as Company_Users;
use App\Models\Services_Model as Services_Model;
use App\Models\Category_Db as Category_Db;
use App\Models\Product_info_db as Product_info_db;
use App\Models\Addtocart_db as Addtocart_db;









class addtocartcontroller extends BaseController
{


    public function __construct()
    {
       
        $this->admin_users_model = new Admin_Users_Model;
        $this->admin_roles_model = new Admin_Roles_Model;
        $this->settings_model = new Settings_Model;
        $this->admin_roles_accesses_model = new Admin_Roles_Accesses_Model;
        $this->admin_users_accesses_model = new Admin_Users_Accesses_Model;
        $this->admin_menuitems_model = new Admin_Menuitems_Model;
        $this->cars_db_model = new Cars_Db_Model;
        $this->cities_model = new Cities_Model;
        $this->locations_model = new Locations_Model;
        $this->company_users = new Company_Users;
        $this->services_model = new Services_Model;
        $this->category_db = new Category_Db;
        $this->product_info_db = new Product_info_db;
        $this->addtocart_db = new Addtocart_db;
        $this->request = \Config\Services::request();
        helper(['form', 'url', 'string']);
        
       
    }


    function index(){
		$data['data']=$this->product_info_db->orderBy('id', 'DESC')->findAll();
        return view('Modules\Admin\Views\pages\addtocart\addtocart', $data);
	}


    function add_to_cart(){ 
        helper(['form', 'url']);

        $db      = \Config\Database::connect();
        $builder = $db->table('addtocart');
        $session = session();
        $data = ['session' => $session, 'request' => $this->request];
        $pot = json_decode(json_encode($session->get('userdata')), true);
        // echo '<pre>';
        // print_r($pot);
        // exit;
        if (empty($pot[0])) {
            return   redirect()->to('/Auth/index');
        } else {
            $user_id = $pot[0]['user_id'];
            $role_id = $pot[0]['role_id'];
        }
        if ($this->request->getMethod() == 'post') {
            extract($this->request->getPost());
		$data = array(
			'product_id' => $product_id, 
			'product_name' => $product_name, 
			'product_price' => $product_price, 
			'qty' => $quantity,
            'created_date' => date('Y-m-d'),
            'added_by' =>  $pot[0]['user_id']
		);
		// $this->cart->insert($data);
        $save = $builder->insert($data);
        if( $save){
            $cart = $this->addtocart_db->orderBy('id', 'DESC')->findAll();
		echo $this->show_cart($cart);
        }else{

            echo "nothing to show";
        } 
	}

}

    function show_cart($cart){ 
		$output = '';
		$no = 0;
		foreach ($cart as $items) {
			$no++;
            $subtotal = $items['qty'] * $items['product_price'];
			$output .='
				<tr>
					<td>'.$items['product_name'].'</td>
					<td>'.number_format($items['product_price']).'</td>
					<td>'.$items['qty'].'</td>
					<td>'.number_format($subtotal ).'</td>
					<td><button type="button" id="'.$items['id'].'" class="romove_cart btn btn-danger btn-sm">Cancel</button></td>
				</tr>
			';
		}
		$output .= '
			<tr>
				<th colspan="3">Total</th>
				<th colspan="2">'.'Rp '.number_format(count($cart)).'</th>
			</tr>
		';
		return $output;
	}

	function load_cart(){ 
        // echo '<pre>';
        // print_r('heyy');
        // exit;
        $cart = $this->addtocart_db->orderBy('id', 'DESC')->findAll();
		echo $this->show_cart($cart);
	}

	function delete_cart(){ 
        
        if ($this->request->getMethod() == 'post') {
            extract($this->request->getPost());
            $delete = $this->addtocart_db->where('id', $row_id)->delete();
            if( $delete){
                $cart = $this->addtocart_db->orderBy('id', 'DESC')->findAll();
            echo $this->show_cart($cart);
            }else{
    
                echo "nothing to show";
            } 
	
    }
		// $this->cart->update($data);
		// echo $this->show_cart();
	}


}