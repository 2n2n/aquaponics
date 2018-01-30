<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $initial
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Initial'), ['action' => 'edit', $initial->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Initial'), ['action' => 'delete', $initial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $initial->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Initials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Initial'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="initials view large-9 medium-8 columns content">
    <h3><?= h($initial->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= h($initial->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unitprice') ?></th>
            <td><?= h($initial->unitprice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($initial->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kinds Id') ?></th>
            <td><?= $this->Number->format($initial->kinds_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kinds Initialtypes Id') ?></th>
            <td><?= $this->Number->format($initial->kinds_initialtypes_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Users Id') ?></th>
            <td><?= $this->Number->format($initial->users_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($initial->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($initial->modified) ?></td>
        </tr>
    </table>
</div>
