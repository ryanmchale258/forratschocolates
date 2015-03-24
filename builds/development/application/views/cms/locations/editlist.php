<section class="cmspg contentinner">
	<div class="addbutton">
		<a href="<?php echo base_url() . index_page() ?>addlocations/add">Add New</a>
	</div>

	<ul class="itemlist">
	<?php foreach($items as $row): ?>
	  <li>
	    <a href="<?php echo base_url() . 'index.php/addlocations/edit/' . $row->locations_id; ?>" class="edt">&#xf040;</a>
	    <h3><?php echo $row->locations_title; ?></span></h3>
		<a class="del" href="#" data-record="<?php echo $row->locations_id; ?>" data-title="<?php echo $row->locations_title; ?>" data-controller="addlocations">&#xf00d;</a>
	  </li>
	<?php endforeach; ?>
	</ul>
</section>