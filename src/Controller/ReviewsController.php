<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reviews Controller
 *
 * @property \App\Model\Table\ReviewsTable $Reviews
 *
 * @method \App\Model\Entity\Review[] paginate($object = null, array $settings = [])
 */
class ReviewsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Products']
        ];
        $reviews = $this->paginate($this->Reviews);

        $this->set(compact('reviews'));
        $this->set('_serialize', ['reviews']);
    }

    /**
     * View method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $review = $this->Reviews->get($id, [
            'contain' => ['Users', 'Products']
        ]);

        $this->set('review', $review);
        $this->set('_serialize', ['review']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $review = $this->Reviews->newEntity();
        if ($this->request->is('post')) {
            $review = $this->Reviews->patchEntity($review, $this->request->getData());
            $review->user_id = $this->Auth->user('id');
            if ($this->Reviews->save($review)) {
                $this->Flash->success(__('The review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The review could not be saved. Please, try again.'));
        }
        $users = $this->Reviews->Users->find('list', ['limit' => 200]);
        $products = $this->Reviews->Products->find('list', ['limit' => 200]);
        $this->set(compact('review', 'users', 'products'));
        $this->set('_serialize', ['review']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $review = $this->Reviews->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $review = $this->Reviews->patchEntity($review, $this->request->getData());
            if ($this->Reviews->save($review)) {
                $this->Flash->success(__('The review has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The review could not be saved. Please, try again.'));
        }
        $users = $this->Reviews->Users->find('list', ['limit' => 200]);
        $products = $this->Reviews->Products->find('list', ['limit' => 200]);
        $this->set(compact('review', 'users', 'products'));
        $this->set('_serialize', ['review']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Reviews->get($id);
        if ($this->Reviews->delete($review)) {
            $this->Flash->success(__('The review has been deleted.'));
        } else {
            $this->Flash->error(__('The review could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->getParam('action') === 'add') {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $reviewId = (int)$this->request->getParam('pass.0');
            if ($this->Reviews->isOwnedBy($reviewId, $user['id'])) {
                    return true;
            }
        }

        return parent::isAuthorized($user);
    }
}
