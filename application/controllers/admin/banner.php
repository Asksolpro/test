<?php
include(SITE_URI.'application/controllers/authcontroller'.EXT);
class Banner extends authcontroller
{
	function __construct()
	{
        parent::__construct();
		
		$this->load->model('admin/master_model');
		$this->load->model('admin/admin_banner_model');
		$this->load->library('upload');
    }
	
	function index($MENU_ID)
	{
        $UserID = $this->session->userdata('UserID');      
      
		$table = 'banner';
		$option = 'order by bannerID	 DESC';
		$data['DataView']		  = $this->master_model->select_in($table, '*', $option);
		//print_array($data['DataView']);
		$this->load->view('admin/admin_banner', $data);
	}
	
	
	function UpdateSort($MENU_ID, $divisiID)
	{
		$link       			= $this->input->post('link_view');
		$Sort       			= $this->input->post('sortupdate');
		$bannerID       		= $this->input->post('bannerID');
		// Update Sort ////////////////////////////////////////////////////////
		for($a=0 ; $a<count($bannerID) ; $a++)
		{
			$this->admin_banner_model->UpdateSort($bannerID[$a], $Sort[$a], $link[$a]);
		}
		redirect('admin/admin_banner/edit/'.$MENU_ID.'/'.$divisiID);
	}
	function insert($MENU_ID)
	{
		$data['CurrentImageList'] = $this->admin_banner_model->CurrentImageList();
		$data['config_module']    = $this->admin_banner_model->config_module($MENU_ID);
		$this->load->view('admin/admin_banner_edit', $data);
	}
	function insert_process($MENU_ID)
	{
		$bannerID     = $this->admin_banner_model->GetLastbannerID();
		 //print_array($this->input->post());
		$MENU_ID	= $this->uri->segment(4);
		//$gid		= $this->uri->segment(5);
		#upload image =========================================================			
		$Image 		= $bannerID.'.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
		$Image_temp = $bannerID.'_temp.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
		$config['file_name']      = $bannerID.'_temp';
		$config['upload_path']    = './uploads/banner/';
		$config['allowed_types']  = 'gif|jpg|png|';
		$config['max_size']	      = '2000';
		$config['max_width']      = '1600';
		$config['max_height']     = '600';
		$this->upload->initialize($config);
		
		//print_array($config);
		//exit;
		if(!$this->upload->do_upload('ImageUpload')) 
		{
			$data = array('error' => $this->upload->display_errors('',''));	
			$error = $data['error'];
			echo '<script language="javascript">alert("'.$error.'!");window.history.go(-1);</script>';
			exit();
		}else{
			#delete temp image
			$fileImage_temp 	= './uploads/banner/'.$Image_temp;
			if (file_exists($fileImage_temp)){unlink($fileImage_temp);}
			#delete image exis
			$fileImage 	= './uploads/banner/'.$Image;
			if (file_exists($fileImage) && $Image!= ''){unlink($fileImage);}
			#second upload with no error, not necessary to make a condition error upload image
			$config['file_name']      = $bannerID; // initialization new config file_name 
			$this->upload->initialize($config);
			$this->upload->do_upload('ImageUpload');			
			#close upload image =========================================================================			
		}			
		$data = array(
					'bannerID' 	       		=> $bannerID,
					'link'       	  		    => $this->input->post('link'),
					'Image'        		   => $Image,
					'Sort'         			=> $this->admin_banner_model->LastSort(),
					'Publish'				 =>1
					//'Sdate' 					=> $StartDate
				);
		$this->db->insert('banner', $data);
		redirect('admin/banner/index/'.$MENU_ID);
	}
	function changepublish($MENU_ID, $idbanner, $flag)
	{
		if($flag==1)
		{
			$sql = "UPdate banner set Publish = 0 where bannerID = $idbanner";
		}else{
			$sql = "UPdate banner set Publish = 1 where bannerID = $idbanner";
		}
		$qry = $this->db->query($sql);
		redirect('admin/banner/index/'.$MENU_ID);
	}
	
	
	function delete($MENU_ID,$bannerID)
	{
		$CekImg = $this->admin_banner_model->CekImage($bannerID); // cek image ada yang pakai ato tidak		
		$Count =  $CekImg['Count'];
		$Image = $CekImg['Image'];
	
		if ($Count == 1){
		unlink('./uploads/banner/'.$Image);
		}
		
		$this->db->where('bannerID', $bannerID);
		$this->db->delete('banner');
		
		redirect('admin/banner/index/'.$MENU_ID);
		
	}
	
}
?>