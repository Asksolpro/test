<?php
include(SITE_URI.'application/controllers/authcontroller'.EXT);
class Doku_redirect extends authcontroller
{
	function __construct()
	{
        parent::__construct();
    }
	
	function index()
	{
		$order_number 	= $this->input->post('TRANSIDMERCHANT');
		$purchase_amt 	= $this->input->post('AMOUNT');
		$status_code  	 = $this->input->post('STATUSCODE');
		$words 		   = $this->input->post('WORDS');
		$paymentchannel  = $this->input->post('PAYMENTCHANNEL');
		$session_id 	  = $this->input->post('SESSIONID');
		$paymentcode     = $this->input->post('PAYMENTCODE');
		
		
		
		$dokuform="<form name=\"param_pass\" id=\"param_pass\" method=\"post\" action=\"http://dbudget.net/hotel/payment_notify\">\n"; //example redirect link
		
		$dokuform.="<input name=\"order_number\" type=\"hidden\" id=\"order_number\" value=\"$order_number\">\n";
		$dokuform.="<input name=\"order_number\" type=\"hidden\" id=\"order_number\" value=\"$purchase_amt\">\n";
		$dokuform.="<input name=\"status_code\" type=\"hidden\" id=\"order_number\" value=\"$status_code\">\n";
		$dokuform.="<input name=\"order_number\" type=\"hidden\" id=\"order_number\" value=\"$words\">\n";
		$dokuform.="<input name=\"order_number\" type=\"hidden\" id=\"order_number\" value=\"$paymentchannel\">\n";
		$dokuform.="<input name=\"order_number\" type=\"hidden\" id=\"order_number\" value=\"$session_id\">\n";
		$dokuform.="<input name=\"order_number\" type=\"hidden\" id=\"order_number\" value=\"$paymentcode\">\n";
		
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