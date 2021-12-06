<?php 
        $this->load->view('admin/master/header_2');
        $MENU_ID = $this->uri->segment(4);
    ?>
<div class="content-wrapper">
        <section class="content-header">
            <h1>
              Usergroup
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Usergroup</li>
            </ol>
        </section>
		<section class="content">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Usergroup</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
      <p>
                      <a href="<?php echo base_url();?>admin/group/insert_usergroup/<?php echo $MENU_ID;?>" class="btn btn-info pull-right" >
                        <i class="fa fa-plus"></i> Tambah User Group
                      </a><br /><br />
                         <table class="table table-bordered table-striped">
                             <tr>
                                 <th style="text-align:center">No</th>
                                 <th>User Group Name</th>
                                 <th style="text-align:center">Action</th>       
                            </tr>
                            <?php
                                 for($a=0 ; $a<count($userGroup) ; $a++)
                                { 
                                     $group_name = $userGroup[$a]->name;
                                     $id_group = $userGroup[$a]->ID;
                                    echo'
                                        <tr>
                                            <td style="text-align:center">'.($a+1).'</td>
                                            <td align=left>'.$group_name.'</td>
                                            <td style="text-align:center">
                                                <a href="'.base_url().'admin/group/edit/'.$MENU_ID.'/'.$id_group.'" class="btn btn-success">
                                                        <i class="fa fa-pencil"></i> Ubah
                                                </a>
                                            </td>
                                      </tr>';
                                } 
                            ?>
                            </table> 
			</div>
	</section>
</div>
	<?php $this->load->view('admin/master/footer_2'); ?>