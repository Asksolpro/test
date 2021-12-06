	<?php 
        $this->load->view('admin/master/header_2');
		$modul=$this->uri->segment(3);
		$menuid=$this->uri->segment(4);
		$offset=$this->uri->segment(5);
    ?>
    <script>
		$(document).ready(function(e) 
		{
			$(".edit").click(function()
			{
				 var id_category = $(this).attr("alt");
					  $.ajax({
						 type: "POST",
						 dataType: "html",
						 url: "<?php echo base_url();?>admin/master/edit_category/<?php echo $menuid;?>",
						 data:"id_category="+id_category,
						 success: function(msg){
							  $(".content-popup").html(msg); 
						 }
					  }); 
			});
		});
	</script>
	<div class="content-wrapper">
        <section class="content-header">
            <h1>
                Produk Kategori
                <small>Data Kategori produk</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Produk Kategori</li>
            </ol>
        </section>
          <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          	<div class="col-xs-3 pull-right" style="position:absolute; margin:61px 0 0 -5px; z-index:999">
                    <!--<input type="submit" class="btn btn-info btn-fill pull-right" value="Cari" style="border-radius:3px" />-->
                    <div class="form-group">
                        <div class="input-group">
                        	<script>
								$(document).ready(function()
								{
									$(".product_name").bind('input', function(e)
									{
										var code = $(this).val();
										$.ajax({
											 type: "GET",
											 dataType: "html",
											 url: "<?php echo base_url();?>admin/master/get_product/<?php echo $menuid;?>",
											 data:"code="+code,
											 success: function(msg)
											 {
												$(".get_product").html(msg);
											 }
										}); 				  
									});
								});
							</script>
                        	<input type="text" name="product" list="product_name" class="form-control product_name" placeholder="Cari Product"/>
                            <datalist id="product_name"></datalist>
                        </div>
                    </div>
            </div>
            <div class="col-xs-3 pull-right" style="position:absolute; margin-top:61px; z-index:999; right:0;">
                    <!--<input type="submit" class="btn btn-info btn-fill pull-right" value="Cari" style="border-radius:3px" />-->
                    <div class="form-group">
                        <div class="input-group">
                        	<script>
								$(document).ready(function()
								{
									$(".category_name").bind('input', function(e)
									{
										var code = $(this).val();
										$.ajax({
											 type: "GET",
											 dataType: "html",
											 url: "<?php echo base_url();?>admin/master/get_category/<?php echo $menuid;?>",
											 data:"code="+code,
											 success: function(msg)
											 {
												$(".get_category").html(msg);
											 }
										}); 				  
									});
								});
							</script>
                        	<input type="text" name="category" list="category_name" class="form-control category_name" placeholder="Cari Kategori" style="width:246px"/>
                        </div>
                    </div>
            </div>
			 
	 <form action="<?php echo base_url();?>admin/admin_category/update_sort/<?php echo $menuid;?>" method="post" id="main-contact-form"> 
              		  
            <div class="box-header">
              <h3 class="box-title">Data Produk Kategori</h3>
			 
               <a class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#myModal">Tambah Kategori Baru</a>
               <a href="<?php echo base_url();?>admin/master/new_product/<?php echo $menuid;?>" class="btn btn-success btn-fill pull-right" style="margin-right:5px">Tambah Produk Baru</a>
				 <button type="submit" name="simpan" class="btn btn-default pull-right" style="margin-right:5px">  <i class="fa fa-refresh"></i>  Update Sort</button>   
            </div>
		 
		 <div class="cleaner"></div>
		 
		 <p>&nbsp;</p>
		 
		 
		 
            <div class="box-body get_product">
              <table class="table table-bordered table-striped">
                    <thead>
                        <tr style="border-bottom:1px solid #dadada">
                            <th style="text-align:center">No. </th>
                            <th> Nama </th>
                            <th> Deskripsi Barang</th>
                            <th style="text-align:center"> No Of Product</th>
                            <th style="text-align:center"> Sort </th>
							<th style="text-align:center"> Publish </th>
                            <th colspan="2" style="text-align:center"> Action </th>
                        </tr>
                    </thead>
                    <tbody class="get_category">
						<?php
                         for($a=0; $a < count($category); $a++)
                         {
                             $b=$a+1;
                             $c=$offset+$b;
                             $id_category = $category[$a]->ID;
							 $sort = $category[$a]->sort;
                             $nm_category = $category[$a]->name;
                             $deskripsi   = $category[$a]->desc;
                             $where = "WHERE ID = $id_category";
                             $data_product = $this->master_model->select_in('ms_product','*',"WHERE id_category=$id_category");
                             $num =count($data_product);
							 
							 $fg_active   = $category[$a]->fg_active;
							 
							 if($fg_active==1)
							 {
								  $fg = ' <span class="text-blue"> <i class="fa fa-check"></i></span>';
							 }else{
								 
								 $fg = ' <span class="text-red"> <i class="fa fa-times"></i></span>';
							 }
							 

                             echo'
                              <tr>
                                <td style="text-align:center"> '.$c.'</td>
                                <td><a href="'.base_url().'admin/master/product/'.$menuid.'/'.$id_category.'">'.$nm_category.' </a></td>
                                <td>'.$deskripsi.' </td>
                                <td style="text-align:center">
                                    <a href="'.base_url().'admin/master/product/'.$menuid.'/'.$id_category.'">
                                        '.$num.' Product
                                    </a>
                                </td>
								 <td style="text-align:center">
								  <input type="hidden" name="id[]" value="'. $id_category.'">
                                  <input type="text" name="sort[]" value="'.$sort.'" style="width:50px; text-align:center">
                                      
                                </td>
								<td style="text-align:center">
                                    <a href="'.base_url().'admin/master/change_publish_category/'.$menuid.'/'.$id_category.'/'.$fg_active.'">
                                      '.$fg.'
                                    </a>
                                </td>
                                <td style="text-align:center">
                                    <a alt="'.$id_category.'" class="edit text-green" style="cursor:pointer" data-toggle="modal" data-target="#modal_edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td style="text-align:center">
                                    <a href="'.base_url().'admin/master/delete_category/'.$menuid.'/'.$id_category.'" onclick="return confirm(\'Apakah anda ingin menghapus data ini?\')"  class="text-red">
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
                  <h4 class="modal-title">Tambah Kategori Baru</h4>
                </div>
                        <form method="post" action="<?php echo base_url();?>admin/master/insert_category/<?php echo $menuid;?>">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama Kategori *</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name Category" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="desc" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-info btn-fill pull-right" value="Simpan" id="save">
                                <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right:5px">Close</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
		<div class="modal fade" id="add_product" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content" style="z-index:999">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Tambah Produk Baru</h4>
                </div>
                    <script type="text/javascript">
							$(document).ready(function()
							{
								exist2 = 0;
								$("#code").change(function (e){
									var kd_barang = $(this).val();
									 $("#kode-result").show();
									$.ajax({
										 type:"POST",
										 url: "<?php echo base_url();?>admin/master/kode_checker",
										 data:"kd_barang="+kd_barang,
										 success:function(msg)
										 {
											 if(msg == 1)
											 {
												 exist2 = 1;
												 $("#kode-result").html('<font style="color:#FF024F"><i class="fa fa-times"></i> Kode sudah digunakan</font>');
											 }else{
												 exist2 = 0;
												 $("#kode-result").html('<font style="color:#2BB0EA"><i class="fa fa-check" style="color:#2DBE00"></i> Kode belum digunakan</font>');
											 }
										 }
									});
								});
								$("#save").click(function(){
									if(exist2 == 1)
									{
										alert('Kode Sudah Digunakan');
										return false;
									}else{
										return true;
									}
								});
							});
						</script>
                        <form method="post" action="<?php echo base_url();?>admin/master/insert_new_product/<?php echo $menuid;?>" id="formproduct">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Kode Barang *</label>
                                    <span id="kode-result" style="display:none"><i class="fa fa-refresh fa-spin"></i></span>
                                    <input type="text" name="kd_barang" id="code" class="form-control" placeholder="Product Code" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Kategori *</label>
                                    <select name="id_category" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        <?php
                                            for($c=0; $c < count($category); $c++)
                                            {
                                                echo'
                                                    <option value="'.$category[$c]->ID.'">
                                                        '.$category[$c]->name.'
                                                    </option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang *</label>
                                    <input type="text" name="product" class="form-control" placeholder="Product Name" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Harga (Rp)</label>
                                    <input type="text" name="harga" class="form-control" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <input type="text" name="satuan" class="form-control" placeholder="Unit">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="desk" class="form-control"></textarea>
                                </div>
                                </div>
                                <div class="modal-footer">
                                <input type="submit" class="btn btn-info btn-fill pull-right" value="Save And Close" id="save">
          						<input type="submit" class="btn btn-success btn-fill pull-right" value="Save And Add New" id="save" style="margin-right:5px;">
                                <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right:5px;">Close</button>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
    <?php 
        $this->load->view('admin/master/footer_2');
    ?>