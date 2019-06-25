<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');?>
<?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');?>
<?php echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');?>
<?php echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');?>

<style>
h1 { font-weight: bolder;}
h3 { font-weight: bolder; }
p { text-decoration:underline; }
a { color:black; }
th {
    padding:10px;
  }
table {
    background-color: white;
    padding: 5px;
    width: 60%;
    border-style: solid;
    border-color: darkgrey;
    border-width: 3px;
}
label {
  display: inline-block;
  width: 100px;
  text-align:left;
}
.mediaBar {
  background-color:lightgrey;
  width:60%;
  padding:6px;
  border-radius:25px;
}
.roster {
  background-color: white;
  width: 60%;
  border-style: solid;
  border-color: darkgrey;
  border-width: 3px;
}

/* from https://www.w3schools.com/howto/howto_css_social_media_buttons.asp*/
/* Style all font awesome icons */
.fa {
    padding: 8px;
    margin: 5px;
    font-size: 15px;
    width: 30px;
    text-align: center;
    text-decoration: none;
    border-radius: 50%;
}

/* Add a hover effect if you want */
.fa:hover {
    opacity: 0.9;
}

/* Set a specific color for each brand */

/* Facebook */
.fa-facebook {
    background: #3B5998;
    color: white;
}

/* Twitter */
.fa-twitch {
    background: #6441a5;
    color: white;
}

/* Facebook */
.fa-discord {
    padding:7px;
    margin:3px;
    background: #7289da;
    color: white;
}

/* Facebook */
.fa-instagram {
    background: #9b6954;
    color: white;
}

/* Youtube */
.fa-youtube {
    background: #ff0000;
    color: white;
}

</style>

<div class="mediaBar" style="height:50px;">
<?php
  $newTeamString = "";
  $formatting = explode(' ',$team->team_name);
  foreach($formatting as $word){

    $word = ucfirst($word);
    $newTeamString = $newTeamString." ".$word;

  }
  echo "<h1 style=\"float:left; margin:2px;\">".$newTeamString."</h1>"; ?>

  <?php
    foreach($mediaLinks as $link){
      if(substr($link->facebook,0,3) != "N/A"){
        echo "<a href=\"".$link->facebook."\" class=\"fa fa-facebook\"></a>";
      }
      if(substr($link->twitch,0,3) != "N/A"){
        echo "<a href=\"".$link->twitch."\" class=\"fa fa-twitch\"></a>";
      }
      if(substr($link->discord,0,3) != "N/A"){
        echo "<a href=\"".$link->discord."\">";
          echo $this->Html->image('Discord-Logo-White.svg', ['class' => 'fa fa-discord', 'style' => 'width:35px;height:35px;']);
        echo "</a>";
      }
      if(substr($link->instagram,0,3) != "N/A"){
        echo "<a href=\"".$link->instagram."\" class=\"fa fa-instagram\"></a>";
      }
      if(substr($link->youtube,0,3) != "N/A"){
        echo "<a href=\"".$link->youtube."\" class=\"fa fa-youtube\"></a>";
      }
    }
  ?>
  </div>

<aside class="col-md-4 blog-sidebar float-right">
  <div class="p-3">
    <?php
    foreach($mediaLinks as $link){
       echo $this->element('twitter_timeline', [
      "user" => "$link->twitter"
    ]);
     }
    ?>

  </div>
</aside>


<article style="float:left; width:60%;">
  <?php echo "<h3>Team Stats</h3>"; ?>
  <div class="teams view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Game') ?></th>
            <td><?= h($team->game) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Division') ?></th>
            <td><?= h($team->division) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('World Rank') ?></th>
            <td><?= h($team->world_rank) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($team->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wins') ?></th>
            <td><?= h($team->win) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Losses') ?></th>
            <td><?= h($team->lose) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ties') ?></th>
            <td><?= h($team->tie) ?></td>
        </tr>
    </table>
  </div>

<?php

$rosterIds = array();
foreach($teamRoster as $member){
  $rosterIds[] = $member->player_id;
}
  echo "<h3>Team Roster</h3>"; ?>
  <div class="roster">
     <?php foreach($rosterIds as $id){
        echo "<a class = \"title-link\" style=\"color:black; line-height:2;\" href=\"/players?player_id=".$id."\">".$id."</a><br>";
      }
    ?>
  </div>
  <br><br>
</article>
