	<?php 

        $this->load->view('admin/master/header_2');

		$modul=$this->uri->segment(2);

		$funct=$this->uri->segment(3);

		$menuid=$this->uri->segment(4);

	



		$id = 0;

		$title = '';

		$desc = '';



		if(count($dataAbout)<> 0)

		{

			$id = $dataAbout[0]->ID;

			$title = $dataAbout[0]->title;

			$desc = $dataAbout[0]->desc;

		}

	

		

		$titleModul = 'About Us';

		



		$classAbout = 'btn-default';

		$classVisi  = 'btn-default';

		$classSertifikat = 'btn-default';

		$classKarir  = 'btn-default';

		

		if($funct=='index')

		{

			$classAbout = 'btn-info';

		}else if($funct=='visimisi'){

			$classVisi = 'btn-info';

		}else if($funct=='sertifikasi'){

			$classSertifikat = 'btn-info';

		}else{

			$classKarir = 'btn-info';

		}





    ?>




	<div class="content-wrapper">

        <section class="content-header">

            <h1>

              <?=$titleModul;?>

                <small>Content <?=$titleModul;?></small>

            </h1>

            <ol class="breadcrumb">

                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

                <li class="active">

                	<?=$titleModul;?>

                </li>

            </ol>

        </section>

        

        <section class="content">

        

       

	<form action="<?php echo base_url();?>admin/<?php echo $modul;?>/insert_content/<?php echo $menuid;?>" method="post" enctype="multipart/form-data">

	

     <div class="box box-default">

        <div class="box-header with-border">

         

           <a href="<?php echo base_url();?>admin/<?php echo $modul;?>/index/<?php echo $menuid;?>" class="btn <?php echo $classAbout;?>">Tentang LEO</a>

           <a href="<?php echo base_url();?>admin/<?php echo $modul;?>/visimisi/<?php echo $menuid;?>" class="btn <?php echo $classVisi;?>">Visi Misi</a>

           <a href="<?php echo base_url();?>admin/<?php echo $modul;?>/sertifikasi/<?php echo $menuid;?>" class="btn <?php echo $classSertifikat;?>">Sertifikasi</a>

           <a href="<?php echo base_url();?>admin/<?php echo $modul;?>/karir/<?php echo $menuid;?>" class="btn <?php echo $classKarir;?>">Karir</a>

            

            

			    

				<button type="submit" name="submit" value="1" class="btn btn-success btn-fill pull-right save">Simpan</button>

			   <a href="" class="btn btn-danger btn-fill pull-right" style="margin-right:5px;" onclick="window.history.go(-1); return false;">Kembali</a>

       

        </div>

        <!-- /.box-header -->

        <div class="box-body">

          <div class="row">

            <div class="col-md-12">

                

                <div class="form-group">

                    <label>Title</label>

					<input type="hidden" name="id" value="<?php echo $id;?>">

                    <input type="hidden" name="content_for" value="<?php echo $funct;?>">

                    <input type="text" name="name" style="width:40%;" class="form-control" placeholder="judul content" value="<?php echo $title;?>"required="required">

                </div>

                 <div class="form-group">

                    <label>Deskripsi</label>

                    <textarea name="desk" id="editor1" class="form-control" placeholder="Isi Deskripsi Barang"><?php echo $desc;?></textarea>

                </div>

               

            </div>

           

            <!-- /.col -->

          </div>

          <!-- /.row -->

        </div>

        <!-- /.box-body -->

        <div class="box-footer">

         

   <tr>

                                            	<td>

                                                	<strong>Note</strong> : Untuk menampilkan gambar popup, klik tombol &lt;&gt;Source di kiri atas, kemudian cari tag <em>&lt;img</em> yang telah anda upload, tambahkan kode <em>&lt;a href="http://buycondosingapore.com/uploads/files/name-image.jpg" data-imagelightbox="f"&gt;</em> di depan tag <em>&lt;img</em>, kemudian tutup dengan <em>&lt;/a&gt;</em> di akhir tag <em>&lt;img</em> tersebut, kemudian  Update.

                                                    <br />

                                                    <br />

                                                    Contoh :

                                                	<pre><code>&lt;a href="http://buycondosingapore.com/uploads/files/name-image.jpg" data-imagelightbox="f"&gt;&lt;img alt="" src="http://buycondosingapore.com/uploads/files/name-image.jpg"&gt;&lt;/a&gt;</code></pre>

                                                    

                                                    <br />

                                                    <br />

                                                    <strong>Note</strong> : Untuk menampilkan video responsive, tambahkan <em>&lt;div class="video-container"></em> di depan <em>&lt;iframe</em>, kemudian hapus ukuran video <em>width=""</em> dan <em>height=""</em>.

                                                    <br />

                                                    <br />

                                                    Contoh :

                                                	<pre><code>&lt;div class="video-container"&gt;&lt;iframe src="https://www.youtube.com/embed/code-video"&gt;&lt;/iframe&gt;&lt;/div&gt;</code></pre>

                                                </td>

                                            </tr>

        </div>

      </div>

		

		

               </form>

               

    	</section>

        

  </div>



    <?php 



        $this->load->view('admin/master/footer_2');



    ?>





            	<script type="text/javascript">

					$(document).ready(function()

					{

						exist2 = 0;

						$("#code").change(function (e){

							var kd_barang = $(this).val();

							 $("#kode-result").show();

							$.ajax({

								 type:"POST",

								 url: "<?php echo base_url();?>admin/master/kode_checker",

								 data:"kd_barang="+kd_barang,

								 success:function(msg)

								 {

									 if(msg == 1)

									 {

										 exist2 = 1;

										 $("#kode-result").html('<font style="color:#FF024F"><i class="fa fa-times"></i> Kode sudah digunakan</font>');

									 }else{

										 exist2 = 0;

										 $("#kode-result").html('<font style="color:#2BB0EA"><i class="fa fa-check" style="color:#2DBE00"></i> Kode belum digunakan</font>');

									 }

								 }

							});

						});

						

						$(".save").click(function(){

							if(exist2 == 1)

							{

								alert('Kode Sudah Digunakan');

								return false;

							}else{

								return true;

							}

						});

						

					});

				</script>

                        



