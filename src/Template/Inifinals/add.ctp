<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inifinal $inifinal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Inifinals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Initials'), ['controller' => 'Initials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Initial'), ['controller' => 'Initials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inifinals form large-9 medium-8 columns content">
    <?= $this->Form->create($inifinal) ?>
    <fieldset>
        <legend><?= __('Harvest') ?></legend>
        <table>
            <tr>
                <td>Entry ID</td>
                <td>#<?= $initials->id ?></td>
            </tr>
            <tr>
                <td>Kind</td>
                <td><?= $initials->kind->name ?></td>
            </tr>
            <tr>
                <td>Type</td>
                <td><?= ucfirst($initials->type->label) ?></td>
            </tr>
            <tr>
                <td>Initial Quantity</td>
                <td><?= ucfirst($initials->quantity) ?></td>
            </tr>
            <tr>
                <td>Initial Unit Price</td>
                <td>P<?= ucfirst($initials->unitprice) ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>On-going</td>
            </tr>
        </table>
        <div class="row">
                <div class="col-md-6 col-sm-6">
                    <?php
                        echo $this->Form->control('quantity',['label' => 'Kilograms']);
                        echo $this->Form->control('unitprice');
                        echo $this->Form->control('initials_id', ['type' => 'hidden', 'value' => $initials->id]);
                        echo $this->Form->control('initials_kinds_id',['type' => 'hidden', 'value' => $initials->kinds_id]);
                        echo $this->Form->control('initials_kinds_initialtypes_id',['type' => 'hidden', 'value' => $initials->kinds_initialtypes_id]);            
                    ?>
                </div>
            </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
