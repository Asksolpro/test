<?php 
        $this->load->view('admin/master/header_2');
        $menuid = $this->uri->segment(4);
		$id_user = $this->uri->segment(5);
    ?>
<meta http-equiv="refresh" content="60">
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			   
				<div class="col-md-12">
					<div class="box box-primary">
                      <div style="width:100%; padding:10px; text-align:center">
						<h1>Welcome To<br /> Administrator Panel </h1><br />
                        <img src="<?php echo base_url();?>assets/images/favicon.png" />
                        <p>
                        
							<h2>PT LEO PUMP INDONESIA</h2> 
                            </p>
                      </div>
					</div>
				</div>
				
		</div>
      </section>
      
    </div>
	<?php $this->load->view('admin/master/footer_2'); ?>