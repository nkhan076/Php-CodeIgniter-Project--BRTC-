<?php
class brtc_fund_management extends CI_Controller
{
	 var $vars;
    function  __construct() 
	{
        parent::__construct();
        $this->vars["module"] = "Fund Management";
    }
	function index()
	{
		
		$this->vars["category"] = "";
        $this->vars["page"] = "";
        $this->vars["context"] = "";//$this->_context();
        $this->vars["content_view"] = "home_public";
		$this->vars["login"]="login_form";
		$this->vars["loggedin"]="";
		$this->vars["message"]="";
		//$this->load->model('brtc_fund_management_model');
		//$user['result'] = $this->brtc_fund_management_model->getData();
		//$user['page_title'] = "BRTC Fund Management";
		//$this->load->library('ajax');
		//$this->google_load->load("jquery") ;
		$this->load->view('brtc_fund_management_view',$this->vars);
	}
}
?>