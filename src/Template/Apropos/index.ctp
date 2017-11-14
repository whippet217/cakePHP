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
    <h1><?= __('À Propos') ?></h1>
    <h4>Nom: William Malenfant</h4>
    <h4>
    Dans le cadre du cours :<br><br>
    420-267 MO Développer un site Web et une application pour Internet.<br>
    Automne 2017, Collège Montmorency.
    </h4>
    
<h4>
BD Utilisé :<br>
<?= $this->Html->image('bd.PNG', ['alt' => 'BD']); ?>

Diagramme BD Original:<br> <?= $this->Html->link('http://www.databaseanswers.org/data_models/game_shop/index.htm'); ?>

</div>