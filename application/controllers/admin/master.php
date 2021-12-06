<?php 
include('./application/controllers/authcontroller'.EXT);
class master extends Authcontroller 
{
	public function __construct()
	{
		parent :: __construct();	
		$this->load->model('admin/master_model');
		$this->load->helper('text');
		$this->tbl_cat = 'ms_product_category';
		$this->tbl_prod = 'ms_product';
    }
	public function insert_category($menuid)
	{
		$kode = $this->input->post('kd_barang');
		$ID = $this->master_model->mst_last_id('ms_product_category');
		$data = array(
			'ID' => $ID,
			'name' => $this->input->post('name'),
			'desc' => $this->input->post('desc'),
			'sort' => $ID,
		);
		$this->db->insert('ms_product_category', $data);
		redirect('admin/master/product_category/'.$menuid);
	}
	function change_publish_category($menuid, $ID, $flag)
	{
		
		if($flag==1)
		{
			$new_flag = 0;
			
		}else{
			$new_flag = 1;
			
		}
			
		
		$this->db->where('ID', $ID);
		$this->db->set('fg_active', $new_flag);
		$this->db->update('ms_product_category');
		
		redirect('admin/master/product_category/'.$menuid);
		
	}
	
	function change_publish_product($menuid, $id_category, $ID, $flag)
	{
		
		if($flag==1)
		{
			$new_flag = 0;
			
		}else{
			$new_flag = 1;
			
		}
			
		
		$this->db->where('ID', $ID);
		$this->db->set('fg_active', $new_flag);
		$this->db->update('ms_product');
		
		redirect('admin/master/product/'.$menuid.'/'.$id_category);
		
	}
	
