<?php 
	$this->load->view('misc/jquery');
	$this->load->view('admin/master/meta');
?>
<style>
.search{width:50px; height:23px; background:#036; padding:3px 5px 8px 5px; cursor:pointer; text-align:center; border:none; color:#FFF; text-shadow:none}
.search:hover{ background:#03C}
.edit{width:50px; height:12px; background:#09F; padding:5px 5px 10px 5px; text-align:center; color:#FFF; text-shadow:none; cursor:pointer; float:right}
.edit:hover{ background:#03C}
#nama, #usaha, #hp, #tlp, #fax, #email{ width:210px; background:#E3F2FB; border-radius:5px; height:25px;}
#submit{width:60px; height:23px; background:#09F; padding:3px 5px 8px 5px; cursor:pointer; text-align:center; border:none; color:#FFF; text-shadow:none}
#alamat, #notes{ width:210px; background:#E3F2FB; height:120px;  border-radius:5px}
#submit:hover{ background:#036}
.cancel{width:50px; height:18px; float:left; margin-left:10px; background:#F00; padding:3px 5px; line-height:18px; text-align:center; color:#FFF; text-shadow:none; cursor:pointer}
.cancel:hover{ background:#C00}
.back{width:50px; height:12px; background:#F00; padding:5px 5px 10px 5px; margin-right:10px; text-align:center; color:#FFF; text-shadow:none; cursor:pointer; float:right}
.back:hover{ background:#036;}
.mytr{ background:#E6E6E6}
.akses{ color:#09F}
.akses:hover{ color:#333}

</style>

	<link  href="<?php echo base_url() ;?>appinclude/css/master.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url();?>appinclude/js/jquery.reveal.js"></script>
 
        	<?php 
				$this->load->view('admin/master/header');
				$this->load->view('admin/master/menu');
				$fromPge = $this->uri->segment(2);
			?>
            
			
            <div class="content">
            	<div class="content-oadding">
                
                     	<div class="action-top">
                        	<div class="left">
                        		Edit List
                            </div>
                        </div><!--tittle-content-->
                        
                        
                         <?php 
						  $funct   = $this->uri->segment(2);
						  $idUser = $this->uri->segment(3);
						  $usPass = $this->uri->segment(4);
						  
						  ?>
                        
                        
                          <?php
						   $idUser      = $dataMenu[0]->id_user;
						   $getNameUser = $this->mst_mod->masterQuery('*', 'user', "where id =  $idUser", 'order by id ASC');
						 
						  ?>
						  
						   <form action="<?php echo base_url();?>admin/useradmin/editNameUser/<?=$idUser ;?>" method="post" name="edituser">
							    User : <input type="text" name="namauser" value="<?=$getNameUser[0]->username;?>" />
							        <input type="hidden" name="id_user" value="<?=$idUser;?>" />
    								<input type="submit" name="submit" value="SAVE" />
							   </form>
                         <table width="850">
                        	<thead>
                            	<tr height="40">
                                	<th scope="col" width="50" style="text-shadow:none">No.</th>
                                    <th scope="col" width="400" style="text-shadow:none">Menu</th>
                                    <th scope="col" width="200" style="text-shadow:none">Access</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
							for($a=0; $a < count($dataMenu); $a++)
							{
									$id        = $dataMenu[$a]->id;
									$menuid    = $dataMenu[$a]->menuid;
									$id_user   = $dataMenu[$a]->id_user;
									$userlevel = $dataMenu[$a]->userlevel;
									$akses     = $dataMenu[$a]->akses;
									
									if($akses == 0)
									{
										$aktif = '<div class="text-pink"><i class="fa fa-minus-circle"></i></div>';
									}else{
										 $aktif = '<div class="text-green"><i class="fa fa-check-square-o"></i></div>';
									}
										
								echo'
								<tr class="mytr" height="30">
                                	<td width="50" align="center">'.($a+1).'</td>
									<td width="50" align="left">'.$dataMenu[$a]->menuName.'</td>
									<td width="50" align="center">
									<a href="'.base_url().'admin/useradmin/changeAkses/'.$id.'/'.$akses.'/'.$id_user.'">'.$aktif.'</a></td>
                                </tr>';
										
							}
		
							?>
                         
                             </tbody>
                            </table>
                           
                           
                </div><!--bg-content-admin-->
            </div><!--content-->
      
      		<?php 
				$this->load->view('admin/master/footer');
			?>