<?php
include(SITE_URI.'application/controllers/authcontroller'.EXT);
class Post_payment extends authcontroller
{
	function __construct()
	{
        parent::__construct();
    }
	
	
	
	function index()
	{
		$this->load->view('api/test_payment');
	}
	
	
	
	function post_data()
	{
		$amount = 120000;
		$mallID = 129;
		$Shared_key = 'oR2tKO8Owr92';
		$TRANSIDMERCHANT = 'ka4701025';
		$datapost = $amount.$mallID.$Shared_key.$TRANSIDMERCHANT;
		
		$datawords = sha1($datapost);
		echo $datapost.'<br>';
		echo $datawords;
		exit;
		$dokuform="<form name=\"data_words\" id=\"data_words\" method=\"post\" action=\"http://103.10.129.17/Suite/Receive\">\n"; //example redirect link
		
		$dokuform.="<input name=\"words\" type=\"hidden\" id=\"words\" value=\"$order_number\">\n";
		
		
		$dokuform.="</form>\n";
		$dokuform.="<script language=\"JavaScript\" type=\"text/javascript\">";
		$dokuform.="document.getElementById('param_pass').submit();";
		$dokuform.="</script>";
        $redirect_url ='';
			//FIREFOX FIX
		$redirect_url = str_replace('&amp;', '&', $redirect_url);
		
		
		echo '
					
			<body>
			'.print $dokuform.'
			<noscript>
			If you are not redirected please <a href="'.$redirect_url.'">click here</a> to confirm your order.
			</noscript>
			</body>
		';
	}
	
}