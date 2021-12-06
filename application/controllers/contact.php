<?php
Class Contact extends CI_Controller {
    function __construct()
	{
        parent::__construct();
		$this->load->model('admin/master_model');
    }
    public function index()
	{
		$data['data_contact'] = $this->master_model->select_in('content_master', '*', "WHERE content_for= 'contact'");
		$this->load->view('front/contact', $data);
	}
	public function sendEmail()
	{
		$fromEmail = 'info@leopumps.com';
		$subject  = $this->input->post('subject');
		$pesan = $this->input->post('pesan');
		$nama = $this->input->post('nama');
		$email= $this->input->post('email');
		$tlp = $this->input->post('tlp');
		$this->load->library('email');
		$toEmail  = 'contact@leopumps.com';
		$fromName = 'Leopumps.com - contact us';
		/*
		$msg = '<div style="width:600px; background:#FFF; margin:0 auto; padding:0 20px; border:2px solid #EEE">
			  <br />
				<div style="width:560px; height:50px; background:#FFF; margin:0 auto; padding:10px 20px; border:2px solid #EEE">
				  <img height="54" src="http://jetsbrokers.com/appinclude/images/front/envio-logo.png" width="175" /></div><hr /><p>Kepada Yth ,&nbsp; <span style="font-size: 13px;">==membername==</span></p>
				<p>&nbsp;</p>
			<p><span style="font-family:lucida sans unicode,lucida grande,sans-serif;"><span style="font-size: 11px;"><span dir="ltr"><big>&nbsp;--isi conten email disini--</big></span></span></span></p>
			<br />
			<p>&nbsp;</p>
			<p style="width: 560px; height: 50px; background: rgb(238, 238, 238) none repeat scroll 0% 0%; margin: 0px auto; padding: 10px 20px; border: 2px solid rgb(238, 238, 238);"><span style="font-family:lucida sans unicode,lucida grande,sans-serif;"><span style="font-size: 11px;"><span dir="ltr"><big>Email ini dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.<br />
			Jika butuh bantuan, gunakan halaman <a class="text-blue" href="http://jetsbrokers.com/main/contact">Kontak Kami</a></big></span></span></span></p>
				<div style="width:560px; height:50px; background:#1BA0E1; margin:0 auto; padding:10px 20px; border:2px solid #EEE">
					<span style="color:#F0FFF0;">2016 &copy; Jets Insurance Broker | Jl. Penjernihan 2 No.10 Bendungan Hilir Jakarta - 10210</span>
				</div>
				<p>&nbsp;</p>
				</div>
				</div>
				</div>'
			echo $msg;
		exit;
	  */
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['newline'] = "\r\n";
        //$config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
		#setting email
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from($fromEmail, $fromName);
		$this->email->to($toEmail);
		$this->email->subject($subject);
		$this->email->message($msg);
		$this->email->send();
		redirect('contact/success');
	}
	
	function save_email_subscribe()
	{
		$email = $this->input->post('email');
		$email = strtolower($email);
		$cekEmail = $this->cekEmail($email);
		if($cekEmail==1)
		{
			//udah ada
			echo 'false';
		}else{
			//belum ada
			$date = date('Y-m-d');
			$data = array(
			  'email' =>$email,
				'tgl' =>$date
			);
			$this->db->insert('email_subscribe', $data);
			echo 'true';
		}
	}
	function cekEmail($email)
	{
		$sql = "SELECT id FROM email_subscribe WHERE email = '$email' ";
		$qry = $this->db->query($sql);
		$num = $qry->num_rows();
		return $num;
	}
	
}   
?>