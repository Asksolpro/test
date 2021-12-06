<?php 

include('./application/controllers/authcontroller'.EXT);

class transaction extends Authcontroller

{



	function __construct()

	{

        parent::__construct();
		/*if(empty($this->session->userdata('UserID')))
        {
			redirect(base_url(),'refresh');
        }*/

		$this->load->model('admin/master_model');

		$this->load->library('upload');



        $usg = $this->session->userdata('usergroup');

		$idMenu = $this->uri->segment(4);

		$this->master_model->checkAccess($idMenu, $usg);

    }



	

	public function nota($menuid)

	{

		define("menuid",$menuid);

        $user_id = $this->session->userdata('UserID');

        $this->redirectNoAuthRead($user_id, $menuid);

		$today=date('Y-m-d');
		$end_month = strtotime ('-30 day', strtotime($today));
		$yesterday = strtotime ('-1 day', strtotime($today));

		//WHERE (`date_in` > '$yesterday' and `date_in` < '$end_month')						
		$DataView=$this->master_model->select_in('ts_nota', '*', "ORDER BY ID DESC");
		
		$data['data_nota'] 	   = $DataView;

		//$data['data_nota']=$this->master_model->mst_data('ts_nota');

		//$data['data_nota']=$this->master_model->select_in('ts_nota', '*', "$where ORDER BY ID DESC");

		$this->load->view('admin/nota/main', $data);

	}





	public function nota_copy($menuid)

	{

		define("menuid",$menuid);

        $user_id = $this->session->userdata('UserID');

        $this->redirectNoAuthRead($user_id, $menuid);



		$search_date=$this->session->userdata('search_date');

		$id_customer_nota=$this->session->unset_userdata('id_customer_nota');

		

		//$id_customer_nota=$this->session->userdata('id_customer_nota');



		if($search_date=='')

		{

			$where="";

			

			if($id_customer_nota=='')

			{

				$where_customer='';

			}else

			{

				$where_customer='WHERE id_customer=$id_customer_nota';

			}

		}else

		{

			$exp=explode(' - ', $search_date);

			$date_in  =$exp[0];

			$date_out =$exp[1];



			$date_in=strtotime($date_in);

			$date_in=date('Y-m-d',$date_in);



			$date_out=strtotime($date_out);

			$date_out=date('Y-m-d',$date_out);

			$where="WHERE date_in BETWEEN '$date_in' AND '$date_out'";

			

			if($id_customer_nota=='')

			{

				$where_customer='';

			}else

			{

				$where_customer='AND id_customer=$id_customer_nota';

			}

		}



		$this->load->library('pagination');

		$uri_segment  = 5;

		$limit 		= 10;

		$offset 	   = $this->uri->segment($uri_segment);	

		if ($offset == ''){$offset = 0;}else{$offset = $offset;}

		

		$num   = $this->master_model->mst_data('ts_nota');

		$num=count($num);

		$DataView=$this->master_model->select_in('ts_nota', '*', "$where $where_customer ORDER BY ID DESC LIMIT $limit OFFSET $offset");

		//$DataView    = $this->master_model->select_in('ms_customer','*',"ORDER BY ID DESC LIMIT $limit OFFSET $offset");



		$config['base_url']	 = base_url().'admin/transaction/nota/'.$menuid;

		$config['total_rows']   = $num;

		$config['per_page'] 	 = $limit;

		$config['uri_segment']  = $uri_segment;

		$config['next_link'] 	= 'Next';

		$config['prev_link'] 	= 'Prev';

		$config['first_link']   = 'First';

		$config['last_link'] 	= 'Last';

		$this->pagination->initialize($config);

		$data['page'] 	   	   = $this->pagination->create_links();

		$data['data_nota'] 	   = $DataView;



		//$data['data_nota']=$this->master_model->mst_data('ts_nota');

		//$data['data_nota']=$this->master_model->select_in('ts_nota', '*', "$where ORDER BY ID DESC");

		$this->load->view('admin/nota/main', $data);



	}



	



	public function search_nota($menuid)

	{

		print_array($this->input->post());

		exit;

		$date=$this->input->post('date_in');

		$name=$this->input->post('customer_name');

		

		$get_id=$this->master_model->select_in('ms_customer','ID',"WHERE name LIKE '%$name%'");

		$id_customer=$get_id[0]->ID;



		$this->session->set_userdata('search_date', $date);

		$this->session->set_userdata('id_customer_nota', $id_customer);

		

		redirect('admin/transaction/nota/'.$menuid);

	}



	



	public function choose_customer($menuid)



	{



		define("menuid",$menuid);



        $user_id = $this->session->userdata('UserID');



        $this->redirectNoAuthRead($user_id, $menuid);



		



		$this->load->library('pagination');



		$uri_segment  = 5;



		$limit 		= 10;



		$offset 	   = $this->uri->segment($uri_segment);	



		if ($offset == ''){$offset = 0;}else{$offset = $offset;}



		



		$num   = $this->master_model->customer_num();		



		$DataView    = $this->master_model->select_in('ms_customer','*',"ORDER BY ID DESC LIMIT $limit OFFSET $offset");



		



		$config['base_url']	 = base_url().'admin/transaction/choose_customer/'.$menuid;



		$config['total_rows']   = $num;



		$config['per_page'] 	 = $limit;



		$config['uri_segment']  = $uri_segment;



		$config['next_link'] 	= 'Next';



		$config['prev_link'] 	= 'Prev';



		$config['first_link']   = 'First';



		$config['last_link'] 	= 'Last';



		$this->pagination->initialize($config);



		$data['page'] 	   	   = $this->pagination->create_links();



		$data['DataView'] 	   = $DataView;



		



		//$data['DataView']    = $this->master_model->select_in('ms_customer', '*', "ORDER BY ID DESC");



		



		$this->load->view('admin/nota/daftar_customer', $data);



	}



	



	public function insert($menuid, $id_customer='')
	{
        $user_id = $this->session->userdata('UserID');
        
		
		define("menuid",$menuid);
		$this->redirectNoAuthRead($user_id, $menuid);
		
		$this->load->view('admin/nota/insert');
	}



	



	public function insert_proccess($menuid)



	{



		$email=$this->input->get('email');



		$name =$this->input->post('nama');



				



		$mst_check=$this->master_model->mst_check('ms_customer', 'email', $email);



		



		if($mst_check == false)



		{



			echo'error';



		}else



		{



			if($name=='')



			{



				redirect('admin/master/new_customer/'.$menuid.'/error_name');



			}else



			{



				$data=array



				(



					'name'=>$name,



					'company'=>$this->input->post('perusahaan'),



					'no_hp'=>$this->input->post('phone'),



					'kodeOTP'=>$this->input->post('kodeOtp'),



					'no_tlp'=>$this->input->post('tlp'),



					'company'=>$this->input->post('perusahaan'),



					'status'=>$this->input->post('verified'),



					'alamat1'=>$this->input->post('alamat1'),



					'email'=>$email,



				);



				$this->db-insert('ms_customer',$data);



				



				redirect('admin/transaction/insert/'.$menuid);



			}



			echo'1';



		}



	}



	



	public function delete_nota($menuid, $id_nota)



	{



		$data_nota=$this->master_model->select_in('ts_nota', '*', "WHERE ID=$id_nota");



		$id_customer=$data_nota[0]->id_customer;



		$invoice=$data_nota[0]->no_nota;



		$poin_customer=$data_nota[0]->poin_customer;



		



		//$check_poin=$this->master_model->mst_check('ms_customer_poin', 'id_customer', $id_customer);



			



		if($poin_customer==0)



		{



		}else



		{



			$poin=$this->master_model->last_id_poin($id_customer);



			



			//$data_poin=$this->master_model->select_in('ms_customer_poin','*',"WHERE id_customer=$id_customer AND ID=$id_poin");



			//$poin=$data_poin[0]->saldo;



			$saldo=$poin+$poin_customer;



			



			$id_customer_poin = $this->master_model->mst_last_id('ms_customer_poin');



		



			$insert_poin=array



			(



				'ID'=>$id_customer_poin,



				'id_customer'=>$id_customer,



				'id_verification'=>0,



				'id_nota'=>$id_nota,



				'name'=>'Pengembalian poin dari nota #'.$invoice,



				'debit'=>0,



				'kredit'=>$poin_customer,



				'saldo'=>$saldo,



				'action_date'=>date('Y-m-d H:i:s'),



				'status'=>2,



				'sort'=>$id_customer_poin,



			);



			$this->db->insert('ms_customer_poin', $insert_poin);



		}



		



		$this->db->where('ID', $id_nota);



		$this->db->delete('ts_nota');



		



		$this->db->where('id_ts', $id_nota);



		$this->db->delete('ts_nota_detail');



		



		redirect('admin/transaction/nota/'.$menuid);



	}



	



	public function edit_nota($menuid, $id_nota)



	{



		define("menuid",$menuid);



        $user_id = $this->session->userdata('UserID');



        $this->redirectNoAuthRead($user_id, $menuid);



		



		$data['data_edit']=$this->master_model->mst_data_edit('ts_nota',$id_nota);



		$this->load->view('admin/nota/edit', $data);



	}



		



	function get_detail_product($id_product, $subtotal_1, $poin_1, $id_customer)

