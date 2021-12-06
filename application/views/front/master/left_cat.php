<?php
	$id_cat_uri = $this->uri->segment(3);
?>
<style>
.active-cat
	{
		background-image: -moz-linear-gradient(left, #1391a7, #79bc54);
		color: #FFF;
	}
</style>
<div class="col-md-3">
		<div class="left-menu" style="height:500px">
			<div class="tip text-center">
				Kategori
			</div>
			<ul>
				<?php
				  for($a=0; $a < count($getCat); $a++)
				  {
					  $catName = $getCat[$a]->name;
					  $id_cat = $getCat[$a]->ID;
					  $titleCat = url_title(strtolower($catName));
					  if($id_cat==$id_cat_uri)
					  {
						   $class='class="active-cat"';
						  $color = 'style="color:#FFF"';
					  }else{
						   $class="";
						   $color = '';
					  }
					  echo '<li>
							<a href="'.base_url().'product/category/'.$id_cat.'/'.$titleCat.'" '.$class.' '.$color.'>
								'.$catName.'
							</a>
						</li>';
				  }
				?>
			</ul>
		</div>
	</div>