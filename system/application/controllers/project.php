<?php
class Project extends CI_Controller
{
	function  __construct() 
	{
        parent::__construct();
        $this->vars["module"] = "Fund Management";
    }
	function index()
	{
		//print("project .php");
		$user=$this->session->userdata('userinfo');
		if($user['logged_in']==TRUE)
		{
			$project=$_POST['project'];
			$role=$_POST['role'];//print('role');
			$this->pro["module"]="Fund Management";
			
			$this->load->model('project_detail','', true);
			$result = $this->project_detail->getProjectInfo($project);
			$this->session->set_userdata('projectdetail',$result);
			
			$this->load->model('menu','', true);
			$result = $this->menu->getMenu('Fund Management',$role);
			$this->session->set_userdata('menulist',$result);
			
			$this->pro["category"] ="";
			$this->pro["page"] = "";
			$this->pro["context"] = "Project Profile";
			$this->pro["login"]="";
			$this->pro["loggedin"]="loggedin_view";
			$this->pro["message"]="";
			$this->load->view("project_view",$this->pro);
			//print($project);
			//print($role);
		}
		
		else
		{
				$this->vars["module"] = "Fund Management";
				$this->vars["category"] = "";
				$this->vars["page"] = "";
				$this->vars["context"] = "";//$this->_context();
				$this->vars["content_view"] = "home_public";
				$this->vars["login"]="login_form";
				$this->vars["loggedin"]="";
				$this->vars["message"]='<div id="message">Oopsie,You are not logged in now.please log in now...</div>';
				$this->load->view("brtc_fund_management_view",$this->vars);
				
		}		

	}
}
?>
