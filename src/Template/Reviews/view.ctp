<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review $review
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
                
                    <?php if($this->request->session()->read('Auth.User.isAdmin') == 1 || $this->request->session()->read('Auth.User.id') == $review->user_id) echo $this->Html->link(__('Edit Review'), ['action' => 'edit', $review->id], array('class' => 'list-group-item')) ?>
                    
                    <?php if($this->request->session()->read('Auth.User.isAdmin') == 1 || $this->request->session()->read('Auth.User.id') == $review->user_id) echo $this->Form->postLink(__('Delete Review'), ['action' => 'delete', $review->id], array('class' => 'list-group-item'), ['confirm' => __('Are you sure you want to delete # {0}?', $review->id)]) ?>
                        
                        <?php if ($loggedUser['isAdmin']): ?>
                            <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                            <?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                        <?php endif; ?>
                        
                        <?php if ($loggedUser !== null): ?>
                            <?= $this->Html->link(__('New Review'), ['action' => 'add'], array('class' => 'list-group-item')) ?>
                        <?php endif; ?>
                        
                    <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="reviews view large-9 medium-8 columns content">
    <h2><?= __('Reviews') ?></h2>
    <table class="vertical-table table table-striped table-hover">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $review->has('user') ? $this->Html->link($review->user->username, ['controller' => 'Users', 'action' => 'view', $review->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $review->has('product') ? $this->Html->link($review->product->name, ['controller' => 'Products', 'action' => 'view', $review->product->id]) : '' ?></td>
        </tr>
<!--         <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($review->id) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($review->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($review->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($review->description)); ?>
    </div>
</div>
