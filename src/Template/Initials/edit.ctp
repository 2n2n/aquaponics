<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $initial
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $initial->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $initial->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Initials'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="initials form large-9 medium-8 columns content">
    <?= $this->Form->create($initial) ?>
    <fieldset>
        <legend><?= __('Edit Initial') ?></legend>
        <?php
            echo $this->Form->control('quantity');
            echo $this->Form->control('unitprice');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
