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
			<div class="imguploadcontainer">
        	   <img src="<?php echo $imagesource; ?>" alt="Choose an Image" id="imageButton" type="file" name="image">
            <?php echo $img; ?>
            </div>
		</div>

		<div class="formset">
			<label>Category *</label>
			<div>
				<?php if(form_error('cat')){ echo '<span class="formerror">' . form_error('cat') . '</span>'; } ?>
				<?php echo $cat; ?>
			</div>
		</div>

		<div class="formset">
			<label>Long Description *</label>
			<div>
				<?php if(form_error('longdesc')){ echo '<span class="formerror">' . form_error('longdesc') . '</span>'; } ?>
				<?php echo $longdesc; ?>
			</div>
		</div>
		
		
		<div class="formset">
			<input type="submit" class="formsubmit" name="submit" value="Submit">
		</div>

		<?php if(isset($id)){ echo $id; } ?>
	</form>
</section>