	<?php 
        $this->load->view('admin/master/header_2');
		$modul=$this->uri->segment(3);
		$menuid=$this->uri->segment(4);
		$id_category=$this->uri->segment(5);
		$id_product=$this->uri->segment(6);
    ?>
<script type="text/javascript" src="<?php echo base_url();?>appinclude/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>appinclude/ckfinder/ckfinder.js"></script>


	<div class="content-wrapper">
		
	<form action="<?php echo base_url();?>admin/master/edit_process_product/<?php echo $menuid.'/'.$id_category.'/'.$id_product;?>" method="post" enctype="multipart/form-data">
        <section class="content-header">
            <h1>
                Edit Produk
                <small>advanced tables</small>
            </h1>
			
	
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo base_url();?>admin/master/product_category/<?php echo $menuid;?>">Produk Kategori</a></li>
                <li><a href="<?php echo base_url();?>admin/master/product/<?php echo $menuid.'/'.$id_category;?>"><?php echo $name_category[0]->name;?></a></li>
                <li class="active">
                	Edit Produk
                </li>
            </ol>
        </section>
        
        <section class="content">
        
               
               <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Product</h3>

         <button type="submit" name="submit" value="1" class="btn btn-success btn-fill pull-right save">Simpan</button>
			<a href="<?php echo base_url();?>admin/master/product/<?php echo $menuid.'/'.$id_category;?>" class="btn btn-danger btn-fill pull-right" style="margin-right:5px;">Kembali
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
            
            	
            	
              <div class="form-group">
                <label>Kode Barang *</label>
                <span id="kode-result" style="display:none"><i class="fa fa-refresh fa-spin"></i></span>
                <input type="text" name="kd_barang" id="code" class="form-control" required="required" value="<?php echo $data_edit[0]->code;?>" >
              </div>
              <div class="form-group">
                    <label>Category</label>
                    <select name="id_category" class="form-control" required>
                        <option value="">Choose Category</option>
                        <?php
                            for($c=0; $c < count($category); $c++)
                            {
                                if($data_edit[0]->id_category==$category[$c]->ID)
                                {
                                    $check='selected="selected"';
                                }else
                                {
                                    $check='';
                                }
                                echo'
                                    <option value="'.$category[$c]->ID.'" '.$check.'>
                                        '.$category[$c]->name.'
                                    </option>
                                ';
                            }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Nama Barang *</label>
                    <input type="text" name="product" class="form-control" placeholder="Name Product" required="required" value="<?php echo $data_edit[0]->name;?>">
                </div>
					
			
            </div>
            
            <div class="col-md-8">
                        
                
                
               
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="desk" class="form-control" placeholder="Here Your Description"><?php echo $data_edit[0]->desc;?></textarea>
                </div>
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       
      </div>
               </form>
               
    	</section>
        
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
						
						$(".save").click(function(){
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
                        
    <?php 

        $this->load->view('admin/master/footer_2');

    ?>

<script type="text/javascript">
	CKEDITOR.replace( 'desk', { filebrowserBrowseUrl : '<?=base_url();?>appinclude/ckfinder/ckfinder.html' });
	/*CKEDITOR.replace( 'desk', {
	toolbarGroups: [
		{ name: 'document',	   groups: [ 'mode', 'document' ] },			// Displays document group with its two subgroups.
 		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },			// Group's name will be used to create voice label.
 		'/',																// Line break - next group will be placed in new line.
 		{ name: 'styles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
	'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl','TextColor','BGColor' , 'Image','Flash','Table' ]},

		
	
	
	]
		// NOTE: Remember to leave 'toolbar' property with the default value (null).
});*/
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