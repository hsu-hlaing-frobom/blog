
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username',array('type'=>'text','style'=>'width:200px; height:20px;'));
         echo $this->Form->input('email',array('type'=>'text','style'=>'width:200px; height:20px;'));
         echo $this->Form->input('password',array('type'=>'password','style'=>'width:200px; height:20px;'));
        echo $this->Form->input('confrim password',array('type'=>'text','style'=>'width:200px; height:20px;'));
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

