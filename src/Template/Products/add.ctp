<?php
$urlCategoriesListFilter = $this->Url->build([
    "controller" => "Categories",
    "action" => "getCategories",
    "_ext" => "json"
        ]);
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Subcategories",
    "action" => "getByCategory",
    "_ext" => "json"
        ]);

$this->Html->scriptBlock('var urlCategoriesListFilter = "' . $urlCategoriesListFilter . '";', ['block' => true]);
$this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
$this->Html->script('Products/addAngular', ['block' => 'scriptBottom']);
?>

<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <h1><?= __('Actions') ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-3 col-sm-4">
                <div class="list-group table-of-contents">
                <?php if ($loggedUser !== null): ?>
                
                    <?php if ($loggedUser['isAdmin']): ?>
                        <?= $this->Html->link(__('New Console'), ['controller' => 'Consoles', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                        <?= $this->Html->link(__('New Developer'), ['controller' => 'Developers', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                    <?php endif; ?>
                        <?= $this->Html->link(__('New Wishlist'), ['controller' => 'Wishlists', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                <?php endif; ?>
                    <?= $this->Html->link(__('List Products'), ['action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Consoles'), ['controller' => 'Consoles', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Developers'), ['controller' => 'Developers', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Wishlists'), ['controller' => 'Wishlists', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                    
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="products form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="categoriesController">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <h2><?= __('Add Product') ?></h2>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('console_id', ['options' => $consoles]);
            //echo $this->Form->input('category_id', ['options' => $categories]);
            //echo $this->Form->input('subcategory_id', 'type' => 'select', , ['options' => $subcategories]);
        ?>
            <div>
                Categories: 
                <select name="Category_id"
                        id="category-id" 
                        ng-model="category" 
                        ng-options="category.name for category in categories track by category.id"
                        >
                    <option value=''>Select</option>
                </select>
            </div>
            <div>
                Subcategories: 
                <select name="subcategory_id"
                        id="subcategory-id" 
                        ng-disabled="!category" 
                        ng-model="subcategory"
                        ng-options="subcategory.name for subcategory in category.subcategories track by subcategory.id"
                        >
                    <option value=''>Select</option>
                </select>
            </div>
        <?php
            echo $this->Form->control('used');
            echo $this->Form->control('developer_id', ['options' => $developers]);
            echo $this->Form->control('description');
            echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>
