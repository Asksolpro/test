	<?php 
        $this->load->view('admin/master/header_2');
		$modul=$this->uri->segment(3);
		$menuid=$this->uri->segment(4);
		$id_news =$this->uri->segment(5);
    ?>



<script type="text/javascript" src="<?php echo base_url();?>appinclude/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>appinclude/ckfinder/ckfinder.js"></script>

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
	
  $(document).ready(function(){
	  
	$("#change_image").click(function(){			
		$("#upload").trigger("click");

	});
		
	  
	  
  });	

	
</script>

<style>
.image_exist
	{
		width: 150px;
		height: 150px;
	}
	.image_exist img
	{
		width: 150px;
		
	}

</style>

	<div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit News
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo base_url();?>admin/admin_news/index/<?php echo $menuid;?>">News</a></li>               
                <li class="active">
                	Edit News
                </li>
            </ol>
        </section>
        
        <section class="content">
        
       
	<form action="<?php echo base_url();?>admin/admin_news/edit_process/<?php echo $menuid.'/'.$id_news;?>" method="post" enctype="multipart/form-data">
	
     <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit News</h3>
			    
				<button type="submit" name="submit" value="1" class="btn btn-success btn-fill pull-right save">Simpan</button>
			   <a href="" class="btn btn-danger btn-fill pull-right" style="margin-right:5px;" onclick="window.history.go(-1); return false;">Kembali</a>
       
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
            
       
              <div class="form-group">
                <label>Tanggal *</label>
                
                <input type="text" name="tgl" id="datepicker" class="form-control datepicker" value="<?php echo date('d-m-Y', strtotime($DataEdit[0]->date));?>" required="required">
              </div>
              
                <div class="form-group">
                    <label>Judul *</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $DataEdit[0]->title;?>" placeholder="Judul berita" required="required">
                </div>
				
				 <div class="form-group">
                    <label>Deskripsi Singkat</label>
                    <textarea name="shortdesc" class="form-control" placeholder="Isi Deskripsi singkat berita" style="height:120px;"><?php echo $DataEdit[0]->shortdesc;?></textarea>
                </div>
                 
                <div class="form-group">
                    <label>Image*</label>
                   <input type='file' id="upload" name="ImageUpload"  accept='image/*' style="display:none" onchange='openFile(event)'>
				   <button type="button" class="btn btn-info" id="change_image">Change Image</button><br>
					<div class="image_exist">
						<img src="<?php echo base_url();?>uploads/news/<?php echo  $DataEdit[0]->image;?>" id="output">
					</div> 
					
                </div>
                        
               
            </div>
            
            <div class="col-md-8">
                                          
                <div class="form-group">
                    <label>Deskripsi Lengkap</label>
                    <textarea name="desk" id="desk" class="form-control" placeholder="berita lengkap"><?php echo $DataEdit[0]->desc;?></textarea>
                </div>
              	
                <script>
					var textarea = document.querySelector('textarea');

					textarea.addEventListener('keydown', autosize);
								 
					function autosize(){
					  var el = this;
					  setTimeout(function(){
						el.style.cssText = 'height:auto; padding:0';
						// for box-sizing other than "content-box" use:
						// el.style.cssText = '-moz-box-sizing:content-box';
						el.style.cssText = 'height:' + el.scrollHeight + 'px';
					  },0);
					}
				</script>
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

<script>

	
		
	
			$('.datepicker').datepicker({
				format: 'dd-mm-yyyy',
				
			});
	
		   $('.datepicker').datepicker('update');  //update the bootstrap datepicker
	
			$('.datepicker').datepicker()
				
				.on('changeDate', function(ev){                 
				$('.datepicker').datepicker('hide');
			});
			
	
	
</script>

<script type="text/javascript">
	CKEDITOR.replace( 'desk', { filebrowserBrowseUrl : '<?=base_url();?>appinclude/ckfinder/ckfinder.html' });
	/*CKEDITOR.replace( 'desk', {
	toolbarGroups: [
		{ name: 'document',	   groups: [ 'mode', 'document' ] },			// Displays document group with its two subgroups.
 		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },			// Group's name will be used to create voice label.
 		'/',																// Line break - next group will be placed in new line.
 		{ name: 'styles', groups: [ 'basicstyles', 'cleanup'] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
	'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl','TextColor','BGColor' , 'Image','Flash','Table' ]},

		
	
	
	]
		// NOTE: Remember to leave 'toolbar' property with the default value (null).
});*/

</script>