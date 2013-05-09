<?php
        $user=$this->session->userdata('userdetail');
	    $pl_project_list=$this->session->userdata('pl_project_list');
	    $tl_project_list=$this->session->userdata('tl_project_list');
		$i=$j=1;
		$projectdetail=$this->session->userdata('projectdetail');
        $form_attributes=array('method' => 'post','name' => 'add_expense_form');
		$attributes = array('id' => 'add_fund_to_projects', 'class' => 'add_fund_to_projects');
		echo form_open('add_expense/add_exp',$form_attributes);
?>
        
		<h3 style="font-family:Verdana, Arial, Helvetica, sans-serif; color:#990000"><?php echo $projectdetail['projectName']; ?></h3>

        <table width="640" height="600" border="2" cellpadding="1" onmouseover="<?php echo "Enter Expense Details";?>" bordercolor="#CC6600" bgcolor="#FFFFCC">
         <tr>
         <th align="center" width="5">No.of Row </th>
         <th align="center" width="155">Name of Expense </th>
         <th align="center" width="160">Amount of Expenditure <strong>Enter amount in tk.</strong> </th>
         <th align="center" width="160">Details of Expenditure </th>
         <th align="center" width="160">Date of Expenditure </th>
         </tr>
         <tr>
         <td align="center">1.</td>
         <td align="center"><input type="text" name="expense_name1" /></td>
         <td align="center"><input type="text" name="expense_amount1" /></td> 
         <td align="center"><input type="textarea" name="expense_detail1" /></td> 
         <td align="center"><input type="text" name="expense_date1" /></td> 
         </tr>
         <tr>
         <td align="center">2.</td>
         <td align="center"><input type="text" name="expense_name2" /></td>
         <td align="center"><input type="text" name="expense_amount2" /></td> 
         <td align="center"><input type="textarea" name="expense_detail2" /></td> 
         <td align="center"><input type="text" name="expense_date2" /></td>  
         </tr>
         <tr>
         <td align="center">3.</td>
         <td align="center"><input type="text" name="expense_name3" /></td>
         <td align="center"><input type="text" name="expense_amount3" /></td> 
         <td align="center"><input type="textarea" name="expense_detail3" /></td> 
         <td align="center"><input type="text" name="expense_date3" /></td>  
         </tr>
         <tr>
         <td align="center">4.</td>
         <td align="center"><input type="text" name="expense_name4" /></td>
         <td align="center"><input type="text" name="expense_amount4" /></td> 
         <td align="center"><input type="textarea" name="expense_detail4" /></td> 
         <td align="center"><input type="text" name="expense_date4" /></td>  
         </tr>
         <tr>
         <td align="center">5.</td>
         <td align="center"><input type="text" name="expense_name5" /></td>
         <td align="center"><input type="text" name="expense_amount5" /></td> 
         <td align="center"><input type="textarea" name="expense_detail5" /></td> 
         <td align="center"><input type="text" name="expense_date5" /></td>
         </tr>
         <tr>
         <td align="center">6.</td>
         <td align="center"><input type="text" name="expense_name6" /></td>
         <td align="center"><input type="text" name="expense_amount6" /></td> 
         <td align="center"><input type="textarea" name="expense_detail6" /></td> 
         <td align="center"><input type="text" name="expense_date6" /></td>  
         </tr>
         <tr>
         <td align="center">7.</td>
         <td align="center"><input type="text" name="expense_name7" /></td>
         <td align="center"><input type="text" name="expense_amount7" /></td> 
         <td align="center"><input type="textarea" name="expense_detail7" /></td> 
         <td align="center"><input type="text" name="expense_date7" /></td>  
         </tr>
         <tr>
         <td align="center">8.</td>
         <td align="center"><input type="text" name="expense_name8" /></td>
         <td align="center"><input type="text" name="expense_amount8" /></td> 
         <td align="center"><input type="textarea" name="expense_detail8" /></td> 
         <td align="center"><input type="text" name="expense_date8" /></td>  
         </tr>
         <tr>
         <td align="center">9.</td>
         <td align="center"><input type="text" name="expense_name9" /></td>
         <td align="center"><input type="text" name="expense_amount9" /></td> 
         <td align="center"><input type="textarea" name="expense_detail9" /></td> 
         <td align="center"><input type="text" name="expense_date9" /></td>
         </tr>
         <tr>
         <td align="center">10.</td>
         <td align="center"><input type="text" name="expense_name10" /></td>
         <td align="center"><input type="text" name="expense_amount10" /></td> 
         <td align="center"><input type="textarea" name="expense_detail10" /></td> 
         <td align="center"><input type="text" name="expense_date10" /></td>  
         </tr>
         
        </table>
        <br />
         <input type="submit" name="add_btn" value="Add" align="middle"/>
         <input type="reset" align="middle"name="reset_btn" value="Reset"/>
            
        
<?php
		echo form_close();
?>