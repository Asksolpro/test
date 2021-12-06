<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>ADMIN | Dashboard</title>

  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.png">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?php echo base_url();?>appinclude/admin/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>appinclude/admin/plugins/datatables/dataTables.bootstrap.css">

  <link rel="stylesheet" href="<?php echo base_url();?>appinclude/admin/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>appinclude/admin/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>appinclude/admin/plugins/daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="<?php echo base_url();?>appinclude/admin/plugins/datepicker/datepicker3.css">

  <link rel="stylesheet" href="<?php echo base_url();?>appinclude/admin/plugins/iCheck/all.css">

  <link rel="stylesheet" href="<?php echo base_url();?>appinclude/admin/plugins/colorpicker/bootstrap-colorpicker.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>appinclude/admin/plugins/timepicker/bootstrap-timepicker.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>appinclude/admin/plugins/select2/select2.min.css">

  	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

  	<script type="text/javascript" src="<?php echo base_url();?>appinclude/js/autoNumeric.js"></script>

	<script type="text/javascript">

        jQuery(function($) {

            $('.auto').autoNumeric('init');

        });

    </script>

	<script type="text/javascript" src="<?php echo base_url();?>appinclude/js/jquery.table2excel.js"></script>

    <style>

		.pagination

		{

			float:right;

			margin-right:-17px;

			margin-top:-36px;

			z-index:9999;

			position:relative;

		}

		.pagination a

		{

			float: left;

			padding: 6px 12px;

			margin-left: -1px;

			line-height: 1.42857143;

			color: #777777;

			text-decoration: none;

			background-color: #fff;

			border: 1px solid #ddd;

		}

		.pagination a.number{

			text-decoration:none

		}

		.pagination a.current

		{

			background:#337AB7;

			color:#FFF !important;

		}

		.pagination a:hover, div.pagination a:active

		{

			color: #23527c;

			text-decoration:none;

			background:#eee;

		}

	</style>

    <?php

		//print_array($this->session->userdata);

		$id_admin=$this->session->userdata('id_admin');

		$username=$this->session->userdata('username');

		$data_admin=$this->master_model->select_in('user','name, since',"WHERE ID=$id_admin");

		

	

		$namaUser = $this->session->userdata('namaUser');

	?>

</head>

<script type='text/javascript'>

//<![CDATA[

function getCookie(c_name)

{

var i,x,y,ARRcookies=document.cookie.split(";");

for (i=0;i<ARRcookies.length;i++)

{

x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));

y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);

x=x.replace(/^\s+|\s+$/g,"");

if (x==c_name)

{

return unescape(y);

}

}

}

function setCookie(c_name,value,exdays)

{

var exdate=new Date();

exdate.setDate(exdate.getDate() + exdays);

var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());

document.cookie=c_name + "=" + c_value;

}

function checkCookie(PageType)

{

var cssFile=getCookie(PageType);

if (cssFile!=null && cssFile!="")

{

var div = document.getElementById("page-skin-1");

var div2 = document.getElementById(PageType);

div.innerHTML = "";

div2.innerHTML = "";

document.write("<link type='text/css' rel='stylesheet' href='" + cssFile + "' />");

}

}

function writeCookie(homePg,itemPg)

{

setCookie("csshome",homePg,7);

setCookie("cssitem",itemPg,7);

}

//]]>

</script>

<script type='text/javascript'>

//<![CDATA[

checkCookie('cssitem');

//]]>

