<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ToolsTable extends Table
{
    
    
    public function createTools(){
        
        $tools = array("D","L","V");
        for ($i = 0 ; $i<10;$i++){
            $nb =1 ;
            $tool = $this->newEntity();
            $tool -> type = $tools[rand(0,2)];
            $tool -> bonus = rand(1,3);
            while($nb != 0){
               $y = rand(1,10);
               $x= rand(1,15);
               $test = $this->find('all',array('conditions' => array('coordinate_y' => $y,'coordinate_x' => $x)));
                $nb = $test -> count();
            }
            $tool -> coordinate_x = $x;
            $tool -> coordinate_y = $y;
            if($this->save($tool)){
            $id = $tool -> id ;
        }
            }
    }
    
    public function displayTools($map){
        $temp = $this->find('all');
        foreach($temp as $tool){
            if($tool['coordinate_x'] != -1 && $tool['coordinate_y'] != -1){
                $map[$tool['coordinate_x']-1][$tool['coordinate_y']-1] = $tool;
            }
        }
        return $map;
    }
    
    public function equiper($x,$y,$fighterID){
        $conditions = array('coordinate_x' => $x, 'coordinate_y' => $y);
        if($this->exists($conditions)){
            $temp = $this->find('all', array('conditions' => $conditions));
            $t = $temp->first();
            $cond = array('type' => $t['type'], 'fighter_id' => $fighterID);
            if($this->exists($cond)){
                $temp = $this->find('all', array('conditions' => $cond));
                $previous = $temp->first();
                $preBonus = $previous['bonus'];
                $previous['coordinate_x'] = $x;
                $previous['coordinate_y'] = $y;
                $previous['fighter_id'] = -1;
                $this->save($previous);
            }else{      
                $preBonus = 0;
            }
            $t['fighter_id'] = $fighterID;
            $t['coordinate_x'] = -1;
            $t['coordinate_y'] = -1;
            $this->save($t);
            return array('type' => $t['type'], 'dif' => ($t['bonus'] - $preBonus));
        }
    }
}