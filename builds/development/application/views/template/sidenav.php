<section class="sideNav">

        <button id="navIcon" class="menu-toggle lines-button" type="button" role="button"><span class="lines"></span></button>

    <div class="navinner">
        <?php if((isset($sidenavlogo)) && $sidenavlogo == true): ?>
            <div class="logoarea">
                <a href="<?php echo base_url() . index_page() ?>"><img class="mainlogo" src="<?php echo base_url() ?>/images/forratslogo.svg" onerror="this.onerror=null; this.src='<?php echo base_url() ?>/images/forratslogo.png'"></a>
            </div>
        <?php endif; ?>
        <div id="navscroll">
            <ul class="side-nav">
                <!-- <li><a id="home" href="index.html">HOME</a></li> 
                <li><a id="about" href="about.html">ABOUT</a></li> 
                <li><a id="chocolate" href="#">CHOCOLATE</a></li> 
                <li><a id="contact" href="#">CONTACT</a></li>  -->
                <?php echo $sidenav; ?>
            </ul>
        </div>
    </div>
    <div class="social">
        <a href="<?php echo base_url() ?>socialdemo">&#xf082;</a>
        <a href="<?php echo base_url() ?>socialdemo">&#xf081;</a>
        <a href="<?php echo base_url() ?>socialdemo">&#xf167;</a>
    </div>
</section>