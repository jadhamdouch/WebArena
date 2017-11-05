




<?php

$this->assign('title', 'Creer son combattant');?>
<div class="row">
<div class="col-xs-6">
<legend><?php echo ('Remplissez les champs du formulaire pour creer votre combattant'); ?></legend>
</div>
</div>
<?php echo $this->Form->create('Fighter', array('type'=>'file'));?>
<div class="row">
<div class="col-xs-3">
<?php
echo $this->Form->input('name',['type' => 'text','label' => 'Nom','class'=>'form-control']);
echo $this->Form->label('Upload votre avatar au format jpg');
echo $this->Form->file('avatar_file',array('class'=>' btn btn-primary'));?><br>
    </div>
</div>
    <div class="row">
<div class="col-xs-6">
<legend><?php echo ('Pas d\'inspiration pour votre avatar? choisissez une de nos classes pour vous voir attribué son avatar ;)'); ?></legend>
</div></div>
<div class="row">
<div class="col-xs-3">
<?php echo $this->Form->select('field', [
    'archer' => 'Archer',
    'mage' => 'Mage',
    'combattant' => 'Combattant'
]);
echo '<br><br><br><br><br>' ;
echo $this->Form->button('Creer',['class'=> 'btn btn-primary']);
echo $this->Form->end();?>

</div></div>