	{		

		$code = $this->input->post('code');

		

		if($code=='')

		{

			$name = '';

			$desc = '
				<script>
					$(document).ready(function()
					{
						$(".tags2'.$id_product.'").change(function(e)
						{
							 var code = $(this).val();
							  $.ajax({
								 type: "POST",
								 dataType: "html",
								 url: "'.base_url().'admin/transaction/get_code",
								 data:"code="+code,
								 success: function(msg)
								 {
									$("#tags'.$id_product.'").val(msg);
									$(".update").find("span").trigger("click");
								 }
							  }); 
						});
					});
				</script>
				<script>
					$(document).ready(function()
					{
						$(".tags_subtotal'.$id_product.'").change(function(e)
						{
							 var code = $(this).val();
							  $.ajax({
								 type: "POST",
								 dataType: "html",
								 url: "'.base_url().'admin/transaction/get_subtotal/'.$id_product.'",
								 data:"code="+code,
								 success: function(msg)
								 {
									$("#subtotal'.$id_product.'").html(msg);
								 }
							  });
						});
					});
				</script>
				<script>
					$(document).ready(function()
					{
						$(".use_qty'.$id_product.'").change(function(e)
						{
							 var code = $(this).val();
							  $.ajax({
								 type: "POST",
								 dataType: "html",
								 url: "'.base_url().'admin/transaction/get_qty/'.$id_product.'/0/0/'.$id_customer.'",
								 data:"code="+code,
								 success: function(msg)
								 {
									 if(msg =="error")
									 {
										 return false;
									 }else
									 {
										$("#use_qty'.$id_product.'").html(msg); 
										$("#qty'.$id_product.'").focus();
									 }
								 }
							  }); 
						});
					});
				</script>
				<script>
						$(document).ready(function()
						{
							$(".use_price'.$id_product.'").change(function(e)
							{
								 var code = $(this).val();
								  $.ajax({
									 type: "POST",
									 dataType: "html",
									 url: "'.base_url().'admin/transaction/get_price/'.$id_product.'/0/1/0/'.$id_customer.'",
									 data:"code="+code,
									 success: function(msg)
									 {
										 if(code =="")
										 {
											 alert("Baris '.$id_product.' belum ada barang terpilih!!!");
										 }else
										 {
											 $("#use_price'.$id_product.'").html(msg); 
											 $("#qty'.$id_product.'").focus();
										 }
									 }
								  }); 
							});
						});
					</script>
					<script>
						$(document).ready(function()
						{
							$(".get_button_poin'.$id_product.'").change(function(e)
							{
								 var code = $(this).val();
								  $.ajax({
									 type: "POST",
									 dataType: "html",
									 url: "'.base_url().'admin/transaction/get_button_poin/'.$id_product.'/'.$id_customer.'/0/1/price",
									 data:"code="+code,
									 success: function(msg)
									 {
										 if(code =="")
										 {
											 return false;
										 }else
										 {
											$("#use_poin").html(msg);
											$("#qty'.$id_product.'").focus();
										 }
									 }
								  }); 
							});
						});
					</script>

				<input type="text" name="name" list="product_to_list'.$id_product.'" placeholder="Nama Barang" id="name_product'.$id_product.'" class="form-control use_qty'.$id_product.' use_price'.$id_product.' tags2'.$id_product.' get_button_poin'.$id_product.' product_to_list'.$id_product.' tags_subtotal'.$id_product.'" style="width:250px"/>

                    

				<datalist id="product_to_list'.$id_product.'"></datalist>
				<script>
					$(".product_to_list'.$id_product.'").bind("input", function(e)
					{
						var code = $(this).val();
						$.ajax({
							 type: "GET",
							 dataType: "html",
							 url: "'.base_url().'admin/transaction/product_to_list",
							 data:"code="+code,
							 success: function(msg)
							 {
								$("#product_to_list'.$id_product.'").html(msg); 
							 }
						}); 
					});
				</script>
			';

			$price = '<input type="text" name="harga" style="width:80px;" class="form-control" placeholder="Harga"/>';

			$subtotal = 0;

			$total = 0;

			$grandtotal = 0;

			$unit = '';

			$qty = 0;



			$poin = '&nbsp; 0';

			$total_poin = 'Total poin yang didapat : <i class="fa fa-gift text-yellow"> 0</i>';

			$new_poin=0;



			$all = $name.'%'.$desc.'%'.$price.'%'.$subtotal.'%'.$total.'%'.$grandtotal.'%'.$unit.'%'.$qty.'%'.$poin.'%'.$total_poin.'%'.$new_poin.'%null';



			echo $all ;

		}else

		{

			$mst_check=$this->master_model->check_code($code);



			if($mst_check == false)

			{		

				$name = '';

				$desc = '
					<script>
					$(document).ready(function()
					{
						$(".tags2'.$id_product.'").change(function(e)
						{
							 var code = $(this).val();
							  $.ajax({
								 type: "POST",
								 dataType: "html",
								 url: "'.base_url().'admin/transaction/get_code",
								 data:"code="+code,
								 success: function(msg)
								 {
									$("#tags'.$id_product.'").val(msg);
									$(".update").find("span").trigger("click");
								 }
							  }); 
						});
					});
				</script>
				<script>
					$(document).ready(function()
					{
						$(".tags_subtotal'.$id_product.'").change(function(e)
						{
							 var code = $(this).val();
							  $.ajax({
								 type: "POST",
								 dataType: "html",
								 url: "'.base_url().'admin/transaction/get_subtotal/'.$id_product.'",
								 data:"code="+code,
								 success: function(msg)
								 {
									$("#subtotal'.$id_product.'").html(msg);
								 }
							  });
						});
					});
				</script>
				<script>
					$(document).ready(function()
					{
						$(".use_qty'.$id_product.'").change(function(e)
						{
							 var code = $(this).val();
							  $.ajax({
								 type: "POST",
								 dataType: "html",
								 url: "'.base_url().'admin/transaction/get_qty/'.$id_product.'/0/0/'.$id_customer.'",
								 data:"code="+code,
								 success: function(msg)
								 {
									 if(msg =="error")
									 {
										 return false;
									 }else
									 {
										$("#use_qty'.$id_product.'").html(msg); 
										$("#qty'.$id_product.'").focus();
									 }
								 }
							  }); 
						});
					});
				</script>
				<script>
						$(document).ready(function()
						{
							$(".use_price'.$id_product.'").change(function(e)
							{
								 var code = $(this).val();
								  $.ajax({
									 type: "POST",
									 dataType: "html",
									 url: "'.base_url().'admin/transaction/get_price/'.$id_product.'/0/1/0/'.$id_customer.'",
									 data:"code="+code,
									 success: function(msg)
									 {
										 if(code =="")
										 {
											 alert("Baris '.$id_product.' belum ada barang terpilih!!!");
										 }else
										 {
											 $("#use_price'.$id_product.'").html(msg); 
											 $("#qty'.$id_product.'").focus();
										 }
									 }
								  }); 
							});
						});
					</script>
					<script>
						$(document).ready(function()
						{
							$(".get_button_poin'.$id_product.'").change(function(e)
							{
								 var code = $(this).val();
								  $.ajax({
									 type: "POST",
									 dataType: "html",
									 url: "'.base_url().'admin/transaction/get_button_poin/'.$id_product.'/'.$id_customer.'/0/1/price",
									 data:"code="+code,
									 success: function(msg)
									 {
										 if(code =="")
										 {
											 return false;
										 }else
										 {
											$("#use_poin").html(msg);
											$("#qty'.$id_product.'").focus();
										 }
									 }
								  }); 
							});
						});
					</script>

				<input type="text" name="name" list="product_to_list'.$id_product.'" placeholder="Nama Barang" id="name_product'.$id_product.'" class="form-control use_qty'.$id_product.' use_price'.$id_product.' tags2'.$id_product.' get_button_poin'.$id_product.' product_to_list'.$id_product.' tags_subtotal'.$id_product.'" style="width:250px"/>

                    

				<datalist id="product_to_list'.$id_product.'"></datalist>
				<script>
					$(".product_to_list'.$id_product.'").bind("input", function(e)
					{
						var code = $(this).val();
						$.ajax({
							 type: "GET",
							 dataType: "html",
							 url: "'.base_url().'admin/transaction/product_to_list",
							 data:"code="+code,
							 success: function(msg)
							 {
								$("#product_to_list'.$id_product.'").html(msg); 
							 }
						}); 
					});
				</script>
				';

				$price = '<input type="text" name="harga" style="width:80px;" class="form-control" placeholder="Harga"/>';

				$subtotal = 0;

				$total = 0;

				$grandtotal = 0;

				$unit = '';

				$qty = 0;



				$poin = '&nbsp; 0';

				$total_poin = 'Total poin yang didapat : <i class="fa fa-gift text-yellow"> 0</i>';

				$new_poin=0;



				$all = $name.'%'.$desc.'%'.$price.'%'.$subtotal.'%'.$total.'%'.$grandtotal.'%'.$unit.'%'.$qty.'%'.$poin.'%'.$total_poin.'%'.$new_poin.'%error';



				echo $all ;

				//echo 'error';

			}else

			{

				$data_product_by_code =  $this->master_model->data_product_by_code($code);

				$code_product=$data_product_by_code[0]->code;

				$id_category=$data_product_by_code[0]->id_category;



				$get_poin=$this->master_model->select_in('config_global','konversi_poin',"WHERE ID = 1");

				$konversi=$get_poin[0]->konversi_poin;



				$today=date('Y-m-d');

				$yesterday = strtotime ( '-1 day' , strtotime ($today));

				$yesterday = date('Y-m-d', $yesterday);

				$get_promo=$this->master_model->select_in('ms_promo','*',"WHERE id_category=$id_category AND expired > '$yesterday' AND flag=1");



				$name = $data_product_by_code[0]->name;

				$desc = $data_product_by_code[0]->desc;

				$price = $data_product_by_code[0]->price;

				$subtotal = $data_product_by_code[0]->price;

				$total = $data_product_by_code[0]->price;

				$grandtotal = $data_product_by_code[0]->price;

				$unit = $data_product_by_code[0]->unit;



				$qty = 1;

				$num_promo=count($get_promo);

				if($num_promo=='')

				{

					$get_poin=0;

					$poin = '&nbsp;0';

					$choice_poin = 0;

				}else

				{

					$promo=$get_promo[0]->poin;

					$id_category_promo=$get_promo[0]->id_category;

					$expired=$get_promo[0]->expired;

					$flag=$get_promo[0]->flag;



					$get_poin=$promo;

					$poin = '&nbsp;'.number_format($get_poin);

					$choice_poin =$get_poin;

				}



				$grandtotal_1=$subtotal_1+$grandtotal;

				$new_poin=$konversi*$grandtotal_1/100;

				$total_poin = 'Total poin barang : <i class="fa fa-gift text-yellow"> '.number_format($get_poin+$poin_1).'</i>';

				$total_poin_fill =number_format($get_poin+$poin_1);

				$new_poin=number_format($new_poin).' <i class="fa fa-gift text-red"></i>';

				



				$value_poin=number_format($new_poin+$get_poin+$poin_1).' <i class="fa fa-gift text-red"></i>';

				$fill='

					';

						for($a=0; $a < count($id_product); $a++)

						{

							$b=$a+1;

							$fill.='

								<input type="text" name="code[]" id="code_fill'.$b.'" value="'.$code.'"/>

								<br>

								<input type="text" name="qty[]" id="qty_fill'.$b.'" value="1"/>

							';

						}

					$fill.='

				';



				$total_delete=$total+$subtotal_1;

				$total_delete=$total_delete-$subtotal;



				$total_poin_delete=$get_poin+$poin_1;

				$total_poin_delete = $total_poin_delete-$get_poin;



				$id=$id_product+1;

				$delete='

					<span class="text-red pull-right deleterow'.$id_product.'" style="cursor:pointer"><i class="fa fa-trash-o"></i></span>

					<script language="JavaScript">

						function addCommas(nStr) 

						{

							nStr += "";

							x = nStr.split(",");

							x1 = x[0];

							x2 = x.length > 1 ? "," + x[1] : "";

							var rgx = /(\d+)(\d{3})/;

							while (rgx.test(x1)) 

							{

								x1 = x1.replace(rgx, "$1" + "," + "$2");

							}

							return x1 + x2;

						}

					</script>



					<script>

						$(".deleterow'.$id_product.'").click(function(event)

						{		

							$(this).closest("tr").remove();

							$(".update").find("span").trigger("click");

						});

					</script>

				';



				$desc='

					<script>

						$(document).ready(function()

						{

							$(".mirror'.$id_product.'").on("keypress change", function(event)

							{

								var data=$(this).val();

								$(".mirror2'.$id_product.'").val(data);

							});

						});

					</script>

					

					<input type="text" value="'.$name.'" list="product_to_list'.$id_product.'" id="name_product'.$id_product.'" placeholder="Nama Barang" class="form-control mirror'.$id_product.' product_to_list'.$id_product.'" style="width:250px"/>

					<datalist id="product_to_list'.$id_product.'"></datalist>

				

					<script>

						$(".product_to_list'.$id_product.'").bind("input", function(e)

						{

							var code = $(this).val();

							$.ajax({

								 type: "GET",

								 dataType: "html",

								 url: "'.base_url().'admin/transaction/product_to_list",

								 data:"code="+code,

								 success: function(msg)

								 {

									$("#product_to_list'.$id_product.'").html(msg); 

								 }

							}); 

												  

						});

					</script>

					

				';



				if($id_product<21)

				{

					//$total=$total;

					$delete=$delete;

				}else

				{

					//$total=$subtotal_1;

					$delete='';

				}

				

				$checkbox=$subtotal;

				//$this->session->set_userdata('row', 13);

				$all = $code_product.'%'.$desc.'%'.$price.'%'.number_format($subtotal).''.$delete.'%'.number_format($total+$subtotal_1).'%'.number_format($grandtotal+$subtotal_1).'%'.$unit.'%'.$qty.'%'.$poin.'%'.$total_poin.'%'.$new_poin.'%success%'.$fill.'%'.$total_poin_fill.'%'.$value_poin.'%'.$checkbox.'%'.$choice_poin.'%'.$name;

				echo $all ;

			}

		}

	}



