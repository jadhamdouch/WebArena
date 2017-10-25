        <?php


echo $this->Form->create('Fighter', ['enctype' => 'multipart/form-data']);

// Va générer un input type="text"
echo $this->Form->input('name',['type' => 'text']);
echo $this->Form->file('submittedfile');

//echo $this->Form->postButton('Supprimer', ['controller' => 'Tickets', 'action' => 'delete', 5]) ;



echo $this->Form->button('Creer');
echo $this->Form->end();