<?php

namespace App\Controller;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;


//TODO: Get extra user info on the page as well
//Style it properly
class ProfileController extends AppController{
    public function index(){
    	 $userId = $this->Auth->user('username');
        $userInfo = $this->getAccountInfo($userId);
        $generalUserInfo = $this->getGeneralUserInfo($userId);
        $betQuery = $this->getBetQuery($userId);

        //TODO: Change how values are grabbed from queries, avoid loops in view
        	  //Add Transaction data to bets section
        	  //Change how tables display (not just all one colour)
        $this->setAccountInfo($userInfo);
        $this->setGeneralAccountInfo($generalUserInfo);
        $this->setMatchesQuery($betQuery);
        $this->setFollowedTeams($userId);
        $this->setFollowedPlayers($userId);
        $this->set('usernameString', $userId); //for now, remove later
        $this->set('userRole', $this->Auth->user('role'));
  
    }

    private function getAccountInfo($userId) {
        $accounts = TableRegistry::get('users');

        $query = $accounts->find();
        $matchQuery = $query->select(['username','role'])->where(['username' => $userId]);
        return $matchQuery;
    }

    private function getGeneralUserInfo($userId){
    	$accounts = TableRegistry::get('users_general');

        $query = $accounts->find();
        $generalInfoQuery = $query->select(['balance','followed_player','followed_team', 'name', 'location', 'address'])->where(['user_id' => $userId]);
        return $generalInfoQuery;
    }

    private function setAccountInfo($userInfo) {
     $this->set('userInfo', $userInfo);
    }

    private function setGeneralAccountInfo($generalUserInfo) {
     $this->set('generalUserInfo', $generalUserInfo);
    }

    private function getBetQuery($userId) {
      $bets = TableRegistry::get('bets');
      return $bets->find()
          ->select(['match_id', 'transaction_id', 'team_choice'])
          ->where(['user_id' => $userId]);
    }

    private function setMatchesQuery($betQuery) {
      $matches = TableRegistry::get('matches');
      $transactions = TableRegistry::get('transactions');
      $currentbets= [];
      $pastbets = [];
      foreach($betQuery as $bet):
        $matchId = $bet->match_id;
        $match = $matches->get($matchId);

        $transactionId = $bet->transaction_id;
        $query = $transactions->find();
        $transaction = $query->select(['datetime', 'amount'])->where(['transaction_id' => $transactionId]);

        // the get function was malfunctioning with transaction_id 
        //so i manually have to do this instead
        foreach ($transaction as $tran):
          $trans = $tran;
        endforeach;

        $fill = (object)[
          'start_time' => $match->start_time,
          'team1' => $match->team1,
          'team2' => $match->team2,
          'date' => $trans->datetime,
          'amount' => $trans->amount,
          'team_choice' =>$bet->team_choice
        ];

        if ($match->start_time < date('y-m-d h-i-s')):
          $currentbets[] = $fill;
        else:
          $fill->winner = $match->result;
          $pastbets[] = $fill;
        endif;
      endforeach;

      $this->set('currentBets', $currentbets);
      $this->set('pastBets', $pastbets);
    }

    private function setPastMatchQuery($betQuery) {
      $matches = TableRegistry::get('matches');
      $query = $matches->find();
      $matchQuery = $query->select(['team1','team2','result'])
          ->order(['start_time' => 'DESC'])
          ->where(['start_time <' => $query->func()->now()])
          ->where(['match_id IN' => $betQuery]);
      $this->set('pastMatches', $matchQuery);
    }

    private function setFollowedTeams($userId) {
      $users = TableRegistry::get('users_general');
      $usersQuery = $users->find()
          ->select(['user_id', 'followed_team'])
          ->where(['user_id' => $userId]);
      $this->set('followedTeams', $usersQuery);
    }

    private function setFollowedPlayers($userId) {
      $users = TableRegistry::get('users_general');
      $usersQuery = $users->find()
          ->select(['user_id', 'followed_player'])
          ->where(['user_id' => $userId]);
      $this->set('followedPlayers', $usersQuery);
    }
}
?>
