<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\File $file
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
                        <?= $this->Html->link(__('Edit File'), ['action' => 'edit', $file->id], array('class' => 'list-group-item')) ?>
                        <?= $this->Form->postLink(__('Delete File'), ['action' => 'delete', $file->id], array('class' => 'list-group-item'), ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?>
                        <?= $this->Html->link(__('New File'), ['action' => 'add'], array('class' => 'list-group-item')) ?>
                        <?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], array('class' => 'list-group-item')) ?>
                    <?php endif; ?>
                    <?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], array('class' => 'list-group-item')) ?>
                    <?= $this->Html->link(__('List Files'), ['action' => 'index'], array('class' => 'list-group-item')) ?>
                </div>
            </div>
        </div>
    </div>

</nav>

<div class="files view large-9 medium-8 columns content">
    <h2><?= h($file->name) ?></h2>
    <table class="vertical-table table table-striped table-hover">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($file->name) ?></td>
        </tr>
        <tr>
            <td>
                <?php echo $this->Html->image($file->path.$file->name, [
                    "alt" => $file->name,
                    ]);
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($file->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($file->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($file->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $file->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($file->products)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
            <tr>
                <!-- <th scope="col"><?= __('Id') ?></th> -->
                <th scope="col"><?= __('Name') ?></th>
                <!-- <th scope="col"><?= __('Console') ?></th> -->
                <th scope="col"><?= __('Used') ?></th>
                <!-- <th scope="col"><?= __('Developer Id') ?></th> -->
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($file->products as $products): ?>
            <tr>
                <!-- <td><?= h($products->id) ?></td> -->
                <td><?= h($products->name) ?></td>
                <!-- <td><?= h($products->console_id) ?></td> -->
                <td><?= h($products->used) ?></td>
                <!-- <td><?= h($products->developer_id) ?></td> -->
                <td><?= h($products->created) ?></td>
                <td><?= h($products->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?php if ($loggedUser['isAdmin']): ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
