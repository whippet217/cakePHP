<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[] paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Consoles', 'Developers']
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Consoles', 'Developers', 'Files', 'Wishlists']
        ]);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $consoles = $this->Products->Consoles->find('list', ['limit' => 200]);
        
        // Bâtir la liste des catégories  
        $this->loadModel('Categories');
        $categories = $this->Categories->find('list', ['limit' => 200]);

        // Extraire le id de la première catégorie
        $categories = $categories->toArray();
        reset($categories);
        $category_id = key($categories);

        // Bâtir la liste des sous-catégories reliées à cette catégorie
        $subcategories = $this->Products->Subcategories->find('list', [
            'conditions' => ['Subcategories.category_id' => $category_id],
        ]);
        
        $developers = $this->Products->Developers->find('list', ['limit' => 200]);
        $files = $this->Products->Files->find('list', ['limit' => 200]);
        
        $this->set(compact('product', 'consoles', 'subcategories', 'categories', 'developers', 'files'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Subcategories' => ['Categories'], 'Files']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $consoles = $this->Products->Consoles->find('list', ['limit' => 200]);
        
        $this->loadModel('Categories');
        $categories = $this->Categories->find('list', ['limit' => 200]);

        $subcategories = $this->Products->Subcategories->find('list')->where(['category_id' => $product->subcategory->category->id]);
        
        $developers = $this->Products->Developers->find('list', ['limit' => 200]);
        $files = $this->Products->Files->find('list', ['limit' => 200]);
        $this->set(compact('product', 'consoles', 'subcategories', 'categories', 'developers', 'files'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function findProducts() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Products->find('all', array(
                'conditions' => array('Products.name LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['name']);
            }
            echo json_encode($resultArr);
        }
    }
}
