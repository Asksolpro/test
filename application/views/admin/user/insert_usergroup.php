<?php 
        $this->load->view('admin/master/header_2');
        $MENU_ID = $this->uri->segment(4);
	

    ?>

<div class="content-wrapper">
        <section class="content-header">
            <h1>
              Usergroup
                
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Usergroup</li>
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
                            
<form action="<?php echo site_url(); ?>admin/group/insert_proses/<?=$MENU_ID;?>" method='post'>
    <div class="alert alert-info">
        <table border="0">
             <h3>Tambah User Group Baru</h3>
            <tr height="60">
              
                <td width="360">
                 <input type="text" name="usergroupname" class="form-control" placeholder="nama user group" required style="width:100%">
                
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
         for($a=0 ; $a<count($menumst) ; $a++)
         { 
             $id_menu = $menumst[$a]->ID;
             
			 
			 $lev2 = $this->admin_menu_model->getMenuLev2($id_menu);
        ?>
            <tr>
                <td style="text-align:left">
                    <input type="hidden" name='MenuID[]' value='<?=$menumst[$a]->ID;?>' readonly>
                   <strong>&rsaquo;  <?=$menumst[$a]->name;?></strong>
                </td>
                <td align="center">
                    <input type="checkbox" name="ReadFlg[]" id="ReadFlg[]" value="<?=$menumst[$a]->ID;?>">
                   
                </td>
            </tr>
            
            
            <?php
			  for($d=0; $d < count($lev2); $d++)
			  {
				  echo '
				   <tr>
					<td style="text-align:left">
						<input type="hidden" name="MenuID[]" value="'.$lev2[$d]->ID.'">
						&nbsp; - '.$lev2[$d]->name.'
					</td>
					<td align="center">
						<input type="checkbox" name="ReadFlg[]" id="ReadFlg[]" value="'.$lev2[$d]->ID.'">
						<label for="option"><span><span></span></span></label>
					</td>
				</tr>
				  ';
			  }
			
			?>
            <? } ?>


                <tr>
                    <td colspan="2" align=center>
                        <input name="submit" type="submit" class="btn btn-success" value="Save">
                        <input name="reset" type="reset" class="btn btn-danger" value="Reset">
                    </td>
                </tr>
    </table>
    </div>
</form>
    
  
   </div>
   
				
			</div>
			
	</section>
	
</div>
							
	<?php $this->load->view('admin/master/footer_2'); ?>