<!-- File: src/Template/Users/login.ctp -->

<!-- <div class="users form"> -->
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
<?= $this->Form->button(__('Login'), array('class' => 'btn btn-primary')); ?>
<?= $this->Form->end() ?>
<!-- </div> -->