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
                        <?php if($this->request->session()->read('Auth.User.isAdmin') == 1 || $this->request->session()->read('Auth.User.id') == $review->user_id) echo $this->Form->postLink(__('Delete'),['action' => 'delete', $review->id], array('class' => 'list-group-item'), ['confirm' => __('Are you sure you want to delete # {0}?', $review->id)]) ?>
                        <?php if ($loggedUser['isAdmin']): ?>
                            <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                            <?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                        <?php endif; ?>
                    <?= $this->Html->link(__('List Reviews'), ['action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="reviews form large-9 medium-8 columns content">
    <?= $this->Form->create($review) ?>
    <fieldset>
        <h2><?= __('Edit Review') ?></h2>
        <?php
            //echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('products_id', ['options' => $products]);
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>
