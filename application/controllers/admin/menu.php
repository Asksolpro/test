<?php 
include('./application/controllers/authcontroller'.EXT);
class menu extends Authcontroller
{
	

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/master_model');	
		$this->load->library('upload');

	}

	
	function index($menuid)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$data['data_menu']=$this->master_model->select_in('ms_menu','*',"WHERE menu_level=1");
		
		$this->load->view('admin/menu/main',$data);
	}
	
	public function insert_menu($menuid)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$ID=$this->master_model->mst_last_id('ms_menu');
		$data=array
		(
			'ID'=>$ID,
			'name'=>$this->input->post('name'),
			'menu_level'=>1,
			'parent_number'=>0,
			'sort'=>$ID,
			'controller'=>$this->input->post('controller'),
			'type'=>'B',
			'icon'=>$this->input->post('icon'),
		);
		
		$this->db->insert('ms_menu', $data);
		
		redirect('admin/menu/index/'.$menuid);
	}
	
	
	public function update_sort($menuid)
	{		
		
		$MENUID = $this->input->post('MenuID'); 
		$sort = $this->input->post('sort'); 
		
		
		for($a=0; $a < count($MENUID); $a++)
		{
			$ID = $MENUID[$a];
			$urutan = $sort[$a];
			
			
			$this->db->where('ID', $ID);
			$this->db->set('sort', $urutan);
			$this->db->update('ms_menu');
		}
		
		
		
		redirect('admin/menu/index/'.$menuid);
	}
	
	function edit_menu($menuid)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$ID=$this->input->post('ID');
		
		$data_edit=$this->master_model->mst_data_edit('ms_menu',$ID);
		
		echo'
			<div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Menu</h4>
            </div>
			<form action='.base_url().'admin/menu/edit_menu_proccess/'.$menuid.'/'.$ID.'" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<script>
						$(document).ready(function()
						{
							$(".mirror").on("keypress change", function(event)
							{
								var data=$(this).val();
								$(".mirror2").val(data);
							});
						});
					</script>
					<div class="form-group">
						<label>Name *</label>
						<input type="text" name="name" class="form-control mirror" placeholder="Nama Menu" required="required" value="'.$data_edit[0]->name.'">
					</div>
					
					<div class="form-group">
						<label>Controller *</label>
						<input type="text" name="controller" class="form-control mirror2" placeholder="Kontrol Menu" required="required" value="'.$data_edit[0]->controller.'">
					</div>
					
					<div class="form-group">
						<label>Icon</label>
						<input type="text" name="icon" class="form-control" placeholder="Icon" value="'.$data_edit[0]->icon.'">
					</div>
					
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-info btn-fill pull-right" value="Save" id="save">
					<button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right:5px;">Close</button>
				</div>
			</form>
		';
	}
	
	public function edit_menu_proccess($menuid, $ID)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
			$data=array
			(
				'name'=>$this->input->post('name'),
				'controller'=>$this->input->post('controller'),
				'icon'=>$this->input->post('icon'),
			);

		$this->db->where('ID', $ID);
		$this->db->update('ms_menu', $data);
		
		redirect('admin/menu/index/'.$menuid);
	}
	
	public function delete_menu($menuid, $ID)
	{		
		$this->db->where('ID', $ID);
		$this->db->delete('ms_menu');
		
		$this->db->where('parent_number', $ID);
		$this->db->delete('ms_menu');
		
		$this->db->where('id_menu', $ID);
		$this->db->delete('user_group_detail');
		
		redirect('admin/menu/index/'.$menuid);
	}
	
	function sub_menu($menuid, $id_parent)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$data['data_menu']=$this->master_model->select_in('ms_menu','*',"WHERE menu_level=2 AND parent_number=$id_parent");
		
		$this->load->view('admin/menu/sub_menu',$data);
	}
	
	function insert_sub_menu($menuid, $id_category)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$ID=$this->master_model->mst_last_id('ms_menu');
		$data=array
		(
			'ID'=>$ID,
			'name'=>$this->input->post('name'),
			'menu_level'=>2,
			'parent_number'=>$id_category,
			'sort'=>$ID,
			'controller'=>$this->input->post('controller'),
			'type'=>'B',
			'icon'=>$this->input->post('icon'),
		);
		
		$this->db->insert('ms_menu', $data);
		
		redirect('admin/menu/sub_menu/'.$menuid);
	}
	
	function edit_sub_menu($menuid, $id_category)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$ID=$this->input->post('ID');
		
		$data_edit=$this->master_model->mst_data_edit('ms_menu',$ID);
		
		echo'
			<div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Menu</h4>
            </div>
			<form action='.base_url().'admin/menu/edit_sub_menu_proccess/'.$menuid.'/'.$id_category.'/'.$ID.'" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<script>
						$(document).ready(function()
						{
							$(".mirror").on("keypress change", function(event)
							{
								var data=$(this).val();
								$(".mirror2").val(data);
							});
						});
					</script>
					<div class="form-group">
						<label>Name *</label>
						<input type="text" name="name" class="form-control mirror" placeholder="Nama Menu" required="required" value="'.$data_edit[0]->name.'">
					</div>
					
					<div class="form-group">
						<label>Controller *</label>
						<input type="text" name="controller" class="form-control mirror2" placeholder="Kontrol Menu" required="required" value="'.$data_edit[0]->controller.'">
					</div>
					
					<div class="form-group">
						<label>Icon</label>
						<input type="text" name="icon" class="form-control" placeholder="Icon" value="'.$data_edit[0]->icon.'">
					</div>
					
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-info btn-fill pull-right" value="Save" id="save">
					<button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right:5px;">Close</button>
				</div>
			</form>
		';
	}
	
	public function edit_sub_menu_proccess($menuid, $id_category, $ID)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$data=array
		(
			'name'=>$this->input->post('name'),
			'controller'=>$this->input->post('controller'),
			'icon'=>$this->input->post('icon'),
		);
		
		$this->db->where('ID', $ID);
		$this->db->update('ms_menu', $data);
		
		redirect('admin/menu/sub_menu/'.$menuid.'/'.$id_category);
	}
	
	public function delete_sub_menu($menuid, $ID)
	{		
		$this->db->where('ID', $ID);
		$this->db->delete('ms_menu', $data);
		
		redirect('admin/menu/sub_menu/'.$menuid.'/'.$ID);
	}
	

}

?>