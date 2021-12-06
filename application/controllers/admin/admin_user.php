<?php

Class Admin_user extends CI_Controller {

    function __construct()

	{

        parent::__construct();

		$this->load->model('admin/master_model');

				$this->load->model('admin/admin_menu_model');

		$this->load->model('admin/admin_group_model');	

		$this->load->library('upload');

    }

	public function index($menuid)

	{

		$data['user']		    = $this->admin_group_model->getUserAdmin();

		$data['DataUserGroup']   = $this->admin_group_model->DataUserGroup();

		$idAdmin = $this->session->userdata('id_admin');

		$checkMenuAccess   = $this->master_model->checkMenuAccess($menuid, $idAdmin);

		

		

		if($checkMenuAccess == false)

		{

			$this->load->view('admin/notAccessiblePage');

		}else{

		  $this->load->view('admin/user/datalist_useradmin',$data);

		}

	}

	public function insert_user($menuid)

	{

		/*$data['user']		    = $this->master_model->masterQuery('a.*, b.*', 'user_group a LEFT JOIN usergroupmst b ON a.`UserGroupID`=b.`UserGroupID`', 'Where a.UserGroupID <> 1', 'order by a.UserID ASC');*/

		$data['DataUserGroup']   = $this->admin_group_model->DataUserGroup();

		$idAdmin = $this->session->userdata('id_admin');

		$checkMenuAccess   = $this->master_model->checkMenuAccess($menuid, $idAdmin);

	

		if($checkMenuAccess == false)

		{

			$this->load->view('admin/notAccessiblePage');

		}else{

		  $this->load->view('admin/user/create_user',$data);

		}

	}

	function ajaxGetData()

	{

		$id_kelurahan = $this->input->get('id_kelurahan');

		$pilihan = $this->input->get('pilihan');

		if($pilihan==2)

		{

			$data = $this->master_model->select_in('mst_posyandu', '*',"WHERE id_kelurahan = $id_kelurahan  ORDER BY nama ASC");

			echo' <label>Posyandu</label>

				<div class="form-group input-group" style="width:100%">

					<select name="id_posyandu" class="form-control" style="width:100%" >';

						  for($i=0; $i < count($data); $i++)

						  {

							  echo ' <option value="'.$data[$i]->id_posyandu.'">

							  '.$data[$i]->nama.'</option>';

						  }

		 echo'  </select>

              </div>';

		}else if($pilihan==3){

			$data = $this->master_model->select_in('mst_paud', '*',"WHERE id_kelurahan = $id_kelurahan  ORDER BY nama ASC ");

			echo' <label>TK-PAUD</label>

				<div class="form-group input-group" style="width:100%">

					<select name="id_paud" class="form-control" style="width:100%" >';

						  for($i=0; $i < count($data); $i++)

						  {

							  echo ' <option value="'.$data[$i]->id_paud.'">

							  '.$data[$i]->nama.'</option>';

						  }

		 echo'  </select>

              </div>';

		}else{			

			$data = '';

		}

	}

	public function insert_process($MENU_ID)

	{

			$UserPwd        = $this->input->post('password');

			$UserPwdConfirm = $this->input->post('re_password');

			

			if($UserPwd != $UserPwdConfirm)

			{

				$confirmText = "wrong confirmation password";

			}else{

				$data = array(

					    'UserID'       => $this->admin_group_model->GetLastUserID(),

                        'Nama'         => $this->input->post('nama'),

						'UserName'     => $this->input->post('username'),						

						'UserPwd'      => md5(sha1($this->input->post('password'))),

						'UserGroupID'     => $this->input->post('usergroup'),

					

					);

                //print_array($data);

                //exit;

				$this->db->insert('usermst', $data);

				$confirmText = "new user added";

			}

			redirect('admin/admin_user/index/'.$MENU_ID.'/'.$confirmText);

	}

	public function edit($menuid, $userID)

	{

		$data['dataEdit']		    = $this->master_model->masterQuery('*', 'usermst', "Where UserID = $userID", 'order by UserID ASC');

		$data['DataUserGroup']   = $this->admin_group_model->DataUserGroup();

		$idAdmin = $this->session->userdata('id_admin');

		$checkMenuAccess   = $this->master_model->checkMenuAccess($menuid, $idAdmin);

		

		if($checkMenuAccess == false)

		{

			$this->load->view('admin/notAccessiblePage');

		}else{

		  $this->load->view('admin/user/edit_user',$data);

		}

	}

	public function edit_process($MENU_ID, $UserID)

	{

			$id_kelurahan = $this->input->post('id_kelurahan');

			$lokasi = $this->input->post('lokasi');

			$id_posyandu = $this->input->post('id_posyandu');

			$id_paud = $this->input->post('id_paud');

			if($id_posyandu==''){$id_posyandu=0;}

			if($id_paud==''){$id_paud=0;}

				$data = array(

                        'Nama'         => $this->input->post('nama'),

						'UserName'     => $this->input->post('username'),						

						'UserGroupID'     => $this->input->post('usergroup'),

					

					);

			    $this->db->where('UserID', $UserID);

				$this->db->update('usermst', $data);

			redirect('admin/admin_user/index/'.$MENU_ID);

	}

	

	

	function reset_pass($MENU_ID, $UserID)

	{

		

			$new_pass = md5(sha1('123'));	

		

			$this->db->where('UserID', $UserID);

			$this->db->set('UserPwd', $new_pass);

			$this->db->update('usermst');

			redirect('admin/admin_user/index/'.$MENU_ID.'/success');

	}

		

	

	

	function delete($MENU_ID, $UserID)

	{

		

			$this->db->where('UserID', $UserID);

			$this->db->delete('usermst');

			redirect('admin/admin_user/index/'.$MENU_ID);

	}

	

	

	function my_profile($MENU_ID=22)

	{

		

		 $UserID = $this->session->userdata('UserID');

		 $data['dataEdit']		    = $this->master_model->masterQuery('*', 'usermst', "Where UserID = $UserID", 'order by UserID ASC');

		 $this->load->view('admin/user/my_profile',$data);

		

	}

	

	

	function cek_old_pass()
	{
		 $UserID = $this->session->userdata('UserID');
		 $password = $this->input->post('old_pass');


		 $user_pass = md5(sha1($password));	

		 $dateCheck = $this->master_model->masterQuery('Nama', 'usermst', "Where UserID = $UserID AND UserPwd = '$user_pass'", '');

		if(counter($dateCheck)==0)
		{
			echo 'false';
		}else{
			echo 'true';
		}
	}
	
	
	public function edit_profile_process($ID)
	{
		$data=array
		(
			'Nama'=>$this->input->post('nama'),
			'UserName'=>$this->input->post('username'),
			'UserPwd'=>md5(sha1($this->input->post('re_password'))),
		);
		
		$this->db->where('UserID', $ID);
		$this->db->update('usermst', $data);
		
		redirect('admin/admin_user/my_profile');
	}
	

}

?>