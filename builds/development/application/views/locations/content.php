<section class="locationspg contentinner">
	<div class="logopanel">
		<a href="<?php echo base_url() . index_page() ?>"><img class="mainlogo" src="<?php echo base_url() ?>/images/forratslogo.svg" onerror="this.onerror=null; this.src='<?php echo base_url() ?>/images/forratslogo.png'"></a>
	</div>

	<section class="map">
		<!-- <?php foreach($maps as $row): ?>
		<div id="map-canvas<?php echo $row->locations_id ?>" class="loadedmap">
			
		</div>
		<?php endforeach; ?> -->

		<div id="map-canvas" class="loadedmap">
			
		</div>
	</section>
	<div id="locationsoverlay">
	    <div class="overlayinner">
	    	<h1>Locations</h1>
	    	<?php foreach($maps as $row): ?>
	        <div class="store">
	        	<p><?php echo $row->locations_city; ?> - <?php echo $row->locations_title; ?></p>
	        	<p><?php echo $row->locations_streetaddress; ?><br>
	        		<?php echo $row->locations_city; ?>, <?php echo $row->locations_prov; ?><br>
	        		<?php echo $row->locations_postal; ?>
	        	</p>
	        	<p><a href="tel:+<?php echo preg_replace("/[^0-9]/", "", $row->locations_telephone); ?>"><?php echo $row->locations_telephone; ?></a></p>
	        <div class="divider"></div>
	        </div>
	    	<?php endforeach; ?>
	    </div>
	</div>

</section>