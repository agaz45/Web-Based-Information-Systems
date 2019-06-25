<?php
 echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
 echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
 echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
 echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
?>

<style>
h1 { font-weight: bolder;}
h3 { font-weight: bolder; }
p { text-decoration:underline; }
a { color:black; }

.mediaBar {
  background-color:lightgrey;
  width:60%;
  padding:3px;
  border-radius:25px;
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

<?php
 $hero_list = explode(',',$playerStats->hero_list);
 $percent_win = explode(',',$playerStats->hero_win_percent);
 $hero_stats = $playerStats->hero_win_percent;
 $hero_percent_played = array_combine($hero_list, $percent_win);

?>
<div class="mediaBar" style="height:50px;">

  <?php echo "<h1 style=\"float:left; margin:2px;\">".$player->player_id."</h1>"; ?>

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
<br>


<article>

  <div class="col-md-2 com-lg-2">
    <h3>Stats</h3>
    <div class='card text-white bg-dark mb-3' style='max-width: 12rem';>
          <div class='card-header text-center ' >Lane</div>
          <h4 class='card-title text-center'><?php echo $playerStats->lane; ?></h4>
    </div>

    <div class='card text-white bg-dark mb-3' style='max-width: 12rem';>
          <div class='card-header text-center ' >Overall Win %</div>
          <h4 class='card-title text-center'><?php echo $playerStats->win_percent_general; ?></h4>
    </div>

    <div class='card text-white bg-dark mb-3' style='max-width: 12rem';>
          <div class='card-header text-center ' >KDA General</div>
          <h4 class='card-title text-center'><?php echo $playerStats->kda_general; ?></h4>
    </div>
  </div>

  <div class="col-md-5 col-lg-5">
    <h3>Hero Win Percent</h3>
  <?php
      foreach ($hero_percent_played as $hero => $percent_played) {
      echo
       "<div class='row'>
       <div class= col-lg-4 col-md-4>
       <h7>$hero</h7>
       </div>
        <div class='progress col-lg-8 col-md-8'>
        <div class='progress-bar bg-info progress-bar-striped progress-bar-animated'
        role='progressbar'
        aria-valuemin='0'
        aria-valuemax='100'
        style='width: $percent_played%'></div>
        </div>
       </div>";
     }
  ?>

  </article>

  <aside class="col-md-4 blog-sidebar float-right">
    <div class="p-3">
      <?php echo $this->element('twitter_timeline', [
        "user" => "$player->player_id"
      ]);
      ?>

    </div>
  </aside>
