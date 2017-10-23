<?php $this->assign('title', 'Login');?>
<section class="cadreprincipal">
<div class="users form">
<?php echo $this->Form->create('User'); ?>
<legend><?php echo ('Please enter your mail and password'); ?></legend>
<?php
echo $this->Form->input('email', ['type' => 'email']);
echo $this->Form->input('password', ['type' => 'password']);
echo $this->Form->button('Login');
echo $this->Form->end();
?>
</div>
</section>