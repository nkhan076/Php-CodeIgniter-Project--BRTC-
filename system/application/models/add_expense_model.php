<?php
class add_expense_model extends CI_Model {
	var $a_e_l;
	function add_expense_model()
	{
	// Call the Model constructor
		parent::__construct();
		$this->a_e_l["module"] = "Fund Management";
	}
	function insertData()
	{
		$expense_list=array(array());
		$data=array();
		$expense_list=$this->session->userdata('expense_list');
		$projectdetail=$this->session->userdata('projectdetail');
		$i=1;
		foreach ($expense_list as $val1){
				 $i++;
			foreach ($val1 as $val2 ){}
				  $type=$val1[0];
				  $amount=$val1[1];
				  $desc=$val1[2];
				  $date=$val1[3];
				  $data=array(
					'projectID' => $projectdetail['projectID'],
					'expense_type' => $type,
					'amount' => $amount,
					'date' => $date,
					'description' => $desc);	
				  $this->db->insert('expenses', $data); 
				}
		    $this->a_e_l["category"] ="";
			$this->a_e_l["login"]="login_form";
			$this->a_e_l["loggedin"]="loggedin_view";
            $this->a_e_l["context"] = "EXPENSES LIST for ";
            $this->a_e_l["page"] = "";			
		$this->load->view('added_expense_list',$this->a_e_l);
		
	}
}
?>