	public function get_code()

	{

		$code=$this->input->post('code');

		$data_product_by_code =  $this->master_model->data_product_by_code($code);

		$code_product=$data_product_by_code[0]->code;

		

		echo $code_product ;

	}



	



	public function get_subtotal($id_product)

	{

		$code=$this->input->post('code');

		$data_product_by_code =  $this->master_model->data_product_by_code($code);

		$code_product=$data_product_by_code[0]->code;

		$subtotal=$data_product_by_code[0]->price;

		

		$delete='

			<span class="text-red pull-right deleterow'.$id_product.'" style="cursor:pointer"><i class="fa fa-trash-o"></i></span>

			<script language="JavaScript">

				function addCommas(nStr) 

				{

					nStr += "";

					x = nStr.split(",");

					x1 = x[0];

					x2 = x.length > 1 ? "," + x[1] : "";

					var rgx = /(\d+)(\d{3})/;

					while (rgx.test(x1)) 

					{

						x1 = x1.replace(rgx, "$1" + "," + "$2");

					}

					return x1 + x2;

				}

			</script>



			<script>

				$(".deleterow'.$id_product.'").click(function(event)

				{		

					$(this).closest("tr").remove();

					$(".update").find("span").trigger("click");

				});

			</script>

		';

		

		echo number_format($subtotal).''.$delete ;

	}



	



	



	public function get_row_nota($ID, $get_subtotal, $total_poin, $id_customer, $qty, $price)



	{



		$code = $this->input->post('code');



		



		$mst_check=$this->master_model->check_code($code);



		



		if($mst_check == false)



		{



			echo 'error';



		}else



		{



			$data_product_by_code =  $this->master_model->data_product_by_code($code);



			$id_product=$data_product_by_code[0]->ID;



			$id_category=$data_product_by_code[0]->id_category;



			$grandtotal=$data_product_by_code[0]->price;



			



			$get_poin=$this->master_model->select_in('config_global','konversi_poin',"WHERE ID = 1");



			$konversi=$get_poin[0]->konversi_poin;



			



			$subtotal = $price*$qty;



			



			$today=date('Y-m-d');



			$yesterday = strtotime ( '-1 day' , strtotime ($today));



			$yesterday = date('Y-m-d', $yesterday);



			$get_promo=$this->master_model->select_in('ms_promo','*',"WHERE expired > '$yesterday' AND flag=1");



			



			$num_promo=count($get_promo);



			if($num_promo=='')



			{



				$get_poin=0;



			}else



			{



				$promo=$get_promo[0]->poin;



				$id_category_promo=$get_promo[0]->id_category;



				



				if($id_category==$id_category_promo)



				{



					//$get_poin=$konversi*$promo/100;



					$get_poin=$promo;



					$get_poin=$get_poin*$qty;



				}else



				{



					$get_poin=0;



				}



			}



			



			$new_poin=$konversi*$grandtotal/100;



			



			$data['id_product']=$id_product;



			$data['poin']=$get_poin;



			$data['total_poin']=$get_poin+$total_poin;



			$data['subtotal']=$subtotal+$get_subtotal;



			$data['ID']=$ID+1;



			$data['id_customer']=$id_customer;



			



			$this->load->view('admin/nota/insert_row',$data);



		}



	}



	



	



	public function get_row_nota_2($ID, $id_customer)

	{

		//echo'Test';

		//exit;

		$data['ID']=$ID;



		//$data['poin']=$get_poin;



		//$data['total_poin']=$get_poin+$total_poin;



		//$data['subtotal']=$subtotal+$get_subtotal;



		//$data['ID']=$ID+1;

		$data['id_customer']=$id_customer;

		$this->load->view('admin/nota/insert_row_2',$data);



	}



	



	function get_detail_customer()



	{



		$name = $this->input->POST('nama');



		



		$mst_check=$this->master_model->mst_check('ms_customer', 'name', $name);



		



		if($mst_check == false)



		{



			$company = '';



			$phone   = '';



			$otp 	 = '';



			$company_phone = '';



			$status  = '';



			$address = '';



			$email   = '';



			



			$all = $company.'-'.$phone.'-'.$otp.'-'.$company_phone.'-'.$status.'-'.$address.'-'.$email;



			



			echo $all ;



		}else



		{



			$data_customer =  $this->master_model->data_customer_by_name($name);



			



			$company = $data_customer[0]->perusahaan;



			$phone = $data_customer[0]->no_hp;



			$otp = $data_customer[0]->kodeOTP;



			$company_phone = $data_customer[0]->no_tlp;



			$status = $data_customer[0]->status;



			$address = $data_customer[0]->alamat1;



			$email = $data_customer[0]->email;



			



			$all = $company.'-'.$phone.'-'.$otp.'-'.$company_phone.'-'.$status.'-'.$address.'-'.$email;



			



			echo $all ;



		}



	}



	



	



	public function get_button_poin($ID, $id_customer, $subtotal_1, $qty, $price)

	{

		$code = $this->input->post('code');

		$mst_check=$this->master_model->check_code($code);

		if($mst_check == false)

		{

			echo'error';

		}else

		{

			$check_poin=$this->master_model->mst_check('ms_customer_poin', 'id_customer', $id_customer);

			if($check_poin==false)

			{

				echo'

					<button class="btn btn-default" disabled="disabled">

						Gunakan poin

					</button>

				';

			}else

			{

				$data_status=$this->master_model->select_in('ms_customer', 'status', "WHERE ID=$id_customer");

				$status=$data_status[0]->status;

				if($status==0)

				{

					echo'

						<button class="btn btn-default" disabled="disabled">

							Gunakan poin

						</button>

					';

				}else

				{

					$data_product_by_code =  $this->master_model->data_product_by_code($code);

					if($price=='price')

					{

						$subtotal = $data_product_by_code[0]->price;

					}else

					{

						$subtotal = $price;

					}

					$subtotal = $subtotal*$qty;

					$subtotal=$subtotal_1+$subtotal;



					$get_poin_custumer=$this->master_model->get_poin_custumer($id_customer);



					//$id_poin=$this->master_model->mst_last_id_2('ms_customer_poin');



					//$data_poin=$this->master_model->select_in('ms_customer_poin','*',"WHERE id_customer=$id_customer AND ID=$id_poin");



					//$poin=$data_poin[0]->saldo;



					$potong_poin=number_format($get_poin_custumer);



					if($potong_poin < 1)

					{

						echo'

							<button class="btn btn-default" disabled="disabled">

								Gunakan poin

							</button>

						';

					}else

					{

						echo'

							



				



							<script>



								$(document).ready(function()



								{



									//$(".disable").prop("disabled", false);



									



									$(".use_poin_2").click(function()



										{



										var sum = 0;



										var potong_poin_2='.$get_poin_custumer.';



										



										var rows = $(".choice").length;



										



										//$(".disable").prop("disabled", true);



										



										for (i=0; i < rows; i++)



										{



											sum = sum + parseInt(document.getElementsByName("choice")[i].value);



										}



									



										var grandtotal=sum - potong_poin_2;



										



										if(potong_poin_2 > sum)



										{



											var potong_poin_2=sum;



										}else



										{



											var potong_poin_2=addCommas(potong_poin_2);



										}



										



										if(grandtotal < 1)



										{



											var grandtotal=0;



										}else



										{



											var grandtotal=grandtotal;



										}



										



										$("#potong_poin").html(addCommas(potong_poin_2)); 



										



										//alert(grandtotal);



										//return false;



										



										$("#grandtotal").html(addCommas(grandtotal));



										



										$("#poin_customer_fill").val(potong_poin_2);



										



										$("#grandtotal_fill").val(grandtotal);



										



									});



								});



							</script>



					



					



							<button class="btn btn-info btn-fill disable use_poin_2">



								Gunakan poin



							</button>



						';



					}



				}



			}



		}



	}



	



	public function update_grand_total($ID, $subtotal, $poin)



	{



		$grand_total=$subtotal-$poin;



		



		if($poin > $subtotal)



		{



			$grand_total=0;



		}else



		{



			$grand_total=$grand_total;



		}



		



		$poin_now=$poin-$subtotal;



		if($subtotal > $poin)



		{



			$poin_now=0;



		}else



		{



			$poin_now=$poin_now;



		}



		



		$all = number_format($poin).'%'.number_format($grand_total).'%'.number_format($poin_now);



		



		echo $all;



	}



	



	public function get_qty($ID, $subtotal, $poin_1, $id_customer)

	{

		$data['ID']=$ID;

		$data['subtotal']=$subtotal;

		$data['poin_1']=$poin_1;

		$data['id_customer']=$id_customer;

		$this->load->view('admin/nota/insert_qty', $data);

	}



	



	public function update_subtotal($ID, $price, $total, $poin_1, $id_category)



	{



		$qty=$this->input->post('qty');



		



		//$data_product_by_code =  $this->master_model->data_product_by_code($code);



		//$id_category=$data_product_by_code[0]->id_category;



		



		$subtotal=$qty*$price;



		



		$get_poin=$this->master_model->select_in('config_global','konversi_poin',"WHERE ID = 1");



		$konversi=$get_poin[0]->konversi_poin;



		



		$today=date('Y-m-d');



		$yesterday = strtotime ( '-1 day' , strtotime ($today));



		$yesterday = date('Y-m-d', $yesterday);



		//$get_promo=$this->master_model->select_in('ms_promo','*',"WHERE expired > '$yesterday' AND flag=1");



		



		$get_promo=$this->master_model->select_in('ms_promo','*',"WHERE id_category=$id_category AND expired > '$yesterday' AND flag=1");



				



		$num_promo=count($get_promo);



		if($num_promo=='')



		{



			$get_poin=0;



			$poin = '&nbsp;0';



			$choice_poin = 0;



		}else



		{



			$promo=$get_promo[0]->poin;



			$id_category_promo=$get_promo[0]->id_category;



			$expired=$get_promo[0]->expired;



			$flag=$get_promo[0]->flag;



		



			$get_poin=$promo;



			$poin = '&nbsp;'.number_format($get_poin);



			$choice_poin =$get_poin;



			



		}



			



		$grandtotal=$subtotal+$total;



		$value_poin=$konversi*$grandtotal/100;



			



		$poin=$get_poin*$qty;



		$total_poin_2=($get_poin*$qty)+$poin_1;



		



		$poin = '&nbsp;'.number_format($poin);



		$total_poin = 'Total poin barang : <i class="fa fa-gift text-yellow"> '.number_format($total_poin_2).'</i>';



		/*$total_poin_fill = str_replace(',','.',number_format($get_poin+$poin_1));*/



		$value_poin2=number_format($value_poin).' <i class="fa fa-gift text-red"></i>';



		



		$new_poin=number_format($value_poin+$total_poin_2).' <i class="fa fa-gift text-red"></i>';



	



		



		$total_delete=$total+$subtotal;



		$total_delete=$total_delete-$subtotal;



		



		$total_poin_delete=$get_poin+$poin_1;



		$total_poin_delete = $total_poin_delete-$get_poin;



		$delete='



			<span class="text-red pull-right deleterow'.$ID.'" style="cursor:pointer"><i class="fa fa-trash-o"></i></span>



			<script language="JavaScript">



				function addCommas(nStr) 



				{



					nStr += "";



					x = nStr.split(",");



					x1 = x[0];



					x2 = x.length > 1 ? "," + x[1] : "";



					var rgx = /(\d+)(\d{3})/;



					while (rgx.test(x1)) 



					{



						x1 = x1.replace(rgx, "$1" + "," + "$2");



					}



					return x1 + x2;



				}



			</script>



			<script>



				$(".deleterow'.$ID.'").click(function(event)



				{



					var total_delete='.$total_delete.';



					var total_poin_delete='.$total_poin_delete.';



					



					$("#total_poin").html("Total poin barang : "+addCommas(total_poin_delete));



					



					$("#total").html(addCommas(total_delete));



					$("#grandtotal").html(addCommas(total_delete));



					



					$(this).closest("tr").remove();



				});



			</script>



		';







		



		if($ID<11)



		{



			//$total=$total;



			$delete=$delete;



		}else



		{



			//$total=$subtotal_1;



			$delete='';



		}



				



		$all = number_format($subtotal).''.$delete.'%'.number_format($grandtotal).'%'.number_format($grandtotal).'%'.$poin.'%'.$total_poin.'%'.$value_poin2.'%'.$new_poin.'%'.$subtotal.'%'.$choice_poin;



		



		echo $all;



	}



	



	



