<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<nav class="large-3 medium-4 columns">

    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <h1><?= __('Actions') ?></h1>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6">
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-3 col-sm-4">
                <div class="list-group table-of-contents">
                    <?php if ($loggedUser !== null): ?>
                        
                        <?php if ($loggedUser['isAdmin']): ?>
                            <?= $this->Html->link(__('New Product'), ['action' => 'add'], array('class' => 'list-group-item')) ?>
                            <?= $this->Html->link(__('New Developer'), ['controller' => 'Developers', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                            <?= $this->Html->link(__('New Console'), ['controller' => 'Consoles', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                            
                        <?php endif; ?>
                        
                        <!-- <?= $this->Html->link(__('New Wishlist'), ['controller' => 'Wishlists', 'action' => 'add'], array('class' => 'list-group-item')) ?> -->
                        <?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                        
                    <?php endif; ?>
                    <?= $this->Html->link(__('List Consoles'), ['controller' => 'Consoles', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Wishlists'), ['controller' => 'Wishlists', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Developers'), ['controller' => 'Developers', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="products index large-9 medium-8 columns content">
    <h2><?= __('Products') ?></h2>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <thead>
            <tr>
                <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('console_id') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('used') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('developer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <!-- <td><?= $this->Number->format($product->id) ?></td> -->
                <td><?= h($product->name) ?></td>
                <td><?= $product->has('console') ? $this->Html->link($product->console->name, ['controller' => 'Consoles', 'action' => 'view', $product->console->id]) : '' ?></td>
                <!-- <td><?= h($product->used) ?></td> -->
                <td><?= $product->has('developer') ? $this->Html->link($product->developer->name, ['controller' => 'Developers', 'action' => 'view', $product->developer->id]) : '' ?></td>
                <td><?= h($product->created) ?></td>
                <td><?= h($product->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                    <?php if ($loggedUser['isAdmin']): ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>

</div>

<footer>
    <div class="sponsor">
        <script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?zoneid=1673&serve=C6AILKT&placement=bootswatchcom" id="_carbonads_js"></script>
    </div>
</footer>
