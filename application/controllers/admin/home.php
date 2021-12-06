<?php 

include('./application/controllers/authcontroller'.EXT);



class home extends Authcontroller {

	public function __construct()

	{

		parent :: __construct();	

		$this->load->model('admin/master_model');
    }



	



	function index($menuid, $info='')

	{		

        $UserID = $this->session->userdata('UserID');

        $this->redirectNoAuthRead($UserID, $menuid); // take from function in application/controllers/a

		$data['info'] = $info;

		$this->load->view('admin/monitoring', $data);

	}

}
?>