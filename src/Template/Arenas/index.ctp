<?php

$this->assign('title', 'Index');?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">

            <div class="carousel-caption">
                <h3>Une nouvelle expérience de jeu</h3>
                <p>Fait par des joueurs et pour des joueurs</p>
            </div>      
        </div>
    </div>
</div>

<div class="container text-center">    

    <div>


    </div>
</nav>
<div class="container-fluid text-center">    
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class ="list-group ">
                
            </div>
        </div>
        <div class="col-sm-8 text-left">
            <h3 class="text-center">Règle du jeu</h3><br>

            <div class='row'>
                <p>Un combattant se trouve dans une arène en damier à une position X,Y. Cette position ne peut pas se trouver hors des dimension de l'arène. Un seul combattant par case. Une arène par site.</p>
                <p>Un combattant commence avec les caractéristiques suivantes : vue= 2, force=1, point de vie=5 (ces valeurs doivent être paramétrées). Il apparaît à une position libre aléatoire.</p>
                <p>Constantes paramétrées et valeurs de livraison : largeur (x) de l'arène (15), longueur (y) de l'arène (10) (ces valeurs doivent être paramétrées dans un modèle).</p>
                <p>La caractéristique de vue détermine à quelle distance (de Manhattan = x+y) un combattant peut voir. Ainsi seuls les combattants et les éléments du décor à portée sont affichés sur la page concernée. 0 correspond à la case courante.</p>

                <p>La caractéristique de force détermine combien de point de vie perd son adversaire quand le combattant réussit son action d'attaque..</p>
                <p> Lorsque le combattant voit ses points de vie atteindre 0, il est retiré du jeu. Un joueur dont le combattant a été retiré du jeu est invité à en recréer un nouveau.</p>
                <p> Une action d'attaque réussit si une valeur aléatoire entre 1 et 20 (d20) est supérieur à un seuil calculé comme suit : 10 + niveau de l'attaqué - niveau de l'attaquant.</p>
                <p>  Progression : à chaque attaque réussie le combattant gagne 1 point d'expérience. Si l'attaque tue l'adversaire, le combattant gagne en plus autant de points d'expériences que le niveau de l'adversaire vaincu. Tous les 4 points d'expériences, le combattant change de niveau et peut choisir d'augmenter une de ses caractéristiques : vue +1 ou force+1 ou point de vie+3. En cas de progression, les points de vie maximaux augmentent ET les points de vie courants remontent au maximum.</p>
                <p>   En pratique, on incrémentera le niveau que lorsqu'une augmentation sera prise, et on utilisera (xp/4) - niveau pour savoir s'il reste des augmentations à prendre. Le niveau commence et les points d'expérience commencent à 0.</p>
                <p>   Chaque action provoque la création d'un événement avec une description claire. Par exemple : « jonh attaque bill et le touche ».</p>
            </div>

            <h3 class="text-center">Voici les personnages que vous pouvez incarner</h3><br>
            <div class='row'>
                <div id="Archer" class="col-sm-6" >
                    <h4>Archer</h4>
                    <img src="webroot/img/Personnages/Archer/cratte.png" class="img-responsive" style="width:100%" alt="Image Archer">
                </div>

                <div class="col-sm-6" >
                    <br><br><br><br><br><br><h4>Les Archers de WebArena</h4><br>
                    <p>Leur beauté est aussi redoutable que leurs flèches. Il est dit que seuls les disciples Archer de WebArena peuvent se regarder entre eux sans succomber à leur charme dans la seconde... Pour devenir des disciples archers il faire preuve d'une pureté à toute épreuve ! Il faut reconnaître que ce n'est pas évident... </p>
                    <p>Vous l'aurez compris, les archers de WebArena sont redoutables, experts dans leur domaine. Leur vue perçante leur permet de superviser le combat, pour autant, ils ne retiennent pas leurs coups, bien à l'abri dans leurs cachètes... Et comme dirait un disciple Archer de WebArena : "Il n'y a pas que mon arc que je sais bander". </p>
                </div>
            </div>
            <div class='row'>
                <div class="col-sm-6" >
                    <br><br><br><br><br><br><h4>Les Mages de WebArena</h4><br>
                    <p>Leur bonté est reconnue dans toute l'Europe. Tout le monde sait qu'un magicien de WebArena est capable de merveille. Il sont capable de guérir les maladie mais aussi de lancer de puissant sortillèges. La légende racconte que pour devenir un de leur disciple il faut être choisit pour la nature elle-même... </p>
                    <p>Si vous en croisez un, sachez-vous montrer courtois. Ils n'aiment pas les pollueurs donc faites attention. Il parrait que si vous réalisez une offrande à leur grand arbre sacré, un disciple viendra vous saluez... Mais attention ils n'acceptent pas tous les types d'offrandes et personne n'a encore réussit à trouver La bonne offrande. </p>
                </div>
                <div id="Mage" class="col-sm-6"> 
                    <h4>Mage</h4> 
                    <img src="webroot/img/Personnages/Mage/MageFTemporaire.png" class="img-responsive" style="width:100%" alt="Image Mage"> 
                </div>
            </div>
            <div class='row'>
                <div id="Combattant" class="col-sm-6"> 
                    <h4>Combattant</h4> 
                    <img src="webroot/img/Personnages/Combattant/iop.png" class="img-responsive" style="width:100%" alt="Image Combattant">
                </div>

                <div class="col-sm-6" >
                    <br><br><br><br><br><br><h4>Les Combattants de WebArena</h4><br>
                    <p>Force et agilité sont les deux mots qui décrivent le mieux les combattant de WebArena. Après avoir reçu une formation de combattant, les desciples apprennent à se servir de leur tête. Il évolue ainsi dans un monde où la stratégie devient indispensable pour survivre. </p>
                    <p>Les combattant de WebArena sont très respectés par la communauté. Leur bravour est comptée jusqu'à l'ECE Paris. Si vous en croisez un n'hésitez pas de lui demander un autographe. Leur dictons est chanté dans toutes les écoles d'ingénieur d'ile de France : "Un combat, une histoire, une bonne bière". </p>
                </div>
            </div>
        </div>
    </div><br>
</div>
</div>
</div>


