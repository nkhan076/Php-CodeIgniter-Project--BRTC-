<?php
class pl_home_page extends CI_Controller
{
	 var $vars;
    function  __construct() 
	{
        parent::__construct();
        $this->pro["module"] = "Fund Management";
    }
	function index()
	{
		$user=$this->session->userdata('userinfo');
		$this->pro["category"] ="";
        $this->pro["page"] = "";
        $this->pro["context"] = "HOME";//$this->_context();
       // $this->vars["content_view"] = "home_public";
		$this->pro["login"]="login_form";
		$this->pro["loggedin"]="loggedin_view";
		$this->pro["message"]="";

		if($user['logged_in']==TRUE)
		{
			$this->load->model('user','',true);
			$user_detail=$this->user->getDetail($user['userid']);
			if($user_detail==FALSE)
			{
				$this->vars["module"] = "Fund Management";
				$this->vars["category"] = "";
				$this->vars["page"] = "";
				$this->vars["context"] = "";//$this->_context();
				$this->vars["content_view"] = "home_public";
				$this->vars["login"]="login_form";
				$this->vars["loggedin"]="";
				$this->vars["message"]='<div id="message">Oopsie, it seems your information is not found in the database, please try again.</div>';
				$this->load->view("brtc_fund_management_view",$this->vars);
			}
			else
			{
				//$pl_project_list=array(array());
				$this->session->set_userdata('userdetail',$user_detail);
				$pl_project_list=$this->user->getplProject($user['userid']);
				$tl_project_list=$this->user->gettlProject($user['userid']);
				$cl_project_list=$this->user->getclProject($user['userid']);
				$this->session->set_userdata('pl_project_list',$pl_project_list);
				$this->session->set_userdata('tl_project_list',$tl_project_list);
				$this->session->set_userdata('cl_project_list',$cl_project_list);
				$this->load->view('pl_home_page_view',$this->pro);				
			}

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