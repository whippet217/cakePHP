<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
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
                <?php if ($loggedUser !== null): ?>
                    
                    <?php if ($loggedUser['isAdmin']): ?>
                        
                        <?= $this->Html->link(__('New Product'), ['action' => 'add'], array('class' => 'list-group-item')) ?>
                        <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], array('class' => 'list-group-item')) ?>
                        <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], array('class' => 'list-group-item'), ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                        <?= $this->Html->link(__('New Developer'), ['controller' => 'Developers', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                        <?= $this->Html->link(__('New Console'), ['controller' => 'Consoles', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                    <?php endif; ?>
                    
                    <?= $this->Html->link(__('New Wishlist'), ['controller' => 'Wishlists', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                    
                <?php endif; ?>
                <?= $this->Html->link(__('List Products'), ['action' => 'index'], array('class' => 'list-group-item')) ?>
                <?= $this->Html->link(__('List Consoles'), ['controller' => 'Consoles', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                <?= $this->Html->link(__('List Wishlists'), ['controller' => 'Wishlists', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                <?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                <?= $this->Html->link(__('List Developers'), ['controller' => 'Developers', 'action' => 'index'], array('class' => 'list-group-item')) ?>                
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="products view large-9 medium-8 columns content">
    <h2><?= h($product->name) ?></h2>
    <table class="vertical-table table table-striped table-hover">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Console') ?></th>
            <td><?= $product->has('console') ? $this->Html->link($product->console->name, ['controller' => 'Consoles', 'action' => 'view', $product->console->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Developer') ?></th>
            <td><?= $product->has('developer') ? $this->Html->link($product->developer->name, ['controller' => 'Developers', 'action' => 'view', $product->developer->id]) : '' ?></td>
        </tr>
<!--         <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Used') ?></th>
            <td><?= $product->used ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->description)); ?>
    </div>
<!--     <div class="related">
        <h4><?= __('Related Wishlists') ?></h4>
        <?php if (!empty($product->wishlists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->wishlists as $wishlists): ?>
            <tr>
                <td><?= h($wishlists->id) ?></td>
                <td><?= h($wishlists->user_id) ?></td>
                <td><?= h($wishlists->product_id) ?></td>
                <td><?= h($wishlists->created) ?></td>
                <td><?= h($wishlists->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Wishlists', 'action' => 'view', $wishlists->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Wishlists', 'action' => 'edit', $wishlists->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Wishlists', 'action' => 'delete', $wishlists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wishlists->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div> -->
    <div class="related">
        <h4><?= __('Related Files') ?></h4>
        <?php if (!empty($product->files)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <!-- <th scope="col"><?= __('Path') ?></th> -->
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <!-- <th scope="col"><?= __('Status') ?></th> -->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->files as $files): ?>
            <tr>
                <td><?= $this->Html->image($files->path.$files->name, ["alt" => $files->name,"width" => "220px","height" => "150px",'url' => ['action' => 'view', $files->id ]]) ?></td>
                <td><?= h($files->name) ?></td>
                <!-- <td><?= h($files->path) ?></td> -->
                <td><?= h($files->created) ?></td>
                <td><?= h($files->modified) ?></td>
                <!-- <td><?= h($files->status) ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Files', 'action' => 'view', $files->id]) ?>
                    <?php if ($loggedUser['isAdmin']): ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Files', 'action' => 'edit', $files->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Files', 'action' => 'delete', $files->id], ['confirm' => __('Are you sure you want to delete # {0}?', $files->id)]) ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>