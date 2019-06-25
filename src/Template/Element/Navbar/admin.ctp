<?php
  $leftNavItems= [
    'users'=>'Users Panel',
    'matches'=>'Matches Panel',
    'players/panel'=>'Players Panel',
    'teams/panel'=>'Teams Panel'
  ];
  $loggedIn=$this->viewVars['loggedIn'];
?>
  <nav id="nav" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">eSpot</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      <?php
        foreach ($leftNavItems as $key => $value) {
          echo "
          <li class='nav-item'>
            <a class='nav-link' href='/$key'>$value</a>
          </li>"
          ;}
        ?>
    </ul>
    <ul class="navbar-nav mr-auto navbar-right">
      <li class='nav-item mr-auto navbar-right'>
        <a class='nav-link' href='/login/logout'>Logout</a>
      </li>
    </ul>
  </div>
</nav>
