<?php
class master_model extends CI_Model
{
	function __construct()
	{
        parent::__construct();
		$this->tbl_cat = 'ms_product_category';
		$this->tbl_prod = 'ms_product';
    }
	function mst_last_id($table)
	{
		$sql = "SELECT (ID + 1) AS ID FROM $table ORDER BY ID DESC LIMIT 1";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0){
			$row = $qry->result_array();
			return $row[0]['ID'];
		}else{
			return 1;
		}
	}
	function mst_last_id_2($table)
	{
		$sql = "SELECT ID AS ID FROM $table ORDER BY ID DESC LIMIT 1";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0){
			$row = $qry->result_array();
			return $row[0]['ID'];
		}else{
			return 1;
		}
	}
	function last_id_poin($id_customer)
	{
		$sql = "SELECT saldo AS saldo FROM ms_customer_poin WHERE id_customer=$id_customer ORDER BY ID DESC LIMIT 1";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0){
			$row = $qry->result_array();
			return $row[0]['saldo'];
		}else{
			return 1;
		}
	}
	
	function cekMainFlag($id_product)
	{
		$sql = "SELECT ID FROM product_image WHERE mainImage = 1 AND id_product = $id_product";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		
		return $num;
	}
	
	
	
	
	function getDataEditProduct($id_product)
	{
		$sql = "SELECT * FROM ms_product WHERE ID=$id_product";
		$qry = $this->db->query($sql);
		$row = $qry->result_array();
		return $row;
		
	}
	function select_in($table, $select, $option)
	 {
		$sql = "SELECT $select FROM $table $option";
		//echo $sql;
		$qry = $this->db->query($sql);
		$row = $qry->result();
		return $row;
	 }
	 function select_group($table, $select, $fill)
	 {
		$sql = "SELECT COUNT(*), $select FROM $table WHERE date_in='$fill' GROUP BY $select";
		//echo $sql;
		$qry = $this->db->query($sql);
		$row = $qry->result();
		return $row;
	 }
	 function mst_data($table)
	 {
		$sql = "SELECT * FROM $table ORDER BY sort DESC";
		$qry = $this->db->query($sql);
		$row = $qry->result();
		return $row;
	 }
	
	function global_num($table)
	 {
		$sql = "SELECT ID FROM $table ";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		return $num;
	 }
	
	
	
	function mst_data_edit($modul, $ID)
	{
        $sql = "SELECT * FROM $modul where ID = $ID";
        $qry = $this->db->query($sql);
        $row = $qry->result();
		return $row;
	}
	function mst_update($table, $option, $ID)
	{
        $sql = "UPDATE $table SET $option WHERE ID='$ID'";
        $qry = $this->db->query($sql);
	}
	function cek_code($kode)
	{
		$sql = "SELECT ID FROM ms_product where code = '$kode'";
		//echo $sql;
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0)
		{
			return true;
		}else{
			return false;
		}
	} 
	function mst_check($table, $row, $fill)
	{
		$sql = "SELECT ID FROM `$table` WHERE $row = '$fill'";
        $qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0)
		{
			return true;
		}else
		{
			return false;
		}
	}
	function mst_check_2($table, $option)
	{
		$sql = "SELECT UserID FROM `$table` WHERE $option";
        $qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0)
		{
			return true;
		}else
		{
			return false;
		}
	}
	function mst_check_3($table, $option)
	{
		$sql = "SELECT ID FROM `$table` WHERE $option";
        $qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0)
		{
			return true;
		}else
		{
			return false;
		}
	}
	function check_code($code)
	{
		$sql = "SELECT ID FROM ms_product WHERE code LIKE '%$code%' OR name LIKE '%$code%'";
		//echo $sql;
        $qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0)
		{
			return true;
		}else
		{
			return false;
		}
	}
	function check_history($id_customer, $id_product)
	{
		$sql = "SELECT a.ID, a.id_customer, b.*
				FROM ts_nota a
				LEFT JOIN ts_nota_detail b ON a.ID=b.id_ts
				WHERE a.id_customer = '$id_customer' AND b.id_product='$id_product'";
		//echo $sql;
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0)
		{
			return true;
		}else{
			return false;
		}
	}
	function check_promo($id_category)
	{
		$sql = "SELECT ID
				FROM ms_promo
				WHERE id_category = '$id_category' AND flag_expired=1";
		//echo $sql;
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0)
		{
			return true;
		}else{
			return false;
		}
	}
	function data_history($id_customer, $id_product)
	{
        $sql = "SELECT a.ID, a.id_customer, a.date_in, b.*
				FROM ts_nota a
				LEFT JOIN ts_nota_detail b ON a.ID=b.id_ts
				WHERE a.id_customer = '$id_customer' AND b.id_product='$id_product' ORDER BY a.date_in DESC 
				LIMIT 5
			";
        $qry = $this->db->query($sql);
        $row = $qry->result();
		return $row;
	}
	function price_history($id_customer, $id_product)
	{
		$sql = "SELECT a.ID, a.id_customer, b.id_product, b.price AS price  FROM ts_nota a LEFT JOIN ts_nota_detail b ON a.ID=b.id_ts WHERE a.id_customer=$id_customer AND b.id_product=$id_product ORDER BY ID DESC LIMIT 1";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0)
		{
			$row = $qry->result_array();
			return $row[0]['price'];
		}else
		{
			return false;
		}
	}
	function data_product_by_code($code)
	{
        $sql = "SELECT * FROM ms_product WHERE code LIKE '%$code%' OR name LIKE '%$code%'";
        $qry = $this->db->query($sql);
        $row = $qry->result();
		return $row;
	}
	function mst_get_data($table, $row, $fill)
	{
        $sql = "SELECT * FROM $table WHERE $row ='$fill' order by ID DESC" ;
        $qry = $this->db->query($sql);
        $row = $qry->result();
		return $row;
	}
	function data_customer_by_name($name)
	{
        $sql = "SELECT * FROM ms_customer WHERE name ='$name' ";
        $qry = $this->db->query($sql);
        $row = $qry->result();
		return $row;
	}
	function data_promo()
	{
        $sql = "SELECT a.*, b.name AS name_category FROM ms_promo a LEFT JOIN ms_product_category b on a.id_category = b.ID order by a.ID DESC";
        $qry = $this->db->query($sql);
        $row = $qry->result();
		return $row;
	}
	function create_invoice($name, $id_ts)
	 {						
		 if($id_ts < 10)
		 	{
		      $leght  = '0000';
			}else if($id_ts >=10 && $id_ts < 100)
			{
		      $leght  = '000';
			}else if($id_ts >=100 && $id_ts < 1000)
			{ 
				$leght  = '00';
			}else if ($id_ts >=1000 && $id_ts < 10000)
			{
			  $leght    = '0';
			}else if ($id_ts >=10000 && $id_ts < 100000){
			  $leght    = '';
			}
	   	    $date				= date('Ym');		
			$invoice          	 = $name.''.$date.''.$leght.$id_ts;
		return $invoice;
	 }
	function check_record($table, $id_settlement, $id_product, $price)
	{
		$sql = "SELECT ID FROM `$table` WHERE id_settlement = '$id_settlement' AND id_product='$id_product' AND price='$price'";
        $qry = $this->db->query($sql);
		$num = $qry->num_rows();
		$row = $qry->result();
		if($num > 0)
		{
			$ID=$row[0]->ID;
			return $ID;
		}else
		{
			return false;
		}
		/*
		$sql = "SELECT * FROM `$table` WHERE id_settlement = '$id_settlement' AND id_product='$id_product' AND price='$price'";
        $qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0)
		{
			return true;
		}else
		{
			return false;
		}*/
	}
	 function masterQuery($select, $tbl_nama, $filter='', $orderby='')
	 {
		$sql = "SELECT $select FROM $tbl_nama $filter $orderby";
		$qry = $this->db->query($sql);
		$row = $qry->result();
		return $row;
	 }
	function DataModul($menu, $limit, $offset)
	{
        $sql = "SELECT * FROM $menu order by id DESC limit $limit offset $offset";
        $qry = $this->db->query($sql);
        $row = $qry->result();
		return $row;
	}
	function valid_user($name, $password)
	{
		$query = $this->db->get_where('user', array('name' => $name,'password' => $password), 1, 0);
		return $query->result();
	}
	function getValidUserData($UserName, $UserPwd)
	{
		$query = $this->db->get_where('usermst', array('UserName' => $UserName,'UserPwd' => $UserPwd), 1, 0);
		return $query->result();
	}
	function getNumAll($ID, $table, $where)
	{
		$sql = "SELECT $ID FROM $table $where";
        $qry = $this->db->query($sql);
        $num = $qry->num_rows();
        return $num;
	}
	function DataModulNoLimit($menu)
	{
        $sql = "SELECT id FROM $menu order by id DESC ";
        $qry = $this->db->query($sql);
        $row = $qry->result();
		return $row;
	}
	function DataEdit($menu, $id)
	{
        $sql = "SELECT * FROM $menu where id = $id order by id DESC";
        $qry = $this->db->query($sql);
        $row = $qry->result();
		return $row;
	}
	function getDataCategory()
	{
        $sql = "SELECT * FROM $this->tbl_cat order by ID DESC";
        $qry = $this->db->query($sql);
        $row = $qry->result();
		return $row;
	}
	function GetLastID_kategori()
	{
		$sql = "SELECT (id_category + 1) AS id_category FROM $this->tbl_cat ORDER BY id_category DESC LIMIT 1";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0){
			$row = $qry->result_array();
			return $row[0]['id_category'];
		}else{
			return 1;
		}
	}
	function detDataProduct($id_cat, $limit, $offset)
	{
        $sql = "SELECT * FROM $this->tbl_prod where id_category = $id_cat order by ID DESC limit $limit offset $offset";
        $qry = $this->db->query($sql);
        $row = $qry->result();
		// query untuk menghitung data record
        $qry2 = $this->db->query("SELECT ID FROM $this->tbl_prod where id_category = $id_cat ");
        $num = $qry2->num_rows();
		$array = array(
				'num' => $num,
				'data' => $row
		);
		return $array;
	}
	function getUserMenu($id_user)
	{
        $sql = "SELECT a.*, b.menuName
				FROM usermenu a 
				LEFT JOIN master_menu b ON a.`menuid` = b.`id`
				WHERE id_user = $id_user";
        $qry = $this->db->query($sql);
        $row = $qry->result();
		return $row;
	}
	function checkAccess($menuid, $usg)
	{
		//cek kalo `UserGroupID` = 1 berarti super admin
		if($usg == 1)
		{
			$sql = "SELECT a.ReadFlg, a.UserGroupID, b.*
			FROM usergroupdtlmst a
			LEFT JOIN usermst b ON a.`UserGroupID` = b.`UserGroupID`
			WHERE a.MenuID= $menuid";
			return true;
		}else
		{
			$sql = "SELECT a.ReadFlg, a.UserGroupID, b.*
			FROM usergroupdtlmst a
			LEFT JOIN usermst b ON a.`UserGroupID` = b.`UserGroupID`
			WHERE a.MenuID= $menuid AND a.UserGroupID = $usg";
			$qry = $this->db->query($sql);
			$row = $qry->result();
			$akses = $row[0]->ReadFlg;
			if($akses == 0)
			{
				redirect('admin/notvalid_user/redirect_user');
			}else{
				return true;
			}
		}
	}
	function checkMenuAccess($menuid, $id_user)
	{
		if($id_user == 1){
			$sql = "SELECT a.ReadFlg, a.UserGroupID, b.*
				FROM usergroupdtlmst a
				LEFT JOIN usermst b ON a.`UserGroupID` = b.`UserGroupID`
				WHERE a.MenuID= $menuid";
				return true;
		}else{
			$sql = "SELECT a.ReadFlg, a.UserGroupID, b.*
				FROM usergroupdtlmst a
				LEFT JOIN usermst b ON a.`UserGroupID` = b.`UserGroupID`
				WHERE a.MenuID= $menuid AND b.UserID = $id_user";
				$qry = $this->db->query($sql);
				$row = $qry->result();
				$akses = $row[0]->ReadFlg;
				if($akses == 0){
					return false;
				}else{
					return true;
				}
		}
	}
   /*function getMenuChild($menuID)
   {
	    $sql = "SELECT * FROM menumst WHERE ParentNumber = $menuID ORDER BY sort ASC";
		$qry = $this->db->query($sql);
		return $qry->result();
   }
   function getSubMenuChild($menuID)
   {
	    $sql = "SELECT * FROM menumst WHERE ParentNumber = $menuID ORDER BY sort  ASC";
		$qry = $this->db->query($sql);
		return $qry->result();
   }
   function getSubSubMenuChild($subMenuID_DB)
   {
	    $sql = "SELECT * FROM menumst WHERE ParentNumber = $subMenuID_DB AND menu_level=4  ORDER BY sort  ASC";
		$qry = $this->db->query($sql);
		return $qry->result();
   }
*/
	function generateOTP($panjang)
    { 
	   $karakter= '1234567890'; 
		$string = ''; 
		  for ($i = 0; $i < $panjang; $i++)
		  {
			 $pos = rand(0, strlen($karakter)-1); 
			  $string .= $karakter{$pos}; 
		  } 
		 return $string; 
	 } 
	function generateKdProd($panjang)
    { 
	   $karakter= '1234567890'; 
		$string = ''; 
		  for ($i = 0; $i < $panjang; $i++)
		  {
			 $pos = rand(0, strlen($karakter)-1); 
			  $string .= $karakter{$pos}; 
		  } 
		 return $string; 
	 } 
	function getLastIDCustomer()
	{
        $sql = "SELECT (id_customer + 1) AS id_customer FROM ms_customer ORDER BY id_customer DESC LIMIT 1";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0){
			$row = $qry->result_array();
			return $row[0]['id_customer'];
		}else{
			return 1;
		}
	}
	function GetLastID_promo()
	{
        $sql = "SELECT (id_promo + 1) AS id_promo FROM ".TBL_PROMO." ORDER BY id_promo DESC LIMIT 1";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0){
			$row = $qry->result_array();
			return $row[0]['id_promo'];
		}else{
			return 1;
		}
	}
	function dataEditMaster($table, $WHERE)
	{
        $sql = "SELECT * FROM $table WHERE $WHERE";
        $qry = $this->db->query($sql);
        $row = $qry->result();
		return $row;
	}
	function queryGetName($field, $table, $where)
	{
		$sql  = "SELECT $field FROM $table WHERE $where";
        $qry  = $this->db->query($sql);
        $row  = $qry->result_array();
		$nama = $row[0][''.$field.''];
		return $nama;
	}
	function GetLastID_product()
	{
		$sql = "SELECT (id_product + 1) AS id_product FROM $this->tbl_prod ORDER BY id_product DESC LIMIT 1";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0){
			$row = $qry->result_array();
			return $row[0]['id_product'];
		}else{
			return 1;
		}
	}
	function cekKodeProduct($kode)
	{
		$sql = "SELECT id_product FROM $this->tbl_prod WHERE kd_product= '$kode' ";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num > 0)
		{
			return true;
		}else{
			return false;
		}
	}
	public function customer_num()
	{
		$sql = "
			SELECT * FROM ms_customer ORDER BY ID DESC
		";
	    $qry = $this->db->query($sql);
		return $qry->num_rows();
	}
	public function report_customer($yesterday, $end_month)
	{
		$sql="
			SELECT id_customer, count(id_customer) AS count_nota, sum(total) AS total, sum(grand_total) AS grand_total, sum(poin_customer) AS poin_customer, sum(poin_new) AS poin_new
			FROM `ts_nota` WHERE (`date_in` > '$yesterday' and `date_in` < '$end_month') 
			group by id_customer
		";
		$qry = $this->db->query($sql);
		$row = $qry->result();
		return $row;
	}
	public function report_category($yesterday, $end_month)
	{
		$sql="
			SELECT c.`name`, sum(a.qty) AS qty, sum(a.subtotal) AS subtotal, c.`ID`
			FROM `ts_nota_detail` a 
			INNER JOIN `ms_product` b on b.id = a.id_product 
			INNER JOIN `ms_product_category` c on c.ID = b.id_category 
			INNER JOIN `ts_nota` d on a.id_ts = d.ID 
			WHERE (`date_in` > '$yesterday' and `date_in` < '$end_month') 
			GROUP BY c.ID
		";
		$qry = $this->db->query($sql);
		$row = $qry->result();
		return $row;
	}
	public function report_product($yesterday, $end_month, $id_category)
	{
		$sql="
			SELECT a.price, b.name AS name_product, b.`name`, sum(a.qty) AS qty, sum(a.subtotal) AS subtotal, b.`ID` AS id_category, c.id_customer, c.no_nota, c.date_in, c.ID AS id_nota
			FROM `ts_nota_detail` a 
			INNER JOIN `ms_product` b on b.ID = a.id_product 
			INNER JOIN `ts_nota` c on a.id_ts = c.ID 
			WHERE (`date_in` > '$yesterday' and `date_in` < '$end_month') AND c.ID=$id_category
			GROUP BY b.ID
		";
		$qry = $this->db->query($sql);
		$row = $qry->result();
		return $row;
	}
	function set_null_detail($ID)
	{
        $sql = "Update user_group_detail set read_flg=0 where id_group = '$ID'";
        $qry = $this->db->query($sql);
	}
	function update_user_group_detail($ID, $read_flg)
	{
        $sql = "UPDATE user_group_detail set read_flg=1 WHERE id_group = '$ID' and id_menu in('$read_flg')";
        $qry = $this->db->query($sql);
	}
	function edit_group_detail($ID)
	{
        $sql = "SELECT a.ID AS id_menu, a.name AS name_menu, a.type, a.parent_number, b.*, c.name AS name_group
				FROM ms_menu a 
				LEFT JOIN user_group_detail b ON a.ID = b.id_menu 
				LEFT JOIN user_group c ON b.id_group = c.ID 
				WHERE a.parent_number=0 AND a.type = 'B' AND b.id_group = $ID
				GROUP BY a.ID 
				ORDER BY a.sort ASC 
			   ";
		//echo $sql;
        $qry = $this->db->query($sql);
		$row = $qry->result();
		return $row;
	}
	function edit_child_detail($menuid, $ID)
	{
        $sql = "
			SELECT a.*, b.* 
			FROM ms_menu a 
			LEFT JOIN user_group_detail b ON (a.ID = b.id_menu  AND b.id_group = $ID)
			WHERE a.parent_number=".$menuid." AND a.type = 'B'
			GROUP BY a.ID
			ORDER BY a.sort ASC 
		";
        $qry = $this->db->query($sql);
		$row = $qry->result();
		return $row;
	}
	function set_null_group_detail($UserGroupID)
	{
        $sql = "Update usergroupdtlmst set ReadFlg=0, ModifyFlg=0 where UserGroupID = '$UserGroupID'";
        $qry = $this->db->query($sql);
	}
	
	
	function uploadImage($namepic, $Image, $Image_temp, $path)
	{
			
			$fileImage 	= './uploads/'.$path.'/'.$namepic;

			if (file_exists($fileImage) && $namepic!= ''){unlink($fileImage);}
		
		
			$config['file_name']      = $Image_temp; // without extension
			$config['upload_path']    = './uploads/'.$path.'/';
			$config['allowed_types']  = 'gif|jpg|png|';
			$config['max_size']	   = '1000';
			$config['max_width']      = '2000';
			$config['max_height']     = '2000';
		//print_array($config);
		//exit;
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('ImageUpload')) 
			{
				$data = array('error' => $this->upload->display_errors('',''));	
				$error = $data['error'];
				echo '<script language="javascript">alert("'.$error.'!");window.history.go(-1);</script>';
				exit();
			}else
			{
				$fileImage_temp 	= './uploads/'.$path.'/'.$Image_temp; // with extension
				if (file_exists($fileImage_temp)){unlink($fileImage_temp);}// with extension	
				
				#second upload with no error, not necessary to make a condition error upload image
				$config['file_name']      = $namepic; // initialization new config file_name 
				$this->upload->initialize($config);
				$this->upload->do_upload('ImageUpload');	
				#close upload image =========================================================================	
			}		
		
		return true;
	}
	
}
?>