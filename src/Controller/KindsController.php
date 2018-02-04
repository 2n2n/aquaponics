<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Kinds Controller
 *
 * @property \App\Model\Table\KindsTable $Kinds
 *
 * @method \App\Model\Entity\Kind[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KindsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Types']
        ];

        $query = $this->Kinds->find('all');
        $kinds = $this->paginate($query);

        $this->set(compact('kinds'));
    }

    /**
     * View method
     *
     * @param string|null $id Kind id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $kind = $this->Kinds->get($id, [
            'contain' => ['Types']
        ]);

        $this->set('kind', $kind);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $kind = $this->Kinds->newEntity();
        if ($this->request->is('post')) {
            $kind = $this->Kinds->patchEntity($kind, $this->request->getData());
            if ($this->Kinds->save($kind)) {
                $this->Flash->success(__('The kind has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kind could not be saved. Please, try again.'));
        }
        $types = $this->Kinds->Types->find('list', ['limit' => 200]);
        $this->set(compact('kind', 'types'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Kind id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $kind = $this->Kinds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $kind = $this->Kinds->patchEntity($kind, $this->request->getData(), ['Types']);
            if ($this->Kinds->save($kind)) {
                $this->Flash->success(__('The kind has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kind could not be saved. Please, try again.'));
        }
        $types = $this->Kinds->Types->find('list', ['limit' => 200]);
        $this->set(compact('kind', 'types'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Kind id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $kind = $this->Kinds->get($id);
        $this->Kinds->patchEntity($kind, ['deleted' => 1]);
        if ($this->Kinds->save($kind)) {
            $this->Flash->success(__('The kind has been deleted.'));
        } else {
            $this->Flash->error(__('The kind could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
