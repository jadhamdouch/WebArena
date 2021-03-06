
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
   <?php echo $this->Html->meta ( 'favicon.ico', '/img/icon.ico', array (
    'type' => 'icon' 
) );?>


    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('webarena.css') ?>
 
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    
    <nav class="navbar navbar-inverse menuCol">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <?php echo $this->Html->image('logo.png',array('class'=>'navbar-brand'));?>
    </div>
    <div class="collapse navbar-collapse "  data-spy="affix" data-offset-top="1">
      <ul class="nav navbar-nav ">
        <li><?php echo $this->Html->link('Index', array('class'=>"color-me",'controller' => 'Arenas', 'action' => '/')); ?></li>
                <li><?php echo $this->Html->link('Vision', array('controller' => 'Arenas', 'action' => 'sight')); ?></li>
                <li><?php echo $this->Html->link('Combattant', array('controller' => 'Arenas', 'action' => 'fighter')); ?></li>
                <li><?php echo $this->Html->link('Journal', array('controller' => 'Arenas', 'action' => 'diary')); ?></li>
                <li><?php echo $this->Html->link('Equipement', array('controller' => 'Arenas', 'action' => 'Equipement')); ?></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li> <?php echo $this->Html->link($this->Html->tag('span',' Login',array('class'=>'glyphicon glyphicon-log-in')), array('controller' => 'Arenas', 'action' => 'login'),array('escape'=>false)); ?></li>
        <li> <?php echo $this->Html->link($this->Html->tag('span',' Logout',array('class'=>'glyphicon glyphicon-log-out')), array('controller' => 'Arenas', 'action' => 'logout'),array('escape'=>false)); ?></li>
      </ul>
    </div>
  </div>
</nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
<footer class="container-fluid text-center ">
  <p>Tags: 
    <a href="#"><span class="label label-info">GitHub Log</span></a> 
	| <i class="icon-user"></i> <a href="#">SI2-G08-AF</a> 
	| <i class="icon-calendar"></i> Jad Hamdouch | Ismael Bouarfa | Ruben Bellaïche | Luc Bourretere 
 	
</p>
</footer>
</body>
</html>
