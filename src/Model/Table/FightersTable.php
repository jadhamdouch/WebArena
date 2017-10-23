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
        $query = $this->query();
        $query -> insert(['player_id','name','coordinate_x','coordinate_y','level','xp','skill_sight','skill_strength','skill_health','current_health',])
                ->values([
                    'player_id'=>$idPlayer,
                    'name'=>$fighterName,
                    'coordinate_x'=>1,
                    'coordinate_y'=>1,
                    'level'=>1,
                    'xp'=>0,
                    'skill_sight'=>0,
                    'skill_strength'=>0,
                    'skill_health'=>0,
                    'current_health'=>3
                    ])
                ->execute();}
    
    
}