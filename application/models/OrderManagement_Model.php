<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class OrderManagement_Model extends CI_Model
{
	public function __construct()
	{
		// Call the CI_Model constructor
		//$this->load->library('m_pdf');
		parent::__construct();

	}
	function getAllProductimg(){

		$product_image_query = $this->db->query("SELECT DISTINCT nbb_product.*,
		(SELECT nbb_product_image.image 
		FROM nbb_product_image 
		WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) AS image 
		FROM nbb_product");

        return $product_image_query->result_array();
    }	
	function getAllProduct()
	{
		$this->db->select('nbb_product.*');
		$this->db->from('nbb_product');
		return $this->db->get()->result_array();
	}
	function orderProductlistingdata($order_id = '')
	{
		$order_product_sql  = "SELECT nbb_order_product.*, 
				nbb_product.name AS product_name,
				nbb_product.weight AS product_weight
				FROM nbb_order_product 
				LEFT JOIN nbb_product ON nbb_product.id = nbb_order_product.product_id 
				WHERE nbb_order_product.order_id = $order_id"; 
		$order_product_query = $this->db->query($order_product_sql);
		$filterOrderProduct = $order_product_query->result_array();
		return $filterOrderProduct;

		/*$this->db->select('nbb_product.*');
		$this->db->from('nbb_product');
		return $this->db->get()->result_array();*/
	}
	/*function getAvailableStockByID($id){
        $this->db->select('nbb_product.available_stock');
        $this->db->from('nbb_product');
        $this->db->where('nbb_product.id',$id);
        $result= $this->db->get()->row();
        return $result;
    }*/
	function getAllOrderProduct()
	{
		$this->db->select('nbb_order_main.*,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->where('type_flag', 'O');
		return $this->db->get()->result_array();
	}
	function getAllCurrentOrder()
	{
		$this->db->select('nbb_order_main.*,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$where = array(
			'type_flag' => 'O',
			'order_status'   => 1
		  );
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getAllComplatedOrder()
	{
		$this->db->select('nbb_order_main.*,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$where = array(
			'type_flag' => 'O',
			'order_status'   => 2
		  );
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getAllCanceledOrder()
	{
		$this->db->select('nbb_order_main.*,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$where = array(
			'type_flag' => 'O',
			'order_status'   => 3
		);
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getAllCartProduct()
	{
		$this->db->select('nbb_order_main.*,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->where('nbb_order_main.type_flag', 'C');
		return $this->db->get()->result_array();
	}
	function getCustomerOrderStatus(){
        $this->db->select('*');
        $this->db->from('nbb_delivery_status');
        return $this->db->get()->result_array();
    }
	function getAllOrderDetails($order_id)
	{
		$this->db->select('nbb_order_product.*,
		nbb_order_main.order_number,
		nbb_order_main.user_id,
		nbb_order_main.order_status,
		nbb_order_main.customer_firstname,
		nbb_order_main.customer_lastname,
		nbb_order_main.customer_email,
		nbb_order_main.customer_phone,
		nbb_order_main.customer_postcode,
		nbb_order_main.delivery_date,
		nbb_order_main.type_flag,
		nbb_order_main.payment_method,
		nbb_product.name AS product_name,
		nbb_product.short_description,
		nbb_customer.*,
		nbb_billing_address.*,
		nbb_shipping_address.*,
		nbb_delivery_details.*');
		$this->db->from('nbb_order_product');
		$this->db->join('nbb_order_main', 'nbb_order_main.id = nbb_order_product.order_id', 'LEFT');
		$this->db->join('nbb_product', 'nbb_product.id = nbb_order_product.product_id', 'LEFT');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_billing_address', 'nbb_billing_address.user_id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_shipping_address', 'nbb_shipping_address.user_id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_delivery_details', 'nbb_delivery_details.order_id = nbb_order_main.id', 'LEFT');
		$where = array(
			'nbb_order_main.type_flag' => 'O',
			'nbb_order_main.id'   => $order_id
		  );
		$this->db->where($where);
		$order_product_query = $this->db->get()->result_array();
		$data = array();			

		foreach( $order_product_query as $row){				

			$data = array(
				'order_id' 				=> $order_id,
				'id' 					=> $row['id'],
				'order_code' 			=> $row['order_number'],
				'product_name' 			=> $row['product_name'],
				'short_description' 	=> $row['short_description'],
				'product_id' 			=> $row['product_id'],
				'total_quantity' 		=> $row['total_quantity'],
				'total_price' 			=> $row['total_price'],
				'product_price' 		=> $row['product_price'],
				'create_date'       	=> $row['create_date'],
				'order_status'			=> $row['order_status'],
				'customer_firstname'	=> $row['customer_firstname'],
				'customer_lastname' 	=> $row['customer_lastname'],
				'customer_email' 		=> $row['customer_email'],
				'customer_phone' 		=> $row['customer_phone'],
				'customer_postcode' 	=> $row['customer_postcode'],
				'type_flag' 			=> $row['type_flag'],
				'payment_method' 		=> $row['payment_method'],
				'delivery_date' 		=> $row['delivery_date'],
				'create_date' 			=> $row['create_date'],
				'first_name'			=> $row['first_name'],
				'last_name'				=> $row['last_name'],
				'user_dob'				=> $row['dob'],
				'user_age'				=> $row['age'],
				'user_email'			=> $row['email'],
				'user_contact'			=> $row['contact'],
				'user_address'			=> $row['address'],
				'profile_picture'		=> $row['profile_picture'],
				'billing_firstname' 	=> $row['billing_firstname'],
				'billing_lastname' 		=> $row['billing_lastname'],
				'billing_contactno' 	=> $row['billing_contactno'],
				'billing_address' 		=> $row['billing_address'],
				'billing_postal_code' 	=> $row['billing_postal_code'],
				'billing_city' 			=> $row['billing_city'],
				'billing_state' 		=> $row['billing_state'],
				'shipping_firstname' 	=> $row['shipping_firstname'],
				'shipping_lastname' 	=> $row['shipping_lastname'],
				'shipping_contactno' 	=> $row['shipping_contactno'],
				'shipping_address' 		=> $row['shipping_address'],
				'shipping_city' 		=> $row['shipping_city'],
				'shipping_state' 		=> $row['shipping_state'],
				'shipping_postalcode'	=> $row['shipping_postalcode'],
				'courier' 				=> $row['courier'],
				'courier_price' 		=> $row['courier_price'],
				'tacking_number' 		=> $row['tacking_number'],
				'traking_link' 			=> $row['traking_link'],
				'tacking_details' 		=> $row['tacking_details'],
				'date_booked' 			=> $row['date_booked'],
				'delivery_status'       => $row['delivery_status'],
			);	

		}
		return $data;
	}
	function insertOrder($data)
    {
        $insert = $this->db->insert('nbb_order_main',$data); 
        return true;
    }
	function insertOrderproduct($data)
    {
        $insert = $this->db->insert('nbb_order_product',$data); 
        return true;
    }
	function insertdelivery($data)
    {
        $insert = $this->db->insert('nbb_delivery_details',$data); 
        return true;
    }
	function getDelivery_details()
	{
		
        $this->db->select('nbb_delivery_details.*,
		nbb_order_main.order_number,
		nbb_delivery_status.status_name,
		nbb_customer.first_name,
		nbb_customer.last_name,
		nbb_employees.first_name as deliveryBoyfirst_name,
		nbb_employees.last_name as deliveryBoylast_name,
		nbb_shipping_address.shipping_address,
		nbb_shipping_address.shipping_city,
		nbb_shipping_address.shipping_postalcode,
		nbb_shipping_address.shipping_state,
		nbb_state.name as state_name');
        $this->db->from('nbb_delivery_details');
		$this->db->join('nbb_order_main', 'nbb_order_main.id = nbb_delivery_details.order_id', 'LEFT');
		$this->db->join('nbb_delivery_status', 'nbb_delivery_status.id = nbb_delivery_details.delivery_status', 'LEFT');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_delivery_details.courier', 'LEFT');
		$this->db->join('nbb_shipping_address', 'nbb_shipping_address.user_id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_state', 'nbb_state.id = nbb_shipping_address.shipping_state', 'LEFT');
        return $this->db->get()->result_array();
    }
	function getAllDeliveryDetailsEdit($id)
	{
		$this->db->select('*');
		$this->db->from('nbb_delivery_details');
		$this->db->where('order_id',$id);
		return $this->db->get()->result_array();
	}
	function getDeliveryPartner()
	{
		$this->db->select('nbb_employees.id,
		nbb_employees.first_name,
		nbb_employees.last_name');
		$this->db->from('nbb_employees');
		$this->db->where('designation','3');
		return $this->db->get()->result_array();
	}
	function showInvoiceDetails($id)
	{
		$this->db->select('nbb_order_product.*,nbb_product.name AS product_name,nbb_order_main.order_number');
		$this->db->from('nbb_order_product');
		$this->db->join('nbb_product', 'nbb_product.id = nbb_order_product.product_id', 'LEFT');
		$this->db->join('nbb_order_main', 'nbb_order_main.id = nbb_order_product.order_id', 'LEFT');
		$this->db->where('nbb_order_product.order_id',$id);
		return $this->db->get()->result_array();
	}
	function getEveryCustomerOrderProduct($id)
	{
		$this->db->select('nbb_order_main.*,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$where = array(
			'nbb_order_main.type_flag' => 'O',
			'nbb_order_main.user_id'   => $id
		  );
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getEveryCustomerCurrentOrder($id)
	{
		$this->db->select('nbb_order_main.*,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$where = array(
			'type_flag' => 'O',
			'order_status'   => 1,
			'nbb_order_main.user_id'   => $id
		  );
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getEveryCustomerComplatedOrder($id)
	{
		$this->db->select('nbb_order_main.*,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$where = array(
			'type_flag' => 'O',
			'order_status'   => 2,
			'nbb_order_main.user_id'   => $id
		  );
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getEveryCustomerCanceledOrder($id)
	{
		$this->db->select('nbb_order_main.*,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$where = array(
			'type_flag' => 'O',
			'order_status'   => 3,
			'nbb_order_main.user_id'   => $id
		);
		$this->db->where($where);
		return $this->db->get()->result_array();
	}

}
