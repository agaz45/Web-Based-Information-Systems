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

  th {
    padding:10px;
  }

  .outline {
    background-color: white;
    padding: 5px;
    width: 60%;
    border-style: solid;
    border-color: darkgrey;
    border-width: 3px;
    
  }

  .banner {
  	width: 800px;
    margin: 0 auto;
  }

  .login {
  	width: 400px;
    margin: 0 auto;
  }

  label {
    display: inline-block;
    width: 100px;
    text-align:left;
  }

  h1, h3, form {
  	text-align: center;
  }

</style>
</head>

<div class="outline banner">
<h1>Welcome to eSpot!</h1>
<h1>Your one stop shop for eSports information and eSports betting!</h1><br>
</div>

<br>

<div class="outline login">
<h3>Please Login</h3>
<?= $this->Form->create('userEntity'); ?>
<?= $this->Form->input('username'); ?>
<br>
<?= $this->Form->input('password'); ?>
<br>
<?= $this->Form->button('Login'); ?>
<?= $this->Form->end(); ?>
<br>
</div>
