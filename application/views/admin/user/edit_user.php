<?php 
	$this->load->view('admin/master/header_2');
	$fromPge = $this->uri->segment(2);
	$funct   = $this->uri->segment(3);
	$menuid  = $this->uri->segment(4);
	$id_admin=$this->session->userdata('id_admin');
	
	
	$Nama = $dataEdit[0]->Nama;
	$UserName = $dataEdit[0]->UserName;
	$UserID = $dataEdit[0]->UserID;
	
?>
<style>
.box-body
    {
        width: 30%;
    }
    @media only screen and (max-width: 500px) {
     .box-body
    {
        width: 100%;
    }
}
</style>
	<div class="content-wrapper">
        <section class="content-header">
            <h1>
                User
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url();?>admin/home/index/8"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Ubah Data User</li>
            </ol>
        </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          	<form action="<?php echo base_url();?>admin/admin_user/edit_process/<?php echo $menuid.'/'.$UserID;?>" method="post">
                <div class="box-header">
                  <h3 class="box-title">  Ubah Data User 
                  </h3>
                      <a href="<?php echo base_url();?>admin/user/index/<?php echo $menuid;?>" class="btn btn-danger pull-right">
                 	 <i class="fa fa-times"></i> Kembali</a>
                     
                </div>
                <div class="box-body">
            
                        <label>Nama User</label>
                        <div class="form-group input-group"  style="width:100%" >
                            <input type="text"  name="nama" class="form-control" required value="<?php echo $Nama;?>"/>
                        </div>
                        
                       
                        
                       
                         <label>User Group</label>
                        <div class="form-group input-group" style="width:100%">
                            <select name="usergroup" class="form-control"  style="width:100%" >
                               <?php
                                  for($i=0; $i < count($DataUserGroup); $i++)
                                  {
                                      echo ' <option value="'.$DataUserGroup[$i]['ID'].'">
									  '.$DataUserGroup[$i]['name'].'</option>';
                                  }
                                ?>
                            </select>
                        </div>
                     
                        
                        <label>UserName</label>
                    <div class="form-group input-group"  style="width:100%" >
                        <input type="text"  name="username"  style="width:100%"  class="form-control"  value="<?php echo $UserName;?>" autocomplete="off"/>
                    </div>
                      
                    <script type="text/javascript">
						$(document).ready(function()
						{
							
							
							
							$("#lokasi").change(function(){
								var pilihan = $(this).val();
								
							
								var id_kelurahan = $("#kelurahan").val();
													
							
								    $.ajax({
										url:'<?php echo base_url().'admin/user/ajaxGetData';?>',
										data: "id_kelurahan="+id_kelurahan+"&pilihan="+pilihan,  
										success: function(msg){										
											$(".lokasi-ajax").html(msg);
										}
					
									});	
							});
							
							
							
						});
					</script>
                     
                        
                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>    
                </div>
               
            </form>
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
    <?php $this->load->view('admin/master/footer_2'); ?>