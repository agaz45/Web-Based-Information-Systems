<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * Login Controller
 *
 *
 * @method \App\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginController extends AppController
{
    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            var_dump($user);
            if($user){
                $this->Auth->setUser($user);
                $this->set('loggedIn',false);

                if(substr($this->Auth->user('role'),0,2) == "AD"){
                    return $this->redirect(['controller' => 'Matches', 'action' => 'index']);
                }else{
                    return $this->redirect(['controller' => 'News', 'action' => 'index']);
                }
            }
            $this->Flash->error(
            "There was a problem with login, please check your username and password");
        }
    }

    public function logout(){
        $this->Flash->success("You have logged out of eSpot");
        $this->redirect($this->Auth->logout());
        $this->set('loggedIn',true);

        $userRole=$this->Auth->user('role');
        var_dump($userRole);
    }
}
