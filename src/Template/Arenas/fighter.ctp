
        <?php


echo $this->Form->create('Fighter');
echo $this->Form->button('Creer un nouveau combatant');
echo $this->Form->end();?>
<h2>Combatant</h2>
<table>
<?php foreach ($fighters as $f => $fighter){
    echo '<tr>';
    echo '<td>';
    echo $fighter["name"];
    echo '</td>';
    echo'</tr>';
}

;?>
</table>
     


