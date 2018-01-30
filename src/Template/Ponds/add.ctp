<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pond $pond
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ponds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ponds form large-9 medium-8 columns content">
    <?= $this->Form->create($pond) ?>
    <fieldset>
        <legend><?= __('Add Pond') ?></legend>
        <?php
            echo $this->Form->control('pondscol');
            echo $this->Form->control('phlevel');
            echo $this->Form->control('templevel');
            echo $this->Form->control('turblevel');
            echo $this->Form->control('waterlevel');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
