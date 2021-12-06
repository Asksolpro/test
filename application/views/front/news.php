<?php

	$this->load->view('front/master/header');

?>



           http://solusiprogram.net/leo/uploads/news/leo_updateViewDate-0609184600.jpg



            <!--Business Section-->

          <section id="brand" class="brand fix m-top-120 "><!--footTop-->

                <div class="container">

                    <div class="row">

                        <div class="main_business">

                            

                            

                            <div class="col-md-12">

                                <div class="business_item sm-m-top-50">

									  <P>&nbsp;</P>

									<h2 class="text-uppercase"><strong>Berita</strong> </h2>

								   <hr>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section><!-- End off Business section -->

			

 			<section id="business" class="business roomy-50">

                <div class="container">

					

					<?php 

					 for($a=0; $a < count($DataView); $a++){

					 $id_news = $DataView[$a]->ID;

					 $title = $DataView[$a]->title;

					 $judul = url_title($title);

					?>

                    <div class="row">

                        <div class="main_business">

                            <div class="col-md-3">  

																

								<div class="business_item">

									<a href="<?php echo base_url();?>news/detail/<?php echo $id_news.'/'.strtolower($judul);?>">

                                        <img src="<?php echo base_url();?>uploads/news/<?php echo $DataView[$a]->image;?>">

                                     </a>

								</div>

                            </div>

                            

                            <div class="col-md-6">

                                <div class="business_item sm-m-top-50">

                                	<a href="<?php echo base_url();?>news/detail/<?php echo $id_news.'/'.strtolower($judul);?>">

                                    <h2 class="text-uppercase"><?php echo $DataView[$a]->title;?></h2>

                                    </a>

                                  

                                    <p class="m-top-20">

                                    	<?php echo $DataView[$a]->shortdesc;?>

                                    </p>



                                    <div class="business_btn">

                                        <a href="<?php echo base_url();?>news/detail/<?php echo $id_news.'/'.$judul;?>" class="btn btn-default m-top-10">Read More</a>

                                        <!--<a href="" class="btn btn-primary m-top-20">Buy Now</a>-->

                                    </div>



                                </div>

                            </div>

                        </div>

                    </div>

					<hr>

					

				<?php } ?>	

					

                </div>

            </section><!-- End off Business section -->





            



	<?php

		$this->load->view('front/master/footer');

	?>