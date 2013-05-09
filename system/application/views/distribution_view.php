<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<?php
	//echo base_url();
	$user=$this->session->userdata('userdetail');
	$projectdetail=$this->session->userdata('projectdetail');
	$fund_detail_list=$this->session->userdata('fund_detail_list');
	$menulist=$this->session->userdata('menulist');
	?>
        <script type="text/javascript">
            function base_url() 
			{
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
		<script type="text/javascript">
		function getNFund(form)
		{
			if(document.fund_distribution_non_workload.submit())
				alert("All distribution settings have been ssuccessfully saved.");
				
			return true;
		}
		</script>

		<script type="text/javascript">
		function check_amount(obj)
		{
			var z=obj['fundID[]'].value;
			var x=obj['remaining_amount[]'].value;
			var y=obj['fund[]'].value;
			//alert(y);
			
			return true;
		}
		</script>
		<script type="text/javascript">
		function get_total_fdamount(f)
		{
			
	
			var z=0;
			for (var i=0; i<f['fund[]'].length; ++i)
				{
					
						var y=f['fund[]'][i].value;
						z=z+parseFloat(y);
				}

				
			document.fund_distribution_non_workload.project_balance.value=z;
			return true;
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
						print "Project Name : ".$projectdetail['projectName']."<br/>";
						print "Project ID : ".$projectdetail['projectID']."<br/>";
						print "Organization Name : ".$projectdetail['OrganizationName']."<br/>";
				?>
				
				<?php 
					//$this->load->model('project_detail','', true);
					//$fund_detail_list=$this->project_detail->getFundSources($projectdetail['projectID']);	 
					if($fund_detail_list)
					{  ?>
					<br/>
					<h3 style="font-family:Verdana, Arial, Helvetica, sans-serif; color:#990000">List of Funds for <?php echo $projectdetail['projectName'];?></h3>
					<form method="post" name="fund_distribution_non_workload" action="../distribution/fund_non_workload"><br/>
					<p>Total Distributed Fund Amount   <input name="project_balance"  type="text" value="" title="Total Distributed Amount" disabled="disabled" /> Taka.	</p><br/>
					<table width="628" border=“1” bordercolor="#CC0000">
					<tr>    		   
						 
						 <th width="168" align="center">FundID</th>
						 <th width="168" align="center">ClientID</th>
						 <th width="168" align="center">Total Amount</th>
						 <th width="252" align="center">Remaining Amount</th>
						 <th width="252" align="center">Amount To Be Distributed</th>
					</tr>
				
					<?php
					
						foreach($fund_detail_list as $row) 
							{?>
								<tr>
								<input name='remaining_amount[]' type="hidden" value="<?php echo $row['remaining_amount'];?>" >
								<input name='fundID[]' type="hidden" value="<?php echo $row['fundID'];?>">
								<td align="center" ><?php print($row['fundID']);?></td>
								<td align="center"><?php print($row['clientID']);?></td>
								<td align="center"><?php print($row['total_amount']); ?></td>
								<td align="center"><?php print($row['remaining_amount']);?></td>
		<td align="center"><input name="fund[]" type="text" value="" onchange="check_amount(fund_distribution_non_workload);get_total_fdamount(fund_distribution_non_workload)" title="<?php print($row['fundID']);?>"/></td>	
								</tr>	
							<?php //print("<li><a href='$bu{$mi->url}'>{$mi->page}</a></li>\n"); ?>
                  		<?php 
							}	
							//$this->session->set_userdata('funds',$funds);
							?></table>	
			
									<input name="save_button" type="submit" value="Save" onclick="getNFund(fund_distribution_non_workload)">
									<input name="cancel" type="reset" value="Cancel">
							</form>					
					<?php 
					}?>
				
				

               			 
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
