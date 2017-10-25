<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class FightersTable extends Table
{
public function test(){
    return "ok";
}

public function getBestFighter(){
   return $this->find("all")->order(["level"=>"desc"])
            ->first();

}

    public function getFighter($id){
        $temp = $this->find('all', array('conditions' => array('id' => $id)));
        return $temp->first();
    }
    
    public function getFighterName($fighterId){
        $temp = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $name = $temp->first();
        return $name['name'];
    }
    
        public function getFighters($player){
        $temp = $this->find('all', array('conditions' => array('player_id' => $player)));
        return $temp;
    }
    
    public function createFighter($idPlayer,$fighterName){
        
      $fighter =  $this->newEntity();
      $fighter->player_id = $idPlayer;
      $fighter->name = $fighterName;
      $fighter->coordinate_x = 1;
      $fighter->coordinate_y = 1;
      $fighter->level = 1;
      $fighter->xp = 16;
      $fighter->skill_sight = 0;
      $fighter->skill_strength = 0;
      $fighter->skill_health = 0;
      $fighter->current_health = 3;
       if($this->save($fighter)){
            $id = $fighter -> id ;
        }
                    }
                    
    public function passerNiveau($fighterId){
        $query = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $fighter = $query->first();
        $fighter['level'] = $fighter['level'] + 1; 
        $health = $fighter['skill_health'];
        $fighter['current_health'] = $health;
        $this->save($fighter); 
    }
    
    public function addSight($fighterId){
        $query = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $fighter = $query->first();
        $levelF = $fighter['level'];
        $xpF = $fighter['xp'];
        $sightF = $fighter['skill_sight'] +1;
        if($xpF/4 - $levelF >=0){
            $fighter['skill_sight']= $sightF ;
            $this->save($fighter); 
            $this->passerNiveau($fighterId);
            
        }
        else{
            echo 'vous n\'avez pas assez d\'xp';
        }
    }
    
    public function addStrength($fighterId){
        $query = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $fighter = $query->first();
        $levelF = $fighter['level'];
        $xpF = $fighter['xp'];
        $strength = $fighter['skill_strength'] +1;
        if($xpF/4 - $levelF >=0){
            $fighter['skill_strength']= $strength ;
            $this->save($fighter); 
            $this->passerNiveau($fighterId);
            
        }
        else{
            echo 'vous n\'avez pas assez d\'xp';
        }
    }
    
    public function addHealth($fighterId){
        $query = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $fighter = $query->first();
        $levelF = $fighter['level'];
        $xpF = $fighter['xp'];
        $health = $fighter['skill_health'] +1;
        if($xpF/4 - $levelF >=0){
            $fighter['skill_health']= $health ;
            $this->save($fighter); 
            $this->passerNiveau($fighterId);
            
        }
        else{
            echo 'vous n\'avez pas assez d\'xp';
        }
    }
                
   
    
}