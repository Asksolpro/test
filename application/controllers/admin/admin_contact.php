<?php 
include('./application/controllers/authcontroller'.EXT);
class Admin_contact extends Authcontroller {
	public function __construct()
	{
		parent :: __construct();	
		$this->load->model('admin/master_model');
    }
	function index($menuid, $info='')
	{		
        $UserID = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($UserID, $menuid); // take from function in application/controllers/a
		$data['dataAbout'] = $this->master_model->mst_get_data('content_master', 'content_for', 'contact');
		$this->load->view('admin/contact', $data);
	}
	
	function insert_content($menuid)
	{
		$id =  $this->input->post('id');
		
		if($id==0)
		{
		
			$data = array(
						'content_for' => 'contact',
						'title'      => $this->input->post('name'),
						'desc'    	=> $this->input->post('desk'),
						'sort'  => 1,
						'publish' => 1
					);

			$this->db->insert('content_master', $data);
		}else{

			$lokasi =  $this->input->post('alamat');
			$tlp    =  $this->input->post('tlp');
			$email  =  $this->input->post('email');
			
			$shortdesc = $lokasi.'==*=='.$tlp.'==*=='.$email;
			
			
			$data = array(
						'title'      => $this->input->post('name'),
						'shortdesc'  => $shortdesc,
						'desc'    	 => $this->input->post('desk'),
					
					);
            $this->db->where('id', $id);
			$this->db->update('content_master', $data);
		}
		
		
		redirect('admin/admin_contact/index/'.$menuid);
	}
	
	
	
	
	
}
?>