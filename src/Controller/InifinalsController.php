<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inifinals Controller
 *
 * @property \App\Model\Table\InifinalsTable $Inifinals
 *
 * @method \App\Model\Entity\Inifinal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InifinalsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Initials' => ['Users'], 'Kinds', 'Types']
        ];
        $inifinals = $this->paginate($this->Inifinals);
        $this->set(compact('inifinals'));
    }

    /**
     * View method
     *
     * @param string|null $id Inifinal id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inifinal = $this->Inifinals->get($id, [
            'contain' => ['Initials', 'Types', 'Kinds']
        ]);

        $this->set('inifinal', $inifinal);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $inifinal = $this->Inifinals->newEntity();
        if ($this->request->is('post')) {
            $inifinal = $this->Inifinals->patchEntity($inifinal, $this->request->getData());
            
            if ($this->Inifinals->save($inifinal)) {
                $this->Flash->success(__('The inifinal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            dd($inifinal->errors());
            $this->Flash->error(__('The inifinal could not be saved. Please, try again.'));
        }


        $initials = $this->Inifinals->Initials->get($id, [
            'contain' => ['Users', 'Kinds', 'Types']
        ]);
        $this->set(compact('inifinal', 'initials'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Inifinal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inifinal = $this->Inifinals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inifinal = $this->Inifinals->patchEntity($inifinal, $this->request->getData());
            if ($this->Inifinals->save($inifinal)) {
                $this->Flash->success(__('The inifinal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inifinal could not be saved. Please, try again.'));
        }
        $initials = $this->Inifinals->Initials->find('list', ['limit' => 200]);
        $this->set(compact('inifinal', 'initials'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Inifinal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inifinal = $this->Inifinals->get($id);
        if ($this->Inifinals->delete($inifinal)) {
            $this->Flash->success(__('The inifinal has been deleted.'));
        } else {
            $this->Flash->error(__('The inifinal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
