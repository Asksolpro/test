	<?php 
        $this->load->view('admin/master/header_2');
		$modul	   = $this->uri->segment(3);
		$menuid	 = $this->uri->segment(4);
		$info = $this->uri->segment(5);
		//$linkRedirect = MASTER_ADMIN.'product_detail/'.$menuid.'/'.$id_category;
    ?>
<style>
/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
.form_status
	{
		width: 90%;
		height: 50px;
		padding: 10px;
		background-color:#DFF0D8;
		border: 2px solid #DDD;
		border-radius: 5px;
		text-align: center;
	}

@media 
only screen and (max-width: 560px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	tr { border: 1px solid #ccc; }
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
        text-align: right;
		padding-left: 50%; 
	}
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
          text-align: left;
	}
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "No"; }
    td:nth-of-type(2):before { content: "Nama User"; }
	 td:nth-of-type(3):before { content: "Username"; }
	td:nth-of-type(4):before { content: "Kelurahan"; }
	td:nth-of-type(5):before { content: "Lokasi Kerja"; }
	td:nth-of-type(6):before { content: "User Group"; }
	td:nth-of-type(7):before { content: "Reset Password"; }
	td:nth-of-type(8):before { content: "Ubah"; }
	td:nth-of-type(9):before { content: "Hapus"; }
	
	
		
		
	}
	
	

}
</style>


<script>
	$(document).ready(function(){
	
		$(".form_status").html('<p class="text-success"> <i class="fa fa-check"></i>Password telah berhasil direset</p>').delay(3000).fadeOut();
		
	});


</script>

	<div class="content-wrapper">
        <section class="content-header">
            <h1>
              User
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">
                	User 
                </li>
            </ol>
        </section>
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
            <p>
                <a href="<?php echo base_url();?>admin/admin_user/insert_user/<?php echo $menuid;?>" class="btn btn-primary btn-fill pull-right">
                        Tambah User &nbsp;&nbsp;<i class="fa fa-plus"></i>
                </a>
              </p>  <br><br>
				
			<?php
				 if($info =='success')
				 {
					 echo '<div class="form_status"></div>';
				 }
				?>
				
				
              <table id="example1" class="table table-bordered table-striped">
                    <thead>

                        <tr>

                            <th style="text-align:center">No. </th>
							<th> Nama User </th>
							<th> UserName</th>
                            <th> User Group</th>   

							<th colspan="2" style="text-align:center; width:100px" > Action </th>
                        </tr>

                    </thead>
                    <tbody
                     <?php
					   for($u=0; $u < count($user); $u++)
					   {
						   $Nama = $user[$u]->Nama;
						   $UG_name = $user[$u]->name;
						   $UG_ID = $user[$u]->UserGroupID;
						   $UserName = $user[$u]->UserName;
						   $UserID = $user[$u]->UserID;
						  
						   
						   echo '
						    <tr>
							  <td>'.($u+1).'</td>
							  <td>'.$Nama.'</td>
							  <td>'.$UserName.'</td>
							
							
							  <td> <a href="'.base_url().'admin/group/edit/3/'.$UG_ID.'">'.$UG_name.'</a></td>
							   <Td> 
									 <a href="'.base_url().'admin/admin_user/reset_pass/'.$menuid.'/'.$UserID.'" class="text-orange" onclick="return confirm(\'Apakah anda ingin mereset password user ini?\');">
									 <i class="fa fa-refresh"></i> Reset Password
								  </Td>
							   <Td> 
									 <a href="'.base_url().'admin/admin_user/edit/'.$menuid.'/'.$UserID.'" class="text-green">
									 <i class="fa fa-pencil"></i> Ubah 
								  </Td>
								 <Td> 
								 	<a href="'.base_url().'admin/admin_user/delete/'.$menuid.'/'.$UserID.'" class="text-red" onclick="return confirm(\'Apakah anda ingin menghapus user ini?\');">
									<i class="fa fa-trash"></i>  Hapus
								</Td>
							</tr>
						   ';
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
  