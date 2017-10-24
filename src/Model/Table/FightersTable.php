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
      $fighter->xp = 8;
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
            
        }
    }
                
   
    
}