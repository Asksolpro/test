<?php



Class About extends CI_Controller {

    function __construct()

	{

        parent::__construct();

		$this->load->model('admin/master_model');

    }

   /* public function index($for='about')
	{

		$data['data_about'] = $this->master_model->select_in('content_master', '*', "WHERE content_for= '$for'");

		$this->load->view('front/about', $data);
	}*/
	
	public function index()
	{
		$data['data_about_category']=$this->master_model->select_in('video', 'ID, name', "ORDER BY ID ASC");
		$this->load->view('front/video', $data);
	}

}   



?>