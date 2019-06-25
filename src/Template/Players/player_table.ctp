<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');?>
<?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');?>
<?php echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');?>

<!-- Causes issues with Following, if we run out of time this will stay out of the final project
<div class="container-fluid">
  <?php echo $this->element("Sidebar/teams_sidebar"); ?>
-->

  <div class="col-lg-10 " align="center">
    <table class="table table-hover table-dark table-striped ">
     <thead>
      <tr>
        <th scope="col">Player</th>
        <th scope="col">Team</th>
        <th scope="col">Role</th>
        <th scope="col">Name</th>
        <th scope="col">City</th>
        <th scope="col">Game</th>
    </thead>
    <tbody>

    <?php
      foreach ($playerInfo as $player):
        echo
          "<tr>
            <td scope='row'>
              <a class='title-link' style='link-color:
              white !important;'
              href='/players?player_id=$player->player_id'>$player->player_id</a>
            </td>
            <td scope='row'>";
        echo
          $this->Html->link($player->team_name,
            array('controller' => 'Teams',
            'action' => "/?team_name=$player->team_name"), array('class' => 'title-link'));
        echo
          "</td>
          <td scope='row'>$player->role</td>
          <td scope='row'>$player->player_name</td>
          <td scope='row'>$player->location</td>
          <td scope='row'>$player->game</td>
          <td scope='row'>";
            if (in_array($player->player_id, $followed)):
              echo $this->Form->postButton('Unfollow', ['controller' => 'Players', 'action' => 'unfollowPlayer'], ['data' => ['player_id' => $player->player_id], 'class'=> 'btn btn-basic btn-sm']);
            else:
              echo $this->Form->postButton('Follow', ['controller' => 'Players', 'action' => 'followPlayer'], ['data' => ['player_id' => $player->player_id], 'class'=> 'btn btn-info btn-sm']);
            endif;
            echo
          "</td>
        </tr>";
      endforeach;
    ?>
    </tbody>
</div>
</div>
