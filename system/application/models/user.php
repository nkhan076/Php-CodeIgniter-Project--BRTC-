<?php
class User extends CI_Model 
{
    function  __construct() 
	{
        parent::__construct();
    }
    function authenticate($username, $password) 
	{
	//print $username.$password;
        $sql = <<<EOT
            select count(*) as is_there
            from user
            where userID='$username' and password='$password'
EOT;

        $data = $this->db->query($sql);
		//print($data->num_rows());
        if ($data->num_rows()==1) 
		{
            $res = $data->row_array();//print($res);
            //print $res[userName];
			//$res=mysql_result($row,"userName");
			//$userid=$username;
			return $res['is_there'];
        }
        return FALSE;
    }
	function getDetail($userid)
	{
		$userdetail=array();
	        $sql = <<<EOT
            select *
            from user
            where userID='$userid'
EOT;
		
		$userdata=$this->db->query($sql);
		
		if ($userdata->num_rows()==1)
		{
			$userdetail=$userdata->row_array();
			return $userdetail;
		}
		
		return FALSE;
		
	}
	function getProjectStatus($startDate,$endDate)
	{
	/*The explode() function is used mostly to convert strings into arrays. It takes two arguments: the separator and the string. 
	The syntax of the gregoriantojd() function is gregoriantojd($month, $day, $year)*/
		$date_parts1=explode('-', $startDate);
    	$date_parts2=explode('-', $endDate);
		$start_date=gregoriantojd($date_parts1[1], $date_parts1[2], $date_parts1[0]);
    	$end_date=gregoriantojd($date_parts2[1], $date_parts2[2], $date_parts2[0]);
		$date_parts3=explode('-', date("Y-m-d", time()) );
		$currentDate=gregoriantojd($date_parts3[1], $date_parts3[2], $date_parts3[0]);
		//echo $date_parts1[0]."<br/>";
		//echo $date_parts1[1]."<br/>";
		//echo $date_parts1[2]."<br/>";
		if(($date_parts2[0] !=0) && ($date_parts2[1] !=0) && ($date_parts2[2] !=0))
		{
			$is_finish=$currentDate-$end_date;
			//print ($is_finish);
			if($is_finish > 0)
			{
				//print("complted");
				$status="Completed";
				return $status;
			}
		}
		else
		{
			$status="Running";
			return $status;
		}
		
	}
	function getplProject($userid)
	{
		//$pl_project_list=array();//$pl_project_deatil=array(array());
	        $sql = <<<EOT
            select projectID
            from projectLeader
            where projectLeaderID='$userid'
EOT;
		
		$pl_project=$this->db->query($sql);
		
		if ($pl_project->num_rows() > 0)
		{
			$i=0;
			foreach($pl_project->result_array() as $row)
			{
				$pid=$row['projectID'];//echo $pid;
				$sql= 
				"select projectName,projectStartDate,projectfinishDate
				from project
				where projectID='$pid' ";
				$pl_project_list=$this->db->query($sql);
				$res=$pl_project_list->row_array();
				$pl_project_detail[$pid]['projectName']=$res['projectName'];
				$date1=$res['projectStartDate'];
				$date2=$res['projectfinishDate'];
				$status=$this->getProjectStatus($date1,$date2);
				$pl_project_detail[$pid]['projectStartDate']=$res['projectStartDate'];
				$pl_project_detail[$pid]['projectfinishDate']=$res['projectfinishDate'];
				$pl_project_detail[$pid]['projectstatus']=$status;
				
			}
			return $pl_project_detail;
		}
		
		return FALSE;
		
	}
	function gettlProject($userid)
	{
		//$pl_project_list=array();//$pl_project_deatil=array(array());
	        $sql = <<<EOT
            select projectID,teamID
            from team
            where teamLeaderID='$userid'
EOT;
		
		$tl_project=$this->db->query($sql);
		
		if ($tl_project->num_rows() > 0)
		{
			$i=0;
			foreach($tl_project->result_array() as $row)
			{
				$pid=$row['projectID'];//echo $pid;
				$sql= 
				"select projectName,projectStartDate,projectfinishDate
				from project
				where projectID='$pid' ";
				$tl_project_list=$this->db->query($sql);
				$res=$tl_project_list->row_array();
				$date1=$res['projectStartDate'];
				$date2=$res['projectfinishDate'];
				$status=$this->getProjectStatus($date1,$date2);
				$tl_project_detail[$pid]['projectName']=$res['projectName'];
				$tl_project_detail[$pid]['projectStartDate']=$res['projectStartDate'];
				$tl_project_detail[$pid]['projectfinishDate']=$res['projectfinishDate'];
				$tl_project_detail[$pid]['projectstatus']=$status;
				$tl_project_detail[$pid]['teamID']=$row['teamID'];
				///$tl_project
				
			}
			return $tl_project_detail;
		}
		
		return FALSE;
		
	}
	
	function getclProject($userid)
	{
		//$pl_project_list=array();//$pl_project_deatil=array(array());
	        $sql = <<<EOT
            select projectID
            from client
            where clientID='$userid'
EOT;
		
		$cl_project=$this->db->query($sql);
		
		if ($cl_project->num_rows() > 0)
		{
			$i=0;
			foreach($cl_project->result_array() as $row)
			{
				$pid=$row['projectID'];//echo $pid;
				$sql= 
				"select projectName,projectStartDate,projectfinishDate
				from project
				where projectID='$pid' ";
				$cl_project_list=$this->db->query($sql);
				$res=$cl_project_list->row_array();
				$date1=$res['projectStartDate'];
				$date2=$res['projectfinishDate'];
				$status=$this->getProjectStatus($date1,$date2);
				$cl_project_detail[$pid]['projectName']=$res['projectName'];
				$cl_project_detail[$pid]['projectStartDate']=$res['projectStartDate'];
				$cl_project_detail[$pid]['projectfinishDate']=$res['projectfinishDate'];
				$cl_project_detail[$pid]['projectstatus']=$status;
				
				///$tl_project
				
			}
			return $cl_project_detail;
		}
		
		return FALSE;
		
	}
	
}
?>
