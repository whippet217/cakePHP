<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Developers Controller
 *
 * @property \App\Model\Table\DevelopersTable $Developers
 *
 * @method \App\Model\Entity\Developer[] paginate($object = null, array $settings = [])
 */
class DevelopersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $developers = $this->paginate($this->Developers);

        $this->set(compact('developers'));
        $this->set('_serialize', ['developers']);
    }

    /**
     * View method
     *
     * @param string|null $id Developer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $developer = $this->Developers->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('developer', $developer);
        $this->set('_serialize', ['developer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $developer = $this->Developers->newEntity();
        if ($this->request->is('post')) {
            $developer = $this->Developers->patchEntity($developer, $this->request->getData());
            if ($this->Developers->save($developer)) {
                $this->Flash->success(__('The developer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The developer could not be saved. Please, try again.'));
        }
        $this->set(compact('developer'));
        $this->set('_serialize', ['developer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Developer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $developer = $this->Developers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $developer = $this->Developers->patchEntity($developer, $this->request->getData());
            if ($this->Developers->save($developer)) {
                $this->Flash->success(__('The developer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The developer could not be saved. Please, try again.'));
        }
        $this->set(compact('developer'));
        $this->set('_serialize', ['developer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Developer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $developer = $this->Developers->get($id);
        if ($this->Developers->delete($developer)) {
            $this->Flash->success(__('The developer has been deleted.'));
        } else {
            $this->Flash->error(__('The developer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
