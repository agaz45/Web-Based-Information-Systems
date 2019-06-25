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
   table {
    background-color: white;
    padding: 5px;
    width: 60%;
    border-style: solid;
    border-color: darkgrey;
    border-width: 3px;
  }
</style>
</head>

<?php if(substr($userRole,0,2) == "AD") : ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="list-group" style="list-style:none; width:20%;">
        <li class="list-group-item"><?= __('Actions') ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('Edit Player'), ['action' => 'edit', $player->player_id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Player'), ['action' => 'delete', $player->player_id], ['confirm' => __('Are you sure you want to delete # {0}?', $player->player_id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'panel']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
    </ul>
</nav>

<h1 class="page-header" style="width:60%;">View Info for <?php echo $player->player_id; ?></h1>

<div class="players view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Player') ?></th>
            <td><?= h($player->player_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= h($player->game) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Player Name') ?></th>
            <td><?= h($player->player_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team Name') ?></th>
            <td><?= h($player->team_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($player->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($player->role) ?></td>
        </tr>
    </table>
</div>

<?php else : ?>
    <div align="center">
        <p>You do not have access to this page</p>
        <p>Nice try, Hackerman</p>
        <img src="https://i.imgur.com/GVJ06OK.jpg" width="576" height="324" /> 
        <p><cite>&copy 2014, Kung Fury</cite></p>
    <div>
<?php endif; ?>