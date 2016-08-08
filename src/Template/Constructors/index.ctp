<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Constructor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="constructors index large-9 medium-8 columns content">
    <h3><?= __('Constructors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('website') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($constructors as $constructor): ?>
            <tr>
                <td><?= $this->Number->format($constructor->id) ?></td>
                <td><?= h($constructor->name) ?></td>
                <td><?= h($constructor->description) ?></td>
                <td><?= h($constructor->website) ?></td>
                <td><?= h($constructor->created) ?></td>
                <td><?= h($constructor->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $constructor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $constructor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $constructor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $constructor->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
