<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Material'), ['action' => 'edit', $material->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Material'), ['action' => 'delete', $material->id], ['confirm' => __('Are you sure you want to delete # {0}?', $material->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Models'), ['controller' => 'Models', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Model'), ['controller' => 'Models', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Constructors'), ['controller' => 'Constructors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Constructor'), ['controller' => 'Constructors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materials view large-9 medium-8 columns content">
    <h3><?= h($material->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Serial Number') ?></th>
            <td><?= h($material->serial_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Model') ?></th>
            <td><?= $material->has('model') ? $this->Html->link($material->model->name, ['controller' => 'Models', 'action' => 'view', $material->model->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $material->has('user') ? $this->Html->link($material->user->name, ['controller' => 'Users', 'action' => 'view', $material->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= $material->has('category') ? $this->Html->link($material->category->name, ['controller' => 'Categories', 'action' => 'view', $material->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Constructor') ?></th>
            <td><?= $material->has('constructor') ? $this->Html->link($material->constructor->name, ['controller' => 'Constructors', 'action' => 'view', $material->constructor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($material->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($material->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($material->modified) ?></td>
        </tr>
    </table>
</div>
