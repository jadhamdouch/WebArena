<?php $this->assign('title', 'Sight');?>
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
    echo $fighter["skill_sight"];
    echo '</td>';
    echo '<td>';
    echo $fighter["skill_strength"];
    echo '</td>';
    echo '<td>';
    echo $fighter["current_health"]."/".$fighter["skill_health"];
    echo '</td>';

    echo'</tr>';?>
</table>