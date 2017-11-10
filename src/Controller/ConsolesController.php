<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

/**
 * Consoles Controller
 *
 * @property \App\Model\Table\ConsolesTable $Consoles
 *
 * @method \App\Model\Entity\Console[] paginate($object = null, array $settings = [])
 */
class ConsolesController extends AppController
{
    
    
    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //**Old Code**
        /*
        $consoles = $this->paginate($this->Consoles);

        $this->set(compact('consoles'));
        $this->set('_serialize', ['consoles']);
        */
    }

    /**
     * View method
     *
     * @param string|null $id Console id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $console = $this->Consoles->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('console', $console);
        $this->set('_serialize', ['console']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $response = ['result' => 'fail'];
        $errors = $this->Consoles->validator()->errors($this->request->data);
        if (empty($errors)) {
            $console = $this->Consoles->newEntity($this->request->data);
            if ($this->Consoles->save($console)) {
                $response = ['result' => 'success'];
            }
        } else {
            $response['error'] = $errors;
        }
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
        
        
        //**Old Code**
        /*$console = $this->Consoles->newEntity();
        if ($this->request->is('post')) {
            $console = $this->Consoles->patchEntity($console, $this->request->getData());
            if ($this->Consoles->save($console)) {
                $this->Flash->success(__('The console has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The console could not be saved. Please, try again.'));
        }
        $this->set(compact('console'));
        $this->set('_serialize', ['console']);
        */
    }

    /**
     * Edit method
     *
     * @param string|null $id Console id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $response = ['result' => 'fail'];
        $errors = $this->Consoles->validator()->errors($this->request->data);
        if (empty($errors)) {
            $console = $this->Consoles->get($this->request->data['id']);
            $console = $this->Consoles->patchEntity($console, $this->request->data);

            if ($this->Consoles->save($console)) {
                $response = ['result' => 'success'];
            }
        } else {
            $response['error'] = $errors;
        }
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
        
        
        
        //**Old Code**
        /*
        $console = $this->Consoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $console = $this->Consoles->patchEntity($console, $this->request->getData());
            if ($this->Consoles->save($console)) {
                $this->Flash->success(__('The console has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The console could not be saved. Please, try again.'));
        }
        $this->set(compact('console'));
        $this->set('_serialize', ['console']);
        */
    }
    
    /**
     * gets either done or incomplete to-do's depending on the status
     *
     * @param int $status 0/1 incomplete/complete
     * @return void
     */
    public function get()
    {
        
        $consoles = $this->Consoles->find()->all();
        //$consoles = $this->paginate($this->Consoles);
        $this->set(compact('consoles'));
        $this->set('_serialize', ['consoles']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Console id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($consoleId = null)
    {
        $response = ['result' => 'fail'];
        if (!is_null($consoleId)) {
            $consoles = TableRegistry::get('Consoles');
            $console = $consoles->get($consoleId);
            if ($this->Consoles->delete($console)) {
                $response = ['result' => 'success'];
            }
        }
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
        
        /*
        $this->request->allowMethod(['post', 'delete']);
        $console = $this->Consoles->get($id);
        if ($this->Consoles->delete($console)) {
            $this->Flash->success(__('The console has been deleted.'));
        } else {
            $this->Flash->error(__('The console could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        */
    }
    
    public function finish($consoleId = null) {
        $response = ['result' => 'fail'];
        if (!is_null($consoleId)) {
            $consoles = TableRegistry::get('Consoles');
            $console = $consoles->get($consoleId);
            $consoles->patchEntity($console, ['is_done' => 1]);
            if ($consoles->save($console)) {
                $response = ['result' => 'success'];
            }
        }
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }
}
