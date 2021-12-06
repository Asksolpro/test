	<?php 
        $this->load->view('admin/master/header_2');
		$modul	   = $this->uri->segment(3);
		$menuid	 = $this->uri->segment(4);
		$offset = $this->uri->segment(5);
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
					url: "<?php echo base_url().'admin/about/edit/'.$menuid.'';?>",
					data: "ID="+ID,    
					success: function(data)
					{
						$(".modal-edit").html(data);
					}
				});	
			});
		});
    </script>
    
	<div class="content-wrapper">
        <section class="content-header">
            <h1>
                About
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url();?>admin/home/index/8"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">
                	About
                </li>
            </ol>
        </section>
	<section class="content">
	<form method="post" action="<?php echo base_url();?>admin/about/update/<?php echo $menuid;?>" name="updateall">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
			  <div class="box-header">
              <h3 class="box-title">Data About</h3>
              	<a class="btn btn-info btn-fill pull-right" style="margin-left:5px" data-toggle="modal" data-target="#myModal">Tambah Baru</a>
               <button type="submit" name="updateall" class="btn btn-default btn-fill pull-right">Update</button>	
               
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                            <th> No. </th>
                            <th> Name </th>
                            <th> Deskripsi Singkat</th>   
							<th> Publish </th>
                            <th> Sort</th>
							
                            <th> Edit</th>
                            <th> Delete </th>
                        </tr>
                    </thead>
                    <tbody class="get_product">
                     <?php
					 for($a=0; $a < count($data_about); $a++)
					 {
						$b=$a+1;
						$ID=$data_about[$a]->ID;
						 
						 echo '
						  <tr>
                            <td style="text-align:center"> '.$b.'</td>
                            <td> 
								 '.$data_about[$a]->name.'
							</td>		
							<td>
								';
								$desc=strip_tags($data_about[$a]->note);
								echo substr($desc, 0, 400) .((strlen($desc) > 400) ? '...' : '');
								echo'
							</td>
							<td style="text-align:center">
								 ';
									if($data_about[$a]->publish==1)
									{
										$publish='<i class="fa fa-check-square-o" aria-hidden="true"></i>';
									}else
									{
										$publish='<i class="fa fa-square-o" aria-hidden="true"></i>';
									}
								echo'
								<a href="'.base_url().'admin/about/publish/'.$menuid.'/'.$ID.'/'.$data_about[$a]->publish.'" class="edit text-blue" style="cursor:pointer">
									'.$publish.'
								</a>
							</td>
							
                            <td> 
								<input type="hidden" name="ID[]" value="'.$ID.'">
								<input type="text" name="sort[]" value="'.$data_about[$a]->sort.'" class="form-control" style="width:60px">
                            </td>
                            <td style="text-align:center">
								<a href="'.base_url().'admin/about/edit/'.$menuid.'/'.$ID.'" class="text-green" style="cursor:pointer">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td style="text-align:center">
                                <a href="'.base_url().'admin/about/delete/'.$menuid.'/'.$ID.'" onclick="return confirm(\'Apakah anda ingin menghapus data ini?\')"  class="text-red">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>';
					 }
					?>
                    </tbody>
                </table>
                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
		</form>	
    </section>
    <!-- /.content -->
  </div>
       
       
       
       
       
       
       <div class="modal fade" id="myModal" role="dialog">

        <div class="modal-dialog">

          <div class="modal-content" style="z-index:9999">

            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <h4 class="modal-title">Tambahkan</h4>

            </div>

                <form action="<?php echo base_url();?>admin/about/insert/<?php echo $menuid;?>" method="post" enctype="multipart/form-data">

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Title" required="required">
                        </div>

                        <div class="form-group">

                            <label>Description</label>

                            <textarea id="editor1" name="note" class="form-control" placeholder="Description"></textarea>

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
          <div class="modal-content modal-edit" style="z-index:999">

          </div>
      	</div>
   	</div>
       
       
<?php
	$this->load->view('admin/master/footer_2');
?>
  