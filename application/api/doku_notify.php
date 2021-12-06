<?php

include(SITE_URI.'application/controllers/authcontroller'.EXT);

class Doku_notify extends authcontroller
{
	function __construct()
	{
        parent::__construct();
		$this->load->model('main/front_model', 'fm');
		$this->load->model('admin/admin_point_model', 'apm');
	}
	
	
	function index()
	{
		$status         = $this->input->post('RESULTMSG');
		$invoice        = $this->input->post('TRANSIDMERCHANT');
		if($invoice <>'') {
			$order_number = $invoice;
		}else{
			$order_number = '0';
		}	
		$getDatadoku  = $this->getData($order_number);
	    $response_code  = $this->input->post('RESPONSECODE');
			

            if (!$getDatadoku) {
				// klo dari dokunya ga berhasil atau tidak ada respon apa2
		        echo 'Stop1';
		    }else{
				if($status == "SUCCESS")
				{
					// klo dari dokunya berhasil
					$doUpdate =$this->update_doku($order_number);
					if(!$doUpdate){  echo 'Stop2';} // klo proses updatenya ke table doku ga berhasil maka doku akan mengentikan proses (ga brerhasil)
						
					$this->updateBooking($order_number);	
					$this->purchaseConfirmation($order_number);
					$this->send_booking($order_number, $cardnumber);
					$this->apm->insert_point_member($order_number);
			
				}else{
					// klo dari doku nya ga berhasil/ failed maka update status  jadi failed di table kita
					 $sql = "UPDATE doku set trxstatus='Failed', response_code = '$response_code' where transidmerchant='".$order_number."'";
					 $this->db->query($sql);
					 echo 'Stop3';
				}
			echo 'Continue'; // klo semua berhasil dengan baik maka lempar keterangan ke doku dengan contue
		 }

	}



	private function update_doku($order_number)
	{
		   $status         = $this->input->post('RESULTMSG');
		   $paymentcode 	= $this->input->post('PAYMENTCODE');
		   $payment_date_time = $this->input->post('PAYMENTDATETIME');
		   $tgl_payment = date('Y-m-d H:i:s', strtotime($payment_date_time ));
		   if($paymentcode==''){$paymentcode =0; }
		   $totalamount 	= $this->input->post('AMOUNT');
		   $words    	  = $this->input->post('WORDS');
		   $statustype 	 = $this->input->post('STATUSTYPE');
		   $response_code  = $this->input->post('RESPONSECODE');
		   $approvalcode   = $this->input->post('APPROVALCODE');
		   $paymentchannel = $this->input->post('PAYMENTCHANNEL');			  			  
		   $session_id 	 = $this->input->post('SESSIONID');
		   $bank_issuer 	= $this->input->post('BANK');
		   $cardnumber 	 = $this->input->post('MCN');
		   $verifyid 	   = $this->input->post('VERIFYID');
		   $verifyscore 	= $this->input->post('VERIFYSCORE');
		   $verifystatus   = $this->input->post('VERIFYSTATUS');

			  $dataUpdate = array(
				 'trxstatus' => 'Success',
				 'words'      => $words,
				 'statustype'=>$statustype,
				 'response_code'=>$response_code,
				 'approvalcode'=>$approvalcode,				
				 'payment_channel'=>$paymentchannel,
				 'paymentcode'=>$paymentcode,
				 'session_id'=>$session_id,
				 'bank_issuer'=>$bank_issuer,
				 'creditcard'=>$cardnumber,
				 'payment_date_time'=>$tgl_payment , 
				 'verifyid'=>$verifyid, 
				 'verifyscore'=>$verifyscore, 
				 'verifystatus'=>$verifystatus,
			  );
			
			$this->db->where('transidmerchant', $order_number);
			$up = $this->db->update('doku',$dataUpdate);
			return $up ;

	  }


	  function updateBooking($order_number)
	  {
			$sql = "UPDATE booking set status = 3 where booking_code = '$order_number'";
			$qry= $this->db->query($sql);	
		   
		   return true;
	  }
	  
	  
	  // melakukan proses konfirmasi ke hotelbeds jika itu adalah pemesanan kamar hotelbes
	  function purchaseConfirmation($order_number)
	  {
		    // cek api . apakah dari hotelbeds atau dari hotel lokal
		    $cekApi = $this->cekApi($order_number);
			$cekStatus = $this->cekStatusBookingHB($order_number);
			
			if($cekApi==true && $cekStatus==1)
			{
				$tokenSpui = $this->getTokenSpui($order_number);
				$dataToken = $tokenSpui[0]->token;
				
				$explode = explode("/", $dataToken);
				$token = $explode[0];
				$spui  = $explode[1];
				
				$this->hotelbedsConfirmation($token, $spui,$order_number);
				
			}
		   
		   return true;
	  }

