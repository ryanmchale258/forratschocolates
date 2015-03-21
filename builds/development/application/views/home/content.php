<section class="pgcontent">
	<section class="homepg contentinner">
		<div class="logopanel">
			<a href="<?php echo base_url() . index_page() ?>"><img class="mainlogo" src="<?php echo base_url() ?>/images/forratslogo.svg" onerror="this.onerror=null; this.src='<?php echo base_url() ?>/images/forratslogo.png'"></a>
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
			<!-- <div class="menuitem hideme about">
				<span class="icon">&#xf059;</span>
				<article class="infogroup">
					<h2>About</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</article>
			</div>
			<div class="menuitem hideme chocolate">
				<span class="icon">&#xf042;</span>
				<article class="infogroup">
					<h2>Chocolate</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</article>
			</div>
			<div class="menuitem hideme contact">
				<span class="icon">&#xf003;</span>
				<article class="infogroup">
					<h2>Contact</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</article>
			</div>
			<div class="menuitem hideme new">
				<span class="icon">&#xf0f6;</span>
				<article class="infogroup">
					<h2>NewPage</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</article>
			</div> -->
		</section>
	</section>
</section>