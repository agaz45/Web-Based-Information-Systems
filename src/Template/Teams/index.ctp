<?php 
  if (empty($_GET)):
    include 'team_table.ctp'; 
  else: 
    include 'individual_team.ctp';
  endif;
?>
