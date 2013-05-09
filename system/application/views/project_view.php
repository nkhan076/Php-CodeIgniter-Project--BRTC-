<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<?php
	//echo base_url();
	$user=$this->session->userdata('userdetail');
	$projectdetail=$this->session->userdata('projectdetail');
	$menulist=$this->session->userdata('menulist');
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
                    <?php 
						/*print "Project Name : ".$projectdetail['projectName']."<br/>";
						print "Project ID : ".$projectdetail['projectID']."<br/>";
						print "Project Start Date : ".$projectdetail['projectStartDate']."<br/>";
						print "Project Finish Date : ".$projectdetail['projectfinishDate']."<br/>";
						print "Organization Name : ".$projectdetail['OrganizationName']."<br/>";
						print "Organization Address  :".$projectdetail['OrganizationAdress']."<br/>";
						print "Organization Phone Number : ".$projectdetail['organizationphn']."<br/>";
						print "Organization Mail : ".$projectdetail['organizationmail']."<br/>";
						print "Client Name : ".$projectdetail['clientname']."<br/>";
						print "Client Phone Number: ".$projectdetail['clientphn']."<br/>";
						print "Client Mail : ".$projectdetail['clientmail']."<br/>";*/
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