	public function delete_category($menuid, $ID)
	{
		$this->db->where('ID', $ID);
		$this->db->delete('ms_product_category');
		$this->db->where('id_category', $ID);
		$this->db->delete('ms_product');
		redirect('admin/master/product_category/'.$menuid);
	}
	public function product_category($menuid)
	{
		$this->load->library('pagination');
		$uri_segment  = 5;
		$limit 		= 10;
		$offset 	   = $this->uri->segment($uri_segment);
		if ($offset == ''){$offset = 0;}else{$offset = $offset;}
		$num   = $this->master_model->mst_data('ms_product_category');	
		$num=count($num);	
		$DataView = $this->master_model->select_in('ms_product_category', '*',"ORDER BY ID ASC LIMIT $limit OFFSET $offset");
		$config['base_url']	 = base_url().'admin/master/product_category/'.$menuid;
		$config['total_rows']   = $num;
		$config['per_page'] 	 = $limit;
		$config['uri_segment']  = $uri_segment;
		$config['next_link'] 	= 'Next';
		$config['prev_link'] 	= 'Prev';
		$config['first_link']   = 'First';
		$config['last_link'] 	= 'Last';
		$this->pagination->initialize($config);
		$data['page'] 	   	   = $this->pagination->create_links();
		$data['category'] 	   = $DataView;
		$this->load->view('admin/product/main', $data);
	}
	public function get_product($menuid)
	{
		$code=$this->input->get('code');
		if($code=='')
		{
			$this->load->library('pagination');
			$uri_segment  = 5;
			$limit 		= 10;
			$offset 	   = $this->uri->segment($uri_segment);
			if ($offset == ''){$offset = 0;}else{$offset = $offset;}
			$num   = $this->master_model->mst_data('ms_product_category');	
			$num=count($num);	
			$DataView = $this->master_model->select_in('ms_product_category', '*',"ORDER BY ID ASC LIMIT $limit OFFSET $offset");
			$config['base_url']	 = base_url().'admin/master/product_category/'.$menuid;
			$config['total_rows']   = $num;
			$config['per_page'] 	 = $limit;
			$config['uri_segment']  = $uri_segment;
			$config['next_link'] 	= 'Next';
			$config['prev_link'] 	= 'Prev';
			$config['first_link']   = 'First';
			$config['last_link'] 	= 'Last';
			$this->pagination->initialize($config);
			$data['page'] 	   	   = $this->pagination->create_links();
			$category= $DataView;
			echo'
				<table id="example1" class="table table-bordered table-striped" style="margin-top:40px;">
                    <thead>
                        <tr style="border-bottom:1px solid #dadada">
                            <th style="text-align:center">No. </th>
                            <th> Nama </th>
                            <th> Deskripsi Barang</th>
                            <th> No Of Product</th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </tr>
                    </thead>
                    <tbody class="get_category">
                    ';
					 for($a=0; $a < count($category); $a++)
					 {
						 $b=$a+1;
						 $c=$offset+$b;
						 $id_category = $category[$a]->ID;
						 $nm_category = $category[$a]->name;
						 $deskripsi   = $category[$a]->desc;
						 $where = "WHERE ID = $id_category";
						 $data_product = $this->master_model->select_in('ms_product','*',"WHERE id_category=$id_category");
						 $num=count($data_product);
						 echo'
						  <tr>
                            <td style="text-align:center"> '.$c.'</td>
                            <td><a href="'.base_url().'admin/master/product/'.$menuid.'/'.$id_category.'">'.$nm_category.' </a></td>
							<td>'.$deskripsi.' </td>
                            <td>
                            	<a href="'.base_url().'admin/master/product/'.$menuid.'/'.$id_category.'">
                            		'.$num.' Product
                                </a>
                            </td>
                            <td style="text-align:center">
                                <a alt="'.$id_category.'" class="edit text-green" style="cursor:pointer" data-toggle="modal" data-target="#modal_edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td style="text-align:center">
                                <a href="'.base_url().'admin/master/delete_category/'.$menuid.'/'.$id_category.'" onclick="return confirm(\'Apakah anda ingin menghapus data ini?\')"  class="text-red">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>';
					 }
					echo'
                    </tbody>
                </table>
				'."<ul style='margin-top:20px;' class='pagination'".$this->pagination->create_links()."</ul>".'
			';
		}else
		{
			$check_product=$this->master_model->mst_check_3('ms_product', "name LIKE '%$code%' OR code LIKE '%$code%'");
			if($check_product==false)
			{
				echo'
					<table id="example2" class="table table-bordered table-striped" style="margin-top:40px;">
						<thead>
							<tr>
								<th>No. </th>
								<th> Kode Barang </th>
								<th> Nama Barang </th>
								<th> Kategori</th>
								<th> Satuan</th>
								<th> Harga</th>
								<th> Edit</th>
								<th> Delete </th>
							</tr>
						</thead>
						<tbody>
						<tr>
							<td colspan="8">Tidak ada data tersedia di table</td>
						</tr>
					</table>
				';
			}else
			{
			$this->load->library('pagination');
			$uri_segment  = 5;
			$limit 		= 10;
			$offset 	   = $this->uri->segment($uri_segment);	
			if ($offset == ''){$offset = 0;}else{$offset = $offset;}
			$num   = $this->master_model->mst_data('ms_product');	
			$num=count($num);	
			$DataView=$this->master_model->select_in('ms_product','*',"WHERE name LIKE '%$code%' OR code LIKE '%$code%' ORDER BY ID ASC LIMIT $limit OFFSET $offset");
			$config['base_url']	 = base_url().'admin/master/product/'.$menuid;
			$config['total_rows']   = $num;
			$config['per_page'] 	 = $limit;
			$config['uri_segment']  = $uri_segment;
			$config['next_link'] 	= 'Next';
			$config['prev_link'] 	= 'Prev';
			$config['first_link']   = 'First';
			$config['last_link'] 	= 'Last';
			$this->pagination->initialize($config);
			$data['page'] 	   	   = $this->pagination->create_links();
			$data_product = $DataView;
			echo'
			<table id="example2" class="table table-bordered table-striped" style="margin-top:40px;">
				<thead>
					<tr>
						<th>No. </th>
						<th> Kode Barang </th>
						<th> Nama Barang </th>
						<th> Kategori</th>
						<th> Satuan</th>
						<th> Harga</th>
						<th> Edit</th>
						<th> Delete </th>
					</tr>
				</thead>
				<tbody>
			';
			for($n=0; $n < count($data_product); $n++)
			{
				$b=$n+1;
				$id_product  = $data_product[$n]->ID;
				$id_category  = $data_product[$n]->id_category;
				$nm_product  = $data_product[$n]->name;
				$deskripsi   = $data_product[$n]->desc;
				$harga       = $data_product[$n]->price;
				$kd_product  = $data_product[$n]->code;
				$satuan      = $data_product[$n]->unit;
				$get_name_category=$this->master_model->select_in('ms_product_category','name',"WHERE ID=$id_category");
				echo'
					<tr>
						<td> '.$b.'</td>
						<td>'.$kd_product.' </td>
						<td>'.$nm_product.' </td>
						<td>
							<a href="'.base_url().'admin/master/product/'.$menuid.'/'.$id_category.'">
								'.$get_name_category[0]->name.'
							</a>
						</td>
						<td>'.$satuan.' </td>
						<td>
							<input type="text" name="price" value="'.$harga.'" class="form-control" style="width:100px">
						</td>
						<td>
							<a href="'.base_url().'admin/master/product_edit/'.$menuid.'/'.$id_category.'/'.$id_product.'" class="text-green">
								<i class="fa fa-edit"></i>
							</a>
						</td>
						<td>
							<a href="'.base_url().'admin/master/delete_product/'.$menuid.'/'.$id_category.'/'.$id_product.'" onclick="return confirm(\'Apakah anda ingin menghapus data ini?\')"  class="text-red">
								<i class="fa fa-trash-o"></i>
							</a>
						</td>
					</tr>
				';
			}
			echo'
				</tbody>
				</table>
				'."<ul style='margin-top:20px;' class='pagination'".$this->pagination->create_links()."</ul>".'
			';
			}
		}
	}
	public function get_product_detail($menuid, $id_category)
	{
		$code=$this->input->get('code');
		$check_product=$this->master_model->mst_check_3('ms_product', "id_category=$id_category AND (name LIKE '%$code%' OR code LIKE '%$code%')");
		if($check_product==false)
		{
			echo'
				<tr>
					<td colspan="8">Tidak ada data tersedia di table</td>
				</tr>
			';
		}else
		{
			$this->load->library('pagination');
			$uri_segment  = 6;
			$limit 		= 10;
			$offset 	   = $this->uri->segment($uri_segment);	
			if ($offset == ''){$offset = 0;}else{$offset = $offset;}
			$num   = $this->master_model->mst_data('ms_product');	
			$num=count($num);	
			$DataView=$this->master_model->select_in('ms_product','*',"WHERE id_category=$id_category AND (name LIKE '%$code%' OR code LIKE '%$code%') ORDER BY ID ASC LIMIT $limit OFFSET $offset");
			$config['base_url']	 = base_url().'admin/master/product/'.$menuid.'/'.$id_category;
			$config['total_rows']   = $num;
			$config['per_page'] 	 = $limit;
			$config['uri_segment']  = $uri_segment;
			$config['next_link'] 	= 'Next';
			$config['prev_link'] 	= 'Prev';
			$config['first_link']   = 'First';
			$config['last_link'] 	= 'Last';
			$this->pagination->initialize($config);
			$data['page'] 	   	   = $this->pagination->create_links();
			$DataView = $DataView;
			for($a=0; $a < count($DataView); $a++)
			 {
				 $b=$a+1;
				 $c=$offset+$b;
				 $id_product  = $DataView[$a]->ID;
				 $nm_product  = $DataView[$a]->name;
				 $deskripsi   = $DataView[$a]->desc;
				 $harga       = $DataView[$a]->price;
				 $kd_product  = $DataView[$a]->code;
				 $satuan      = $DataView[$a]->unit;
				 echo '
				  <tr>
					<td> '.$c.'</td>
					<td>'.$kd_product.' </td>
					<td>'.$nm_product.' </td>
					<td>'.$deskripsi.' </td>
					<td>'.$satuan.' </td>
					<td>
						<input type="text" name="price" value="'.$harga.'" class="form-control" style="width:100px">
					</td>
					<td>
						<a href="'.base_url().'admin/master/product_edit/'.$menuid.'/'.$id_category.'/'.$id_product.'" class="text-green">
							<i class="fa fa-edit"></i>
						</a>
					</td>
					<td>
						<a href="'.base_url().'admin/master/delete_product/'.$menuid.'/'.$id_category.'/'.$id_product.'" onclick="return confirm(\'Apakah anda ingin menghapus data ini?\')"  class="text-red">
							<i class="fa fa-trash-o"></i>
						</a>
					</td>
				</tr>';
			 }
		}
	}
	public function sort_product($menuid, $id_category)
	{
		$filter=$this->input->post('filter');
		if($filter==0)
		{
			$order='';
		}elseif($filter==1)
		{
			$order='ORDER BY ID ASC';
		}elseif($filter==2)
		{
			$order='ORDER BY ID DESC';
		}
		$this->load->library('pagination');
		$uri_segment  = 6;
		$limit 		= 10;
		$offset 	   = $this->uri->segment($uri_segment);	
		if ($offset == ''){$offset = 0;}else{$offset = $offset;}
		$num   = $this->master_model->mst_data('ms_product');	
		$num=count($num);	
		$DataView=$this->master_model->select_in('ms_product','*',"WHERE id_category=$id_category $order LIMIT $limit OFFSET $offset");
		$config['base_url']	 = base_url().'admin/master/product/'.$menuid.'/'.$id_category;
		$config['total_rows']   = $num;
		$config['per_page'] 	 = $limit;
		$config['uri_segment']  = $uri_segment;
		$config['next_link'] 	= 'Next';
		$config['prev_link'] 	= 'Prev';
		$config['first_link']   = 'First';
		$config['last_link'] 	= 'Last';
		$this->pagination->initialize($config);
		$data['page'] 	   	   = $this->pagination->create_links();
		$DataView = $DataView;
		for($a=0; $a < count($DataView); $a++)
		 {
			 $b=$a+1;
			 $c=$offset+$b;
			 $id_product  = $DataView[$a]->ID;
			 $nm_product  = $DataView[$a]->name;
			 $deskripsi   = $DataView[$a]->desc;
			 $harga       = $DataView[$a]->price;
			 $kd_product  = $DataView[$a]->code;
			 $satuan      = $DataView[$a]->unit;
			 echo '
			  <tr>
				<td> '.$c.'</td>
				<td>'.$kd_product.' </td>
				<td>'.$nm_product.' </td>
				<td>'.$deskripsi.' </td>
				<td>'.$satuan.' </td>
				<td>
					<input type="text" name="price" value="'.$harga.'" class="form-control" style="width:100px">
				</td>
				<td>
					<a href="'.base_url().'admin/master/product_edit/'.$menuid.'/'.$id_category.'/'.$id_product.'" class="text-green">
						<i class="fa fa-edit"></i>
					</a>
				</td>
				<td>
					<a href="'.base_url().'admin/master/delete_product/'.$menuid.'/'.$id_category.'/'.$id_product.'" onclick="return confirm(\'Apakah anda ingin menghapus data ini?\')"  class="text-red">
						<i class="fa fa-trash-o"></i>
					</a>
				</td>
			</tr>';
		 }
	}
	public function get_category($menuid)
	{
		$code=$this->input->get('code');
		$this->load->library('pagination');
		$uri_segment  = 5;
		$limit 		= 10;
		$offset 	   = $this->uri->segment($uri_segment);
		if ($offset == ''){$offset = 0;}else{$offset = $offset;}
		$num   = $this->master_model->mst_data('ms_product_category');	
		$num=count($num);	
		$DataView = $this->master_model->select_in('ms_product_category', '*',"WHERE name LIKE '%$code%' ORDER BY ID ASC LIMIT $limit OFFSET $offset");
		$config['base_url']	 = base_url().'admin/master/product_category/'.$menuid;
		$config['total_rows']   = $num;
		$config['per_page'] 	 = $limit;
		$config['uri_segment']  = $uri_segment;
		$config['next_link'] 	= 'Next';
		$config['prev_link'] 	= 'Prev';
		$config['first_link']   = 'First';
		$config['last_link'] 	= 'Last';
		$this->pagination->initialize($config);
		$data['page'] 	   	   = $this->pagination->create_links();
		$category= $DataView;
		for($a=0; $a < count($category); $a++)
		 {
			 $b=$a+1;
			 $c=$offset+$b;
			 $id_category = $category[$a]->ID;
			 $nm_category = $category[$a]->name;
			 $deskripsi   = $category[$a]->desc;
			 $where = "WHERE ID = $id_category";
			 $data_product = $this->master_model->select_in('ms_product','*',"WHERE id_category=$id_category");
			 $num=count($data_product);
			 echo'
			  <tr>
				<td style="text-align:center"> '.$c.'</td>
				<td><a href="'.base_url().'admin/master/product/'.$menuid.'/'.$id_category.'">'.$nm_category.' </a></td>
				<td>'.$deskripsi.' </td>
				<td>
					<a href="'.base_url().'admin/master/product/'.$menuid.'/'.$id_category.'">
						'.$num.' Product
					</a>
				</td>
				<td style="text-align:center">
					<a alt="'.$id_category.'" class="edit text-green" style="cursor:pointer" data-toggle="modal" data-target="#modal_edit">
						<i class="fa fa-edit"></i>
					</a>
				</td>
				<td style="text-align:center">
					<a href="'.base_url().'admin/master/delete_category/'.$menuid.'/'.$id_category.'" onclick="return confirm(\'Apakah anda ingin menghapus data ini?\')"  class="text-red">
						<i class="fa fa-trash-o"></i>
					</a>
				</td>
			</tr>';
		 }
	}
	function update_product($menuid, $id_category)
	{
		$ID          = $this->input->post('ID');
		$price       	= $this->input->post('price');
		//print_array($this->input->post());
		//exit;
		for($a=0 ; $a < count($ID) ; $a++)
		{
			$this->master_model->mst_update('ms_product', "price='$price[$a]'", $ID[$a]);
		}
		redirect('admin/master/product/'.$menuid.'/'.$id_category);
	}
	
