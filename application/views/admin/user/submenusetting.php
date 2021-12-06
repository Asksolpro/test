	
    <script type="text/javascript" src="<?php echo base_url();?>appinclude/js/jquery.reveal.js"></script>

	<?php 
        $this->load->view('misc/jquery');
        $this->load->view('admin/master/header');
        $this->load->view('admin/master/menu');
        $fromPge = $this->uri->segment(3);
        $MENU_ID = $this->uri->segment(4); 
		$ParentNumber = $this->uri->segment(5); 
    ?>
            
   <script>
		$(function() {
			$(".add").click(function(){
			   $("#addkategori").toggle(1000);
			});
		});
	</script>

	<script>
		$(function() {
			$(".submit-green").click(function(){
			   $("#addkategori").toggle(1000);
			});
		});
		
		$(function() {
			$(".edit").click(function(){
			   $("#editMenu").slideDown(1000);
			   var id = $(this).attr('alt');
			   $.ajax({
					url: "<?php echo base_url().'admin/useradmin/edit_submenu/'.$MENU_ID.'/'.$ParentNumber;?>",
					data: "MenuID=" + id,    
					success: function(data){
						$("#editMenu").html(data);
					}
				});	
			});
		});
    </script>

            

			

            <div class="content">
            	<div class="content-padding">
					<?php 
                        $this->load->view('admin/master/breadcrumb');
                    ?>
        		</div>
                
                
            	

				<div class="content-padding">
                	
                <div id="editMenu" style="display:none">
                </div>
	
                	
                            
               	<div class="body-content">            
                    <form action="<?php echo site_url(); ?>admin/useradmin/updateSubmenu/<?php echo $MENU_ID.'/'.$ParentNumber;?>" method='post'>  
                        <div class="header">
                        	<div class="content-padding">
                                Sub Menu Setting
                                <a class="submit-pink" style="float:right" data-js="open">
                                    <i class="fa fa-plus"></i> Add Menu
                                </a>
                            	<div class="cleaner"></div>
                            </div>
                        </div><!--action-top-->
         Parent number<?php echo $ParentNumber;?>
                        <div class="content-padding">
                                <table id="box-table-a" summary="Employee Pay Sheet">
                                    
                                    <thead>
                                        <th style="text-shadow:none">Menu ID</th>
                                        <th style="text-shadow:none">Menu Name</th>
                                        <th style="text-shadow:none">Type</th>
                                        <th style="text-shadow:none">Sort</th>
                                        <th style="text-shadow:none" colspan="2">Action</th>
                                    </thead>
                                <?php for($a=0 ; $a<count($DataView) ; $a++){ 
									$MenuID  = $DataView[$a]['MenuID'];
									//$PrntNumber  = $DataView[$a]['ParentNumber'];
								?>
                                
                                <tr>
                                    <td align=left><?=$DataView[$a]['MenuID'];?></td>
                                    <td align=left>
                                    		<a href="<?=base_url();?>admin/useradmin/subsubmenusetting/<?=$MENU_ID;?>/<?=$DataView[$a]['ParentNumber'];?>/<?=$DataView[$a]['MenuID'];?>.php" class="text-blue">
                                        		<?=$DataView[$a]['MenuName'];?>
                                            </a>
                                        </td>
                                    <td align=left><?=$DataView[$a]['MenuType'];?></td>
                                     <td width="50" align=center>
                                     <input type="text" size="1" Name="sort[]" id="sort<?=$DataView[$a]['MenuID'];?>" value="<?=$DataView[$a]['sort'];?>">
                                     <input type="hidden" size="1" Name="MenuID[]" id="sort<?=$DataView[$a]['MenuID'];?>" value="<?=$DataView[$a]['MenuID'];?>">
                                     <input name="MENU_ID" type=hidden class=button value="<?= $MENU_ID ;?>">
                                    </td>
                                    <td width="50" align=center>
                                        <a alt="<?=$MenuID;?>" class="edit text-blue" style="cursor:pointer">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td width="50" align=center>
                                        <a href="<?=base_url();?>admin/useradmin/delete_sub/<?=$MENU_ID;?>/<?=$DataView[$a]['ParentNumber'];?>/<?=$DataView[$a]['MenuID'];?>.php" onClick="return confirm('Delete this record?')" class="text-pink">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                <? } ?>
                                </table>
                               </div>  
                            <div class="footer">
                            	<div class="content-padding">
                                	<input type="submit" title="Update Sort" value="Update Short" class="submit-blue" style="float:right;">
                                    <div class="cleaner"></div>  
                                </div>
                            </div>
                        </form>
				</div>

                      </div><!--content-padding-->
		
        	<div class="popup">
                <div class="popup-inside">
                    <div class="content">
                        <div class="popup-content">
                            <div class="header">
                                <div class="content-padding">
                                    Tambah Sub Menu
                                    <button name="close" class="submit-pink" style="float:right">Close popup</button>
                                    <div class="cleaner"></div>
                                </div>
                            </div>
                            <?php
								$funcEditCategory = $this ->uri->segment(3);
					
								$idcat = '';
								$value ='placeholder="Nama Sub Menu"';
								$value2 ='placeholder="Nama C Sub Menu"';
								$action = 'insertsub';
								$title ='Add New Menu';
					
								if($funcEditCategory == 'edit_category')
								{
									$value = 'value="'.$DataEdit [0]['Name'].'"';
									$idcat = $DataEdit [0]['categoryID'];
									$title = 'EDIT CATEGORY';
									$action = 'proses_editcat';
								}
							 ?>
                            <form action="<?php echo site_url(); ?>admin/useradmin/<?php echo $action; ?>/<?php echo $MENU_ID;?>/<?php echo $ParentNumber;?>" class="contact" Name='img_form' id="img_form" method='post'>
                                <div class="popup-body">
                                    <div class="col-md-2">
                                        <div class="content-padding">
                                            <ul style="list-style:none; margin:0 auto; padding:0;">
                                                <li>
                                                    <label>
                                                        Sub Menu Name
                                                    </label>
                                                    <input type="text" name="MenuName" id="MenuName" <?php echo $value; ?> />
                                                </li>
                                                <li>
                                                    <label>
                                                        cSubMenu Name
                                                    </label>
                                                    <input type="text" name="cMenuName" id="cMenuName" ParentNumber <?php echo $value2;?>/>
                                                </li>
                                                <li>
                                                    <label>
                                                        Type
                                                    </label>
                                                    <input name="MENU_ID" type=hidden class=button value="<?= $MENU_ID ;?>">
                                                    <input name="ParentNumber" type=hidden class=button value="<?php echo $ParentNumber;?>">
                                                    <input name="menu_level" type=hidden class=button value="1">
                                                    <select name="MenuType" required>
                                                        <option value="">Pilih Type</option>
                                                        <option value="F">Frontend</option>
                                                        <option value="B">Backend</option>
                                                        <option value="SA">Super Admin</option>
                                                    </select>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                            	</div>
                                <div class="footer">
                                	<div class="content-padding">
                                    	<button type="submit" class="submit-blue" style="float:right">
                                            Save
                                        </button>
                                        <div class="cleaner"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        </div><!--content-->  

			<?php 
				$this->load->view('admin/master/footer');
			?>