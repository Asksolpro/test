<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class member extends CI_Controller {
	public function __construct()
	{
		parent :: __construct();	
			$this->load->model('admin/admin_member_model', 'amm');	
			$this->load->model('admin/master_model');	
    }
	
	/*
	function index($menuid)
	{		
		$data['DataMember'] = $this->amm->getDataAllMember();
		$idAdmin = $this->session->userdata('id_member');
		if($idAdmin =='')
		{
		  redirect (base_url().'admin');
		}
		$checkMenuAccess   = $this->master_model->checkMenuAccess($menuid, $idAdmin);
		if($checkMenuAccess == false)
		{
			$this->load->view('admin/notAccessiblePage');
		}else{
	    	$this->load->view('admin/member/main', $data);
		}
	}
	*/
	
	function index($menuid)
	{		
		$data['DataMember'] = $this->amm->getDataAllMember();$idAdmin = $this->session->userdata('id_admin');
		$checkMenuAccess   = $this->master_model->checkMenuAccess($menuid, $idAdmin);
		if($checkMenuAccess == false)
		{
			
			$this->load->view('admin/notAccessiblePage');
		}else{
		  $this->load->view('admin/member/main', $data);
		}
	    //$this->load->view('admin/member/main', $data);
	}
	
	function edit_member($id_member)
	{		
		$data['DetailMember'] = $this->amm->DetailMember($id_member);
		
		$this->load->view('admin/member/edit_member', $data);
	}
	
	function delete_member($id_member)
	{
		$this->db->where('id_member', $id_member);  
		$this->db->delete('pemesanan');//nama table
		
		$this->db->where('id_member', $id_member);  
		$this->db->delete('discussion');//nama table
		
		$this->db->where('id_pemesanan', $id_member);  
		$this->db->delete('detail_pemesanan');//nama table
		
		$this->db->where('id_member', $id_member);  
		$this->db->delete('review');//nama table
		
		$this->db->where('id_member', $id_member);  
		$this->db->delete('point_member');//nama table
		
		$this->db->where('id_member', $id_member);  
		$this->db->delete('member_alamat');//nama table
		
		$this->db->where('id_member', $id_member);  
		$this->db->delete('pesan_member');//nama table
		
		$this->db->where('id_member', $id_member);  
		$this->db->delete('member');//nama table
		redirect('admin/member/index/',$id_member);
	}
	
	function updateMember($menuid, $id, $from='')
	{
		$nama 		  = $this->input->post('nama');
		//$bank     	  = $this->input->post('bank');
		//$norek   		 = $this->input->post('norek');
		//$atas_nama     = $this->input->post('atas_nama');
		$detail_member = $this->amm->DetailMember($id);
		
		$email = $detail_member[0]->email;
		$Nama_member = $detail_member[0]->nama;
		//$Bank_db = $detail_member[0]->bank;
		//$NoRek_db = $detail_member[0]->rekening;
		//$atas_nama_db = $detail_member[0]->nama_rekening;
		
		$d = array(
							'nama'      => $nama,
							//'bank'       => $bank,
							//'rekening'       => $norek,
						    //'nama_rekening'  => $atas_nama,
							);
		
		$this->db->where('id_member', $id);
		$this->db->update('member', $d);
		
		$fromEmail	= noreplay_email;
		$fromName	 = 'kotaro.tokyo';
		$toEmail	  = $email;
		$subject	  = 'Informasi perubahan data member kotaro.tokyo';
		$msg		  = "Hi, ".$nama."<br><br>
						Permintaan rubah data anda telah berhasil di proses, berikut detail perubahan data anda :<br>
						<strong>Data Lama :</strong><br>
						   <table>
								<tr>
								 <td> Nama Member </td>
								 <td>:</td>
								 <td> ".$Nama_member ."</td>
								</tr>
			                </table>
			                <br><br>
							<strong>Data Baru :</strong><br>
							<tr>
								 <td> Nama Member </td>
								 <td>:</td>
								 <td> ".$nama ."</td>
								</tr>
			                </table>	
							<br><br>
							<b>    Salam Hangat<br>
								YOUR SINCERELY
								<br><br>
								
								kotaro.tokyo<br></b>
							";
			

		  $sendEmail = $this->amm->sendEmail($fromEmail, $fromName, $toEmail, $subject, $msg);
		
		  $this->db->where('id_member', $id);
		  $this->db->delete('rubah_data');
		
		 redirect ('admin/member/index/'.$menuid);
		
        }
		
	function updateAccount($menuid, $id_member)
	{

		$id_memberGame  = $this->input->post('id');
		$idGame  = $this->input->post('id_game');
		$username       = $this->input->post('username');
		$pass           = $this->input->post('pass');
		
		$ins = array(
							'username'         => $username,
							 'password '       => $pass ,
							);
		$this->db->where('id', $id_memberGame);
		$this->db->update('member_game', $ins);
		
		$detail_member = $this->amm->DetailMember($id_member);
		
		$email = $detail_member[0]->email;
		$nama  = $detail_member[0]->nama;
		
		
		$detGames = $this->amm->DataEdit('games', $idGame);
		$namaGames = $detGames[0]->Name;
		
		$fromEmail	= noreplay_email;
		$fromName	 = 'Bolabet338';
		$toEmail	  = $email;
		$subject	  = 'Informasi perubahan Password bolabet338.net';
		$msg		  = "Hi, ".$nama."<br><br>
						Permintaan rubah password game  anda telah berhasil di proses, berikut detail perubahan data anda :<br><br>
						
						   <table>
						 
						   <tr>
								 <td>Games </td>
								 <td>:</td>
								 <td> ".$namaGames ."</td>
								</tr>
								<tr>
								 <td> Usernama / Account Betting </td>
								 <td>:</td>
								 <td> ".$username ."</td>
								</tr>
								 <tr>
								 <td> Password</td>
								 <td>:</td>
								 <td> ".$pass."</td>
								</tr>
								
			                </table>
			                <br><br>
							
							<b>   Salam Hangat<br>
								YOUR SINCERELY
								<br><br>
								
								BOLABET338.NET<br>
								YOUR PARTNER BETTING SOLUTION</b>
							";
			

		  $sendEmail = $this->amm->sendEmail($fromEmail, $fromName, $toEmail, $subject, $msg);
		
		  $this->db->where('id_member', $id_member);
		  $this->db->delete('rubah_password');
		redirect ('admin/member/edit_member/'.$menuid.'/'.$id_member);
		
        }
		
		
	
	function deposit($manuID, $sortby='DESC')
	{		
	    $idAdmin = $this->session->userdata('id_member');
		if($idAdmin =='')
		{
		  redirect (base_url().'admin');
		}
		$data['dataDeposit'] = $this->amm->getDataDeposit($sortby);
		$idAdmin = $this->session->userdata('id_member');
		$checkMenuAccess   = $this->master_model->checkMenuAccess($manuID, $idAdmin);
		if($checkMenuAccess == false)
		{
			
			$this->load->view('admin/notAccessiblePage');
		}else{
		  $this->load->view('admin/member/deposit', $data);
		}
	}
	
	
	function edit_deposit($menuid, $id_deposit)
	{		
		
		$data['DetailDeposit'] = $this->amm->DetailDeposit($id_deposit);
		
		$this->load->view('admin/member/edit_deposit', $data);
	}
	
	
	
	function updateDeposit($menuid, $id, $from='')
	{
		$admin 		= $this->input->post('useradmin');
		$acc_bett     = $this->input->post('acc_bett');
		$ubahstatus   = $this->input->post('ubahstatus');
		$notes        = $this->input->post('notes');
		$id_game      = $this->input->post('id_game');
		$id_member    = $this->input->post('id_member');
		$jumlah = $this->input->post('jumlah');
		$password = $this->input->post('password');
		
		
		
		$d = array(
							'status'      => $ubahstatus,
							'admin'       => $admin,
							'notes'       => $notes,
						    'tgl_proses'  => date('Y-m-d H:i:s'),
						    'kredit'       => $jumlah,
						    
							);
		
		$this->db->where('id', $id);
		$this->db->update('member_saldo', $d);
		
		if($ubahstatus <> 2){
		
			$cekusernameExist = $this->amm->cekusernameExist($id_game, $id_member);
			if($cekusernameExist == true)
			{
				$getid_member_game = $this->amm->getid_member_game($id_game, $id_member);
				
				$ins = array(
							'id_game'          => $id_game,
							'username'         => $acc_bett,
							'id_member'        => $id_member,
							 'password '       => $password ,
							);
				$this->db->where('id', $getid_member_game);
				$this->db->update('member_game', $ins);
			}else{
			
			  $lastID       = $this->amm->getLastID('member_game');
			  $ins = array(
							'id'	           => $lastID,
							'id_game'          => $id_game,
							'username'         => $acc_bett,
							'id_member'        => $id_member,
							 'password '       => $password ,
							);
				
				$this->db->insert('member_game', $ins);
			}
		}
		
		$getDetGames = $this->amm->DataEdit('games', $id_game);
		$namaGames =$getDetGames[0]->Name;
		
		if($ubahstatus <> 0){
		
		
				if($ubahstatus == 1)
				{
					$subject_status = 'Informasi permintaan deposit game '.$namaGames.'  disetujui';
					
				}else if($ubahstatus == 2){
					$subject_status = 'Informasi permintaan deposit game '.$namaGames.'  ditolak';
					
		                  }
				                       $GetNameMember      = $this->amm->masterQuery('email', 'member', "where id_member =$id_member");
				                       $email              =$GetNameMember[0]->email;
				
				                        $fromEmail	= noreplay_email;
										$fromName	 = 'Bolabet338';
										$toEmail	  = $email;
										$subject	  = $subject_status;
										$msg		  = $subject_status."<br>
					                 
					                                   <table>
					                                    <tr>
					                                     <td> Account Betting </td>
					                                     <td>:</td>
					                                     <td> ".$namaGames."</td>
					                                    </tr>
					                                     <tr>
					                                     <td> UserID</td>
					                                     <td>:</td>
					                                     <td> ".$acc_bett."</td>
					                                    </tr>
					                                    <tr>
					                                     <td>  Password </td>
					                                     <td>:</td>
					                                     <td> ".$password."</td>
					                                    </tr>
														  <tr>
					                                     <td>  Jumlah </td>
					                                     <td>:</td>
					                                     <td> ".$jumlah."</td>
					                                    </tr>
													
														
					                                    <tr>
										 <td>  Catatan </td>
										 <td>:</td>
										 <td> ".$notes."</td>
										</tr>
					                                  </table>
					                   
										<br><br>
										
										
										<b>    Salam Hangat<br>
								YOUR SINCERELY
								<br><br>
								
								BOLABET338.NET<br>
								YOUR PARTNER BETTING SOLUTION</b>
									";
					
		
					$sendEmail = $this->amm->sendEmail($fromEmail, $fromName, $toEmail, $subject, $msg);
			}
			
		
		if($from == 'home'){
			redirect ('admin/master_admin/master/home/'.$menuid);
		}else{
			redirect ('admin/member/deposit/'.$menuid);
		}
	}
	
	
	
	function penarikan($manuID, $sortby='DESC')
	{		
		
		$data['getDataPenarikan'] = $this->amm->getDataPenarikan($sortby);
		
		
		$idAdmin = $this->session->userdata('id_member');
		if($idAdmin =='')
		{
		  redirect (base_url().'admin');
		}
		$checkMenuAccess   = $this->master_model->checkMenuAccess($manuID, $idAdmin);
		if($checkMenuAccess == false)
		{
			
			$this->load->view('admin/notAccessiblePage');
		}else{
		   $this->load->view('admin/member/penarikan', $data);
		}
	}
	
	function edit_penarikan($manuID, $id_penarikan)
	{		
		
		$idAdmin = $this->session->userdata('id_member');
		if($idAdmin =='')
		{
		  redirect (base_url().'admin');
		}
		
		$data['DetailPenarikan'] = $this->amm->DetailPenarikan($id_penarikan);
		
		$this->load->view('admin/member/edit_penarikan', $data);
	}
	
	
	function updatePenarikan($manuID, $id, $from ='')
	{
		$admin 		= $this->input->post('useradmin');
		$acc_bett     = $this->input->post('acc_bett');
		$ubahstatus   = $this->input->post('ubahstatus');

		$notes        = $this->input->post('notes');
		$id_game      = $this->input->post('id_game');
		$id_member    = $this->input->post('id_member');
		$jumlah = $this->input->post('jumlah');
		
		$password = $this->input->post('password');
		
		$d = array(
							'status'      => $ubahstatus,
							'admin'       => $admin,
							'notes'       => $notes,
							'debet'       => $jumlah,
						    'tgl_proses'  => date('Y-m-d H:i:s'),
							);
		
		$this->db->where('id', $id);
		$this->db->update('member_saldo', $d);
		
		
		
		if($ubahstatus <> 2){
			$cekusernameExist = $this->amm->cekusernameExist($id_game, $id_member);
			if($cekusernameExist == true)
			{
				$getid_member_game = $this->amm->getid_member_game($id_game, $id_member);
				
				$ins = array(
							'id_game'          => $id_game,
							'username'         => $acc_bett,
							'id_member'        => $id_member,
							 'password '       => $password ,
							
							);
				$this->db->where('id', $getid_member_game);
				$this->db->update('member_game', $ins);
			}else{
			   $lastID       = $this->amm->getLastID('member_game');
			   $ins = array(
							'id'	           => $lastID,
							'id_game'          => $id_game,
							'username'         => $acc_bett,
							'id_member'        => $id_member,
							 'password '       => $password ,
							
							);
				$this->db->insert('member_game', $ins);
			}
		}
		         $GetNameMember      = $this->amm->masterQuery('email', 'member', "where id_member =$id_member");
		         $email              =$GetNameMember[0]->email;
		         
		         $getDetGames = $this->amm->DataEdit('games', $id_game);
		$namaGames =$getDetGames[0]->Name;
		         
		         if($ubahstatus <> 0){
							   
				if($ubahstatus == 1)
				{
					$subject_status = 'Informasi permintaan Penarikan game '.$namaGames.'  disetujui';
					
				}else if($ubahstatus == 2){
					$subject_status = 'Informasi permintaaan Penarikan game '.$namaGames.'  ditolak';
					
				}
		
					$fromEmail	= noreplay_email;
					$fromName	 = 'Bolabet338';
					$toEmail	  = $email;
					$subject	  = $subject_status;
			        $msg		  = $subject_status."<br>
			                 
			                                   <table>
			                                    <tr>
			                                     <td> Account Betting </td>
			                                     <td>:</td>
			                                     <td> ".$namaGames ."</td>
			                                    </tr>
			                                     <tr>
			                                     <td> UserID</td>
			                                     <td>:</td>
			                                     <td> ".$acc_bett."</td>
			                                    </tr>
			                                     
			                                      <tr>
			                                     <td>  Password </td>
			                                     <td>:</td>
			                                     <td> ".$password."</td>
			                                    </tr>
			                                    <tr>
								 <td>  Catatan </td>
								 <td>:</td>
								 <td> ".$notes."</td>
								</tr>
								<tr>
								<td>  Jumlah </td>
								 <td>:</td>
								 <td> ".$jumlah."</td>
								</tr>
								
								
			                                  </table>
			                   
								<br><br>
								
								
								<b>    Salam Hangat<br>
								YOUR SINCERELY
								<br><br>
								
								BOLABET338.NET<br>
								YOUR PARTNER BETTING SOLUTION</b>
							";
			
}
			$sendEmail = $this->amm->sendEmail($fromEmail, $fromName, $toEmail, $subject, $msg);
		
		if($from == 'home'){
			redirect ('admin/master_admin/master/home/'.$menuid);
		}else{
		 redirect ('admin/member/penarikan/'.$manuID);
		 }
	}
	
	
	function transfer($manuID, $sortby='DESC')
	{		
		 $data['dataTransfer'] = $this->amm->getDataTransfer($sortby);
		$idAdmin = $this->session->userdata('id_member');
		if($idAdmin =='')
		{
		  redirect (base_url().'admin');
		}
		$checkMenuAccess   = $this->master_model->checkMenuAccess($manuID, $idAdmin);
		if($checkMenuAccess == false)
		{
			
			$this->load->view('admin/notAccessiblePage');
		}else{
		   $this->load->view('admin/member/transfer', $data);
		}
	}
	
	
	function edit_transfer($manuID, $id_penarikan)
	{		
		$idAdmin = $this->session->userdata('id_member');
		if($idAdmin =='')
		{
		  redirect (base_url().'admin');
		}
		$data['DetailTransfer'] = $this->amm->DetailTransfer($id_penarikan);
		
		$this->load->view('admin/member/edit_transfer', $data);
	}
	
	function updateTransfer($manuID, $id, $from ='')
	{
		
		$admin 			   = $this->input->post('useradmin');
		$acc_bett     		= $this->input->post('acc_bett');
		$ubahstatus  		  = $this->input->post('ubahstatus');
		$notes       		   = $this->input->post('notes');
		$id_game      		 = $this->input->post('id_game');
		$id_member    	   = $this->input->post('id_member');
		$id_game_target      = $this->input->post('id_game_target');
		$acc_bett_target     		= $this->input->post('acc_bett_target');
		$jumlah = $this->input->post('jumlah');
		$password = $this->input->post('password');
		$id_memberGameTrnf = $this->input->post('id_memberGameTrnf');
		
		$d = array(
							'status'      => $ubahstatus,
							'admin'       => $admin,
							'notes'       => $notes,
						    'tgl_proses'  => date('Y-m-d H:i:s'),
						    'debet'       => $jumlah,
							);
		
		$this->db->where('id', $id);
		$this->db->update('member_saldo', $d);
		
		$d2 = array(
							'status'      => $ubahstatus,
							'admin'       => $admin,
							'notes'       => $notes,
						    'tgl_proses'  => date('Y-m-d H:i:s'),
						    'kredit'       => $jumlah,
							);
		
		$this->db->where('id', $id+1);
		$this->db->update('member_saldo', $d2);
		if($id_memberGameTrnf == '')
			{
			
			         if($ubahstatus == 1){//kalau di approve , bikin datanya ke database
				     $lastID = $this->amm->getLastID('member_game');
					
					      $ins = array(
									'id'	           => $lastID,
									'id_game'          => $id_game_target,
									'username'         => $acc_bett_target,
									'id_member'        => $id_member,
									 'password '       => $password ,
									);
						$this->db->insert('member_game', $ins);
					
				 }
			}else{
			  $ins = array(
								
								'id_game'          => $id_game_target,
								'username'         => $acc_bett_target,
								'id_member'        => $id_member,
								 'password '       => $password ,
								);
						//exit;		
						$this->db->where('id', $id_memberGameTrnf);
						$this->db->update('member_game', $ins);
			}
					
		
		 $GetNameMember      = $this->amm->masterQuery('email', 'member', "where id_member =$id_member");
		 $email              =$GetNameMember[0]->email;
		 
		  $getDetGames = $this->amm->DataEdit('games', $id_game_target);
		$namaGames =$getDetGames[0]->Name;
		
		if($ubahstatus <> 0){
	        	         if($ubahstatus == 1)
				{
					$subject_status = 'Informasi Transfer game '.$acc_bett.' di setujui';
					
				}else if($ubahstatus == 2){
					$subject_status = 'Informasi Transfer game '.$namaGames.' ditolak';
					
				}
					$fromEmail	= noreplay_email;
					$fromName	 = 'Bolabet338';
					$toEmail	  = $email;
					$subject	  = $subject_status;
			                 $msg		  = $subject_status."<br>
			                 
			                                   <table>
			                                    <tr>
			                                     <td> Account Betting </td>
			                                     <td>:</td>
			                                     <td> ".$namaGames ."</td>
			                                    </tr>
			                                     <tr>
			                                     <td> UserID</td>
			                                     <td>:</td>
			                                     <td> ".$acc_bett_target."</td>
			                                    </tr>
			                                     
			                                      <tr>
			                                     <td>  Password </td>
			                                     <td>:</td>
			                                     <td> ".$password."</td>
			                                    </tr>
							<tr>
			                                     <td> Jumlah </td>
			                                     <td>:</td>
			                                     <td> ".$jumlah."</td>
			                                    </tr>
								<tr>
								 <td>  Catatan </td>
								 <td>:</td>
								 <td> ".$notes."</td>
								</tr>
			                                     
			                                  </table>
			                   
								<br><br>
								
							<b>    Salam Hangat<br>
								YOUR SINCERELY
								<br><br>
								
								BOLABET338.NET<br>
								YOUR PARTNER BETTING SOLUTION</b>
							";
							
			

			$sendEmail = $this->amm->sendEmail($fromEmail, $fromName, $toEmail, $subject, $msg);
			}
		if($from == 'home'){
			redirect ('admin/master_admin/master/home/'.$manuID);
		}else{
		redirect ('admin/member/transfer/'.$manuID);
		}
	}
	
	
	
	
	function report($manuID)
	{		
	 $idAdmin = $this->session->userdata('id_member');
		if($idAdmin =='')
		{
		  redirect (base_url().'admin');
		}
		
	   $n = 1;
	   $prevN = mktime(0, 0, 0, date("m") - $n, date("d"), date("Y"));
	   $tgl_dari = date('d-m-Y', $prevN);//tgl_sebulan lalu
	   $tgl_sampai = date('d-m-Y');//tgl_hari ini
	
		$dataReport = $this->amm->searchReportMember(1, 0, 1, 5, $tgl_dari, $tgl_sampai);
		$data['DataMemberReport'] = $dataReport;
		$idAdmin = $this->session->userdata('id_member');
		if($idAdmin == '')
		{
			redirect(base_url().'admin');
		}
		$checkMenuAccess   = $this->master_model->checkMenuAccess($manuID, $idAdmin);
		if($checkMenuAccess == false)
		{
			
			$this->load->view('admin/notAccessiblePage');
		}else{
		  $this->load->view('admin/member/report', $data);
		}
	}
	
	function searchMemberReport()
	{	
        //$MemberID_a     = $this->session->userdata('memberID');
        
        
		$GamesID_a      = $this->session->userdata('id_games');
		$AdminID_a      = $this->session->userdata('admin');
		$id_transaksi_a = $this->session->userdata('id_transaksi');
		
		$tgl_dr_a       = $this->session->userdata('tgl_dari');
		$tgl_smpe_a     = $this->session->userdata('tgl_sampai');
		
		
		$newdata_a = array(
		   // 'memberID'=>$MemberID_a,
			'id_games'=>$GamesID_a,
			'admin'=>$AdminID_a,
			'id_transaksi'=>$id_transaksi_a,
			
			'tgl_dr'=>$tgl_dr_a,
			'tgl_sm'=>$tgl_smpe_a,
			
		);
		
		$this->session->unset_userdata($newdata_a);
			
		//$id_member    = $this->input->post('member');
		$id_games     = $this->input->post('games');
		$admin        = $this->input->post('admin');
		$id_transaksi = $this->input->post('jenis_transaksi');
		
		$tgl_dari = $this->input->post('tgl_dari');
		$tgl_sampai = $this->input->post('tgl_sampai');
		
		
		
		$tgl_dari =date('Y-m-d', strtotime($tgl_dari));
		$tgl_sampai =date('Y-m-d', strtotime($tgl_sampai));
		
		
		$newdata = array(
		   // 'memberID'=>$id_member,
			'id_games'=>$id_games,
			'admin'=>$admin,
			'id_transaksi'=>$id_transaksi,
			
			'tgl_dr'=>$tgl_dari,
			'tgl_sm'=>$tgl_sampai,
			
		);
		
		$this->session->set_userdata($newdata);
		
		/*$tglhariini = date('Y-m-d');
		$tglblnlalu = $this->mst_mod->adddate($tglhariini, "-30 day");
		
		$histCust =  $this->mst_mod->masterQuery("*","sales_order","WHERE tanggal >= $tglblnlalu AND tanggal < DATE_ADD('$tglhariini', INTERVAL 1 DAY)  AND id_customer = $id","order by tanggal ASC limit $limit offset $offset");
		$histCustNum =  $this->mst_mod->masterQuery("*","sales_order","WHERE tanggal >= $tglblnlalu AND tanggal < DATE_ADD('$tglhariini', INTERVAL 1 DAY) AND id_customer = $id","order by tanggal ASC");
		$num            = count($histCustNum);
		*/
		$dataReport = $this->amm->searchReportMember($id_games, $admin, $id_transaksi, $tgl_dari, $tgl_sampai );
		$data['DataMemberReport'] = $dataReport;
		
		$this->load->view('admin/member/report', $data);
	}
	
	
	function ajaxGetDetMember()
	{	
	    $id_member = $this->input->get('id_member');	
	    
	    if($id_member <> 0){
	    
		$detailMember = $this->amm->masterQuery('*', 'member', "where id_member = $id_member", '');
	
		echo 
          '<table width="500">
			<tr height="25" style="background:#FFF">
			 <td width="150">Email</td>
			 <td width="10">:</td>
			 <td>'.$detailMember[0]->email.'</td>
			</tr>
			<tr height="25"  style="background:#FFF">
			 <td>Nama Bank</td>
			 <td>:</td>
			 <td>'.$detailMember[0]->bank.'</td>
			</tr>
			<tr height="25"  style="background:#FFF">
			 <td>Nama Rekening</td>
			 <td>:</td>
			 <td>'.$detailMember[0]->nama_rekening.'</td>
			</tr>
			<tr height="25"  style="background:#FFF">
			 <td>No Rekening</td>
			 <td>:</td>
			 <td>'.$detailMember[0]->rekening.'</td>
			</tr>
		  </table> ';
		  }else{
		  
		echo 
          '<table width="500">
			<tr height="25" style="background:#FFF">
			 <td width="150">Email</td>
			 <td width="10">:</td>
			 <td></td>
			</tr>
			<tr height="25"  style="background:#FFF">
			 <td>Nama Bank</td>
			 <td>:</td>
			 <td></td>
			</tr>
			<tr height="25"  style="background:#FFF">
			 <td>Nama Rekening</td>
			 <td>:</td>
			 <td></td>
			</tr>
			<tr height="25"  style="background:#FFF">
			 <td>No Rekening</td>
			 <td>:</td>
			 <td></td>
			</tr>
		  </table> ';
		 }
	}
	
	
	function kalkulasi($manuID)
	{		
		$idAdmin = $this->session->userdata('id_member');
		if($idAdmin =='')
		{
		  redirect (base_url().'admin');
		}
		$getKalkulasiMember = $this->amm->masterQuery('*', 'member_saldo', "where  status = 1" , 'order by tgl_submit ASC');
        $data['MemberKalkulasi'] = $getKalkulasiMember;
		
		
		$checkMenuAccess   = $this->master_model->checkMenuAccess($manuID, $idAdmin);
		if($checkMenuAccess == false)
		{
			
			$this->load->view('admin/notAccessiblePage');
		}else{
		  $this->load->view('admin/member/kalkulasi', $data);
		}
	}
	
	function SearchKalkulasiMember()
	{		
		$id_games = $this->input->post('games');
		$id_member = $this->input->post('member');
		
		//print_array($this->session->userdata);
		//exit;
		
		if($id_member == '')
		{
		  $id_member =  $this->session->userdata('idm'); //id_member
		  $id_games     = $this->session->userdata('idg');//id_games
	        }
		
		
	        $idm     = $this->session->userdata('idm'); //id_member
		$idg     = $this->session->userdata('idg');//id_games
		
		
		 $newdata_a = array(
		    'idm'=>$idm,
	            'idg'=>$idg,
		);
		
		$this->session->unset_userdata($newdata_a);
								
		$newdata = array(
		    'idm'=>$id_member,
			'idg'=>$id_games,
		);
		
		$this->session->set_userdata($newdata);
		
		 $getKalkulasiMember = $this->amm->masterQuery('*', 'member_saldo', "where id_member = $id_member and id_game = $id_games and status = 1" , 'order by tgl_submit ASC');
		$num = count($getKalkulasiMember);
		if($num == 0)
		{
		  $getKalkulasiMember = $this->amm->masterQuery('*', 'member', "where id_member = $id_member", '');
	
		}
		echo $num;
	   $data['MemberKalkulasi'] = $getKalkulasiMember;
	   $data['num_kalkulasi'] =$num;
		
		$this->load->view('admin/member/kalkulasi', $data);
	}
	
	function ajaxUpdatewinLose()
	{
		$idm     = $this->session->userdata('idm'); //id_member
		$idg     = $this->session->userdata('idg');//id_games
		
		$GetNameMember = $this->amm->masterQuery('nama', 'member', "where id_member =$idm");
		$GetNameGames  = $this->amm->masterQuery('Name', 'games', "where id =$idg");
		
	echo'
	
	  
		   <table>
		  
		   <tr height="30" style="background:#FFF">
			 <td width="100">Nama member</td>
			 <td width="10">:</td>
			 <td>'.$GetNameMember[0]->nama.'
			   <input type="hidden" name="id_member" value="'.$idm.'" />
			 </td>
			</tr>
			<tr height="30" style="background:#FFF">
			 <td width="100">Nama Game</td>
			 <td width="10">:</td>
			 <td>'.$GetNameGames[0]->Name.'
			 <input type="hidden" name="id_game" value="'.$idg.'" />
			 </td>
			</tr>
			 <tr height="30" style="background:#FFF">
			 <td>Transaksi</td>
			 <td>:</td>
			 <td><input type="radio" name="winlose" checked="checked" value="5" />+ WIN  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 <input type="radio" name="winlose" value="6" />- LOSE</td>
			</tr>
			 <tr height="30" style="background:#FFF">
			 <td>Nominal</td>
			 <td>:</td>
			 <td><input type="text" name="nominal" style="width:200px; height:20px"//></td>
			</tr>
			 <tr style="background:#FFF">
			 <td>Notes</td>
			 <td>:</td>
			 <td valign="top" ><textarea name="notes" style="width:200px; height:80px"></textarea></td>
			</tr>
			<tr style="background:#FFF">
			 <td></td>
			 <td></td>
			 <td>  <br /><input type="submit" class="button green close" value="SUBMIT" />
			 </td>
			</tr>
		   </table>
			</form>';
	}
	
	
	function updateWinLose($menuid)
	{		
		$tgl       = $this->input->post('tgl');
		$id_member = $this->input->post('id_member');
		$id_game = $this->input->post('id_game');
		$winlose = $this->input->post('winlose');
		$nominal = $this->input->post('nominal');
		$notes = $this->input->post('notes');
		$username = $this->session->userdata('username');
		
		if($winlose == 5){
			$debet ='';
			$kredit=$nominal;
		}else{
			$debet = $nominal;
			$kredit ='';
		}
		$jam = date('H:i:s');
		 $datetime = $tgl.' '.$jam;
		
		
		$lastID = $this->amm->getLastID('member_saldo');
		
		 $ins = array(
								'id'	           => $lastID,
								'id_member'        => $id_member,
								'id_game' 		  => $id_game,
								'kode_unik'        => '',
								'id_transaksi'     => $winlose,
								'debet'			=> $debet,
								'kredit'		   => $kredit,
								'tgl_submit'      => $datetime,
								'admin' 			=>$username,
								'tgl_proses' 		=> $datetime,
								'notes' 		=>$notes,
								'status'			=>1
								);
					
					$this->db->insert('member_saldo', $ins);
			
		
		redirect('admin/member/SearchKalkulasiMember/'.$menuid);
	}
	
	function prosesEditWinLost($menuid, $id)
	{		
		$tgl       = $this->input->post('tgl');
		$id_member = $this->input->post('id_member');
		$id_game = $this->input->post('id_game');
		$winlose = $this->input->post('winlose');
		$nominal = $this->input->post('nominal');
		$notes = $this->input->post('notes');
		$username = $this->session->userdata('username');
		
		if($winlose == 5){
			$debet =$nominal;
			$kredit='';
		}else{
			$debet ='';
			$kredit = $nominal;
		}
		$jam = date('H:i:s');
		 $ins = array(
						'id_member'        => $id_member,
						'id_game' 		  => $id_game,
						'kode_unik'        => '',
						'id_transaksi'     => $winlose,
						'debet'			=> $debet,
						'kredit'		   => $kredit,
						'tgl_submit'      => $tgl . $jam,
						'admin' 			=>$username,
						'tgl_proses' 		=> $tgl . $jam,
						'notes' 		=>$notes,
						'status'			=>1
						);
				
				$this->db->where('id', $id);
				$this->db->update('member_saldo', $ins);
		
		redirect('admin/member/kalkulasi/'.$menuid);
	}
	
	
	
	function edit_data_member()
	{		
		$this->load->view('admin/member/edit_data_member');
	}
	
	function editWinLose($menuid, $id)
	{		
	  
	  $data['dataEdit'] =$this->amm->DataEdit('member_saldo', $id);
	  
	  $this->load->view('admin/member/edit_winlose', $data);
	}
	
	
	function export_to_excel($transaksi)
	{
		
	    $header = '';
	    $data ='';
		$date =date('H:i:s');
		
		if($transaksi == 'deposit'){
			$select = "SELECT  a.tgl_submit AS Tanggal_Submit, c.`nama` AS Nama_User, a.`kredit` AS Jumlah, a.`Bank`, 
a.`atas_nama` AS Nama_Rekening, a.`no_rek` AS No_Rekening, 
a.`kode_transaksi` AS Kode_Transaksi, b.`Name` AS Account_Betting, 
e.`username` AS User_Betting, a.`admin`, CASE WHEN a.status = '0' THEN 'Pengajuan' WHEN a.status = '1' THEN 'Approve' ELSE 'Tolak' END AS Status_Transkasi, a.`tgl_proses` AS Tanggal_Proses  
						FROM member_saldo a 
						LEFT JOIN games b ON a.`id_game` = b.`id` 
						LEFT JOIN member c ON a.`id_member` = c.`id_member`
						LEFT JOIN master_transaksi d ON a.`id_transaksi` = d.`id_transaksi` 
						LEFT JOIN member_game e ON a.`id_member` = e.`id_member`
						WHERE a.`id_transaksi` = 1
						GROUP BY a.`no_rek` ORDER BY a.`tgl_submit` ASC";
						
		}else if($transaksi == 'penarikan'){
			$select = "SELECT  a.tgl_submit AS Tanggal_Submit, c.`nama` AS Nama_User, a.`debet` AS Jumlah, a.`Bank`, 
						a.`atas_nama` AS Nama_Rekening, a.`no_rek` AS No_Rekening, b.`Name` AS Account_Betting, 
						e.`username` AS User_Betting, a.`admin`, 
						CASE WHEN a.status = '0' THEN 'Pengajuan' WHEN a.status = '1' THEN 'Approve' ELSE 'Tolak' END AS Status_Transkasi, a.`tgl_proses` AS Tanggal_Proses 
						FROM member_saldo a 
						LEFT JOIN games b ON a.`id_game` = b.`id` 
						LEFT JOIN member c ON a.`id_member` = c.`id_member`
						LEFT JOIN master_transaksi d ON a.`id_transaksi` = d.`id_transaksi` 
						LEFT JOIN member_game e ON a.`id_member` = e.`id_member`
						WHERE a.`id_transaksi` = 2
						GROUP BY a.`no_rek` ORDER BY a.`tgl_submit` ASC";
						
		}else if($transaksi == 'report'){
			
				$id_games= $this->session->userdata('id_games');
				$admin= $this->session->userdata('admin');
				$id_transaksi= $this->session->userdata('id_transaksi');
				
				$tgl_dari= $this->session->userdata('tgl_dr');
				$tgl_sampai = $this->session->userdata('tgl_sm');
				
				$andAdmin = '';
				if($admin <> '0'){
					$andAdmin =  "AND a.admin = '$admin'";
				}
				$andJenisTrans = '';
				if($id_transaksi <> '0'){
					$andJenisTrans =  "AND a.id_transaksi = $id_transaksi";
				}
				$Games = '';
				if($id_games <> '0'){
					$Games =  "AND a.id_game = '$id_games'";
				}
		
				$tgl_dr = date('Y-m-d', strtotime($tgl_dari));
				$tgl_smp = date('Y-m-d', strtotime($tgl_sampai));
			
			  $select = "SELECT d.`jenis_transaksi`, a.`tgl_submit`, a.`tgl_proses`,  c.`email`, b.`Name` AS Account_Betting, e.`username` AS User_Betting, 
				CASE WHEN a.status = '0' THEN 'Pengajuan' WHEN a.status = '1' THEN 'Approve' ELSE 'Tolak' END AS Status_Transkasi, a.admin
				FROM member_saldo a 
				LEFT JOIN games b ON a.`id_game` = b.`id`
				LEFT JOIN member c ON a.`id_member`= c.`id_member`
				LEFT JOIN master_transaksi d ON a.`id_transaksi` = d.`id_transaksi`
				LEFT JOIN member_game e ON a.`id_member` = e.`id_member`
				WHERE tgl_proses >= '$tgl_dr' AND tgl_proses < DATE_ADD('$tgl_smp', INTERVAL 1 DAY) 
				$Games $andJenisTrans  $andAdmin GROUP BY a.tgl_submit ORDER BY a.id DESC";
		}else if($transaksi == 'kalkulasi'){
			$id_member    = $this->session->userdata('idm'); //id_member
		    $id_games     = $this->session->userdata('idg');//id_games
			$select =  "SELECT a.tgl_proses, b.`jenis_transaksi`,a.kredit,  a.debet, a.admin 
						FROM member_saldo a
						LEFT JOIN master_transaksi b ON a.`id_transaksi` = b.`id_transaksi`
						WHERE id_member = $id_member AND id_game = $id_games AND STATUS = 1 ORDER BY tgl_submit ASC";
				
		}else{
			$select = "SELECT  c.`nama`, d.`jenis_transaksi`, b.`Name` AS ACC_Betting, e.`username` AS User_Betting, a.debet,
						 a.kredit, a.tgl_submit, a.`Bank`, a.no_rek, a.`atas_nama`, a.`admin`, a.`bank_target`
						FROM member_saldo a
						LEFT JOIN games b ON a.`id_game` = b.`id` 
						LEFT JOIN member c ON a.`id_member` = c.`id_member`
						LEFT JOIN master_transaksi d ON a.`id_transaksi` = d.`id_transaksi` 
						LEFT JOIN member_game e ON a.`id_member` = e.`id_member`
						WHERE a.`id_transaksi` = a.`id_transaksi` 
						AND  a.`id_game` = $id_game
						AND a.`id_member` = $id_member 
						GROUP BY a.`no_rek` ORDER BY a.`tgl_submit` ASC ";
		}
		
		$export = mysql_query($select);
        $fields = mysql_num_fields($export);
		
		/*$export = $this->db->query($select);
		$num = $export->num_rows();*/
		
		
		for ($i = 0; $i < $fields; $i++) {
			$header .= mysql_field_name($export, $i) . "\t";
			}
			while($row = mysql_fetch_row($export)) {
			$line = '';
				foreach($row as $value) { 
				if ((!isset($value)) OR ($value == "")) {
					$value = "\t";
				} else {
					$value = str_replace('"', '""', $value);
					$value = '"' . $value . '"' . "\t";
				}
			   $line .= $value;
			}
			$data .= trim($line)."\n";
		}
		    $data = str_replace("\r","",$data);
			if ($data == "") {
			  $data = "n(0) Records Found!\n"; 
			} 
			
			header("Content-type: application/x-msdownload");
			//Penamaan file hasil export data
			header("Content-Disposition: attachment; filename= ".$transaksi. $date.".xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			print "$header\n$data";
			
			//header("Location: member/transfer.php");
      }
      
      
	 public function makepdf($transaksi)
	 {
		$data['dataPemesanan'] = $this->amm->getDataPemesanan(); 
		
		$this->load->view('admin/member/makepdf', $data);
		
	 }
	 
	 public function print_data($transaksi)
	 {
		$data['dataDeposit'] = $this->amm->getDataDeposit('DESC'); 
		$data['dataPenarikan'] = $this->amm->getDataPenarikan('DESC');
		$data['dataTransfer'] = $this->amm->getDataTransfer('DESC');
		if($transaksi ==1){
		    $this->load->view('admin/member/printdeposit', $data);
		}else if($transaksi==2){
			$this->load->view('admin/member/printpenarikan', $data);
		}else{
		   $this->load->view('admin/member/printtransfer', $data);
		
		}
	 }
	 
	 public function makepdf_report()
	 {
		$id_games= $this->session->userdata('id_games');
		$admin= $this->session->userdata('admin');
		$id_transaksi= $this->session->userdata('id_transaksi');
		
		$tgl_dari= $this->session->userdata('tgl_dr');
		$tgl_sampai = $this->session->userdata('tgl_sm');
		
		$dataReport = $this->amm->searchReportMember($id_games, $admin, $id_transaksi, $tgl_dari, $tgl_sampai );
		$data['DataMemberReport'] = $dataReport;
		
		//print_array($data['DataMemberReport']);
		
		$this->load->view('admin/member/pdfreport', $data);
		
		
	 }
	 
	 public function print_data_report()
	 {
		$id_games= $this->session->userdata('id_games');
		$admin= $this->session->userdata('admin');
		$id_transaksi= $this->session->userdata('id_transaksi');
		
		$tgl_dari= $this->session->userdata('tgl_dr');
		$tgl_sampai = $this->session->userdata('tgl_sm');
		
		$dataReport = $this->amm->searchReportMember($id_games, $admin, $id_transaksi, $tgl_dari, $tgl_sampai );
		$data['DataMemberReport'] = $dataReport;
		
		//print_array($data['DataMemberReport']);
		
		$this->load->view('admin/member/print_data_report', $data);
		
		
	 }
	 
	 public function makepdf_kalkulasi()
	 {
		
		  $id_member =  $this->session->userdata('idm'); //id_member
		  $id_games     = $this->session->userdata('idg');//id_games
	     
		 $getKalkulasiMember = $this->amm->masterQuery('*', 'member_saldo', "where id_member = $id_member and id_game = $id_games and status = 1" , 'order by tgl_submit ASC');
		 $num = count($getKalkulasiMember);
		 if($num == 0){
		  $getKalkulasiMember = $this->amm->masterQuery('*', 'member', "where id_member = $id_member", '');
	     }
		
		   $data['MemberKalkulasi'] = $getKalkulasiMember;
		   $data['num'] =$num;
		
		//print_array($data['MemberKalkulasi']);
		//exit;
		
		$this->load->view('admin/member/pdfkalkulasi', $data);
		
	 }
	 
	 public function print_kalkulasi()
	 {
		
		  $id_member =  $this->session->userdata('idm'); //id_member
		  $id_games     = $this->session->userdata('idg');//id_games
	     
		 $getKalkulasiMember = $this->amm->masterQuery('*', 'member_saldo', "where id_member = $id_member and id_game = $id_games and status = 1" , 'order by tgl_submit ASC');
		 $num = count($getKalkulasiMember);
		 if($num == 0){
		  $getKalkulasiMember = $this->amm->masterQuery('*', 'member', "where id_member = $id_member", '');
	     }
		
		   $data['MemberKalkulasi'] = $getKalkulasiMember;
		   $data['num'] =$num;
		
		//print_array($data['MemberKalkulasi']);
		//exit;
		
		$this->load->view('admin/member/print_kalkulasi', $data);
		
		
	 }
	 
	 
	 function changeActiveStatus($id_member, $status)
	{
		if($status==0)
		{
			$this->db->where('id_member', $id_member);
			$this->db->set('fg_member','1');
			$this->db->update('member');
		}
		else
		{
			$this->db->where('id_member', $id_member);
			$this->db->set('fg_member','0');
			$this->db->update('member');
		}
		
		redirect('admin/member');
	}
	 
	
	
}
?>