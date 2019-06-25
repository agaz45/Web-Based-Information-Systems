<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Matches Controller
 *
 * @property \App\Model\Table\MatchesTable $Matches
 *
 * @method \App\Model\Entity\Match[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MatchesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $matches = $this->paginate($this->Matches);

        $this->set(compact('matches'));
        $this->set('userRole', $this->Auth->user('role'));
    }

    /**
     * View method
     *
     * @param string|null $id Match id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $match = $this->Matches->get($id, [
            'contain' => []
        ]);

        $this->set('match', $match);
        $this->set('userRole', $this->Auth->user('role'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $match = $this->Matches->newEntity();
        if ($this->request->is('post')) {
            $match = $this->Matches->patchEntity($match, $this->request->getData());
            if ($this->Matches->save($match)) {
                $this->Flash->success(__('The match has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The match could not be saved. Please, try again.'));
        }
        $this->set(compact('match'));
        $this->set('userRole', $this->Auth->user('role'));

        $this->loadModel('Teams');
        $teams = $this->Teams->find()->all();
        $allTeams = array();
        foreach ($teams as $key => $value) {
            $allTeams[$value->team_name] = $value->team_name;
        }
        $allTeams = array('N/A'=>'N/A') + $allTeams; //Default value
        $this->set('allTeams', $allTeams);
    }

    /**
     * Edit method
     *
     * @param string|null $id Match id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $match = $this->Matches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $match = $this->Matches->patchEntity($match, $this->request->getData());
            if ($this->Matches->save($match)) {
                $this->Flash->success(__('The match has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The match could not be saved. Please, try again.'));
        }
        $this->set(compact('match'));
        $this->set('userRole', $this->Auth->user('role'));

        $this->loadModel('Teams');
        $teams = $this->Teams->find()->all();
        $allTeams = array();
        foreach ($teams as $key => $value) {
            $allTeams[$value->team_name] = $value->team_name;
        }
        $allTeams = array('N/A'=>'N/A') + $allTeams; //Default value
        $this->set('allTeams', $allTeams);
    }

    /**
     * Delete method
     *
     * @param string|null $id Match id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $match = $this->Matches->get($id);
        if ($this->Matches->delete($match)) {
            $this->Flash->success(__('The match has been deleted.'));
        } else {
            $this->Flash->error(__('The match could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
