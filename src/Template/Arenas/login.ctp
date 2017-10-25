<?php

$this->assign('title', 'Login');?>
<div class="row">
<div class="col-xs-6">
<legend><?php echo ('Please enter your mail and password'); ?></legend>
</div>
</div>
<?php echo $this->Form->create('User'); ?>
<div class="row">
<div class="col-xs-3">
<?php
echo $this->Form->hidden('con', ['value' => 'login']);
echo $this->Form->input('email', ['type' => 'email','class'=>'form-control','placeholder'=>'Email']);?>


 <?php
echo $this->Form->input('password', ['type' => 'password','class'=>'form-control','placeholder'=>'Password']);
echo $this->Form->submit('Login',['class'=> 'btn btn-primary']);
echo $this->Form->end();
?>
</div>
</div>
<div class="row">
<div class="col-xs-6">
<?php echo $this->Form->create('UserCreation'); ?>
<legend><?php echo ('Please complete the following form'); ?></legend>
</div>
</div>
<div class="row">
<div class="col-xs-3">
<?php
echo $this->Form->hidden('con', ['value' => 'register']);
echo $this->Form->input('SaisirVotreEmail', ['type' => 'email','class'=>'form-control','placeholder'=>'Email']);
echo $this->Form->input('SaisirVotrePassword', ['type' => 'password','class'=>'form-control','placeholder'=>'Password']);
echo $this->Form->input('ConfirmerPassword', ['type' => 'password','class'=>'form-control','placeholder'=>'Password']);
echo $this->Form->submit('Creer',['class'=> 'btn btn-primary']);
echo $this->Form->end();
?>
</div>
</div>




