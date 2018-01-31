<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $initial
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Back'), ['controller' => 'Initials', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="initials form large-9 medium-8 columns content">
    <?= $this->Form->create($initial) ?>
    <fieldset>
        <legend><?= __('Add Initial Entry') ?></legend>
        <?php
            if( count( $kinds->toArray() ) > 0 ) {
                echo $this->Form->control('kinds_id', [
                    'options' => $kinds,
                    'type' => 'select'
                ]);            
                echo $this->Form->control('quantity');
                echo $this->Form->control('unitprice');
            }
            else {
                echo "<span style='color: red; margin-bottom: 20px; display: inline-block;'>No Fish/Plant Kind in the Database </span>";
                echo "<p>";
                echo $this->Html->link(
                    'Proceed Fish/Plant Kind Management',
                    '/kinds',
                    ['class' => 'warning button', 'target' => '_blank']
                );
                echo "</p>";
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
