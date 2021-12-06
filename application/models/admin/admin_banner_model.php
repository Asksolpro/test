<?php
class admin_banner_model extends CI_Model
{
	function __construct()
	{
        parent::__construct();
    }
	
	function DataView()
	{
        $sql = "SELECT * FROM banner ORDER BY bannerID ASC";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
		
		//print_array($row);
        return $row;
	}
	
	
	function LastSort()
	{
		$sql = "SELECT Sort + 1 as LastSort FROM banner ORDER BY Sort DESC LIMIT 1";
        $qry = $this->db->query($sql);
		$num = $qry->num_rows();
		
		if($num > 0)
		{
			$row = $qry->result_array();
			return $row[0]['LastSort'];
		}else{
			return 1;
		}
	}
	
	function CurrentImageList()
	{
		$sql = "SELECT Image FROM banner where Image <> '' GROUP BY Image ORDER BY Image DESC";
		$qry = $this->db->query($sql);
		$row = $qry->result_array();
		
		return $row;
	}
	
	function GetLastbannerID()
	{
		$sql = "SELECT (bannerID + 1) AS bannerID FROM banner ORDER BY bannerID DESC LIMIT 1";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		
		if($num > 0){
			$row = $qry->result_array();
			return $row[0]['bannerID'];
		}else{
			return 1;
		}
	}
	
	function DataEdit($bannerID)
	{
        $sql = "SELECT * FROM banner WHERE bannerID = '$bannerID' ";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
		
        return $row;
	}
	
	function Update_Publish($bannerID) // liat kondisi publish
	{
		$sql = "SELECT bannerID, Publish FROM banner where bannerID='$bannerID' LIMIT 1";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
		
		return $row;		
	}
	
	function SetNullPublishFlg()
	{
        $sql = "Update banner set PublishFlg=0";
        $qry = $this->db->query($sql);
	}
	
	function UpdatePublishFlg($PublishFlg)
	{
        $sql = "Update banner set PublishFlg=1 where bannerID in('$PublishFlg')";
        $qry = $this->db->query($sql);
	}
	
	function UpdateSort($bannerID, $Sort, $link)
	{
        $sql = "Update banner set link='$link', Sort='$Sort' where bannerID='$bannerID'";
        $qry = $this->db->query($sql);
		
		//echo $Sort[0]['Sort'];
	}
	
	function config_module($MENU_ID)
	{
		$sql = "SELECT * FROM config_module WHERE MenuID = '$MENU_ID'";
        $qry = $this->db->query($sql);
        $row = $qry->result_array();
		
        return $row;
	}
	

	
	function CekImage($bannerID)
	{
		$sql = "SELECT Image FROM banner where bannerID = '$bannerID'";
		$qry = $this->db->query($sql);
		$row = $qry->result_array();
		
		$Image = $row[0]['Image']; // nama dari image yang ada di database
		
		/// cek image ada yang pakai dengan nama yang sama atau tidak
		$sql2 = "SELECT Image FROM banner WHERE Image = '$Image' AND Image <> '' ";
		$qry2 = $this->db->query($sql2);
		$num = $qry2->num_rows();
		
		return array('Image'=>$Image,'Count'=>$num);
	}
}
?>