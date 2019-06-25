<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

/**
 * Players Controller
 *
 * @property \App\Model\Table\PlayersTable $Players
 *
 * @method \App\Model\Entity\Player[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlayersController extends AppController
{

    function index(){

        if (empty($_GET)):
          $playerInfo = $this->getAllPlayerInfo();
          $this->setFollowedPlayers();

          if ($this->request->is('post')):
            $this->followPlayer($this->request->data);
          endif;

        elseif ($_GET['player_id']):

            $playerInfo = $this->getIndividualPlayerInfo($_GET['player_id']);
            $playerStats = $this->getPlayerStats($playerInfo);
            $mediaLinks = $this->getPlayerMedia($_GET['player_id']);
            $this->set('mediaLinks', $mediaLinks);

        endif;
            $this->setPlayerInfo($playerInfo);

    }

    private function setFollowedPlayers() {

      $userId = $this->Auth->user('username');
      $users = TableRegistry::get('users_general');
      $usersQuery = $users->find()
          ->select(['user_id', 'followed_player'])
          ->where(['user_id' => $userId]);
      $playerArray = array();

      foreach ($usersQuery as $query):

          $players = explode(",", $query->followed_player);
          foreach ($players as $player):

            array_push($playerArray, $player);

          endforeach;
       endforeach;

      $this->set('followed', $playerArray);
    }

    public function quaryByGame($game_name){

      $players = TableRegistry::get('players');
      $query = $players->find();

      $playerQuery = $query->select(['player_id',
        'player_name',
        'game',
        'team_name',
        'location',
        'role'
        ])-> where(['game' => $game_name]);

      return $playerQuery;
    }

    public function game($arg1){

      $gameName=func_get_args();
      $playerInfo= $this->quaryByGame($gameName[0]);

      $this->setPlayerInfo($playerInfo);
      $this->render('player_table');
    }

    private function getAllPlayerInfo(){

        $players = TableRegistry::get('players');
        $query = $players->find();
        $playerQuery = $query->select(['player_id',
        'game',
        'player_name',
        'team_name',
        'location',
        'role']);

        return $playerQuery;
    }

    private function setPlayerInfo($playerInfo){

        $this->set('playerInfo', $playerInfo);
    }

    private function getIndividualPlayerInfo($playerId){

        $players = TableRegistry::get('players');
        $query = $players->find();
        $playerQuery = $query->select(['player_id',
        'game',
        'player_name',
        'team_name',
        'location',
        'role'])->where(['player_id' => $playerId]);

        return $playerQuery;
    }

    private function getPlayerStats($playerQuery){

      $player = $playerQuery->first();
      $tmp=strtolower($player->game . '_stats');

      $playerStatsTable =  TableRegistry::get($tmp);
      $query = $playerStatsTable->find();

      $playerStats = $query->where(['player_id' => $player->player_id]);
    
      $this->set('player_stats', $playerStats);

      return $playerStats;
    }


    private function getPlayerMedia($playerId){

        $media = TableRegistry::get('media_links');
        $query = $media->find();
        $mediaQuery = $query->select(['twitter',
        'twitch',
        'facebook',
        'instagram',
        'youtube',
        'discord'])->where(['name' => $playerId]);

        return $mediaQuery;
      }





    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function panel()
    {
        $players = $this->paginate($this->Players);

        $this->set(compact('players'));

        $this->set('userRole', $this->Auth->user('role'));
    }

    /**
     * View method
     *
     * @param string|null $id Player id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //$players = $this->paginate($this->Players);

        //$this->set('player', $players);

        $player = $this->Players->get($id, [
            'contain' => []
        ]);

        $this->set('player', $player);

        $this->set('userRole', $this->Auth->user('role'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $player = $this->Players->newEntity();
        if ($this->request->is('post')) {
            $player = $this->Players->patchEntity($player, $this->request->getData());
            if ($this->Players->save($player)) {
                $this->Flash->success(__('The team has been saved.'));

                return $this->redirect(['action' => 'panel']);
            }
            $this->Flash->error(__('The player could not be saved. Please, try again.'));
        }
        $players = $this->Players->find('list', ['limit' => 200]);
        $this->set(compact('player'));

        $this->set('userRole', $this->Auth->user('role'));

        $this->loadModel('Teams');
        $teams = $this->Teams->find()->all();
        $allTeams = array();
        foreach ($teams as $key => $value) {
            $allTeams[$value->team_name] = $value->team_name;
        }
        $this->set('allTeams', $allTeams);
    }

    /**
     * Edit method
     *
     * @param string|null $id Player id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $player = $this->Players->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $player = $this->Players->patchEntity($player, $this->request->getData());
            if ($this->Players->save($player)) {
                $this->Flash->success(__('The team has been saved.'));

                return $this->redirect(['action' => 'panel']);
            }
            $this->Flash->error(__('The player could not be saved. Please, try again.'));
        }
        $this->set(compact('player'));

        $this->set('userRole', $this->Auth->user('role'));

        $this->loadModel('Teams');
        $teams = $this->Teams->find()->all();
        $allTeams = array();
        foreach ($teams as $key => $value) {
            $allTeams[$value->team_name] = $value->team_name;
        }
        $this->set('allTeams', $allTeams);
    }

    /**
     * Delete method
     *
     * @param string|null $id Player id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $player = $this->Players->get($id);

        if ($this->Players->delete($player)) {
            $this->Flash->success(__('The player has been deleted.'));
        } else {
            $this->Flash->error(__('The player could not be deleted. Please, try again.'));
        }

        $this->set('userRole', $this->Auth->user('role'));

        return $this->redirect(['action' => 'panel']);    
    }

    public function followPlayer(){

      $users = TableRegistry::get('users_general');
      $userId = $this->Auth->user('username');

      $oldPlayers = $this->getOldPlayers($users, $userId);
      if ($oldPlayers == "") {
        $newPlayers = $_POST['player_id'];
      } else {
        $newPlayers = $oldPlayers . "," . $_POST['player_id'];
      }

      $updateQuery = $users->query();
      $updateQuery->update()
        ->set(['followed_player' => $newPlayers])
        ->where(['user_id' => $userId])
        ->execute();

      return $this->redirect(['action' => 'index']);
    }

    public function unfollowPlayer(){

      $users = TableRegistry::get('users_general');
      $userId = $this->Auth->user('username');
      $oldPlayers = $this->getOldPlayers($users, $userId);

      $playerArray = array();
      $players = explode(",", $oldPlayers);
      foreach ($players as $player):
        array_push($playerArray, $player);
      endforeach;
      if (($key = array_search($_POST['player_id'], $playerArray)) !== false) {
        unset($playerArray[$key]);
      }
      if (empty($playerArray)) {
        $newPlayers = "";
      } else {
        $newPlayers = implode(",", $playerArray);
      }

      $updateQuery = $users->query();
      $updateQuery->update()
        ->set(['followed_player' => $newPlayers])
        ->where(['user_id' => $userId])
        ->execute();

      return $this->redirect(['action' => 'index']);
    }

    private function getOldPlayers($users, $userId){

      $oldPlayersQuery = $users->find()
          ->select(['followed_player'])
          ->where(['user_id' => $userId]);

      foreach ($oldPlayersQuery as $query):
          $oldPlayers = $query->followed_player;
      endforeach;

      return $oldPlayers;
    }
}
