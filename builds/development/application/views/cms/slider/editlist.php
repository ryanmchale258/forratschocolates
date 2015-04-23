<section class="cmspg contentinner">
	<div class="addbutton">
		<a href="<?php echo base_url() . index_page() ?>slides/add">Add New</a>
	</div>

	<ul class="itemlist">
	<?php foreach($items as $row): ?>
	  <li>
	    <a href="<?php echo base_url() . 'index.php/slides/edit/' . $row->slide_id; ?>" class="edt">&#xf040;</a>
	    <h3><?php echo $row->slide_title; ?></span></h3>
		<a class="del" href="#" data-record="<?php echo $row->slide_id; ?>" data-title="<?php echo $row->slide_title; ?>" data-controller="slides">&#xf00d;</a>
	  </li>
	<?php endforeach; ?>
	</ul>
</section>