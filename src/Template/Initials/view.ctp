<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $initial
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if($initial->status == 'on-going'): ?>
        <li><?= $this->Html->link(__('Edit Initial Entry'), ['action' => 'edit', $initial->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Initial Entry'), ['action' => 'delete', $initial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $initial->id)]) ?> </li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('Back'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="initials view large-9 medium-8 columns content">
        <h3 style="margin-bottom: 0px;"><?= $this->Html->link("[#".$initial->id."]", ['controller' => 'Initials', 'action' => 'view', $initial->id]) ?> <?= ucfirst($initial->type->label) ?></h3>
    <table class="vertical-table medium-4 large-4">
         <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= ucfirst($initial->kind->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= h($initial->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unitprice') ?></th>
            <td>P<?= h($initial->unitprice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Encoder') ?></th>
            <td><?= h($initial->user->fullname) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= ucfirst(h($initial->status)) ?></td>
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
