<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class ProductManagement_model extends CI_Model
{
	function getAllProductCategory()
		{
			$this->db->select('nbb_product_category.*');
			$this->db->from('nbb_product_category');

			return $this->db->get()->result_array();
		}
	function insert_productCategory($data = array())
		{
			$insert = $this->db->insert('nbb_product_category',$data); 
			return true;
		}
	function getProductCategoryData($id){
			$this->db->select('*');
			$this->db->from('nbb_product_category');
			$this->db->where('id',$id);
			return $this->db->get()->result_array();
		}
	function getAllProduct()
		{
			$this->db->select('nbb_product.*,nbb_product_category.name as category_name');
			$this->db->from('nbb_product');
			$this->db->join('nbb_product_category', 'nbb_product_category.id = nbb_product.categorie_id', 'LEFT');
			return $this->db->get()->result_array();
		}
	function getAllProductImage($product_id)
		{
			$this->db->select('nbb_product_image.image AS product_image');
			$this->db->from('nbb_product_image');
			$this->db->where('product_id',$product_id);

			return $this->db->get()->result_array();
		}
	function insertproduct($data = array())
		{
			$insert = $this->db->insert_batch('nbb_product_image',$data); 
			return true;
		}
	function getProductDataEdit($id){
			$this->db->select('*');
			$this->db->from('nbb_product');
			$this->db->where('id',$id);
			return $this->db->get()->result_array();
		}
}
?>
