<?php
class Menu extends CI_Model {
    var $menu = false;
    function  __construct() {
        parent::__construct();
    }
    function load($module) {
        // check current user and generate only applicable menuitems
        //$query = $this->db->query("select * from menu where module='$module'");
        //$this->menu = $query->result();
        //return true;
		return false;
    }
	function getMenu($module,$role)
	{
			$menulist=array();
	        $sql = <<<EOT
            select *
            from menu
            where moduleName='$module' and  role='$role'
EOT;
		
		$menu=$this->db->query($sql);
		
		if ($menu->num_rows()>0)
		{
			$i=0;
			foreach($menu->result_array() as $row)
			{
				$menulist[$i++]=$row['link']; 
				//$menulist++;
				//echo $row['link'];
			}
			
			return $menulist;
		}
		
		return FALSE;
	}
    function getCategories() 
	{
        $res = array();
        if ($this->menu != false) 
		{
            foreach ($this->menu as $mi) 
			{
                if (in_array($mi->category, $res) == false) 
				{
                    $res[] = $mi->category;
                }
            }
        }
        return $res;
    }
    function getPages($category) 
	{
        $res = array();
        if ($this->menu != false) 
		{
            foreach ($this->menu as $mi) 
			{
                if ($mi->category==$category) 
				{
                    $res[] = $mi;
                }
            }
        }
        return $res;
    }
}
?>
