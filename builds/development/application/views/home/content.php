<section class="pgcontent">
	<section class="homepg">
		<div class="contentinner">
			<div class="logopanel">
				<a href="<?php echo base_url() . index_page() ?>"><img class="mainlogo" src="<?php echo base_url() ?>/images/forratslogo.svg" onerror="this.onerror=null; this.src='<?php echo base_url() ?>/images/forratslogo.png'"></a>
			</div>
		</div>
		
		<div class="slideouter">
			<section class="slider">
				<?php foreach($slides as $row): ?>
				<div class="slide" style="background-image: url('<?php echo base_url() ?>images/uploads/slider/<?php echo $row->slide_img; ?>');">
					<div class="text">
						<div class="textinner">
							<h3><?php echo $row->slide_title; ?></h3>
							<p><?php echo $row->slide_text; ?></p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</section>
		</div>


		<section class="homemenu">
			<?php foreach($pages as $row): ?>
			<?php if($row->pages_hascontroller == 0){
					echo '<a href="' . base_url() . index_page() . '/page/' . $row->pages_slug . '" class="menuitem hideme ' . $row->pages_slug . '">';
				}else{
					echo '<a href="' . base_url() . index_page() . '/' . $row->pages_slug . '" class="menuitem hideme ' . $row->pages_slug . '">';
				}
			 ?>
				<span class="icon"><?php echo $row->pages_icon; ?></span>
				<article class="infogroup">
					<h2><?php echo $row->pages_title; ?></h2>
					<p><?php echo $row->pages_brief; ?></p>
				</article>
			</a>
			<?php endforeach; ?>
		</section>
	</section>
</section>