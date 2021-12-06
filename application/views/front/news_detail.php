<?php

	$this->load->view('front/master/header');
	$ID=$this->uri->segment(3);
?>



           



            <!--Business Section-->

          <section id="brand" class="brand fix" style="margin-top:140px;"><!--footTop-->

                <div class="container">

                    <div class="row">

                        <div class="main_business">

                            

                            

                            <div class="col-md-8">
                                <div class="business_item sm-m-top-50">
									<h2 class="text-uppercase"><strong>NEWS DETAIL</strong> </h2>
                                        <ol class="breadcrumb">
                                            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                            <li class="active">News</li>
                                        </ol>
                                    <p class="m-top-20">
                                    	<img src="<?php echo base_url();?>uploads/news/<?php echo $DataView[0]->image;?>" width="400" style="float:left; margin:0 10px 10px 0">
                                    	<?php echo $DataView[0]->desc;?>
                                    </p>
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-md-4">
                            	<h3 class="text-uppercase"><strong>OTHER NEWS</strong> </h3>
                                <br />
                                <?php
									$data_other=$this->master_model->select_in('content_master','*',"WHERE content_for='news' AND ID <> $ID");
									
									for($a=0; $a < count($data_other); $a++)
									{
										echo'
											<div style="height:80px; border-bottom:1px solid #dadada">
												<div class="col-md-4">
													<a href="'.base_url().'news/detail/'.$data_other[$a]->ID.'/'.str_replace(' ','-',strtolower($data_other[$a]->title)).'">
														<img src="'.base_url().'uploads/news/'.$data_other[$a]->image.'" width="100">
													</a>
												</div>
												<div class="col-md-8">
													<strong>
														<a href="'.base_url().'news/detail/'.$data_other[$a]->ID.'/'.str_replace(' ','-',strtolower($data_other[$a]->title)).'">
															'.$data_other[$a]->title.'
														</a>
													</strong>
													<br>
													';
														$date=strtotime($data_other[$a]->date);
													echo'
													'.date('d F Y', $date).'
												</div>
											</div>
										';
									}
								?>
                            </div>

                        </div>

                    </div>

                </div>

            </section><!-- End off Business section -->





            



	<?php

		$this->load->view('front/master/footer');

	?>