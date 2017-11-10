<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
                <?php if($this->request->session()->read('Auth.User.isAdmin') == 1 || $this->request->session()->read('Auth.User.id') == $this->request->getParam('pass.0')) echo $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], array('class' => 'list-group-item')); ?>
                <?= $this->Html->link(__('List Users'), ['action' => 'index'], array('class' => 'list-group-item')) ?>
                </div>
            </div>
        </div>
    </div>

</nav>

<div class="users view large-9 medium-8 columns content">
    <h2><?= h($user->username) ?></h2>
    <table class="vertical-table table table-striped table-hover">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <!-- <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <!-- <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IsAdmin') ?></th>
            <td><?= $user->isAdmin ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
