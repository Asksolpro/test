<?php
include(SITE_URI.'application/controllers/authcontroller'.EXT);
class Admin_news extends authcontroller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/master_model');
		$this->load->model('authmodel');
		$this->load->library('upload');
	}
	
	function index($MENU_ID){
		define("MENU_ID",$MENU_ID);
        //$UserID = $this->session->userdata('UserID');
        //$this->redirectNoAuthRead($UserID, $MENU_ID); // take from function in application/controllers/authcontroller
		$this->load->library('pagination');
		$uri_segment  = 5;
		$limit 		= 10;
		$offset 	   = $this->uri->segment($uri_segment);
		if ($offset == ''){$offset = 0;}else{$offset = $offset;}
		$num   = $this->master_model->global_num("content_master WHERE content_for = 'news'");	
		$num=count($num);	
		$DataView = $this->master_model->select_in('content_master', '* '," WHERE content_for = 'news' ORDER BY ID DESC LIMIT $limit OFFSET $offset");
		$config['base_url']	    = base_url().'admin/admin_product/index/'.$MENU_ID;
		$config['total_rows']   = $num;
		$config['per_page'] 	= $limit;
		$config['uri_segment']  = $uri_segment;
		$config['next_link'] 	= 'Next';
		$config['prev_link'] 	= 'Prev';
		$config['first_link']   = 'First';
		$config['last_link'] 	= 'Last';
		$this->pagination->initialize($config);
		$data['page'] 	   	   = $this->pagination->create_links();
		$data['DataView'] 	   = $DataView;
		$this->load->view('admin/news/list_news', $data);
	}
	
	

		
	function insert_news($MENU_ID)
	{
		$this->load->view('admin/news/insert_news');
	}
	function insert_process($MENU_ID)
	{
		$tgl  	   = $this->input->post('tgl');
		$title 	   = $this->input->post('title');
		$shortdesc = $this->input->post('shortdesc');
		$date =  date('Y-m-d', strtotime($tgl));
		if($_FILES['ImageUpload']['name']=='')
		{
		  $Image = 'noimage.jpg';
		}else{
			$now = date('mdHis');
			$url_title = url_title($title);
			$namePic      = 'leo_'.$url_title.'-'.$now; //nama image yang akan disimpan difolder tanpa ekstensi	
			$Image 		  = $namePic.'.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
			$Image_temp   = $namePic.'_temp.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
			$path = 'news';											
			$uploadsImage = $this->master_model->uploadImage($namePic, $Image, $Image_temp, $path);
		}
			$data = array
			(
				'content_for' => 'news',
				'title' => $title,
				'shortdesc' => $shortdesc,
				'desc' => $this->input->post('desk'),
				'image' => $Image,
				'date' => $date ,
				'publish' => 1,
				'sort' => 1,
			);
			$this->db->insert('content_master', $data);
		redirect('admin/admin_news/index/'.$MENU_ID);
	}
	function update_all($MENU_ID)
	{
		$newsID         = $this->input->post('ID');
		$Sort       	= $this->input->post('sort');
		$PublishFlg 	= $this->input->post('publish');
		/*---------------- Update setnull PublishFlg --------------*/		
		$sql = "update content_master set publish = 0 where content_for = 'news'";
		$this->db->query($sql);
		$strBaca = "";
		for ($i=0; $i<count($PublishFlg); $i++)
		{
			$strBaca = $strBaca . "'" . $PublishFlg[$i] . "',";
		}
		$PublishFlg = substr($strBaca, 1, strlen($strBaca)-3);
		/*---------------- Update PublishFlg --------------*/
		$sql = "update content_master set publish = 1 where ID IN('$PublishFlg')";	
		$this->db->query($sql);
		// Update Sort ////////////////////////////////////////////////////////
		for($a=0 ; $a<count($newsID) ; $a++)
		{
			$sql2 = "update content_master set sort = $Sort[$a] where ID = $newsID[$a]";	
			$this->db->query($sql2);
		}
		redirect('admin/admin_news/index/'.$MENU_ID);
	}
	function edit($MENU_ID,$newsID, $err='')
	{
		$data['DataEdit']   = $this->master_model->select_in('content_master', '* '," WHERE ID = '$newsID'");	
		$data['err']    	= $err;
		$this->load->view('admin/news/edit_news', $data);
	}
	function delete($MENU_ID,$newsID)
	{
		$this->db->where('ID', $newsID);
		$this->db->delete('content_master');
		redirect('admin/admin_news/index/'.$MENU_ID);
	}
	function edit_process($MENU_ID, $id_news)
	{
		$tgl  	   = $this->input->post('tgl');
		$title 	   = $this->input->post('title');
		$shortdesc = $this->input->post('shortdesc');
		$DataEdit   = $this->master_model->select_in('content_master', 'image'," WHERE ID = '$id_news'");	
		$imageDB 	= $DataEdit[0]->image;
		$date =  date('Y-m-d', strtotime($tgl));
		if($_FILES['ImageUpload']['name']=='')
		{
		    $Image	 = $imageDB;
		}else{
			$arr = explode(".", $imageDB);			
		    $imageNameFile = $arr[0];
			$namePic      = $imageNameFile;
			$Image 		  = $namePic.'.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
			$Image_temp   = $namePic.'_temp.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);															 														 			
			$path 	      = 'news';											
			$uploadsImage = $this->master_model->uploadImage($imageDB, $Image, $Image_temp, $path);
		}
			$data = array
			(
				'title' => $title,
				'shortdesc' => $shortdesc,
				'desc' => $this->input->post('desk'),
				'image' => $Image,
				'date' => $date ,
			);
			$this->db->where('ID', $id_news);
			$this->db->update('content_master', $data);
		redirect('admin/admin_news/index/'.$MENU_ID);
	}
	
	function kirim($MENU_ID, $id_news)
	{
		$data['list_email']   = $this->master_model->select_in('email_subscribe', '*',"");	
		$this->load->view('admin/news/list_subscribe', $data);
	}	
	
	
}
?>