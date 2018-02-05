<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $initials
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
        <?php 
        $role = $this->request->session()->read('Auth.User');
        if( !is_null($role) ):
            if($role['roles_id'] == 1):
        ?>
        <li id="uri-logins">
            <?= $this->Html->link(__('Accounts and Users'), ['controller' => 'Logins', 'action' => 'index']) ?>
            <ul>
                <li id="uri-logins"><?= $this->Html->link(__('Accounts Overview'), ['controller' => 'Logins', 'action' => 'index']) ?></li>
                <li id="uri-roles"><?= $this->Html->link(__('Add Roles'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
                <li id="uri-users"><?= $this->Html->link(__('Add User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                <li id="uri-logins"><?= $this->Html->link(__('Add Account Login'), ['controller' => 'Logins', 'action' => 'add']) ?></li>
            </ul>
        </li>
        <?php
            endif; 
        endif; ?>
    </ul>
</nav>
<div class="initials index large-9 medium-8 columns content">
    <h3><?= __('Aquaponics Management') ?></h3>
    <div class="action-btn-container">
        <div class="large-12 medium-12 columns">
            <?= $this->Html->link(__('+ Add Initial Entry'), ['controller' => 'Initials', 'action' => 'add'], ['class' => 'btn btn-warning']) ?>
        </div>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('kinds_initialtypes_id', 'Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity', 'Qty') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unitprice', 'Unit Price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id', 'Encoder') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status', 'Status') ?></th>                
                <th scope="col">
                    <?= $this->Paginator->sort('created') ?>
                    <br/>
                    <?= $this->Paginator->sort('modified') ?>
                </th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($initials as $initial): ?>
            <tr>
                <td><?= "[". $initial->id ."]  ". ucfirst($initial->type->label) ." - ". ucfirst($initial->kind->name) ?></td>
                <td><?= h($initial->quantity) ?></td>
                <td><?= h($initial->unitprice) ?></td>
                <td><?= $initial->user->fullname ?></td>
                <td><?= h($initial->status) ?></td>                
                <td>
                    <?= h($initial->created) ?>
                    <br>
                    <?= h($initial->modified) ?>
                </td>
                <td class="actions">
                    <div><?= $this->Html->link(__('View'), ['action' => 'view', $initial->id]) ?></div>
                    <?php if($initial->status == 'on-going'): ?>
                    <div><?= $this->Html->link(__('Edit'), ['action' => 'edit', $initial->id]) ?></div>
                    <div><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $initial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $initial->id)]) ?></div>
                    <div><?= $this->Form->postLink(__('Harvest'), ['controller' => 'Inifinals','action' => 'add', $initial->id], ['confirm' => __('Are you sure you want to harvest # {0}?', $initial->id), 'method' => 'get']) ?></div>                    
                    <?php endif; ?>
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
