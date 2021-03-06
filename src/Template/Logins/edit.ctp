<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Login $login
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $login->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $login->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Back'), ['controllers' => 'Logins', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="logins form large-9 medium-8 columns content">
    <?= $this->Form->create($login) ?>
    <fieldset>
        <legend><?= __('Edit Login') ?></legend>
        <?php
        
            echo $this->Form->control('username');
            echo $this->Form->control('password', ['value' => '']);
            echo $this->Form->control('roles_id', ['options' => $roles, 'type' => 'select']); 
            echo $this->Form->control('users_id', ['options' => $users, 'type' => 'select' ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
