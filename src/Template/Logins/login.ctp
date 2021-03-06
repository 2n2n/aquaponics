<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kind[]|\Cake\Collection\CollectionInterface $kinds
 */
?>

<div class="content">
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <h1>Login</h1>
            <?= $this->Form->create() ?>
            <?= $this->Form->control('username') ?>
            <?= $this->Form->control('password') ?>
            <?= $this->Form->button('Login') ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="col-md-8" id="landing-img">
            <img src="/img/logo.png" alt="" class="img-responsive">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Id error cupiditate nam beatae. Libero unde est vero necessitatibus quae vitae obcaecati reiciendis praesentium, consequuntur blanditiis accusantium expedita temporibus commodi delectus.
            </p>
        </div>
    </div>
</div>
