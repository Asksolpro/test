	<?php 
        $this->load->view('admin/master/header_2');
        $MENU_ID = $this->uri->segment(4);
		$id_group = $this->uri->segment(5);
	

    ?>
<style>
.form_status
	{
		width: 90%;
		height: 50px;
		padding: 10px;
		background-color:#DFF0D8;
		border: 2px solid #DDD;
		border-radius: 5px;
		text-align: center;
		position: absolute;
		margin: 50% auto;
		z-index: 999;
		
		
	}

</style>
  
        <script>
		$(document).ready(function(e) {
           	// Contact form
			var form = $('#main-contact-form');
			form.submit(function(event){
				event.preventDefault();
				var form_status = $('<div class="form_status"></div>');
				$.ajax({
					type:"POST",
					url: $(this).attr('action'),
					data:$(this).serialize(),
					beforeSend: function(){
						form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> sedang menyimpan data..</p>').fadeIn() );
					}
				}).done(function(msg){
					form_status.html('<p class="text-success"> <i class="fa fa-check"></i> Usergroup telah berhasil diupdate</p>').delay(3000).fadeOut();
				});
			}); 
        });
			

		</script>
        

  

<div class="content-wrapper">
        <section class="content-header">
            <h1>
              Usergroup
                
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo site_url(); ?>admin/group/index/<?=$MENU_ID;?>"> Usergroup</a></li>
                <li class="active">Usergroup Edit</li>
            </ol>
        </section>

                

		<section class="content">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Usergroup</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>


				<!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
                            
<form action="<?php echo site_url(); ?>admin/group/edit_proses/<?=$MENU_ID.'/'.$id_group;?>" method='post' id="main-contact-form">
    <div class="alert alert-info">
        <table border="0">
             <h3>Ubah Hak akses User Group </h3>
            <tr height="60">
              
                <td width="360">
                 <input type="text" name="usergroupname" class="form-control" value="<?php echo $usergroupmst[0]->name;?>" required style="width:100%">
                
                </td>
            </tr>

        </table>

    </div>

    <table class="table table-bordered table-striped">
        <tr>
            <td width="625" align="center" scope="col">Menu</td>
            <td width="91" align="center" scope="col">Access</td>
        </tr>

        <?php
         for($a=0 ; $a<count($dateEdit) ; $a++)
         { 
             $id_menu = $dateEdit[$a]->id_menu;
             $menuName = $dateEdit[$a]->name ; 
			 $read_flg = $dateEdit[$a]->read_flg ; 
			 $menuLevel = $dateEdit[$a]->menu_level ;
			 
			 if($menuLevel==1)
			 {
				 $namaMenu =  ' <strong>&rsaquo; '.$menuName.'</strong>'; 
			 }else{
				  $namaMenu =  '&nbsp; - '.$menuName;
			 }
			 
			 
			 if($read_flg==1)
			 {
				  $cheked = 'checked="checked"';
			 }else{
				  $cheked = '';
			 }
			 
			 //$lev2 = $this->admin_menu_model->getMenuLev2($id_menu);
        ?>
            <tr>
                <td style="text-align:left">
                  
                   <?=$namaMenu;?>
                </td>
                <td align="center">                      
                    <label>
                        <input name="ReadFlg[]" id="ReadFlg[]" value="<?=$id_menu;?>" <?php echo $cheked;?> class="ace ace-checkbox-2" type="checkbox">
                       
                    </label>
 
                </td>
            </tr>
            
           
            <? } ?>


                <tr>
                    <td colspan="2" align=center>
                        <input name="submit" type="submit" class="btn btn-success" value="Save">
                        <input name="reset" type="reset" class="btn btn-danger" value="Reset">
                    </td>
                </tr>
  		  </table>
	</form>
							
							
    </div>

    
  
   </div>
   
				</div>
			</div>
			
	</section>
	
</div>
							
	<?php $this->load->view('admin/master/footer_2'); ?>