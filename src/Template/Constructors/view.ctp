<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Constructor'), ['action' => 'edit', $constructor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Constructor'), ['action' => 'delete', $constructor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $constructor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Constructors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Constructor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="constructors view large-9 medium-8 columns content">
    <h3><?= h($constructor->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($constructor->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($constructor->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Website') ?></th>
            <td><?= h($constructor->website) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($constructor->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($constructor->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Chief Phone') ?></th>
            <td><?= h($constructor->chief_phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($constructor->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($constructor->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($constructor->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($constructor->address)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Materials') ?></h4>
        <?php if (!empty($constructor->materials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Serial Number') ?></th>
                <th><?= __('Model Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Constructor Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($constructor->materials as $materials): ?>
            <tr>
                <td><?= h($materials->id) ?></td>
                <td><?= h($materials->serial_number) ?></td>
                <td><?= h($materials->model_id) ?></td>
                <td><?= h($materials->user_id) ?></td>
                <td><?= h($materials->category_id) ?></td>
                <td><?= h($materials->constructor_id) ?></td>
                <td><?= h($materials->created) ?></td>
                <td><?= h($materials->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Materials', 'action' => 'view', $materials->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Materials', 'action' => 'edit', $materials->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Materials', 'action' => 'delete', $materials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materials->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
