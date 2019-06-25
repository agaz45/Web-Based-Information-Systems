<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');?>
<?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');?>
<?php echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match[]|\Cake\Collection\CollectionInterface $matches
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

<nav class="large-3 medium-4 columns" id="actions-sidebar" style="border-width: 5px; border-color: darkgrey;">
    <ul class="list-group" style="list-style:none; width:20%;">
        <li class="list-group-item"><?= __('Admin Actions') ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('New Match'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<h1 class="page-header" style="width:60%;">Matches Admin Panel</h1>

<div class="users index large-9 medium-8 columns content">
    <table class="table table-dark" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('match_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('result') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payout1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payout2') ?></th>
                <th scope="col"><?= __('') ?></th>
                <th scope="col"><?= __('') ?></th>
                <th scope="col"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matches as $match): ?>
            <tr>
                <td><?= $this->Number->format($match->match_id) ?></td>
                <td><?= h($match->start_time) ?></td>
                <td><?= h($match->end_time) ?></td>
                <td><?= h($match->team1) ?></td>
                <td><?= h($match->team2) ?></td>
                <td><?= h($match->result) ?></td>
                <td><?= $this->Number->format($match->payout1) ?></td>
                <td><?= $this->Number->format($match->payout2) ?></td>
                <td><?= $this->Html->link(__('View'), ['action' => 'view', $match->match_id]) ?></td>
                <td><?= $this->Html->link(__('Edit'), ['action' => 'edit', $match->match_id]) ?></td>
                <td><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $match->match_id], ['confirm' => __('Are you sure you want to delete # {0}?', $match->match_id)]) ?></td>
                
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