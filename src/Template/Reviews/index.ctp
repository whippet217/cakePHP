<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review[]|\Cake\Collection\CollectionInterface $reviews
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
                        <?= $this->Html->link(__('New Review'), ['action' => 'add'], array('class' => 'list-group-item')) ?>
                    <?php endif; ?>
                    <?php if ($loggedUser['isAdmin']): ?>
                        <?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                    <?php endif; ?>
                    <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                </div>
            </div>
        </div>
    </div>

</nav>

<div class="reviews index large-9 medium-8 columns content">
    <h2><?= __('Reviews') ?></h2>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
        <thead>
            <tr>
                <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('products_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review): ?>
            <tr>
                <!-- <td><?= $this->Number->format($review->id) ?></td> -->
                <td><?= $review->has('user') ? $this->Html->link($review->user->username, ['controller' => 'Users', 'action' => 'view', $review->user->id]) : '' ?></td>
                <td><?= $review->has('product') ? $this->Html->link($review->product->name, ['controller' => 'Products', 'action' => 'view', $review->product->id]) : '' ?></td>
                <td><?= h($review->created) ?></td>
                <td><?= h($review->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $review->id]) ?>
                    <?php if ($loggedUser['isAdmin'] || $loggedUser['id'] == $review->user_id): ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $review->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $review->id], ['confirm' => __('Are you sure you want to delete # {0}?', $review->id)]) ?>
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