	function cekApi($order_number) //cek api, apakah pemesanan dari hotelbeds atau dari hotel lokal
	{
	
		$sql = "select api from booking where booking_code = '$order_number' ";
		$qry = $this->db->query($sql);
		$row = $qry->result();
		
		$api = $row[0]->api;
		if($api=='hotelbeds')
		{
			return true;
		}else{
			return false;
		}
		
	}
	
	function cekStatusBookingHB($order_number) //cek status booking di tabel hb_detail_booking apakaha sudah 2 atau masih 1
	{
	
		$sql = "select status from hb_detail_booking where booking_code = '$order_number' ";
		$qry = $this->db->query($sql);
		$row = $qry->result();
		
		$status = $row[0]->status;
			return $status;
		
	}
	
	
	
	
	function getTokenSpui($order_number) //ambil token dan spui
	{
	
		$sql = "select token from hb_detail_booking where booking_code = '$order_number' ";
		$qry = $this->db->query($sql);
		$row = $qry->result();
		
		return $row;
		
	}
	
	function getNamaPemesan($order_number) //ambil token dan spui
	{
	
		$sql = "select b.name from booking a left join member b on a.id_member = b.id_member where booking_code ='$order_number'  ";
		$qry = $this->db->query($sql);
		$row = $qry->result();
		$membername = $row[0]->name;
		
		return $membername;
		
	}
	
	
	function hotelbedsConfirmation($token, $spui, $booking_code)
	{
	    $name = $this->getNamaPemesan($booking_code);
		
		$EncodeData    = base64_encode($token.'/'.$spui.'/'.$name.'/'.$booking_code);
	    $uri           = "http://www.dbudget.net/hotelbeds/PurchaseConfirmRQ.php?dataparse=$EncodeData";	 			
		$return        = $this->fm->grabURL($uri,false);
		$DetPurchase   = json_decode($return);			
		$xml           = simplexml_load_string($DetPurchase);
	
		$Purchase       = $xml->Purchase;
		$Reference      = $Purchase->Reference;
		$FileNumber     = trim($Reference->FileNumber);
		$IncomingOffice = $Reference->IncomingOffice;
		$purchaseToken  = $this->fm->xml_attribute($Purchase, 'purchaseToken');
		$refCode        = $this->fm->xml_attribute($IncomingOffice, 'code');	
		$Status         = $Purchase->Status;
		$TotalPrice     = trim($Purchase->TotalPrice);
		$ServiceList    = $Purchase->ServiceList;
		$Service        = $ServiceList->Service;
		$hotelInfo      = $Service->HotelInfo;
		$hotelCode      = $hotelInfo->Code;
		
		$ContractList    = $Service->ContractList[0]->Contract;
		$CommentList     = $ContractList->CommentList;
		$comment         = trim($CommentList->Comment); //10
		$Supplier        = $Service->Supplier;
		$supplierName    = $this->fm->xml_attribute($Supplier, 'name'); //11 
		$VatNumber       = $this->fm->xml_attribute($Supplier, 'vatNumber'); // 12
		
		$hotelRoom       = $Service->AvailableRoom[0]->HotelRoom;
		$includ          = trim($hotelRoom->Board); // apa aja yg di dapat , kamar dan sarapan 
		$RoomType        = trim($hotelRoom->RoomType); //nama Kamar
		$cancellation    = $hotelRoom->CancellationPolicies;
		$cancpol         = $cancellation->CancellationPolicy;
		
		$tgl_cancel      = $this->fm->xml_attribute($cancpol, 'dateFrom'); // tgl terakhir cancel
		$jam_cancel      = $this->fm->xml_attribute($cancpol, 'time'); // jam terkahir cancel. biasanya jam 2359
		$Cancelamount    = $this->fm->xml_attribute($cancpol, 'amount'); // jam terkahir cancel. biasanya jam 23593
        $kurs = 1;
              
        $dateCancel     = date('Y-m-d', strtotime($tgl_cancel));
		$timeCancel     = date('H:i', strtotime($jam_cancel));
		$date           = date('Y-m-d H:i:s');
		$Cancellation   = $dateCancel.' '.$timeCancel;
		
		$cancelinfo ='
		  Jika anda merubah atau membatalkan pesanan setelah pukul 23:59  '.tanggal_01($tgl_cancel).',
		 anda akan dikenakan biaya senilai 1 malam (termasuk pajak),
		 kami tidak dapat mengembalikan uang jika pelanggan tidak hadir atau meninggalkan hotel lebih awal.
		';
		
		$suppinfo ='
		Payable through : Supplier name="'.$supplierName.'", acting as agent for the service operating company, 
		details of which can be provided upon request". VAT: [vatNumber="'.$VatNumber.'"] Reference: [reference="'.$refCode.'-'.$FileNumber.'"]
		';
		
		$plus = strtotime('+30 minutes',strtotime($date));
		$timeout = date('Y-m-d H:i:s',$plus);
		  
		  
		  
		$databooking = array(
					'file_number'	   => $FileNumber,
					'refcode'	  => $refCode,
					'board_type'	=> $includ,
					'room_type'		=> $RoomType,
					'total_amount'	  => $TotalPrice,
					'token'	 => $purchaseToken,	
					'time_to_exp'	 => $timeout,
					'cancel_amount'=>$Cancelamount,
					'date_cancel'=>$Cancellation,
					'status'	 => 2,
					'contract_info'	 => $comment,
					'cancellation_info' => $cancelinfo,
					'suppinfo'=>$suppinfo
			);
			
		$this->db->where('booking_code',$booking_code);
		$this->db->update('hb_detail_booking', $databooking);
	
		// update tabel booking utk merubah harga modal	
		$harga_modal = str_replace(".000", "", $TotalPrice);		
		$sql2= "Update booking set hrg_modal = '$harga_modal' where booking_code = '$booking_code'";	
		$this->db->query($sql2);
		//$this->session->sess_destroy();
		
		return true;
	
	}

    




	  

	  
	private function getData($order_number)
	{

		$sql = "select transidmerchant,totalamount from doku where transidmerchant='".$order_number."'";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		if($num >0){
			return true;
		}else{
		    return false;
		}
	}

	
	 

	  

