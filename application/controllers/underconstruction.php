<?php 
include('./application/controllers/authcontroller'.EXT);
class Underconstruction extends Authcontroller 
{
	public function __construct()
	{

		parent :: __construct();	

		$this->load->helper('text');

    }
	
	
	function index()
	{
		
		
		$this->load->view('underconstruction');
	}
	
	
	
}