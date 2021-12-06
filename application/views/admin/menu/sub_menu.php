	
	<?php 
        $this->load->view('admin/master/header_2');
        $fromPge = $this->uri->segment(3);
        $menuid = $this->uri->segment(4); 
		$id_category=$this->uri->segment(5);
    ?>

            


	<script>
		$(function()
		{
			$(".edit").click(function()
			{
			   var ID = $(this).attr('alt');
			   $.ajax({
				   	type: "POST",
					dataType: "html",
					url: "<?php echo base_url().'admin/menu/edit_sub_menu/'.$menuid.'/'.$id_category.'';?>",
					data: "ID="+ID,    
					success: function(data)
					{
						$(".modal-content").html(data);
					}
				});	
			});
		});
    </script>

            



			



        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Sub Menu Setting
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?php echo base_url();?>admin/menu/index/<?php echo $menuid;?>">Menu Setting</a></li>
                    <li class="active">Sub Menu Setting</li>
                </ol>
            </section>

                

				<section class="content">
      <div class="row">
      
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Sub Menu</h3>
               	<a class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#myModal">Tambah Sub Menu Baru</a>
                <a class="btn btn-success btn-fill pull-right" style="margin-right:5px">Update</a>
            </div>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tipe</th>
                                    <th>Sort</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </thead>
                                <tbody>

                                <?php
									for($a=0 ; $a<count($data_menu) ; $a++){ 
                                    $ID  = $data_menu[$a]->ID;
									$b=$a+1;
                                ?>

                            

                                <tr>

                                    <td><?php echo $b;?></td>

                                    <td>

                                        <a href="<?php base_url();?>admin/menu/sub_menu/<?php echo $menuid.'/'.$ID;?>" class="text-blue">
                                            <?=$data_menu[$a]->name;?>
                                        </a>
                                     </td>

                                    <td><?=$data_menu[$a]->type;?></td>

                                     <td>

                                     <input type="text" size="1" Name="sort[]" class="form-control" id="sort<?=$ID;?>" value="<?=$data_menu[$a]->sort;?>">

                                     <input type="hidden" size="1" Name="MenuID[]" id="sort<?=$ID;?>" value="<?=$ID;?>">

                                     <input name="MENU_ID" type=hidden class=button value="<?= $menuid ;?>">

                                    </td>

                                    <td>
                                        <a alt="<?php echo $ID;?>" class="edit text-green" data-toggle="modal" data-target="#edit-modal" style="cursor:pointer">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url();?>admin/menu/delete_sub_menu/<?php echo $menuid.'/'.$ID.'/'.$id_category;?>" onClick="return confirm('Delete this record?')" class="text-red">
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
              <h4 class="modal-title">Tambahkan Sub Menu Baru</h4>
            </div>
                <form action="<?php echo base_url();?>admin/menu/insert_sub_menu/<?php echo $menuid;?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                    	
                        <div class="form-group">
                            <label>Nama *</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Sub Menu" required="required">
                        </div>
                        
                        <div class="form-group">
                            <label>Kategori *</label>
                            <select name="category" class="form-control">
                            	<?php
									$data_menu=$this->master_model->select_in('ms_menu','ID, name',"WHERE menu_level=1");
									for($a=0; $a < count($data_menu); $a++)
									{
										$ID=$data_menu[$a]->ID;
										$name=$data_menu[$a]->name;
										
										if($id_category==$ID)
										{
											$select='selected="selected"';
										}else
										{
											$select='';
										}
										echo'
											<option value="'.$ID.'" '.$select.'>'.$name.'</option>
										';
									}
								?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Controller *</label>
                            <?php
								$data_menu=$this->master_model->select_in('ms_menu','controller',"WHERE ID=$id_category");
							?>
                              <input type="text" name="controller" class="form-control" placeholder="Link Kontrol" required="required" value="<?php echo $data_menu[0]->controller;?>/">
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
    
    <div class="modal fade" id="edit-modal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content" style="z-index:999">
          
            
            
          </div>
      	</div>
   	</div>


			<?php 

				$this->load->view('admin/master/footer_2');

			?>