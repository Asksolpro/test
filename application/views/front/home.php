<?php

	$this->load->view('front/master/header');

?>

			

            <section id="home" class="home">
                <!--<div class="overlay"></div>-->
                    <div class="row">
                        <div class="main_home text-center">
                            <div class="col-md-12">
                                <div class="hello_slid">
									<?php
									 for($i=0; $i < count($data_banner); $i++)
									 {
 										 $Image = $data_banner[$i]->Image;
										 $link = $data_banner[$i]->link;
										 $desc_1 = $data_banner[$i]->desc_1;
										 $desc_2 = $data_banner[$i]->desc_2;
									?>
                                    
                                    <div class="slid_item" style="background:url(<?php echo base_url();?>uploads/banner/<?php echo $data_banner[$i]->Image;?>)no-repeat scroll  center center"> 
                                    	
										<div class="home_text slide-caption">
                                        	<br />
                                            <br />
                                            <br />
                                            <br />
                                            <br />
                                            <h2 class="text-white"><?php echo $desc_1;?></h2>
                                            <h1 class="text-white"><?php echo $desc_2;?></h1>
                                            <!--<h3 class="text-white">- Peripheral Pump/ Self-Priming Periphral Pump -</h3>-->
                                        </div>
                                        
                                        <div class="home_btns slide-more">
                                            <!--<a href="<?php echo base_url().'/'.$link;?>" class="btn btn-default m-top-20">Read More</a>-->
                                        </div>
                                    </div>
                                  <?php } ?> 
                                </div>
                            </div>
                    </div>
                </div>
            </section> 
            
            
            
            

            <section id="brand" class="brand fix roomy-80 ">
                <div class="container">
                    <div class="row">
                        <div class="main_brand text-center">
							<?php 

							 for($a=0; $a < count($getCat); $a++) 
							 {
							   $catName = $getCat[$a]->name;
							   $id_cat = $getCat[$a]->ID;
							   $titleCat = url_title(strtolower($catName));
							   $getProd =  $this->master_model->select_in('ms_product', 'ID, name', "WHERE id_category =$id_cat order by ID DESC limit 1");
							 if(count($getProd)==0)
							 {
								$img_prod = 'noimage.jpg';
								$nm_product = 'Leo pump indonesa';
							 }else{
								 $id_product = $getProd[0]->ID;
								 $nm_product = $getProd[0]->name;
								 $getImage = $this->master_model->select_in('product_image', 'ImageName', "WHERE id_product = $id_product AND mainImage = 1");
								 if(count($getImage)==0)
								 {
									 $img_prod = 'noimage.jpg';

								 }else{

									  $img_prod = $getImage[0]->ImageName;
								 }
								  $titleprod = url_title(strtolower($nm_product));
							 }

							?>

                            <div class="col-md-3 col-sm-4 col-xs-6">
                            	<a href="<?php echo base_url().'product/category/'.$id_cat.'/'.$titleCat;?>">
                                    <div class="brand_item sm-m-top-20">
                                        <img src="<?php echo base_url().'uploads/gallery/'.$img_prod.'" alt="'.$nm_product;?>" class="img-category" />
                                        <p>
                                           <?php echo $catName;?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                           <?php } ?>
                        

                        </div>
                         
                    </div>

                </div>

            </section>





			<section id="business" class="business bg-grey roomy-40">
                <div class="container">
                    <div class="main_business">
                        <div class="main_features fix roomy-20">
                            <div class="col-md-6">
                                <div class="port_item xs-m-top-30">
                                	<div style="padding:10px;">
                                        <iframe style="width:100%; height:280px" src="<?php echo base_url();?>assets/images/video.mp4" frameborder="0" allowfullscreen autoplay="0"></iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="business_item xs-m-top-30">
                                	<div style="padding:10px;">
                                        <h2 class="text-uppercase"><strong>PT LEO PUMP INDONESIAXS</strong></h2>
                                        <p class="m-top-20">
                                        <?php echo word_limiter($data_about[0]->desc,80);?>
                                        </p>
                                        <div class="business_btn">
                                            <a href="<?php echo base_url();?>about" class="btn btn-default m-top-20">Baca Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            

			<!--
            <section id="business" class="business bg-grey roomy-70">
                <div class="container">
                    <div class="row">
                        <div class="main_business">
                            <div class="col-md-6">
                                <div class="business_slid">
                                    <div class="slid_shap bg-grey"></div>
                                    <div class="business_items text-center">
                                        <div class="business_item">
                                            <div class="business_img">
                                            	 <video controls>
                                                  <source src="<?php echo base_url();?>assets/images/video.mp4" type="video/mp4">
                                                </video> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="business_item sm-m-top-50">
                                    <h2 class="text-uppercase"><strong>PT LEO PUMP INDONESIA</strong></h2>
                                    <p class="m-top-20">
                                    <?php echo word_limiter($data_about[0]->desc,80);?>
                                    </p>
                                    <div class="business_btn">
                                        <a href="<?php echo base_url();?>about" class="btn btn-default m-top-20">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            -->
            
            
            
            
            
            
            

            <!--<section id="product" class="product">

                <div class="container">

                    <div class="main_product roomy-80">

                        <div class="head_title text-center fix">

                            <h2 class="text-uppercase">Produk Baru</h2>

                            <!--<h5>Clean and Modern design is our best specialist</h5>-

                        </div>

                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">

                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>

                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>

                            </ol>

                            <div class="carousel-inner" role="listbox">

                                <div class="item active">

                                    <div class="container">

                                        <div class="row">

                                            <div class="col-sm-3">

                                                <div class="port_item xs-m-top-30">

                                                    <div class="port_img">

                                                        <img src="<?php echo base_url();?>assets/images/brand.png" alt="" />

                                                        <div class="port_overlay text-center">

                                                            <a href="assets/images/brand.png" class="popup-img">+</a>

                                                        </div>

                                                    </div>

                                                    <div class="port_caption m-top-20">

                                                        <h5>Your Work Title</h5>

                                                        <h6>- Graphic Design</h6>

                                                    </div>

                                                </div>

                                            </div>

                                          

                                        </div>

                                    </div>

                                </div>

                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">

                                <i class="fa fa-angle-left" aria-hidden="true"></i>

                                <span class="sr-only">Previous</span>

                            </a>

                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">

                                <i class="fa fa-angle-right" aria-hidden="true"></i>

                                <span class="sr-only">Next</span>

                            </a>

                        </div>

                    </div>

                </div>

            </section>-->

	<?php

		$this->load->view('front/master/footer');

	?>