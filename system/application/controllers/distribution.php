<?php
class Distribution extends CI_Controller
{
	function  __construct() 
	{
        parent::__construct();
        $this->vars["module"] = "Fund Management";
    }
	function fund_non_workload()
	{
		$fund_detail_list=$this->session->userdata('fund_detail_list');
		$funds=$this->input->post('fund');
		//print($funds);
		$i=0;
		$fund_detail=array();
		foreach($fund_detail_list as $row)
		{
			$fid=$row['fundID'];
			$amount=$funds[$i++];	
			array_push($fund_detail,array('fid'=>$fid,'amount'=>$amount));
		}
		
		/*$funds=$this->session->userdata('funds');
		foreach($fund_detail as $row)
		{
			echo $row['fid']."<br/>".$row['amount']."<br/>";
		}*/
			/*$this->pro["module"]="Fund Management";
			$this->pro["category"] ="";
			$this->pro["page"] = "";
			$this->pro["context"] = "Distribution Form";
			$this->pro["login"]="";
			$this->pro["loggedin"]="loggedin_view";
			$this->pro["message"]="";
			$this->load->model('project_detail','', true);
			$projectdetail=$this->session->userdata('projectdetail');
			$fund_detail_list=$this->project_detail->getFundSources($projectdetail['projectID']);		
			$this->session->set_userdata('fund_detail_list',$fund_detail_list);
			$this->load->view('distribution_view',$this->pro);*/
			
			echo "<script type='text/javascript'> alert (\"Successfully Saved.\");</script>";
			//header('Location: ' . $_SERVER['HTTP_REFERER']);

		return 1;
	}
}
?>
