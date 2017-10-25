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
    
    public function getEvents(){
        $now = Time::now();
        $all = $this->find('all', array('conditions' => array('date >' => $now->modify('-24 hours'))));
        return $all;
    }  
}