	public function get_price($ID, $subtotal, $qty, $poin_1, $id_customer)

	{
		$code = $this->input->post('code');



		//$mst_check=$this->master_model->mst_check('ms_product', 'code', $code);



		$mst_check=$this->master_model->check_code($code);





		if($mst_check == false)

		{

			echo'error';

		}else

		{

			$data_product_by_code =  $this->master_model->data_product_by_code($code);

			$id_product=$data_product_by_code[0]->ID;

			$id_category=$data_product_by_code[0]->id_category;

			

			

			//$price = $data_history[0]->price;



			//$subtotal=$qty*$price;



			



			//$total=$subtotal+$total;



			$check_history=$this->master_model->check_history($id_customer, $id_product);



			if($check_history==false)

			{

				$price=$data_product_by_code[0]->price;

				

				$history='

					

				';

			}else

			{

				$price=$this->master_model->price_history($id_customer, $id_product);

				

				$history='



					<script>



						$(document).ready(function(e) 

						{

							$("#history'.$ID.'").click(function()

							{

								 var id_product = '.$id_product.';

								  $.ajax({

									 type: "POST",

									 dataType: "html",

									 url: "'.base_url().'admin/transaction/history/'.$ID.'/'.$subtotal.'/'.$qty.'/'.$poin_1.'/'.$id_customer.'/'.$code.'",



									 data:"id_product="+id_product,

									 success: function(msg)

									 {

										  $(".modal-content").html(msg); 

									 }

								  }); 

							});

						});

					</script>



	



					<a alt="'.$id_product.'" class="input-group-addon" id="history'.$ID.'" style="cursor:pointer" data-toggle="modal" data-target="#history-popup">



						<i class="fa fa-history"></i>



					</a>



					



				';



			}



			



			$ID1=$ID+1;



			$ID2=$ID+2;



			echo'



				



				<script type="text/javascript">



					$(document).ready(function()



					{



						$(".price'.$ID.'").focusout(function (e)



						{



							var harga = $(this).val();



							



							$.ajax({



								 type:"POST",



								 url: "'.base_url().'admin/transaction/update_price/'.$ID.'/'.$subtotal.'/'.$qty.'/'.$poin_1.'/'.$id_category.'",



								 data:"harga="+harga,



								 success:function(msg)



								 {



									 var data_price = msg;



                            



									var expl  	    = data_price.split("%");



									var subtotal    = expl[0];



									var total       = expl[1];



									var grandtotal  = expl[2];



									var value_poin  = expl[3];



									var new_poin    = expl[4];



									var total_poin_fill    = expl[5];



									var choice      = expl[6];



									var choice_poin  = expl[7];



									



									$("#subtotal'.$ID.'").html(subtotal);



									//$("#total").html(total);



									//$("#grandtotal").html(grandtotal);



									//$("#new_poin").html(value_poin);



									//$("#value_poin").html(new_poin);



									



									$("#choice'.$ID.'").val(choice);



									$("#choice_poin'.$ID.'").val(choice_poin);



									$(".update").find("span").trigger("click");



									



									$("#price_fill'.$ID.'").val(harga);



									//$("#total_fill").val(total);



									//$("#grandtotal_fill").val(grandtotal);



									//$("#total_poin_fill").val(total_poin_fill);



									



									//$("#tags'.$ID1.'").focus();



								 }



							});



						});



					});



				</script>



				



				<div class="form-group box-title" style="width:120px">



                    <div class="input-group">



                        <input type="text" name="harga" id="price'.$ID.'" class="form-control price'.$ID.'" placeholder="Harga" value="'.$price.'"/><!--tags_row'.$ID.'-->



                        '.$history.'



                    </div>



                </div>



			';



		}



	}



	



	public function update_price($ID, $total, $qty, $poin_1, $id_category)



	{



		$harga = $this->input->post('harga');



		



		$subtotal=$harga*$qty;



		



		$total=$subtotal+$total;



		



		



		$get_poin=$this->master_model->select_in('config_global','konversi_poin',"WHERE ID = 1");



		$konversi=$get_poin[0]->konversi_poin;



		



		$value_poin=$konversi*$total/100;



		$value_poin2=number_format($value_poin).' <i class="fa fa-gift text-red"></i>';



		



		



		$today=date('Y-m-d');



		$yesterday = strtotime ( '-1 day' , strtotime ($today));



		$yesterday = date('Y-m-d', $yesterday);



		$get_promo=$this->master_model->select_in('ms_promo','*',"WHERE id_category=$id_category AND expired > '$yesterday' AND flag=1");



				



		$num_promo=count($get_promo);



		if($num_promo=='')



		{



			$get_poin=0;



			$poin = '&nbsp;0';



			$choice_poin = 0;



		}else



		{



			$promo=$get_promo[0]->poin;



			$id_category_promo=$get_promo[0]->id_category;



			$expired=$get_promo[0]->expired;



			$flag=$get_promo[0]->flag;



		



			$get_poin=$promo;



			$poin = '&nbsp;'.number_format($get_poin);



			$choice_poin =$get_poin*$qty;



			



		}



		



		$total_poin=($get_poin*$qty)+$poin_1;



		



		



		$new_poin=number_format(($get_poin*$qty)+$value_poin+$poin_1).' <i class="fa fa-gift text-red"></i>';



		



		$total_delete=$total+$subtotal;



		$total_delete=$total_delete-$subtotal;



		



		$total_poin_delete=$get_poin+$poin_1;



		$total_poin_delete = $total_poin_delete-$get_poin;



		$delete='



			<span class="text-red pull-right deleterow'.$ID.'" style="cursor:pointer"><i class="fa fa-trash-o"></i></span>



			<script language="JavaScript">



				function addCommas(nStr) 



				{



					nStr += "";



					x = nStr.split(",");



					x1 = x[0];



					x2 = x.length > 1 ? "," + x[1] : "";



					var rgx = /(\d+)(\d{3})/;



					while (rgx.test(x1)) 



					{



						x1 = x1.replace(rgx, "$1" + "," + "$2");



					}



					return x1 + x2;



				}



			</script>



			<script>



				$(".deleterow'.$ID.'").click(function(event)



				{



					var total_delete='.$total_delete.';



					var total_poin_delete='.$total_poin_delete.';



					



					$("#total_poin").html("Total poin barang : "+addCommas(total_poin_delete));



					



					$("#total").html(addCommas(total_delete));



					$("#grandtotal").html(addCommas(total_delete));



					



					$(this).closest("tr").remove();



				});



			</script>



		';



		



		if($ID<11)



		{



			//$total=$total;



			$delete=$delete;



		}else



		{



			//$total=$subtotal_1;



			$delete='';



		}



		



		$all = number_format($subtotal).''.$delete.'%'.number_format($total).'%'.number_format($total).'%'.$value_poin2.'%'.$new_poin.'%'.$total_poin.'%'.$subtotal.'%'.$choice_poin;



		



		echo $all;



	}



	



	



	



	public function history($id_nota_detail, $total, $qty, $poin_1, $id_customer, $code)



	{



		$id_product=$this->input->post('id_product');



		



		$data['id_product']=$id_product;



		$data['id_nota_detail']=$id_nota_detail;



		$data['total']=$total;



		$data['qty']=$qty;



		$data['poin_1']=$poin_1;



		$data['id_customer']=$id_customer;



		$data['code']=$code;



		$this->load->view('admin/nota/history', $data);



	}



	



	



	



	



	



	



	



	



	



