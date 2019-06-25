<?php $projectName = 'eSpot';
  $userRole=$this->viewVars['userRole'];
?>
<!DOCTYPE html>
<html>
  <head>
      <?= $this->Html->charset() ?>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>
           <?= $projectName ?>:
           <?= $this->fetch('title') ?>
      </title>
      <?= $this->Html->meta('icon') ?>
      <?= $this->Html->css('bootstrap.css') ?>
      <?= $this->Html->script('bootstrap.js') ?>
      <?= $this->fetch('meta') ?>
      <?= $this->fetch('css') ?>
      <?= $this->fetch('script') ?>
  </head>
  <body class="bg-secondary">

      <?php
        if(trim($userRole)=="AD"){
          echo $this->element("Navbar/admin");
        }else{
          echo $this->element("Navbar/general");
        }
      ?>
      <?= $this->Flash->render() ?>
      <div class="container clearfix">
          <?= $this->fetch('content') ?>
      </div>
  </body>
</html>
