<section class="cmspg contentinner">
	<div class="addbutton">
		<a href="<?php echo base_url() . index_page() ?>pages/add">Add New</a>
	</div>

	<ul class="itemlist">
	<?php foreach($items as $row): ?>
	  <li>
	    <a href="<?php echo base_url() . 'index.php/pages/edit/' . $row->pages_id; ?>" class="edt">&#xf040;</a>
	    <h3><?php echo $row->pages_title; ?> | <span>Created by <?php echo $row->pages_createdby . ' on ' . $row->pages_createddate; ?></span></h3>
		<a class="del" href="#" data-record="<?php echo $row->pages_id; ?>" data-title="<?php echo $row->pages_title; ?>" data-controller="pages">&#xf00d;</a>
	  </li>
	<?php endforeach; ?>
	</ul>
</section>