	public function insert_nota($menuid)
	{		
		//print_array($this->input->post());
		//exit;

		$id_customer=$this->input->post('id_customer');
		$submit=$this->input->post('submit');
		$code=$this->input->post('code');
		$qty=$this->input->post('qty');
		$price=$this->input->post('price');
		$name=$this->input->post('name');

		$total=$this->input->post('total');
		$grandtotal=$this->input->post('grandtotal');
		$poin_total=$this->input->post('poin_total');
		$poin_customer=$this->input->post('poin_customer');

		$grandtotal=str_replace(',','',$grandtotal);

		$get_poin=$this->master_model->select_in('config_global','konversi_poin',"WHERE ID = 1");
		$konversi=$get_poin[0]->konversi_poin;

		$value_poin=$konversi*$grandtotal/100;

		//$value_poin=$value_poin+$poin_total;

		$poin_new=$poin_total+$value_poin;
		$id_ts = $this->master_model->mst_last_id('ts_nota');
		$today=date('Y-m-d H:i:s');

		$invoice=$this->master_model->create_invoice('POS',$id_ts);

		$id_admin=$this->session->userdata('id_admin');

		$data_nota = array(
			'ID'    		  => $id_ts,
			'no_nota'   	     => $invoice,
			'id_customer'	 => $id_customer,
			'id_admin'	 	=> $id_admin,
			'date_in' 	  	 => $today,
			'total' 	  	   => str_replace(',','',$total),
			'poin_customer'   => str_replace(',','',$poin_customer),
			'grand_total'     => $grandtotal,
			'poin_total'      => floor($poin_total),
			'poin_value'      => floor($value_poin),
			'poin_new'        => floor($poin_new),
			'sort'        	=> $id_ts,

		);

		$this->db->insert('ts_nota', $data_nota);

		for($a=0; $a < count($code); $a++)
		{
			if($code[$a] <> '')
			{
				$ID = $this->master_model->mst_last_id('ts_nota_detail');

				$data_product_by_code =  $this->master_model->data_product_by_code($code[$a]);

				$id_product=$data_product_by_code[0]->ID;

				$id_category=$data_product_by_code[0]->id_category;
				//$price=$data_product_by_code[0]->price;
				$subtotal=$price[$a]*$qty[$a];
				$get_poin=$this->master_model->select_in('config_global','konversi_poin',"WHERE ID = 1");

				$konversi=$get_poin[0]->konversi_poin;

				$today=date('Y-m-d');
				$yesterday = strtotime ( '-1 day' , strtotime ($today));
				$yesterday = date('Y-m-d', $yesterday);
				//$get_promo=$this->master_model->select_in('ms_promo','*',"WHERE expired > '$yesterday' AND flag=1");
				$get_promo=$this->master_model->select_in('ms_promo','*',"WHERE id_category=$id_category AND expired > '$yesterday' AND flag=1");

				$num_promo=count($get_promo);

				if($num_promo=='')
				{
					$get_poin=0;
					$poin = 0;
				}else
				{
					$promo=$get_promo[0]->poin;
					$id_category_promo=$get_promo[0]->id_category;
					$expired=$get_promo[0]->expired;
					$flag=$get_promo[0]->flag;
					$get_poin=$promo;
					$poin = $get_poin*$qty[$a];
				}

				/*
				$num_promo=count($get_promo);

				if($num_promo=='')
				{
					$get_poin=0;
				}else
				{
					$promo=$get_promo[0]->poin;
					$id_category_promo=$get_promo[0]->id_category;
					if($id_category==$id_category_promo)
					{
						$get_poin=$promo;
						$poin = $get_poin*$qty[$a];
					}else
					{
						$get_poin=0;
						$poin = 0;
					}
				}
				*/

				$data_nota_detail = array(
					'ID'    		  => $ID,
					'id_ts'   	       => $id_ts,
					'id_product' 	  => $id_product,
					'name' 	        => $name[$a],
					'price' 	  	   => $price[$a],
					'qty' 	  		 => $qty[$a],
					'subtotal' 	  	=> $subtotal,
					'poin' 	  		=> $poin,
				);

				$this->db->insert('ts_nota_detail', $data_nota_detail);
			}
		}

		//$check_poin=$this->master_model->mst_check('ms_customer_poin', 'id_customer', $id_customer);

		if($poin_customer=='')
		{
		}else
		{
			$poin=$this->master_model->last_id_poin($id_customer);

			$poin_customer=str_replace(',','',$poin_customer);



			//$id_poin=$this->master_model->mst_last_id_2('ms_customer_poin');

			//$data_poin=$this->master_model->select_in('ms_customer_poin','*',"WHERE id_customer=$id_customer AND ID=$id_poin");

			//$poin=$data_poin[0]->saldo;

			$saldo=$poin-$poin_customer;

			$id_customer_poin = $this->master_model->mst_last_id('ms_customer_poin');

			$insert_poin=array
			(
				'ID'=>$id_customer_poin,
				'id_customer'=>$id_customer,
				'id_verification'=>0,
				'id_nota'=>$id_ts,
				'name'=>'Pemakaian poin dari nota #'.$invoice,
				'debit'=>floor($poin_customer),
				'kredit'=>0,
				'saldo'=>floor($saldo),
				'action_date'=>date('Y-m-d H:i:s'),
				'status'=>1,
				'sort'=>$id_customer_poin,
			);
			$this->db->insert('ms_customer_poin', $insert_poin);
		}
		
		if($submit==1)
		{
			redirect('admin/transaction/nota/'.$menuid);
		}elseif($submit==2)
		{
			redirect('admin/transaction/insert/'.$menuid.'/'.$id_customer);
		}elseif($submit==3)
		{
			redirect('admin/transaction/invoice/'.$menuid.'/'.$id_ts);
		}
	}



	



	public function invoice($menuid, $id_ts)



	{



		$data['data_header']=$this->master_model->select_in('ts_nota','*',"WHERE ID=$id_ts");



		$data['data_product']=$this->master_model->select_in('ts_nota_detail','*',"WHERE id_ts=$id_ts ORDER BY ID ASC");



		$this->load->view('admin/nota/invoice', $data);



	}



	



	public function invoice_print($menuid, $id_ts)



	{



		$data['data_header']=$this->master_model->select_in('ts_nota','*',"WHERE ID=$id_ts");



		$data['data_product']=$this->master_model->select_in('ts_nota_detail','*',"WHERE id_ts=$id_ts");



		$this->load->view('admin/nota/invoice_print', $data);



	}



	



	



	public function settle_nota($menuid)



	{



		$ID=$this->input->post('ID');



		$checkbox=$this->input->post('checkbox');



		



		if($checkbox=='')



		{



			redirect('admin/transaction/nota/'.$menuid);



		}else



		{



			$data['checkbox']=$checkbox;



			



			$this->load->view('admin/nota/settle_nota', $data);



			



		}



	}



	



	public function get_settle()



	{



		$ID = $this->input->post('id');



		



		$data_nota=$this->master_model->select_in('ts_nota', '*', "WHERE ID=$ID");



		$total=$data_nota[0]->total;



		$date_in=$data_nota[0]->date_in;



		$date=strtotime($date_in);



		



		$all = str_replace(',','.',number_format($total)).'%'.date('d/m/Y', $date).'%'.str_replace(',','.',number_format($total));



		



		echo $all;



	}



	



	



	public function settlement($menuid)



	{



		define("menuid",$menuid);



		$user_id = $this->session->userdata('UserID');



		$this->redirectNoAuthRead($user_id, $menuid);



			



		$data['data_nota']=$this->master_model->select_in('ts_nota','*',"WHERE id_settlement=0 AND status=0 ORDER BY ID ASC");



		$this->load->view('admin/settlement/main', $data);



	}



	



	



	



	public function selected($menuid)

	{

		$submit=$this->input->post('submit');

		$ID=$this->input->post('ID');



		if($submit==1)

		{

			if($ID=='')

			{

				redirect('admin/transaction/settlement/'.$menuid);

			}else

			{

				$this->load->view('admin/settlement/settle_step_2');

			}

		}elseif($submit=='')

		{

			if($ID=='')

			{

				redirect('admin/transaction/settlement/'.$menuid);

			}else

			{

				$this->load->view('admin/settlement/settle_step_2');

			}

		}else

		{

			if($ID=='')

			{

				redirect('admin/transaction/nota/'.$menuid);

			}else

			{

				$this->load->view('admin/settlement/settle_step_2');

			}

		}

	}



	public function settle_now($menuid)

	{

		$password = $this->input->post('password');

		$user_id = $this->session->userdata('UserID');



		$password= md5(sha1($password));

		$check_password=$this->master_model->mst_check_2('usermst',"UserID='$user_id' AND UserPwd='$password'");



		if($check_password==false)

		{

			echo'wrong_password';

		}else

		{

			echo'true_password';

		}

	}



	public function settle_proccess($menuid)

	{
		//print_array($this->input->post());
		//exit;

		$ID       = $this->input->post('ID');

		$nota     = $this->input->post('nota');

		$total    = $this->input->post('total');

		$password = $this->input->post('password');



		$password= md5(sha1($password));





		if($ID=='')

		{

			redirect('admin/transaction/daftar_settlement/'.$menuid);

		}else

		{

			define("menuid",$menuid);

			$user_id = $this->session->userdata('UserID');



			$this->redirectNoAuthRead($user_id, $menuid);



			$check_password=$this->master_model->mst_check_2('usermst',"UserID='$user_id' AND UserPwd='$password'");



			if($check_password==false)

			{

				//print_array($this->input->post());

				//exit;/

				

				redirect('admin/transaction/wrong_password/'.$menuid);

				

				//echo'<meta http-equiv="refresh" content="0">';

			}else

			{



				//echo 'Berhasil';



				//exit;



				



				$id_settlement = $this->master_model->mst_last_id('ts_settlement');



				



				$invoice=$this->master_model->create_invoice('SET',$id_settlement);



				



				$data_header=array

				(

					'ID'=>$id_settlement,

					'no_settlement'=>$invoice,

					'id_admin'=>$user_id,

					'jml_nota'=>str_replace(',','',$nota),

					'total'=>str_replace(',','',$total),

					'date_in'=>date('Y-m-d H:i:s'),

					'status'=>0,

					'sort'=>$id_settlement,



				);



				$this->db->insert('ts_settlement', $data_header);



				//print_array($ID);



				for($a=0; $a < count($ID); $a++)

				{

					$data_detail=$this->master_model->select_in('ts_nota_detail','*',"WHERE id_ts=$ID[$a]");

					$id_ts=$data_detail[0]->id_ts;

					//print_array($data_header);

					//$qty_now=0;

					

					for($b=0; $b < count($data_detail); $b++)

					{

						$id_product=$data_detail[$b]->id_product;

						$qty=$data_detail[$b]->qty;

						$price=$data_detail[$b]->price;

						$check_record=$this->master_model->check_record('ts_settlement_detail', $id_settlement, $id_product, $price);

						$id_settlement_detail = $this->master_model->mst_last_id('ts_settlement_detail');

						

						

						//echo $check_record;

						//exit;

												

						if($check_record==false)

						{

							//echo 'Insert';

							//exit;

							$total=$price*$qty;

							$data_settlement_detail=array

							(

								'ID'=>$id_settlement_detail,

								'id_settlement'=>$id_settlement,

								'id_nota'=>$ID[$a],

								'id_product'=>$id_product,

								'qty'=>$qty,

								'price'=>$price,

								'total'=>$total,

							);

							$this->db->insert('ts_settlement_detail', $data_settlement_detail);

						}else

						{

							//echo 'Update';

							//exit;

							

							//$exp=explode('%', $check_record);

							//$id_record=$exp[0];

							//$qty_record=$exp[1];

							

							$data_detail_settlement=$this->master_model->select_in('ts_settlement_detail','*',"WHERE ID=$check_record");

							$qty_record=$data_detail_settlement[0]->qty;

							

							//echo $qty_record.';'.$price.';'.$check_record;

							//exit;

							

							$qty=$qty_record+$qty;

							$total=$price*$qty;



							$data_settlement_detail=array

							(

								'qty'=>$qty,

								'total'=>$total,

							);

							$this->db->where('ID', $check_record);

							$this->db->update('ts_settlement_detail', $data_settlement_detail);

						}

						

						$data_nota=array

						(

							'id_settlement'=>$id_settlement,

							'status'=>1,

						);

						$this->db->where('ID', $ID[$a]);

						$this->db->update('ts_nota', $data_nota);

					}
				}
			}

			redirect('admin/transaction/settle_done/'.$menuid.'/'.$id_settlement);

			//$this->load->view('admin/settlement/settle_process/'.$menuid.'/'.$id_settlement);
		}
	}



	



	public function settle_done($menuid, $id_settlement)



	{



		$data['data_settlement']=$this->master_model->select_in('ts_settlement','*',"WHERE ID=$id_settlement");



		$this->load->view('admin/settlement/settle_process', $data);



	}



	



	



	public function wrong_password($menuid)

	{

		$submit=$this->input->post('submit');

		$ID       = $this->input->post('ID');

		$nota     = $this->input->post('nota');

		$total    = $this->input->post('total');

		

		if($submit==1)

		{

			$ID=$this->input->post('ID');

			if($ID=='')

			{

				redirect('admin/transaction/settlement/'.$menuid);

			}else

			{

				$data['ID']=$ID;

				$data['nota']=$nota;

				$data['total']=$total;

				$this->load->view('admin/settlement/settle_step_2', $data);

			}

		}else

		{

			$data['ID']=$ID;

			$data['nota']=$nota;

			$data['total']=$total;

			$this->load->view('admin/settlement/settle_step_2', $data);

		}

	}

	

	



	public function daftar_settlement($menuid)

	{

		define("menuid",$menuid);

        $user_id = $this->session->userdata('UserID');

        $this->redirectNoAuthRead($user_id, $menuid);

		$data['data_settlement']=$this->master_model->mst_data('ts_settlement');

		$this->load->view('admin/settlement/settle_daftar', $data);

	}



