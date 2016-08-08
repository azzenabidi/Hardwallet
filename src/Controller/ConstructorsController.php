<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Constructors Controller
 *
 * @property \App\Model\Table\ConstructorsTable $Constructors
 */
class ConstructorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $constructors = $this->paginate($this->Constructors);

        $this->set(compact('constructors'));
        $this->set('_serialize', ['constructors']);
    }

    /**
     * View method
     *
     * @param string|null $id Constructor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $constructor = $this->Constructors->get($id, [
            'contain' => ['Materials']
        ]);

        $this->set('constructor', $constructor);
        $this->set('_serialize', ['constructor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $constructor = $this->Constructors->newEntity();
        if ($this->request->is('post')) {
            $constructor = $this->Constructors->patchEntity($constructor, $this->request->data);
            if ($this->Constructors->save($constructor)) {
                $this->Flash->success(__('The constructor has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The constructor could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('constructor'));
        $this->set('_serialize', ['constructor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Constructor id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $constructor = $this->Constructors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $constructor = $this->Constructors->patchEntity($constructor, $this->request->data);
            if ($this->Constructors->save($constructor)) {
                $this->Flash->success(__('The constructor has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The constructor could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('constructor'));
        $this->set('_serialize', ['constructor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Constructor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $constructor = $this->Constructors->get($id);
        if ($this->Constructors->delete($constructor)) {
            $this->Flash->success(__('The constructor has been deleted.'));
        } else {
            $this->Flash->error(__('The constructor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
