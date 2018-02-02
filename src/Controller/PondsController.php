<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ponds Controller
 *
 * @property \App\Model\Table\PondsTable $Ponds
 *
 * @method \App\Model\Entity\Pond[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PondsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $ponds = $this->paginate($this->Ponds);

        $this->set(compact('ponds'));
    }

    /**
     * View method
     *
     * @param string|null $id Pond id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pond = $this->Ponds->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('pond', $pond);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pond = $this->Ponds->newEntity();
        if ($this->request->is('post')) {
            $pond = $this->Ponds->patchEntity($pond, $this->request->getData());
            if ($this->Ponds->save($pond)) {
                $this->Flash->success(__('The pond has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pond could not be saved. Please, try again.'));
        }
        $users = $this->Ponds->Users->find('list', ['limit' => 200]);
        $this->set(compact('pond', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pond id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pond = $this->Ponds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pond = $this->Ponds->patchEntity($pond, $this->request->getData());
            if ($this->Ponds->save($pond)) {
                $this->Flash->success(__('The pond has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pond could not be saved. Please, try again.'));
        }
        $users = $this->Ponds->Users->find('list', ['limit' => 200]);
        $this->set(compact('pond', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pond id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pond = $this->Ponds->get($id);
        if ($this->Ponds->delete($pond)) {
            $this->Flash->success(__('The pond has been deleted.'));
        } else {
            $this->Flash->error(__('The pond could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
