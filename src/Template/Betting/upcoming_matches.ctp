
<div class="container">
  <h2>Upcoming Matches</h2>
  <table class="table table-striped table-dark table-hover">
   <thead>
    <tr>
      <?php
      foreach ($tableHeaders as $name => $num) {
        echo "
        <th scope='col' colspan='$num'>$name</th>";
      }
      ?>
    </tr>
    </thead>
    <tbody>
  <?php
    foreach ($upcomingMatches as $match):
      echo
        "<tr>
          <td scope='row' colspan='3'>$match->start_time</td>
          <td colspan='2'>",
          $this->Html->link($match->team1,
            array('controller' => 'Teams',
            'action' => "/?team-name=$match->team1")),
          "</td>
          <td colspan='1'>
              <button
                type='button'
                onclick='location.href=\"/betting?id=$match->match_id&team=$match->team1\"'
                class='btn btn-primary'>$match->payout1</button>
          </td>
          <td colspan='1'>Vs</td>
          <td colspan='1'>
              <button
                type='button'
                onclick='location.href=\"/betting?id=$match->match_id&team=$match->team2\"'
                class='btn btn-primary'>$match->payout2</button>
          </td>
          <td colspan='2'>",
          $this->Html->link($match->team2,
            array('controller' => 'Teams',
            'action' => "/?team-name=$match->team2")),
          "</td>
          </tr>";
    endforeach;
  ?>
  </tbody>
</table>
</div>
