<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kind[]|\Cake\Collection\CollectionInterface $kinds
 */
?>
<div class="index large-12 medium-12 columns content">
    <h1>Login</h1>
    <?= $this->Form->create() ?>
    <?= $this->Form->control('username') ?>
    <?= $this->Form->control('password') ?>
    <?= $this->Form->button('Login') ?>
    <?= $this->Form->end() ?>
</div>
