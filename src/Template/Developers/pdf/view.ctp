<div class="articles view large-9 medium-8 columns content">
    <h3><?= h($developer->name) ?></h3>
        <table class="vertical-table">
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($developer->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Email') ?></th>
                <td><?= h($developer->email) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($developer->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($developer->modified) ?></td>
            </tr>
        </table>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($developer->products)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Used') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
            </tr>
            <?php foreach ($developer->products as $products): ?>
            <tr>
                <td><?= h($products->name) ?></td>
                <td><?= h($products->used) ? __('Yes') : __('No'); ?></td>
                <td><?= h($products->created) ?></td>
                <td><?= h($products->modified) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
