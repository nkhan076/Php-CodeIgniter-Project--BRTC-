<?php
class add_fund_model extends CI_Model {
	var $a_f_l;
	
	function add_fund_model()
	{
	// Call the Model constructor
		parent::__construct();
		$this->a_f_l["module"] = "Fund Management";
		$this->load->helper('date');
	}
	
	function insertData()
	{
		$i=0;
		$projectdetail=$this->session->userdata('projectdetail');
		$fund_list=$this->session->userdata('fund_list');
	    $query = $this->db->get('fund');
        
        foreach ($query->result() as $row)
        {
         $fund_check[$i]=$row->fund_name;
		 $i++;
        }
		//create data array
		foreach ($fund_list as $val1){
			foreach ($val1 as $val2 ){}
				  $name=$val1[0];
				  $client=$val1[1];
				  $amount=$val1[2];
				  $date=$val1[3];
				  $data=array(
					'projectID' => $projectdetail['projectID'],
					'fund_name' => $name,
					'clientID' => $client,
					'total_amount' => $amount,
					'remaining_amount' => $amount,
					'Starting_date'=> $date,
					'last_update_date' => $date);	
				  $matched=0;
				  foreach($fund_check as $val1)
				  {
					  if($val1==$name)
					  {
						 $matched=1;
						 $sql= <<< EOT
						  update fund
						  set total_amount=total_amount+'$amount'
						  where fund_name='$name'
EOT;
						  $query=$this->db->query($sql);
						  $sql= <<< EOT
						  update fund
						  set remaining_amount=remaining_amount+'$amount'
						  where fund_name='$name'
EOT;
						  $query=$this->db->query($sql);
						  
						  $query=$this->db->query($sql);
						  $sql= <<< EOT
						  update fund
						  set last_update_date=now()
						  where fund_name='$name'
EOT;
						  $query=$this->db->query($sql);
						  
					  }
					  else if ($matched!=1)
					  $matched=0;
						  
				  }
				  if($matched==0)
				  $this->db->insert('fund', $data);
			}
	
		    $this->a_f_l["category"] ="";
			$this->a_f_l["login"]="login_form";
			$this->a_f_l["loggedin"]="loggedin_view";
            $this->a_f_l["context"] = "FUND LIST for ";
            $this->a_f_l["page"] = "";	
			$this->a_f_l["add_more_fund_btn"] = "";	
		$this->load->view('added_fund_list',$this->a_f_l);
		
	}
}
?>