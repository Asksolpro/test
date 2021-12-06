<?php 
        $this->load->view('admin/master/header_2');
		$modul=$this->uri->segment(2);
		
		$menuid    = $this->uri->segment(4);
		$info_for  = $this->uri->segment(7);
	
		//print_array($dataEdit);
		$namaProduk = $dataEdit[0]->name;
		$id_product = $dataEdit[0]->ID;
		$id_category = $dataEdit[0]->id_category;

		$dataCategory = $this->master_model->select_in('ms_product_category', '*', "WHERE ID=$id_category");
		$namaCategory = $dataCategory[0]->name;
		$titleModul = 'Product Information';

		//print_array($product_info);

		define('PATH_APP', base_url().'appinclude/');


		$image1 = $image2 = $image3 = $image4 = $image5 = '';
		$desc1  = $desc2 = $desc3 = $desc4 = $desc5 = '';
		$action1 = $action2  =$action3 =$action4 =$action5 = 'insert_product_information';
		
				
		if(count($product_info1) == 1)
		{
			$image1  = $product_info1[0]->image;
			$desc1   = $product_info1[0]->desc;
			$action1 = 'update_product_information';
		}
		if(count($product_info2) == 1)
		{
			$image2 = $product_info2[0]->image;
			$desc2 = $product_info2[0]->desc;
			$action2 = 'update_product_information';
		}
		if(count($product_info3) == 1)
		{
			$image3 = $product_info3[0]->image;
			$desc3 = $product_info3[0]->desc;
			$action3 = 'update_product_information';
		}
		if(count($product_info4) == 1)
		{
			$image4 = $product_info4[0]->image;
			$desc4 = $product_info4[0]->desc;
			$action4 = 'update_product_information';
		}
		if(count($product_info5) == 1)
		{
			$image5 = $product_info5[0]->image;
			$desc5 = $product_info5[0]->desc;
			$action5 = 'update_product_information';

		}




			
    ?>

<script>
	
  var openFile = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
	
 var openFile0 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output0');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
	
	
 var openFile1 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output1');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
	
	var openFile2 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output2');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
	
	var openFile3 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output3');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
	var openFile4 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output4');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
	
	
</script>
	


<style>
	.info1 {
		height: 35px;
		width: 100%;
		background: #EEE;
		margin-bottom: 5px;
		padding: 5px 10px;
		font-weight: bold;
		line-height: 26px;
		cursor: pointer;
		-webkit-transition: ease 0.2s;
		/* Safari */
		transition: ease 0.2s;
	}
	
	.info1:hover {
		background-color: skyblue;
		padding: 5px 15px;
		color: #FFF;
		transition-timing-function: linear;
	}
	
	.on_line {
		background-color: skyblue;
		padding: 5px 15px;
		color: #FFF;
		transition-timing-function: linear;
	}
	
	.info-box {
		height: auto;
		width: 100%;
		padding: 10px;
		border: 1px solid #CCC;
		background: #FFF;
		display: none;
	}
	
	
	.gallery {
		text-align: center;
	}
	
	.panel-body {
		min-height: .25em;
	}
	
	.panel-body {
		padding: 15px;
	}
	
	.row>.column {
		padding: 0 8px;
	}
	
	.row:after {
		content: "";
		display: table;
		clear: both;
	}
	
	.column {
		float: left;
		width: 24%;
		border:1px solid #CCC;
		margin: 3px;
		padding: 5px;
	}
	
	
	.caption-container {
		text-align: center;
		background-color: black;
		padding: 2px 16px;
		color: white;
	}
	
	.demo {
		opacity: 0.6;
	}
	
	.active,
	.demo:hover {
		opacity: 1;
	}
	
	img.hover-shadow {
		transition: 0.3s
	}
	
	.hover-shadow:hover {
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
	}
	
	.uploadimage {
		
		padding: 10px;
		width: 100%;
		background-color: none;
	}
	.photo_upload
	{
		background-color: #FFF;
		color: #900;
		padding: 10px;
		width:70%;
		float: left;
		border:1px solid #CCC;
		min-height: 300px;
			
			
	}
	
	.image_exist
	{
		width:300px; 
		margin:10px 0; 
		height:auto; 
		background:#FFF; 
		border:1px solid #CCC; 
		padding:5px
					
	}
	
	
	
	.cleaner
	{
		clear: both;
	}
	.delete_image
	{
		color: red;
		font-weight: bold;
	}

	.image_exist img{
	    width:280px; 
		height: auto;
	}
	.upload_gallery
	{
		width: 360px;
		height: 150px;
		background: #FFF;
		padding: 10px;
		border: 1px solid #EEE;
	
	}
	.image-gallery 
	{
	    width: 350px;
		height: 380px;
		background: #FFF;
		padding: 10px;
		border: 1px solid #999;
		display: none;
		margin-left: 10px;
					
		  
	}
	.image-gallery img{
	    width:240px; 
		height: 240px;
	}
	
	
