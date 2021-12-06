<?php 
include(SITE_URI.'application/controllers/authcontroller'.EXT);
class Group extends Authcontroller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/master_model');	
		$this->load->model('admin/admin_menu_model');	
		$this->load->library('upload');
	}
	function index($menuid)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
       // $this->redirectNoAuthRead($user_id, $menuid);
	 	$data['userGroup'] = $this->master_model->select_in('user_group','ID, name',"ORDER BY name ASC");
		$this->load->view('admin/user/group', $data);
	}
	function insert_usergroup($menuid)
	{
		define("menuid",$menuid);
        $user_id = $this->session->userdata('UserID');
       // $this->redirectNoAuthRead($user_id, $menuid);
		$data['menumst']      = $this->master_model->select_in('ms_menu','ID, name',"WHERE parent_number=0 AND type='B' ORDER BY sort ASC");
//       /print_array($data['menumst'] );
	 	$data['usergroupmst'] = $this->master_model->select_in('user_group','ID, name',"WHERE ID <> '1' ORDER BY name ASC");
		$this->load->view('admin/user/insert_usergroup', $data);
	}
	function insert_proses($menuid)
	{
		$usergroupname = $this->input->post('usergroupname');
		$MenuID   = $this->input->post('MenuID');
		$ReadFlg  = $this->input->post('ReadFlg');
	    $ID_group = $this->admin_menu_model->insertUserGroup($usergroupname);  
		for($a=0; $a < count($MenuID); $a++)
		{
			$id_menu = $MenuID[$a];
			$this->admin_menu_model->InsertUserGroupDetail($ID_group, $id_menu);
		}
		for($b=0; $b < count($ReadFlg); $b++)
		{
			$menud_id = $ReadFlg[$b];
			$this->admin_menu_model->UpdateUserGroupDetail($ID_group, $menud_id);
		}
		redirect('admin/group/index/'.$menuid);
	}
	function edit($MENU_ID, $id_group)
	{
		define("menuid",$MENU_ID);
        $user_id = $this->session->userdata('UserID');
        //$this->redirectNoAuthRead($user_id, $MENU_ID);
	 	$data['dateEdit'] = $this->admin_menu_model->getDateEditGroup($id_group);
		$data['usergroupmst'] = $this->master_model->select_in('user_group','name',"WHERE ID = $id_group");
		$this->load->view('admin/user/edit_usergroup', $data);
	}
	function edit_proses($MENU_ID, $id_group)
	{
		$usergroupname = $this->input->post('usergroupname');
		$sql = "UPDATE user_group set name = '$usergroupname' WHERE ID = $id_group";	
		$qry =$this->db->query($sql);	
		$ReadFlg  = $this->input->post('ReadFlg');
		//print_array($ReadFlg);
		$this->admin_menu_model->setNullGroup($id_group);
		for($b=0; $b < count($ReadFlg); $b++)
		{
			$menud_id = $ReadFlg[$b];
			$this->admin_menu_model->UpdateUserGroupDetail($id_group, $menud_id);
		}
		//exit;
		redirect('admin/group/edit/'.$MENU_ID.'/'.$id_group);
	}
}
?>