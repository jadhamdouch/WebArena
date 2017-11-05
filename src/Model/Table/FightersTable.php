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
    
    public function getFighterY($fighterId){
        $temp = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $name = $temp->first();
        return $name['coordinate_y'];
    }
    
    public function getFighterX($fighterId){
        $temp = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $name = $temp->first();
        return $name['coordinate_x'];
    }
    
        public function getFighters($player){
        $temp = $this->find('all', array('conditions' => array('player_id' => $player)));
        return $temp;
    }
    
    public function createFighter($idPlayer,$fighterName){
        
      $fighter =  $this->newEntity();
      $fighter->player_id = $idPlayer;
      $fighter->name = $fighterName;
      $fighter->coordinate_x = rand(1,15);
      $fighter->coordinate_y = rand(1,10);
      $fighter->level = 0;
      $fighter->xp = 0;
      $fighter->skill_sight = 2;
      $fighter->skill_strength = 1;
      $fighter->skill_health = 5;
      $fighter->current_health = 5;
       if($this->save($fighter)){
            $id = $fighter -> id ;
        }
                    }
                    
    public function passerNiveau($fighterId){
        $query = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $fighter = $query->first();
        $fighter['level'] = $fighter['level'] + 1; 
        $fighter['skill_health'] = $fighter['skill_health']+1;
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
        $health = $fighter['skill_health'] +3;
        if($xpF/4 - $levelF >=0){
            $fighter['skill_health']= $health ;
            $this->save($fighter); 
            $this->passerNiveau($fighterId);
            
        }
        else{
            echo 'vous n\'avez pas assez d\'xp';
        }
    }
    public function displayFighters($map){
        $temp = $this->find('all');
        foreach($temp as $fighter){
            if($fighter['coordinate_x'] != -1 && $fighter['coordinate_y'] != -1){
                $map[$fighter['coordinate_y']-1][$fighter['coordinate_x']-1] = $fighter;
            }
        }
        return $map;
    }
    
public function moveUp ($fighterId){
    $query = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $fighter = $query->first();
        $y =$fighter['coordinate_y']-1;
        $x =$fighter['coordinate_x'];
        $test = $this->find('all',array('conditions' => array('coordinate_y' => $y,'coordinate_x' => $x)));
        $nb = $test -> count();
        if($nb == 0 && $y>=1 ){
            $fighter['coordinate_y'] = $y;
            $this->save($fighter); 
        }
}

public function moveDown ($fighterId){
    $query = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $fighter = $query->first();
        $y =$fighter['coordinate_y']+1;
        $x =$fighter['coordinate_x'];
        $test = $this->find('all',array('conditions' => array('coordinate_y' => $y,'coordinate_x' => $x)));
        $nb = $test -> count();
        if($nb == 0&& $y<=10){
            $fighter['coordinate_y'] = $y;
            $this->save($fighter); 
        }
}

public function moveRight ($fighterId){
    $query = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $fighter = $query->first();
        $y =$fighter['coordinate_y'];
        $x =$fighter['coordinate_x']+1;
        $test = $this->find('all',array('conditions' => array('coordinate_y' => $y,'coordinate_x' => $x)));
        $nb = $test -> count();
        if($nb == 0 && $x<=15){
            $fighter['coordinate_x'] = $x;
            $this->save($fighter); 
        }
}

public function moveLeft ($fighterId){
    $query = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $fighter = $query->first();
        $y =$fighter['coordinate_y'];
        $x =$fighter['coordinate_x']-1;
        $test = $this->find('all',array('conditions' => array('coordinate_y' => $y,'coordinate_x' => $x)));
        $nb = $test -> count();
        if($nb == 0 && $x>=1){
            $fighter['coordinate_x'] = $x;
            $this->save($fighter); 
        }
}

