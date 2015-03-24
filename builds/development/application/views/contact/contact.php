<section class="pgcontent">
	<section class="loginpg contentinner">
		<div class="logopanel">
			<a href="<?php echo base_url() . index_page() ?>"><img class="mainlogo" src="<?php echo base_url() ?>/images/forratslogo.svg" onerror="this.onerror=null; this.src='<?php echo base_url() ?>/images/forratslogo.png'"></a>
		</div>
		<div id="loginbox">
			<p>
				<?php echo validation_errors();?>
			</p>
		<?php echo form_open('contact');?>
		<div class="loginset">
			<label for="name">Name</label>
			<input type="text" name="name" size="50" placeholder="Enter your name." value="<?php echo set_value('name'); ?>" required>
		</div>
		<div class="loginset">
		<label for="email" class="formLabel pad15">Email</label>
		<input type="text" name="email" placeholder="Enter your email." value="<?php echo set_value('email'); ?>"  required>
		</div>
		<div class="loginset">
		<label for="message" class="formLabel pad15">Message</label>
		<textarea name="message" cols="50" rows="8" style="resize:none;"><?php echo set_value('message'); ?></textarea>
		</div>
		<div class="loginset">
		<input type="submit" value"Submit" class="formSubmit"/>
		</div>
		</div>
	</section>
</section>