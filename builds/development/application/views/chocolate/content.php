<section class="chocolatepg pgcontent">
	<section class="constrainpage contentinner">
		<div class="logopanel">
			<a href="<?php echo base_url() . index_page() ?>"><img class="mainlogo" src="<?php echo base_url() ?>/images/forratslogo.svg" onerror="this.onerror=null; this.src='<?php echo base_url() ?>/images/forratslogo.png'"></a>
		</div>
			<div class="heading">
				<h1>Shop</h1>
				<p>Hover over the product categories listed below for more information.</p>
			</div>
			<?php foreach($categories as $row): ?>
			<a href="<?php echo base_url() . index_page() . 'products/' . $row->categories_slug; ?>" class="product">
		        <div class="iteminner" style="background-image: url('<?php echo base_url() ?>images/uploads/<?php echo $row->categories_img; ?>');">
		            <div class="overlay">
		                <div class="tilecontent">
		                <h3><?php echo $row->categories_name; ?></h3>
		                <img src="<?php echo base_url() ?>/images/flourish.png" alt="flourish">
		                <p><?php echo $row->categories_desc; ?></p>
		                </div>
		            </div>
		        </div>
		    </a>
			<?php endforeach; ?>

	</section>
</section>