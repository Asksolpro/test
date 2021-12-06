<?php
class admin_group_model extends CI_Model
{
	function __construct()
	{
        parent::__construct();
    }
	function getUserAdmin()
	{
        $sql = "SELECT a.*, b.*
		FROM usermst a 
		LEFT JOIN user_group b ON a.`UserGroupID`= b.id 
		Where a.UserID <> 1 order by a.UserID ASC";
        $qry = $this->db->query($sql);
        $row = $qry->result();
        return $row;
	}
	function menumst()
	{
        $sql = "SELECT MenuID, MenuName FROM menumst WHERE ParentNumber=0 AND MenuType = 'B' ORDER BY sort ASC";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	function menumst_child($parentNumber)
	{
        $sql = "SELECT MenuID, MenuName FROM menumst WHERE ParentNumber=".$parentNumber." AND MenuType = 'B' ORDER BY sort ASC";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	function menuMstSubChild($subMenuID)
	{
        $sql = "SELECT MenuID, MenuName FROM menumst WHERE ParentNumber=".$subMenuID." AND MenuType = 'B' ORDER BY sort ASC";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	function menuMstSubSubChild($subSubMenuID)
	{
        $sql = "SELECT MenuID, MenuName FROM menumst WHERE ParentNumber=".$subSubMenuID." AND MenuType = 'B' ORDER BY sort ASC";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	function usergroupmst()
	{
        $sql = "SELECT UserGroupID, UserGroupName FROM usergroupmst WHERE UserGroupID <> '1' ORDER BY UserGroupName ASC";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	function GetLastUserID()
	{
		$sql = "SELECT (UserID + 1) AS UserID FROM usermst ORDER BY UserID DESC LIMIT 1";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();	
		if(count($row) == 0){
			return 1;
		}else{
			return $row[0]['UserID'];
		}
	}
	function GetLastUserGroupID()
	{
		$sql = "SELECT (UserGroupID + 1) AS UserGroupID FROM usergroupmst ORDER BY UserGroupID DESC LIMIT 1";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
		if(count($row) == 0){
			return 1;
		}else{
			return $row[0]['UserGroupID'];
		}
	}
	function InsertUserGroupDetail($UserGroupID)
	{
        $sql = "INSERT INTO usergroupdtlmst (UserGroupID, MenuID, ReadFlg, ModifyFlg) Select '$UserGroupID', MenuID, '0', '0' From menumst";
        $qry = $this->db->query($sql);
	}
	function UpdateUserGroupDetail($UserGroupID, $ReadFlg)
	{
		$sql = "Update usergroupdtlmst set ReadFlg=1 where UserGroupID = '$UserGroupID' and MenuId in('$ReadFlg')";
        $qry = $this->db->query($sql);
	}
	function DataEdit($UserGroupID)
	{
        $sql = "SELECT a.*, b.*, c.UserGroupName
				FROM menumst a 
				LEFT JOIN usergroupdtlmst b ON a.MenuID = b.MenuID 
				LEFT JOIN usergroupmst c ON b.UserGroupID = c.UserGroupID 
				WHERE a.ParentNumber=0 AND a.MenuType = 'B' AND b.UserGroupID = $UserGroupID
				GROUP BY a.MenuID 
				ORDER BY a.sort ASC 
			   ";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	/*
	function DataEdit($UserGroupID)
	{
        $sql = "SELECT a.*, b.*, c.UserGroupName
				FROM usergroupdtlmst a 
				LEFT JOIN usergroupdtlmst b ON a.MenuID = b.MenuID 
				LEFT JOIN usergroupmst c ON b.UserGroupID = c.UserGroupID 
				WHERE ParentNumber=0 AND MenuType = 'B' AND b.UserGroupID = $UserGroupID
				GROUP BY a.MenuID 
				ORDER BY sort ASC 
			   ";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}*/
	function DataEdit_child($MenuID, $UserGroupID)
	{
        $sql = "SELECT a.*, b.* 
				FROM menumst a 
				LEFT JOIN usergroupdtlmst b ON (a.MenuID = b.MenuID  AND b.UserGroupID = $UserGroupID)
				WHERE a.ParentNumber=".$MenuID." AND a.MenuType = 'B'
			    GROUP BY a.MenuID
				ORDER BY a.sort ASC 
			   ";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
		//echo $qry;
        return $row;
	}
	function DataEdit_Subchild($MenuIDChild,$UserGroupID)
	{
        $sql = "SELECT a.*, b.* 
				FROM menumst a 
				LEFT JOIN usergroupdtlmst b ON (a.MenuID = b.MenuID  AND b.UserGroupID = $UserGroupID)
				WHERE a.ParentNumber=".$MenuIDChild." AND a.MenuType = 'B'
			    GROUP BY a.MenuID
				ORDER BY a.sort ASC 
			   ";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
		//echo $qry;
        return $row;
	}
	function DataEdit_SubSubchild($MenuIDSubChild,$UserGroupID)
	{
        $sql = "SELECT a.*, b.* 
				FROM menumst a 
				LEFT JOIN usergroupdtlmst b ON (a.MenuID = b.MenuID  AND b.UserGroupID = $UserGroupID)
				WHERE a.ParentNumber=".$MenuIDSubChild." AND a.MenuType = 'B'
			    GROUP BY a.MenuID
				ORDER BY a.sort ASC 
			   ";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
		//echo $qry;
        return $row;
	}
	/*
	function DataEdit($UserGroupID)
	{
        $sql = "SELECT ugd.UserGroupID, ugd.MenuID, ug.UserGroupName, m.MenuName, ugd.ReadFlg, ugd.ModifyFlg
				FROM usergroupdtlmst ugd, usergroupmst ug, menumst m
				WHERE ugd.UserGroupID = ug.UserGroupID AND ugd.MenuID = m.MenuID AND m.MenuType = 'B' AND ugd.UserGroupID = '$UserGroupID' 
				ORDER BY m.sort ASC";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	function DataEditChild($UserGroupID)
	{
        $sql = "SELECT ugd.UserGroupID, ugd.MenuID, ug.UserGroupName, m.MenuName, ugd.ReadFlg, ugd.ModifyFlg
				FROM usergroupdtlmst ugd, usergroupmst ug, menumst m
				WHERE ugd.UserGroupID = ug.UserGroupID AND ugd.MenuID = m.MenuID AND m.MenuType = 'B' AND ugd.UserGroupID = '$UserGroupID' 
				ORDER BY m.MenuName ASC";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
	*/
	function SetNullUserGroupDetail($UserGroupID)
	{
        $sql = "Update usergroupdtlmst set ReadFlg=0, ModifyFlg=0 where UserGroupID = '$UserGroupID'";
        $qry = $this->db->query($sql);
	}
	function DataUserGroup()
	{
        $sql = "SELECT * FROM user_group  ORDER BY ID ASC";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
        return $row;
	}
}
?>