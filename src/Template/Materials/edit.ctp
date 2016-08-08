<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $material->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $material->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Models'), ['controller' => 'Models', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Model'), ['controller' => 'Models', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Constructors'), ['controller' => 'Constructors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Constructor'), ['controller' => 'Constructors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materials form large-9 medium-8 columns content">
    <?= $this->Form->create($material) ?>
    <fieldset>
        <legend><?= __('Edit Material') ?></legend>
        <?php
            echo $this->Form->input('serial_number');
            echo $this->Form->input('model_id', ['options' => $models]);
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('constructor_id', ['options' => $constructors, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