	public function settle_invoice($menuid, $id_settlement)

	{

		define("menuid",$menuid);

        $user_id = $this->session->userdata('UserID');

        $this->redirectNoAuthRead($user_id, $menuid);

		

		$data['data_header']=$this->master_model->select_in('ts_settlement','*',"WHERE ID=$id_settlement");

		$this->load->view('admin/settlement/settle_invoice', $data);

	}

	

	public function nota_invoice_popup($menuid)

	{

		$id_nota=$this->input->post('ID');

		

		define("menuid",$menuid);

        $user_id = $this->session->userdata('UserID');

        $this->redirectNoAuthRead($user_id, $menuid);

		

		$data['data_header']=$this->master_model->select_in('ts_nota','*',"WHERE ID=$id_nota");

		$data['data_product']=$this->master_model->select_in('ts_nota_detail','*',"WHERE id_ts=$id_nota ORDER BY ID ASC");

		$data['id_nota']=$id_nota;

		$data['menuid']=$menuid;

		$this->load->view('admin/nota/nota_invoice_popup', $data);

	}



	public function settle_invoice_popup($menuid)

	{

		$id_settlement=$this->input->post('ID');

		

		define("menuid",$menuid);

        $user_id = $this->session->userdata('UserID');

        $this->redirectNoAuthRead($user_id, $menuid);

		

		$data['data_header']=$this->master_model->select_in('ts_settlement','*',"WHERE ID=$id_settlement");

		$data['id_settlement']=$id_settlement;

		$data['menuid']=$menuid;

		$this->load->view('admin/settlement/settle_invoice_popup', $data);

	}



	public function settle_invoice_print($menuid, $id_settlement)



	{



		define("menuid",$menuid);



        $user_id = $this->session->userdata('UserID');



        $this->redirectNoAuthRead($user_id, $menuid);



		



		$data['data_header']=$this->master_model->select_in('ts_settlement','*',"WHERE ID=$id_settlement");



		$data['data_product']=$this->master_model->select_in('ts_settlement_detail','*',"WHERE id_settlement=$id_settlement");



		$this->load->view('admin/settlement/settle_invoice_print', $data);



	}



	



	public function search_settlement($menuid)

	{

		$date=$this->input->post('date_in');

		

		$this->session->set_userdata('search_date_settlement', $date);

		

		redirect('admin/transaction/daftar_settlement/'.$menuid);



	}



	



	public function delete_settlement($menuid, $id_settlement)

	{

		$data_nota=$this->master_model->select_in('ts_nota','*',"WHERE id_settlement=$id_settlement");

		for($a=0; $a < count($data_nota); $a++)

		{

			$id_nota=$data_nota[$a]->ID;

			$data=array

			(

				'id_settlement'=>0,

				'status'=>0,

			);

			

			$this->db->where('ID', $id_nota);

			$this->db->update('ts_nota', $data);

		}

		

		$this->db->where('ID', $id_settlement);

		$this->db->delete('ts_settlement');



		$this->db->where('id_settlement', $id_settlement);

		$this->db->delete('ts_settlement_detail');

		

		redirect('admin/transaction/daftar_settlement/'.$menuid);

	}



	



	



	public function settle_detail($menuid)



	{



		//$this->load->view('admin/settlement/settle_detail');



	}



	



	public function verification($menuid)



	{



		define("menuid",$menuid);



        $user_id = $this->session->userdata('UserID');



        $this->redirectNoAuthRead($user_id, $menuid);



		



		$data['data_verification']=$this->master_model->select_in('ts_verification','*',"ORDER BY ID ASC");



		$this->load->view('admin/verification/main', $data);



	}



	



	public function verified($menuid)



	{



		define("menuid",$menuid);



        $user_id = $this->session->userdata('UserID');



        $this->redirectNoAuthRead($user_id, $menuid);



		



		$data['data_settlement']=$this->master_model->select_in('ts_settlement','*',"WHERE id_verification=0 AND status<>1 ORDER BY ID ASC");



		$this->load->view('admin/verification/verification', $data);



	}



	



	public function verify_selected($menuid)



	{



		$ID=$this->input->post('ID');



	



		if($ID=='')



		{



			redirect('admin/transaction/verified/'.$menuid);



		}else



		{



			$this->load->view('admin/verification/verification_step_2');



		}



	}



	



	



	public function verify_proccess($menuid)



	{

		//print_array($this->input->post());

		//exit;

		$ID       = $this->input->post('ID');

		$nota     = $this->input->post('nota');

		$total    = $this->input->post('total');

		$password = $this->input->post('password');

		$password= md5(sha1($password));

		if($ID=='')

		{

			redirect('admin/transaction/verification/'.$menuid);

		}else

		{

			//define("menuid",$menuid);

			$user_id = $this->session->userdata('UserID');

			//$this->redirectNoAuthRead($user_id, $menuid);



			$check_password=$this->master_model->mst_check_2('usermst',"UserID='$user_id' AND UserPwd='$password'");

			if($check_password==false)

			{

				//print_array($this->input->post());



				//exit;

				redirect('admin/transaction/wrong_password/'.$menuid);

			}else

			{

				//echo 'Berhasil';



				//exit;

				$id_verification = $this->master_model->mst_last_id('ts_verification');



				$invoice=$this->master_model->create_invoice('VER',$id_verification);



				$data_header=array

				(

					'ID'=>$id_verification,

					'no_verification'=>$invoice,

					'id_admin'=>$user_id,

					'jml_settlement'=>str_replace(',','',$nota),

					'total'=>str_replace(',','',$total),

					'date_in'=>date('Y-m-d H:i:s'),

					'status'=>0,

					'sort'=>$id_verification,

				);

				$this->db->insert('ts_verification', $data_header);



				//print_array($ID);

				for($a=0; $a < count($ID); $a++)

				{

					$data_nota=$this->master_model->select_in('ts_nota','*',"WHERE id_settlement=$ID[$a]");

					for($n=0; $n < count($data_nota); $n++)

					{

						$id_nota=$data_nota[$n]->ID;

						$no_nota=$data_nota[$n]->no_nota;

						$poin_new=$data_nota[$n]->poin_new;

						$id_customer=$data_nota[$n]->id_customer;

						

						

							$poin=$this->master_model->last_id_poin($id_customer);

							//$id_poin=$this->master_model->mst_last_id_2('ms_customer_poin');

							//$data_poin=$this->master_model->select_in('ms_customer_poin','*',"WHERE id_customer=$id_customer AND ID=$id_poin");

							//$poin=$data_poin[0]->saldo;

							$saldo=$poin+$poin_new;

						



						$id_customer_poin = $this->master_model->mst_last_id('ms_customer_poin');



						$insert_poin=array

						(

							'ID'=>$id_customer_poin,

							'id_customer'=>$id_customer,

							'id_verification'=>$id_verification,

							'id_nota'=>$id_nota,

							'name'=>'Poin dari nota #'.$no_nota,

							'debit'=>0,

							'kredit'=>floor($poin_new),

							'saldo'=>floor($saldo),

							'action_date'=>date('Y-m-d H:i:s'),

							'status'=>0,

							'sort'=>$id_customer_poin,

						);

						$this->db->insert('ms_customer_poin', $insert_poin);

					}

					

					$data_settlement=array

					(

						'id_verification'=>$id_verification,

						'status'=>1,

					);

					$this->db->where('ID', $ID[$a]);

					$this->db->update('ts_settlement', $data_settlement);



					$id_verification_detail = $this->master_model->mst_last_id('ts_verification_detail');

					$insert_detail=array

					(

						'ID'=>$id_verification_detail,

						'id_verification'=>$id_verification,

						'id_settlement'=>$ID[$a],

						'sort'=>$id_verification_detail,

					);

					$this->db->insert('ts_verification_detail', $insert_detail);

				}

			}

			redirect('admin/transaction/verification_done/'.$menuid.'/'.$id_verification);

			//$this->load->view('admin/verification/verification_process/'.$menuid.'/'.$id_verification);

		}

	}



	



	public function verification_done($menuid, $id_verification)



	{



		$data['data_verification']=$this->master_model->select_in('ts_verification','*',"WHERE ID=$id_verification");



		$this->load->view('admin/verification/verification_process', $data);



	}



	



	



	



	public function verification_invoice($menuid, $id_verification)



	{



		define("menuid",$menuid);



        $user_id = $this->session->userdata('UserID');



        $this->redirectNoAuthRead($user_id, $menuid);



		



		$data['data_verification']=$this->master_model->select_in('ts_verification','*',"WHERE ID=$id_verification");



		$this->load->view('admin/verification/verification_invoice', $data);



	}



	



	public function verification_invoice_print($menuid, $id_verification)



	{



		define("menuid",$menuid);



        $user_id = $this->session->userdata('UserID');



        $this->redirectNoAuthRead($user_id, $menuid);



		



		$data['data_verification']=$this->master_model->select_in('ts_verification','*',"WHERE ID=$id_verification");



		$this->load->view('admin/verification/verification_invoice_print', $data);



	}



	public function verification_delete($menuid, $id_verification)
	{
		$user_id = $this->session->userdata('UserID');

		$data_verification=$this->master_model->select_in('ts_verification','*',"WHERE ID=$id_verification");
		$no_verification=$data_verification[0]->no_verification;

		$data_settlement=$this->master_model->select_in('ts_settlement','*',"WHERE id_verification=$id_verification");

		
		//print_array($data_settlement);
		//exit;

		for($a=0; $a < count($data_settlement); $a++)
		{
			$id_settlement=$data_settlement[$a]->ID;
			$data=array
			(
				'id_verification'=>0,
				'id_admin'=>$user_id,
				'status'=>2,
			);

			$this->db->where('ID', $id_settlement);
			$this->db->update('ts_settlement', $data);
			

			$data_nota=$this->master_model->select_in('ts_nota','*',"WHERE id_settlement=$id_settlement");

			//print_array($data_nota);
			//exit;

			for($b=0; $b < count($data_nota); $b++)
			{
				$id_nota=$data_nota[$b]->ID;
				$id_customer=$data_nota[$b]->id_customer;
				$poin_new=$data_nota[$b]->poin_new;

				/*$data_nota=array
				(
					//'id_settlement'=>0,
					//'id_admin'=>$user_id,
					'status'=>2,
				);

				$this->db->where('ID', $id_nota);
				$this->db->update('ts_nota', $data_nota);*/
				

				if($poin_new==0)
				{
				}else
				{
					$poin=$this->master_model->last_id_poin($id_customer);
					$saldo=$poin-$poin_new;
					$id_customer_poin = $this->master_model->mst_last_id('ms_customer_poin');

					$insert_poin=array
					(
						'ID'=>$id_customer_poin,
						'id_customer'=>$id_customer,
						'id_verification'=>$id_verification,
						'id_nota'=>$id_nota,
						'name'=>'Pembatalan proses verifikasi #'.$no_verification,
						'debit'=>$poin_new,
						'kredit'=>0,
						'saldo'=>$saldo,
						'action_date'=>date('Y-m-d H:i:s'),
						'status'=>1,
						'sort'=>$id_customer_poin,
					);
					$this->db->insert('ms_customer_poin', $insert_poin);
				}
			}
		}

		$this->db->where('ID', $id_verification);
		$this->db->delete('ts_verification');

		$this->db->where('id_verification', $id_verification);
		$this->db->delete('ts_verification_detail');

		redirect('admin/transaction/verification/'.$menuid);
	}



	

