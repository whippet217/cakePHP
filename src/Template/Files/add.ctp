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
                            <?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Files'), ['action' => 'index'], array('class' => 'list-group-item')) ?>
                </div>
            </div>
        </div>
    </div>

</nav>

<div class="files form large-9 medium-8 columns content">
    <?= $this->Form->create($file, ['type' => 'file']) ?>
    <fieldset>
        <h2><?= __('Add File') ?></h2>
        <?php
            echo $this->Form->control('name', ['type' => 'file']);
            echo $this->Form->control('status');
            echo $this->Form->control('products._ids', ['options' => $products]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>
