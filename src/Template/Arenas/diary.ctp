<?php $this->assign('title', 'Diary');?>

  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 
        <table id="events" class="table table-striped">
        <thead><tr><th>Date</th><th>Evenement</th><th>[x]</th><th>[y]</th></tr></thead>
        <tbody><?php
            foreach ($events as $e){
                echo $this->Html->tableCells([
                    [$e['date'], $e['name'], $e['coordinate_x'], $e['coordinate_y']]
                ]);
            }?>
        </tbody>
    </table> 
    </div>
    <div class="col-sm-2 sidenav">
 
    </div>
  </div>
</div>