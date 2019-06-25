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
        <li class="list-group-item"><?= $this->Html->link(__('Edit Team'), ['action' => 'edit', $team->team_name]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Team'), ['action' => 'delete', $team->team_name], ['confirm' => __('Are you sure you want to delete # {0}?', $team->team_name)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Teams'), ['action' => 'panel']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Team'), ['action' => 'add']) ?> </li>
    </ul>
</nav>

<h1 class="page-header" style="width:60%;">Team Info <?php echo "<br>(".$team->team_name; ?>)</h1>

<div class="teams view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= h($team->game) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Division') ?></th>
            <td><?= h($team->division) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($team->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Win') ?></th>
            <td><?= $this->Number->format($team->win) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lose') ?></th>
            <td><?= $this->Number->format($team->lose) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tie') ?></th>
            <td><?= $this->Number->format($team->tie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('World Rank') ?></th>
            <td><?= $this->Number->format($team->world_rank) ?></td>
        </tr>
    </table>
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