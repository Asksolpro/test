<?php



Class home extends CI_Controller {

    function __construct()

	{

        parent::__construct();

		$this->load->model('admin/master_model');

		

		$this->load->helper('text');

    }


    public function index()
	{
		$data['data_contact'] = $this->master_model->select_in('content_master', '*', "WHERE content_for= 'contact'");

		$data['data_about'] = $this->master_model->select_in('content_master', '*', "WHERE content_for= 'about'");

		$data['data_banner'] = $this->master_model->select_in('banner', '*', " order by rand()");

		$data['getCat'] = $this->master_model->select_in('ms_product_category', '*', 'WHERE fg_active = 1 order by sort ASC limit 8 offset 0');
		$data['getCat2'] = $this->master_model->select_in('ms_product_category', '*', 'WHERE fg_active = 1 order by sort ASC limit 4 offset 4');

		$data['news'] = $this->master_model->select_in('content_master', '*', "WHERE content_for = 'news' order by ID DESC limit 3");

		

		$this->load->view('front/home', $data);

	}



	





}   



?>