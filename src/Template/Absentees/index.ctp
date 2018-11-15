<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Absentee[]|\Cake\Collection\CollectionInterface $absentees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Weekly Absentee Report'), ['action' => 'home']) ?></li>
        <!-- <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li> -->
    </ul>
</nav>
<div class="absentees index large-9 medium-8 columns content">
    <h3><?= __('Absentees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!-- <th scope="col"><?= $this->Paginator->sort('row_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('department_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th> -->
               
                <th scope="col"><?= $this->Paginator->sort('Week From') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Week To') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_lectures') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_absentees') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Uploaded_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($absentees as $absentee): ?>
            <tr>
                <!-- <td><?= $this->Number->format($absentee->row_id) ?></td>
                <td><?= $absentee->has('department') ? $this->Html->link($absentee->department->department_id, ['controller' => 'Departments', 'action' => 'view', $absentee->department->department_id]) : '' ?></td>
                <td><?= $absentee->has('user') ? $this->Html->link($absentee->user->user_id, ['controller' => 'Users', 'action' => 'view', $absentee->user->user_id]) : '' ?></td> -->
                
                <td><?= h($absentee->from_date->i18nFormat(\IntlDateFormatter::FULL)) ?></td>
                <td><?= h($absentee->to_date->i18nFormat(\IntlDateFormatter::FULL)) ?></td>
                <td><?= $this->Number->format($absentee->total_lectures) ?></td>
                <td><?= $this->Number->format($absentee->total_absentees) ?></td>
                <td><?= h($absentee->creation_date->i18nFormat(\IntlDateFormatter::FULL)) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $absentee->row_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $absentee->row_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $absentee->row_id], ['confirm' => __('Are you sure you want to delete # {0}?', $absentee->row_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