	public function history_transaction($menuid)

	{

		$customer_name=$this->input->post('customer_name');

		

		$check=$this->master_model->mst_check('ms_customer','name',$customer_name);

		

		if($check==false)

		{

			echo'

				<button class="btn btn-default btn-fill pull-left" disabled="disabled">

					History Transaksi

				</button>

			';

		}else

		{

			$data_customer=$this->master_model->select_in('ms_customer','*',"WHERE name='$customer_name'");

			$id_customer=$data_customer[0]->ID;

			echo'

				<button class="btn btn-default btn-fill pull-left" data-toggle="modal" data-target="#history-popup">

					History Transaksi

				</button>

				

				<div class="modal fade" id="history-popup" role="dialog">

					<div class="modal-dialog">

					  <div class="modal-content">

							<div class="modal-header">

							  <button type="button" class="close" data-dismiss="modal">&times;</button>

							  <h4 class="modal-title">Histori</h4>

							</div>

			

							<div class="modal-body">

								<table id="example1" class="table table-bordered table-striped">

									<thead>

										<tr>

											<th>

												No.

											</th>

											<th>

												Header

											</th>

											<th>

												Detail

											</th>

											<th>

												Pelunasan

											</th>

											<th>

												Admin

											</th>

										</tr>

									</thead>

				

									<tbody>

										';

											$data_nota=$this->master_model->select_in('ts_nota','*',"WHERE id_customer=$id_customer ORDER BY ID DESC");

											for($a=0; $a < count($data_nota); $a++)

											{

												$ID=$data_nota[$a]->ID;

												

												$b=$a+1;

												

												$date=$data_nota[$a]->date_in;

												$date=strtotime($date);

												

												$id_customer=$data_nota[$a]->id_customer;

												$data_customer=$this->master_model->select_in('ms_customer','*',"WHERE ID=$id_customer");

												

												$id_admin=$data_nota[$a]->id_admin;

												$data_admin=$this->master_model->select_in('usermst','*',"WHERE UserID=$id_admin");

												echo'

													<tr>

														<td style="vertical-align: top; text-align:center">

															'.$b.'

															<input type="hidden" name="ID[]" value="'.$ID.'">

														</td>

														<td style="vertical-align: top">

															<strong>'.date('d/m/Y', $date).'</strong>

															<br/>

															<a href="'.base_url().'admin/transaction/invoice/'.$menuid.'/'.$ID.'">

																'.$data_nota[$a]->no_nota.'

															</a>

															<br/>

															<a href="'.base_url().'admin/master/customer_detail/'.$menuid.'/'.$id_customer.'">

																'.$data_customer[0]->name.'

															</a>

														</td>

														<td style="vertical-align: top">

															';

																$data_nota_detail=$this->master_model->select_in('ts_nota_detail','*',"WHERE id_ts=$ID");

																for($b=0; $b < count($data_nota_detail); $b++)

																{

																	$id_product=$data_nota_detail[$b]->id_product;

																	$qty=$data_nota_detail[$b]->qty;

																	

																	$data_product=$this->master_model->select_in('ms_product','*',"WHERE ID=$id_product");

																	echo'

																		'.$data_product[0]->name.' * '.$qty.' '.$data_product[0]->unit.' @'.str_replace(',','.',number_format($data_nota_detail[$b]->price)).'

																		<br>

																	';

																}

															echo'

														</td>

														<td style="vertical-align: top">

															Total : <strong>'.str_replace(',','.',number_format($data_nota[$a]->total)).'</strong>

															<br />

															Pakai Poin : <strong>'.str_replace(',','.',number_format($data_nota[$a]->poin_customer)).'</strong>

															<br />

															Grand Total : <strong>'.str_replace(',','.',number_format($data_nota[$a]->grand_total)).'</strong>

															<br />

															Poin Baru : <strong>'.str_replace(',','.',number_format($data_nota[$a]->poin_new)).'</strong>

														</td>

														<td style="vertical-align: top">

															Entry : 

															<br />

															

															<strong>'.$data_admin[0]->UserName.' '.date('d/m/Y', $date).'</strong>

															<br />

															Settle :

															';

																$id_settlement=$data_nota[$a]->id_settlement;

																if($id_settlement==0)

																{

																	echo'';

																}else

																{

																	$get_data_settlement=$this->master_model->select_in('ts_settlement','*',"WHERE ID=$id_settlement");

																	echo '<a href="'.base_url().'admin/transaction/settle_invoice/28/'.$get_data_settlement[0]->ID.'" class="text-blue">'.$get_data_settlement[0]->no_settlement.'</a>';

																}

															echo'

				

															<br />

				

															<strong>

				

															';

																if($id_settlement==0)

																{

																	echo'<span class="text-red">Belum di Settle</span>';

																}else

																{

																	$get_data_settlement=$this->master_model->select_in('ts_settlement','id_admin, date_in',"WHERE ID=$id_settlement");

																	$id_admin=$get_data_settlement[0]->id_admin;

																	$date_in_settlement=$get_data_settlement[0]->date_in;

																	$date_in_settlement=strtotime($date_in_settlement);

																	$get_data_admin=$this->master_model->select_in('usermst','UserName',"WHERE UserID=$id_admin");

																	echo '<span class="text-black">'.$get_data_admin[0]->UserName.' '.date('d/m/Y', $date_in_settlement).'</span>';

																}

															echo'

															</strong>

														</td>

													</tr>

												';

											}

										echo'                  

									</tbody>

								</table>

							</div>

							<div class="modal-footer">

								<button type="button" class="btn btn-default pull-right" style="margin-right:5px;" data-dismiss="modal">Tutup</button>

							</div>

					  </div>

					</div>

				</div>

			';

		}

	}

	

	public function customer_to_row($menuid)

	{

		$customer_name=$this->input->post('customer_name');

		

		$check=$this->master_model->mst_check('ms_customer','name',$customer_name);

		

		if($check==false)

		{

			for($a=0; $a < 10; $a++)

			{

				$b=$a+1;

				echo'

					<tr>

						<td>

							'.$b.'

						</td>

						<td>

							<a class="right" title="" data-placement="right" data-toggle="tooltip" href="#" data-original-title="Sebelum memasukkan kode barang, pastikan anda memilih customer terlebih dahulu!">

							<input type="text" list="code" placeholder="Kode" id="tags" class="form-control" style="width:100px" required="required"/>

							</a>

						</td>

						<td>

							<input type="text" name="code" list="name" placeholder="Nama Barang" id="name_product" class="form-control" style="width:150px"/>

						</td>

						<td>

						</td>

						<td>

							<input type="text" name="qty" id="qty" style="width:50px; float:left" class="form-control" value="0"/>

						</td>

						<td>

							<input type="text" name="harga" id="price" style="width:80px;" class="form-control" placeholder="Price"/>

						</td>

						<td>

							<strong>0</strong>

						</td>

					</tr>

				';

			}

		}else

		{

			$data_customer=$this->master_model->select_in('ms_customer','*',"WHERE name='$customer_name'");

			$id_customer=$data_customer[0]->ID;

			

			$data['id_customer']=$id_customer;

			$data['menuid']=$menuid;

			$this->load->view('admin/nota/insert_row_1', $data);

		}

	}

	

	

	public function customer_to_poin($menuid)

	{

		$customer_name=$this->input->post('customer_name');

		

		$check=$this->master_model->mst_check('ms_customer','name',$customer_name);

		

		if($check==false)

		{

			echo'

				Jumlah poin yang terkumpul :

				<br />

			';

		}else

		{

			echo'

				Jumlah poin yang terkumpul :

				<br />

				';

					$data_customer=$this->master_model->select_in('ms_customer','*',"WHERE name='$customer_name'");

					$id_customer=$data_customer[0]->ID;

					

					$mst_check=$this->master_model->mst_check('ms_customer_poin','id_customer',$id_customer);

					if($mst_check==false)

					{

						$saldo='Belum Ada';

					}else

					{

						//$id_poin=$this->master_model->mst_last_id_2('ms_customer_poin');

						$get_poin_custumer=$this->master_model->get_poin_custumer($id_customer);

						//$data_poin=$this->master_model->select_in('ms_customer_poin','*',"WHERE id_customer=$id_customer AND ID=$id_poin");

						$saldo=number_format($get_poin_custumer);

					}

				echo'
				<strong>
					<span id="poin_now">'.$saldo.'</span> Poin
				</strong>
				<a href="" class="text-red" style="font-size:11px;" data-toggle="modal" data-target="#history-poin">
					History poin
				</a>
				<div class="modal fade" id="history-poin" role="dialog">
					<div class="modal-dialog">
					  <div class="modal-content" style="z-index:999">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">History Poin</h4>
						</div>
							<div class="modal-body">
								<table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>
                                            Tanggal
                                        </th>
                                        <th>
                                            Debet
                                        </th>
                                        <th>
                                            Kredit
                                        </th>
                                        <th>
                                            Saldo
                                        </th>
                                        <th>
                                            Deskripsi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                	';
										$data_poin = $this->master_model->select_in('ms_customer_poin','*',"WHERE id_customer=$id_customer ORDER BY ID DESC");
										for($a=0; $a < count($data_poin); $a++)
										{
											$b=$a+1;
											$date=$data_poin[$a]->action_date;
											$date=strtotime($date);
											echo'
												<tr>
													<td>
														'.$b.'
													</td>
													<td>
														'.date('d/m/Y', $date).'
													</td>
													<td>
														'.str_replace(',','.',number_format($data_poin[$a]->debit)).'
													</td>
													<td>
														'.str_replace(',','.',number_format($data_poin[$a]->kredit)).'
													</td>
													<td>
														'.str_replace(',','.',number_format($data_poin[$a]->saldo)).'
													</td>
													<td>
														'.$data_poin[$a]->name.'
													</td>
												</tr>
											';
										}
									echo'
                                </tbody>
                              </table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default pull-right" style="margin-right:5px;" data-dismiss="modal">Tutup</button>
							</div>
					  </div

					</div>
				</div>
				<script>
				$(function ()
				{
					$("#example1").DataTable
					(
					{
						"paging": true,
						"lengthMenu": [ 10, 20, 30, 40, 50 ],
						"pageLength": 10,
						"searching": true,
						"deferRender": true
					});
				});
				</script>
			';
		}
	}

	

	

	public function customer_to_otp($menuid)
	{
		$customer_name=$this->input->post('customer_name');

		$check=$this->master_model->mst_check('ms_customer','name',$customer_name);

		if($check==false)
		{
			echo'
				Kode OTP :
				<br />
			';
		}else
		{
			echo'

				<span class="pull-left">

				Kode OTP :

				<br />

				';

					$data_customer=$this->master_model->select_in('ms_customer','*',"WHERE name='$customer_name'");

					if($data_customer[0]->status==1)

					{

						$kodeOTP=$data_customer[0]->kodeOTP;

						

						if($kodeOTP=='')

						{

							$gen = $this->master_model->generateOTP(4);

						}else

						{

							$gen = $data_customer[0]->kodeOTP;

						}

						

						

						$otp='<strong>'.$gen.'</strong>';



						$sent_otp='

							<button href="" class="btn btn-default pull-right" disabled="disabled">

								Kirim Kode OTP

							</button>

						';

					}else

					{

						$otp='<span class="text-red">Belum Terverifikasi!!</span> <a href="'.base_url().'admin/master/edit_customer/9/'.$data_customer[0]->ID.'" class="text-blue pull-right">&nbsp; Verifikasi Sekarang</a>';

						$sent_otp='';

					}

					echo $otp;

				echo'

				</span>

				'.$sent_otp.'

			';

		}

	}

	

