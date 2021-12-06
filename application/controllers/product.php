<?php

Class product extends CI_Controller {
    function __construct()
	{
        parent::__construct();
		$this->load->model('admin/master_model');
    }

    
    public function index()
	{
		$data['getCat'] = $this->master_model->select_in('ms_product_category', '*', 'WHERE fg_active = 1 order by sort ASC');
		$this->load->view('front/product_category', $data);
	}
	
	public function category($id_cat)
	{
		$data['getCat']		 = $this->master_model->select_in('ms_product_category', '*', 'WHERE fg_active = 1  order by sort ASC');
		$data['dataProduct'] = $this->master_model->select_in('ms_product', '*', "WHERE id_category = $id_cat AND  fg_active = 1 order by sort ASC");
		$data['namaCat']     = $this->master_model->select_in('ms_product_category', 'name as nama_cat', "WHERE ID = $id_cat");
		$this->load->view('front/product_listing', $data);
	}
	
	
	public function listing()
	{
		$this->load->view('front/product_listing');
	}

	public function detail($id_cat, $id_product)
	{
		$data['getCat']		 = $this->master_model->select_in('ms_product_category', '*', 'order by name ASC');
		$data['detailProduct'] = $this->master_model->select_in('ms_product a left join ms_product_category b on a.id_category = b.ID', 'a.*, b.name as nama_category', "WHERE a.ID = $id_product");
		//$data['namaCat']     = $this->master_model->select_in('ms_product_category', 'name as nama_cat', "WHERE ID = $id_cat");
		$data['dataGallery'] = $this->master_model->select_in('product_image', '*', "WHERE id_product = $id_product");
			
		$data['product_info1'] = $this->master_model->select_in('product_info', '*', "WHERE id_product=$id_product AND info_for = 'technical_data'");
		$data['product_info2'] = $this->master_model->select_in('product_info', '*', "WHERE id_product=$id_product AND info_for = 'dimension'");
		$data['product_info3'] = $this->master_model->select_in('product_info', '*', "WHERE id_product=$id_product AND info_for = 'hpc'");
		$data['product_info4'] = $this->master_model->select_in('product_info', '*', "WHERE id_product=$id_product AND info_for = 'material'");
		$data['product_info5'] = $this->master_model->select_in('product_info', '*', "WHERE id_product=$id_product AND info_for = 'package'");
		
		
		$this->load->view('front/product_detail', $data);
	}


}   

?>