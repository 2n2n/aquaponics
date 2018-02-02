<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pond $pond
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pond'), ['action' => 'edit', $pond->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pond'), ['action' => 'delete', $pond->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pond->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ponds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pond'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ponds view large-9 medium-8 columns content">
    <h3><?= h($pond->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $pond->has('user') ? $this->Html->link($pond->user->label, ['controller' => 'Users', 'action' => 'view', $pond->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pondscol') ?></th>
            <td><?= h($pond->pondscol) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pond->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phlevel') ?></th>
            <td><?= $this->Number->format($pond->phlevel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Templevel') ?></th>
            <td><?= $this->Number->format($pond->templevel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Turblevel') ?></th>
            <td><?= $this->Number->format($pond->turblevel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waterlevel') ?></th>
            <td><?= $this->Number->format($pond->waterlevel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pond->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pond->modified) ?></td>
        </tr>
    </table>
</div>
