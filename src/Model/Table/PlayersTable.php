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
}