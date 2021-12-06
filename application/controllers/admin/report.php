<?php 

include('./application/controllers/authcontroller'.EXT);

class report extends Authcontroller

{


	function __construct()

	{        parent::__construct();;

		$this->load->model('admin/master_model');

		$this->load->library('upload');



        $usg = $this->session->userdata('usergroup');

		$idMenu = $this->uri->segment(4);

		$this->master_model->checkAccess($idMenu, $usg);

    }

	

	public function customer($menuid)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$today=date('Y-m-d');
		$start_month = strtotime ('-30 day', strtotime($today));
		$start_month = date('Y-m-d', $start_month);
		
		//$yesterday = strtotime ( '-1 day' , strtotime ($today));
		//$yesterday = date('Y-m-d', $yesterday);
		
		$data['report_customer']=$this->master_model->report_customer($start_month, $today);
		$this->load->view('admin/report/customer', $data);
	}
	
	public function mutasi_poin($menuid)

	{

		$this->load->view('admin/report/mutasi_poin');

	}
	
	public function category($menuid)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$today=date('Y-m-d');
		$start_month = strtotime ('-30 day', strtotime($today));
		$start_month = date('Y-m-d', $start_month);
		
		//$yesterday = strtotime ( '-1 day' , strtotime ($today));
		//$yesterday = date('Y-m-d', $yesterday);
		
		$data['report_category']=$this->master_model->report_category($start_month, $today);
		
		$this->load->view('admin/report/category', $data);
	}
	
	public function category_detail($menuid, $id_category)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
        $this->redirectNoAuthRead($user_id, $menuid);
		
		$today=date('Y-m-d');
		$start_month = strtotime ('-30 day', strtotime($today));
		$start_month = date('Y-m-d', $start_month);
		
		//$yesterday = strtotime ( '-1 day' , strtotime ($today));
		//$yesterday = date('Y-m-d', $yesterday);
		
		$data['report_product']=$this->master_model->report_product($start_month, $today, $id_category);
		
		$this->load->view('admin/report/category_detail', $data);
	}

	public function search_customer($menuid)
	{
		$date=$this->input->post('date_in');
		
		$this->session->set_userdata('search_date_customer', $date);
		
		redirect('admin/report/customer/'.$menuid);

	}

}



?>