	  function send_booking($order_number, $cardnumber)
	  {
		  
		 // $cardnumber = goToDecript($ecpt);
		  $this->load->library('email');
		  
		  $getEmailManage = $this->getDataEmail(5); //email buat member
		  $menu_name 	  = $getEmailManage[0]->menu_name;
		  $content 		= $getEmailManage[0]->email_content;
		  
		  $getEmailManage1 = $this->getDataEmail(12); //email buat admin
		  $menu_name1 	  = $getEmailManage1[0]->menu_name;
		  $content1 		= $getEmailManage1[0]->email_content;

		  $expl = explode("==dont delete==",$content);//email buat member
		  $exp2 = explode("==dont delete==",$content1);//email buat member


		 // email untuk member
			$ar1 = $expl[0];$ar2 = $expl[1];$ar3 = $expl[2];$ar4 = $expl[3];$ar5 = $expl[4];$ar6 = $expl[5];
			$ar7 = $expl[6];$ar8 = $expl[7];$ar9 = $expl[8];$ar10 = $expl[9];$ar11 = $expl[10];
			$ar12 = $expl[11];$ar13 = $expl[12];$ar14 = $expl[13];$ar15 = $expl[14];$ar16 = $expl[15];
			$ar17 = $expl[16];$ar18 = $expl[17];$ar19 = $expl[18];$ar20 = @$expl[19];$ar21 = @$expl[20];$ar22 = @$expl[21];
			
			
 		// email untuk admin

			$ara1 = $exp2[0];$ara2 = $exp2[1];$ara3 = $exp2[2];$ara4 = $exp2[3];$ara5 = $exp2[4];$ara6 = $exp2[5];
			$ara7 = $exp2[6];$ara8 = $exp2[7];$ara9 = $exp2[8];$ara10 = $exp2[9];$ara11 = $exp2[10];
			$ara12 = $exp2[11];$ara13 = $exp2[12];$ara14 = $exp2[13];$ara15 = $exp2[14];$ara16 = $exp2[15];
			$ara17 = $exp2[16];$ara18 = $exp2[17];$ara19 = $exp2[18];$ara20 = $exp2[19];

		    $getDetPemesanan = $this->getDetailPemesanan($order_number);

			$ket ="Kami akan menagih kartu kredit Anda yang berakhiran 4 digit nomor ini ".$cardnumber."  untuk menyelesaikan pemesanan ini";
			$nama_member  = $getDetPemesanan[0]->name;// Kepada yth
			$booking_for   = $getDetPemesanan[0]->booking_for;// booking untuk siapa?
			$nama_tamu    = $getDetPemesanan[0]->guestname; // nema tamu
			$hp_tamu    = $getDetPemesanan[0]->guestphone; // no hp tamu
			$hpMember    = $getDetPemesanan[0]->phone; // no hp tamu
			$email_member = $getDetPemesanan[0]->email; // nema tamu
			$nama_hotel= $getDetPemesanan[0]->hotel_name;
			$alamat= $getDetPemesanan[0]->address;
			$area= $getDetPemesanan[0]->wilayah;
			$kota= $getDetPemesanan[0]->kota;
			$negara= $getDetPemesanan[0]->negara;
			$cekin_date= $getDetPemesanan[0]->checkin_date;
			$cekout_date= $getDetPemesanan[0]->checkout_date;
			$jumlah_kamar= $getDetPemesanan[0]->qty_kamar;
			$fg_promotion= $getDetPemesanan[0]->fg_promotion;
			$id_hotel    = $getDetPemesanan[0]->id_hotel; // nema tamu
			$special_order    = $getDetPemesanan[0]->special_order; // nema tamu
			
			if($booking_for == 0)
			{
				$nama_penginap = $nama_member;
				$tlp = $hpMember;
			}else{
				$nama_penginap = $nama_tamu;
				$tlp = $hp_tamu;
			}
			
			
			
			
			// getpartner nama dan email
			$getDetpartner = $this->getPartner($id_hotel);
			$nama_partner  = $getDetpartner[0]->first_name.' '.$getDetpartner[0]->last_name;
			$email_partner = $getDetpartner[0]->email;
			$email_notif   = $getDetpartner[0]->email_notif;
			// get admin hotel 
			$getAdminHotel = $this->getAdminHotel($id_hotel);
			
			$Max = $getDetPemesanan[0]->max_adult;
			$Breakfast = $getDetPemesanan[0]->include_breakfast;
			$room_type= $getDetPemesanan[0]->room_name;
			$note= $special_order;

			if($fg_promotion ==0){
				$promosi= 'Tidak';
			}else{
				$promosi= 'Ya';
			}

			$total= $getDetPemesanan[0]->total_price;

			$brkfast = 'Tidak';
			if($Breakfast == 1){$brkfast = 'Ya';}

			$date1=strtotime($cekin_date);
			$date2=strtotime($cekout_date);
			$seconds_diff = $date2-$date1;
			$stay= floor($seconds_diff/3600/24);
			$stay= $stay.' Malam';
			
			
			$linkdetailInv 	   ='<a href="'.base_url().'">lihat detail pemesanan</a>';
			$encripEmail 	     = goToEncript($email_member);
			$encripcode  		  = goToEncript($order_number);

			$link='<a href="'.base_url().'hotel/my_booking/confirmation/'.$encripcode.'/'.$encripEmail.'">lihat detail pemesanan</a>';
			$message =
						$ar1.$order_number.
						$ar2.date('d F Y').
						$ar3.$nama_member.
						$ar4.$ket.
						$ar5.$nama_penginap.
						$ar6.$tlp.
						$ar7.$nama_hotel.
						$ar8.$alamat.
						$ar9.$area.
						$ar10.$kota.
						$ar11.'Indonesia'.
						$ar12.date('d M Y', strtotime($cekin_date)).
						$ar13.date('d M Y', strtotime($cekout_date)).
						$ar14.$jumlah_kamar.
						$ar15.$stay.
						$ar16.$room_type.
						$ar17.$brkfast.
						$ar18.$note.
						$ar19.$promosi.
						$ar20.'Rp. '.number_format($total).
						$ar21.$link.
						$ar22;

			$fromEmail = 'info@dbudget.net';
			$fromName  = 'Dbudget.net';
			$toEmail   = $email_member;
			$subject  = 'Booking Confirmation #'.$order_number;
			
		   // $this->email->attach('./uploads/pdf/tutorial-webdesign.pdf');
			
			
			// kirim 
			$this->kirim_email($fromEmail, $fromName, $toEmail, $subject, $message);
			//------------------rmail untuk admin-------------------------------------
	
			$message2 =
						$ara1.$order_number.
						$ara2.date('d F Y').
						$ara3.$nama_partner.
						$ara4.$nama_penginap.
						$ara5.$tlp.
						$ara6.$nama_hotel.
						$ara7.$alamat.
						$ara8.$area.
						$ara9.$kota.
						$ara10.'Indonesia'.
						$ara11.date('d M Y', strtotime($cekin_date)).
						$ara12.date('d M Y', strtotime($cekout_date)).
						$ara13.$jumlah_kamar.
						$ara14.$stay.
						$ara15.$room_type.
						$ara16.$brkfast.
						$ara17.$note.
						$ara18.$promosi.
						$ara19.'Rp. '.number_format($total).
						$ara20;
						
			$toEmail2   = 'info@dbudget.net';
			$subject2  = $menu_name1.$order_number;
			// kirim ke partner email
			if($email_notif ==1){ // kalo email notifikationny 1 maka kirim 
			  $this->kirim_email($fromEmail, $fromName, $email_partner, $subject2, $message2);
			}
			
	
			$getAdminHotel = $this->getAdminHotel($id_hotel);
			$numAdmin = count($getAdminHotel);
			
			if($numAdmin <> 0){
				for($a=0; $a< $numAdmin; $a++)
				{
					$namaDpnAdmin = $getAdminHotel[$a]->first_name;
					$namablkAdmin = $getAdminHotel[$a]->last_name;
					$emailAdmin   = $getAdminHotel[$a]->email;
					$namaLengkap  = $namaDpnAdmin.' '.$namablkAdmin;
							//  kirim ke admin hotel
			
			   $messageAdmin =
						$ara1.$order_number.
						$ara2.date('d F Y').
						$ara3.$namaLengkap.
						$ara4.$nama_penginap.
						$ara5.$tlp.
						$ara6.$nama_hotel.
						$ara7.$alamat.
						$ara8.$area.
						$ara9.$kota.
						$ara10.'Indonesia'.
						$ara11.date('d M Y', strtotime($cekin_date)).
						$ara12.date('d M Y', strtotime($cekout_date)).
						$ara13.$jumlah_kamar.
						$ara14.$stay.
						$ara15.$room_type.
						$ara16.$brkfast.
						$ara17.$note.
						$ara18.$promosi.
						$ara19.'Rp. '.number_format($total).
						$ara20;
						
						$this->kirim_email($fromEmail, $fromName, $emailAdmin, $subject2, $messageAdmin);
				}
			}
			
			return true;
	  }
	  
