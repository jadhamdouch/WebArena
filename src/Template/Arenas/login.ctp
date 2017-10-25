<?php

$this->assign('title', 'Login');?>

<?php echo $this->Form->create('User'); ?>
<legend><?php echo ('Please enter your mail and password'); ?></legend>
<?php
echo $this->Form->hidden('con', ['value' => 'login']);
echo $this->Form->input('email', ['type' => 'email']);
echo $this->Form->input('password', ['type' => 'password']);
echo $this->Form->submit('Login',['class'=> 'btn btn-primary']);
echo $this->Form->end();
?>

<?php echo $this->Form->create('UserCreation'); ?>
<legend><?php echo ('Please complete the following form'); ?></legend>
<?php
echo $this->Form->hidden('con', ['value' => 'register']);
echo $this->Form->input('SaisirVotreEmail', ['type' => 'email']);
echo $this->Form->input('SaisirVotrePassword', ['type' => 'password']);
echo $this->Form->input('ConfirmerPassword', ['type' => 'password']);
echo $this->Form->submit('Creer',['class'=> 'btn btn-primary']);
echo $this->Form->end();
?>




