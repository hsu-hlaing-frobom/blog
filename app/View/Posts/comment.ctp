<html>
	<head><title>Comment</title></head>
	<body>
	
		<?php
		echo $this->Form->create('Post');
		
		echo $this->Form->input('comment', array('rows' => '3'));
		echo $this->Form->end('Save Comment');
		
   
?>
 
   
	</body>
</html>