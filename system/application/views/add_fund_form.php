<?php
        $projectdetail=$this->session->userdata('projectdetail');
        $form_attributes=array('method' => 'post','name' => 'add_fund_form');
		echo form_open('add_fund/add_fnd',$form_attributes);	
?>

        <table width="540" height="350" border="2" onmouseover="<?php echo "Enter Expense Details";?>" bordercolor="#CC6600" bgcolor="#FFFFCC" bordercolordark="#000066">
         <tr>
         <th align="center" width="5">No.of Row </th>
         <th align="center" width="170">Name of Fund </th>
         <th align="center" width="30">Client ID </th>
         <th align="center" width="170">Fund Amount <strong>Enter amount in tk.</strong> </th>
         <th align="center" width="165">Date</th>
         </tr>
         <tr>
         <td align="center">1.</td>
         <td align="center"><input type="text" name="fund_name1" /></td>
         <td align="center"><input type="text" name="client_id1" /></td>
         <td align="center"><input type="text" name="fund_amount1" /></td>  
         <td align="center"><input type="text" name="date1" /></td> 
         </tr>
         <tr>
         <td align="center">2.</td>
         <td align="center"><input type="text" name="fund_name2" /></td>
         <td align="center"><input type="text" name="client_id2" /></td>
         <td align="center"><input type="text" name="fund_amount2" /></td>  
         <td align="center"><input type="text" name="date2" /></td> 
         </tr>
         <tr>
         <td align="center">3.</td>
         <td align="center"><input type="text" name="fund_name3" /></td>
         <td align="center"><input type="text" name="client_id3" /></td>
         <td align="center"><input type="text" name="fund_amount3" /></td>  
         <td align="center"><input type="text" name="date3" /></td> 
         </tr>
         <tr>
         <td align="center">4.</td>
         <td align="center"><input type="text" name="fund_name4" /></td>
         <td align="center"><input type="text" name="client_id4" /></td>
         <td align="center"><input type="text" name="fund_amount4" /></td>  
         <td align="center"><input type="text" name="date4" /></td> 
         </tr>
         <tr>
         <td align="center">5.</td>
         <td align="center"><input type="text" name="fund_name5" /></td>
         <td align="center"><input type="text" name="client_id5" /></td>
         <td align="center"><input type="text" name="fund_amount5" /></td>  
         <td align="center"><input type="text" name="date5" /></td> 
         </tr>
        </table>
        <br />
         <input type="submit" name="add_fund_btn" value="Add" align="middle"/>
		<input type="submit" name="add_more_fund_btn" value="Add More" align="middle" onclick="add_fund_more_form"/>
         <input type="reset" align="middle"name="reset_btn" value="Reset"/>
            
        
<?php
		echo form_close();
?>