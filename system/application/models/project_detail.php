<?php
class Project_Detail extends CI_Model 
{
    function  __construct() 
	{
        parent::__construct();
    }
	
	function getProjectInfo($projectname)
	{
		$projectdetail=array();
	        $sql = <<<EOT
            select *
            from project
            where projectName='$projectname'
EOT;
		
		$projectdata=$this->db->query($sql);
		
		if ($projectdata->num_rows()==1)
		{
			$projectdetail=$projectdata->row_array();
			return $projectdetail;
		}
		
		return FALSE;
		
	
	}
	function getFundSources($projectname)
	{

		$sql= <<< EOT
		select *
		from fund
		where projectID='$projectname'
EOT;
		$funddata=$this->db->query($sql);
		if($funddata->num_rows()>0)
		{
			foreach($funddata->result_array() as $row)
			{
				$fid=$row['fundID'];
				$fund_detail[$fid]['fundID']=$row['fundID'];
				$fund_detail[$fid]['projectID']=$row['projectID'];
				$fund_detail[$fid]['clientID']=$row['clientID'];
				$fund_detail[$fid]['total_amount']=$row ['total_amount'];
				$fund_detail[$fid]['remaining_amount']=$row['remaining_amount'];
				
			}
			return $fund_detail;
		}
	}
	
}

?>