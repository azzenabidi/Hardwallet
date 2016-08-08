<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Material'), ['action' => 'add']) ?></li>
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

<div class="users form large-9 medium-8 columns content">

    <fieldset>
        <legend><?= __('Search By Material | Department| Employee') ?></legend>
        <?php
        // app/View/Locations/index.ctp
        echo $this->Form->create('Material', array('type' => 'post'));
        echo $this->Form->create('Properties', array('type' => 'post'));
       echo $this->Form->input('search', array('between'=>'<label for="search" class="main_search">Search</label><br>','label'=>false));
       echo $this->Form->radio(
     'Search_Filter',
     [
         ['value' => 'serial_number', 'text' => 'Serial Number', 'style' => 'color:red;'],
         ['value' => 'department_id', 'text' => 'Department', 'style' => 'color:blue;'],
         ['value' => 'employee_id', 'text' => 'Employee', 'style' => 'color:green;'],
     ]
 );

        ?>
    </fieldset>
    <?php

   echo $this->Form->button('Search', array('class'=>'btn btn-success'));
  echo  $this->Form->end() ;
    ?>

  </div>

  <div class="materials index large-9 medium-8 columns content">
      <h3><?= __('Related Materials') ?></h3>
      <table cellpadding="0" cellspacing="0">
          <thead>
              <tr>

                  <th><?= $this->Paginator->sort('serial_number') ?></th>
                  <th><?= $this->Paginator->sort('model_id') ?></th>
                  <th><?= $this->Paginator->sort('user_id') ?></th>
                  <th><?= $this->Paginator->sort('category_id') ?></th>
                  <th><?= $this->Paginator->sort('constructor_id') ?></th>

                  <th><?= $this->Paginator->sort('created') ?></th>
                  <th><?= $this->Paginator->sort('modified') ?></th>

                              </tr>
          </thead>
          <tbody>
              <?php foreach ($materials as $material): ?>
              <tr>
            
                  <td><?= h($material->serial_number) ?></td>
                  <td><?= $material->has('model') ? $this->Html->link($material->model->name, ['controller' => 'Models', 'action' => 'view', $material->model->id]) : '' ?></td>
                  <td><?= $material->has('user') ? $this->Html->link($material->user->name, ['controller' => 'Users', 'action' => 'view', $material->user->id]) : '' ?></td>
                  <td><?= $material->has('category') ? $this->Html->link($material->category->name, ['controller' => 'Categories', 'action' => 'view', $material->category->id]) : '' ?></td>
                  <td><?= $material->has('constructor') ? $this->Html->link($material->constructor->name, ['controller' => 'Constructors', 'action' => 'view', $material->constructor->id]) : '' ?></td>

                  <td><?= h($material->created) ?></td>
                  <td><?= h($material->modified) ?></td>

              </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
    </div>
