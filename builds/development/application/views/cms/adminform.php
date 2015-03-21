<div id="addpage" class="bodycontent">
	<h1><?php echo $header; ?></h1>
	
<?php echo $formstart; ?>
	<div class="row">
		<label>First Name</label>
		<span class="formerror"><?php echo form_error('fname'); ?></span>
		<?php echo $fname; ?>
		
		<label>Last Name</label>
		<?php echo $lname; ?>

		<label>Username</label>
		<span class="formerror"><?php echo form_error('username'); ?></span>
		<?php echo $username; ?>
		
		<label>Email</label>
		<span class="formerror"><?php echo form_error('email'); ?></span>
		<?php echo $email; ?>
		
		<label>Confirm Email</label>
		<span class="formerror"><?php echo form_error('emailconf'); ?></span>
		<?php echo $emailconf; ?>
		
		<input type="submit" class="formsubmit" name="submit" value="Submit">
	</div>

	<?php if(isset($id)){ echo $id; } ?>
</form>