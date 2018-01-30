<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kind $kind
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $kind->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $kind->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Kinds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="kinds form large-9 medium-8 columns content">
    <?= $this->Form->create($kind) ?>
    <fieldset>
        <legend><?= __('Edit Kind') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('initialtypes_id', ['options' => $types]);
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>