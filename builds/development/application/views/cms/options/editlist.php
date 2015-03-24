<section class="cmspg contentinner">
	<div class="addbutton">
		<a href="<?php echo base_url() . index_page() ?>options/add">Add New</a>
	</div>

	<?php foreach($categories as $category): ?>
	<h2><?php echo $category->categories_name; ?></h2>
	<ul class="itemlist">
		<?php foreach($items as $row): ?>
			<?php if($row->products_category == $category->categories_id): ?>
				  <li>
				    <a href="<?php echo base_url() . 'index.php/options/edit/' . $row->products_id; ?>" class="edt">&#xf040;</a>
				    <h3><?php echo $row->products_name; ?></span></h3>
					<a class="del" href="#" data-record="<?php echo $row->products_id; ?>" data-title="<?php echo $row->products_name; ?>" data-controller="options">&#xf00d;</a>
				  </li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
	<?php endforeach; ?>

</section>