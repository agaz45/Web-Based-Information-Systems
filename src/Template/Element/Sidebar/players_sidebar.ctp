<?php
 echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
 echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
 echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
?>

<?php
  $existinGames= array("Overwatch","Dota2")
?>
<div class="sidenav col-lg-2">
  <nav class="navbar bg-dark nav-stacked navbar-dark navbar-fixed-side">
    <li class='active navbar-brand' style='float: left; link-color: white !important; font-size: medium !important;'>
       <?php
         echo
           $this->Html->link( 'All',
           array('action' => '/'));
       ?>
    </li>
    <?php
    foreach ($existinGames as $game) {
        echo
        "<li class='active navbar-brand'
           style='font-size: medium !important; font-color: white !important;'>",
             $this->Html->link($game,"/players/game/$game"),
        "</li>";
      }
    ?>

  </nav>
</div>
