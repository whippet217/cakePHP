<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Text;
use Cake\Mailer\Email;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
            ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadComponent('CakeCaptcha.Captcha', [
          'captchaConfig' => 'ExampleCaptcha'
          ]);
        
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            
            // validate the user-entered Captcha code
            $isHuman = captcha_validate($this->request->data['CaptchaCode']);

            // clear previous user input, since each Captcha code can only be validated once
            unset($this->request->data['CaptchaCode']);
            
            if($isHuman){
                
                $user = $this->Users->patchEntity($user, $this->request->getData());
                
                $user->uuid = Text::uuid();
                $user->is_confirmed = false;
                
                if ($this->Users->save($user)) {
                    
                    $this->confirmationMail($user);
                    
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'login']);
                }
                
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }else{
                $this->Flash->error(__('You\'ve DONE GOOOOOOUF'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    private function confirmationMail($user){
        
        $confirmLink = Router::url(['controller' => 'Users', 'action' => 'confirm', $user->uuid], true);
        
        $email = new Email('default');
        
        $email
        ->to($user->email)
        ->subject('Fuck You')
        ->emailFormat('html')
        ->send($confirmLink);
    }
    
    public function confirm($uuid)
    {
        $user = $this->Users->find('all')->where(['uuid' => $uuid])->first();
        
        if($user != null){
            if($user->is_confirmed){
                $this->Flash->error(__('Are you fucking gay?'));
            }else{
                $user = $this->Users->patchEntity($user, ['is_confirmed' => true]);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('HOLY SHIT YOU ARE SO GOOD (faggot).'));
                    
                }else{
                    $this->Flash->error(__('WTF IS GOING ON?'));
                }
            }
            
        }
        
        return $this->redirect(['action' => 'login']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
            ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout', 'confirm']);
    }
    
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
               $this->Auth->setUser($user);
               return $this->redirect($this->Auth->redirectUrl());
           }
           $this->Flash->error(__('Invalid username or password, try again'));
       }
   }

   public function logout()
   {
    return $this->redirect($this->Auth->logout());
}

public function isAuthorized($user){
    
        // The owner of an account can edit and delete it
    if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
        $userId = (int)$this->request->getParam('pass.0');
        if ($userId == $user['id']) {
            return true;
        }
    }

    return parent::isAuthorized($user);
}
}