</script>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->

    <a href="<?php echo base_url();?>admin/home/index/8" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><b>L</b>EO</span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><b>ADMIN</b>LEO</span>

    </a>

    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->

      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

        <span class="sr-only">Toggle navigation</span>

      </a>

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

            	<?php

					$config_global=$this->master_model->select_in('config_global','*',"WHERE ID=1");

				?>

              <img src="<?php echo base_url();?>appinclude/images/logo_willindo_white.png" class="user-image" alt="User Image">

              <span class="hidden-xs"><?php echo $config_global[0]->name;?></span>

            </a>

            <ul class="dropdown-menu">

              <li class="user-header">

                <img src="<?php echo base_url();?>appinclude/images/logo_willindo_white.png" class="img-circle" alt="User Image">

                <p>

                  Hi, <?php echo $namaUser;?>

				

                

                </p>

              </li>

              <!--<li class="user-body">

                <div class="row">

                  <div class="col-xs-4 text-center">

                    <a href="#">Followers</a>

                  </div>

                  <div class="col-xs-4 text-center">

                    <a href="#">Sales</a>

                  </div>

                  <div class="col-xs-4 text-center">

                    <a href="#">Friends</a>

                  </div>

                </div>

              </li>-->

              <li class="user-footer">

                <div class="pull-left">

                  <a href="<?php echo base_url();?>admin/admin_user/my_profile" class="btn btn-info btn-flat">Profile</a>

                </div>

                <div class="pull-right">

                  <a href="<?php echo base_url();?>admin/useradmin/logout" class="btn btn-danger btn-flat">

					  <i class="fa fa-power-off" aria-hidden="true"></i> Sign out</a>

                </div>

              </li>

            </ul>

          </li>

          <li>

            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>

          </li>

        </ul>

      </div>

    </nav>

  </header>

  <!-- Left side column. contains the logo and sidebar -->

  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

      <!-- Sidebar user panel -->

      <div class="user-panel">

        <div class="pull-left image">

          <img src="<?php echo base_url();?>appinclude/images/logo_willindo_white.png" class="img-circle" alt="User Image">

        </div>

        <div class="pull-left info">

          <p><?php echo $namaUser ;?></p>

          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $namaUser ?> Online</a>

        </div>

      </div>

      <!-- search form -->

      <form action="#" method="get" class="sidebar-form">

        <div class="input-group">

          <input type="text" name="q" class="form-control" placeholder="Search...">

              <span class="input-group-btn">

                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>

                </button>

              </span>

        </div>

      </form>

      <ul class="sidebar-menu">

        <li class="header">MAIN NAVIGATION</li>

        <?php 

			$menu = $this->uri->segment(4);

			$menu_member = $this->uri->segment(2);

			/*$sql ="SELECT * FROM menumst where ParentNumber = 0 order by sort ASC";

			$qry = $this->db->query($sql);

			$row = $qry->result();

			$parentMenu = $row;*/

			$data_menu=$this->master_model->select_in('ms_menu','*',"WHERE parent_number=0 ORDER BY sort ASC");

			$idAdmin = $this->session->userdata('id_admin');

			for($a = 0; $a < count($data_menu); $a++)

			 {

				 $menuID_DB = $data_menu[$a]->ID;

				 $Name_parent_menu = $data_menu[$a]->name;

				 $C_Name = $data_menu[$a]->controller;

				 $icon = $data_menu[$a]->icon;

				 $menuChild=$this->master_model->select_in('ms_menu','*',"WHERE parent_number=$menuID_DB ORDER BY sort ASC");

				 //$menuChild = $this->master_model->getMenuChild($menuID_DB);

				 $numMenu = count($menuChild) ;

				 if($numMenu <> 0)

				 {

					 $class = 'class="treeview"';

					 $link ='';

					 $pull='

					 	<span class="pull-right-container">

						  <i class="fa fa-angle-left pull-right"></i>

						</span>

					 ';

				 }else

				 {

					  $class ='';

					  $link ='href="'.base_url().'admin/'.$C_Name.'/index/'.$menuID_DB.'"';

					  $pull='';

				 }

				 echo '

				  <li '.$class.'>

						<a '.$link.'>

							<i class="'.$icon.'"></i> 

							<span>'.$Name_parent_menu.'</span>

							';

							if($menuID_DB==25)

							 {

								 echo'

									<span class="pull-right-container">

										';

											$data_settlement=$this->master_model->select_in('ts_nota','*',"WHERE id_settlement=0");

											$count_nota=count($data_settlement);

											$data_verification=$this->master_model->select_in('ts_settlement','*',"WHERE id_verification=0");

											$count_settlement=count($data_verification);

										echo'

									  <!--<small class="label pull-right bg-yellow">0</small>-->

									  <small class="label pull-right bg-yellow" style="margin-right:30px">'.$count_settlement.'</small>

									  <small class="label pull-right bg-red">'.$count_nota.'</small>

									</span>

								 ';

							 }

							 echo'

							'.$pull.'

						</a>

						';

						if($numMenu == '')

						{

							echo '</li>';

						}else{

							echo'<ul class="treeview-menu">';

								for($b= 0; $b < count($menuChild); $b++)

								{

									 $ChildmenuID_DB = $menuChild[$b]->ID;

									 $NameChildMenu  = $menuChild[$b]->name;

									 $C_Name_Child   = $menuChild[$b]->controller;

									 $menuSubChild=$this->master_model->select_in('ms_menu','*',"WHERE parent_number=$ChildmenuID_DB ORDER BY sort ASC");

									 //$menuSubChild = $this->master_model->getSubMenuChild($ChildmenuID_DB);

									 $numSubMenu = count($menuSubChild) ;

									 if($numSubMenu <> 0){

										 $subClass = 'class="has-sub"';

										 $subLink ='';

									 }else{

										  $subClass ='';

										  $subLink ='href="'.base_url().'admin/'.$C_Name_Child.'/'.$ChildmenuID_DB.'"';

									 }

									$checkMenuAccess   = $this->master_model->checkMenuAccess($ChildmenuID_DB, $idAdmin);

									if($checkMenuAccess == true)

									{

									 echo '

									 <li '.$subClass.'>

										 <a '.$subLink.'>

										 	<i class="fa fa-circle-o"></i> '.$NameChildMenu.'

											';

											if($menuID_DB==28)

											 {

												 echo'

													<span class="pull-right-container">

														';

															$data_settlement=$this->master_model->select_in('ts_nota','*',"WHERE id_settlement=0");

															$count_nota=count($data_settlement);

														echo'

													  <small class="label pull-right bg-red">'.$count_nota.'</small>

													</span>

												 ';

											 }

											 echo'

										 </a>';

										 if($numSubMenu == '')

										 {

											 echo '</li>';

										 }else{

											echo'

											<ul>';

											for($c= 0; $c < count($menuSubChild); $c++)

											{

												 $subMenuID_DB = $menuSubChild[$c]->ID;

												 $NameSubMenu  = $menuSubChild[$c]->name;

												 $C_Name_Sub   = $menuSubChild[$c]->controller;

												 $menuSubSubChild=$this->master_model->select_in('ms_menu','*',"WHERE parent_number=$subMenuID_DB AND menu_level=4 ORDER BY sort ASC");

												 //$menuSubSubChild = $this->master_model->getSubSubMenuChild($subMenuID_DB);

												 $numSubSubMenu = count($menuSubSubChild) ;

												 if($numSubSubMenu <> 0){

													 $subSubClass = 'class="has-sub"';

													 $subSubLink ='';

												 }else

												 {

													  $subSubClass ='';

													  $subSubLink ='href="'.base_url().'admin/'.$C_Name_Sub.'/'.$subMenuID_DB.'"';

												 }

												 echo'

													<li '.$subSubClass.'>

														<a '.$subSubLink.'>'.$NameSubMenu.'</a>';

														 if($numSubSubMenu == '')

														 {

															 echo '</li>';

														 }else{

															echo'<ul>';

														for($d= 0; $d < count($menuSubSubChild); $d++)

														{

															 $subSubMenuID_DB = $menuSubSubChild[$d]->ID;

															 $NameSubSubMenu  = $menuSubSubChild[$d]->name;

															 $C_Name_Sub_sub   = $menuSubSubChild[$d]->controller;

															 echo'

																<li>

																	<a href="'.base_url().'admin/'.$C_Name_Sub_sub.'/'.$subSubMenuID_DB.'">

																		 '.$NameSubSubMenu.'

																	</a>

																 </li> ';

														}

														echo'</ul>

													 </li>';

												}

											}

										echo'</ul>

									 </li>';

										 }

								 }

							}

						echo'</ul>

					</li>';

					}

				}

            ?>

      </ul>

    </section>

    <!-- /.sidebar -->

  </aside>

