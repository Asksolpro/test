<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()

	{

		parent :: __construct();	

		$this->load->model('admin/master_model');

    }

	

	
	function index()
	{
		$username = $this->input->post('username'); 
		$pass     = $this->input->post('pass');
		$password = md5(sha1($pass));
		
		//$check = $this->master_model->valid_user($username, $password);
		$check = $this->master_model->mst_check_3('user',"name='$username' AND password='$password'");

		if($check == '')
		{
			redirect('admin/useradmin/index/error/'.$username);
		}else
		{
			$id_group = $check[0]->id_group;
			$ID = $check[0]->ID;
			$name = $check[0]->name;

			$newdata = array
			(
			   'name_admin' => $name,
			   'id_group'   => $id_group,
			   'id_admin'   => $ID,
			   'UserID'  	 => $ID,
			   'logged_in'  => TRUE
			);

			$this->session->set_userdata($newdata);
			redirect('admin/home/index/8');
		}
	}
	

}

?>