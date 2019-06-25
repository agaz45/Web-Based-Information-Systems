<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');?>
<?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');?>
<?php echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match $match
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

<nav class="large-3 medium-4 columns" id="actions-sidebar" style="border-width: 5px; border-color: darkgrey;">
    <ul class="list-group" style="list-style:none; width:20%;">
        <li class="list-group-item"><?= __('Admin Actions') ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('Edit Match'), ['action' => 'edit', $match->match_id]) ?> </li>
        <li class="list-group-item"><?= $this->Form->postLink(__('Delete Match'), ['action' => 'delete', $match->match_id], ['confirm' => __('Are you sure you want to delete # {0}?', $match->match_id)]) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?> </li>
        <li class="list-group-item"><?= $this->Html->link(__('New Match'), ['action' => 'add']) ?> </li>
    </ul>
</nav>

<h1 class="page-header" style="width:60%;">Match Info <?php echo "<br>ID: (".$match->match_id; ?>)</h1>

<div class="matches view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Team1') ?></th>
            <td><?= h($match->team1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team2') ?></th>
            <td><?= h($match->team2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Result') ?></th>
            <td><?= h($match->result) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Match Id') ?></th>
            <td><?= $this->Number->format($match->match_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payout1') ?></th>
            <td><?= $this->Number->format($match->payout1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payout2') ?></th>
            <td><?= $this->Number->format($match->payout2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= h($match->start_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Time') ?></th>
            <td><?= h($match->end_time) ?></td>
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