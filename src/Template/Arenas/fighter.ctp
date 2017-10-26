<?php $this->assign('title', 'Fighter');?>
<div class="container-fluid text-center">    
  <div class="row content">
      <div class="col-sm-2 sidenav">
          
      </div>
 <div class="col-sm-8 text-left">
<h2>Combattant(s)</h2>
<table class="table table-hover">
    <tr><th>Nom</th><th>Niveau</th><th>XP</th><th>Vu</th><th>Force</th><th>Points de vie</th><th></th></tr>
<?php  $i=0;
foreach ($fighters as $f => $fighter){
     echo $this->Form->create('fighter'.$i);
     echo $this->Form->hidden('create', ['value' =>'no']);
     echo $this->Form->hidden('fighterId', ['value' => $fighter["id"]]);
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
    echo $fighter["current_health"]."/".$fighter["skill_health"];
    echo '</td>';
    echo '<td>';
    echo $this->Form->submit('Choisir',['class'=> 'btn btn-info']);
    echo '</td>';
    echo'</tr>';
  
echo $this->Form->end();
    $i++;
}

;?>
</table>
      <?php


echo $this->Form->create('Fighter');
echo $this->Form->hidden('create', ['value' =>'yes']);
echo $this->Form->button('Creer un nouveau combattant',['class'=>'btn btn-warning']);
echo $this->Form->end();?>
 </div>
      <div class="col-sm-2 sidenav">
          
      </div>
  </div>
</div>
     


