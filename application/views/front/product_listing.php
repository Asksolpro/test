<?php
	$this->load->view('front/master/header');
?>

            <section id="home" class="home-2">
				
            </section>


            
            <section id="business" class="business bg-grey roomy-70">
                <div class="container">
                    <div class="row">
                        <div class="main_business">
                             <?php echo $this->load->view('front/master/left_cat');?>
                            
                            <div class="col-md-9">
                            	<div style="padding:10px 0; height:50px; ">
                                    <div class="col-sm-6" style="color:#1391A7; font-size:24px;">
                                       
                                        	<?php echo $namaCat[0]->nama_cat;?>
                                       
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <ol class="breadcrumb">
                                            <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Home</a></li>
                                            <li class="active"><?php echo $namaCat[0]->nama_cat;?></li>
                                        </ol>
                                    </div>
                                </div>
                                
                                <div class="business_item sm-m-top-20">
									
									<?php
										 $titleCat = url_title(strtolower($namaCat[0]->nama_cat));

										 for($a=0; $a < count($dataProduct); $a++)
										 {
												 $id_product = $dataProduct[$a]->ID;
												 $id_cat = $dataProduct[$a]->id_category;
												 $nm_product = $dataProduct[$a]->name;
												 $getImage = $this->master_model->select_in('product_image', 'ImageName', "WHERE id_product = $id_product AND mainImage = 1");

												 if(count($getImage)==0)
												 {
													 $img_prod = 'noimage.jpg';
												 }else{
													  $img_prod = $getImage[0]->ImageName;
												 }

												  $titleprod = url_title(strtolower($nm_product));

												 echo '
												 <div class="col-sm-4 text-center" style="margin-top:20px;">
												<a href="'.base_url().'product/detail/'.$id_cat.'/'.$id_product.'/'.$titleprod.'_'.$titleCat.'">
													<div class="brand_item sm-m-top-20">
														<img src="'.base_url().'uploads/gallery/'.$img_prod.'" alt="'.$nm_product.'" height="250" />
														<p>
															'.$nm_product.'
														</p>
													</div>
												</a>
											</div>';

  										}
									?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End off Business section -->


            

	<?php
		$this->load->view('front/master/footer');
	?>