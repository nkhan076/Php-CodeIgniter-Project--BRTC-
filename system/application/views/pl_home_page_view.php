<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<?php
	//echo base_url();
	$user=$this->session->userdata('userdetail');
	$pl_project_list=$this->session->userdata('pl_project_list');
	$tl_project_list=$this->session->userdata('tl_project_list');
	$cl_project_list=$this->session->userdata('cl_project_list');
	?>
        <script type="text/javascript">
            function base_url() {
                return "<?php print(base_url());?>";
            }
 		</script>
		<script type="text/javascript">
		function getLink(obj)
		{
			var linkto=obj.href;
			var projectName=obj.title;
			var role = obj.name;
				//var url;
			//alert(projectName);
			//$myform.hd.val=projectName;
			document.myform.project.value=projectName;
			document.myform.role.value=role;
			//alert("You are "+document.myform.role.value+" of "+document.myform.project.value);
			document.myform.submit();
			//$.post(base_url()+'../project/index',{$projectName});
									
			return false;
		}
		</script>


        <title>BRTC  <?php echo $module; ?></title>
        <meta http-equiv="Content-Language" content="English" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="http://localhost/BRTC/css/template1.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="http://localhost/BRTC/css/jquery-ui.css" />
        <script type="text/javascript" src="http://localhost/BRTC/js/jquery.js"></script>
        <script type="text/javascript" src="http://localhost/BRTC/js/jquery-ui.js"></script>
 		<script type="text/javascript">
		
						 function logout()
							{
						   			alert("You are logged out.");

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
                    $this->menu->load($module);
                    $bu = base_url();
                    foreach ($this->menu->getCategories() as $cat) 
					{
                        print("<h2>$cat</h2>\n");
                        print("<ul>\n");
                        foreach ($this->menu->getPages($cat) as $mi) 
						{
                            print("<li><a href='$bu{$mi->url}'>{$mi->page}</a></li>\n");
                        }
                        print("</ul>\n");
                    }
                    ?>
                </div>
                <div class="right">
                    <?php 
					//print $userinfo;
					//echo $data['username'];//$this->load->view($content_view);
				
					print $user['userName']."<br/>";
					print "Phone Number :".$user['userPhn']."<br/>";
					print "E-mail :".$user['userMail']."<br/>";
					?>
					<?php
					//echo $category;
					//$i=0;
					if($pl_project_list)
					{?>
					<br/>
					<h3 style="font-family:Verdana, Arial, Helvetica, sans-serif; color:#990000">List of Projects : Role - Project Leader</h3>
					<table width="628" border=“1” bordercolor="#CC0000">
					<tr>    		   
						 <!--<th>Project Status</th> -->
						 <th width="168" align="center">Project Status</th>
						 <th width="168" align="center">Project Name</th>
						 <th width="252" align="center">Project Start Date</th>
						 <th width="165" align="center">Project End Date</th>  
					</tr>

					<?php
						foreach($pl_project_list as $row) 
							{?>
								<tr>
								<td align="center" <?php if($row['projectstatus']=="Running"){ echo "style='color:#CC0000'"; } else echo "style='color:#003300'";?> ><?php print($row['projectstatus']);?></td>
								<td align="center"><a name="project_leader" href="#" onclick="getLink(this)" title="<?php echo $row['projectName']; ?>"><?php print($row['projectName']);?></td>
								<td align="center"><?php print($row['projectStartDate']);?></td>
								<td align="center"><?php print($row['projectfinishDate']);?></td>
								</tr>	
							<?php //print("<li><a href='$bu{$mi->url}'>{$mi->page}</a></li>\n"); ?>
                  		<?php 
							}	?></table>						
					<?php 
					}?>


					<?php
			
					if($tl_project_list)
					{?>
					<br/>
					<h3 style="font-family:Verdana, Arial, Helvetica, sans-serif; color:#990000">List of Projects : Role - Team Leader</h3>
					<table width="628" border=“1” bordercolor="#CC0000">
					<tr>    		   
						 <!--<th>Project Status</th> -->
						 <th width="168" align="center">Project Status</th>
						 <th width="168" align="center">Project Name</th>
						 <th width="168" align="center">Team ID</th>
						 <th width="252" align="center">Project Start Date</th>
						 <th width="165" align="center">Project End Date</th>  
					</tr>
				
					<?php
						foreach($tl_project_list as $row) 
							{?>
								<tr>
								<td align="center" <?php if($row['projectstatus']=="Running"){ echo "style='color:#CC0000'"; } else echo "style='color:#003300'";?> ><?php print($row['projectstatus']);?></td>
							<td align="center"><a name="team_leader" href="#" onclick="getLink(this)" title="<?php print($row['projectName']);?>"><?php print($row['projectName']);?></td>
								<td align="center"><?php print($row['teamID']); ?></td>
								<td align="center"><?php print($row['projectStartDate']);?></td>
								<td align="center"><?php print($row['projectfinishDate']);?></td>
								</tr>	
							<?php //print("<li><a href='$bu{$mi->url}'>{$mi->page}</a></li>\n"); ?>
                  		<?php 
							}	?></table>						
					<?php 
					}
		
					if($cl_project_list)
					{?>
					<br/>
					<h3 style="font-family:Verdana, Arial, Helvetica, sans-serif; color:#990000">List of Projects : Role - Client</h3>
					<table width="628" border=“1” bordercolor="#CC0000">
					<tr>    		   
						 <!--<th>Project Status</th> -->
						 <th width="168" align="center">Project Status</th>
						 <th width="168" align="center">Project Name</th>
						 <th width="252" align="center">Project Start Date</th>
						 <th width="165" align="center">Project End Date</th>  
					</tr>

					<?php
						foreach($cl_project_list as $row) 
							{?>
								<tr>
								<td align="center" <?php if($row['projectstatus']=="Running"){ echo "style='color:#CC0000'"; } else echo "style='color:#003300'";?> ><?php print($row['projectstatus']);?></td>
								<td align="center"><a name="client" href="#" onclick="getLink(this)" title="<?php echo $row['projectName']; ?>"><?php print($row['projectName']);?></td>
								<td align="center"><?php print($row['projectStartDate']);?></td>
								<td align="center"><?php print($row['projectfinishDate']);?></td>
								</tr>	
							<?php //print("<li><a href='$bu{$mi->url}'>{$mi->page}</a></li>\n"); ?>
                  		<?php 
							}	?></table>						
					<?php 
					}
		 				$form_attributes=array('method' => 'post','name' => 'myform');
						 echo form_open('http://localhost/BRTC/index.php/project/index',$form_attributes) . "\n"; ?>
							<input type="hidden" name="project" value=""  >
							<input type="hidden" name="role" value=""  >
					<?php
						echo form_close();?>
				 
					 
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
