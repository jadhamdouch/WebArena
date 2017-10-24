<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class PlayersTable extends Table
{
    public function checkInfos($email, $password){
        $query = $this->find('all', ['conditions' => ['email' => $email]]);
        $selectPlayer = $query->first();
        if ($password == $selectPlayer['password']) {
            return $selectPlayer['id'];
        }
        else {
            return false;
        }    
    }
    
    public function createPlayer($name,$pass){
        $player = $this->newEntity();
        
        $player-> email = $name;
        $player-> password = $pass;
        
        if($this->save($player)){
            $id = $player -> id ;
        }
        
    }
    
    public function createPlayerC($name,$pass){
        $query = $this->query();
        $query -> insert(['email','password'])
                ->values(['email'=>$name,
                    'password' => $pass])
                ->execute();
        $id =$this->id ;
    }
}