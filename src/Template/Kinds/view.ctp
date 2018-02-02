<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kind $kind
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Back'), ['controller' => 'Kinds', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="kinds view large-9 medium-8 columns content">
    <h3><?= h($kind->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($kind->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $kind->has('type') ? $this->Html->link($kind->type->id, ['controller' => 'Types', 'action' => 'view', $kind->type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($kind->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($kind->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($kind->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($kind->created) ?></td>
        </tr>
    </table>
</div>
