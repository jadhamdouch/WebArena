
  
<h2>Combattant(s)</h2>
<table>
    <tr><th>Nom</th><th>Niveau</th><th>XP</th><th>Vu</th><th>Force</th><th>Bonus Vie</th><th>Points de vie</th></tr>
<?php foreach ($fighters as $f => $fighter){
    echo '<tr>';
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
    echo $fighter["skill_sight"];
    echo '</td>';
    echo '<td>';
    echo $fighter["skill_strength"];
    echo '</td>';
    echo '<td>';
    echo $fighter["skill_health"];
    echo '</td>';
    echo '<td>';
    echo $fighter["current_health"];
    echo '</td>';
    echo'</tr>';
}

;?>
</table>
      <?php


echo $this->Form->create('Fighter');
echo $this->Form->button('Creer un nouveau combattant');
echo $this->Form->end();?>
     


