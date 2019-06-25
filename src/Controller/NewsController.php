<?php

namespace App\Controller;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\Http\Client;

use Cake\Datasource\ConnectionManager;


class NewsController extends AppController{
    function index() {
      $this->setNewsResponse();
      $this->twitterStuff();

      $userId = $this->Auth->user('username');
      $this->setUpcomingMatchQuery();
      $this->setPastMatchQuery();
    }

    private function twitterStuff() {
      $accessToken = 'Bearer ' . $this->getTwitterAccessToken();
      $this->set('token', $accessToken);
      $http = new Client();
      $response = $http->get('https://api.twitter.com/1.1/search/tweets.json', [
        'q' => 'from:neko OR from:DOTA2'
      ], [
        'headers' => [
          'Authorization' => $accessToken
        ]
      ]);
      $this->set('tweets', $response->json);
    }

    private function getTwitterAccessToken() {
      $authString = $this->getTwitterAuthString();
      $http = new Client();
      $response = $http->post('https://api.twitter.com/oauth2/token', [
        'grant_type' => 'client_credentials'
      ], [
        'headers' => [
          'Authorization' => $authString,
          'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
        ]
      ]);
      if ($response->json['token_type'] == "bearer") {
        return $response->json['access_token'];
      } else {
        $this->log("Could not authenticate with twitter API", 'debug');
      }
    }

    private function getTwitterAuthString() {
      $keySecret = "Cbl8tAvM6Hnor9tWnWHXK0fiD:4usSmcBJofzJODE9olVdlIOwlW9MLpCbsNbGag95TwTG40dgk8";
      $base64KeySecret = base64_encode($keySecret);
      return 'Basic ' . $base64KeySecret;
    }

    private function setNewsResponse() {
      $http = new Client();
      $week = date_sub(date_create(), date_interval_create_from_date_string("7 days"));
      $response = $http->get('https://newsapi.org/v2/everything', [
        'q' => '\"DOTA\" OR \"Overwatch\"',
        'sortBy' => 'relevancy',
        'from' => $week,
        'pageSize' => '3',
        'page' => '1',
        'apiKey' => '74390f6631f948f39d6778c1252d552e']);
      $this->set('newsResponse',$response->json);
    }

    private function setUpcomingMatchQuery() {
      $matches = TableRegistry::get('matches');
      $followedTeams = $this->getFollowedTeams();

      $connection = ConnectionManager::get('default');
      $results = $connection->execute(
        'SELECT matches.team1, matches.team2, matches.start_time
        FROM matches
        WHERE (start_time > (NOW())
        AND (team1 in (' . $followedTeams . ')
          OR team2 in (' . $followedTeams . ')))
        ORDER BY start_time DESC;')->fetchAll('assoc');
      $this->set('upcomingMatches', $results);
    }

    private function setPastMatchQuery() {
      $matches = TableRegistry::get('matches');
      $followedTeams = $this->getFollowedTeams();

      $connection = ConnectionManager::get('default');
      $results = $connection->execute(
        'SELECT matches.team1, matches.team2, matches.result
        FROM matches
        WHERE (start_time < (NOW())
        AND (team1 in (' . $followedTeams . ')
          OR team2 in (' . $followedTeams . ')))
        ORDER BY start_time DESC;')->fetchAll('assoc');
      $this->set('pastMatches', $results);
    }

    private function getFollowedTeams(){
      $users = TableRegistry::get('users_general');
      $userId = $this->Auth->user('username');
      $followedTeamsQuery = $users->find()
          ->select(['followed_team'])
          ->where(['user_id' => $userId]);

      foreach ($followedTeamsQuery as $query):
          $followedTeams = $query->followed_team;
      endforeach;
      $teamArray = array();
      $teams = explode(",", $followedTeams);
      foreach ($teams as $team):
        array_push($teamArray, $team);
      endforeach;
      $teamArray = array_map(function($t) {return "\"" . $t . "\"";}, $teamArray);
      return implode(",", $teamArray);
    }
}
?>
