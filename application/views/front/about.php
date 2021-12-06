<?php

	$this->load->view('front/master/header');
	
	$function=$this->uri->segment(3);
	
	if($function=='')
	{
		$data_about=$this->master_model->select_in('about','*',"WHERE ID=1");
	}else
	{
		$data_about=$this->master_model->select_in('about','*',"WHERE ID=$function");
	}
	

?>

            <!--Business Section-->

          <section id="brand" class="brand fix m-top-50 "><!--footTop-->

                <div class="container">

                  <section id="home" class="home-2">

         		   </section>

                    <div class="row">

                        <div class="main_business">

                          <p>&nbsp;</p>

                            <div class="col-md-3">

                                <div class="left-menu">

                                    <div class="tip text-center">
                                          	<?php
                                                echo $data_about[0]->name;
                                            ?>	
                                    </div>

                                    <ul>
                                    	<?php
											for($a=0; $a < count($data_about_category); $a++)
											{
												echo'
													<li>
														<a href="'.base_url().'about/index/'.$data_about_category[$a]->ID.'/'.str_replace(' ','-',strtolower($data_about_category[$a]->name)).'">
															'.$data_about_category[$a]->name.'
														</a>
													</li>
												';
											}
										?>
                                    </ul>

                                </div>

                            </div>
                            

                            <div class="col-md-9">

                                <div class="business_item sm-m-top-50">

									<h2 class="text-uppercase">
                                    	<strong>
											<?php
                                                echo $data_about[0]->name;
                                            ?>
                                    	</strong>
                                    </h2>


                                    <p class="m-top-20">

                                    	<?php echo $data_about[0]->note;?>

                                    </p>



                                    <P>&nbsp;</P>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section><!-- End off Business section -->





            



	<?php

		$this->load->view('front/master/footer');

	?>



  <style>

	  	.is-hidden

		{

			display: none;

		}



		



		#container

		{

			width: 41.25em; /* 660 */

			text-align: center;

			padding: 0 1.25em; /* 20 */

			margin: 3.125em auto 6.25em; /* 50 100 */

		}

			#container h1

			{

				font-size: 2.125em; /* 34 */

				line-height: 0.882em; /* 30 (34) */

				text-transform: uppercase;

			}

				#container h1 span

				{

					font-size: 0.588em; /* 20 (34) */

					line-height: 1em; /* 20 (20) */

					color: #aaa;

					display: block;

				}

				#container h1 a:hover span,

				#container h1 a:focus span { color: #333; }



			#container h2

			{

				border-top: 1px solid #ddd;

				padding-top: 1.875em; /* 30 */

				margin-top: 1.875em; /* 30 */

				margin-bottom: 0.625em; /* 10 */

			}

				#container h2 span

				{

					color: #666;

				}

				#container h2[data-caption]:before

				{

					font-size: 0.875rem;

					font-weight: 300;

					color: #fff;

					background-color: #c00;

					display: inline-block;

					content: attr( data-caption );

					padding: 0.125rem 0.313rem; /* 2 5 */

					margin-right: 0.625rem; /* 10 */



					-webkit-transform: rotate( -8deg );

					-ms-transform: rotate( -8deg );

					transform: rotate( -8deg );

				}



			#container ul

			{

			}

				#container li

				{

					display: inline-block;

					margin: 0.625em; /* 10 */

				}

					#container img

					{

						width: 8.75em; /* 140 */

						height: 8.75em; /* 140 */

						border-color: #eee;

						border: 0.625em solid rgba( 255, 255, 255, .5 ); /* 10 */



						-webkit-box-shadow: 0 0 0.313em rgba( 0, 0, 0, .05 ); /* 5 */

						box-shadow: 0 0 0.313em rgba( 0, 0, 0, .05 ); /* 5 */



						-webkit-transition: -webkit-box-shadow .3s ease, border-color .3s ease;

						transition: box-shadow .3s ease, border-color .3s ease;

					}

						#container img:hover,

						#container img:focus

						{

							border-color: #fff;



							-webkit-box-shadow: 0 0 0.938em rgba( 0, 0, 0, .25 ); /* 15 */

							box-shadow: 0 0 0.938em rgba( 0, 0, 0, .25 ); /* 15 */

						}



		

		/* IMAGE LIGHTBOX SELECTOR */



		#imagelightbox

		{

			cursor: pointer;

			position: fixed;

			z-index: 10000;



			-ms-touch-action: none;

			touch-action: none;



			-webkit-box-shadow: 0 0 3.125em rgba( 0, 0, 0, .75 ); /* 50 */

			box-shadow: 0 0 3.125em rgba( 0, 0, 0, .75 ); /* 50 */

		}





		/* ACTIVITY INDICATION */



		#imagelightbox-loading,

		#imagelightbox-loading div

		{

			border-radius: 50%;

		}

		#imagelightbox-loading

		{

			width: 2.5em; /* 40 */

			height: 2.5em; /* 40 */

			background-color: #444;

			background-color: rgba( 0, 0, 0, .5 );

			position: fixed;

			z-index: 10003;

			top: 50%;

			left: 50%;

			padding: 0.625em; /* 10 */

			margin: -1.25em 0 0 -1.25em; /* 20 */



			-webkit-box-shadow: 0 0 2.5em rgba( 0, 0, 0, .75 ); /* 40 */

			box-shadow: 0 0 2.5em rgba( 0, 0, 0, .75 ); /* 40 */

		}

			#imagelightbox-loading div

			{

				width: 1.25em; /* 20 */

				height: 1.25em; /* 20 */

				background-color: #fff;



				-webkit-animation: imagelightbox-loading .5s ease infinite;

				animation: imagelightbox-loading .5s ease infinite;

			}



			@-webkit-keyframes imagelightbox-loading

			{

				from { opacity: .5;	-webkit-transform: scale( .75 ); }

				50%	 { opacity: 1;	-webkit-transform: scale( 1 ); }

				to	 { opacity: .5;	-webkit-transform: scale( .75 ); }

			}

			@keyframes imagelightbox-loading

			{

				from { opacity: .5;	transform: scale( .75 ); }

				50%	 { opacity: 1;	transform: scale( 1 ); }

				to	 { opacity: .5;	transform: scale( .75 ); }

			}





		/* OVERLAY */



		#imagelightbox-overlay

		{

			background-color: #fff;

			background-color: rgba( 255, 255, 255, .9 );

			position: fixed;

			z-index: 9998;

			top: 0;

			right: 0;

			bottom: 0;

			left: 0;

		}





		/* "CLOSE" BUTTON */



		#imagelightbox-close

		{

			width: 2.5em; /* 40 */

			height: 2.5em; /* 40 */

			text-align: left;

			background-color: #666;

			border-radius: 50%;

			position: fixed;

			z-index: 10002;

			top: 2.5em; /* 40 */

			right: 2.5em; /* 40 */



			-webkit-transition: color .3s ease;

			transition: color .3s ease;

		}

		#imagelightbox-close:hover,

		#imagelightbox-close:focus { background-color: #111; }



			#imagelightbox-close:before,

			#imagelightbox-close:after

			{

				width: 2px;

				background-color: #fff;

				content: '';

				position: absolute;

				top: 20%;

				bottom: 20%;

				left: 50%;

				margin-left: -1px;

			}

			#imagelightbox-close:before

			{

				-webkit-transform: rotate( 45deg );

				-ms-transform: rotate( 45deg );

				transform: rotate( 45deg );

			}

			#imagelightbox-close:after

			{

				-webkit-transform: rotate( -45deg );

				-ms-transform: rotate( -45deg );

				transform: rotate( -45deg );

			}





		/* CAPTION */



		#imagelightbox-caption

		{

			text-align: center;

			color: #fff;

			background-color: #666;

			position: fixed;

			z-index: 10001;

			left: 0;

			right: 0;

			bottom: 0;

			padding: 0.625em; /* 10 */

		}





		/* NAVIGATION */



		#imagelightbox-nav

		{

			background-color: #444;

			background-color: rgba( 0, 0, 0, .5 );

			border-radius: 20px;

			position: fixed;

			z-index: 10001;

			left: 50%;

			bottom: 3.75em; /* 60 */

			padding: 0.313em; /* 5 */



			-webkit-transform: translateX( -50% );

			-ms-transform: translateX( -50% );

			transform: translateX( -50% );

		}

			#imagelightbox-nav button

			{

				width: 1em; /* 20 */

				height: 1em; /* 20 */

				background-color: transparent;

				border: 1px solid #fff;

				border-radius: 50%;

				display: inline-block;

				margin: 0 0.313em; /* 5 */

			}

			#imagelightbox-nav button.active

			{

				background-color: #fff;

			}





		/* ARROWS */



		.imagelightbox-arrow

		{

			width: 3.75em; /* 60 */

			height: 7.5em; /* 120 */

			background-color: #444;

			background-color: rgba( 0, 0, 0, .5 );

			vertical-align: middle;

			display: none;

			position: fixed;

			z-index: 10001;

			top: 50%;

			margin-top: -3.75em; /* 60 */

		}

		.imagelightbox-arrow:hover,

		.imagelightbox-arrow:focus	{ background-color: rgba( 0, 0, 0, .75 ); }

		.imagelightbox-arrow:active { background-color: #111; }



			.imagelightbox-arrow-left	{ left: 2.5em; /* 40 */ }

			.imagelightbox-arrow-right	{ right: 2.5em; /* 40 */ }



			.imagelightbox-arrow:before

			{

				width: 0;

				height: 0;

				border: 1em solid transparent;

				content: '';

				display: inline-block;

				margin-bottom: -0.125em; /* 2 */

			}

				.imagelightbox-arrow-left:before

				{

					border-left: none;

					border-right-color: #fff;

					margin-left: -0.313em; /* 5 */

				}

				.imagelightbox-arrow-right:before

				{

					border-right: none;

					border-left-color: #fff;

					margin-right: -0.313em; /* 5 */

				}



		#imagelightbox-loading,

		#imagelightbox-overlay,

		#imagelightbox-close,

		#imagelightbox-caption,

		#imagelightbox-nav,

		.imagelightbox-arrow

		{

			-webkit-animation: fade-in .25s linear;

			animation: fade-in .25s linear;

		}

			@-webkit-keyframes fade-in

			{

				from	{ opacity: 0; }

				to		{ opacity: 1; }

			}

			@keyframes fade-in

			{

				from	{ opacity: 0; }

				to		{ opacity: 1; }

			}



		@media only screen and (max-width: 41.250em) /* 660 */

		{

			#container

			{

				width: 100%;

			}

			#imagelightbox-close

			{

				top: 1.25em; /* 20 */

				right: 1.25em; /* 20 */

			}

			#imagelightbox-nav

			{

				bottom: 1.25em; /* 20 */

			}



			.imagelightbox-arrow

			{

				width: 2.5em; /* 40 */

				height: 3.75em; /* 60 */

				margin-top: -2.75em; /* 30 */

			}

			.imagelightbox-arrow-left	{ left: 1.25em; /* 20 */ }

			.imagelightbox-arrow-right	{ right: 1.25em; /* 20 */ }

		}



		@media only screen and (max-width: 20em) /* 320 */

		{

			.imagelightbox-arrow-left	{ left: 0; }

			.imagelightbox-arrow-right	{ right: 0; }

		}

	  </style>

      

      <!--<a href="<?php echo base_url();?>uploads/files/589993f10ae6f.jpg" data-imagelightbox="f">

      	<img src="<?php echo base_url();?>uploads/files/589993f10ae6f.jpg" alt="Snail" />

      </a>-->

        

       <!-- <div class="social-float-parent">

            <div id="social-float">

                float...

            </div>

        </div>-->

        

        

        

		

	

        

        

        

        <script src="https://osvaldas.info/examples/image-lightbox-responsive-touch-friendly/imagelightbox.min.js"></script>

		<script>

            $( function()

            {

                var

                    // ACTIVITY INDICATOR

        

                    activityIndicatorOn = function()

                    {

                        $( '<div id="imagelightbox-loading"><div></div></div>' ).appendTo( 'body' );

                    },

                    activityIndicatorOff = function()

                    {

                        $( '#imagelightbox-loading' ).remove();

                    },

        

        

                    // OVERLAY

        

                    overlayOn = function()

                    {

                        $( '<div id="imagelightbox-overlay"></div>' ).appendTo( 'body' );

                    },

                    overlayOff = function()

                    {

                        $( '#imagelightbox-overlay' ).remove();

                    },

        

        

                    // CLOSE BUTTON

        

                    closeButtonOn = function( instance )

                    {

                        $( '<button type="button" id="imagelightbox-close" title="Close"></button>' ).appendTo( 'body' ).on( 'click touchend', function(){ $( this ).remove(); instance.quitImageLightbox(); return false; });

                    },

                    closeButtonOff = function()

                    {

                        $( '#imagelightbox-close' ).remove();

                    },

        

        

                    // CAPTION

        

                    captionOn = function()

                    {

                        var description = $( 'a[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"] img' ).attr( 'alt' );

                        if( description.length > 0 )

                            $( '<div id="imagelightbox-caption">' + description + '</div>' ).appendTo( 'body' );

                    },

                    captionOff = function()

                    {

                        $( '#imagelightbox-caption' ).remove();

                    },

        

        

                    // NAVIGATION

        

                    navigationOn = function( instance, selector )

                    {

                        var images = $( selector );

                        if( images.length )

                        {

                            var nav = $( '<div id="imagelightbox-nav"></div>' );

                            for( var i = 0; i < images.length; i++ )

                                nav.append( '<button type="button"></button>' );

        

                            nav.appendTo( 'body' );

                            nav.on( 'click touchend', function(){ return false; });

        

                            var navItems = nav.find( 'button' );

                            navItems.on( 'click touchend', function()

                            {

                                var $this = $( this );

                                if( images.eq( $this.index() ).attr( 'href' ) != $( '#imagelightbox' ).attr( 'src' ) )

                                    instance.switchImageLightbox( $this.index() );

        

                                navItems.removeClass( 'active' );

                                navItems.eq( $this.index() ).addClass( 'active' );

        

                                return false;

                            })

                            .on( 'touchend', function(){ return false; });

                        }

                    },

                    navigationUpdate = function( selector )

                    {

                        var items = $( '#imagelightbox-nav button' );

                        items.removeClass( 'active' );

                        items.eq( $( selector ).filter( '[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"]' ).index( selector ) ).addClass( 'active' );

                    },

                    navigationOff = function()

                    {

                        $( '#imagelightbox-nav' ).remove();

                    },

        

        

                    // ARROWS

        

                    arrowsOn = function( instance, selector )

                    {

                        var $arrows = $( '<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left"></button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right"></button>' );

        

                        $arrows.appendTo( 'body' );

        

                        $arrows.on( 'click touchend', function( e )

                        {

                            e.preventDefault();

        

                            var $this	= $( this ),

                                $target	= $( selector + '[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"]' ),

                                index	= $target.index( selector );

        

                            if( $this.hasClass( 'imagelightbox-arrow-left' ) )

                            {

                                index = index - 1;

                                if( !$( selector ).eq( index ).length )

                                    index = $( selector ).length;

                            }

                            else

                            {

                                index = index + 1;

                                if( !$( selector ).eq( index ).length )

                                    index = 0;

                            }

        

                            instance.switchImageLightbox( index );

                            return false;

                        });

                    },

                    arrowsOff = function()

                    {

                        $( '.imagelightbox-arrow' ).remove();

                    };

        

        

                //	WITH ACTIVITY INDICATION

        

                $( 'a[data-imagelightbox="a"]' ).imageLightbox(

                {

                    onLoadStart:	function() { activityIndicatorOn(); },

                    onLoadEnd:		function() { activityIndicatorOff(); },

                    onEnd:	 		function() { activityIndicatorOff(); }

                });

        

        

                //	WITH OVERLAY & ACTIVITY INDICATION

        

                $( 'a[data-imagelightbox="b"]' ).imageLightbox(

                {

                    onStart: 	 function() { overlayOn(); },

                    onEnd:	 	 function() { overlayOff(); activityIndicatorOff(); },

                    onLoadStart: function() { activityIndicatorOn(); },

                    onLoadEnd:	 function() { activityIndicatorOff(); }

                });

        

        

                //	WITH "CLOSE" BUTTON & ACTIVITY INDICATION

        

                var instanceC = $( 'a[data-imagelightbox="c"]' ).imageLightbox(

                    {

                        quitOnDocClick:	false,

                        onStart:		function() { closeButtonOn( instanceC ); },

                        onEnd:			function() { closeButtonOff(); activityIndicatorOff(); },

                        onLoadStart: 	function() { activityIndicatorOn(); },

                        onLoadEnd:	 	function() { activityIndicatorOff(); }

                    });

        

        

                //	WITH CAPTION & ACTIVITY INDICATION

        

                $( 'a[data-imagelightbox="d"]' ).imageLightbox(

                {

                    onLoadStart: function() { captionOff(); activityIndicatorOn(); },

                    onLoadEnd:	 function() { captionOn(); activityIndicatorOff(); },

                    onEnd:		 function() { captionOff(); activityIndicatorOff(); }

                });

        

        

                //	WITH ARROWS & ACTIVITY INDICATION

        

                var selectorG = 'a[data-imagelightbox="g"]';

                var instanceG = $( selectorG ).imageLightbox(

                    {

                        onStart:		function(){ arrowsOn( instanceG, selectorG ); },

                        onEnd:			function(){ arrowsOff(); activityIndicatorOff(); },

                        onLoadStart: 	function(){ activityIndicatorOn(); },

                        onLoadEnd:	 	function(){ $( '.imagelightbox-arrow' ).css( 'display', 'block' ); activityIndicatorOff(); }

                    });

        

        

                //	WITH NAVIGATION & ACTIVITY INDICATION

        

                var selectorE = 'a[data-imagelightbox="e"]';

                var instanceE = $( selectorE ).imageLightbox(

                    {

                        onStart:	 function() { navigationOn( instanceE, selectorE ); },

                        onEnd:		 function() { navigationOff(); activityIndicatorOff(); },

                        onLoadStart: function() { activityIndicatorOn(); },

                        onLoadEnd:	 function() { navigationUpdate( selectorE ); activityIndicatorOff(); }

                    });

        

        

                //	ALL COMBINED

        

                var selectorF = 'a[data-imagelightbox="f"]';

                var instanceF = $( selectorF ).imageLightbox(

                    {

                        onStart:		function() { overlayOn(); closeButtonOn( instanceF ); arrowsOn( instanceF, selectorF ); },

                        onEnd:			function() { overlayOff(); captionOff(); closeButtonOff(); arrowsOff(); activityIndicatorOff(); },

                        onLoadStart: 	function() { captionOff(); activityIndicatorOn(); },

                        onLoadEnd:	 	function() { captionOn(); activityIndicatorOff(); $( '.imagelightbox-arrow' ).css( 'display', 'block' ); }

                    });

        

        

                //	DYNAMICALLY ADDED ITEMS

        

                var instanceH = $( 'a[data-imagelightbox="h"]' ).imageLightbox(

                    {

                        quitOnDocClick:	false,

                        onStart:		function() { closeButtonOn( instanceH ); },

                        onEnd:			function() { closeButtonOff(); activityIndicatorOff(); },

                        onLoadStart: 	function() { activityIndicatorOn(); },

                        onLoadEnd:	 	function() { activityIndicatorOff(); }

                    });

        

                $( '.js--add-dynamic ' ).on( 'click', function( e )

                {

                    e.preventDefault();

                    var items = $( '.js--dynamic-items' );

                    instanceH.addToImageLightbox( items.find( 'a' ) );

                    $( '.js--dynamic-place' ).append( items.find( 'li' ).detach() );

                    $( this ).remove();

                    items.remove();

                });

        

            });

        

        </script>