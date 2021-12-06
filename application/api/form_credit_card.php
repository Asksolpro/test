			
<script language="JavaScript" type="text/javascript" src="http://luna2.nsiapay.com/dateformat.js"></script>
<script language="JavaScript" type="text/javascript" src="http://luna2.nsiapay.com/sha-1.js"></script>

<style type="text/css">

</style>


<?php
   $kode_booking = $this->session->userdata('booking_code');
   $bookingDet   = $this->mastermodel->getRetreiveBooking($kode_booking);
   
  //print_array($bookingDet);
   $subtotal = $bookingDet[0]->subtotal;
   $tax = $bookingDet[0]->tax;
   $total_price = $bookingDet[0]->total_price;
   $booking_code = $bookingDet[0]->booking_code;
   $id_member_booking = $bookingDet[0]->id_member;
   
   $id_hotel = $bookingDet[0]->id_hotel;
   $id_room  = $bookingDet[0]->id_room;
   $checkin_date  = $bookingDet[0]->checkin_date;
   $checkout_date  = $bookingDet[0]->checkout_date;
   
   $booking_code = trim($booking_code);
   
   $night = $this->mastermodel->datediff('d', $checkin_date, $checkout_date , false);
   $hotelDet   = $this->mastermodel->getDetHotel($id_hotel);
   $roomDet    = $this->mastermodel->getDetailRooms($id_room);
   
   $hotelName = $hotelDet[0]->hotel_name;
   $roomName  = $roomDet[0]->name;
  
   $memberDet   = $this->mastermodel->getDetMember($id_member_booking);
   $name        = $memberDet[0]->name;
   $email       = $memberDet[0]->email;
   $phone       = $memberDet[0]->phone;
    
	$amount = $total_price.'.00';
	$mallID = '129';
	$Shared_key = 'oR2tKO8Owr92';
	$TRANSIDMERCHANT = $booking_code;
	$datapost = $amount.$mallID.$Shared_key.$TRANSIDMERCHANT;
	
	$words = sha1($datapost);
	//echo $amount;
	//print_array($this->session->userdata);

?>


<script language="javascript" type="text/javascript">
function getRequestDateTime() {
	var now = new Date();
	var tanggal = dateFormat(now, "yyyymmddHHMMss");	
    return tanggal;
	//document.MerchatPaymentPage.REQUESTDATETIME.value = dateFormat(now, "yyyymmddHHMMss");	
}
function getWords() { 
	var msg = document.MerchatPaymentPage.AMOUNT.value + document.MerchatPaymentPage.MALLID.value + "5TgfR32EdsY5" + "<?=$booking_code;?>";
	var words= SHA1(msg);
	$("#WORDS").val(words);
	
	var tanggal = getRequestDateTime();
	$("#REQUESTDATETIME").val(tanggal);
	
	var getSession = randomString(20);
	$("#SESSIONID").val(getSession);
	
}

function randomString(STRlen) {
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	var string_length = STRlen;
	var randomstring = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
	}

	return randomstring;

}

function genInvoice() {	
	document.MerchatPaymentPage.TRANSIDMERCHANT.value = randomString(12);
}

function genSessionID() {	
	document.MerchatPaymentPage.SESSIONID.value = randomString(20);
}

function genBookingCode() {	
	document.MerchatPaymentPage.BOOKINGCODE.value = randomString(6);
}




</script>
<h3> Informasi pemesanan kamar.</h3>  
<hr />
<div id="detail_payment">
      
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
  <?php 
  $this->load->view('front/ajax');
  $chkin = date('d/m/Y', strtotime($checkin_date));
  $chkout=date('d/m/Y', strtotime($checkout_date));
  
  //development
  $action ='http://103.10.129.17/Suite/Receive' ;
  //production
  $action2 ='https://pay.doku.com/Suite/Receive';
  $test_post = base_url().'hotelbeds/testpost';
  

  ?>                      


<form action="<?php echo $action2;?>" id="MerchatPaymentPage" name="MerchatPaymentPage" method="post" >
<div class="fake-basket">
    <span style="font-size:16px;"><?php echo $hotelName;?></span><br />
		<?php echo $roomName;?><br />
        <?php echo $chkin;?> - <?php echo $chkout ;?> ( <?=$night;?> Night)
      <br /> 
     
</div>


<input type="hidden" name="BASKET" id="BASKET" value="<?php echo $hotelName.' '.$roomName.' '.$chkin.'-'.$chkout;?> , <?php echo $subtotal;?>.00,1, <?php echo $subtotal;?>.00; Tax Fee, <?php echo $tax;?>.00,1,<?php echo $tax;?>.00 " />
<input type="hidden" name="MALLID" value="512" />
<input type="hidden" name="CHAINMERCHANT" value="NA" />
<input type="hidden" name="AMOUNT" value="<?php echo $total_price;?>.00" />
<input type="hidden" name="PURCHASEAMOUNT" value="<?php echo $total_price;?>.00" />
<input name="TRANSIDMERCHANT" type="hidden" id="TRANSIDMERCHANT" size="24" value="<?php echo $booking_code;?>"/>
<input type="hidden" id="WORDS" name="WORDS"  size="60" value=""/>
<input type="hidden" name="REQUESTDATETIME" id="REQUESTDATETIME" value="" />
<input type="hidden" name="CURRENCY" value="360" />
<input type="hidden" name="PURCHASECURRENCY" value="360" />
<input type="hidden" id="SESSIONID" name="SESSIONID" value="" />
<input name="NAME" type="hidden" id="NAME" size="24" value="<?=$name;?>" maxlength="50" />
<input name="EMAIL" type="hidden" id="EMAIL" value="<?=$email;?>" size="24" />
<input type="hidden" name="PAYMENTCHANNEL" value="">
<input name="MOBILEPHONE" type="hidden" id="MOBILEPHONE" value="<?=$phone;?>"  />

<table width="70%" >
    <tr style="background:#FFF">
     <td>kode Booking</td>
     <td>:</td>
     <td><?=$booking_code;?></td>
   </tr>
    <tr>
     <td>Total Pembayaran</td>
     <td>:</td>
     <td>Rp.<?php echo number_format($total_price);?></td>
   </tr>
   <tr style="background:#FFF">
     <td>Nama</td>
     <td>:</td>
     <td><?=$name;?></td>
   </tr>
   <tr>
     <td>Email</td>
     <td>:</td>
     <td><?=$email;?></td>
   </tr>
   <tr style="background:#FFF">
     <td>Mobile Phone</td>
     <td>:</td>
     <td><?=$phone;?></td>
   </tr>
   
</table>

 
<br /><br />
 <input type="submit" name="submit" value="Lanjutkan ke pembayaran" class="confirmasi"  onclick="getWords();"/>
</form>
<script language="javascript" type="text/javascript">

getRequestDateTime();
genSessionID();
</script>
 </div>