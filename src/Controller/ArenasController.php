<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Personal Controller
 * User personal interface
 *
 */
class ArenasController extends AppController {

    public function index() {
        $this->set('myname', "Jad Hamdouch");
        $this->loadModel('Fighters');
        $v = $this->Fighters->getBestFighter();
        $this->set("var", $v);
    }

    public function login() {
        $this->loadModel('Players');
        if (!empty($this->request->data['email']) && !empty($this->request->data['password']) && $this->request->data['con'] == 'login') {
            if ($playerId = $this->Players->checkInfos($this->request->data['email'], $this->request->data['password'])) {
                $this->request->session()->write('playerId', $playerId);
                $this->redirect(['action' => 'fighter']);
            }
        } else if (!empty($this->request->data['SaisirVotreEmail']) && $this->request->data['con'] == 'register') {
            if($this->request->session()->check('playerId') == NULL){
            if (!empty($this->request->data['SaisirVotreEmail']) && !empty($this->request->data['SaisirVotrePassword']) && $this->request->data['SaisirVotrePassword'] == $this->request->data['ConfirmerPassword']) {
                if($this->Players->checkExistant($this->request->data['SaisirVotreEmail'])){
                $this->Players->createPlayer($this->request->data['SaisirVotreEmail'], $this->request->data['SaisirVotrePassword']);
                $this->redirect(['action' => 'fighter']);}
            else {$this->Flash->error('Adresse mail déjà existante !');}}
            
            }
            else {$this->Flash->error('Vous êtes actuellement connecté !');}
        }
    }

    public function logout() {
        $this->request->session()->delete('playerId');
        $this->redirect(['action' => '/']);
    }
    
    public function Equipement() {
        
        
        
        
        
        
        
        
        
        
        
        
    }

    public function fighter() {
        /* $this->loadModel('Fighters');
          $f = $this->Fighters->get();
          $this->set("F",$f); */

        if ($this->request->session()->check('playerId') == NULL) {
            $this->redirect(['action' => 'login']);
        }
        $this->loadModel('Fighters');
        $playerID = $this->request->session()->read('playerId');
        $fighters = $this->Fighters->getFighters($playerID);

        $this->set("fighters", $fighters);

        if ($this->request->is('post') && $this->request->data['create']=='yes' ) {
            $this->redirect(['action' => 'createFighterForm']);
        }
        else if ($this->request->is('post')&& $this->request->data['create']=='no'){
            foreach ( $fighters as $f) {
                if($f->id ==$this->request->data['fighterId']  ){
                    if($f->current_health > 0){
                    $this->request->session()->write('selectedFighterId', $f->id);
                    $this->redirect(['action' => 'sight']);}
                    else{
                       $this->Flash->error("ce combatant est mort",array("class"=>"bg-danger"));
                        
                    }
                        
                }
                
                
            }
        }
    }

    public function createFighterForm() {
        if ($this->request->session()->check('playerId') == NULL) {
            $this->redirect(['action' => 'login']);
        }
        $playerID = $this->request->session()->read('playerId');
        $this->loadModel('Fighters');
        $this->loadModel('Events');
        if (!empty($this->request->data['name'])) {
            $fighterName = $this->request->data['name'];
            $coordinate =$this->Fighters->createFighter($playerID, $fighterName);
            $this->Events->createFighter($fighterName,$coordinate);
            $filename = strtolower(
                                    pathinfo(
                                            $this->request->data['avatar_file']['name'],
                                            PATHINFO_EXTENSION));
            if(!empty($this->request->data['avatar_file']['tmp_name'])&&
                    in_array($filename ,array('jpg','jpeg','png'))){
                move_uploaded_file($this->request->data['avatar_file']['tmp_name'], 'img' . DS. 'avatars' . DS . $playerID .$this->request->data['name']. '.' . $filename );
                
            }
            else{
                
              $srcfile = 'img'.DS.$this->request->data['field'].'.jpg';  
              $dstfile = 'img'. DS . 'avatars'.DS.$playerID .$this->request->data['name'].'.jpg';
                copy($srcfile, $dstfile);
            }
            $this->redirect(['action' => 'fighter']);
            
        }
    }

