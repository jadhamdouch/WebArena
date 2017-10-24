<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class PlayersTable extends Table
{
    public function checkInfos($email, $password){
        $query = $this->find('all', ['conditions' => ['email' => $email]]);
        $selectPlayer = $query->first();
        if (password_verify($password,$selectPlayer['password'])) {
            return $selectPlayer['id'];
        }
        else {
            return false;
        }    
    }
    
    public function createPlayer($name,$pass){
        $player = $this->newEntity();
        
        $player-> email = $name;
        $player-> password = crypt($pass);
        
        if($this->save($player)){
            $id = $player -> id ;
        }
        
    }
    
    public function checkExistant($email){
        $query = $this->find('all', ['conditions' => ['email' => $email]]);
        $selectPlayer = $query->first();
        if ($selectPlayer == null){
            return true;
        }
        else
            return false;
    }
    
}