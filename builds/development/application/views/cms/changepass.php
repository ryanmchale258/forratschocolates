<div id="login" class="bodycontent">

	<div id="loginbox">
		<h2>Please take a moment to enter a new password.</h2>
		<?php echo $formstart; ?>
		<div class="loginset">
			<label>New Password:</label>
			<?php echo $password; ?>
		</div>
		<div class="loginset">
			<label>Confirm Password:</label>
			<?php echo form_error('$passconf'); ?>
			<?php echo $passconf; ?>
		</div>
		<?php echo $id; ?>
		<input type="submit" name="submit" value="Update">
	</div>