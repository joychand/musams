<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Absentee $absentee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'add']) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Absentee'), ['action' => 'delete', $absentee->row_id], ['confirm' => __('Are you sure you want to delete # {0}?', $absentee->row_id)]) ?> </li>
        <!-- <li><?= $this->Html->link(__('List Absentees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Absentee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li> -->
    </ul>
</nav>
<div class="absentees view large-9 medium-8 columns content">
    <h3><?= h($absentee->row_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= $absentee->has('department') ? $this->Html->link($absentee->department->department_id, ['controller' => 'Departments', 'action' => 'view', $absentee->department->department_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $absentee->has('user') ? $this->Html->link($absentee->user->user_id, ['controller' => 'Users', 'action' => 'view', $absentee->user->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Row Id') ?></th>
            <td><?= $this->Number->format($absentee->row_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Lectures') ?></th>
            <td><?= $this->Number->format($absentee->total_lectures) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Absentees') ?></th>
            <td><?= $this->Number->format($absentee->total_absentees) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creation Date') ?></th>
            <td><?= h($absentee->creation_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Date') ?></th>
            <td><?= h($absentee->from_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('To Date') ?></th>
            <td><?= h($absentee->to_date) ?></td>
        </tr>
    </table>
</div>
