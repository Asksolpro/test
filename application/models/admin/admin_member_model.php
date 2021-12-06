<?php

class admin_member_model extends CI_Model

{

	function __construct()

	{

        parent::__construct();

    }

	

	

	 function masterQuery($select, $tbl_nama, $filter='', $orderby='')

	 {

		$sql = "SELECT $select FROM $tbl_nama $filter $orderby";

		$qry = $this->db->query($sql);

		$row = $qry->result();

		

		//echo $sql ;



		return $row;

	 }

	 

	 function getDataAllMember()

	 {

		$sql = "SELECT * FROM member order by id_member DESC";

		$qry = $this->db->query($sql);

		$row = $qry->result();

	

		return $row;

	 }

	 

	 function getDataPemesanan($sortBy)

	 {

		$sql = "SELECT a.*, b.Name

				FROM pemesanan a

				LEFT JOIN product b ON a.`id_pemesanan` = b.`id` where a.id_transaksi = 1

				ORDER BY id $sortBy";

		$qry = $this->db->query($sql);

		$row = $qry->result();

	

		return $row;

	 }

	 

	  function getDataPenarikan($sortBy)

	 {

		$sql = "SELECT a.*, b.Name

				FROM member_saldo a

				LEFT JOIN games b ON a.`id_game` = b.`id` where a.id_transaksi = 2

				ORDER BY id $sortBy";

		$qry = $this->db->query($sql);

		$row = $qry->result();

	

		return $row;

	 }

	 

	   function getDataTransfer($sortBy)

	 {

		$sql = "SELECT a.*, b.Name

				FROM member_saldo a

				LEFT JOIN games b ON a.`id_game` = b.`id` where a.id_transaksi = 3

				ORDER BY id $sortBy";

		$qry = $this->db->query($sql);

		$row = $qry->result();

	

		return $row;

	 }

	 

	 

	 

	 

	 function DetailDeposit($id_deposit)

	 {

		$sql = "SELECT a.*, b.Name

				FROM member_saldo a

				LEFT JOIN games b ON a.`id_game` = b.`id` where a.id_transaksi = 1 and a.id = $id_deposit

				ORDER BY id_transaksi DESC";

		$qry = $this->db->query($sql);

		$row = $qry->result();

	

		return $row;

	 }

	 

	  function DetailMember($id_member)

	 {

		$sql = "SELECT * from member where id_member = $id_member";

		$qry = $this->db->query($sql);

		$row = $qry->result();

	

		return $row;

	 }

	 

	 function DetailTransfer($id_deposit)

	 {

		$sql = "SELECT a.*, b.Name

				FROM member_saldo a

				LEFT JOIN games b ON a.`id_game` = b.`id` where a.id_transaksi = 3 and a.id = $id_deposit

				ORDER BY id_transaksi DESC";

		$qry = $this->db->query($sql);

		$row = $qry->result();

	

		return $row;

	 }

	  

	

	  

	 function DetailPenarikan($id_penarikan)

	 {

		$sql = "SELECT a.*, b.Name

				FROM member_saldo a

				LEFT JOIN games b ON a.`id_game` = b.`id` where a.id_transaksi = 2 and a.id = $id_penarikan

				ORDER BY id_transaksi DESC";

		$qry = $this->db->query($sql);

		$row = $qry->result();

	

		return $row;

	 }

	 

	function getMemberDetail($id_member, $idg)

