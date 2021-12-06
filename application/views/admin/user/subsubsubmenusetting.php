	
    <script type="text/javascript" src="<?php echo base_url();?>appinclude/js/jquery.reveal.js"></script>

	<?php 
        $this->load->view('misc/jquery');
        $this->load->view('admin/master/header');
        $this->load->view('admin/master/menu');
        $fromPge = $this->uri->segment(3);
        $MENU_ID = $this->uri->segment(4); 
		$ParentNumber = $this->uri->segment(5); 
		$id_menu = $this->uri->segment(6); 
		$id_sub_menu = $this->uri->segment(7); 
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
					url: "<?php echo base_url().'admin/useradmin/edit_subsubmenu/17';?>",
					data: "MenuID=" + id,    
					success: function(data){
						$("#editMenu").html(data);
					}
				});	
			});
		});
    </script>

            

			

            <div class="content">
            	<?php 
					$this->load->view('admin/master/breadcrumb');
				?>
                
            	<?php
					$funcEditCategory = $this ->uri->segment(3);
		
					$idcat = '';
					$value ='placeholder="Nama Sub Menu"';
					$value2 ='placeholder="Nama C Sub Menu"';
					$action = 'insertsubsubsub';
					$title ='Add New Menu';
		
					if($funcEditCategory == 'edit_category')
					{
						$value = 'value="'.$DataEdit [0]['Name'].'"';
						$idcat = $DataEdit [0]['categoryID'];
						$title = 'EDIT CATEGORY';
						$action = 'proses_editcat';
					}
				 ?>

				<div class="content-padding">
                	<div id="addkategori" style="display:none">
                     <form action="<?php echo site_url(); ?>admin/useradmin/<?php echo $action; ?>/<?php echo $MENU_ID;?>/<?php echo $ParentNumber;?>/<?php echo $id_menu;?>/<?php echo $id_sub_menu;?>" class="contact" Name='img_form' id="img_form" method='post'>
                        <div class="action-top">
                            <div class="left">
                                <?php echo $title; ?>
                            </div>
                            <div class="right">
                                <a class="submit-green">
                                    <i class="fa fa-times"></i> Cancel
                                </a>
            
                                <button type="submit" class="submit-pink">
                                    <i class="fa fa-save"></i> Save
                                </button>
                            </div>
                        </div>
            
                        
            
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
                                <select name="MenuType">
                                    <option></option>
                                    <option value="F">Frontend</option>
                                    <option value="B">Backend</option>
                                    <option value="SA">Super Admin</option>
                                </select>
                            </li>
                        </ul>
                    </form>
                </div>       

                <div id="editMenu" style="display:none">
                </div>
	
                	
                            
                                
                                <form action="<?php echo site_url(); ?>admin/admin_menu/update_all" method='post'>  
                                    <div class="action-top">
                                        <div class="left">
                                            Sub Menu Setting
                                        </div>
                                        <div class="right">
                                            <a href="#" class="submit-pink  add" style="padding:6px;">
                                                <i class="fa fa-plus"></i> Add Menu
                                            </a>
                                            <input type="submit" title="Update Sort" value="Update Short" class="submit-blue" style="float:right; margin:7px 0 0 5px;">  
                                        </div>
                                    </div><!--action-top-->
         
                                    <div class="cleaner"></div>  
                                <table id="box-table-a" summary="Employee Pay Sheet">
                                    
                                    <thead>
                                        <th style="text-shadow:none">Menu ID</th>
                                        <th style="text-shadow:none">Menu Name</th>
                                        <th style="text-shadow:none">Type</th>
                                        <th style="text-shadow:none">Sort</th>
                                        <th style="text-shadow:none" colspan="2">Action</th>
                                    </thead>
                                <? for($a=0 ; $a<count($DataView) ; $a++){ 
									$MenuID  = $DataView[$a]['MenuID'];
								?>
                                
                                <tr>
                                    <td align=left>
										<?=$DataView[$a]['MenuID'];?>
                                    </td>
                                    <td align=left>
                                    	<?=$DataView[$a]['MenuName'];?>
                                    </td>
                                    <td align=left>
										<?=$DataView[$a]['MenuType'];?>
                                    </td>
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
                            </td>
                        </tr>
                        </form>


                      </div><!--content-padding-->

        </div><!--content-->  

			<?php 
				$this->load->view('admin/master/footer');
			?>