public function attUp ($fighterId){
    $query = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $fighter = $query->first();
        $y =$fighter['coordinate_y']-1;
        $x =$fighter['coordinate_x'];
        $test = $this->find('all',array('conditions' => array('coordinate_y' => $y,'coordinate_x' => $x)));
        $nb = $test -> count();
        if($nb ==0){
            return -1  ;   }
        $fighterToAttack = $test ->first();
        $finalHealth = $fighterToAttack['current_health'] - $fighter['skill_strength'];
        if(rand(1,20)>(10 + $fighterToAttack['level']-$fighter['level'] )){
            if($finalHealth <= 0){
            $fighterToAttack['current_health'] = 0 ;
            $fighterToAttack['coordinate_x'] = -1;
            $fighterToAttack['coordinate_y'] = -1;
            $this->save($fighterToAttack);
            $fighter['xp'] = $fighter['xp']+ $fighterToAttack['level'] +1 ;
            $this->save($fighter);
            return $fighterToAttack['name'].' et le tue!';
            }
            else {
                $fighterToAttack['current_health'] = $finalHealth ;
                $this->save($fighterToAttack);
                $fighter['xp'] = $fighter['xp'] +1 ;
                 $this->save($fighter);
                 return $fighterToAttack['name'];
                
            }   
            
            } else{return$fighterToAttack['name'].' et échoue!'; ;}  }
            
   public function attDown ($fighterId){
    $query = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $fighter = $query->first();
        $y =$fighter['coordinate_y']+1;
        $x =$fighter['coordinate_x'];
        $test = $this->find('all',array('conditions' => array('coordinate_y' => $y,'coordinate_x' => $x)));
        $nb = $test -> count();
        if($nb ==0){
            return -1 ;   }
        $fighterToAttack = $test ->first();
        $finalHealth = $fighterToAttack['current_health'] - $fighter['skill_strength'];
        if(rand(1,20)>(10 + $fighterToAttack['level']-$fighter['level'] )){
            if($finalHealth <= 0){
            $fighterToAttack['current_health'] = 0 ;
            $fighterToAttack['coordinate_x'] = -1;
            $fighterToAttack['coordinate_y'] = -1;
            $this->save($fighterToAttack);
            $fighter['xp'] =  $fighter['xp'] +$fighterToAttack['level'] +1 ;
            $this->save($fighter);
            return $fighterToAttack['name'].' et le tue!';
            }
            else {
                $fighterToAttack['current_health'] = $finalHealth ;
                $this->save($fighterToAttack);
                $fighter['xp'] = $fighter['xp'] +1 ;
                 $this->save($fighter);
                return $fighterToAttack['name'];
            }     } else{return $fighterToAttack['name'].' et échoue!';}  }
            
    public function attLeft ($fighterId){
    $query = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $fighter = $query->first();
        $y =$fighter['coordinate_y'];
        $x =$fighter['coordinate_x']-1;
        $test = $this->find('all',array('conditions' => array('coordinate_y' => $y,'coordinate_x' => $x)));
        $nb = $test -> count();
        if($nb ==0){
            return -1 ;   }
        $fighterToAttack = $test ->first();
        $finalHealth = $fighterToAttack['current_health'] - $fighter['skill_strength'];
        if(rand(1,20)>(10 + $fighterToAttack['level']-$fighter['level'] )){
            if($finalHealth <= 0){
            $fighterToAttack['current_health'] = 0 ;
            $fighterToAttack['coordinate_x'] = -1;
            $fighterToAttack['coordinate_y'] = -1;
            $this->save($fighterToAttack);
            $fighter['xp'] =  $fighter['xp'] + $fighterToAttack['level'] +1 ;
            $this->save($fighter);
            return $fighterToAttack['name'].' et le tue!';
            }
            else {
                $fighterToAttack['current_health'] = $finalHealth ;
                $this->save($fighterToAttack);
                $fighter['xp'] = $fighter['xp'] +1 ;
                 $this->save($fighter);
                return $fighterToAttack['name'];
            }     } else{return $fighterToAttack['name'].' et échoue!';}  }
            
 public function attRight ($fighterId){
    $query = $this->find('all', array('conditions' => array('id' => $fighterId)));
        $fighter = $query->first();
        $y =$fighter['coordinate_y'];
        $x =$fighter['coordinate_x']+1;
        $test = $this->find('all',array('conditions' => array('coordinate_y' => $y,'coordinate_x' => $x)));
        $nb = $test -> count();
        if($nb ==0){
            return -1 ;   }
        $fighterToAttack = $test ->first();
        $finalHealth = $fighterToAttack['current_health'] - $fighter['skill_strength'];
        if(rand(1,20)>(10 + $fighterToAttack['level']-$fighter['level'] )){
            if($finalHealth <= 0){
            $fighterToAttack['current_health'] = 0 ;
            $fighterToAttack['coordinate_x'] = -1;
            $fighterToAttack['coordinate_y'] = -1;
            $this->save($fighterToAttack);
            $fighter['xp'] =  $fighter['xp'] + $fighterToAttack['level'] +1 ;
            $this->save($fighter);
            return $fighterToAttack['name'].' et le tue!';
            }
            else {
                $fighterToAttack['current_health'] = $finalHealth ;
                $this->save($fighterToAttack);
                $fighter['xp'] = $fighter['xp'] +1 ;
                $this->save($fighter);
                return $fighterToAttack['name'];
            }     }else{return $fighterToAttack['name'].' et échoue!';}   }
            
            
            public function bonusItem($fighter, $bonusDif){
        $conditions = array('id' => $fighter);
        if($this->exists($conditions)){
            $temp = $this->find('all', array('conditions' => $conditions));
            $f = $temp->first();
            switch($bonusDif['type']){
                case 'D': $f['skill_strength'] = $f['skill_strength'] + $bonusDif['dif'];
                    break;
                case 'L': $f['skill_health'] = $f['skill_health'] + $bonusDif['dif'];
                    $f['current_health'] = $f['current_health'] + $bonusDif['dif'];
                    break;
                case 'V': $f['skill_sight'] = $f['skill_sight'] + $bonusDif['dif'];
                    break;
                default : break;
            }
            $this->save($f);
        }
    }
                
   
    
}