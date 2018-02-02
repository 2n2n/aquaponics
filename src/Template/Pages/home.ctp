<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Login[]|\Cake\Collection\CollectionInterface $logins
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Aquaponics Dashboard') ?></li>
        <li id="uri-home"><?= $this->Html->link(__('Aquaponics Dashboard'), ['controller' => 'Pages', 'action' => 'index']) ?></li>
        <li id="uri-initials">
            <?= $this->Html->link(__('Aquaponics Management'), ['controller' => 'Initials', 'action' => 'index']) ?>
            <ul>
                <li id="uri-ponds"><?= $this->Html->link(__('Logs'), ['controller' => 'Ponds', 'action' => 'index']) ?></li>
            </ul>
        </li>
        <li id="uri-kinds"><?= $this->Html->link(__('Kinds Management'), ['controller' => 'Kinds', 'action' => 'index']); ?></li>
        <li id="uri-inifinals"><?= $this->Html->link(__('Sales Management'), ['controller' => 'Inifinals', 'action' => 'index']); ?></li>
        <li id="uri-logins">
            <?= $this->Html->link(__('Accounts and Users'), ['controller' => 'Logins', 'action' => 'index']) ?>
            <ul>
                <li id="uri-logins"><?= $this->Html->link(__('Accounts Overview'), ['controller' => 'Logins', 'action' => 'index']) ?></li>
                <li id="uri-roles"><?= $this->Html->link(__('Add Roles'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
                <li id="uri-users"><?= $this->Html->link(__('Add User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                <li id="uri-logins"><?= $this->Html->link(__('Add Account Login'), ['controller' => 'Logins', 'action' => 'add']) ?></li>
            </ul>
        </li>
    </ul>
</nav>
<div class="logins index large-9 medium-8 columns content">
    <h3><?= __('Aquaponics Dashboard') ?></h3>
    <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate molestiae eveniet, aliquid ex in recusandae nam tempora eligendi officia ut fuga, dolorum dicta rerum, quibusdam odit omnis! Expedita, quasi quis.</p>
</div>
