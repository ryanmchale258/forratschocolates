<section class="chocolatepg contentinner">
	<div class="logopanel">
		<a href="<?php echo base_url() . index_page() ?>"><img class="mainlogo" src="<?php echo base_url() ?>/images/forratslogo.svg" onerror="this.onerror=null; this.src='<?php echo base_url() ?>/images/forratslogo.png'"></a>
	</div>
	<!-- <?php foreach($categories as $row): ?>
		<div class="panel">
			<img src="<?php echo base_url() ?>images/uploads/<?php echo $row->categories_img; ?>" alt="<?php $row->categories_name; ?>" >
		</div>
	<?php endforeach; ?> -->

	<?php foreach($categories as $row): ?>
	<a href="#" class="product">
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