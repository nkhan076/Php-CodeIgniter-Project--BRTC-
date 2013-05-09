<?php
class Add_expense extends CI_Controller
{
	var $add_exp;
	function  __construct() 
	{
        parent::__construct();
        $this->add_exp["module"] = "Fund Management";
    }
	function index()
	{

		$this->load->model('user','',true);
		$add_exp_user=$this->session->userdata('userinfo');
	    $pl_project_list=$this->session->userdata('pl_project_list');
	    $tl_project_list=$this->session->userdata('tl_project_list');
		$selected_project_list=$this->session->userdata('selected_project_list');
		
		if($add_exp_user['logged_in']==TRUE)
		{
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
			//print("You are not logged in now.please log in now.");	
		}
	}
	
	function add_exp()
	{
		$i=0;
		$more=$this->input->post('add_more_btn');
		
		//echo $more;
		if($more=='Add More')
		{
			$this->add_exp["category"] ="";
			$this->add_exp["login"]="login_form";
			$this->add_exp["loggedin"]="loggedin_view";
            $this->add_exp["context"] = "ADD EXPENSE";//$this->_context();
            $this->add_exp["add_exp_form"] = "";
			$this->add_exp["add_exp_more"]="add_expense_more_form";
            $this->add_exp["page"] = "";
            $this->add_exp["content_view"] = "add_expense_view";
			$this->load->view('add_expense_view',$this->add_exp);
			//$this->load->view('add_expense_more_form');
		}
		else
		{
			if(($amount=$this->input->post('expense_amount1'))){
				$expense[0][0]=$this->input->post('expense_name1');
				$expense[0][1]=$this->input->post('expense_amount1');
				$expense[0][2]=$this->input->post('expense_detail1');
				$expense[0][3]=$this->input->post('expense_date1');
				$i++;
			}
			if(($amount=$this->input->post('expense_amount2'))){
				$expense[1][0]=$this->input->post('expense_name2');
				$expense[1][1]=$this->input->post('expense_amount2');
				$expense[1][2]=$this->input->post('expense_detail2');
				$expense[1][3]=$this->input->post('expense_date2');
				$i++;
			}
			if(($amount=$this->input->post('expense_amount3'))){
				$expense[2][0]=$this->input->post('expense_name3');
		        $expense[2][1]=$this->input->post('expense_amount3');
			    $expense[2][2]=$this->input->post('expense_detail3');
		        $expense[2][3]=$this->input->post('expense_date3');
				$i++;
			}
			if(($amount=$this->input->post('expense_amount4'))){
				$expense[3][0]=$this->input->post('expense_name4');
		        $expense[3][1]=$this->input->post('expense_amount4');
			    $expense[3][2]=$this->input->post('expense_detail4');
		        $expense[3][3]=$this->input->post('expense_date4');
				$i++;
			}
			if(($amount=$this->input->post('expense_amount5'))){
				$expense[4][0]=$this->input->post('expense_name5');
				$expense[4][1]=$this->input->post('expense_amount5');
				$expense[4][2]=$this->input->post('expense_detail5');
				$expense[4][3]=$this->input->post('expense_date5');
				$i++;
			}
			if(($amount=$this->input->post('expense_amount6'))){
				$expense[5][0]=$this->input->post('expense_name6');
		        $expense[5][1]=$this->input->post('expense_amount6');
			    $expense[5][2]=$this->input->post('expense_detail6');
		        $expense[5][3]=$this->input->post('expense_date6');
				$i++;
			}
			if(($amount=$this->input->post('expense_amount7'))){
				$expense[6][0]=$this->input->post('expense_name7');
		        $expense[6][1]=$this->input->post('expense_amount7');
			    $expense[6][2]=$this->input->post('expense_detail7');
		        $expense[6][3]=$this->input->post('expense_date7');
				$i++;
			}
			if(($amount=$this->input->post('expense_amount8'))){
				$expense[7][0]=$this->input->post('expense_name8');
		        $expense[7][1]=$this->input->post('expense_amount8');
			    $expense[7][2]=$this->input->post('expense_detail8');
		        $expense[7][3]=$this->input->post('expense_date8');
				$i++;
			}
			if(($amount=$this->input->post('expense_amount9'))){
				$expense[8][0]=$this->input->post('expense_name9');
		        $expense[8][1]=$this->input->post('expense_amount9');
			    $expense[8][2]=$this->input->post('expense_detail9');
		        $expense[8][3]=$this->input->post('expense_date9');
				$i++;
			}
			if(($amount=$this->input->post('expense_amount10'))){
				$expense[9][0]=$this->input->post('expense_name10');
		        $expense[9][1]=$this->input->post('expense_amount10');
			    $expense[9][2]=$this->input->post('expense_detail10');
		        $expense[9][3]=$this->input->post('expense_date10');
				$i++;
			}
		
		if($i>0)
		{
			$this->session->set_userdata('expense_list',$expense);
			$this->load->model('add_expense_model');
			$this->add_expense_model->insertData();
		}
		else
		{

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
		
	  }
	}
}
?>