<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\KindsTable;
/**
 * Initials Controller
 *
 *
 * @method \App\Model\Entity\Initial[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InitialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $initials = $this->paginate($this->Initials);

        $this->set(compact('initials'));
    }

    /**
     * View method
     *
     * @param string|null $id Initial id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $initial = $this->Initials->get($id, [
            'contain' => []
        ]);

        $this->set('initial', $initial);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $initial = $this->Initials->newEntity();
        if ($this->request->is('post')) {
            $initial = $this->Initials->patchEntity($initial, $this->request->getData());
            if ($this->Initials->save($initial)) {
                $this->Flash->success(__('The initial has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The initial could not be saved. Please, try again.'));
        }

        $kinds = $this->Initials->Kinds->find('list', ['limit' => 200]);
        $this->set(compact('initial', 'kinds'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Initial id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $initial = $this->Initials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $initial = $this->Initials->patchEntity($initial, $this->request->getData());
            if ($this->Initials->save($initial)) {
                $this->Flash->success(__('The initial has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The initial could not be saved. Please, try again.'));
        }
        $this->set(compact('initial'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Initial id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $initial = $this->Initials->get($id);
        if ($this->Initials->delete($initial)) {
            $this->Flash->success(__('The initial has been deleted.'));
        } else {
            $this->Flash->error(__('The initial could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
