<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kind[]|\Cake\Collection\CollectionInterface $kinds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Aquaponics Dashboard') ?></li>
        <li id="uri-home"><?= $this->Html->link(__('Aquaponics Dashboard'), ['controller' => 'Pages', 'action' => 'index']) ?></li>
        <li id="uri-initials">
            <?= $this->Html->link(__('Aquaponics Management'), ['controller' => 'Initials', 'action' => 'index']) ?>
            <ul>
                <li id="uri-ponds"><?= $this->Html->link(__('Logs'), ['controller' => 'Ponds', 'action' => 'index']) ?></li>
            </ul>
        </li>
        <li id="uri-kinds"><?= $this->Html->link(__('Kinds Management'), ['controller' => 'Kinds', 'action' => 'index']); ?></li>
        <li id="uri-inifinals"><?= $this->Html->link(__('Sales Management'), ['controller' => 'Inifinals', 'action' => 'index']); ?></li>
        <li id="uri-logins">
            <?= $this->Html->link(__('Accounts and Users'), ['controller' => 'Logins', 'action' => 'index']) ?>
            <ul>
                <li id="uri-logins"><?= $this->Html->link(__('Accounts Overview'), ['controller' => 'Logins', 'action' => 'index']) ?></li>
                <li id="uri-roles"><?= $this->Html->link(__('Add Roles'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
                <li id="uri-users"><?= $this->Html->link(__('Add User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                <li id="uri-logins"><?= $this->Html->link(__('Add Account Login'), ['controller' => 'Logins', 'action' => 'add']) ?></li>
            </ul>
        </li>
    </ul>
</nav>
<div class="kinds index large-9 medium-8 columns content">
    <h3><?= __('Kinds Management') ?></h3>
    <div>
        <div class=" large-7 medium-7 column">
            <?= $this->Html->link(__('Add New Kind'), ['action' => 'add'], ['class' => 'btn btn-warning']) ?>
        </div>
        <div class="dropdown large-5 medium-5 column">
            <select name="" id="type">
                <option value="all">All</option>
                <option value="fishes">Fishes</option>
                <option value="plants">Plants</option>        
            </select>
        </div>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('initialtypes_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kinds as $kind): ?>
            <tr>
                <td><?= $this->Number->format($kind->id) ?></td>
                <td><?= h($kind->name) ?></td>
                <td><?= $kind->has('type') ? $this->Html->link(ucfirst($kind->type->label), ['controller' => 'Types', 'action' => 'view', $kind->type->id]) : '' ?></td>
                <td><?= h($kind->description) ?></td>
                <td><?= h($kind->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $kind->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $kind->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $kind->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kind->id)]) ?>
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
