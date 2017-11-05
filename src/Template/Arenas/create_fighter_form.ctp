        <?php


echo $this->Form->create('Fighter', array('type'=>'file'));

// Va générer un input type="text"
echo $this->Form->input('name',['type' => 'text']);
echo $this->Form->file('avatar_file',array('label'=>'Votre avatar au format'));?>
<h3> Pas d'inspiration pour votre avatar? choisissez une de nos classes pour vous voir attribué son avatar ;) </h3>
<?php echo $this->Form->select('field', [
    'archer' => 'Archer',
    'mage' => 'Mage',
    'combattant' => 'Combattant'
]);

//echo $this->Form->postButton('Supprimer', ['controller' => 'Tickets', 'action' => 'delete', 5]) ;



echo $this->Form->button('Creer');
echo $this->Form->end();?>