<section class="pgcontent">
	<section class="templatepg contentinner">
		<div class="logopanel">
			<a href="<?php echo base_url() . index_page() ?>"><img class="mainlogo" src="<?php echo base_url() ?>/images/forratslogo.svg" onerror="this.onerror=null; this.src='<?php echo base_url() ?>/images/forratslogo.png'"></a>
		</div>
		<div class="usercontent">
			<span class="icon"><?php echo $pgdata->pages_icon; ?></span>
				<div class="textcontent">
					<h1><?php echo $pgdata->pages_title; ?></h1>
					<div>
						<?php echo $pgdata->pages_content; ?>
					</div>
				</div>
		</div>

	</section>
</section>