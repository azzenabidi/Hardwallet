<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

/**
 * Materials Controller
 *
 * @property \App\Model\Table\MaterialsTable $Materials
 */
class MaterialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Models', 'Users', 'Categories', 'Constructors']
        ];
        $materials = $this->paginate($this->Materials);

        $this->set(compact('materials'));
        $this->set('_serialize', ['materials']);
    }
    public function search($text=null,$option=null) {




      if($this->request->is('post')){
        $option=$this->request->data['Search_Filter'];
        $dpt= $this->request->data['department_id'];
        if($option=="serial_number"){
        $text=$this->request->data['search'];
        if (!empty($text)) {


        $materials = $this->Materials->find('all',
                   array( 'conditions' => ['Materials.serial_number LIKE' => "%". $text ."%"],'contain' => ['Models', 'Users', 'Categories', 'Constructors']));

                 }
               }

          else  if($option=="employee_id"){
            $text=$this->request->data['search'];
            if (!empty($text)) {
            $materials = $this->Materials->find()
            ->contain(['Models', 'Users', 'Categories', 'Constructors']);
            $materials->where(['Users.email LIKE' => "%". $text ."%"]);
                     }
                   }
        else   {



          $materials = $this->Materials->find()
          ->contain(['Users.Departments','Models','Categories', 'Constructors']);
            $materials->where(['Departments.id' => $dpt ]);



        }
          $this->set(compact('materials'));
          }
        }



        public function beforeRender(Event $event)
        {
          $this->loadModel('Departments');
          $departments=$this->Departments->find('list')->select(['id']);
          $this->set(compact('departments'));

        }
    /**
     * View method
     *
     * @param string|null $id Material id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $material = $this->Materials->get($id, [
            'contain' => ['Models', 'Users', 'Categories', 'Constructors']
        ]);

        $this->set('material', $material);
        $this->set('_serialize', ['material']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $material = $this->Materials->newEntity();
        if ($this->request->is('post')) {
            $material = $this->Materials->patchEntity($material, $this->request->data);
            if ($this->Materials->save($material)) {
                $this->Flash->success(__('The material has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The material could not be saved. Please, try again.'));
            }
        }
        $models = $this->Materials->Models->find('list', ['limit' => 200]);
        $users = $this->Materials->Users->find('list', ['limit' => 200]);
        $categories = $this->Materials->Categories->find('list', ['limit' => 200]);
        $constructors = $this->Materials->Constructors->find('list', ['limit' => 200]);
        $this->set(compact('material', 'models', 'users', 'categories', 'constructors'));
        $this->set('_serialize', ['material']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Material id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $material = $this->Materials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $material = $this->Materials->patchEntity($material, $this->request->data);
            if ($this->Materials->save($material)) {
                $this->Flash->success(__('The material has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The material could not be saved. Please, try again.'));
            }
        }
        $models = $this->Materials->Models->find('list', ['limit' => 200]);
        $users = $this->Materials->Users->find('list', ['limit' => 200]);
        $categories = $this->Materials->Categories->find('list', ['limit' => 200]);
        $constructors = $this->Materials->Constructors->find('list', ['limit' => 200]);
        $this->set(compact('material', 'models', 'users', 'categories', 'constructors'));
        $this->set('_serialize', ['material']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Material id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $material = $this->Materials->get($id);
        if ($this->Materials->delete($material)) {
            $this->Flash->success(__('The material has been deleted.'));
        } else {
            $this->Flash->error(__('The material could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
