<?php

namespace App\Controller;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

class BettingController extends AppController{
    public function index(){
        $userId = $this->Auth->user('username');
        $users = TableRegistry::get('users_general');
        $user = $users->get($userId);

        if ((isset($_GET['id'])) && (isset($_GET['team']))):
            $matchInfo = $this->getIndividualMatch($_GET['id']);
            $this->setIndividualMatchInfo($matchInfo, $user);
        else:
            $upcomingMatches = $this->getUpcomingMatches();
            $completedMatches = $this->getCompletedMatches();
            $this->setAllMatchInfo($upcomingMatches, $completedMatches, $user);
        endif;
    }

    public function createBet(){
        $amount = $this->request->getData('amount');
        $team = $this->request->getData('team');
        $id = $this->request->getData('id');

        if ($amount > 0):
            $this->createBets($amount, $team, $id);
        else:
            $this->Flash->error("You can't bet a negative amount...");
        endif;
	$this->setAction('index');
    }

    public function stripe(){
        \Stripe\Stripe::setApiKey("sk_test_0vvhr7sDo6Eac5bafbNZP8Ws");
        $userId = $this->Auth->user('username');
        $users = TableRegistry::get('users_general');
        $user = $users->get($userId);

        if (($_POST['stripeToken']) && ($_POST['amount']) && ($_POST['amount'] > 0)):
            $charge = \Stripe\Charge::create([
                'amount' => $_POST['amount'] * 100,
                'currency' => 'cad',
                'description' => 'Add money to acount',
                'source' => $_POST['stripeToken'],
            ]);
            
            $user->balance = $user->balance + $_POST['amount'];
            $users->save($user);
            // TODO, (if we have time, create a record in the database of the transaction)
        else: 
            $this->Flash->error("Failed to add amount {$_POST['amount']} to account");
        endif;
        $this->setAction('index');
    }

    private function getUpcomingMatches(){
        $matches = TableRegistry::get('matches');
	$query = $matches->find();
        $matchesQuery = $query->select(['match_id', 'start_time', 'team1', 'payout1', 'team2', 'payout2'])->where(['start_time >' => date('y-m-d h-i-s')]);
        return $matchesQuery;
    }
    private function getCompletedMatches(){
        $matches = TableRegistry::get('matches');
	$query = $matches->find();
        $matchesQuery = $query->select(['match_id', 'start_time', 'team1', 'payout1', 'team2', 'payout2', 'result'])->where(['start_time <' => date('y-m-d h-i-s')]);
        return $matchesQuery;
    }

    private function getIndividualMatch($matchId){
        $matches = TableRegistry::get('matches');
        $match = $matches->get($matchId);
        return $match;
    }

    private function setIndividualMatchInfo($matchInfo, $user){
	$this->set('matchInfo', $matchInfo);
        $this->set('balance', $user->balance);
    }

    private function setAllMatchInfo($upcomingMatches, $completedMatches, $user){
	$this->set('upcomingMatches', $upcomingMatches);
        $this->set('completedMatches', $completedMatches);
        $this->set('balance', $user->balance);
    }

	
    private function createBets($amount, $team, $match){
        $userId = $this->Auth->user('username');
        $users = TableRegistry::get('users_general');
        $user = $users->get($userId);
        $balance = $user->balance;
        
        if ($balance >= $amount):
            $transactionsTable = TableRegistry::get('transactions');
            $transaction = $transactionsTable->newEntity();
	    $transaction->datetime = date('y-m-d h-i-s');
            $transaction->amount = $amount;
            $transactionsTable->save($transaction);

            $user->balance = $user->balance - $amount;
            $users->save($user);

            $betsTable = TableRegistry::get('bets');
            $bet = $betsTable->newEntity();
            $bet->user_id = $userId;
            $bet->match_id = $match;
            $bet->transaction_id = $transaction->transaction_id;
            $bet->team_choice = $team;
            $betsTable->save($bet);

            $this->Flash->success("You have successfully created a bet of $ $amount, on team: $team");
        else:
             $this->Flash->error("You have Insufficient funds...");
        endif;
    }
}
?>
