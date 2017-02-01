<html><head>
<title>Blog</title>
<body>

<p><b>Blog posts</b></p>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); echo "       " ?>
<?php echo $this->Html->link('My Account', array('controller'=>'posts','action' => 'manage')); echo "       " ?>
<?php
echo $this->Html->link('Logout', array('controller'=>'users','action'=>'logout')); ?></p>
<table>
<tr>
<th>Id</th>

<th>Title</th>
<th></th>
<th></th>
<th></th>
</tr>
<!-- Here's where we loop through our $posts array, printing out post info -->
<?php foreach ($posts as $post): ?>
<tr>
<td><?php echo $post['Post']['id']; ?></td>


<td>
<?php
echo $this->Html->link(
$post['Post']['title'],
array('action' => 'view', $post['Post']['id'])
);
?>
</td>

<!-- <td><?php echo $this->Html->link('Add Image', array('action' => 'upload')); ?></td> -->
<!-- <td>
<?php echo $post['Post']['created_date']; ?>
</td> -->
<td>
<?php
echo $this->Form->postLink(
'Delete',
array('action' => 'delete', $post['Post']['id']),
array('confirm' => 'Are you sure?')
);
?></td><td>
<?php
echo $this->Html->link(
'Edit', array('action' => 'edit', $post['Post']['id'])
);
?>
</td>
</tr>
<?php endforeach; ?>
</table>

	</body>
</html>