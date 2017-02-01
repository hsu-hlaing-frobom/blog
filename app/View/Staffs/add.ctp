<?php
	echo $this->Form->create('Staff');
?>
	<fieldset>
		<legend>New staff</legend>
		<?php echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->end('Submit');
		?>
	</fieldset>