</style>

<script type="text/javascript" src="<?php echo base_url();?>appinclude/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>appinclude/ckfinder/ckfinder.js"></script>

<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<?=$titleModul;?>

		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>admin/home/index/8"><i class="fa fa-dashboard"></i> Home</a></li>
			<li>
				<a href="<?php echo base_url();?>admin/admin_category/index/19">
					<?=$namaCategory;?>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>admin/master/product/19/<?php echo $id_category;?>">
					<?=$namaProduk;?>
				</a>
			</li>
			<li class="active">
				<?=$titleModul;?>
			</li>
		</ol>
	</section>
	<section class="content">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">
					<?=$titleModul;?>
				</h3>
				<a href="" class="btn btn-danger btn-fill pull-right" style="margin-right:5px;" onclick="window.history.go(-1); return false;">Kembali</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">

						<div class="info1 line1"><i class="fa fa-angle-right"></i> &nbsp;Product Detail</div>
						<div class="info-box box1">
							   <a href="<?php echo  base_url().'admin/master/product_edit/'.$menuid.'/'.$id_category.'/'.$id_product;?>" class="btn btn-success btn-fill pull-right">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
							<table>
								<tr>
									<td width="120">Product Code</td>
									<td width="20">:</td>
									<td>
										<?php echo $dataEdit[0]->code;?>
									</td>
								</tr>
								<tr>
									<td>Product Category</td>
									<td>:</td>
									<td>
										<?php echo $namaCategory;?>
									</td>
								</tr>
								<tr>
									<td>Product Name</td>
									<td>:</td>
									<td>
										<?php echo $dataEdit[0]->name;?>
									</td>
								</tr>
								
								
							</table>
							<h5><b>Product Description</b> </h5>
							<?php echo $dataEdit[0]->desc;?>
						</div>
						<div class="info1 line2"><i class="fa fa-angle-right"></i> &nbsp;Product Gallery</div>
						<div class="info-box box2" <?php if($info_for=='gallery'){echo 'style="display:block"';}?>>

							<div class="uploadimage">
								<form method="post" action="<?php echo base_url();?>admin/master/upload_gallery/<?php echo $menuid.'/'.$id_category.'/'.$id_product;?>" enctype="multipart/form-data">
									<div class="alert">
										<div class="upload_gallery" >
										  <b>Upload New Image</b>
										   <br>
										
											<input type='file' id="upload0" name="ImageUpload" accept='image/*' style="display:none" onchange='openFile0(event)'><br>
											 <button type="button" class="btn btn-info" id="change_image0">
												 <i class="fa fa-cloud-upload" aria-hidden="true"></i>
												 Upload Photo
											</button><br>
											
											<span style="color:#900;">Max Size : 1MB. width : 2000 px, height: 2000px</span><br>
											
										</div>
											
											<div class="image-gallery">
											  <img src="<?php echo base_url();?>uploads/product_information/upload_image.jpg" id="output0">
												<p>Caption</p> 

												<input type="text" name="caption" class="form-control">
																<br>
												<button type="submit" name="simpan" class="btn btn-success">Save</button>
											</div>
											
										
										<div class="cleaner"></div>
									
										

									</div>
								</form>

							</div>

							<hr>
							<div class="row" style="margin:10px;">

								<?php
								 for($p = 0 ; $p < count($gallery); $p++)
								 {
									 $id_gallery = $gallery[$p]->ID;
									 $ImageName = $gallery[$p]->ImageName;
									 $caption = $gallery[$p]->caption;
									 echo '
									 	<div class="column">
										    <a href="'.base_url().'admin/master/delete_gallery/'.$menuid.'/'.$id_category.'/'.$id_gallery.'/'.$ImageName.'/'.$id_product.'" class="delete_image" onclick="return confirm(\'Apakah anda ingin menghapus photo ini?\');">
												<i class="fa fa-times"></i> Delete
											</a>
											<img src="'.base_url().'uploads/gallery/'.$ImageName.'" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
										    <br> <br>'.$caption.'
										</div>
									 ';
								 }
								?>

							</div>							
							<div class="clearfix"></div>


						</div>
						<div class="info1 line3"><i class="fa fa-angle-right"></i> &nbsp;Technical Data</div>
						<div class="info-box box3" <?php if($info_for=='technical_data'){echo 'style="display:block"';}?>>
							<div class="uploadimage">
								<form method="post" action="<?php echo base_url().'admin/master/'.$action1.'/'.$menuid.'/'.$id_category.'/'.$id_product;?>/technical_data" enctype="multipart/form-data">
									<div class="alert">
											<h4>Image Technical Data</h4>
											<span style="color:#F00">Max Size : 1MB. width : 2000 px, height: 2000px</span>	
											<input type='file' id="upload1" name="ImageUpload" accept='image/*' style="display:none" onchange='openFile1(event)'><br>
											<hr>
											<h4>Image Exsiting</h4>
											<?php
											 $btn_change1='Change Image';
											 if($image1=='')
											 {
												 $image1='noimage.jpg';
												 $btn_change1= 'Upload Image';
												 echo '<span style="color:#F00">No Image available</span><br>';
											 }
											?>
											  <button type="button" class="btn btn-info" id="change_image1"><?php echo $btn_change1;?></button><br>
											<div class="image_exist">
											  <img src="<?php echo base_url();?>uploads/product_information/<?php echo $image1;?>" id="output1">
											 </div> 
										<br>
											<h4>Description</h4>							
										<textarea name="desc"  class="form-control" style="height:150px;"><?php echo $desc1;?></textarea><br>	<br>		
										<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
									<div class="cleaner"></div>	
									</div>
								</form>

							</div>
						</div>
						<div class="info1 line4"><i class="fa fa-angle-right"></i> &nbsp;Dimension</div>
						<div class="info-box box4" <?php if($info_for=='dimension'){echo 'style="display:block"';}?>>
							<div class="uploadimage">
								<form method="post" action="<?php echo base_url().'admin/master/'.$action2.'/'.$menuid.'/'.$id_category.'/'.$id_product;?>/dimension" enctype="multipart/form-data">
									<div class="alert">
											<h4>Dimension</h4>
											<span style="color:#F00">Max Size : 1MB. width : 2000 px, height: 2000px</span>	
											<input type='file' id="upload2" name="ImageUpload" accept='image/*' style="display:none" onchange='openFile2(event)'><br>
											<hr>
											<h4>Image Exsiting</h4>
											<?php
											 $btn_change2='Change Image';
											 if($image2=='')
											 {
												 $image2='noimage.jpg';
												 $btn_change2= 'Upload Image';
												 echo '<span style="color:#F00">No Image available</span><br>';
											 }
											?>
											  <button type="button" class="btn btn-info" id="change_image2"><?php echo $btn_change2;?></button><br>
											<div class="image_exist">
											  <img src="<?php echo base_url();?>uploads/product_information/<?php echo $image2;?>" id="output2">
											 </div> 
										<br>
											<h4>Description</h4>							
										<textarea name="desc"  class="form-control" style="height:150px;"><?php echo $desc2;?></textarea><br>	<br>		
										<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
									<div class="cleaner"></div>	
									</div>
								</form>

							</div>
						</div>
						<div class="info1 line5"><i class="fa fa-angle-right"></i> &nbsp;Hydraulic Performance Curves</div>
						<div class="info-box box5" <?php if($info_for=='hpc'){echo 'style="display:block"';}?>>							
							<div class="uploadimage">
								<form method="post" action="<?php echo base_url().'admin/master/'.$action3.'/'.$menuid.'/'.$id_category.'/'.$id_product;?>/hpc" enctype="multipart/form-data">
									<div class="alert">
											<h4>Hydraulic Performance Curves</h4>
											<span style="color:#F00">Max Size : 1MB. width : 2000 px, height: 2000px</span>	
											<input type='file' id="upload3" name="ImageUpload" accept='image/*' style="display:none" onchange='openFile3(event)'><br>
											<hr>
											<h4>Image Exsiting</h4>
											<?php
											 $btn_change3='Change Image';
											 if($image3=='')
											 {
												 $image3='noimage.jpg';
												 $btn_change3= 'Upload Image';
												 echo '<span style="color:#F00">No Image available</span><br>';
											 }
											?>
											  <button type="button" class="btn btn-info" id="change_image3"><?php echo $btn_change3;?></button><br>
											<div class="image_exist">
											  <img src="<?php echo base_url();?>uploads/product_information/<?php echo $image3;?>" id="output3">
											 </div> 
										<br>
											<h4>Description</h4>							
										<textarea name="desc"  class="form-control" style="height:150px;"><?php echo $desc3;?></textarea><br>	<br>		
										<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
									<div class="cleaner"></div>	
									</div>
								</form>

							</div>
						</div>
						<div class="info1 line6"><i class="fa fa-angle-right"></i> &nbsp;Material</div>
						<div class="info-box box6" <?php if($info_for=='material'){echo 'style="display:block"';}?>>
							<div class="uploadimage">
								<form method="post" action="<?php echo base_url().'admin/master/'.$action4.'/'.$menuid.'/'.$id_category.'/'.$id_product;?>/material" enctype="multipart/form-data">
									<div class="alert">
											<h4>Material</h4>
											<span style="color:#F00">Max Size : 1MB. width : 2000 px, height: 2000px</span>	
											<input type='file' id="upload4" name="ImageUpload" accept='image/*' style="display:none" onchange='openFile4(event)'><br>
											<hr>
											<h4>Image Exsiting</h4>
											<?php
											 $btn_change4='Change Image';
											 if($image4=='')
											 {
												 $image4='noimage.jpg';
												 $btn_change4= 'Upload Image';
												 echo '<span style="color:#F00">No Image available</span><br>';
											 }
											?>
											  <button type="button" class="btn btn-info" id="change_image4"><?php echo $btn_change4;?></button><br>
											<div class="image_exist">
											  <img src="<?php echo base_url();?>uploads/product_information/<?php echo $image4;?>" id="output4">
											 </div> 
										<br>
											<h4>Description</h4>							
										<textarea name="desc"  class="form-control" style="height:150px;"><?php echo $desc4;?></textarea><br>	<br>		
										<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
									<div class="cleaner"></div>	
									</div>
								</form>

							</div>
						</div>
						<div class="info1 line7"><i class="fa fa-angle-right"></i> &nbsp;Package</div>
						<div class="info-box box7" <?php if($info_for=='package'){echo 'style="display:block"';}?>>
						     <div class="uploadimage">
								<form method="post" action="<?php echo base_url().'admin/master/'.$action5.'/'.$menuid.'/'.$id_category.'/'.$id_product;?>/package" enctype="multipart/form-data">
									<div class="alert">
									
											<h4>Image Package</h4>
											<span style="color:#F00">Max Size : 1MB. width : 2000 px, height: 2000px</span>	
											<input type='file' id="upload5" name="ImageUpload"  accept='image/*' style="display:none" onchange='openFile(event)'><br>

											
											<hr>
											<h4>Image Exsiting</h4>
											<?php
											
											 $btn_change5='Change Image';
											 if($image5=='')
											 {
												 $image5='noimage.jpg';
												 $btn_change5= 'Upload Image';
												 echo '<span style="color:#F00">No Image available</span><br>';
											 }
											
											?>
											  <button type="button" class="btn btn-info" id="change_image5"><?php echo $btn_change5;?></button><br>
										
											<div class="image_exist">
											  <img src="<?php echo base_url();?>uploads/product_information/<?php echo $image5;?>" id="output">
											 </div> 

										<br>
										
											<h4>Description</h4>							

										<textarea name="desc"  class="form-control" style="height:150px;"><?php echo $desc5;?></textarea><br>	<br>		
										<button type="submit" name="simpan" class="btn btn-success">Simpan</button>								
									<div class="cleaner"></div>			
									</div>
								</form>

							</div>
						</div>

					</div>

					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.box-body -->
		</div>
	</section>

