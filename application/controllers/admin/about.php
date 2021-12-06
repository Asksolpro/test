<?php 
include('./application/controllers/authcontroller'.EXT);
class about extends Authcontroller {
	public function __construct()
	{
		parent :: __construct();	
		$this->load->model('admin/master_model');
    }
	
	function index($menuid, $info='')
	{		
        define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$data['data_about'] = $this->master_model->select_in('about','*',"ORDER BY sort ASC");
		
		$this->load->view('admin/about/main', $data);
	}
	
	function insert($menuid)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$ID=$this->master_model->mst_last_id('about');
		$data = array
		(
			'ID' 		  => $ID,
			'name'        => $this->input->post('name'),
			'note'    	=> $this->input->post('note'),
			'sort'  	    => $ID,
			'publish' 	 => 1
		);
		$this->db->insert('about', $data);
		
		redirect('admin/about/index/'.$menuid);
	}
	
	function publish($menuid, $ID, $publish)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		if($publish==0)
		{
			$this->db->where('ID', $ID);
			$this->db->set('publish','1');
			$this->db->update('about');
		}else
		{
			$this->db->where('ID', $ID);
			$this->db->set('publish','0');
			$this->db->update('about');
		}
		redirect('admin/about/index/'.$menuid);
	}
	
	public function delete($menuid, $ID)
	{
		$this->db->where('ID', $ID);

		$this->db->delete('about');

		redirect('admin/about/index/'.$menuid);
	}
	
	function update($menuid)
	{
		$ID          = $this->input->post('ID');
		$sort       	= $this->input->post('sort');


		for($a=0 ; $a < count($ID) ; $a++)
		{
			$this->master_model->mst_update('about', "sort='$sort[$a]'", $ID[$a]);
		}
		
		redirect('admin/about/index/'.$menuid);
	}
	
	function edit($menuid, $ID)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$data['data_edit']=$this->master_model->select_in('about','name, note',"WHERE ID=$ID");
		$this->load->view('admin/about/edit', $data);
	}
	
	function edit_process($menuid, $ID)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$data = array
		(
			'name'        => $this->input->post('name'),
			'note'    	=> $this->input->post('note'),
		);
		$this->db->where('ID', $ID);
		$this->db->update('about', $data);
		
		redirect('admin/about/index/'.$menuid);
	}
}
?>