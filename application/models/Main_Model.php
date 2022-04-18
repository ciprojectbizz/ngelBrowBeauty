<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Model extends CI_Model
{
	function insert($table,$data)
	{
		$this->db->insert($table,$data);
		return true;
	}
	function update($id,$idnumber,$data,$table)
	{
		$this->db->where($id,$idnumber);
		$this->db->update($table,$data);
		return true;
	}
	function delete($id,$idnumber,$table)
	{
        $this->db->where($id, $idnumber);
        $this->db->delete($table);
        return true;
	}

	function insert2($table,$data)
	{
		$this->db2->insert($table,$data);
		return true;
	}
	function update2($id,$idnumber,$data,$table)
	{
		$this->db2->where($id,$idnumber);
		$this->db2->update($table,$data);
		return true;
	}
	function delete2($id,$idnumber,$table)
	{
        $this->db2->where($id, $idnumber);
        $this->db2->delete($table);
        return true;
	}
}
