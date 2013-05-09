<?php
class brtc_fund_management_model extends CI_Model {
	function brtc_fund_management_model()
	{
	// Call the Model constructor
		parent::__construct();
	}
	function getData()
	{
	//Query the data table for every record and row
		//$this->load->database($db);
		$query = $this->db->get('user');
		$all=array();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			print("Database Empty!!!");
		}
	}
}
?>