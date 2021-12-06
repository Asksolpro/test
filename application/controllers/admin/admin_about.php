<?php 
include('./application/controllers/authcontroller'.EXT);
class Admin_about extends Authcontroller {
	public function __construct()
	{
		parent :: __construct();	
		$this->load->model('admin/master_model');
    }
	
	
	
	
	function index($menuid, $info='')
	{		
        $UserID = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($UserID, $menuid); // take from function in application/controllers/a
		$data['dataAbout'] = $this->master_model->mst_get_data('content_master', 'content_for', 'about');
		$this->load->view('admin/about', $data);
	}
	
	function visimisi($menuid, $info='')
	{		
        $UserID = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($UserID, $menuid); // take from function in application/controllers/a
		$data['dataAbout'] = $this->master_model->mst_get_data('content_master', 'content_for', 'about_visimisi');
		$this->load->view('admin/about', $data);
	}
	
	function sertifikasi($menuid, $info='')
	{		
        $UserID = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($UserID, $menuid); // take from function in application/controllers/a
		$data['dataAbout'] = $this->master_model->mst_get_data('content_master', 'content_for', 'sertifikasi');
		$this->load->view('admin/about', $data);
	}
	
	function karir($menuid, $info='')
	{		
        $UserID = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($UserID, $menuid); // take from function in application/controllers/a
		$data['dataAbout'] = $this->master_model->mst_get_data('content_master', 'content_for', 'karir');
		$this->load->view('admin/about', $data);
	}
	
	function insert_content($menuid)
	{
		$id 		  =  $this->input->post('id');
		$content_for =  $this->input->post('content_for');
		
		
	
		if($id==0)
		{
		
			$data = array(
						'content_for' => $content_for,
						'title'      => $this->input->post('name'),
						'desc'    	=> $this->input->post('desk'),
						'sort'  => 1,
						'publish' => 1
					);

			$this->db->insert('content_master', $data);
		}else{
			
			$data = array(
						'title'      => $this->input->post('name'),
						'desc'    	=> $this->input->post('desk'),
					
					);
            $this->db->where('id', $id);
			$this->db->update('content_master', $data);
		}
		
		
		redirect('admin/admin_about/index/'.$menuid);
	}
	
	
	
	
	
}
?>