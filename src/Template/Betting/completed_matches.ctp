<h2>Past Matches</h2>
<table class="table table-striped table-dark table-hover">
 <thead>
  <tr>
    <?php
        foreach ($tableHeaders as $name => $num) {
          echo "<th scope='col' colspan='$num'>$name</th>";
        }
        ?>
        <th scope="col" colspan="2">Winner</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($completedMatches as $match):
          echo
            "<tr>
            <td scope='row' colspan='3'>$match->start_time</td>
            <td colspan='2'>",
            $this->Html->link($match->team1,
              array('controller' => 'Teams',
              'action' => "/?team-name=$match->team1")),
            "</td>
            <td colspan='1'>$match->payout1</td>
            <td colspan='1'>Vs</td>
            <td colspan='1'>$match->payout2</td>
            <td colspan='2'>",
            $this->Html->link($match->team2,
              array('controller' => 'Teams',
              'action' => "/?team-name=$match->team2")),
            "</td>
            <td colspan='2'>",
            $this->Html->link($match->result,
              array('controller' => 'Teams',
              'action' => "/?team-name=$match->result")),
            "</td>
            </tr>";
        endforeach;
      ?>
    </tbody>
  </table>
</div>
