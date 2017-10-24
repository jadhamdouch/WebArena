<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
    
    
public function index()
{
$this->set('myname', "Jad Hamdouch");
$this->loadModel('Fighters');
$v= $this->Fighters->getBestFighter();
$this->set("var",$v);
}
public function login(){
$this->loadModel('Players');
        if ($this->request->is('post') && $this->request->data['email']!=NULL && $this->request->data['password']!=NULL && $this->request->data['con']=='login' ) {
            if($playerId = $this->Players->checkInfos($this->request->data['email'], $this->request->data['password'])) {
                $this->request->session()->write('playerId', $playerId);
                $this->redirect(['action' => 'fighter']);
                
            }
            
        else {$this->Flash->error('Wrong login, please try again !');}
        }
        if ($this->request->is('post') && $this->request->data['emailC']!=NULL  && $this->request->data['con']=='register' ) {
            if($this->request->data['emailC']!=NULL && $this->request->data['passwordC']!=NULL && $this->request->data['passwordC']==$this->request->data['passwordC2'] ){
                $this->Players->createPlayer($this->request->data['emailC'],$this->request->data['passwordC']);  
            }
        }
        
    
}

public function logout(){
    $this->request->session()->delete('playerId');
        $this->redirect(['action' => '/']);
}

public function fighter(){
   /* $this->loadModel('Fighters');
    $f = $this->Fighters->get();
    $this->set("F",$f);*/
    
    if ($this->request->session()->check('playerId')==NULL) {$this->redirect(['action' => 'login']);}
    $this->loadModel('Fighters');
    $playerID = $this->request->session()->read('playerId');
    $fighters = $this->Fighters->getFighters($playerID);
  
    $this->set("fighters",$fighters);    
    
    if ($this->request->is('post')) {
        $this->redirect(['action' => 'createFighterForm']);
    }
   
}

public function createFighterForm(){
    if ($this->request->session()->check('playerId')==NULL) {$this->redirect(['action' => 'login']);}
    $playerID = $this->request->session()->read('playerId');
    $this->loadModel('Fighters');
    if ($this->request->is('post') && $this->request->data['name']!=NULL) {
        $fighterName = $this->request->data['name'];     
        $this->Fighters->createFighter($playerID,$fighterName);
        $this->redirect(['action' => 'fighter']);
    }
}

public function sight(){
    
}

public function diary(){
   
}
            
    
}


