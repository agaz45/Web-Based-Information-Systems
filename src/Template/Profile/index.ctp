<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');?>
<?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');?>
<?php echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');?>
<head>
<style>

  .container {
   width: 90%;
   float: left;
  }

  h1.page-header {
    border-width: 5px;
    border-color: darkgrey;
    width: 90%;
  }

  h2 {
    text-decoration: underline;
    font-weight: bold;
  }
  
</style>
</head>

<h1 class="page-header">Profile Page</h1>

<div class="container">

<?php if(substr($userRole,0,2) == "AD") : ?>

<h2>Account Info for <?php echo $usernameString; ?></h2>
<table class="table table-dark" style="width:30%">
<?php
        foreach ($userInfo as $usr):
           echo "
           		<thead>
           			<th>Username</th>
           			<th>Role</th>
           		</thead>
           		<tbody>
                   <td>$usr->username</td>
                   <td>$usr->role</td>
                 <tbody>";
        endforeach;
	?>
</table>
<br>

<?php else : ?>

<!-- Maybe change these to a tags with list-group-item-action?
Note: Will not display as dark at the moment, maybe return to this later
-->
<h2>Following</h2>
<table class="table table-dark" style="width:30%">
  <thead>
    <th>Teams</th>
  </thead>
  <tbody>
<?php
    foreach ($followedTeams as $test):
      $teams = explode(",", $test->followed_team);
      foreach ($teams as $team):
       echo "<tr><td><a href=\"teams?team-name=".$team."\">".$team."</a></td></tr>";
      endforeach;
     endforeach;
  ?>
  </tbody>
</table>

<table class="table table-dark" style="width:30%;">
  <thead>
    <th>Players</th>
  </thead>
  <tbody>
<?php
    foreach ($followedPlayers as $test):
      $players = explode(",", $test->followed_player);
      foreach ($players as $player):
       echo "<tr><td><a href=\"/players?player_id=".$player."\">".$player."</a></td></tr>";
      endforeach;
     endforeach;
  ?>
  </tbody>
</table>
<br>

<h2>Billing Info</h2>
<table class="table table-dark">
<?php
        foreach($generalUserInfo as $user):
        	echo "
           		<thead>
           			<th>Full Name</th>
				<th>Account Balance</th>
           			<th>Location</th>
           			<th>Address</th>
           		</thead>
           		<tbody>
                   <td>$user->name</td>
		   <td>$user->balance</td>
                   <td>$user->location</td>
                   <td>$user->address</td>
                 <tbody>";
   
        endforeach;    	
	?>
</table>
<br>

<h2>Betting History</h2>
<h3>Upcoming Matches</h3>
<table class="table table-dark">
  <thead>
      <th>Bet Date</th>
      <th>Amount</th>
      <th>Team Choice</th>
      <th>Start Time</th>
      <th>Team 1</th>
      <th>Team 2</th>
  </thead>
      <?php
        foreach ($currentBets as $cur):
           echo "
             <tbody>
               <td>{$cur->date}</td>
               <td>{$cur->amount}</td>
               <td>{$cur->team_choice}</td>
               <td>{$cur->start_time}</td>
               <td>{$cur->team1}</td>
               <td>{$cur->team2}</td>
             <tbody>";
        endforeach;
    ?>
</table>

<h3>Past Matches</h3>
<table class="table table-dark">
  <thead>
      <<th>Bet Date</th>
      <th>Amount</th>
      <th>Team Choice</th>
      <th>Start Time</th>
      <th>Team 1</th>
      <th>Team 2</th>
      <th>Winner</th>
  </thead>
      <?php
        foreach ($pastBets as $cur):
           echo "
             <tbody>
               <td>{$cur->date}</td>
               <td>{$cur->amount}</td>
               <td>{$cur->team_choice}</td>
               <td>{$cur->start_time}</td>
               <td>{$cur->team1}</td>
               <td>{$cur->team2}</td>
               <td>{$cur->winner}</td>
             <tbody>";
        endforeach;
     ?>
    </table>
   <br>

 <?php endif; ?>

</div>
