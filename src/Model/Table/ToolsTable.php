<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ToolsTable extends Table
{
    
    
    public function createTools(){
        $this->loadModel('Fighters');
        $tools[] = array('D','L','V');
        $nb =1;
        for ($i = 0 ; $i<10;$i++){
            $rand_keys = array_rand($tools, 1);
            $tool = $this->newEntity();
            $tool -> type = $tools[$rand_keys];
            $tool -> bonus = rand(1,2);
            while($nb != 0){
               $y = rand(1,10);
               $x= rand(1,15);
               $test = $this->Fighters->find('all',array('conditions' => array('coordinate_y' => $y,'coordinate_x' => $x)));
                $nb = $test -> count();
            }
            $tool -> coordinate_x = $x;
            $tool -> coordinate_y = $y;
            if($this->save($tool)){
            $id = $tool -> id ;
        }
            }
    }
    
    public function displayFighters($map){
        $temp = $this->find('all');
        foreach($temp as $tool){
            if($tool['coordinate_x'] != -1 && $tool['coordinate_y'] != -1){
                $map[$tool['coordinate_y']-1][$tool['coordinate_x']-1] = $tool;
            }
        }
        return $map;
    }
}