<?php
class Add_fund extends CI_Controller
{
	var $add_fund;
	function  __construct() 
	{
        parent::__construct();
        $this->add_fund["module"] = "Fund Management";
    }
	
	function index()
	{

		$this->load->model('user','',true);
		$add_fund_user=$this->session->userdata('userinfo');
		if($add_fund_user['logged_in']==TRUE)
		{
			//$this->add_exp["projectlist"]=$this->user->getplProject($add_exp_user['userid']);
			//$this->session->set_userdata('pl_project_list',$pl_project_list);
			$this->add_fund["category"] ="";
			$this->add_fund["login"]="login_form";
			$this->add_fund["loggedin"]="loggedin_view";
            $this->add_fund["context"] = "Add Fund";//$this->_context();
            $this->add_fund["add_fund_form"] = "add_fund_form";
			$this->add_fund["add_fund_more"]="";
            $this->add_fund["page"] = "";
            $this->add_fund["content_view"] = "add_fund_view";
			$this->load->model('add_fund_model');
			$this->add_fund_model->show_fund_list();
			$this->load->view('add_fund_view',$this->add_fund);
			
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
	
	function add_fnd()
	{
		$i=0;
		$more=$this->input->post('add_more_fund_btn');
		
		//echo $more;
		if($more=='Add More')
		{
			$this->add_fund["category"] ="";
			$this->add_fund["login"]="login_form";
			$this->add_fund["loggedin"]="loggedin_view";
            $this->add_fund["context"] = "ADD EXPENSE";//$this->_context();
            $this->add_fund["add_fund_form"] = "";
			$this->add_fund["add_fund_more"]="add_fund_more_form";
            $this->add_fund["page"] = "";
            $this->add_fund["content_view"] = "add_fund_view";
			$this->load->view('add_fund_view',$this->add_fund);
			//$this->load->view('add_expense_more_form');
		}
		else{
			if(($amount=$this->input->post('fund_amount1'))){
				$fund[0][0]=$this->input->post('fund_name1');
				$fund[0][1]=$this->input->post('client_id1');
				$fund[0][2]=$this->input->post('fund_amount1');
				$fund[0][3]=$this->input->post('date1');
				$i++;
			}
			if(($amount=$this->input->post('fund_amount2'))){
				$fund[1][0]=$this->input->post('fund_name2');
				$fund[1][1]=$this->input->post('client_id2');
				$fund[1][2]=$this->input->post('fund_amount2');
				$fund[1][3]=$this->input->post('date2');
				$i++;
			}
			if(($amount=$this->input->post('fund_amount3'))){
				$fund[2][0]=$this->input->post('fund_name3');
				$fund[2][1]=$this->input->post('client_id3');
		        $fund[2][2]=$this->input->post('fund_amount3');
			    $fund[2][3]=$this->input->post('date3');
				$i++;
			}
			if(($amount=$this->input->post('fund_amount4'))){
				$fund[3][0]=$this->input->post('fund_name4');
				$fund[3][1]=$this->input->post('client_id4');
		        $fund[3][2]=$this->input->post('fund_amount4');
			    $fund[3][3]=$this->input->post('date4');
				$i++;
			}
			if(($amount=$this->input->post('fund_amount5'))){
				$fund[4][0]=$this->input->post('fund_name5');
				$fund[4][1]=$this->input->post('client_id5');
		        $fund[4][2]=$this->input->post('fund_amount5');
			    $fund[4][3]=$this->input->post('date5');
				$i++;
			}
			if(($amount=$this->input->post('fund_amount6'))){
				$fund[5][0]=$this->input->post('fund_name6');
				$fund[5][1]=$this->input->post('client_id6');
		        $fund[5][2]=$this->input->post('fund_amount6');
			    $fund[5][3]=$this->input->post('date6');
				$i++;
			}
			if(($amount=$this->input->post('fund_amount7'))){
				$fund[6][0]=$this->input->post('fund_name7');
				$fund[6][1]=$this->input->post('client_id7');
		        $fund[6][2]=$this->input->post('fund_amount7');
			    $fund[6][3]=$this->input->post('date7');
				$i++;
			}
			if(($amount=$this->input->post('fund_amount8'))){
				$fund[7][0]=$this->input->post('fund_name8');
				$fund[7][1]=$this->input->post('client_id8');
		        $fund[7][2]=$this->input->post('fund_amount8');
			    $fund[7][3]=$this->input->post('date8');
				$i++;
			}
			if(($amount=$this->input->post('fund_amount9'))){
				$fund[8][0]=$this->input->post('fund_name9');
				$fund[8][1]=$this->input->post('client_id9');
		        $fund[8][2]=$this->input->post('fund_amount9');
			    $fund[8][3]=$this->input->post('date9');
				$i++;
			}
			if(($amount=$this->input->post('fund_amount10'))){
				$fund[9][0]=$this->input->post('fund_name10');
				$fund[9][1]=$this->input->post('client_id10');
		        $fund[9][2]=$this->input->post('fund_amount10');
			    $fund[9][3]=$this->input->post('date10');
				$i++;
			}
		
		if($i>0)
		{
		$this->session->set_userdata('fund_list',$fund);
		$this->load->model('add_fund_model');
		$this->add_fund_model->insertData();
		}
		else
		{
			$this->add_fund["category"] ="";
			$this->add_fund["login"]="login_form";
			$this->add_fund["loggedin"]="loggedin_view";
            $this->add_fund["context"] = "Add Fund";//$this->_context();
            $this->add_fund["add_fund_form"] = "add_fund_form";
			$this->add_fund["add_fund_more"]="";
            $this->add_fund["page"] = "";
            $this->add_fund["content_view"] = "add_fund_view";
	
			$this->load->view('add_fund_view',$this->add_fund);
		}
	  }
	}
	
}
?>