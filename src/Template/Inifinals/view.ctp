<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inifinal $inifinal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Back'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="inifinals view large-9 medium-8 columns content">
    <h3><?= h($inifinal->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= h($inifinal->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unitprice') ?></th>
            <td><?= h($inifinal->unitprice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Initial') ?></th>
            <td><?= $inifinal->has('initial') ? $this->Html->link($inifinal->initial->id, ['controller' => 'Initials', 'action' => 'view', $inifinal->initial->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($inifinal->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Initials Id') ?></th>
            <td><?= $this->Number->format($inifinal->initials_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Initials Kinds Id') ?></th>
            <td><?= $this->Number->format($inifinal->initials_kinds_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($inifinal->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($inifinal->modified) ?></td>
        </tr>
    </table>
</div>
