<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $initials
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Aquaponics Management'), ['controller' => 'Initials', 'action' => 'index']) ?></li>        
        <li><?= $this->Html->link(__('Account Management'), ['controller' => 'Logins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('User Management'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Role Management'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="initials index large-9 medium-8 columns content">
    <h3><?= __('Aquaponics Management') ?></h3>
    <?= $this->Html->link(__('Add Entry'), ['action' => 'add', 'class']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unitprice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kinds_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kinds_initialtypes_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($initials as $initial): ?>
            <tr>
                <td><?= $this->Number->format($initial->id) ?></td>
                <td><?= h($initial->quantity) ?></td>
                <td><?= h($initial->unitprice) ?></td>
                <td><?= $this->Number->format($initial->kinds_id) ?></td>
                <td><?= $this->Number->format($initial->kinds_initialtypes_id) ?></td>
                <td><?= $this->Number->format($initial->users_id) ?></td>
                <td><?= h($initial->created) ?></td>
                <td><?= h($initial->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $initial->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $initial->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $initial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $initial->id)]) ?>
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
