<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');?>
<?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');?>
<?php echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');?>

<!-- Causes issues with Following, if we run out of time this will stay out of the final project
<div class="container-fluid">
  <?php echo $this->element("Sidebar/teams_sidebar"); ?>
-->

  <div class="col-lg-10" align="center">
    <table class="table table-hover table-dark table-striped ">

      <thead>
      <tr>
        <th scope="col">Team Name</th>
        <th scope="col">Division</th>
        <th scope="col">Location</th>
        <th scope="col">Wins</th>
        <th scope="col">Losses</th>
        <th scope="col">Ties</th>
        <th scope="col">World Rank</th>
        <th scope="col">Game Played</th>
    </thead>
    <tbody>
    <?php
      foreach ($teamInfo as $team):
        echo
          "<tr>
            <td scope='row'>
            <a class='nav-link' style='link-color:
            white !important;'
            <td scope='row'>";
        echo
            $this->Html->link($team->team_name,
              array('action' => "/?team-name=$team->team_name"), array('class' => 'title-link'));
        echo
          "</td>
            <td scope='row'>$team->division</td>
            <td scope='row'>$team->location</td>
            <td scope='row'>$team->win</td>
            <td scope='row'>$team->lose</td>
            <td scope='row'>$team->tie</td>
            <td scope='row'>$team->world_rank</td>
            <td scope='row'>$team->game</td>
            <td scope='row'>";
              if (in_array($team->team_name, $followed)):
                echo $this->Form->postButton('Unfollow', ['controller' => 'Teams', 'action' => 'unfollowTeam'], ['data' => ['team_name' => $team->team_name], 'class'=> 'btn btn-basic btn-sm']);
              else:
                echo $this->Form->postButton('Follow', ['controller' => 'Teams', 'action' => 'followTeam'], ['data' => ['team_name' => $team->team_name], 'class'=> 'btn btn-info btn-sm']);
              endif;
              echo
            "</td>
          </tr>";
      endforeach;
    ?>
    </tbody>
  </div>
</div>
