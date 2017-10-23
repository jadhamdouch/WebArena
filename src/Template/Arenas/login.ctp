<?php

$this->assign('title', 'Login');?>

<?php echo $this->Form->create('User'); ?>
<legend><?php echo ('Please enter your mail and password'); ?></legend>
<?php
echo $this->Form->hidden('con', ['value' => 'login']);
echo $this->Form->input('email', ['type' => 'email']);
echo $this->Form->input('password', ['type' => 'password']);
echo $this->Form->submit('Login');
echo $this->Form->end();
?>

<?php echo $this->Form->create('UserCreation'); ?>
<legend><?php echo ('Please complete the following form'); ?></legend>
<?php
echo $this->Form->hidden('con', ['value' => 'register']);
echo $this->Form->input('your email', ['type' => 'email']);
echo $this->Form->input('your new password', ['type' => 'password']);
echo $this->Form->input('confirm your password', ['type' => 'password']);
echo $this->Form->submit('Creer');
echo $this->Form->end();
?>




