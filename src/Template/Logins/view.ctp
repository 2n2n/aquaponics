<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Login $login
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Back'), ['controller' => 'logins', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="logins view large-9 medium-8 columns content">
    <h3><?= h($login->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($login->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($login->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $login->has('role') ? $this->Html->link($login->role->id, ['controller' => 'Roles', 'action' => 'view', $login->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $login->has('user') ? $this->Html->link($login->user->id, ['controller' => 'Users', 'action' => 'view', $login->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($login->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($login->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($login->modified) ?></td>
        </tr>
    </table>
</div>
