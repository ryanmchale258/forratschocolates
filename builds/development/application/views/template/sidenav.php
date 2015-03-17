<section class="sideNav">
    <div id="navIcon">
        <a id="nav-toggle" href="#"><span></span></a>
    </div>
    <div class="navinner">
        <?php if((isset($sidenavlogo)) && $sidenavlogo == true): ?>
            <div class="logoarea">
                logo go here
            </div>
        <?php endif; ?>
        <ul class="side-nav">
            <li><a id="home" href="index.html">HOME</a></li> 
            <li><a id="about" href="about.html">ABOUT</a></li> 
            <li><a id="chocolate" href="#">CHOCOLATE</a></li> 
            <li><a id="contact" href="#">CONTACT</a></li> 
        </ul>
    </div>
</section>