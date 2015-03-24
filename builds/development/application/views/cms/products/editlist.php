<section class="cmspg contentinner">
	<div class="addbutton">
		<a href="<?php echo base_url() . index_page() ?>inventory/add">Add New</a>
	</div>

	<ul class="itemlist">
	<?php foreach($items as $row): ?>
	  <li>
	    <a href="<?php echo base_url() . 'index.php/inventory/edit/' . $row->categories_id; ?>" class="edt">&#xf040;</a>
	    <h3><?php echo $row->categories_name; ?> | <span>Created by <?php echo $row->categories_createdby . ' on ' . $row->categories_createddate; ?></span></h3>
		<a class="del" href="#" data-record="<?php echo $row->categories_id; ?>" data-title="<?php echo $row->categories_name; ?>" data-controller="inventory">&#xf00d;</a>
	  </li>
	<?php endforeach; ?>
	</ul>
</section>