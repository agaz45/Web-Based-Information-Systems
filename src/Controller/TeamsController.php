<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

/**
 * Teams Controller
 *
 * @property \App\Model\Table\TeamsTable $Teams
 *
 * @method \App\Model\Entity\Team[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TeamsController extends AppController
{

    function index(){

      if (!empty($_GET)):
        //for some reason it ads a dash to this name, yet its correct in the database
        //Unfortunatley ran out of time and did this to fix the page
        if($_GET['team-name'] == "comp-lexity gaming"){  
          $_GET['team-name'] = "complexity gaming";
        }
        $teamInfo = $this->getIndividualTeamInfo($_GET['team-name']);

      else:
        $this->setFollowedTeams();
        $teamInfo = $this->getAllTeamInfo();

        if ($this->request->is('post')):
            $this->followTeam($this->request->data);
        endif;
      endif;

      foreach($teamInfo as $item){
        $mediaLinks = $this->getPlayerMedia($item->team_name);
        $team = $this->Teams->get($item->team_name, [
            'contain' => []
        ]);
        $teamRoster = $this->getRoster($item->team_name);

        $this->set('team', $team);
      }
      
      $this->set('mediaLinks', $mediaLinks);
      $this->set('teamRoster', $teamRoster);
      $this->setTeamInfo($teamInfo);

    }


    private function getAllTeamInfo(){

        $teams = TableRegistry::get('teams');
        $query = $teams->find();
        $teamQuery = $query->select([
          'team_name',
          'game',
          'division',
          'location',
          'win',
          'lose',
          'tie',
          'world_rank']);

        return $teamQuery;
    }

    public function game($arg1){

      $gameName=func_get_args();
      $teamInfo= $this->quaryByGame($gameName[0]);
      $this->setTeamInfo($teamInfo);
      $this->render('team_table');
    }

    public function quaryByGame($game_name){

      $teams = TableRegistry::get('teams');
      $query = $teams->find();
      $teamQuery = $query->select([
      'team_name',
      'game',
      'division',
      'location',
      'win',
      'lose',
      'tie',
      'world_rank'
      ])-> where(['game' => $game_name]);

      return $teamQuery;
    }

    private function setTeamInfo($teamInfo){

        $this->set('teamInfo', $teamInfo);
    }

    private function setFollowedTeams() {

      $userId = $this->Auth->user('username');
      $users = TableRegistry::get('users_general');
      $usersQuery = $users->find()
          ->select(['user_id', 'followed_team'])
          ->where(['user_id' => $userId]);
      $teamArray = array();

      foreach ($usersQuery as $query):
          $teams = explode(",", $query->followed_team);

          foreach ($teams as $team):
            array_push($teamArray, $team);

          endforeach;
       endforeach;

      $this->set('followed', $teamArray);
    }

    private function getIndividualTeamInfo($teamId){

        $teams = TableRegistry::get('teams');
        $query = $teams->find();
        $teamQuery = $query->select([
          'team_name',
          'game',
          'division',
          'location',
          'win',
          'lose',
          'tie',
          'world_rank'
          ])->where(['team_name' => $teamId]);

        return $teamQuery;
    }

    private function getPlayerMedia($teamId){

        $media = TableRegistry::get('media_links');
        $query = $media->find();
        $mediaQuery = $query->select(['twitter',
        'twitch',
        'facebook',
        'instagram',
        'youtube',
        'discord'])->where(['name' => $teamId]);

        return $mediaQuery;
      }


    private function getRoster($teamId){
        $players = TableRegistry::get('players');
        $query = $players->find();
        $rosterQuery = $query->select(['player_id'])->where(['team_name' => $teamId]);

        return $rosterQuery;

    }


    public function panel()
    {
        $teams = $this->paginate($this->Teams);

        $this->set(compact('teams'));

        $this->set('userRole', $this->Auth->user('role'));
    }

    /**
     * View method
     *
     * @param string|null $id Team id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $team = $this->Teams->get($id, [
            'contain' => []
        ]);

        $this->set('team', $team);

        $this->set('userRole', $this->Auth->user('role'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $team = $this->Teams->newEntity();
        if ($this->request->is('post')) {
            $team = $this->Teams->patchEntity($team, $this->request->getData());
            if ($this->Teams->save($team)) {
                $this->Flash->success(__('The team has been saved.'));

                return $this->redirect(['action' => 'panel']);
            }
            $this->Flash->error(__('The team could not be saved. Please, try again.'));
        }
        $this->set(compact('team'));

        $this->set('userRole', $this->Auth->user('role'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Team id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $team = $this->Teams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $team = $this->Teams->patchEntity($team, $this->request->getData());
            if ($this->Teams->save($team)) {
                $this->Flash->success(__('The team has been saved.'));

                return $this->redirect(['action' => 'panel']);
            }
            $this->Flash->error(__('The team could not be saved. Please, try again.'));
        }
        $this->set(compact('team'));

        $this->set('userRole', $this->Auth->user('role'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Team id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $team = $this->Teams->get($id);
        if ($this->Teams->delete($team)) {
            $this->Flash->success(__('The team has been deleted.'));
        } else {
            $this->Flash->error(__('The team could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'panel']);

        $this->set('userRole', $this->Auth->user('role'));
    }

    public function followTeam(){
      $users = TableRegistry::get('users_general');
      $userId = $this->Auth->user('username');

      $oldTeams = $this->getOldTeams($users, $userId);
      if ($oldTeams == "") {
        $newTeams = $_POST['team_name'];
      } else {
        $newTeams = $oldTeams . "," . $_POST['team_name'];
      }

      $updateQuery = $users->query();
      $updateQuery->update()
        ->set(['followed_team' => $newTeams])
        ->where(['user_id' => $userId])
        ->execute();
      return $this->redirect(['action' => 'index']);
    }

    public function unfollowTeam(){
      $users = TableRegistry::get('users_general');
      $userId = $this->Auth->user('username');
      $oldTeams = $this->getOldTeams($users, $userId);

      $teamArray = array();
      $teams = explode(",", $oldTeams);
      foreach ($teams as $team):
        array_push($teamArray, $team);
      endforeach;
      if (($key = array_search($_POST['team_name'], $teamArray)) !== false) {
        unset($teamArray[$key]);
      }
      if (empty($teamArray)) {
        $newTeams = "";
      } else {
        $newTeams = implode(",", $teamArray);
      }

      $updateQuery = $users->query();
      $updateQuery->update()
        ->set(['followed_team' => $newTeams])
        ->where(['user_id' => $userId])
        ->execute();
      return $this->redirect(['action' => 'index']);
    }

    private function getOldTeams($users, $userId){
      $oldTeamsQuery = $users->find()
          ->select(['followed_team'])
          ->where(['user_id' => $userId]);

      foreach ($oldTeamsQuery as $query):
          $oldTeams = $query->followed_team;
      endforeach;
      return $oldTeams;
    }
}
