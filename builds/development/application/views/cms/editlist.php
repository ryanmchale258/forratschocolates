<div id="editlist" class="bodycontent">
	<section class="row">
		<ul class="accordion" data-accordion>
		<?php foreach($items as $row): ?>
		  <li class="accordion-navigation">
		    <a href="#panel<?php echo $row ->pages_id; ?>"><h3><?php echo $row->pages_title; ?></h3></a>
		    <div id="panel<?php echo $row ->pages_id; ?>" class="content">
		    <div class="controls">
		    	<a href="<?php echo base_url() . 'index.php/pages/edit/' . $row->pages_id; ?>" class="edt">Edit</a>
				<a class="del" href="#" data-record="<?php echo $row->pages_id; ?>" data-title="<?php echo $row->pages_title; ?>" data-controller="pages">Delete</a>
		    </div>
		      <?php echo $row->pages_content; ?>
		    </div>
		  </li>
		<?php endforeach; ?>
		</ul>
	</section>