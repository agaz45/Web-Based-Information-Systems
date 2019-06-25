<main role="main" class="container">
  <?php echo $this->element('game_news'); ?>
  <div class="row">
    <div class="col-md-8 blog-main">
      <div class="col-lg-12 bg-dark text-light" id="upcoming-header" style="margin-top:10px;">
        <h3>Upcoming Matches<h3>
      </div>
      <table class="table table-striped table-dark table-hover">
        <thead>
          <tr>
            <th scope="col">Team 1</th>
            <th scope="col">Team 2</th>
            <th scope="col">Time</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($upcomingMatches as $match):
               echo '
               		<tbody>
                        <td>' . $this->Html->link($match["team1"],
                          ['controller' => 'Teams', 'action' => '/?team-name=' . $match["team1"]. ''], ['class' => 'title-link']
                        ) . '</td>
                        <td>' . $this->Html->link($match["team2"],
                          ['controller' => 'Teams', 'action' => '/?team-name=' . $match["team2"]. ''], ['class' => 'title-link']
                        ) . '</td>
                        <td>' . $match["start_time"] . '</td>
                     <tbody>';
            endforeach;
        ?>
        </tbody>
      </table>
    </div>
    <aside class="col-md-4 blog-sidebar">
      <div class="p-3">
        <div class="col-lg-12 bg-dark text-light" id="past-header">
          <h3>Past Matches<h3>
        </div>
        <table class="table table-striped table-dark table-hover">
          <thead>
            <tr>
              <th scope="col">Team 1</th>
              <th scope="col">Team 2</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($pastMatches as $match):
                $team1 = ($match["result"] == $match["team1"]) ? "title-link" : "title-link-unbold";
                $team2 = ($match["result"] == $match["team2"]) ? "title-link" : "title-link-unbold";
                 echo '
                 		<tbody>
                         <td>' . $this->Html->link($match["team1"],
                           ['controller' => 'Teams', 'action' => '/?team-name=' . $match["team1"]. ''],
                           ['class' => $team1]
                         ) . '</td>
                         <td>' . $this->Html->link($match["team2"],
                           ['controller' => 'Teams', 'action' => '/?team-name=' . $match["team2"]. ''],
                           ['class' => $team2]
                         ) . '</td>
                       <tbody>';
              endforeach;
          ?>
          </tbody>
        </table>
        <?php echo $this->element('twitter_timeline', [
          "user" => "DOTA2"
        ]);?>

      </div>
    </aside>
  </div>
</main>
