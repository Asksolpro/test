<?php

		$data_contact= $this->master_model->select_in('content_master', '*', "WHERE content_for= 'contact'");

		$data_about = $this->master_model->select_in('content_master', '*', "WHERE content_for= 'about'");

		$news = $this->master_model->select_in('content_master', '*', "WHERE content_for = 'news' order by ID DESC limit 3");

?>

<style>

.text-success

	{

	  color: white;

	}

</style>







<footer id="contact" class="footer action-lage bg-black p-top-80 footTop">

                <!--<div class="action-lage"></div>-->

                <div class="container">

                    <div class="row">

                        <div class="widget_area">

                            <div class="col-md-4">

                                <div class="widget_item widget_about">

                                    <h5 class="text-white">Contact Us</h5>

                                   



										<?php

												$shortdesc = $data_contact[0]->shortdesc;	



												$expl = explode("==*==", $shortdesc);

												$alamat = $expl[0];

												$tlp = $expl[1];

												$email = $expl[2];

										?>



                                    <div class="widget_ab_item m-top-30">

                                        <div class="item_icon"><i class="fa fa-location-arrow" style="color:#fff"></i></div>

                                        <div class="widget_ab_item_text">

                                            <h6 class="text-white">Location</h6>

                                            <p class="text-white">

                                                <?php echo $alamat ;?>

											</p>

                                        </div>

                                    </div>

                                    <div class="widget_ab_item m-top-30">

                                        <div class="item_icon"><i class="fa fa-phone" style="color:#fff"></i></div>

                                        <div class="widget_ab_item_text">

                                            <h6 class="text-white">Phone :</h6>

                                            <p class="text-white"><?php echo $tlp  ;?></p>

                                        </div>

                                    </div>

                                    <div class="widget_ab_item m-top-30">

                                        <div class="item_icon"><i class="fa fa-envelope-o" style="color:#fff"></i></div>

                                        <div class="widget_ab_item_text">

                                            <h6 class="text-white">Email Address :</h6>

                                            <p class="text-white"><?php echo $email ;?></p>

                                        </div>

                                    </div>

                                </div><!-- End off widget item -->

                            </div><!-- End off col-md-3 -->



                            <div class="col-md-4">

                                <div class="widget_item widget_latest sm-m-top-50">

                                    <h5 class="text-white">Maps</h5>

                                  

							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126925.78121327341!2d106.41561724755691!3d-6.206786506813218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e420163a32706af%3A0x9cd3e8138ccedc94!2sGudang+Balaraja!5e0!3m2!1sid!2sid!4v1499326032788" width="300" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>

									

                                    

                                </div><!-- End off widget item -->

                            </div><!-- End off col-md-3 -->



                            <div class="col-md-3">

                                <div class="widget_item widget_service sm-m-top-50">

                                    <h5 class="text-white">Latest News</h5>

									<?php
									 for($n=0; $n < count($news); $n++)
									 {
										 $titel = $news[$n]->title;
										 $id_news = $news[$n]->ID;
										 $tglNews = $news[$n]->date;

										  $image= $news[$n]->image;

										 

										 

										 echo '<div class="widget_latst_item m-top-30">

												<div class="item_icon"><img src="'.base_url().'uploads/news/'.$image.'" alt="" /></div>

												<div class="widget_latst_item_text">

													<p >
														<a href="'.base_url().'news/detail/'.$id_news.'/'.str_replace(' ','-',strtolower($news[$n]->title)).'" class="text-white">
															'.$news[$n]->title.'
														</a>
													</p>

													<a href="" class="text-white">'.date('d, F Y', strtotime($tglNews)) .'</a>

												</div>

											</div>';

									 }

									

									?>

									

                                 

                                    

                                </div><!-- End off widget item -->

                            </div><!-- End off col-md-3 -->



                            <div class="col-md-3">

                                <div class="widget_item widget_newsletter sm-m-top-50">

                                    <h5 class="text-white">Newsletter</h5>

                                    <form class="form-inline m-top-30" name="subscribe" method="post" action="<?php echo base_url();?>contact/save_email_subscribe" id="main-contact-form">

                                        <div class="form-group">

                                            <input type="email" name="email" id="em_sub" class="form-control" placeholder="Enter you Email">

                                            <button type="submit" class="btn text-center"><i class="fa fa-arrow-right"></i></button>

                                        </div>

                                    </form>

									<div class="form_status"></div>'

                                    <div class="widget_brand m-top-40">

                                        <a href="" class="text-uppercase">

                                        	<img src="<?php echo base_url();?>assets/images/logo.png">

                                        </a>

                                        <p class="text-white"><?php echo $data_about[0]->shortdesc;?></p>

                                    </div>

                                    <ul class="list-inline m-top-20 text-white">

                                        <li>-  <a href=""><i class="fa fa-facebook" style="color:#fff"></i></a></li>

                                        <li><a href=""><i class="fa fa-twitter" style="color:#fff"></i></a></li>

                                        <li><a href=""><i class="fa fa-linkedin" style="color:#fff"></i></a></li>

                                        <li><a href=""><i class="fa fa-google-plus" style="color:#fff"></i></a>  - </li>

                                        

                                    </ul>



                                </div><!-- End off widget item -->

                            </div><!-- End off col-md-3 -->

                        </div>

                    </div>

                </div>

                

                <div class="main_footer fix bg-mega text-center p-top-40 p-bottom-30 m-top-80">

                    <div class="col-md-12">

                        <p class="wow fadeInRight" data-wow-duration="1s">

                            Copyright &copy;

                            <a target="_blank" href="http://webhostku.asia">LEO - Love Each Other</a> 

                            2017. All Rights Reserved

                        </p>

                    </div>

                </div>

            </footer>









        </div>



        <!-- JS includes -->



        <script src="<?php echo base_url();?>assets/js/vendor/jquery-1.11.2.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/vendor/bootstrap.min.js"></script>



        <script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.magnific-popup.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.easing.1.3.js"></script>

        <script src="<?php echo base_url();?>assets/css/slick/slick.js"></script>

        <script src="<?php echo base_url();?>assets/css/slick/slick.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.collapse.js"></script>

        <script src="<?php echo base_url();?>assets/js/bootsnav.js"></script>







        <script src="<?php echo base_url();?>assets/js/plugins.js"></script>

        <script src="<?php echo base_url();?>assets/js/main.js"></script>





 <script>

		$(document).ready(function(e) {

           	// Contact form

			var form = $('#main-contact-form');

			form.submit(function(event){

				event.preventDefault();

				var form_status = $('<div class="form_status"></div>');

				$.ajax({

					type:"POST",

					url: $(this).attr('action'),

					data:$(this).serialize(),

					beforeSend: function(){

						form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> sedang menyimpan data..</p>').fadeIn() );

					}

				}).done(function(msg){

					

						if(msg=='true')

						{

							$("#em_sub").val("");

							form_status.html('<p class="text-success"> <i class="fa fa-check"></i>  Terima kasih telah melakukan subscribe.</p>').delay(3000).fadeOut();

						}else{

							

							form_status.html('<p class="text-success" style="color:red"> <i class="fa fa-times"></i> Email ini sudah terdaftar, gunakan email lain.</p>').delay(3000).fadeOut();

						}

					

				});

			}); 

        });

		</script>



    </body>

</html>

