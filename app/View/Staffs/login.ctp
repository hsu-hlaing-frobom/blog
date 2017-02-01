<?php echo $this->Flash->render('auth');
	  echo $this->Form->create('Staff');

?>
<fieldset>
	<legend>
		<?php echo("Plz enter ur name & password") ?>
		<?php echo $this->Form->input('name',array('type'=>'text'))?>
		<?php echo $this->Form->input('email',array('type'=>'text')) ?>
		<?php echo $this->Form->end('Loggin') ?>
	</legend>
</fieldset>