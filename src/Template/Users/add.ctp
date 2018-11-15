<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['controller'=>'Admin','action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
           
            echo $this->Form->control('user_name');
            echo $this->Form->control('user_full_name');
            echo $this->Form->control('password',['type'=>'password','required'=>true]);
            echo $this->Form->control('confirm_passwd',['type'=>'password','required'=>true,'label'=>'Confirm Password']);
            echo $this->Form->control('email');
            echo $this->Form->control('mobile');
            echo $this->Form->control('role_id',['options' => $roles, 'empty' => 'Select Role']);
            echo $this->Form->control('department_id', ['options' => $departments, 'empty'=>'Select Department',]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
