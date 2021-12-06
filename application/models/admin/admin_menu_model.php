<?php
class admin_menu_model extends CI_Model
{
    function __construct()
	{
        parent::__construct();
    }
	function SelectIn($table, $select, $option= '')
	{	
		$sql 	= "SELECT $select FROM $table $option";
		$qry 	= $this->db->query($sql);
		$row 	= $qry->result_array();
		return $row;
	}
	function DataView()
	{
        $sql = "SELECT MenuID, MenuName, sort, (CASE MenuType WHEN 'B' THEN 'Backend' WHEN 'F' THEN 'Frontend' ELSE 'Super Admin' END) AS MenuType 
				FROM menumst WHERE ParentNumber = 0
				ORDER BY sort ASC";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	function DataSub($menuID)
	{
        $sql = "SELECT MenuID, MenuName, sort, ParentNumber, (CASE MenuType WHEN 'B' THEN 'Backend' WHEN 'F' THEN 'Frontend' ELSE 'Super Admin' END) AS MenuType 
				FROM menumst WHERE ParentNumber = '$menuID' AND menu_level = '2'
				ORDER BY sort ASC";
        $qry = $this->db->query($sql);
		//echo $sql;
        $row = $qry->result_array();
        return $row;
	}
	function getMenuLev2($menuID)
	{
		$sql = "SELECT * FROM ms_menu WHERE parent_number = $menuID order by ID DESC";
        $qry = $this->db->query($sql);
        $row = $qry->result();
        return $row;
	}
	function GetLastGroupID()
	{
		//$sql = "SELECT max(UserGroupID)+1 as UserGroupID FROM usergroupdtlmst where MenuID = $MenuID ";
		//echo $sql;
		$sql = "SELECT (ID)+1 as UserGroupID FROM user_group order by ID DESC limit 1 ";
		$qry = $this->db->query($sql);
		$row = $qry->result_array();
		if($row[0]['UserGroupID'] <> '')
		{
			$MenuID =  $row[0]['UserGroupID'];
		}else{
			$MenuID = '1';
		}
		return $MenuID;
	}
	function insertUserGroup($usergroupname)
	{
		    $ID_group        = $this->admin_menu_model->GetLastGroupID();
			$data = array(
			    'ID' => $ID_group,
			    'name' => $usergroupname,
			    'sort' => $ID_group		
			);
			$this->db->insert('user_group', $data);
			return  $ID_group;
	}
	function GetLastIDGroupDetail()
	{
		//$sql = "SELECT max(UserGroupID)+1 as UserGroupID FROM usergroupdtlmst where MenuID = $MenuID ";
		//echo $sql;
		$sql = "SELECT (ID)+1 as ID FROM user_group_detail order by ID DESC limit 1 ";
		$qry = $this->db->query($sql);
		$row = $qry->result_array();
		if($row[0]['ID'] <> '')
		{
			$MenuID =  $row[0]['ID'];
		}else{
			$MenuID = '1';
		}
		return $MenuID;
	}
	function InsertUserGroupDetail($ID_group, $id_menu)
	{
		    $ID_group_detail = $this->admin_menu_model->GetLastIDGroupDetail();
			$data = array(
			    'ID' => $ID_group_detail,
			    'id_group' => $ID_group,
			    'id_menu' => $id_menu		
			);
			$this->db->insert('user_group_detail', $data);
			return true;
	}
	function UpdateUserGroupDetail($ID_group, $id_menu)
	{		
		$sql = "UPDATE user_group_detail set read_flg = 1 WHERE id_group = $ID_group AND id_menu = $id_menu";	
		$qry =$this->db->query($sql);					
		return true;
	}
	function setNullGroup($ID_group)
	{		
		$sql = "UPDATE user_group_detail set read_flg = 0 WHERE id_group = $ID_group ";	
		$qry =$this->db->query($sql);					
		return true;
	}
	function getDateEditGroup($ID_group)
	{
		$sql = "SELECT a.*, b.name, b.menu_level FROM user_group_detail a left join ms_menu b on a.id_menu = b.id WHERE a.id_group = $ID_group ORDER By ID ASC ";	
		$qry = $this->db->query($sql);	
		$row = $qry->result();	
		return $row;
	}
	function GetLastMenuID()
	{
		$sql = "SELECT max(MenuID)+1 as MenuID FROM menumst";
		$qry = $this->db->query($sql);
		$row = $qry->result_array();
		if($row[0]['MenuID'] <> '')
		{
			$MenuID =  $row[0]['MenuID'];
		}else{
			$MenuID = '1';
		}
		return $MenuID;
	}
	function SetCheckedAdmin($MenuID)
	{
        $sql = "UPDATE usergroupdtlmst SET ReadFlg = '1' WHERE UserGroupID = '1' AND MenuID = '$MenuID'";
        $qry = $this->db->query($sql);
	}
	function UpdateSort($MenuID, $sort)
	{
        $sql = "Update ms_menu set sort='$sort' where ID='$MenuID'";
        $qry = $this->db->query($sql);
	}
	function UpdateSortSub($MenuID, $sort)
	{
        $sql = "Update menumst set sort='$sort' where MenuID='$MenuID'";
        $qry = $this->db->query($sql);
	}
	function UpdateChild($Child) // for sub menu
	{
        $sql = "Update menumst set Child='$Child' where MenuID='$Child'";
        $qry = $this->db->query($sql);
	}
	function SetNullChild($ParentNumber)
	{
        $sql = "Update menumst set Child=NULL where MenuID='$ParentNumber'";
        $qry = $this->db->query($sql);
	}
	function SetNullcMenuName($Child)
	{
        $sql = "Update menumst set cMenuName=NULL where MenuID='$Child'";
        $qry = $this->db->query($sql);
	}
	function CekParentNumber($ParentNumber)
	{
		$sql = "SELECT ParentNumber FROM menumst Where ParentNumber='$ParentNumber'";
		$qry = $this->db->query($sql);
		$row = $qry->result_array();
		return $row;
	}
	function CekChild($Child)
	{
		$sql = "SELECT Child FROM menumst Where Child='$Child'";
		$qry = $this->db->query($sql);
		$row = $qry->result_array();
		return $row;
	}
	//===================================sub sub menu =====================================
	function DataSubSub($id_menu)
	{
        $sql = "SELECT MenuID, Child, MenuName, sort, ParentNumber, 
				(CASE MenuType WHEN 'B' THEN 'Backend' WHEN 'F' THEN 'Frontend' ELSE 'Super Admin' END) AS MenuType 
				FROM menumst 
				WHERE ParentNumber = '$id_menu' 
				AND menu_level = '3'
				ORDER BY MenuID ASC";
		//echo $sql;
		//AND Child = '$MenuSubID'
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	function DataSubSubSub($id_sub_menu)
	{
        $sql = "SELECT MenuID, MenuName, sort, ParentNumber, 
				(CASE MenuType WHEN 'B' THEN 'Backend' WHEN 'F' THEN 'Frontend' ELSE 'Super Admin' END) AS MenuType 
				FROM menumst 
				WHERE ParentNumber = '$id_sub_menu' 
				AND menu_level = '4'
				ORDER BY MenuID ASC";
		//echo $sql;
		//AND Child = '$MenuSubID'
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	function CekChildsubsub($Child)
	{
		$sql = "SELECT Child FROM menumst Where Child='$Child'";
		$qry = $this->db->query($sql);
		$row = $qry->result_array();
		/*
		$sql = "SELECT COUNT(Child) FROM menumst Where Child='$Child'";
		$qry = $this->db->query($sql);
		$row = $qry->result_array();
		*/
		return $row;
	}
	function SetNullChildsubsub($Child)
	{
        $sql = "Update menumst set Child=NULL where MenuID='$Child'";
        $qry = $this->db->query($sql);
	}
	/////////////////////////////////////////////////////// Insert Config Global for menu ////////////////////////////////////////////////////////////////
	function InsertConfigModul($MenuID)
	{
        $sql = "INSERT INTO `config_module` (
											 `MenuID`,
											 `ModuleName`,
											 `Name`,
											 `Name_Req`,
											 `Name_MaxChars`,
											 `E_Name`,
											 `E_Name_Req`,
											 `E_Name_MaxChars`,
											 `ShortDesc`,
											 `ShortDesc_Req`,
											 `ShortDesc_MaxChars`,
											 `E_ShortDesc`,
											 `E_ShortDesc_Req`,
											 `E_ShortDesc_MaxChars`,
											 `LongDesc`, `LongDesc_Req`,
											 `LongDesc_MaxChars`,
											 `E_LongDesc`,
											 `E_LongDesc_Req`,
											 `E_LongDesc_MaxChars`,
											 `Image`
								) VALUES (		
											  $MenuID,
											  (SELECT MenuName FROM menumst WHERE MenuID=$MenuID),
											  1,
											  1,
											  20,
											  1,
											  1,
											  20,
											  1,
											  1,
											  100,
											  1,
											  1,
											  100,
											  1,
											  1,
											  1,
											  1,
											  1,
											  1,
											  1
										)";	
        $qry = $this->db->query($sql);
	}
	function DataEditMenu($MenuID)
	{
        $sql = "SELECT * FROM menumst WHERE MenuID = '$MenuID'";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	function DataEditUser($UserID)
	{
        $sql = "SELECT a.*, b.*
				FROM usermst a
				LEFT JOIN usergroupmst b ON a.UserGroupID = b.UserGroupID
				WHERE a.UserID = '$UserID'
				";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	function DataLog($limit, $offset)
	{
        $sql = "
			SELECT a.* , b.UserID, b.UserName, b.UserGroupID, c.UserGroupID
			FROM admin_log a
			LEFT JOIN usermst b ON a.id_admin = b.UserID
			LEFT JOIN usergroupmst c ON b.UserGroupID = c.UserGroupID
			WHERE a.id_admin > 1
			ORDER BY id ASC limit $limit offset $offset";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	function DataLogNum()
	{
        $sql = "
			SELECT a.id
			FROM admin_log a
			LEFT JOIN usermst b ON a.id_admin = b.UserID
			LEFT JOIN usergroupmst c ON b.UserGroupID = c.UserGroupID
			WHERE a.id_admin > 1
			ORDER BY id ASC";
        $qry = $this->db->query($sql);
        $row = $qry->num_rows();
        return $row;
	}
}
?>