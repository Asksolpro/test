<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('print_array'))
{
	function print_array($data)
	{
		echo "<pre>"; print_r($data); echo "</pre>";
	}	
	
}


if ( ! function_exists('btnnewprd'))
{
	function btnnewprd($Modify='',$link='')
	{
		$confirm = "alert('You don&acute;t have access to add new record');return false;";
		
		if($Modify == '1')
		{
			return anchor($link,'<img src="'.base_url().'appinclude/images/toolbar/add.png" alt="new" title="new" />');
		}else{
			return anchor($link,'<img src="'.base_url().'appinclude/images/toolbar/add.png" alt="new" title="new" />',array('onclick'=>$confirm));
		}
	}
}

if ( ! function_exists('btneditprd'))
{
	function btneditprd($Modify='',$link='')
	{		
		$confirm = "alert('You don&acute;t have access to edit');return false;";
		
		if($Modify == '1' )
		{
			if(is_array($link))
			{
				$exp = explode('=>',$link[1]);
			
				return anchor($link[0],'<img src="'.base_url().'appinclude/images/edit.png" alt="edit" title="edit" />',array($exp[0]=>$exp[1]));
			}else{
				return anchor($link,'<img src="'.base_url().'appinclude/images/edit.png" alt="edit" title="edit" />');
			}
			
		}else{
			return anchor($link,'<img src="'.base_url().'appinclude/images/edit.png" alt="edit" title="edit" />',array('onclick'=>$confirm));
		}
	}
}

if ( ! function_exists('btndelprd'))
{
	function btndelprd($Modify='',$link='')
	{
		$confirm = "alert('You don&acute;t have access to delete');return false;";
		
		if($Modify == '1')
		{
			$confirm = "return confirm('Delete this record?')";
	
			return anchor($link,'<img src="'.base_url().'appinclude/images/del.png" alt="delete" title="delete" />',array('onclick'=>$confirm));

		}else{
			return anchor($link,'<img src="'.base_url().'appinclude/images/del.png" alt="delete" title="delete" />',array('onclick'=>$confirm));
		}
	}
}


if ( ! function_exists('btnback'))
{
	function btnback($link='')
	{		
		return anchor($link,'<img src="'.base_url().'appinclude/images/toolbar/back.png" alt="Back" title="Back" /> Back');

	}
}

#dapetin date untukindonesia
if ( ! function_exists('indodate'))
{
	function indodate()
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
}

/**/