	public function edit_category($menuid)
	{
		$ID = $this->input->post('id_category');
		$data_edit=$this->master_model->mst_data_edit('ms_product_category',$ID);
		echo'
			<form method="post" action="'.base_url().'admin/master/update_category/'.$menuid.'/'.$ID.'">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Edit Customer</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Kategori *</label>
						<input type="text" name="nama" class="form-control" placeholder="Name Category" required="required" value="'.$data_edit[0]->name.'">
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea name="description" class="form-control">'.$data_edit[0]->desc.'</textarea>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-info btn-fill pull-right cekKode" value="Save" id="save">
					<button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right:5px;">Close</button>
				</div>
			</form>
		';
	}
	public function update_category($menuid, $ID)
	{
		$data=array
		(
			'name'=>$this->input->post('nama'),
			'desc'=>$this->input->post('description'),
		);
		$this->db->where('ID',$ID);
		$this->db->update('ms_product_category', $data);
		redirect('admin/master/product_category/'.$menuid);
	}
	public function product($menuid, $id_cat)
	{
		define("menuid",$menuid);
		$UserID = $this->session->userdata('UserID');
		$this->redirectNoAuthRead($UserID, $menuid);
		$this->load->library('pagination');
		$uri_segment  = 6;
		$limit 		= 10;
		$offset 	   = $this->uri->segment($uri_segment);	
		if ($offset == ''){$offset = 0;}else{$offset = $offset;}
		$num   = $this->master_model->global_num("ms_product WHERE id_category=$id_cat");	
		
		$DataView    = $this->master_model->select_in('ms_product','*',"WHERE id_category=$id_cat ORDER BY sort ASC LIMIT $limit OFFSET $offset");
		$config['base_url']	 = base_url().'admin/master/product/'.$menuid.'/'.$id_cat;
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
		$data['category'] = $this->master_model->mst_data('ms_product_category');
		$data['kd_prod_generate']    = $this->master_model->generateKdProd(4);
		$this->load->view('admin/product/product_detail', $data);
	}
	function kode_checker()
	{
		$kode = $this->input->post('kd_barang');
		$cek = $this->master_model->cek_code($kode);
		if($cek){
			echo '1';
		}else{
			echo '0';
		}
	}
	function update_sort($MENU_ID, $id_category)
	{
		$id =  $this->input->post('id');
		$sort =  $this->input->post('sort');
		
		//print_array($this->input->post());
		//exit;
		for($a=0; $a < count($id); $a++)
		{
			    $id_list = $id[$a];
				$urutan = $sort[$a];
				$this->db->where('ID', $id_list);
				$this->db->set('sort', $urutan);
				$this->db->update('ms_product');
		}
		redirect('admin/master/product/'.$MENU_ID.'/'.$id_category);
	}
	public function insert_new_product($menuid)
	{
		$submit = $this->input->post('submit');
		$kode = $this->input->post('kd_barang');
		$id_category = $this->input->post('id_category');
		$ID = $this->master_model->mst_last_id('ms_product');
		/*if($_FILES['ImageUpload']['name']=='')
		{
			$link=str_replace(' ','-',str_replace('/','or',str_replace('&','and',str_replace('@','at',strtolower($name)))));
			$data = array
			(
				'ID' => $ID,
				'id_category' => $id_category,
				'name' => $this->input->post('product'),
				'link' => $link,
				'desc' => $this->input->post('desk'),
				'price' => $this->input->post('harga'),
				'code' => $kode,
				'unit' => $this->input->post('satuan'),
			);
			$this->db->insert('ms_product', $data);
		}else
		{
			$namepic = 'pompa_air';
			$Image 		= $namepic.'-'.$ID.'.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
			$Image_temp   = $namepic.'-'.$ID.'_temp.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
			$config['file_name']      = $namepic.'-'.$ID.'_temp'; //without extension
			$config['upload_path']    = './uploads/gallery/';
			$config['allowed_types']  = 'gif|jpg|png|';
			$config['max_size']	   = '1000';
			$config['max_width']      = '1850';
			$config['max_height']     = '1850';
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('ImageUpload')) 
			{
				$data = array('error' => $this->upload->display_errors('',''));	
				$error = $data['error'];
				echo '<script language="javascript">alert("'.$error.'!");window.history.go(-1);</script>';
				exit();
			}else
			{
				$fileImage_temp 	= './uploads/gallery/'.$Image_temp; //with extension
				if (file_exists($fileImage_temp)){unlink($fileImage_temp);}//without extension
				$fileImage 	= './uploads/gallery/'.$Image;//without extension
				if (file_exists($fileImage) && $Image!= ''){unlink($fileImage);}
				#second upload with no error, not necessary to make a condition error upload image
				$config['file_name']      = $namepic.'-'.$ID; // initialization new config file_name 
				$this->upload->initialize($config);
				$this->upload->do_upload('ImageUpload');	
				#close upload image =========================================================================	
			}		
			$link=str_replace(' ','-',str_replace('/','or',str_replace('&','and',str_replace('@','at',strtolower($namepic)))));*/
			$data = array
			(
				'ID' => $ID,
				'id_category' => $id_category,
				'name' => $this->input->post('product'),
				'link' => '',
				'desc' => $this->input->post('desk'),
				'code' => $kode,
				'unit' => $this->input->post('satuan'),
				'image'  => '',
			);
			$this->db->insert('ms_product', $data);
		//}
		if($submit==1)
		{
			redirect('admin/master/product/'.$menuid.'/'.$id_category);
		}elseif($submit==2)
		{
			redirect('admin/master/new_product/'.$menuid);
		}		
	}
	public function product_edit($menuid, $id_category, $id_product)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		$data['category'] = $this->master_model->mst_data('ms_product_category');
		$data['data_edit']= $this->master_model->mst_data_edit('ms_product', $id_product);
		$data['name_category'] = $this->master_model->select_in('ms_product_category','name',"WHERE ID=$id_category");
		$this->load->view('admin/product/edit_product_detail', $data);
	}
	public function edit_process_product($menuid, $id_category, $id_product)
	{
		$submit=$this->input->post('submit');
		$data = array(
			'code' => $this->input->post('kd_barang'),
			'name' => $this->input->post('product'),
			'desc' => $this->input->post('desk'),
			'id_category' => $this->input->post('id_category'),
			'unit' => $this->input->post('satuan'),
		);
		$this->db->where('ID', $id_product);
		$this->db->update('ms_product', $data);
		if($submit==2)
		{
			redirect('admin/master/new_product/'.$menuid.'/'.$id_category);
		}else
		{
			redirect('admin/master/product/'.$menuid.'/'.$id_category);
		}
	}
	public function delete_product($menuid, $id_category, $id_product)
	{
		$this->db->where('ID', $id_product);
		$this->db->delete('ms_product');
		redirect('admin/master/product/'.$menuid.'/'.$id_category);
	}
	public function new_product($menuid, $id_category='')
	{
		$data['category'] = $this->master_model->mst_data('ms_product_category');
		if($id_category=='')
		{
		}else
		{
			$data['name_category'] = $this->master_model->select_in('ms_product_category','name',"WHERE ID=$id_category");
		}
		$this->load->view('admin/product/produk_baru', $data);
	}
	public function check_phone()
	{
		$phone = $this->input->post('phone');
		if($phone=='')
		{
			echo '2';
		}else
		{
			$cek = $this->master_model->mst_check('ms_customer','no_hp',$phone);
			if($cek)
			{
				echo '1';
			}else{
				echo '0';
			}
		}
	}	
	public function check_category()
	{
		$id_category = $this->input->post('id_category');
		if($id_category=='')
		{
			echo '2';
		}else
		{
			//$cek = $this->master_model->mst_check('ms_promo','id_category',$id_category);
			$cek = $this->master_model->check_promo($id_category);
			if($cek)
			{
				echo '1';
			}else{
				echo '0';
			}
		}
	}	
	function generate_by_phone()
	{
		$nohp = $this->input->post('nohp');
		$sql = "SELECT ID FROM ms_customer WHERE no_hp = '$nohp' ORDER BY name ASC";
        $qry = $this->db->query($sql);
		$num = $qry->num_rows();
	   if($num == 0)
	   {
		   $gen = $this->master_model->generateOTP(4);
		   echo $gen;
	   }else{
		   echo 'error';
	   }
	}
	public function config($menuid)
	{
 		$data['dataConfig'] = $this->master_model->select_in('config_global', '*', "WHERE ID=1");
		$this->load->view('admin/config_global', $data);
	}	
	public function update_config_global($menuid)
	{
		$data = array(
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone'),
			'news' => $this->input->post('news'),
			'flag' => $this->input->post('publish')
		);
		$this->db->where('ID', 1);
		$this->db->update('config_global', $data);
		redirect('admin/master/config/'.$menuid);
	}
	public function product_information($menuid, $id_category, $id_product)
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
	function upload_gallery($menuid, $id_category, $id_product)
	{
		$MainFlg 	    = 0;
		$cekMainFlag 	= $this->master_model->cekMainFlag($id_product);
		$dataProduct    = $this->master_model->select_in('ms_product', 'name', "WHERE ID=$id_product");
		$now = date('mdHis');
		$url_title = url_title($dataProduct[0]->name);
		if($cekMainFlag == 0)
		{
			$MainFlg = 1;
		}else{
			$MainFlg = 0;
		}
		$namePic      = 'leo_'.$url_title.'-'.$now; //nama image yang akan disimpan difolder tanpa ekstensi	
		$Image 		  = $namePic.'.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
		$Image_temp   = $namePic.'_temp.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
		$path = 'gallery';											
		$uploadsImage = $this->master_model->uploadImage($namePic, $Image, $Image_temp, $path);
		   $data = array
			(
				'id_product' => $id_product,
				'ImageName' => $Image,
				'mainImage' => $MainFlg,
				'sort' => 1,
				'caption' => $this->input->post('caption')
			);
			$this->db->insert('product_image', $data);
		redirect('admin/master/product_information/'.$menuid.'/'.$id_category.'/'.$id_product.'/gallery');
	}
	function delete_gallery($menuid, $id_category, $Id_gallery, $imageName, $id_product)
	{
			$fileImage	= './uploads/gallery/'.$imageName; //with extension
			if (file_exists($fileImage)){unlink($fileImage);}//without extension
		    $this->db->where('ID', $Id_gallery);
		    $this->db->delete('product_image');
		    redirect('admin/master/product_information/'.$menuid.'/'.$id_category.'/'.$id_product.'/gallery');
	}
	function insert_product_information($menuid, $id_category, $id_product, $info_for)
	{
		$dataProduct    = $this->master_model->select_in('ms_product', 'name', "WHERE ID=$id_product");
		$now = date('mdHis');
		$url_title = url_title($dataProduct[0]->name).'_'.$info_for;
		$namePic      = $url_title.'-'.$now; //nama image yang akan disimpan difolder tanpa ekstensi	
		$Image 		  = $namePic.'.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
		$Image_temp   = $namePic.'_temp.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
		$path = 'product_information';											
		$uploadsImage = $this->master_model->uploadImage($namePic, $Image, $Image_temp, $path);
		   $data = array
			(
				'id_product' => $id_product,
			    'info_for' => $info_for,
				'image' => $Image,
				'sort' => 1,
				'desc' => $this->input->post('desc')
			);
			$this->db->insert('product_info', $data);
		redirect('admin/master/product_information/'.$menuid.'/'.$id_category.'/'.$id_product.'/'.$info_for);
	}
	function update_product_information($menuid, $id_category, $id_product, $info_for)
	{
		$fileUpload = $_FILES['ImageUpload']['name'];
		$dataProduct    = $this->master_model->select_in('product_info', 'image, ID', "WHERE id_product=$id_product and info_for = '$info_for'");
		$ID_prod_info = $dataProduct[0]->ID;
		$imageDB = $dataProduct[0]->image;
		$arr = explode(".", $imageDB);			
		$imageNameFile = $arr[0];
		if($fileUpload <> '')
		{
			$Image 		  = $imageNameFile.'.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
			$Image_temp   = $imageNameFile.'_temp.'.substr($_FILES['ImageUpload']['name'], strrpos($_FILES['ImageUpload']['name'], '.') + 1);
			$path = 'product_information';
			$uploadsImage = $this->master_model->uploadImage($imageDB, $Image, $Image_temp, $path);
			   $data = array
				(
					'image' => $Image,
					'desc' => $this->input->post('desc')
				);
		}else{
			 $data = array
				(
					'desc' => $this->input->post('desc')
				);
		}
		$this->db->where('ID', $ID_prod_info);
		$this->db->update('product_info', $data);
		redirect('admin/master/product_information/'.$menuid.'/'.$id_category.'/'.$id_product.'/'.$info_for);
	}
}
?>