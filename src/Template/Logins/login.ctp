<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kind[]|\Cake\Collection\CollectionInterface $kinds
 */
?>

<div class="content">
    <div class="row">
        <div class="col-md-4 col-lg-4" style="display:inline-block; margin: 0px auto;">
            <h1>Login</h1>
            <?= $this->Form->create() ?>
            <?= $this->Form->control('username') ?>
            <?= $this->Form->control('password') ?>
            <?= $this->Form->button('Login') ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
