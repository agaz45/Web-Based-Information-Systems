<?php
  if (empty($_GET)):
    include 'player_table.ctp';
  else:
    $player = $playerInfo->first();
    $playerStats = $player_stats->first();
    if ( trim($player->game) === 'Overwatch'):
        include 'overwatch_individual_player.ctp';
     else:
        include 'dota_player_individual_player.ctp';
    endif;
  endif;
?>
