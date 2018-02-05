<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pond[]|\Cake\Collection\CollectionInterface $ponds
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
<div class="ponds index large-9 medium-8 columns content">
    <h3><?= __('Logs Monitoring') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pondscol') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phlevel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('templevel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('turblevel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waterlevel') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ponds as $pond): ?>
            <tr>
                <td><?= h($pond->created) ?></td>
                <td><?= h($pond->modified) ?></td>
                <td><?= $pond->has('user') ? $this->Html->link($pond->user->label, ['controller' => 'Users', 'action' => 'view', $pond->user->id]) : '' ?></td>
                <td><?= h($pond->pondscol) ?></td>
                <td><?= $this->Number->format($pond->phlevel) ?></td>
                <td><?= $this->Number->format($pond->templevel) ?></td>
                <td><?= $this->Number->format($pond->turblevel) ?></td>
                <td><?= $this->Number->format($pond->waterlevel) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pond->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pond->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pond->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pond->id)]) ?>
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