	{

        $sql = "SELECT a.*, b.`username`

				FROM member a

				LEFT JOIN member_game b ON a.`id_member` = b.`id_member` 

				WHERE b.id_member = $id_member AND b.`id_game` = $idg ";

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

	

	

	

	function getLastID($menu)

	{

		$sql = "SELECT (id + 1) AS id FROM $menu ORDER BY id DESC LIMIT 1";

		$qry = $this->db->query($sql);

		$num = $qry->num_rows();

		

		if($num > 0){

			$row = $qry->result_array();

			return $row[0]['id'];

		}else{

			return 1;

		}

	}

	

	function CekImage($modul, $id)

	{

        $sql = "SELECT Image FROM $modul where id = $id";

        $qry = $this->db->query($sql);

        $row = $qry->result();

		

		return $row;

	}

	

	 function cekusernameExist($id_game,$id_member)

	 {

		

		$sql = "SELECT id FROM member_game where id_game = '$id_game' and id_member = '$id_member'";

		$qry = $this->db->query($sql);

		$row = $qry->result();

		//echo $sql;

		$num = count($row);

		if($num > 0)

		{

			return true;

		}else{

			return false;

		}

	 } 

	 

	 

	  function DataEditMemberGame($id_game,$id_member)

	 {

		

		$sql = "SELECT id FROM member_game where id_game = '$id_game' and id_member = '$id_member'";

		$qry = $this->db->query($sql);

		$row = $qry->result();

		//echo $sql;

		return $row;

		

	 } 

	 

	 

	 

	 function getid_member_game($id_game,$id_member)

	 {

		

		$sql = "SELECT id FROM member_game where id_game = '$id_game' and id_member = '$id_member'";

		$qry = $this->db->query($sql);

		$row = $qry->result();

		

		return $row[0]->id;

		

	 } 

	 

	 

	

	

	

	

	

	

	

	 

	 

	 function Shoutbox()

	{

        $sql = "SELECT * FROM shoutbox where PublishFlg = 0 order by id DESC";

        $qry = $this->db->query($sql);

        $row = $qry->result();

		

		return $row;

	}

	

	function getMemberNoDeposit()

	{

        $sql = "SELECT * FROM member WHERE id_member NOT IN(SELECT id_member FROM member_saldo ) order by id_member DESC";

        $qry = $this->db->query($sql);

        $row = $qry->result();

		

		return $row;

	}

	

    function PermintaanRubahData()

	{

        $sql = "SELECT * FROM rubah_data order by id DESC";

        $qry = $this->db->query($sql);

        $row = $qry->result();

		

		return $row;

	}

	

	function PermintaanRubahPassword()

	{

        $sql = "SELECT * FROM rubah_password order by id DESC";

        $qry = $this->db->query($sql);

        $row = $qry->result();

		

		return $row;

	}

	

	function PesanMember()

	{

        $sql = "SELECT * FROM pesan where status = 0 order by id DESC";

        $qry = $this->db->query($sql);

        $row = $qry->result();

		

		return $row;

	}

	

	function discussionMember()

	{

        $sql = "SELECT * FROM discussion where id_parent=0 order by id_discussion DESC";

        $qry = $this->db->query($sql);

        $row = $qry->result();

		

		return $row;

	}

	

	function dataBank()

	{

        $sql = "SELECT * FROM bank order by id DESC";

        $qry = $this->db->query($sql);

        $row = $qry->result();

		

		return $row;

	}

	

	

	public function sendEmail($fromEmail, $fromName, $toEmail, $subject, $msg){

		$this->load->library('email');



		#setting email

		$config['charset'] = 'utf-8';

		$config['wordwrap'] = TRUE;

		$config['mailtype'] = 'html';

	   

		$this->email->initialize($config);

	   

		$this->email->from($fromEmail, $fromName);

		$this->email->to($toEmail);

	   

		$this->email->subject($subject);

		$this->email->message($msg);

	 

		$this->email->send();

	}

	

	public function getMemberMsg()

	{

		$sql = "SELECT * FROM pesan WHERE flag=0 ORDER BY id DESC";

	    $qry = $this->db->query($sql);

		return $qry->result();

	}

	

	public function getMemberDiscussion()

	{

		$sql = "SELECT * FROM discussion ORDER BY id_discussion DESC";

	    $qry = $this->db->query($sql);

		return $qry->result();

	}

	

	function GetCommentAdmin($id_pesan)

	{

		$sql =

		"

			SELECT *

			FROM pesan

			WHERE id =$id_pesan AND id_parent=0 ORDER BY tgl DESC

			LIMIT 0 , 30

		";

		$qry = $this->db->query($sql);

		$row = $qry->result_array();

		return $row;

	}

	

	function GetDiscussionAdmin($id_pesan)

	{

		$sql =

		"

			SELECT a.*, b.nama,b.Image, c.Name, d.Image, d.mainIMG

			FROM discussion a

			LEFT JOIN member b ON a.`id_member`=b.`id_member`

			LEFT JOIN product c ON a.`id_product`=c.`ID`

			LEFT JOIN product_gallery d ON c.`ID`=d.`ID`

			WHERE a.id_discussion = '$id_pesan' AND a.id_member > 0 AND d.mainIMG=1 ORDER BY tanggal DESC

		";

		$qry = $this->db->query($sql);

		$row = $qry->result_array();

		return $row;

	}

	

	function getDataMember($id_member)

	{

		$sql = "SELECT * from member where id_member=$id_member order by id_member DESC";

		$qry = $this->db->query($sql);

        $row = $qry->result_array();

        return $row;

	}

	

	function getComment($ID_dis)

	{

        $sql = "SELECT * FROM pesan WHERE id_parent = '$ID_dis' ORDER BY tgl ASC";

        $qry = $this->db->query($sql);

        $row = $qry->result_array();

		

        return $row;

	}

	

	

	function getDiscussion($ID_dis)

	{

        $sql = "SELECT * FROM discussion WHERE id_parent = '$ID_dis' ORDER BY tanggal ASC";

        $qry = $this->db->query($sql);

        $row = $qry->result_array();

		

        return $row;

	}

	

	public function dataMemberPesan()
	{
		$sql = "
			SELECT a.*,b.nama,b.Image
			FROM pesan a
			LEFT JOIN member b ON a.`id_member`=b.`id_member`
			WHERE id_parent=0 AND status=1 ORDER BY tgl DESC LIMIT 5
		";
	    $qry = $this->db->query($sql);

		return $qry->result();

	}

	

	public function dataDiscussion()

	{

		$sql = "

			SELECT a.*,b.nama,b.Image, c.Name, d.Image, d.mainIMG

			FROM discussion a

			LEFT JOIN member b ON a.`id_member`=b.`id_member`

			LEFT JOIN product c ON a.`id_product`=c.`ID`

			LEFT JOIN product_gallery d ON c.`ID`=d.`ID`

			WHERE a.id_member > 0 AND d.mainIMG=1 ORDER BY id_discussion DESC LIMIT 5

		";

	    $qry = $this->db->query($sql);

		return $qry->result();

	}

	

	public function dataAllDiscussion()

	{

		$sql = "

			SELECT a.*,b.nama,b.Image, c.Name, d.Image, d.mainIMG

			FROM discussion a

			LEFT JOIN member b ON a.`id_member`=b.`id_member`

			LEFT JOIN product c ON a.`id_product`=c.`ID`

			LEFT JOIN product_gallery d ON c.`ID`=d.`ID`

			WHERE a.id_member > 0 AND d.mainIMG=1 ORDER BY id_discussion DESC

		";

	    $qry = $this->db->query($sql);

		return $qry->result();

	}

	

	

	

	public function dataPemesanan()

	{

		$sql = "

			SELECT a.*,b.nama, b.email

			FROM pemesanan a

			LEFT JOIN member b ON a.`id_member`=b.`id_member`

			WHERE a.status=0 ORDER BY id_pemesanan DESC LIMIT 5

		";

	    $qry = $this->db->query($sql);

		return $qry->result();

	}

	

	public function dataAllPemesanan()

	{

		$sql = "

			SELECT a.*,b.nama, b.email, c.id AS id_konfirmasi, c.id_bank, c.bank_member, c.Rekening, c.jml_transfer, d.`alamat_pemesanan`, e.`kokab_nama`, f.nama_bank

			FROM pemesanan a

			LEFT JOIN member b ON a.`id_member`=b.`id_member`

			LEFT JOIN konfirmasi c ON a.`id_pemesanan`=c.`id_pemesanan`

			LEFT JOIN member_alamat d ON a.`id_alamat`=d.`id_alamat`

			LEFT JOIN master_kokab e ON d.`id_kota`=e.`kota_id`

			LEFT JOIN bank f ON c.`id_bank`= f.`id`

			ORDER BY id_pemesanan DESC

		";

	    $qry = $this->db->query($sql);

		return $qry->result();

	}

	

	public function dataTransaction()

	{

		$sql = "

			SELECT a.*,b.nama, b.email

			FROM pemesanan a

			LEFT JOIN member b ON a.`id_member`=b.`id_member`

			ORDER BY id_pemesanan DESC LIMIT 5

		";

	    $qry = $this->db->query($sql);

		return $qry->result();

	}

	

	public function dataPayment()

	{

		$sql = "

			SELECT a.*,b.nama, c.id AS id_konfirmasi, c.id_bank, c.bank_member, c.Rekening, c.jml_transfer, d.nama_bank

			FROM pemesanan a

			LEFT JOIN member b ON a.`id_member`=b.`id_member`

			right JOIN konfirmasi c ON a.`id_pemesanan`=c.`id_pemesanan`

			LEFT JOIN bank d ON c.`id_bank`= d.`id`

			WHERE a.status=1 AND c.status_verifikasi=0 ORDER BY id_pemesanan DESC LIMIT 5

		";

	    $qry = $this->db->query($sql);

		return $qry->result();

	}

	

	

	public function dataDelivery()

	{

		$sql = "

			SELECT a.*,b.nama, c.`alamat_pemesanan`, d.`kokab_nama`

			FROM pemesanan a

			LEFT JOIN member b ON a.`id_member`=b.`id_member`

			LEFT JOIN member_alamat c ON a.`id_alamat`=c.`id_alamat`

			LEFT JOIN master_kokab d ON c.`id_kota`=d.`kota_id`

			WHERE a.status=2 ORDER BY id_pemesanan DESC LIMIT 5

		";

	    $qry = $this->db->query($sql);

		return $qry->result();

	}

	

	

	

	

	

	public function dataMemberAlamat()

	{

		$sql = "

			SELECT a.*, b.nama, b.email, c.kokab_nama, c.kota_id, d.*

			FROM pemesanan a

			LEFT JOIN member b ON a.`id_member`=b.`id_member`

			LEFT JOIN master_kokab c ON a.`id_alamat`=c.kota_id

			LEFT JOIN member_alamat d ON a.`id_alamat`=d.`id_alamat`

			WHERE a.status=2 ORDER BY id_pemesanan DESC LIMIT 5

		";

	    $qry = $this->db->query($sql);

		return $qry->result();

	}

	

	

	public function getAll($tbl,$select='', $param='')

	{

		$select = $select == '' ? '*' : $select;

		

		//$this->db->select($select);

		//$qry = $this->db->get($tbl);

		$qry = $this->db->query("select ".$select." from ".$tbl." ".$param); 

		return $qry->result();

	}

	

	function GetLastPesanID()

	{

		$sql = "SELECT (id + 1) AS id FROM pesan ORDER BY id DESC LIMIT 1";

		$qry = $this->db->query($sql);

		$num = $qry->num_rows();

		

		if($num > 0){

			$row = $qry->result_array();

			return $row[0]['id'];

		}else{

			return 1;

		}

	}

	

	function GetLastDiscussionID()

	{

		$sql = "SELECT (id_discussion + 1) AS id_discussion FROM discussion ORDER BY id_discussion DESC LIMIT 1";

		$qry = $this->db->query($sql);

		$num = $qry->num_rows();

		

		if($num > 0){

			$row = $qry->result_array();

			return $row[0]['id_discussion'];

		}else{

			return 1;

		}

	}

	

	function getLastComment($ID_dis)

	{

        $sql = "SELECT * FROM pesan WHERE id_parent = '$ID_dis' ORDER BY tgl DESC limit 1";

        $qry = $this->db->query($sql);

        $row = $qry->result_array();

		

        return $row;

	}

	

	function getLastDiscussion($ID_dis)

	{

        $sql = "SELECT * FROM discussion WHERE id_parent = '$ID_dis' ORDER BY tanggal DESC limit 1";

        $qry = $this->db->query($sql);

        $row = $qry->result_array();

		

        return $row;

	}

	

	

	public function dataMemberReview()

	{

		$sql = "

			SELECT a.*,b.nama,b.Image,c.Name, d.`Image` AS image_gallery

			FROM review a

			LEFT JOIN member b ON a.`id_member`=b.`id_member`

			LEFT JOIN product c ON a.`id_product`=c.`ID`

			LEFT JOIN product_gallery d ON c.`ID`=d.`ID`

			WHERE d.`mainIMG`=1 ORDER BY tanggal DESC LIMIT 5

		";

	    $qry = $this->db->query($sql);

		return $qry->result();

	}
	
	public function dataAllMemberDiscussion()

	{

		$sql = "

			SELECT a.*,b.nama,b.Image,c.Name, d.`Image` AS image_gallery

			FROM discussion a

			LEFT JOIN member b ON a.`id_member`=b.`id_member`

			LEFT JOIN product c ON a.`id_product`=c.`ID`

			LEFT JOIN product_gallery d ON c.`ID`=d.`ID`

			WHERE a.id_member > 0 AND d.`mainIMG`=1 ORDER BY tanggal DESC LIMIT 5

		";

	    $qry = $this->db->query($sql);

		return $qry->result();

	}
	
	
	 public function cekMemberActivity($id_member){
		$sql ="Select id_pemesanan from pemesanan where id_member='$id_member'";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if ($num>0 ){
			return true;
		}else{
			return false;
		}
	}
	
	public function delete($table, $field, $id){
		$sql = "Delete From $table  where $field='$id'";
        $qry = $this->db->query($sql);
	}

	function getJumlahFollowers($id_member)

	{

		$sql = "SELECT id_member FROM member WHERE id_member_referensi = '$id_member'";

        $qry = $this->db->query($sql);

        $num = $qry->num_rows();

		

        return $num;

	}
	
	function getRandomPass($panjang)
	{ 
		$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; 
		$string = ''; 
		for ($i = 0; $i < $panjang; $i++)
		{
			$pos = rand(0, strlen($karakter)-1); 
			$string .= $karakter{$pos}; 
		} 
		return $string; 
	} 

}
?>