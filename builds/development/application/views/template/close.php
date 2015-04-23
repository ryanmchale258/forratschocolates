		<?php if(isset($initialize)): ?>
		<script>
		<?php
			if(is_array($initialize)){
				for($i = 0 ; $i < count($initialize) ; $i++){
					echo 'var ' . $initialize[$i] . ';';
				}
			}else{
				echo 'var ' . $initialize . ';';
			}

		 ?>
		</script>
		<?php endif; ?>

		<script src="<?php echo base_url() ?>js/script.js"></script>
		
		<?php if(isset($initialize)): ?>
		<script>
		<?php
			if(is_array($initialize)){
				for($i = 0 ; $i < count($initialize) ; $i++){
					echo $initialize[$i] . '();';
				}
			}else{
				echo $initialize . '();';
			}

		 ?>
		</script>
		<?php endif; ?>
	</body>
</html>