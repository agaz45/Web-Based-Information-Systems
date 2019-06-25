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

<br>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="list-group" style="list-style:none; width:20%;">
        <li class="list-group-item"><?= __('Actions') ?></li>
        <li class="list-group-item"><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->username],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->username)]
            )
        ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>

<h1 class="page-header">Edit User Info</h1>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create('User', array('action' => 'editpass/'.$user->username)) ?>
    <fieldset>
        <?php
            echo $this->Form->index('password', array('autocomplete' => 'off'));
            echo "<br><br>";
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php else : ?>
    <div align="center">
        <p>You do not have access to this page</p>
        <p>Nice try, Hackerman</p>
        <p><cite>&copy 2014, Kung Fury</cite></p>
    <div>
<?php endif; ?>