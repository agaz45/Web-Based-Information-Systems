<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');?>
<?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');?>
<?php echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');?>

<?php
  $tableHeaders=[
    'Date'=>3,
    'Team 1'=>2,
    'Odds'=>1,
    'Vs'=>0,
    'Odds '=>1,
    'Team 2'=>2
  ];
  include 'upcoming_matches.ctp';
  include 'completed_matches.ctp';
  ?>
