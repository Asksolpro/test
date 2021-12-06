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
                            	<div style="padding:10px 0; height:40px; ">
                                    <div class="col-sm-6" style="color:#1391A7; font-size:24px; ">
                                       <strong>
                                        	Produk list
                                        </strong>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <ol class="breadcrumb">
                                            <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Home</a></li>
                                            <li class="active">Product Category<?php //echo $namaCat[0]->nama_cat;?></li>
                                        </ol>
                                    </div>
                                </div>
                                
                                <div class="business_item sm-m-top-20">
                                
                                  <?php 
								  for($a=0; $a < count($getCat); $a++) {
									  
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
                                    <div class="col-sm-4 text-center" style="margin-top:20px;">
                                        <a href="<?php echo base_url().'product/category/'.$id_cat.'/'.$titleCat;?>">
                                            <div class="brand_item sm-m-top-20">
                                               <img src="<?php echo base_url().'uploads/gallery/'.$img_prod.'" alt="'.$nm_product;?>" height="200" />
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
                    </div>
                </div>
            </section><!-- End off Business section -->


            

	<?php
		$this->load->view('front/master/footer');
	?>