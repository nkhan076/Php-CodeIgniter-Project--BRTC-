<?php
class Session extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		//echo "Inside session";
        $this->load->library('session');
		//var $session;
    }
	function index()
	{
	 		/*$this->vars["module"] = "Fund Management";
			$this->vars["category"] = "";
			$this->vars["page"] = "";
			$this->vars["context"] = "";//$this->_context();
			$this->vars["content_view"] = "home_public";
			$this->vars["login"]="login_form";
			$this->vars["loggedin"]="";
			$this->vars["message"]='<div id="message">Oopsie, it seems your information is not found in the database, please try again.</div>';
			$this->load->view("brtc_fund_management_view",$this->vars);*/
			
	    	//$this->load->view('login', $vars);
	}
    public function login()
    {
        $this->load->model('user','', true);
        //echo "Server response : " . $this->input->post('username')."/". $this->input->post('password');
                  
        $username = $this->input->post('username');
        $password = $this->input->post('password');
		//print $username.$password;
        $result = $this->user->authenticate($username, $password);
		//print $result['userName'];
        if ($result==FALSE) 
		{
		
			$this->vars["module"] = "Fund Management";
			$this->vars["category"] = "";
			$this->vars["page"] = "";
			$this->vars["context"] = "";//$this->_context();
			$this->vars["content_view"] = "home_public";
			$this->vars["login"]="login_form";
			$this->vars["loggedin"]="";
			$this->vars["message"]='<div id="message">Oopsie, it seems your username or password is incorrect, please try again.</div>';
			$this->load->view("brtc_fund_management_view",$this->vars);
			//$this->session->set_flashdata('message', '<div id="message">Oopsie, it seems your username or password is incorrect, please try again.</div>');
			//print($result);
			//redirect('session/index');
            //return $name;
			//alert('Wrong username or password! Please try again.');
        } 
		else 
		{

			$data = array('userid'=>$username,'logged_in'  => TRUE );
            $this->session->set_userdata('userinfo',$data);
			redirect('pl_home_page/index');
            //print($result);
			//
        }

    }



    public function logout()
    {
        $this->session->unset_userdata('userinfo');
		$this->session->unset_userdata('userdetail');
		//print("In log out");
		header('Location: /BRTC');
        //header('Location: /BRTC');
    }
}
?>