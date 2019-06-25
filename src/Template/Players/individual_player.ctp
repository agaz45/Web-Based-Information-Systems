<?php
 echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
 echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
 echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
?>

<div class="container">
  <div class="col-md-8 blog-main">
    <table class="table table-hover">
       <thead>
        <tr>
          <th scope="col">In Game Name</th>
          <th scope="col">Game Played</th>
          <th scope="col">Player Name</th>
          <th scope="col">Team Name</th>
          <th scope="col">Location</th>
          <th scope="col">Role</th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach ($playerInfo as $player):
          echo
            "<tr>
              <td scope='row'>$player->player_id</td>
              <td scope='row'>$player->game</td>
              <td scope='row'>$player->player_name</td>
              <td scope='row'>$player->team_name</td>
              <td scope='row'>$player->location</td>
              <td scope='row'>$player->role</td>
            </tr>";
        endforeach;
      ?>
      </tbody>
    </table>
  </div>
  <aside class="col-md-4 blog-sidebar">
    <div class="p-3">
      <?php echo $this->element('twitter_timeline', [
        "user" => "$player->player_id"
      ]);?>

    </div>
  </aside>
</div>
