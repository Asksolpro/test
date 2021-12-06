	<?php 
        $this->load->view('admin/master/header_2');
		$modul	   = $this->uri->segment(3);
		$menuid	 = $this->uri->segment(4);
		$id_category = $this->uri->segment(5);
		$offset = $this->uri->segment(6);
		$WHERE = "ID = $id_category";
		$Kategori = $this->master_model->dataEditMaster('ms_product_category', $WHERE);
		$namaKat = $Kategori[0]->name;
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
                <li><a href="<?php echo base_url();?>admin/master/product_category/<?php echo $menuid;?>">Produk Kategori</a></li>
                <li class="active">
                	<?php
						$get_name_category=$this->master_model->select_in('ms_product_category','*',"WHERE ID =$id_category");
						$name_category = $get_name_category[0]->name;
						echo $name_category;
					?>
                </li>
            </ol>
        </section>
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          	
      <form action="<?php echo base_url();?>admin/master/update_sort/<?php echo $menuid.'/'.$id_category;?>" method="post" id="main-contact-form">     
          
            <div class="box-header">
              <h3 class="box-title"><?php echo $name_category;?></h3>
              <a href="<?php echo base_url();?>admin/master/new_product/<?php echo $menuid.'/'.$id_category;?>" class="btn btn-info btn-fill pull-right">Tambah Produk Baru</a>
				
				 <button type="submit" name="simpan" class="btn btn-default pull-right" style="margin-right:5px">  <i class="fa fa-refresh"></i>  Update Sort</button>  
             
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                            <th>No. </th>
                            <th> Kode Barang </th>
                            <th> Nama Barang </th>                          
                         
							<th> Product Information</th>
							<th> Sort </th>
							<th> Publish </th>
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
						 $fg_active       = $DataView[$a]->fg_active;
						 $kd_product  = $DataView[$a]->code;
						 $sort	      = $DataView[$a]->sort;
						 $satuan      = $DataView[$a]->unit;
						 
						 
						 if($fg_active==1)
						 {
							  $fg = ' <span class="text-blue"> <i class="fa fa-check"></i></span>';
						 }else{

							 $fg = ' <span class="text-red"> <i class="fa fa-times"></i></span>';
						 }
						 
						 echo '
						  <tr>
                            <td> '.$c.'</td>
							<td>'.$kd_product.' </td>
                            <td>'.$nm_product.' </td>							
                           
							 <td style="text-align:center">
								 <a href="'.base_url().'admin/master/product_information/'.$menuid.'/'.$id_category.'/'.$id_product.'" class="text-blue">
									<i class="fa fa-info"></i> Product Information
								 </a>
							 </td>	
							 
							 <td style="text-align:center">
							     <input type="hidden" name="id[]" value="'.$id_product.'" style="width:50px; text-align:center">
								
								 <input type="text" name="sort[]" value="'.$sort.'" style="width:50px; text-align:center">
                              </td>
							  <td style="text-align:center">
                                    <a href="'.base_url().'admin/master/change_publish_product/'.$menuid.'/'.$id_category.'/'.$id_product.'/'.$fg_active.'">
                                      '.$fg.'
                                    </a>
                                </td>
                            <td style="text-align:center">
								<a href="'.base_url().'admin/master/product_edit/'.$menuid.'/'.$id_category.'/'.$id_product.'" class="text-green">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td style="text-align:center">
                                <a href="'.base_url().'admin/master/delete_product/'.$menuid.'/'.$id_category.'/'.$id_product.'" onclick="return confirm(\'Apakah anda ingin menghapus data ini?\')"  class="text-red">
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
			  </form>
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
  