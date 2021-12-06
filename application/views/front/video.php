<?php

	$this->load->view('front/master/header');

?>

<style>

input[type=text], select, textarea, input[type=email] {

    width: 100%;

    padding:10px;

    border: 1px solid #999;

    border-radius:1px;

    box-sizing: border-box;

    margin-top: 6px;

    margin-bottom: 16px;

    resize: vertical;

}



input[type=submit] {

    background-color: #4CAF50;

    color: white;

    padding: 12px 20px;

    border: none;

    border-radius: 4px;

    cursor: pointer;

}



input[type=submit]:hover {

    background-color: #45a049;

}



.form-contact

{

	width:650px;

	background:#FFF;

	padding:20px;

	 border: 1px solid #CCC;

}



.left

{

	width:45%;

	height:auto;

	padding:10px;

	float:left;

}









@media only screen and (max-width: 580px) {

	.left

	{

		width:100%;

		height:auto;

		padding:10px;

		float:left;

	}



}



.right

{

	width:40%;

	height:auto;

	border:1px solid #CCC;

	padding:20px;

	margin-left:10px;

	float:right;

	border-radius:3px;

}



</style>

           



            <!--Business Section-->

          <section id="brand" class="brand fix m-top-120 "><!--footTop-->

                <div class="container">

                    <div class="row">

                        <div class="main_business">

                            

                            

                            <div class="col-md-6">
                                <div class="business_item roomy-50">
									<P>&nbsp;</P>
									<h2 class="text-uppercase"><strong>Hubungi Kami</strong> </h2>
                                    <p class="m-top-20">
                                        <?php echo $data_contact[0]->desc;?>
                                    </p>
                                 </div>
                            </div>
                            
                            <div class="col-md-6">
                            	<div class="business_item roomy-50">
                                	<P>&nbsp;</P>
                            		<h5>Kirimkan Kritik dan saran anda dengan mengisi form di bawah ini.</h5>
                                    <br />
                                	<form action="<?php echo base_url();?>contact/sendEmail" name="form_contact" method="post">

                                    <label for="fname">Nama</label>

                                    <input type="text" id="nama" name="nama" placeholder="Your name..">

                                

                                    <label for="lname">Email</label>

                                    <input type="email" id="email" name="email" placeholder="email..">

                                    

                                    <label for="lname">Telepon</label>

                                    <input type="text" id="tlp" name="tlp" placeholder="no telepon atau HP..">

                                    

                                    <label for="lname">Subject</label>

                                    <input type="text" id="subject" name="subject" placeholder="subject..">

                                

                                    <label for="subject">Pesan</label>

                                    <textarea id="subject" name="pesan" placeholder="Write something.." style="height:100px"></textarea>

                                

                                    <input type="submit" value="Submit">

                                  </form>
                            	</div>
                            </div>
                            
                            

                        </div>

                    </div>

                </div>

            </section><!-- End off Business section -->





            



	<?php

		$this->load->view('front/master/footer');

	?>