<?php
	// define path agar mudah maintenance
	define('CSSPATH',base_url().'basket/css/');
	define('JSPATH',base_url().'basket/js/');
	define('IMGPATH',base_url().'basket/images/');
	define('UPPATH',base_url().'uploads/'); // path untuk uploads gambar
	define('BANNERPATH',base_url().'uploads/banner/');
	define('RZ',base_url().'imgwiqi/resize/');
	define('CR',base_url().'imgwiqi/crop/');
	define('CKFINDERPATH', base_url().'uploads/ckfinder/ckfinder.html');
	define('PRODPATH',base_url().'uploads/prod/proddet/');
	define('GALLPRODPATH',base_url().'uploads/prod/gallery/');
	
	#email
	define('noreplay_email','noreplay@pasarasuransi.com');
	define('sales_email','sales@pasarasuransi.com');
	define('info_email','info@pasarasuransi.com');
	
	define('biaya_admin','30000');
	define('biaya_penanganan','30000');
	

	function get_array($arr)
	{
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}
		
	function dateIndo()
	{
		// Ambil waktu server terkini, ambil tanggal dan jam untuk zona indonesia
		$dat_server = mktime(date("G"), date("i"), date("s"), date("n"), date("j"), date("Y"));
		//echo 'Waktu server: '.date("H:i:s", $dat_server); 
		
		// Ambil perbedaan waktu server dengan GMT
		$diff_gmt = substr(date("O",$dat_server),1,2);
		
		// karena perbedaan waktu adalah dalam jam, maka kita jadikan detik
		$datdif_gmt = 60 * 60 * $diff_gmt; 
		
		// Hitung perbedaannya
		if (substr(date("O",$dat_server ),0,1) == '+') {
		$dat_gmt = $dat_server - $datdif_gmt;
		} else {
		$dat_gmt = $dat_server + $datdif_gmt;
		}
		
		// Hitung perbedaan GMT dengan waktu Indonesia (GMT+7)
		// karena perbedaan waktu adalah dalam jam, maka kita jadikan detik
		$datdif_id = 60 * 60 * 7;
		$dat_id = $dat_gmt + $datdif_id;
		//echo 'Waktu Indonesia: '.date("H:i:s", $dat_id); 
		
		$date = date("Y-m-d H:i:s",$dat_id);
		
		return $date;	
	}
	
	if ( ! function_exists('gotoEncript'))
	{
		function gotoEncript($str)
		{
			return str_replace('=','equal',str_replace('+','plus',base64_encode($str)));
		}
	}
	
	if ( ! function_exists('gotoDecript'))
	{
		function gotoDecript($str)
		{
			$decript = $str;
			$decript = str_replace('plus','+',$decript);
			$decript = str_replace('equal','=',$decript);		
	
			$decript = base64_decode($decript);
			
			return $decript;
		}
	}		
?>