    public function sight() {
        if ($this->request->session()->check('playerId') == NULL) {
            $this->redirect(['action' => 'login']);
        }
        $this->loadModel('Fighters');
        $this->loadModel('Events');
        $this->loadModel('Tools');
        $fighterID = $this->request->session()->read('selectedFighterId');
        $playerID = $this->request->session()->read('playerId');
        $this->loadModel('Events');
        $this->set('events', $this->Events->getEvents());
        $fighterName =$this->Fighters->getFighterName($fighterID) ;
        $x = $this->Fighters->getFighterX($fighterID) ;
        $y = $this->Fighters->getFighterY($fighterID);
        $this->set("x",$x);
        $this->set("y",$y);
        $avatar = $playerID .$fighterName;
        $this->set("avatar",$avatar);
        $fighter = $this->Fighters->getFighter($fighterID);
        $this->set("fighter", $fighter);
        if($this->request->is('post') && $this->request->data['add']=='sight'){
            $this->Fighters->addSight($fighterID);
            $this->redirect(['action' => 'sight']);
        }
        else if($this->request->is('post') && $this->request->data['add']=='strength'){
            $this->Fighters->addStrength($fighterID);
            $this->redirect(['action' => 'sight']);
        }
        else if($this->request->is('post') && $this->request->data['add']=='health'){
            $this->Fighters->addHealth($fighterID);
            $this->redirect(['action' => 'sight']);
        }
        
        else if($this->request->is('post') && $this->request->data['add']=='haut' ){
            $this->Fighters->moveUp($fighterID);
            $this->redirect(['action' => 'sight']);
        }
        
        else if($this->request->is('post') && $this->request->data['add']=='bas' ){
            $this->Fighters->moveDown($fighterID);
            $this->redirect(['action' => 'sight']);
        }
        
        else if($this->request->is('post') && $this->request->data['add']=='droite' ){
            $this->Fighters->moveRight($fighterID);
            $this->redirect(['action' => 'sight']);
        }
        
        else if($this->request->is('post') && $this->request->data['add']=='gauche' ){
            $this->Fighters->moveLeft($fighterID);
            $this->redirect(['action' => 'sight']);
        }
        else if($this->request->is('post') && $this->request->data['add']=='attH' ){
            $chaine =$this->Fighters->attUp($fighterID);
            $y = $y-1;
            $this->Events->att($fighterName,$chaine,$x,$y);
            $this->redirect(['action' => 'sight']);
            
        }
        
        else if($this->request->is('post') && $this->request->data['add']=='attB' ){
            $chaine =$this->Fighters->attDown($fighterID);
            $y = $y+1;
            $this->Events->att($fighterName,$chaine,$x,$y);
            $this->redirect(['action' => 'sight']);
        }
        
        else if($this->request->is('post') && $this->request->data['add']=='attG' ){
            $chaine =$this->Fighters->attLeft($fighterID);
            $x = $x-1;
            $this->Events->att($fighterName,$chaine,$x,$y);
            $this->redirect(['action' => 'sight']);
        }
        
        else if($this->request->is('post') && $this->request->data['add']=='attD' ){
            $chaine =$this->Fighters->attRight($fighterID);
            $x = $x+1;
            $this->Events->att($fighterName,$chaine,$x,$y);
            $this->redirect(['action' => 'sight']);
        }
        
         else if($this->request->is('post') && $this->request->data['add']=='createTools' ){
            $this->Tools->createTools();
            $this->redirect(['action' => 'sight']);
        }
        
        else if($this->request->is('post') && $this->request->data['add']=='equiper'){
            $bonusDif = $this->Tools->equiper($x,$y,$fighterID);
            $this->Fighters->bonusItem($fighterID, $bonusDif);
            $this->redirect(['action' => 'sight']);
        }
        $map = array();
        for ($i=0; $i<10; $i++){
            $map[$i] = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        }
        //moving the session fighter if needed
        
        
        
       $this->set('sessionFighter', $this->Fighters->getFighter($this->request->session()->read('selectedFighterId')));
        $mapWithTools = $this->Tools->displayTools($map);
       $this->set('arenaMap', $this->Fighters->displayFighters($mapWithTools));
        
        
    }

    public function diary() {
        if ($this->request->session()->check('playerId')==NULL) {$this->redirect(['action' => 'login']);}
        
        $this->loadModel('Events');
        
        $this->set('events', $this->Events->getEvents());
    }

}
