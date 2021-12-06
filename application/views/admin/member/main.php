

        	<?php 
				$this->load->view('admin/master/header');
				$this->load->view('admin/master/menu');
			?>
            
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>

    		<script type="text/javascript" src="<?php echo base_url();?>appinclude/js/jquery.reveal.js"></script>
            <script>
				$(function() {
					$(".referral").click(function(){
						var id_member = $(this).attr('alt');
						//alert(id);
						//return false;
						
						$.ajax({
								url: "<?php echo base_url().'admin/member/info_referral';?>",
								data: "id_member=" + id_member,                                             
								success: function(msg){
									$(".reveal-modal").html(msg);
								}
							});						  
					});
				});
			</script>
            
            <div class="content">
            
            	<div class="action-top">
                    <div class="left">
                    	Daftar Member
                    </div>
                    <div class="right">
                        <form style="float:right">
                            <span>Nama :</span>
                            <input type="text" />
                            <input type="submit" value="search" class="submit-pink" />
                        </form>
                    </div>
                </div>
                    
                        <table class="table">
                        	<thead>
                            	<tr>
                                	<th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kode Referensi</th>
                                    <th scope="col">Email</th>
                                     <th scope="col">IP Address</th>
                                     <th scope="col">Member</th>
                                    <th scope="col">Aktif</th>
                                    <th scope="col" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
							for($a=0; $a < count($DataMember); $a++){
								$id_member = $DataMember[$a]->id_member;
								
								$getJumlahFollowers=$this->amm->getJumlahFollowers($id_member);
								if($getJumlahFollowers== ''){
									$jumlahFollowers='';
								}else{
									$jumlahFollowers='('.$getJumlahFollowers.')';
								}
											
								$status= $DataMember[$a]->aktif;
								if($status== 0){
									$status= '<div class="text-pink">Tidak</div>';
								}else{
									$status= '<div class="text-blue">Ya</div>';
								}
								
								$flag = $DataMember[$a]->fg_member;
								/*
								if($status == 0){
									$aktif = '<div class="text-pink"><i class="fa fa-minus-circle"></i></div>';
								}else{
									$aktif = '<div class="text-green"><i class="fa fa-check-square-o"></i></div>';
								}
								*/
								
								
							echo'
                            	<tr>
                                	<td>'.($a+1).'</td>
                                    <td>
										<a class="text-blue referral" alt="'.$id_member.'" data-reveal-id="myModal-2" style="cursor:pointer">
											'.$DataMember[$a]->nama.'
										</a>
										
										'.$jumlahFollowers.'
									</td>
									<td>'.$DataMember[$a]->kode_referensi.'</td>
                                    <td>'.$DataMember[$a]->email.'</td>
                                     <td>'.$DataMember[$a]->ip_address.'  </td>
                                     <td>
									 	'.$status.'
									 </td>
				    				<td>	
										';
										  $checked = '<div class="text-pink"><i class="fa fa-minus-circle"></i></div>';
										  if($DataMember[$a]->fg_member == 1)
										  {
											$checked = '<div class="text-green"><i class="fa fa-check-square-o"></i></div>';
										  }
										echo'
										<a href="'.base_url().'admin/member/changeActiveStatus/'.$DataMember[$a]->id_member.'/'.$flag.'">'.$checked.'</a>
										
									</td>
                                    <td>
                                    	<a href="'.base_url().'admin/member/edit_member/'.$DataMember[$a]->id_member.'" class="text-blue">
                                    		<i class="fa fa-edit"></i>
                                        </a>
                                    </td>
									<td>
										<a href="'.base_url().'admin/member/delete_member/'.$id_member.'" onclick="return confirm(\'Apakah anda ingin menghapus data ini?\')" class="text-pink">
											<i class="fa fa-trash-o"></i>
										</a>
									</td>
                                </tr>';
							}?>
                            </tbody>
                        </table>
                        
                        
                    
            </div><!--content-->
            
            <div id="myModal-2" class="reveal-modal">
                    <a class="close-reveal-modal">Close</a>
                </div>
            