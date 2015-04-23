<section class="cmspg contentinner pageform">
		<?php echo $formstart; ?>
		<div class="formset">
			<label>Slide Title *</label>
			<div>
				<?php if(form_error('title')){ echo '<span class="formerror">' . form_error('title') . '</span>'; } ?>
				<?php echo $title; ?>
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
			<label>Slide Text *</label>
			<div>
				<?php if(form_error('text')){ echo '<span class="formerror">' . form_error('text') . '</span>'; } ?>
				<?php echo $text; ?>
			</div>
		</div>
		
		<div class="formset">
			<input type="submit" class="formsubmit" name="submit" value="Submit">
		</div>

		<?php if(isset($id)){ echo $id; } ?>
	</form>
</section>