	  function kirim_email($fromEmail, $fromName, $toEmail, $subject, $message)
	  {
		    $this->load->library('email');
			
		    $config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);

			$this->email->from($fromEmail, $fromName);
			$this->email->to($toEmail);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->send();
			
			
			return true;

	  }

	  

	  function getDataEmail($id)

	  {

		  $sql = "SELECT * FROM email_manage WHERE id = $id";

		  $qry = $this->db->query($sql);

		  $row = $qry->result();

		  

		  return $row;

	  }

	  function getPartner($id_hotel)
	  {
		 
		  $sql ="select a.id_partner, b.first_name, b.last_name, b.email_notif, b.email from hotel a LEFT JOIN partner b ON a.id_partner = b.id_partner where id_hotel = $id_hotel";
		  $qry = $this->db->query($sql);
		  return $qry->result();
	  }


		function getAdminHotel($id_hotel)
		{
		  $sql ="select first_name,last_name,email from hotel_user_manager where id_hotel = $id_hotel";
		  $qry = $this->db->query($sql);
		  return $qry->result();
		}

	  function getDetailPemesanan($order_number)

	  {

		  $sql = "SELECT a.*, b.name, b.email, b.phone, c.hotel_name, c.address, c.id_city,

					c. id_province, d.name AS room_name,d.include_breakfast, d.max_adult,

					e.name AS wilayah, f.name_provinsi AS kota, g.name AS negara

					FROM booking a

					LEFT JOIN member b ON a.id_member = b.id_member

					LEFT JOIN hotel c ON a.id_hotel = c.id_hotel

					LEFT JOIN hotel_rooms d ON a.id_room = d.id_rooms

					LEFT JOIN mst_city e ON c.id_city = e.id_city

					LEFT JOIN mst_province f ON c.id_province = f.id_province

					LEFT JOIN mst_country g ON c.id_country = g.id_country

					WHERE booking_code = '$order_number'";

		  $qry = $this->db->query($sql);

		  $row = $qry->result();

		

		  return $row;

	  }

	

}