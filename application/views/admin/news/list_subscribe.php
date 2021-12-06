	<?php 
        $this->load->view('admin/master/header_2');
		$modul	   = $this->uri->segment(3);
		$menuid	 = $this->uri->segment(4);
		$id_news = $this->uri->segment(5);
		//$linkRedirect = MASTER_ADMIN.'product_detail/'.$menuid.'/'.$id_category;
    ?>
	<div class="content-wrapper">
        <section class="content-header">
            <h1>
                News
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">
                	News
                </li>
            </ol>
        </section>
	<section class="content">
	<form method="post" action="<?php echo base_url();?>admin/admin_news/update_all/<?php echo $menuid;?>" name="updateall">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
			  <div class="box-header">
              <h3 class="box-title">News</h3>
               <button type="submit" name="updateall" class="btn btn-primary btn-fill pull-right" style="margin-left:5px;">Kirim Subscribe </button>	
           
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                     <thead>
                        <tr>
                            <th style="text-align:center">No. </th>
							<th> Tanggal Daftar</th>
                            <th> Email</th>
                            <th> Check</th>
							
                        </tr>
                    </thead>
                    <tbody class="get_product">
                     <?php
					 for($a=0; $a < count($list_email); $a++)
					 {
							 $b=$a+1;
							
							 $id_email	  = $list_email[$a]->id;
							 $email 	  = $list_email[$a]->email;
							 $tgl   	  = $list_email[$a]->tgl;
							 
						 echo '
						  <tr>
                            <td style="text-align:center"> '.$b.'</td>
							<td>'.$tgl.' </td>
                            <td> 
								 '.$email.'
							</td>		
							
                            <td> 
								<input type="checkbox" value="'.$id_email.'" name="publish[]">
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
              <div class="modal-content" style="z-index:999">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add New Product</h4>
                </div>
                    </div>
                </div>
            </div>
<?php
	$this->load->view('admin/master/footer_2');
?>
  