<?php 

include('./application/controllers/authcontroller'.EXT);

class poin extends Authcontroller

{

	function __construct()

	{





        parent::__construct();;

		$this->load->model('admin/master_model');

		$this->load->library('upload');



        $usg = $this->session->userdata('usergroup');

		$idMenu = $this->uri->segment(4);

		$this->master_model->checkAccess($idMenu, $usg);

    }



	public function index($menuid)

	{

		define("menuid",$menuid);

        $user_id = $this->session->userdata('UserID');

        $this->redirectNoAuthRead($user_id, $menuid);

		

		$data['data_poin']=$this->master_model->select_in('ms_customer_poin', '*', "WHERE status=0");

		$this->load->view('admin/poin/main', $data);

	}

	

	public function make($menuid)

	{

		define("menuid",$menuid);

        $user_id = $this->session->userdata('UserID');

        $this->redirectNoAuthRead($user_id, $menuid);

		

		$data['data_poin']=$this->master_model->select_in('ms_customer_poin', '*', "WHERE status=1");

		$this->load->view('admin/poin/poin_pakai', $data);

	}
	
	public function expired($menuid)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);

		$data['data_poin']=$this->master_model->select_in('ms_customer_poin', '*', "WHERE status=1");
		$this->load->view('admin/poin/poin_expired', $data);
	}	


}







?>