</div>

<?php   $this->load->view('admin/master/footer_2'); ?>

<script type="text/javascript">
	$(document).ready(function() {
		<?php
							for($i=1; $i < 8; $i++ ){?>
		$(".line<?=$i;?>").click(function() {
			$(this).addClass("on_line");
			$(".box<?=$i;?>").toggle();
		});

		<?php } ?>

		$("#change_image0").click(function(){			
			$("#upload0").trigger("click");
			$(".image-gallery").show();
			
		});
		
		$("#change_image1").click(function(){			
			$("#upload1").trigger("click");
			
		});
		
		$("#change_image2").click(function(){
			 //document.getElementById("image1").disabled = false;
			$("#upload2").trigger("click");
			
		});
		
		$("#change_image3").click(function(){
			 //document.getElementById("image1").disabled = false;
			$("#upload3").trigger("click");
			
		});
		
		$("#change_image4").click(function(){
			 //document.getElementById("image1").disabled = false;
			$("#upload4").trigger("click");
			
		});
		
		$("#change_image5").click(function(){
			 //document.getElementById("image1").disabled = false;
			$("#upload5").trigger("click");
			
		});
		
		
	});

</script>


<script type="text/javascript">
	//CKEDITOR.replace( 'LongDesc', { filebrowserBrowseUrl : '<?=base_url();?>appinclude/ckfinder/ckfinder.html' });
	CKEDITOR.replace('teknical_data',{
		toolbarGroups: [{
				name: 'document',
				groups: ['mode', 'document']
			}, // Displays document group with its two subgroups.
			{
				name: 'clipboard',
				groups: ['clipboard', 'undo']
			}, // Group's name will be used to create voice label.
			'/', // Line break - next group will be placed in new line.
			{
				name: 'styles',
				groups: ['basicstyles', 'cleanup']
			}, '/',
			{
				name: 'paragraph',
				items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv',
					'-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'TextColor', 'BGColor', 'Image', 'Flash', 'Table'
				]
			},




		]
		// NOTE: Remember to leave 'toolbar' property with the default value (null).
	});
	
	CKEDITOR.replace('dimension',{
		toolbarGroups: [{
				name: 'document',
				groups: ['mode', 'document']
			}, // Displays document group with its two subgroups.
			{
				name: 'clipboard',
				groups: ['clipboard', 'undo']
			}, // Group's name will be used to create voice label.
			'/', // Line break - next group will be placed in new line.
			{
				name: 'styles',
				groups: ['basicstyles', 'cleanup']
			}, '/',
			{
				name: 'paragraph',
				items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv',
					'-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'TextColor', 'BGColor', 'Image', 'Flash', 'Table'
				]
			},




		]
		// NOTE: Remember to leave 'toolbar' property with the default value (null).
	});
	
		
	CKEDITOR.replace('material',{
		toolbarGroups: [{
				name: 'document',
				groups: ['mode', 'document']
			}, // Displays document group with its two subgroups.
			{
				name: 'clipboard',
				groups: ['clipboard', 'undo']
			}, // Group's name will be used to create voice label.
			'/', // Line break - next group will be placed in new line.
			{
				name: 'styles',
				groups: ['basicstyles', 'cleanup']
			}, '/',
			{
				name: 'paragraph',
				items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv',
					'-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'TextColor', 'BGColor', 'Image', 'Flash', 'Table'
				]
			},




		]
		// NOTE: Remember to leave 'toolbar' property with the default value (null).
	});
	
	
	
	CKEDITOR.replace('hpc', {
		toolbarGroups: [{
				name: 'document',
				groups: ['mode', 'document']
			}, // Displays document group with its two subgroups.
			{
				name: 'clipboard',
				groups: ['clipboard', 'undo']
			}, // Group's name will be used to create voice label.
			'/', // Line break - next group will be placed in new line.
			{
				name: 'styles',
				groups: ['basicstyles', 'cleanup']
			}, '/',
			{
				name: 'paragraph',
				items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv',
					'-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'TextColor', 'BGColor', 'Image', 'Flash', 'Table'
				]
			},




		]
		// NOTE: Remember to leave 'toolbar' property with the default value (null).
	});
	
	
	
	/*config.toolbar = 'Full';
config.toolbar_Full =
[
	{ name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
	{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
	{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
	{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 
        'HiddenField' ] },
	'/',
	{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
	{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
	'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
	{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
	{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
	'/',
	{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
	{ name: 'colors', items : [ 'TextColor','BGColor' ] },
	{ name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
];
config.toolbar_Basic =
[
	['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About']
];*/

</script>
