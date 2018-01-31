<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kind[]|\Cake\Collection\CollectionInterface $kinds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fish/Plant Kind'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Back'), ['controller' => 'Initials', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="kinds index large-9 medium-8 columns content">
    <h3><?= __('Kinds') ?></h3>
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
