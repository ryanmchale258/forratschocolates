<section class="cmspg contentinner pageform">
		<?php echo $formstart; ?>
		<div class="formset">
			<label>Location Name *</label>
			<div>
				<?php if(form_error('locationname')){ echo '<span class="formerror">' . form_error('locationname') . '</span>'; } ?>
				<?php echo $locationname; ?>
			</div>
		</div>

		<div class="formset">
			<label>Telephone *</label>
			<div>
				<?php if(form_error('telephone')){ echo '<span class="formerror">' . form_error('telephone') . '</span>'; } ?>
				<?php echo $telephone; ?>
			</div>
		</div>

		<div class="formset">
			<label>Street Address *</label>
			<div>
				<?php if(form_error('streetaddress')){ echo '<span class="formerror">' . form_error('streetaddress') . '</span>'; } ?>
				<?php echo $streetaddress; ?>
			</div>
		</div>

		<div class="formset">
			<label>City *</label>
			<div>
				<?php if(form_error('city')){ echo '<span class="formerror">' . form_error('city') . '</span>'; } ?>
				<?php echo $city; ?>
			</div>
		</div>

		<div class="formset">
			<label>Province *</label>
			<div>
				<?php if(form_error('prov')){ echo '<span class="formerror">' . form_error('prov') . '</span>'; } ?>
				<?php echo $prov; ?>
			</div>
		</div>

		<div class="formset">
			<label>Postal Code *</label>
			<div>
				<?php if(form_error('postal')){ echo '<span class="formerror">' . form_error('postal') . '</span>'; } ?>
				<?php echo $postal; ?>
			</div>
		</div>

		<div class="formset">
			<label>Latitude</label>
			<div>
				<?php echo $lat; ?>
			</div>
		</div>
		<div class="formset">
			<label>Longitude</label>
			<div>
				<?php echo $long; ?>
			</div>
		</div>
		
		
		<div class="formset">
			<a class="calc" href="#">Calculate</a>
			<input type="submit" class="formsubmit" name="submit" value="Submit">
		</div>

		<?php if(isset($id)){ echo $id; } ?>
	</form>
</section>