<?php

$this->assign('title', 'Sight');?>
<table>
    <tr><th></th><th>Nom</th><th>Niveau</th><th>XP</th><th>Vu</th><th>Force</th><th>Points de vie</th></tr>
<?php    
echo '<tr>';
    echo '<td>';
    echo "Combattant choisi : ";
    echo '</td>';
    echo '<td>';
    echo $fighter["name"];
    echo '</td>';
    echo '<td>';
    echo $fighter["level"];
    echo '</td>';
    echo '<td>';
    echo $fighter["xp"];
    echo '</td>';
    echo '<td>';
    echo $this->Form->create('fighter');
    echo $this->Form->hidden('add', ['value' =>'sight']);
    echo $fighter["skill_sight"];
    echo $this->Form->submit('+',['class'=> 'btn btn-success']);
    echo $this->Form->end();
    echo '</td>';
    echo '<td>';
    echo $this->Form->create('fighter');
    echo $this->Form->hidden('add', ['value' =>'strength']);
    echo $fighter["skill_strength"];
    echo $this->Form->submit('+',['class'=> 'btn btn-success']);
    echo $this->Form->end();
    echo '</td>';
    echo '<td>';
    echo $this->Form->create('fighter');
    echo $this->Form->hidden('add', ['value' =>'health']);
    echo $fighter["current_health"]."/".$fighter["skill_health"];
    echo $this->Form->submit('+',['class'=> 'btn btn-success']);
    echo $this->Form->end();
    echo '</td>';

    echo'</tr>';?>
</table>