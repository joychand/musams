<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Absentee $absentee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $absentee->row_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $absentee->row_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Absentees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="absentees form large-9 medium-8 columns content">
    <?= $this->Form->create($absentee) ?>
    <fieldset>
        <legend><?= __('Edit Absentee') ?></legend>
        <?php
            echo $this->Form->control('department_id', ['options' => $departments, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('creation_date');
            echo $this->Form->control('from_date', ['empty' => true]);
            echo $this->Form->control('to_date', ['empty' => true]);
            echo $this->Form->control('total_lectures');
            echo $this->Form->control('total_absentees');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
