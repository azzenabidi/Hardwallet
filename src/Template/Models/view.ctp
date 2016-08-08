<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Model'), ['action' => 'edit', $model->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Model'), ['action' => 'delete', $model->id], ['confirm' => __('Are you sure you want to delete # {0}?', $model->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Models'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Model'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="models view large-9 medium-8 columns content">
    <h3><?= h($model->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($model->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($model->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($model->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($model->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($model->modified) ?></td>
        </tr>
    </table>
</div>
