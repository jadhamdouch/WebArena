<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\I18n\Time;

class EventsTable extends Table
{
    public function move($dir, $id){
        $new = $this->newEntity();
        $new['name'] = $id['name'] . ' moves ' . $dir;
        $new['coordinate_x'] = $id['coordinate_x'];
        $new['coordinate_y'] = $id['coordinate_y'];
        $new['date'] = time();
        $this->save($new);
    } 
    
    public function att($fighterName,$string,$x,$y){
        if($string == -1){
            return ;
        }
        $new = $this->newEntity();
        $new['name'] = $fighterName . ' attaque ' . $string;
        $new['coordinate_x'] = $x;
        $new['coordinate_y'] = $y;
        $new['date'] = time();
        $this->save($new);
    }
    
    public function createFighter($fighterName,$coordinate){
        $new = $this->newEntity();
        $new['name'] = $fighterName . ' a rejoint l\'arène ';
        $new['coordinate_x'] = $coordinate['x'];
        $new['coordinate_y'] = $coordinate['y'];;
        $new['date'] = time();
        $this->save($new);
    }
    
    public function getEvents(){
        $now = Time::now();
        $all = $this->find('all', array('conditions' => array('date >' => $now->modify('-24 hours'))));
        return $all;
    }  
}