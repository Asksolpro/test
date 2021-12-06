<?php
include(SITE_URI.'application/controllers/authcontroller'.EXT);
class Admin_product extends authcontroller{
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
		$num   = $this->master_model->global_num('ms_product');	
		$num=count($num);	
		$DataView = $this->master_model->select_in('ms_product a left join ms_product_category b on a.id_category = b.ID', 'a.*, b.name as kategori ',"ORDER BY a.ID ASC LIMIT $limit OFFSET $offset");
		$config['base_url']	 = base_url().'admin/admin_product/index/'.$MENU_ID;
		$config['total_rows']   = $num;
		$config['per_page'] 	 = $limit;
		$config['uri_segment']  = $uri_segment;
		$config['next_link'] 	= 'Next';
		$config['prev_link'] 	= 'Prev';
		$config['first_link']   = 'First';
		$config['last_link'] 	= 'Last';
		$this->pagination->initialize($config);
		$data['page'] 	   	   = $this->pagination->create_links();
		$data['DataView'] 	   = $DataView;
		$this->load->view('admin/product/list_product', $data);
	}
	#view
	
	public function product_information($menuid, $id_product)
	{
 		$data['dataEdit'] = $this->master_model->select_in('ms_product', '*', "WHERE ID=$id_product");
		$data['gallery'] = $this->master_model->select_in('product_image', '*', "WHERE id_product=$id_product");
		
		$data['product_info1'] = $this->master_model->select_in('product_info', '*', "WHERE id_product=$id_product AND info_for = 'technical_data'");
		$data['product_info2'] = $this->master_model->select_in('product_info', '*', "WHERE id_product=$id_product AND info_for = 'dimension'");
		$data['product_info3'] = $this->master_model->select_in('product_info', '*', "WHERE id_product=$id_product AND info_for = 'hpc'");
		$data['product_info4'] = $this->master_model->select_in('product_info', '*', "WHERE id_product=$id_product AND info_for = 'material'");
		$data['product_info5'] = $this->master_model->select_in('product_info', '*', "WHERE id_product=$id_product AND info_for = 'package'");
		
		
		$this->load->view('admin/product/product_information', $data);
	}
	
	
	function edit(){
		$MENU_ID=$this->uri->segment(4);
		
		if ($this->session->userdata('UserID')){
			$id=$this->uri->segment(5);
			$data['locationedit']      =$this->model_admin_location->getdataedit($id);
			$data['config_module']    = $this->authmodel->config_module($MENU_ID);
			//print_array($data);
			$this->load->view('admin/view_location_edit',$data);
		}else{
			redirect('admin_login');
		}
	}
	function insert(){
		if ($this->session->userdata('UserID')){
			$MENU_ID=$this->uri->segment(4);
			$data['config_module']    = $this->authmodel->config_module($MENU_ID);
			
			$this->load->view('admin/view_admin_location_insert',$data);
		}else{
			redirect('admin_login');
		}
	}
	#proses 
	function insert_process(){
		$MENU_ID=$this->uri->segment(4);
		$locationID = $this->model_admin_location->GetLastID();
		$PublishFlg = 0;
		$ImageName = "";
		if($this->input->post('PublishFlg') == 'on')
		{
			$PublishFlg = 1;
		}
		$do=true;
		if($this->input->post('ImageType') == 'NoImage')
		{
			$ImageName = "";
			
		}else if($this->input->post('ImageType') == 'UploadNew'){

			/*$ImageID=$this->model_admin_category->LastSort();
			$ImageName = $ImageID.'.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
			$do=$this->uploadImage($ImageID);*/
			
				#upload image =========================================================			
				$ImageName = $locationID.'.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
				$ImageName_temp = $locationID.'_temp.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
				
				$config['file_name']      = $locationID.'_temp';
				$config['upload_path']    = './uploads/location/';
				$config['allowed_types']  = 'gif|jpg|png|';
				$config['max_size']	      = '500';
				$config['max_width']      = '200';
				$config['max_height']     = '200';
				$this->upload->initialize($config);
				
				if(!$this->upload->do_upload('ImageUpload')) 
				{
					$data = array('error' => $this->upload->display_errors('',''));	
					$error = $data['error'];
	
					echo '<script language="javascript">alert("'.$error.'!");window.history.go(-1);</script>';
					exit();
				}else{
					
					#delete temp image
					$fileImageName_temp 	= './uploads/location/'.$ImageName_temp;
					if (file_exists($fileImageName_temp)){unlink($fileImageName_temp);}
					
					#delete image exis
					$fileImageName 	= './uploads/location/'.$ImageName;
					if (file_exists($fileImageName) && $ImageName!= ''){unlink($fileImageName);}
					
					#second upload with no error, not necessary to make a condition error upload image
					$config['file_name']      = $locationID; // initialization new config file_name				
					$this->upload->initialize($config);
					
					$this->upload->do_upload('ImageUpload');			
				}	// kondisi upload		
				#close upload image =========================================================================			
			
		
		}
		if($do==false){
			redirect('admin/admin_location/insert/'.$MENU_ID.'/Error');
		}else{
			
		$data = array(
					'locationID'			=> $locationID,
					'Name'       	  		=> $this->input->post('ImgName'),
					'E_Name'      	 		=> $this->input->post('E_ImgName'),
					'ShortDesc'    			=> $this->input->post('ShortDesc'),
					'E_ShortDesc'  			=> $this->input->post('E_ShortDesc'),
					'LongDesc'     			=> $this->input->post('LongDesc'),
					'E_LongDesc'   			=> $this->input->post('E_LongDesc'),
					'Image'        			=> $ImageName,
					'Sort'         			=> $locationID,
					'PublishFlg'   			=> $PublishFlg,
				);
		
		$this->db->insert('location', $data);
		
		redirect('admin/admin_location/index/'.$MENU_ID);
		}
	}
	function edit_process()
	{
		$MENU_ID=$this->uri->segment(4);
		$gid=$this->uri->segment(5);
		//echo $MENU_ID;
		//exit;
		$PublishFlg = 0;
		$ModuleName=$this->input->post('ModuleName');
		$Imagecurrent=$this->input->post('Imagecurrent');
		
		$CekImg = $this->model_admin_location->CekImg($Imagecurrent); // cek image ada yang pakai ato tidak		
		$ImgID=$this->input->post('id');
		
		if($this->input->post('PublishFlg') == 'on')
		{
			$PublishFlg = 1;
		}
		$ImageName=$Imagecurrent;
		$do=true;
		if($this->input->post('ImageType') != '')
		{
			if($this->input->post('ImageType') == 'NoImage')
			{
				if ($CekImg == false )
				{
					unlink('./uploads/category/'.$Image);
				}
				
				$ImageName = "";
			}
			else if($this->input->post('ImageType') == 'UploadNew')
			{
				
				/*$Image=$this->input->post('Imagecurrent');
				$ImageID=$this->input->post('id').'_'.str_replace(".jpg","",$Image);
				$ImageName = $ImageID.'.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
				$do=$this->uploadImage($ImageID);
				if($do==true){
					unlink('./uploads/category/'.$Image);
				}*/
				#upload image =========================================================			
				$ImageName = $gid.'.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
				$ImageName_temp = $gid.'_temp.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
				
				$config['file_name']      = $gid.'_temp';
				$config['upload_path']    = './uploads/location/';
				$config['allowed_types']  = 'gif|jpg|png|';
				$config['max_size']	      = '500';
				$config['max_width']      = '500';
				$config['max_height']     = '500';
				$this->upload->initialize($config);
				
				if(!$this->upload->do_upload('ImageUpload')) 
				{
					$data = array('error' => $this->upload->display_errors('',''));	
					$error = $data['error'];
	
					echo '<script language="javascript">alert("'.$error.'!");window.history.go(-1);</script>';
					exit();
				}else{
					
					#delete temp image
					$fileImageName_temp 	= './uploads/location/'.$ImageName_temp;
					if (file_exists($fileImageName_temp)){unlink($fileImageName_temp);}
					
					#delete image exis
					$fileImageName 	= './uploads/location/'.$ImageName;
					if (file_exists($fileImageName) && $ImageName!= ''){unlink($fileImageName);}
					
					#second upload with no error, not necessary to make a condition error upload image
					$config['file_name']      = $gid; // initialization new config file_name				
					$this->upload->initialize($config);
					
					$this->upload->do_upload('ImageUpload');			
				}	// kondisi upload		
				#close upload image =========================================================================			
				
				
			}
		}
		
		if($do==false){
			redirect('admin/admin_location/edit/'.$MENU_ID.'/'.$ImgID.'/Error');
		}else{
			
			$data = array(
						'Name' 	        		=> $this->input->post('Name'),
						'E_Name'   	    		=> $this->input->post('E_Name'),
						'ShortDesc'    			=> $this->input->post('ShortDesc'),
						'E_ShortDesc'  			=> $this->input->post('E_ShortDesc'),
						'LongDesc'     			=> $this->input->post('LongDesc'),
						'E_LongDesc'   			=> $this->input->post('E_LongDesc'),
						'Image'        			=> $ImageName,
						'PublishFlg'   			=> $PublishFlg
					);
			
			$this->db->where('locationID', $ImgID);
			$this->db->update('location', $data);
		
		redirect('admin/admin_location/index/'.$MENU_ID);
		}
	}
	function update_all(){
		$MENU_ID		=$this->uri->segment(4);
		$ImgID    		= $this->input->post('ImgID');
		$Sort       	= $this->input->post('Sort');
		$PublishFlg 	= $this->input->post('PublishFlg');
		
		// Update PublishFlg /////////////////////////////////////////////////
		
		$this->model_admin_location->SetNullPublishFlg(); //set null
		
		$strBaca = "";
		for ($i=0; $i<count($PublishFlg) $;i++)
		{
			$strBaca = $strBaca . "'" . $PublishFlg[$i] . "',";
		}
		
		$PublishFlg = substr($strBaca, 1, strlen($strBaca)-3);
		
		$this->model_admin_location->UpdatePublishFlg($PublishFlg);
		
		// print_array($PublishFlg); // cek keluaran array
		
	
		// Update Sort ////////////////////////////////////////////////////////
		
		for($a=0 ; $a< count($ImgID) ; $a++)
		{
			$this->model_admin_location->UpdateSort($ImgID[$a], $Sort[$a]);
		}
		
		//print_array ($Sort);
		
		///////////////////////////////////////////////////////////////////////
		
		redirect('admin/admin_location/index/'.$MENU_ID);
	}
	
	function uploadImage($ImageName)
	{
			$config['file_name']      = $ImageName;
			$config['upload_path']    = './uploads/location';
			$config['allowed_types']  = 'gif|jpg|png';
			$config['max_size']	      = '500';
			$config['max_width']      = '300';
			$config['max_height']     = '300';
			
			$this->load->library('upload', $config);
			$upload = $this->upload->do_upload('ImageUpload');
			if(!$upload) {
				$error = array('error' => $this->upload->display_errors());	
				return false;
			}else{
				return true;
			}
	}
	function delete(){
		$MENU_ID=$this->uri->segment(4);
		$id=$this->uri->segment(5);
		if(!empty($id)){
			$ceksubproduk=$this->model_admin_location->ceksub($id);	
			if($ceksubproduk==false){
					$CekImg = $this->model_admin_location->CekImage($id); // cek image ada yang pakai ato tidak		
					$Count = $CekImg['Count'];
					$Image = $CekImg['Image'];
					
					if ($Count == 1){
						if (file_exists('./uploads/location/'.$Image)){unlink('./uploads/location/'.$Image);}	
						# unlink untuk menghapus ato me remove file
					}
				
					$data=$this->model_admin_location->delete($id);
					redirect('admin/admin_location/index/'.$MENU_ID);
			}else{
					redirect('admin/admin_location/index/'.$MENU_ID.'/Error');
			}
				
		}else{
			redirect('admin/admin_location/index/'.$MENU_ID);
		}
		
	}
}

?>