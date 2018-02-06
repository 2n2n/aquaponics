<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use App\Model\Entity\User; 

/**
 * Logins Controller
 *
 * @property \App\Model\Table\LoginsTable $Logins
 *
 * @method \App\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }
    
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->loadModel('Logins');
                $profile = $this->Logins->find('all')->where(['Logins.users_id' => $user['users_id']])->first()->profile_img;
                $user['profile_img'] = $profile;
                
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {  
        $this->loadModel('Users');
        $this->loadModel('Roles');
        
        $this->paginate = [
            'contain' => ['Roles', 'Users']
        ];
        $logins = $this->paginate($this->Logins);
        $this->paginate = [
            'contain' => []
        ];
        $users = $this->paginate($this->Users);
        $roles = $this->paginate($this->Roles);
        $this->set(compact('logins', 'users', 'roles'));
    }

    /**
     * View method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $login = $this->Logins->get($id, [
            'contain' => ['Roles', 'Users']
        ]);

        $this->set('login', $login);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Users');
        $login = $this->Logins->newEntity();
        if ($this->request->is('post')) {
            $login = $this->Logins->patchEntity($login, $this->request->getData());
            if ($this->Logins->save($login)) {
                $this->Flash->success(__('The login has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The login could not be saved. Please, try again.'));
        }
        $roles = $this->Logins->Roles->find('list', ['limit' => 200]);
        $users = $this->Logins->Users->findNotInLogins('list', [
            'limit' => 200]);
        $this->set(compact('login', 'roles', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $login = $this->Logins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if( empty( $data['password'] ) ) {
                unset($data['password']);
            } 
            else {
                // check if current passord is same with the old one.
                $hasher = new DefaultPasswordHasher;
             
                if( $hasher->check($data['password'], $login->get('password')) ) {
                    unset($data['password']);
                }
            }
            $login = $this->Logins->patchEntity($login, $data);
            if ($this->Logins->save($login)) {
                $this->Flash->success(__('The login has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The login could not be saved. Please, try again.'));
        }
        $roles = $this->Logins->Roles->find('list', ['limit' => 200]);
        $users = $this->Logins->Users->findNotInLogins('list', [
            'limit' => 200
        ])
        ->orWhere(['Logins.users_id' => $id]);
        $this->set(compact('login', 'roles', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $login = $this->Logins->get($id);
        if ($this->Logins->delete($login)) {
            $this->Flash->success(__('The login has been deleted.'));
        } else {
            $this->Flash->error(__('The login could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
