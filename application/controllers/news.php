<?php



Class News extends CI_Controller {

    function __construct()

	{

        parent::__construct();

		$this->load->model('admin/master_model');

    }



    

    public function index()

	{

		$data['DataView'] = $this->master_model->select_in('content_master', '* '," WHERE content_for = 'news' ORDER BY ID DESC LIMIT 10 OFFSET 0");

		$this->load->view('front/news', $data);

	}



	

    public function detail($id)

	{

		$data['DataView'] = $this->master_model->select_in('content_master', '* '," WHERE ID = '$id'");

		$this->load->view('front/news_detail', $data);

	}



}   



?>