	public function customer_to_reset($menuid)

	{

		$customer_name=$this->input->post('customer_name');

		

		$check=$this->master_model->mst_check('ms_customer','name',$customer_name);

		

		if($check==false)

		{

			echo'

				<button class="btn btn-danger btn-fill pull-left" id="reset" style="cursor:pointer; margin-left:5px;" disabled="disabled">

					Batal

				</button>

			';

		}else

		{

			$data_customer=$this->master_model->select_in('ms_customer','name',"WHERE name='$customer_name'");

			echo'

				<button class="btn btn-danger btn-fill pull-left" id="reset" style="cursor:pointer; margin-left:5px;" data-toggle="modal" data-target="#ganti_customer">

					Batal

				</button>

				<div class="modal fade" id="ganti_customer" role="dialog">

					<div class="modal-dialog">

					  <div class="modal-content" style="z-index:999">

						<div class="modal-header">

						  <button type="button" class="close" data-dismiss="modal">&times;</button>

						  <h4 class="modal-title">Ganti Customer</h4>

						</div>

							<div class="modal-body" style="text-align:center">

								Apakah Anda yakin mengganti <strong>'.$data_customer[0]->name.'</strong> untuk pembuatan nota ini?

								<br />

								Klik <em>"Ganti Customer"</em> untuk mengganti.

							</div>

							<div class="modal-footer">

								<a class="btn btn-danger btn-fill pull-right" href="'.base_url().'admin/transaction/insert/'.$menuid.'">

									Ganti Customer

								</a>

								<button type="button" class="btn btn-default pull-right" style="margin-right:5px;" data-dismiss="modal">Tutup</button>

							</div>

					  </div>

					</div>

				</div>

			';

		}

	}

	

	public function customer_to_add_row($menuid)

	{

		$customer_name=$this->input->post('customer_name');

		

		$check=$this->master_model->mst_check('ms_customer','name',$customer_name);

		

		if($check==false)

		{

			echo'

				<a class="btn btn-primary addOption loading_btn" onClick="clickME()" id="load">Tambahkan Barang</a>

			';

		}else

		{

			$data_customer=$this->master_model->select_in('ms_customer','ID',"WHERE name LIKE '%$customer_name%'");

			$id_customer=$data_customer[0]->ID;

			?>
				<a class="btn btn-primary addOption loading_btn" onClick="clickME()" id="addRow" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">
                	Tambahkan Barang
                </a>

                <script>
					$('.loading_btn').on('click', function() 
					{
						var $this = $(this);
					    $this.button('loading');
						setTimeout(function()
						{
						   $this.button('reset');
					    }, 500);
					});
				</script>

                <script>
					$(document).ready(function()
					{
						var inc = 10;
						$(".addOption").on('click',function()
						{
							inc=inc+1;
							$("#row2"+inc+"").show();
							//alert(inc);
							//return false;		
							
						  	/*$('#myTable').find('tbody:last').append('<tr>')
							.find('tr:last')
							$.ajax({
								 type: "POST",
								 dataType: "html",
								 url: "<?php echo base_url();?>admin/transaction/get_row_nota_2/"+inc+"/<?php echo $id_customer;?>",
								 data:"code="+code,
								 success: function(msg)
								 {
									 $("#row"+inc+"").show();
									 $("#row"+inc+"").html(msg); 
								 }
							});*/
						});
					});
				</script>
			<?php
		}
	}

	

	public function customer_to_choose($menuid)

	{

		$customer_name=$this->input->post('customer_name');

		

		$check=$this->master_model->mst_check('ms_customer','name',$customer_name);

		

		if($check==false)

		{

			echo'error';

		}else

		{

			$data_customer=$this->master_model->select_in('ms_customer','*',"WHERE name='$customer_name'");

			$id_customer=$data_customer[0]->ID;

				

			echo'

				<div class="form-group box-title" style="float:left; margin-right:5px; width:200px" id="customer_to_choose">

					<div class="input-group">

						<input type="text" name="customer" list="customer" class="form-control" value="'.$customer_name.'" placeholder="Pilih Customer" disabled="disabled">

						

						<span class="input-group-addon" style="cursor:pointer" data-toggle="modal" data-target="#detail_customer">

							<i class="fa fa-user"></i>

						</span>

					</div>

				</div>

				

				<div class="modal fade" id="detail_customer" role="dialog">

					<div class="modal-dialog">

					  <div class="modal-content" style="z-index:999">

						<div class="modal-header">

						  <button type="button" class="close" data-dismiss="modal">&times;</button>

						  <h4 class="modal-title">Customer Detail</h4>

						</div>

							<div class="modal-body" style="font-size:14px">

								<div class="form-group">

									<label>Name Customer *</label>

									<br />

									'.$customer_name.'

								</div>

								<div class="form-group">

									<label>Company</label>

									<br />

									'.$data_customer[0]->perusahaan.'

								</div>

								<div class="form-group">

									<label>Phone Number</label>

									<br />

									'.$data_customer[0]->no_hp.'

								</div>

								<div class="form-group">

									<label>OTP Number</label>

									<br />

									'.$data_customer[0]->kodeOTP.'

								</div>

								<div class="form-group">

									<label>Company Phone Number</label>

									<br />

									'.$data_customer[0]->no_tlp.'

								</div>

								<div class="form-group">

									<label>Status</label>

									<br />

									'; 

										if($data_customer[0]->status==1)

										{

											$status='<span class="text-aqua">Verified</span>';

										}else

										{

											$status='<span class="text-red">Unverified</span>';

										}

										echo $status;

									echo'

								</div>

								<div class="form-group">

									<label>Address</label>

									<br />

									'.$data_customer[0]->alamat1.'

								</div>

								<div class="form-group">

									<label>Email</label>

									<br />

									'.$data_customer[0]->email.'

								</div>

							</div>

							<div class="modal-footer">

								<a class="btn btn-danger btn-fill pull-right" href="'.base_url().'admin/transaction/insert/'.$menuid.'" onclick="return confirm(\'Apakah anda ingin mengganti customer ini?\')">

									Ganti Customer

								</a>

								<button type="button" class="btn btn-default pull-right" style="margin-right:5px;" data-dismiss="modal">Tutup</button>

							</div>

					  </div>

					</div>

				</div>

			';

		}

	}

	

	public function customer_to_fill($menuid)

	{

		$customer_name=$this->input->post('customer_name');

		$data_customer=$this->master_model->select_in('ms_customer','*',"WHERE name='$customer_name' OR perusahaan LIKE '%$name_customer%'");

		$id_customer=$data_customer[0]->ID;

		

		echo $id_customer;

	}

	

	public function customer_to_list($menuid)
	{
		$name_customer=$this->input->get('customer_name');
		$data_customer_2=$this->master_model->select_in('ms_customer','name',"WHERE name LIKE '%$name_customer%'");

		for($c=0; $c < count($data_customer_2); $c++)
		{
			$name=$data_customer_2[$c]->name;
			echo'
				<option value="'.$name.'">
			';
		}
	}

	

	public function code_to_list($menuid)

	{

		$code=$this->input->get('code');

		

		

		$data_product=$this->master_model->select_in('ms_product','code',"WHERE code LIKE '%$code%'");

		for($c=0; $c < count($data_product); $c++)

		{

			$code=$data_product[$c]->code;

			echo'

				<option value="'.$code.'">

			';

		}

	}

	

	

	

	public function product_to_list($menuid)

	{

		$code=$this->input->get('code');

		

		$data_product=$this->master_model->select_in('ms_product','name',"WHERE name LIKE '%$code%'");

		

		for($n=0; $n < count($data_product); $n++)

		{

			$name=$data_product[$n]->name;

			echo'

				<option value="'.$name.'">

			';

		}

	}
	
	public function get_settlement($menuid)
	{
		$filter=$this->input->post('filter');
		
		if($filter==0)
		{
			$where='';
		}elseif($filter==1)
		{
			$where='WHERE id_verification = 0';
		}elseif($filter==2)
		{
			$where='WHERE id_verification > 0';
		}
		
		$data_settlement=$this->master_model->select_in('ts_settlement','*',"$where");
		
		$count_settlement=count($data_settlement);
		
		if($count_settlement==0)
		{
			echo'
				<tr>
					<td colspan="7">
						Tidak ada data settlement
					</td>
				</tr>
			';
		}else
		{
			for($a=0; $a < count($data_settlement); $a++)
			{
				$ID=$data_settlement[$a]->ID;
				$b=$a+1;
				
				$date_1=$data_settlement[$a]->date_in;
				$exp=explode(' ',$date_1);
				$date_1=$exp[0];
				$clock=$exp[1];
					
				$date=strtotime($date_1);
			
				echo'
					<tr id="chassischecklist-pop">
						<td>
							'.$b.'
							
							<input type="checkbox" name="ID[]" id="in-popular-chassis-'.$b.'" value="'.$ID.'" style="display:none"/>
							<input type="checkbox" name="date_in[]" id="in-popular-chassis2-'.$b.'" value="'.$date_1.'" style="display:none"/>
							<input type="checkbox" name="price['.$date_1.'][]" id="in-popular-chassis3-'.$b.'" style="display:none" value="'.$data_settlement[$a]->total.'"/>
						
						</td>
						
						<td>
							'.date('d/m/Y').'
						</td>
						<td>
							<a href="'.base_url().'admin/transaction/settle_invoice/'.$menuid.'/'.$data_settlement[$a]->ID.'" class="text-blue">
								'.$data_settlement[$a]->no_settlement.'
							</a><!--settle_detail-->
						</td>
						<td>
							'.$data_settlement[$a]->jml_nota.' Nota
						</td>
						<td>
							'.number_format($data_settlement[$a]->total).'
						</td>
						<td>
							
								';
									$id_admin=$data_settlement[$a]->id_admin;
									$get_data_admin=$this->master_model->select_in('usermst','UserName',"WHERE UserID=$id_admin");
									
									echo $get_data_admin[0]->UserName;
									
								echo'
							
						</td>
						<td>
							<span class="pull-left">
								';
									$id_verification=$data_settlement[$a]->id_verification;
									$get_data_verification=$this->master_model->select_in('ts_verification','*',"WHERE ID=$id_verification");
									
									if($id_verification==0)
									{
										$no_verification='';
									}else
									{
										$no_verification='<a href="'.base_url().'admin/transaction/verification_invoice/'.$menuid.'/'.$id_verification.'" class="text-blue">'.$get_data_verification[0]->no_verification.'</a>';
									}
								echo'
								Verified : '.$no_verification.'
								<br>
								';
									
									if($id_verification==0)
									{
										echo'
											<strong><span class="text-red">Belum di Verifikasi</span></strong>
										';
									}else
									{			
										$id_admin=$get_data_verification[0]->id_admin;
										$date_in_verification=$get_data_verification[0]->date_in;
										
										$date_in_verification=strtotime($date_in_verification);
										
										$get_data_admin=$this->master_model->select_in('usermst','UserName',"WHERE UserID=$id_admin");
										
										echo '<strong><span class="text-black">'.$get_data_admin[0]->UserName.' '.date('d/m/Y', $date_in_verification).'</span></strong>';
									}
								echo'
							</span>
							
						</td>
					</tr>
				';
			}
		}
	}
	

	public function timeout($menuid)
	{
		$this->session->sess_destroy();
    	redirect(base_url().'admin');
	}
	



}

?>