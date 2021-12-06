	<?php 
        $this->load->view('admin/master/header_2');
		$modul	   = $this->uri->segment(3);
		$menuid	 = $this->uri->segment(4);
		$offset = $this->uri->segment(5);
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
               <button type="submit" name="updateall" class="btn btn-default btn-fill pull-right" style="margin-left:5px;">Update All</button>	
               <a href="<?php echo base_url();?>admin/admin_news/insert_news/<?php echo $menuid	;?>" class="btn btn-info btn-fill pull-right" style="margin-right:5px">Tambah News Baru</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                            <th style="text-align:center">No. </th>
							<th> Tanggal </th>
                            <th> Title </th>
                            <th> Deskripsi Singkat</th>   
							<th> Subscribe</th>
							
							<th> Publish </th>
                            <th> Sort</th>
							
                            <th> Edit</th>
                            <th> Delete </th>
                        </tr>
                    </thead>
                    <tbody class="get_product">
                     <?php
					 for($a=0; $a < count($DataView); $a++)
					 {
							 $b=$a+1;
							 $c=$offset+$b;
							 $id_news 	  = $DataView[$a]->ID;
							 $judul 	  = $DataView[$a]->title;
							 $deskripsi   = $DataView[$a]->shortdesc;
							 $tgl         = $DataView[$a]->date;
							 $image  	  = $DataView[$a]->image;
							 $publish     = $DataView[$a]->publish;
							 $sort     	  = $DataView[$a]->sort;
						 
						 echo '
						  <tr>
                            <td style="text-align:center"> '.$c.'</td>
							<td>'.$tgl.' </td>
                            <td> 
								 '.$judul.'
							</td>		
							<td>'.$deskripsi.' </td>
							<td><a href="'.base_url().'admin/admin_news/kirim/'.$menuid.'/'.$id_news.'">Kirim</a></td>
							<td style="text-align:center">';
							 if($publish==1)
							 {
								 echo ' <input type="checkbox" value="'.$id_news.'" name="publish[]" checked="checked">';
							 }else{
								 echo ' <input type="checkbox" value="'.$id_news.'" name="publish[]">' ;
							 }
							echo ' </td>
							
                            <td> 
								<input type="hidden" name="ID[]" value="'.$id_news.'">
								<input type="text" name="sort[]" value="'.$sort.'" class="form-control" style="width:60px">
                            </td>
                            <td style="text-align:center">
								<a href="'.base_url().'admin/admin_news/edit/'.$menuid.'/'.$id_news.'" class="text-green">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td style="text-align:center">
                                <a href="'.base_url().'admin/admin_news/delete/'.$menuid.'/'.$id_news.'" onclick="return confirm(\'Apakah anda ingin menghapus data ini?\')"  class="text-red">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>';
					 }
					?>
                    </tbody>
                </table>
                <?php echo "<ul class='pagination'".$this->pagination->create_links()."</ul>";?>
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
  