<?php

$this->assign('title', 'Sight');?>
<div class="container-fluid ">    
  <div class="row content">
      <div class="col-sm-3 sidenav">
           <?php echo $this->Html->image("avatars/".$avatar,array('class'=>'av'));?>
          <table class="table">
    
<?php    
echo '<tr class="active">';
    echo '<td >';
    echo "Combattant choisi : ";
    echo '</td>';
    echo '<td>';
    echo $fighter["name"];
    echo '</td>';
    echo '</tr ><tr class="info"><td>Level</td>';
    echo '<td>';
    echo $fighter["level"];
    echo '</td>';
    echo '</tr><tr class="info"><td>xp</td>';
    echo '<td>';
    echo $fighter["xp"];
    echo '</td>';
    echo '</tr><tr class="info"><td>Vu</td>';
    echo '<td>';
    echo $this->Form->create('fighter');
    echo $this->Form->hidden('add', ['value' =>'sight']);
    echo $fighter["skill_sight"];
    echo $this->Form->submit('+',['class'=> 'btn btn-success ']);
    echo $this->Form->end();
    echo '</td>';
    echo '</tr ><tr class="info"><td>Force</td>';
    echo '<td>';
    echo $this->Form->create('fighter');
    echo $this->Form->hidden('add', ['value' =>'strength']);
    echo $fighter["skill_strength"];
    echo $this->Form->submit('+',['class'=> 'btn btn-success']);
    echo $this->Form->end();
    echo '</td>';
    echo '</tr><tr class="info"><td>Vie</td>';
    echo '<td>';
    echo $this->Form->create('fighter');
    echo $this->Form->hidden('add', ['value' =>'health']);
    echo $fighter["current_health"]."/".$fighter["skill_health"];
    echo $this->Form->submit('+',['class'=> 'btn btn-success']);
    echo $this->Form->end();
    echo '</td>';

    echo'</tr>';?>
</table>
      </div>
 <div class="col-sm-8 ">
<table class="arena">
   <?php foreach($arenaMap as $i => $line){
        echo '<tr>';
        if(isset($line[1])){
            foreach ($line as $j => $square){
                echo '<td>';
                $dist = abs($j - $sessionFighter['coordinate_x']+1) + abs($i - $sessionFighter['coordinate_y']+1);
                if($dist < 0){ $dist = 0 - $dist; }
                if($dist > $sessionFighter['skill_sight']){
                    echo $this->Html->image('treeF.png',array("class"=>"imgDam"));
                }else{
                    if(gettype($square) == 'integer'){
                    echo $this->Html->image('grass.jpg',array("class"=>"imgDam"));
                    }else{
                        if(isset($square['player_id'])){
                            
                            echo $this->Html->image("avatars/".$square['player_id'].$square['name'],array("class"=>"imgDam",'title' => $square['name']));
                        }else{
                            if(isset($square['bonus'])){
                                echo $this->Html->image($square['type'] . $square['bonus'] . '.jpg', ['alt' => 'weapon' . $square['bonus']]);
                            }
                        }
                    }
                }
                
                echo '</td>';
            }
        }
        echo '</tr>';
    }?>
</table>
     
     </div>
      <div class="center-block">
      
          <table >
              <tr><td></td><td>
                  <?php echo $this->Form->create('flecheH');
    echo $this->Form->hidden('fleche', ['value' =>'sight']);
    echo $this->Form->submit('Haut',['class'=> 'btn btn-success']);
    echo $this->Form->end();
    ?>
                  </td><td></td></tr>
              
              <tr><td>GAUCHE</td><td></td><td>DROITE</td></tr>
              <tr><td></td><td>BAS</td><td></td></tr> 
          </table>
     
      </div>
      <section class="col-md-12" id= "noborder"><?php      
      echo $this->Form->create('flecheH');
      echo $this->Form->hidden('fleche', ['value' =>'HAUT']);
      echo $this->Form->postButton('<span class="glyphicon glyphicon-arrow-up"></span>', '/arenas/sight', ['value' => 'north', 'class' => 'btn btn-primary btn-block', 'name' => 'dir']);
      echo $this->Form->end();?></section>
      
      

      
  </div>
</div>