<html>
   <head><title>Editing Comment</title></head>
   <body>
        <b><?php echo ($post['Post']['title']); ?></b>                  
         <p><?php echo h($post['Post']['article']); ?></p>
          <p><small> <?php echo $post['Post']['created_date']; ?></small></p>
           <p><?php echo $this->Html->image('./posts/'. $post['Post']['imagePath']);//echo </td>h($post['Post']['imagePath']); ?></p>

          	<?php foreach ($post['Comment'] as $comment): ?>
			<div class="comment" style="margin-left:50px;">
			<b><?php echo h($comment['name'])?> :
       		<?php echo h($comment['body'])?></b> 
  
   			</div>
			<?php endforeach; ?>

<?php
    echo $this->Form->create('Comment',array('url'=>array('controller'=>'Posts','action'=>'view',$post['Post']['id'])));
   /* echo $this->Form->input('Comment.name',array('style'=>'width:200px; height:15px;'));*/
    echo $this->Form->input('Comment.body',array('style'=>'width:400px; height:50px;'));
?>
<?php echo $this->Form->end('Submit');?>


   </body>
</html>