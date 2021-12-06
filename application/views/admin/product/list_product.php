	<?php 
        $this->load->view('admin/master/header_2');
		$modul	   = $this->uri->segment(3);
		$menuid	 = $this->uri->segment(4);
		
		$offset = $this->uri->segment(5);
		
	
		//$linkRedirect = MASTER_ADMIN.'product_detail/'.$menuid.'/'.$id_category;
    ?>
        <script>
			 $(document).ready(function(e) {
				$(".edit").click(function(){
					  var id_product  = $(this).attr("alt");
						  $.ajax({
							 type: "POST",
							 dataType: "html",
							 url: "<?php echo base_url();?>admin/master/edit_product_detail/<?php echo $menuid.'/'.$id_category;?>",
							 data:"id_product="+id_product,
							 success: function(msg){
								  $(".content-popup").html(msg); 
								  // alert(id_customer);
							 }
						  }); 
					});
				 $("#formproduct").submit(function()
				 {
						  $.ajax({
							 type: "POST",
							 dataType: "html",
							 url: $(this).attr('action'),
							 data: $(this).serialize(),
							 success: function(msg){
								if(msg=='error')
								{
									$(".errorkode").html('Kode barang sudah digunakan');
								}else{
									 window.location.assign("<?php echo $linkRedirect;?>");
								}
							 }
						  }); 
						 return false;
					});
			 });
		  </script>
	<div class="content-wrapper">
        <section class="content-header">
            <h1>
                Produk
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">
                	Product
                </li>
            </ol>
        </section>
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          	
            
          
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                            <th style="text-align:center">No. </th>
							
                            <th> Kode Barang </th>
                            <th> Nama Barang </th>   
							<th> Kategori Barang </th>
                            <th> Harga</th>

							 <th> Product Information</th>
                            <th> Edit</th>
                            <th> Delete </th>
                        </tr>
                    </thead>
                    <tbody class="get_product">
                     <?php
					 for($a=0; $a < count($DataView); $a++)
					 {
						 $b=$a+1;
						 $c=$offset+$b;
						 $id_product  = $DataView[$a]->ID;
						 $nm_product  = $DataView[$a]->name;
						 $deskripsi   = $DataView[$a]->desc;
						 $harga       = $DataView[$a]->price;
						 $kd_product  = $DataView[$a]->code;
						 $kategori      = $DataView[$a]->kategori;
						
						 echo '
						  <tr>
                            <td style="text-align:center"> '.$c.'</td>
							
							<td>'.$kd_product.' </td>
                            <td> 
								 <a href="'.base_url().'admin/admin_product/product_information/'.$menuid.'/'.$id_product.'" class="text-blue">
								 '.$nm_product.' 
								 </a>
							</td>		
							<td>'.$kategori.' </td>
                            <td>
								<input type="hidden" name="ID[]" value="'.$id_product.'">
								<input type="text" name="price[]" value="'.$harga.'" class="form-control" style="width:100px">
                            </td>
							 <td style="text-align:center">
								 <a href="'.base_url().'admin/admin_product/product_information/'.$menuid.'/'.$id_product.'" class="text-blue">
									<i class="fa fa-info"></i> Product Information
								 </a>
							 </td>	
								
                            <td style="text-align:center">
								<a href="'.base_url().'admin/admin_product/product_edit/'.$menuid.'/'.$id_product.'" class="text-green">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td style="text-align:center">
                                <a href="'.base_url().'admin/admin_product/delete_product/'.$menuid.'/'.$id_product.'" onclick="return confirm(\'Apakah anda ingin menghapus data ini?\')"  class="text-red">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>';
					 }
					?>
                    </tbody>
                </table>
                <?php echo "<ul class='pagination'".$this->pagination->create_links()."</ul>";?>
            </div>
           
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
       <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content" style="z-index:999">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add New Product</h4>
                </div>
                        
                           
                    </div>
                </div>
            </div>
<?php
	$this->load->view('admin/master/footer_2');
?>
  