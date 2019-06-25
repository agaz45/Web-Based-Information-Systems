<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');?>
<?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');?>
<?php echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<head>
<style>
  .container {
   width: 90%;
   float: left; 
  }
  h1.page-header {
    border-width: 5px;
    border-color: darkgrey;
  }
  th {
    padding:10px;
  }
  form {
    background-color: white;
    padding: 5px;
    width: 60%;
    border-style: solid;
    border-color: darkgrey;
    border-width: 3px;
  }
  label {
    display: inline-block;
    width: 100px;
    text-align:left;
  }
</style>
</head>

<?php if(substr($userRole,0,2) == "AD") : ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="list-group" style="list-style:none; width:20%;">
        <li class="list-group-item"><?= __('Actions') ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Teams'), ['action' => 'panel']) ?></li>
    </ul>
</nav>

<h1 class="page-header" style="width:60%;">Add New Team</h1>

<div class="teams form large-9 medium-8 columns content">
    <?= $this->Form->create($team) ?>
    <fieldset>
        <?php
            echo $this->Form->control('team_name', ['type' => 'text']);
            echo "<br>";
            echo "<label style=\"font-weight:bold;\">Game</label>";
            echo $this->Form->select('game', ['Overwatch' => 'Overwatch', 'DOTA2' => 'DOTA2']);
            echo "<br><br>";
            echo $this->Form->control('division');
            echo "<br>";
            echo $this->Form->control('location');
            echo "<br>";
            echo $this->Form->control('win');
            echo "<br>";
            echo $this->Form->control('lose');
            echo "<br>";
            echo $this->Form->control('tie');
            echo "<br>";
            echo $this->Form->control('world_rank');
            echo "<br>";
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<br><br>

<?php else : ?>
    <div align="center">
        <p>You do not have access to this page</p>
        <p>Nice try, Hackerman</p>
        <img src="https://i.imgur.com/GVJ06OK.jpg" width="576" height="324" /> 
        <p><cite>&copy 2014, Kung Fury</cite></p>
    <div>
<?php endif; ?>