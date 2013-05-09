					<?php

						 $form_attributes=array('method' => 'post','name' => 'login_form');
						 echo form_open('session/login',$form_attributes) . "\n"; ?>

						username: <input type="text" id="username" name="username" value=""/>
                        password: <input type="password" id="password" name="password" value=""/>
                        <input type="submit" id="btn_login" value="Login" name="btn_login"/>
						<?php
						echo form_close();
				 ?>