<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Constructors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="constructors form large-9 medium-8 columns content">
    <?= $this->Form->create($constructor) ?>
    <fieldset>
        <legend><?= __('Add Constructor') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('website');
            echo $this->Form->input('email');
            echo $this->Form->input('address');
            echo $this->Form->input('phone');
            echo $this->Form->input('chief_phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
