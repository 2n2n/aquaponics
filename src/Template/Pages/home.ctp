<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Login[]|\Cake\Collection\CollectionInterface $logins
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Aquaponics Dashboard') ?></li>
        <li><?= $this->Html->link(__('Aquaponics Management'), ['controller' => 'Initials', 'action' => 'index']) ?></li>        
        <li><?= $this->Html->link(__('Accounts & User Management'), ['controller' => 'Logins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Logs'), ['controller' => 'Ponds', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="logins index large-9 medium-8 columns content">
    <h3><?= __('Aquaponics Dashboard') ?></h3>
    <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate molestiae eveniet, aliquid ex in recusandae nam tempora eligendi officia ut fuga, dolorum dicta rerum, quibusdam odit omnis! Expedita, quasi quis.</p>
</div>
