<?php

$this->assign('title', 'Equipement');?>

<h3>Présentation des équipements de WebArena</h3>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Equipement</a></li>
        <li><a href="#Armes">Armes</a></li>
        <li><a href="#Armures">Armures</a></li>
        <li><a href="#Lunettes">Lunettes</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">
        
      <h2 id="Armes">Les Armes</h2>
      <div class="row">
        <div class="col-sm-2 text-center">
           <?php echo $this->Html->image("Item/D1.jpg", array("class"=>"img-thumbnail imgTool","alt"=>"Epée de Niveau 1"));?>
          
        </div>
        <div class="col-sm-10">
          <h4>Petite Épée<small>   Surnom : La Brindille</small></h4>
          <p>La Brindille est une petite épée que les enfants utilisent pour jouer aux chevaliers. Elle ne fait pas très mal et est assez fragile mais comme le dit ma copine "c'est mieux que rien".</p>
          <br>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-2 text-center">
          <?php echo $this->Html->image("Item/D2.jpg", array("class"=>"img-thumbnail imgTool","alt"=>"Epée de Niveau 2"));?>
        </div>
        <div class="col-sm-10">
          <h4>Épée de l'Apprenti<small>   Surnom : Épée d'entrainement</small></h4>
          <p>Cette épée est robuste et sera parfaite pour tous les apprentis en quêtes de force. Attention tout de même à ne pas vous blesser avec. (Note : Elle peut également alimenter les feux de camp si besoin).</p>
          <br>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-2 text-center">
          <?php echo $this->Html->image("Item/D3.jpg", array("class"=>"img-thumbnail imgTool","alt"=>"Epée de Niveau 3"));?>
        </div>
        <div class="col-sm-10">
          <h4>Épée de Bravoure<small>   Surnom : Attention je pique</small></h4>
          <p>Cette épée n'est remise qu'aux apprentis qui ont terminé leur entrainement. Elle est jolie mais un peu lourde. La légende raconte qu'on peut couper la roche avec... Mais bon ce n'est qu'une légende.</p>
          <br>
        </div>
      </div>
      
      
      <h2 id="Armures">Les Armures</h2>
      <div class="row">
        <div class="col-sm-2 text-center">
          <?php echo $this->Html->image("Item/L1.jpg", array("class"=>"img-thumbnail imgTool","alt"=>"Armure de Niveau 1"));?>
        </div>
        <div class="col-sm-10">
          <h4>Armure Légère<small>   Surnom : Furtif</small></h4>
          <p>Pratique pour se déplacer, cette armure agit comme une seconde peau. En revanche elle ne protège pas très bien.</p>
          <br>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-2 text-center">
            <?php echo $this->Html->image("Item/L2.jpg", array("class"=>"img-thumbnail imgTool","alt"=>"Armure de Niveau 2"));?>        </div>
        <div class="col-sm-10">
          <h4>Armure de l'Apprenti<small>   Surnom : Armure de l'Apprenti</small></h4>
          <p>Cette armure, soyons franc, c'est de l'entrée de game. Elle est lourde, encombrante et ne donne pas trop envie, un peu comme la femme de Bruno.</p>
          <br>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-2 text-center">
<?php echo $this->Html->image("Item/L3.jpg", array("class"=>"img-thumbnail imgTool","alt"=>"Armure de Niveau 3"));?>        </div>
        <div class="col-sm-10">
          <h4>Armure de Guerre<small>   Surnom : T'as vu comme je brille ?!</small></h4>
          <p>Ça c'est de l'armure ! Elle brille, elle est légère et elle est très robuste. Je m'en servais le matin comme d'un miroire pour me coiffer. Je vous la recommande ! L'essayer c'est l'adopter.</p>
          <br>
        </div>
      </div>
      
      
      <h2 id="Lunettes">Les Lunettes</h2>
      <div class="row">
        <div class="col-sm-2 text-center">
<?php echo $this->Html->image("Item/V1.jpg", array("class"=>"img-thumbnail imgTool","alt"=>"Lunettes de Niveau 1"));?>        </div>
        <div class="col-sm-10">
          <h4>Lunettes Sans Verres<small>   Surnom : LSV</small></h4>
          <p>À quoi peut servir une paire de lunette sans verre me direz-vous ? Et je vous répondrais à rien... Certains l'utilisent pour paraitre plus intelligent dans les pubs et s'en servent pour draguer les joiles filles.</p>
          <br>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-2 text-center">
<?php echo $this->Html->image("Item/V2.jpg", array("class"=>"img-thumbnail imgTool","alt"=>"Lunettes de Niveau 2"));?>        </div>
        <div class="col-sm-10">
          <h4>Lunette de Vue<small>   Surnom : Les Loupes</small></h4>
          <p>Avec ça vous ne pouvez que faire mouche les gars ! Ces lunettes sont adaptées à votre vue et sont par conséquent un outil très utile. En revanche, si vous vous êtes marié avant d'en trouver une paire, je vous conseille de ne pas les porter devant votre femme... Il y a des vérités qu'ils ne faudraient mieux pas découvrir.</p>
          <br>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-2 text-center">
<?php echo $this->Html->image("Item/V3.jpg", array("class"=>"img-thumbnail imgTool","alt"=>"Lunettes de Niveau 3"));?>         </div>
        <div class="col-sm-10">
          <h4>Lunettes de Soleil<small>   Surnom : Là c'est la classe</small></h4>
          <p>Eh beh ! Ça en jette grave ! On dirait un kéké des plages... T'es content de toi ?</p>
          <br>
        </div>
      </div>
      
      
    </div>
  </div>
</div>