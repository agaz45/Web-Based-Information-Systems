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
</style>
</head>

<?php if(substr($userRole,0,2) == "AD") : ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="list-group" style="list-style:none; width:20%;">
        <li class="list-group-item"><?= __('Actions') ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('New Player'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<h1 class="page-header" style="width:60%;">List of Players</h1>

<div class="players index large-9 medium-8 columns content">
    <table class="table table-dark cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('player_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game') ?></th>
                <th scope="col"><?= $this->Paginator->sort('player_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($players as $player): ?>
            <tr>
                <td><?= h($player->player_id) ?></td>
                <td><?= h($player->game) ?></td>
                <td><?= h($player->player_name) ?></td>
                <td><?= h($player->team_name) ?></td>
                <td><?= h($player->location) ?></td>
                <td><?= h($player->role) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $player->player_id]) ?>
                    <?php echo "---"; ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $player->player_id]) ?>
                    <?php echo "---"; ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $player->player_id], ['confirm' => __('Are you sure you want to delete # {0}?', $player->player_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
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