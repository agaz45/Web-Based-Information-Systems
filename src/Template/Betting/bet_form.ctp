<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');?>
<?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');?>
<?php echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');?>

<div class="container" style="border-style:solid;">
  <h2>Bet Amount</h2>
  <?php
    echo $this->Form->create(null, ['url' => ['controller' => 'Betting', 'action' => 'createBet']]);
    echo $this->Form->control('amount', ['type' => 'number', 'step' => '0.01']);
    echo $this->Form->hidden('id', array('value' =>$_GET['id']));
    echo $this->Form->hidden('team', array('value' =>$_GET['team']));
    echo $this->Form->submit('Submit');
  ?>
</div>
