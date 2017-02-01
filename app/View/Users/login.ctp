<?php echo $this->Html->link( "Sign Up",   array('action'=>'add') ); ?>
<div class="users form">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>

    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php echo $this->Form->input('email',array('type'=>'text','style'=>'width:200px; height:20px;'));
        echo $this->Form->input('password',array('type'=>'password','style'=>'width:200px; height:20px;'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>

</div>
