<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        
        <?php
			$content=$this->uri->segment(1);
			
			if($content=='')
			{
				$meta_content='perusahaan teknologi tinggi nasional yang bergerak di bidang riset dan pengembangan, desain, manufaktur, penjualan dan pelayanan semua seri pompa';
			}else
			{
				$meta_content=$content;
			}
		?>
        <title>PT LEO PUMP INDONESIA | perusahaan teknologi tinggi nasional yang bergerak di bidang riset dan pengembangan, desain, manufaktur, penjualan dan pelayanan semua seri pompa</title>
        <meta content="PT LEO PUMP INDONESIA | <?php echo $meta_content;?>" property="og:title" />
        
        <meta name="robots" content="noindex, nofollow" />
		
        <meta name="description" content="PT LEO PUMP INDONESIA  adalah anak perusahaan yang sepenuhnya dimiliki oleh Leo Group Co.Ltd di Indonesia. ">
        
        
        <meta property="og:image" content=""/>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.png">

        <!--Google Font link-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/slick/slick.css"> 
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/slick/slick-theme.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/iconfont.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootsnav.css">

        
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
        
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css" />

        <script src="<?php echo base_url();?>assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        
        <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59670a1b05274f001305a9ed&product=inline-share-buttons"></script>
    </head>

    <body data-spy="scroll" data-target=".navbar-collapse">


        <!-- Preloader 
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                	<img src="<?php echo base_url();?>assets/images/loading.png">
                    
                </div>
            </div>
        </div>
       -->


        <div class="culmn">
            <!--Home page style-->


            <nav class="navbar navbar-default bootsnav navbar-fixed">
                <div class="navbar-top bg-grey fix">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="navbar-callus text-left sm-text-center">
                                    <ul class="list-inline">
                                        <li><a href=""><i class="fa fa-phone"></i> Call us: (021) 225.95567</a></li>
                                        <li><a href=""><i class="fa fa-envelope-o"></i> Contact us: info@leopumps.co.id</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="navbar-socail text-right sm-text-center">
                                	<!--<div class="sharethis-inline-share-buttons"></div>-->
                                    <ul class="list-inline">
                                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Start Top Search -->
                <div class="top-search">
                    <div class="container">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <!-- End Top Search -->


                <div class="container"> 
                    <div class="attr-nav">
                        <ul>
                            <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div> 

                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url();?>">
                            <img src="<?php echo base_url();?>assets/images/logo-top.png" class="logo" alt="">
                            <!--<img src="assets/images/footer-logo.png" class="logo logo-scrolled" alt="">-->
                        </a>

                    </div>
                    
                    <?php
						
						
						$data_menu=array
						(
							'1'=>'Beranda',
							'2'=>'Tentang Kami',
							'3'=>'Produk',
							'4'=>'Berita',
							'5'=>'Hubungi Kami',
                            '6'=>'Video',
						);
						
						$data_link=array
						(
							'1'=>'',
							'2'=>'about',
							'3'=>'product',
							'4'=>'news',
							'5'=>'contact',
                            '6'=>'video',
						);
						
						//print_array($data_menu);
					?>
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right">
                        	<?php
								for($a=0; $a < count($data_menu); $a++)
								{
									$b=$a+1;
									$menu_name=@$data_menu[$b];
									$menu_link=@$data_link[$b];
									
									if($content=='$menu_link')
									{
										$active='style="color:#1592A5"';
									}else
									{
										$active='';
									}
									
									echo'
										<li>
											<a href="'.base_url().''.$menu_link.'" '.$active.'>
												'.$menu_name.'
											</a>
										</li> 
									';
								}
							?>
                            <!--<li>
                            	<a href="<?php echo base_url();?>">
                                	Beranda
                                </a>
                            </li>                    
                            <li >
                            	<a href="<?php echo base_url();?>about">
                                	Tentang Kami
                                </a>
                            </li>
                            
                            <li><a href="<?php echo base_url();?>product">Produk</a></li>
                            <li><a href="<?php echo base_url();?>news">Berita</a></li>
                            <li><a href="<?php echo base_url();?>contact">Hubungi Kami</a></li>-->
                        </ul>
                    </div>
                </div> 

            </nav>



            