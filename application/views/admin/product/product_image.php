	<?php 
        $this->load->view('admin/master/header_2');
		$modul=$this->uri->segment(2);
		$menuid=$this->uri->segment(4);
	

		$id = 0;
		$title = '';
		$desc = '';

		if(count($dataAbout)<> 0)
		{
			$id = $dataAbout[0]->ID;
			$title = $dataAbout[0]->title;
			$desc = $dataAbout[0]->desc;
		}
	
		
		if($modul=='admin_about')
		{
			$titleModul = 'About Us';
			
		}else{
			$titleModul = 'Contact Us';
		}



    ?>

<script type="text/javascript" src="<?php echo base_url();?>appinclude/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>appinclude/ckfinder/ckfinder.js"></script>

	<div class="content-wrapper">
        <section class="content-header">
            <h1>
              <?=$titleModul;?>
                <small>Content <?=$titleModul;?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">
                	<?=$titleModul;?>
                </li>
            </ol>
        </section>
        
        <section class="content">
        
       
	<form action="<?php echo base_url();?>admin/<?php echo $modul;?>/insert_content/<?php echo $menuid;?>" method="post" enctype="multipart/form-data">
	
     <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$titleModul;?></h3>
			    
				<button type="submit" name="submit" value="1" class="btn btn-success btn-fill pull-right save">Simpan</button>
			   <a href="" class="btn btn-danger btn-fill pull-right" style="margin-right:5px;" onclick="window.history.go(-1); return false;">Kembali</a>
       
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
                
                <div class="form-group">
                    <label>Title</label>
					<input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="text" name="name" style="width:40%;" class="form-control" placeholder="judul content" value="<?php echo $title;?>"required="required">
                </div>
                 <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="desk" id="desk" class="form-control" placeholder="Isi Deskripsi Barang"><?php echo $desc;?></textarea>
                </div>
               
            </div>
           
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         
   
        </div>
      </div>
               </form>
               
    	</section>
        
  </div>

    <?php 

        $this->load->view('admin/master/footer_2');

    ?>


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
                        

<script type="text/javascript">
	//CKEDITOR.replace( 'LongDesc', { filebrowserBrowseUrl : '<?=base_url();?>appinclude/ckfinder/ckfinder.html' });
	CKEDITOR.replace( 'desk', {
	toolbarGroups: [
		{ name: 'document',	   groups: [ 'mode', 'document' ] },			// Displays document group with its two subgroups.
 		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },			// Group's name will be used to create voice label.
 		'/',																// Line break - next group will be placed in new line.
 		{ name: 'styles', groups: [ 'basicstyles', 'cleanup'] },'/',	
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
	'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl','TextColor','BGColor' , 'Image','Flash','Table' ]},

		
	
	
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