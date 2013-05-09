<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<?php
	//echo base_url();
	$user=$this->session->userdata('userdetail');
	$pl_project_list=$this->session->userdata('pl_project_list');
	$tl_project_list=$this->session->userdata('tl_project_list');
	$fund_list=array(array());
    $fund_list=$this->session->userdata('fund_list');
	$projectdetail=$this->session->userdata('projectdetail');
	$menulist=$this->session->userdata('menulist');
	$this->load->library('table');
	?>
        <script type="text/javascript">
            function base_url() {
                return "<?php print(base_url());?>";
            }
 		</script>

        <title>BRTC  <?php echo $module; ?></title>
        <meta http-equiv="Content-Language" content="English" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="http://localhost/BRTC/css/template2.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="http://localhost/BRTC/css/jquery-ui.css" />
        <script type="text/javascript" src="http://localhost/BRTC/js/jquery.js"></script>
        <script type="text/javascript" src="http://localhost/BRTC/js/jquery-ui.js"></script>
 		<script type="text/javascript">
		
						 function logout()
							{
						   			alert("You are logged out.");
							}
			
		</script>
		<script type="text/javascript">
			function getLink(obj)
			{
				var actionName=obj.name;
				document.link_form.linkpage.value=actionName;
				document.link_form.submit();
				return false;
			}
		</script>
    </head>
    <body>
        <div id="wrap">
            <div id="header"></div>

            <div id="content">
                <div id="context">
                    <?php echo $context; ?>
                    <div id="login">
						<?php 
						if($login!="")
							$this->load->view($login); 
						?>
                    </div>
                    <div id="loggedin">
						<?php
							if($loggedin!="")
								$this->load->view($loggedin); 
								
								//echo(date("l dS \of F Y h:i:s A") . "<br />");

						 ?>

                    </div>
                </div>
                <div class="left">
                    <?php
                   	foreach($menulist as $row)
					{?>
						<li><a href='#' onclick="getLink(this)" title="<?php echo $row; ?>" name="<?php echo $row; ?>"><?php echo $row; ?></a></li>
						
					<?php }

                    ?>
					<form method="post" name="link_form" action="../linkpage/index">
						<input type="hidden" name="linkpage" value="">
					</form>
                   
                </div>
                <div class="right">
                <h4 style="font-family:Verdana, Arial, Helvetica, sans-serif; color:#990000">Recently Added:</h4>
                   <?php
          			
					if($fund_list)
					{
						foreach ($fund_list as $val1){
									foreach ($val1 as $val2 ){
										}
										echo "<br \>";
										echo "Fund Name:".$val1[0];
										echo "<br \>";
										echo "Client ID: ".$val1[1];
										echo "<br \>";
										echo "Total Amount of Fund: ". $val1[2];
										echo "<br \>";
									}
					}
					echo "<br \>";
					echo "<br \>";	
					?>
                    <h3 style="font-family:Verdana, Arial, Helvetica, sans-serif; color:#990000">All Funds:</h3>
                    <?php
					$projectID=$projectdetail['projectID'];
					$query = $this->db->query("SELECT * FROM fund 
											  WHERE projectID=$projectID");
					$tmpl = array ( 'table_open'  => '<table border="২" cellpadding="2" cellspacing="4" bordercolor="#CC9911" class="mytable">' );
					$this->table->set_template($tmpl); 
					echo $this->table->generate($query); 
					
					?>		
					
					 
					 
					 <div class=""></div>
                </div>
            </div>
            <div style="clear: both;"> </div>

            <div id="footer">
                &copy;Department of CSE, BUET. BRTC Fund Management prototype by CSE'07 batch
            </div>
        </div>
    </body>
</html>
<?php

?>