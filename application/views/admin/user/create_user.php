<?php 
	$this->load->view('admin/master/header_2');
	$fromPge = $this->uri->segment(2);
	$funct   = $this->uri->segment(3);
	$menuid  = $this->uri->segment(4);
	$id_admin=$this->session->userdata('id_admin');
	//print_array($this->session->userdata)
?>
<style>
.box-body
    {
        width: 50%;
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
                <li class="active">Tambah User Baru</li>
            </ol>
        </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          	<form action="<?php echo base_url();?>admin/admin_user/insert_process/<?php echo $menuid;?>" method="post">
                <div class="box-header">
                  <h3 class="box-title">  Tambah User Baru 
                  </h3>
                      <a href="<?php echo base_url();?>admin/admin_user/index/<?php echo $menuid;?>" class="btn btn-danger pull-right">
                 	 <i class="fa fa-times"></i> Kembali</a>
                     
                </div>
                <div class="box-body">
            
                        <label>Nama User</label>
                        <div class="form-group input-group"  style="width:100%" >
                            <input type="text"  name="nama" class="form-control" required placeholder="Nama lengkap user"/>
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
					<br />
                       
                        <label>UserName</label>
                    <div class="form-group input-group"  style="width:100%" >
                        <input type="text"  name="username"  style="width:100%"  class="form-control" required placeholder="username untuk login" autocomplete="off"/>
                    </div>
                        <label>Password</label>
                        <div class="form-group input-group">
                            <input type="password" id="password2" name="password" class="form-control" required placeholder="Password" autocomplete="off"/>
                            <label class="input-group-addon">
                              <input type="checkbox" style="display:none"
                                onclick="(function(e, el){
                                  document.getElementById('password2').type = el.checked ? 'text' : 'password';
                                  el.parentNode.lastElementChild.innerHTML = el.checked ? '<i class=\'glyphicon glyphicon-eye-close\'>' : '<i class=\'glyphicon glyphicon-eye-open\'>';
                                  })(event, this)">
                               <span><i class="glyphicon glyphicon-eye-open"></i></span>
                            </label>
                        </div>
                    <script type="text/javascript">
						$(document).ready(function()
						{
							$(".re_password").focusout(function (e)
							{
								var password2 = $("#password2").val();
								var password3 = $("#password3").val();
								//alert(password);
								//return false;
								if(password2==password3)
								{
									return true;
								}else
								{
									alert('Password tidak cocok!');
									return false;
								}
							});
							$("#save").click(function (e)
							{
								var password2 = $("#password2").val();
								var password3 = $("#password3").val();
								//alert(password);
								//return false;
								if(password2==password3)
								{
									return true;
								}else
								{
									alert('Password tidak cocok!');
									return false;
								}
							});
							
							
							
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
                      <label>Ulangi Password</label>
                        <div class="form-group input-group">
                            <input type="password" id="password3" name="re_password" class="form-control re_password" required placeholder="Password" autocomplete="off"/>
                            <label class="input-group-addon">
                              <input type="checkbox" style="display:none"
                                onclick="(function(e, el){
                                  document.getElementById('password3').type = el.checked ? 'text' : 'password';
                                  el.parentNode.lastElementChild.innerHTML = el.checked ? '<i class=\'glyphicon glyphicon-eye-close\'>' : '<i class=\'glyphicon glyphicon-eye-open\'>';
                                  })(event, this)">
                               <span><i class="glyphicon glyphicon-eye-open"></i></span>
                            </label>
                        </div>
                        
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