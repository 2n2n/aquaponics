<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inifinal $inifinal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $inifinal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $inifinal->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Inifinals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Initials'), ['controller' => 'Initials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Initial'), ['controller' => 'Initials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inifinals form large-9 medium-8 columns content">
    <?= $this->Form->create($inifinal) ?>
    <fieldset>
        <legend><?= __('Edit Inifinal') ?></legend>
        <?php
            echo $this->Form->control('quantity');
            echo $this->Form->control('unitprice');
            echo $this->Form->control('initials_id');
            echo $this->Form->control('initials_kinds_id');
            echo $this->Form->control('initials_kinds_initialtypes_id', ['options' => $initials]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
