<?php 
  echo "<h1> Current Balance: $  $balance</h1>";
  include 'stripe.ctp';
  if ((isset($_GET['id'])) && (isset($_GET['team']))):
    include 'bet_form.ctp';
  else:
    include 'matches_table.ctp'; 
  endif;
?>

