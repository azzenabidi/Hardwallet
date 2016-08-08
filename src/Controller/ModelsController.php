<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Models Controller
 *
 * @property \App\Model\Table\ModelsTable $Models
 */
class ModelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Materials']
        ];
        $models = $this->paginate($this->Models);

        $this->set(compact('models'));
        $this->set('_serialize', ['models']);
    }

    /**
     * View method
     *
     * @param string|null $id Model id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $model = $this->Models->get($id, [
            'contain' => ['Materials']
        ]);

        $this->set('model', $model);
        $this->set('_serialize', ['model']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $model = $this->Models->newEntity();
        if ($this->request->is('post')) {
            $model = $this->Models->patchEntity($model, $this->request->data);
            if ($this->Models->save($model)) {
                $this->Flash->success(__('The model has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The model could not be saved. Please, try again.'));
            }
        }
        $materials = $this->Models->Materials->find('list', ['limit' => 200]);
        $this->set(compact('model', 'materials'));
        $this->set('_serialize', ['model']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Model id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $model = $this->Models->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $model = $this->Models->patchEntity($model, $this->request->data);
            if ($this->Models->save($model)) {
                $this->Flash->success(__('The model has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The model could not be saved. Please, try again.'));
            }
        }
        $materials = $this->Models->Materials->find('list', ['limit' => 200]);
        $this->set(compact('model', 'materials'));
        $this->set('_serialize', ['model']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Model id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $model = $this->Models->get($id);
        if ($this->Models->delete($model)) {
            $this->Flash->success(__('The model has been deleted.'));
        } else {
            $this->Flash->error(__('The model could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
