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
            $tool -> bonus = rand(1,2,3);
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
                $map[$tool['coordinate_x']][$tool['coordinate_y']] = $tool;
            }
        }
        return $map;
    }
}