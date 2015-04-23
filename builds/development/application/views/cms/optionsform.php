<section class="cmspg contentinner pageform">
		<?php echo $formstart; ?>
		<div class="formset">
			<label>Category Name *</label>
			<div>
				<?php if(form_error('name')){ echo '<span class="formerror">' . form_error('name') . '</span>'; } ?>
				<?php echo $name; ?>
			</div>
		</div>

		<div class="formset">
			<label>Image</label>
			<?php if($imgerror){ echo '<span class="formerror">' . $imgerror . '</span>'; } ?>
			<div class="imguploadcontainer">
        	   <img src="<?php echo $imagesource; ?>" alt="Choose an Image" id="imageButton" type="file" name="image">
            <?php echo $img; ?>
            </div>
		</div>

		<div class="formset">
			<label>Category *</label>
			<div>
				<?php echo $cat; ?>
			</div>
		</div>

		<div class="formset">
			<label>Description *</label>
			<div>
				<?php if(form_error('desc')){ echo '<span class="formerror">' . form_error('desc') . '</span>'; } ?>
				<?php echo $desc; ?>
			</div>
		</div>
		
		
		<div class="formset">
			<input type="submit" class="formsubmit" name="submit" value="Submit">
		</div>

		<?php if(isset($id)){ echo $id; } ?>
	</form>
</section>