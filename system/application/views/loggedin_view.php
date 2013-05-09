<script type="text/javascript">
//$('#login').hide();
//document.getElementsById("logged_name").html("Login as: "+);
$('#login').hide('slow');
$('#loggedin').show('slow');
</script>
                        <span id="logged_name">  <!--Logged in as -->
							<?php 
							//$user=$this->session->userdata('userinfo');
							//echo $user['username']; 
							?>
					<form  method="post" action="http://localhost/BRTC/index.php/session/logout"  >
						 <input type="submit" id="btn_logout" name="btn_logout" value="Logout" onclick="logout()" />
						</form>
						</span>
                       