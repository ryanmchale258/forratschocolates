		<?php if(isset($initialize)): ?>
		<script>
			var <?php echo $initialize; ?>;
		</script>
		<?php endif; ?>
		<script src="<?php echo base_url() ?>js/script.js"></script>
		<script>
			<?php if(isset($initialize)){ echo $initialize; } ?>();
		</script>
	</body>
</html>