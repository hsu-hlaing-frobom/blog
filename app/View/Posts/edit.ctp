<html>
<head><title>Edit</title></head>
<body>
	<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('article', array('rows' => '3'));

echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
</body>
</html>