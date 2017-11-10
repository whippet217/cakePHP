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
            <div class="col-lg-4 col-md-5 col-sm-6">
                <div class="sponsor">
                    <script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?zoneid=1673&serve=C6AILKT&placement=bootswatchcom" id="_carbonads_js"></script>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-3 col-sm-4">
                <div class="list-group table-of-contents">
                    <?php if ($loggedUser['isAdmin']): ?>
                        <?= $this->Form->postLink(__('Delete'),['action' => 'delete', $product->id], array('class' => 'list-group-item'), ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                        <?= $this->Html->link(__('New Developer'), ['controller' => 'Developers', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                        <?= $this->Html->link(__('New Wishlist'), ['controller' => 'Wishlists', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                        <?= $this->Html->link(__('New Console'), ['controller' => 'Consoles', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                        <?= $this->Html->link(__('List Consoles'), ['controller' => 'Consoles', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                        <?= $this->Html->link(__('List Products'), ['action' => 'index'], array('class' => 'list-group-item')) ?>
                        <?= $this->Html->link(__('List Developers'), ['controller' => 'Developers', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                        <?= $this->Html->link(__('List Wishlists'), ['controller' => 'Wishlists', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                        <?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                        <?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <h2><?= __('Edit Product') ?></h2>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('console_id', ['options' => $consoles]);
            echo $this->Form->control('used');
            echo $this->Form->control('developer_id', ['options' => $developers]);
            echo $this->Form->control('description');
            echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>
