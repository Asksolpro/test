<?php

        $this->load->view('admin/master/header_2');

		$modul=$this->uri->segment(2);

		$funct=$this->uri->segment(3);

		$menuid=$this->uri->segment(4);

		$titleModul = 'Banner';

    ?>

<script>

	var openFile = function(event) {

		var input = event.target;



		var reader = new FileReader();

		reader.onload = function() {

			var dataURL = reader.result;

			var output = document.getElementById('output');

			output.src = dataURL;

		};

		reader.readAsDataURL(input.files[0]);

	};



</script>

<style>

	.banner_upload {

		border: 1px solid #CCC;

		padding: 20px;

	}



</style>

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



			<div class="box box-default">

				<div class="box-header with-border">

					<button type="button" class="btn btn-info btn-fill pull-right tambah" >

                    <i class="fa fa-plus" aria-hidden="true"></i>

                    Tambah Banner

            </button>

					<h3>Upload New

						<?=$titleModul;?>

					</h3><br />



					<div class="banner_upload" style="display:none">

						<div class="alert alert-danger">

							<i class="fa fa-info-circle"></i> Ukuran Gambar Max. &nbsp;&nbsp; File Size : 2 MB, Width : 1500px , Height : 500px

						</div>

						<div class="row" >

							<div class="col-md-6">

								<form action="<?php echo site_url(); ?>admin/banner/insert_process/<?php echo $menuid;?>" name='galery_form' id="galery_form" method='post' enctype="multipart/form-data">

									<table width="100%">

										<tr height="50">

											<td>Image </td>

											<td>

												<input type='file' id="upload5" name="ImageUpload" accept='image/*' style="display:none" onchange='openFile(event)'>

												<button type="button" class="btn btn-primary" id="change_image5">Choose Image</button><br>

											</td>

										</tr>

										<tr>

											<td>Link </td>

											<td><br><input type="text" name="link" style="width:310px;" placeholder="leo.com/linkname"> </td>

										</tr>

										<tr height="60">

											<td> </td>

											<td> <button type="submit" class="btn btn-success">Save</button> </td>

										</tr>

									</table>

								</form>

							</div>

							<div class="col-md-6">

								<img src="<?php echo base_url();?>uploads/banner/preview.png" id="output" width="400" height="150">

							</div>



						</div>

					</div>

				</div>

				<!-- /.box-header -->

				<div class="box-body">

					<div class="row">

						<div class="col-md-12">

							<table class="table">

								<thead>

									<tr>
										<th scope="col">Image</th>

                                        <th scope="col">Description</th>

										<th scope="col">Link</th>

										<th scope="col">Sort</th>

										<th scope="col">Publish</th>

										<th scope="col">Delete</th>

									</tr>

								</thead>

								<tbody>

									<?php

									 for($a=0; $a < count($DataView); $a++)

									 {

										  $image = $DataView[$a]->Image;

										  $bannerID = $DataView[$a]->bannerID;

										  $link = $DataView[$a]->link;

										  $desc_1 = $DataView[$a]->desc_1;

										  $desc_2 = $DataView[$a]->desc_2;

										  $sort = $DataView[$a]->Sort;

										  $publish = $DataView[$a]->Publish;





										 if($publish==1)

										 {

										  	 $icon = '<i class="fa fa-check" aria-hidden="true"></i>';

											 $classpublish = 'text-green';



										 }else{

											 $icon = '<i class="fa fa-times" aria-hidden="true"></i>';

											 $classpublish = 'text-red';

										 }





										 echo '<tr>
												<td><img src="'.base_url().'uploads/banner/'.$image.'"  width="200"></td>

												<td>
													<input type="text" class="form-control" name="desc_1[]" value="'.$desc_1.'">
													<br>
													<input type="text" class="form-control" name="desc_2[]" value="'.$desc_2.'">
												</td>

												<td>
													<input type="text" class="form-control" name="link[]" value="'.$link.'">
													<input type="hidden" class="form-control" name="ID[]" value="'.$bannerID.'">
												</td>

												<td><input type="text" class="form-control" name="sort[]" size="1" value="'.$sort.'"></td>

												<td style=" text-align:center">

												<a href="'.base_url().'admin/banner/changepublish/'.$menuid.'/'.$bannerID .'/'.$publish.'" class="'.$classpublish.'">'.$icon.'</td>

												<td style=" text-align:center">

												<a href="'.base_url().'admin/banner/delete/'.$menuid.'/'.$bannerID .'" class="text-red"><i class="fa fa-trash" aria-hidden="true"></i></td>

											</tr>';

									 }





									?>



								</tbody>

							</table>

						</div>

						<!-- /.col -->

					</div>

					<!-- /.row -->

				</div>

				<!-- /.box-body -->

				<div class="box-footer">

				</div>

			</div>

		</form>

	</section>

</div>

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah Banner Baru</h4>
          </div>
          <form action="<?php echo site_url(); ?>admin/banner/insert_process/<?php echo $menuid;?>" name='galery_form' id="galery_form" method='post' enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label>Image</label>
                <input type='file' id="upload5" name="ImageUpload" accept='image/*' style="display:none" onchange='openFile(event)'>

                <button type="button" class="btn btn-primary" id="change_image5">Choose Image</button><br>
              </div>
            </div>

            <div class="modal-footer">
            </div>
          </form>
        </div>
      </div>
    </div>


<?php

        $this->load->view('admin/master/footer_2');

    ?>

<script type="text/javascript">

	//$(document).ready(function() {

		$("#change_image5").click(function() {

			$("#upload5").trigger("click");

			//$(".image-gallery").show();



		});



		$(".tambah").click(function() {

			$(".banner_upload").toggle();

			//$(".image-gallery").show();



		});

	//});



</script>
