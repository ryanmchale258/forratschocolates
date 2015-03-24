<section class="detailspg contentinner">
	<div class="logopanel">
		<a href="<?php echo base_url() . index_page() ?>"><img class="mainlogo" src="<?php echo base_url() ?>/images/forratslogo.svg" onerror="this.onerror=null; this.src='<?php echo base_url() ?>/images/forratslogo.png'"></a>
	</div>

	<div id="detailsoverlay">
	    <div class="overlayinner">
	    	<h1><?php echo $pgdata->categories_name; ?></h1>
			<img src="<?php echo base_url() . 'images/uploads/' . $pgdata->categories_img; ?>" alt="<?php echo $pgdata->categories_name; ?>">
			<p><?php echo $pgdata->categories_longdesc; ?></p>
		</div>
	</div>
	<div class="optionslist">
		<?php foreach($options as $option): ?>
		<div class="prod-option">
			<h3><?php echo $option->products_name; ?></h3>
			<img src="<?php echo base_url() . 'images/uploads/products/' . $pgdata->categories_slug . '/' . $option->products_image; ?>" alt="<?php echo $option->products_name ?>">
			<p><?php echo $option->products_desc; ?></p>
		</div>
		<?php endforeach; ?>
	</div>


	</div>
</section>