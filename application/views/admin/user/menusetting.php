	
	<?php 
        $this->load->view('admin/master/header_2');
        $fromPge = $this->uri->segment(3);
        $menuid = $this->uri->segment(4); 
    ?>

            


	<script>


		$(function() {

			$(".edit").click(function(){

			   $("#editMenu").slideDown(1000);

			   var id = $(this).attr('alt');

			   $.ajax({

					url: "<?php echo base_url().'admin/useradmin/edit_menu/<?php echo $MENU_ID;?>';?>",

					data: "MenuID=" + id,    

					success: function(data){

						$("#editMenu").html(data);

					}

				});	

			});

		});

    </script>



            



			



        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Menu Setting
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Menu Setting</li>
                </ol>
            </section>

                

				<section class="content">
      <div class="row">
      
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Menu</h3>
               	<a class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#myModal">Add New Menu</a>
            </div>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Sort</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </thead>
                                <tbody>

                                <? for($a=0 ; $a<count($DataView) ; $a++){ 

                                    $MenuID  = $DataView[$a]['MenuID'];

                                ?>

                            

                                <tr>

                                    <td align=left><?=$DataView[$a]['MenuID'];?></td>

                                    <td align=left>

                                        <a href="<?=base_url();?>admin/useradmin/submenusetting/<?=$menuid;?>/<?=$DataView[$a]['MenuID'];?>.php" class="text-blue">

                                            <?=$DataView[$a]['MenuName'];?>

                                        </a>

                                        </td>

                                    <td align=left><?=$DataView[$a]['MenuType'];?></td>

                                     <td width="50" align=center>

                                     <input type="text" size="1" Name="sort[]" id="sort<?=$DataView[$a]['MenuID'];?>" value="<?=$DataView[$a]['sort'];?>">

                                     <input type="hidden" size="1" Name="MenuID[]" id="sort<?=$DataView[$a]['MenuID'];?>" value="<?=$DataView[$a]['MenuID'];?>">

                                     <input name="MENU_ID" type=hidden class=button value="<?= $menuid ;?>">

                                    </td>

                                    <td width="50" align=center>

                                        <a alt="<?=$MenuID;?>" class="edit text-green" style="cursor:pointer">

                                            <i class="fa fa-edit"></i>

                                        </a>

                                    </td>

                                    <td width="50" align=center>

                                        <a href="<?=base_url();?>admin/useradmin/delete/<?=$menuid;?>/<?=$DataView[$a]['MenuID'];?>.php" onClick="return confirm('Delete this record?')" class="text-pink">

                                            <i class="fa fa-trash-o"></i>

                                        </a>

                                    </td>

                                </tr>

                                <? } ?>
						</tbody>
              		</table>

                        
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
              <h4 class="modal-title">Add New Customer</h4>
            </div>
                <form action="<?php echo base_url();?>admin/master/insert/<?php echo $menuid;?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                    	
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="nama" class="form-control" placeholder="Name Customer" required="required">
                        </div>
                        
                        <div class="form-group">
                            <label>Controller *</label>
                            <input type="text" name="controller" class="form-control" placeholder="Name Customer" required="required">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                		<input type="submit" class="btn btn-info btn-fill pull-right" value="Save" id="save">
                    	<button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right:5px;">Close</button>
                    </div>
                </form>
          </div>
        </div>
 	</div>


			<?php 

				$this->load->view('admin/master/footer_2');

			?>