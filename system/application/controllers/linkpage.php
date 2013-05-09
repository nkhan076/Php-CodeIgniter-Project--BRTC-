<?php
class Linkpage extends CI_Controller
{
	function  __construct() 
	{
        parent::__construct();
       // $this->vars["module"] = "Fund Management";
    }
	function index()
	{
		$action=$_POST['linkpage'];
		//print($action);
		if($action=='Add Fund')
		{
			//print($action);
			//redirect('add_fund');
				$this->load->model('user','',true);
				$add_fund_user=$this->session->userdata('userinfo');
				if($add_fund_user['logged_in']==TRUE)
				{
					//$this->add_exp["projectlist"]=$this->user->getplProject($add_exp_user['userid']);
					//$this->session->set_userdata('pl_project_list',$pl_project_list);
					$this->add_fund["module"]="Fund Management";
					$this->add_fund["category"] ="";
					$this->add_fund["login"]="login_form";
					$this->add_fund["loggedin"]="loggedin_view";
					$this->add_fund["context"] = "Add Fund";//$this->_context();
					$this->add_fund["add_fund_form"] = "add_fund_form";
					$this->add_fund["add_fund_more"]="";
					$this->add_fund["page"] = "";
					$this->add_fund["content_view"] = "add_fund_view";
					$this->load->model('add_fund_model');
					$this->load->model('project_detail','', true);
			        $projectdetail=$this->session->userdata('projectdetail');
			        $fund_detail_list=$this->project_detail->getFundSources($projectdetail['projectID']);		
			        $this->session->set_userdata('fund_detail_list',$fund_detail_list);
					$this->load->view('add_fund_view',$this->add_fund);
					//$this->load->view('brtc_fund_management_view',$this->add_exp);
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
					$this->vars["message"]="";
					
					$this->load->view('brtc_fund_management_view',$this->vars);
				}
			}
		else if ($action == 'Add Expense')
			{
				//print($action);
				
						$this->load->model('user','',true);
			$add_exp_user=$this->session->userdata('userinfo');
			
			if($add_exp_user['logged_in']==TRUE)
			{
				$this->add_exp["module"]="Fund Management";
				$this->add_exp["projectlist"]=$this->user->getplProject($add_exp_user['userid']);
				$this->add_exp["category"] ="";
				$this->add_exp["login"]="login_form";
				$this->add_exp["loggedin"]="loggedin_view";
				$this->add_exp["context"] = "ADD EXPENSE";//$this->_context();
				$this->add_exp["add_exp_form"] = "add_expense_form";
				$this->add_exp["add_exp_more"]="";
				$this->add_exp["page"] = "";
				$this->add_exp["content_view"] = "add_expense_view";
				$this->load->view('add_expense_view',$this->add_exp);
				
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
				$this->vars["message"]="";
				
				$this->load->view('brtc_fund_management_view',$this->vars);
			}
			
		}
		
		else if($action=='Distribution')
		{
			$this->pro["module"]="Fund Management";
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
			$this->load->view('distribution_view',$this->pro);
		}
		else if($action == 'View Project Report')
		{
			print($action);
		}
	}
}
?>
