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
	
}

?>