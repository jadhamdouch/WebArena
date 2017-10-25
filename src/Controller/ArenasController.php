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
                if($f->id ==$this->request->data['fighterId'] ){
                    $this->request->session()->write('selectedFighterId', $f->id);
                    $this->redirect(['action' => 'sight']);
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
        if (!empty($this->request->data['name'])) {
            $fighterName = $this->request->data['name'];
            $this->Fighters->createFighter($playerID, $fighterName);
            $this->redirect(['action' => 'fighter']);
            $file = $this->request->data['submittedfile'];
        }
    }

    public function sight() {
        if ($this->request->session()->check('playerId') == NULL) {
            $this->redirect(['action' => 'login']);
        }
        $this->loadModel('Fighters');
        $fighterID = $this->request->session()->read('selectedFighterId');
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
        
        
    }

    public function diary() {
        
    }

}
