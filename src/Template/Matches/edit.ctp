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
  p{
    padding-left: 100px;;
  }
</style>
</head>

<?php if(substr($userRole,0,2) == "AD") : ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar" style="border-width: 5px; border-color: darkgrey;">
    <ul class="list-group" style="list-style:none; width:20%;">
        <li class="list-group-item"><?= __('Admin Actions') ?></li>
        <li class="list-group-item"><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $match->match_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $match->match_id)]
            )
        ?></li>
        <li class="list-group-item"><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?></li>
    </ul>
</nav>

<h1 class="page-header" style="width:60%;">Edit Match Info</h1>

<div class="matches form large-9 medium-8 columns content">
    <?= $this->Form->create($match) ?>
    <fieldset>
        <legend><?= __('Match ID: '.h($match->match_id)) ?></legend>
        <?php
            echo $this->Form->control('start_time', ['empty' => true]);
            echo "<p>[Year:Month:Day:Hour:Minute]</p><br>";
            echo $this->Form->control('end_time', ['empty' => true]);
            echo "<p>[Year:Month:Day:Hour:Minute]</p><br>";
            echo "<label style=\"font-weight:bold;\">Team 1</label>";
            echo $this->Form->select('team1', $allTeams);
            echo "<br><br>";
            echo "<label style=\"font-weight:bold;\">Team 2</label>";
            echo $this->Form->select('team2', $allTeams);
            echo "<br><br>";
            echo "<label style=\"font-weight:bold;\">Result</label>";
            echo $this->Form->select('result', $allTeams);
            echo "<br><br>";
            echo $this->Form->control('payout1');
            echo "<br>";
            echo $this->Form->control('payout2');
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