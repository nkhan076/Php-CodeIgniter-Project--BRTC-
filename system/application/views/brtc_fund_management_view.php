<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script type="text/javascript">
            function base_url() {
                return "<?php print(base_url());?>";
            }
        </script>

        <title>BRTC  <?php echo $module; ?></title>
        <meta http-equiv="Content-Language" content="English" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/template1.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery-ui.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
        <script type="text/javascript">		
			$(document).ready(function()
			{  
				$("#btn_login").click( function()
				{
						
						/*function loging(evt) {*/
						var post_username =$('#username').val();
						var post_password=$('#password').val();
						
						postdata=post_username+post_password;
						//document.write(postdata);
						//event.preventDefault(); 
        
						// get some values from elements on the page:
					
						if($('#username').val()==='' || $('#password').val()==='')
							{
								alert("Please enter username and password. ");
								
								
							}
						else
						{
							$.post(
									base_url()+'session/login',{$post_username,$post_password}
									);
						}
						
					//
					//})
						/*$.ajax
						({
							type: 'POST',
							url: base_url() + 'session/login',
							data:postdata ,
							datatype: 'html',
							success : function (result) 
							{
								alert(postdata);
								/*if (result == "false") 
								{
									alert("Wrong username and/or password");
								} 
								else 
								{
									document.getElementsById("logged_name").html("Login as: "+result);
									$('#login').hide('slow');
									$('#loggedin').show('slow');
								}*/
							//}
						//});/*ajax*/
					}) /*click*/
				});/*ready*/
					
				
		 
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
						$this->load->view($login);  ?>
 
                    </div>
                    <div id="loggedin">
					<?php
					if($loggedin!="")
					 $this->load->view($loggedin);?>
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
                    <?php echo $message;$this->load->view($content_view); ?>
                </div>
            </div>
            <div style="clear: both;"> </div>

            <div id="footer">
                &copy;Department of CSE, BUET. BRTC Fund Management prototype by CSE'07 batch
            </div>
        </div>
    </body>
</html>