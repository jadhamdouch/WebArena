        <?php


echo $this->Form->create('Fighter', array('type'=>'file'));

// Va générer un input type="text"
echo $this->Form->input('name',['type' => 'text']);
echo $this->Form->file('avatar_file',array('label'=>'Votre avatar au format'));

//echo $this->Form->postButton('Supprimer', ['controller' => 'Tickets', 'action' => 'delete', 5]) ;



echo $this->Form->button('Creer');
echo $this->Form->end();