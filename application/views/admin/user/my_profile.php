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





<script>

	$(document).ready(function(){

	chekbox = 0;

		//$(".form_status").html('<p class="text-success"> <i class="fa fa-check"></i>Password telah berhasil direset</p>').delay(3000).fadeOut();

		$("#update_pass").click(function(){

								

			$(".edit-pass").toggle();

			

			 if ($(this).prop('checked')==true){ 

				 chekbox = 1;

			 }else{

				 chekbox = 0;

			 }

							

		});

		

		

	});





</script>





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

          	<form action="<?php echo base_url();?>admin/admin_user/edit_profile_process/<?php echo $UserID;?>" method="post">

                <div class="box-header">

                  <h3 class="box-title"> My Profile

                  </h3>

                      <a href="<?php echo base_url();?>admin/user/index/<?php echo $menuid;?>" class="btn btn-danger pull-right">

                 	 <i class="fa fa-times"></i> Kembali</a>

                     

                </div>

                <div class="box-body">

            

                        <label>Nama User</label>

                        <div class="form-group input-group"  style="width:100%" >

                            <input type="text"  name="nama" class="form-control" required value="<?php echo $Nama;?>"/>

                        </div>

                        

                        

                    <label>UserName</label>

                    <div class="form-group input-group"  style="width:100%" >

                        <input type="text"  name="username"  style="width:100%"  class="form-control"  value="<?php echo $UserName;?>" autocomplete="off"/>

                    </div>

					

					<input type="checkbox" name="update_pass" id="update_pass" value="1"> Ganti Password<br><br>

					

				<div style="display:none;" class="edit-pass">

					<label>Password Login</label>

                        <div class="form-group input-group">

                            <input type="password" id="password1" name="password_old" class="form-control" required placeholder="Password saat ini" autocomplete="off"/>

                            <label class="input-group-addon">

                              <input type="checkbox" style="display:none"

                                onclick="(function(e, el){

                                  document.getElementById('password2').type = el.checked ? 'text' : 'password';

                                  el.parentNode.lastElementChild.innerHTML = el.checked ? '<i class=\'glyphicon glyphicon-eye-close\'>' : '<i class=\'glyphicon glyphicon-eye-open\'>';

                                  })(event, this)">

                               <span><i class="glyphicon glyphicon-eye-open"></i></span>

                            </label>

                        </div>

					<div class="chekPassInfo"></div>

					

					<label>Password Baru</label>

                        <div class="form-group input-group">

                            <input type="password" id="password2" name="password" class="form-control" required placeholder="masukan Password Baru" autocomplete="off"/>

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

								var old_pass  = $("#password1").val();

								var password2 = $("#password2").val();

								var password3 = $("#password3").val();

								//var update_pass = $("#update_pass").val();

								

								if(chekbox==1)
								{
										//alert('test 34535');

										$.ajax({
											type:"POST",
											url: '<?php echo base_url();?>admin/admin_user/cek_old_pass/',
											data:"old_pass="+old_pass,
											beforeSend: function()
											{
												$(".chekPassInfo").html('<p><i class="fa fa-spinner fa-spin"></i> checking password..</p>').fadeIn() );
											}
										}).done(function(msg)
										{
											   if(msg =='false')
												{
													$(".chekPassInfo").html('<p class="text-success"> <i class="fa fa-check"></i> Password salah !!</p>').delay(3000).fadeOut();
												}
										});
								}


								if(password2==password3)

								{

									return true;

								}else

								{

									alert('Password tidak cocok!');

									return false;

								}

							});
							

						});

					</script>

                      <label>Ulangi Password Baru</label>

                        <div class="form-group input-group">

                            <input type="password" id="password3" name="re_password" class="form-control re_password" required placeholder="Ulangi Password Baru" autocomplete="off"/>

                            <label class="input-group-addon">

                              <input type="checkbox" style="display:none"

                                onclick="(function(e, el){

                                  document.getElementById('password3').type = el.checked ? 'text' : 'password';

                                  el.parentNode.lastElementChild.innerHTML = el.checked ? '<i class=\'glyphicon glyphicon-eye-close\'>' : '<i class=\'glyphicon glyphicon-eye-open\'>';

                                  })(event, this)">

                               <span><i class="glyphicon glyphicon-eye-open"></i></span>

                            </label>

                        </div>

                        

					

					

                  </div>	    

                   

                     

                        

                    <button type="submit" name="simpan" class="btn btn-success" id="save">Update Profile</button>    

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