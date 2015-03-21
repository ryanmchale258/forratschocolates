<header>
	<section class="row header-inner">
	
	<div id="logocontainer" class="small-10 medium-4 large-4 columns">
		<img id="logo" src="<?php echo base_url(); ?>img/logo.png" alt="Barker Blagrave &amp; Associates Logo">
	</div>

		<div id="navcontainer" class="small-2 medium-8 large-8 columns">
			<div class="cmslinks">
				<p><?php echo $this->session->userdata('name'); ?>'s Admin Panel</p>
				<ul>
					<li><a href="<?php echo base_url() ?>index.php/home">View Site</a></li>
					<li><a href="<?php echo base_url() ?>index.php/login/logout">Log Out</a></li>
			</div>
			<div class="navinner">
				<nav id="desktop-nav" class="top-bar hide-for-small" data-topbar role="navigation">
					<section class="top-bar-section">
						<ul class="left">
							<li class="has-dropdown"><a href="#">Pages</a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url() . index_page() ?>/pages/add">Add</a></li>
									<li><a href="<?php echo base_url() . index_page() ?>/pages/edit">Edit</a></li>
								</ul>
							</li>
							<li class="has-dropdown"><a href="#">Staff</a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url() . index_page() ?>/home">Add</a></li>
									<li><a href="<?php echo base_url() . index_page() ?>/home">Edit</a></li>
								</ul>
							</li>
							<li class="has-dropdown"><a href="#">Admins</a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url() . index_page() ?>/admin/add">Add</a></li>
									<li><a href="<?php echo base_url() . index_page() ?>/admin/edit">Edit</a></li>
								</ul>
							</li>
							<li class="has-dropdown"><a href="#">Testimonials</a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url() . index_page() ?>/home">Add</a></li>
									<li><a href="<?php echo base_url() . index_page() ?>/home">Edit</a></li>
								</ul>
							</li>
							<li class="has-dropdown"><a href="#">Job Postings</a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url() . index_page() ?>/home">Add</a></li>
									<li><a href="<?php echo base_url() . index_page() ?>/home">Edit</a></li>
								</ul>
							</li>
						</ul>
					</section>
				</nav>
				<div class="navinner hide-for-medium-up">
					<div id="navbutton">
						<a id="ocbutton" href="#mobile-nav" role="button" aria-controls="mobile-nav" aria-expanded="false" class="right-off-canvas-toggle menu-icon"><span></span></a>
					</div>
				</div>
			</div>
		</div>

	</section>

</header>

<div class="content-wrap row collapse">
		<main class="off-canvas-wrap" data-offcanvas>
			<div id="content" class="inner-wrap">

	<aside id="mobile-nav" class="right-off-canvas-menu hide-for-large-up">
		<ul class="off-canvas-list">
			<li><a href="<?php echo base_url() ?>index.php/home">Add Page</a></li>
		</ul>
	</aside>