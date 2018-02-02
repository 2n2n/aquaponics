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
        <li><?= $this->Html->link(__('Back'), ['controller' => 'Kinds','action' => 'index']) ?></li>
    </ul>
</nav>
<div class="kinds form large-9 medium-8 columns content">
    <?= $this->Form->create($kind) ?>
    <fieldset>
        <legend><?= __('Edit Kind') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('types_id', ['options' => $types]);
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
