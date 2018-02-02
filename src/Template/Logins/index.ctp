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
        <li id="uri-inifinals"><li><?= $this->Html->link(__('Sales Management'), ['controller' => 'Inifinals', 'action' => 'index']); ?></li>                </li>
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

<div class="users index large-9 medium-8 columns content">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Login Accounts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Roles</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3><?= __('Users') ?></h3>
            <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('mi') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contactnumber') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->firstname) ?></td>
                        <td><?= h($user->mi) ?></td>
                        <td><?= h($user->lastname) ?></td>
                        <td><?= h($user->contactnumber) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <h3><?= __('Logins') ?></h3>
            <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('roles_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($logins as $login): ?>
                    <tr>
                        <td><?= $this->Number->format($login->id) ?></td>
                        <td><?= h($login->username) ?></td>
                        <td>***********</td>
                        <td><?= $login->has('role') ? $this->Html->link($login->role->type, ['controller' => 'Roles', 'action' => 'view', $login->role->id]) : '' ?></td>
                        <td><?= $login->has('user') ? $this->Html->link($login->user->get('fullname'), ['controller' => 'Users', 'action' => 'view', $login->user->id]) : '' ?></td>
                        <td><?= h($login->created) ?></td>
                        <td><?= h($login->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $login->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $login->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $login->id], ['confirm' => __('Are you sure you want to delete # {0}?', $login->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>

        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <h3><?= __('Roles') ?></h3>
            <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $role): ?>
                    <tr>
                        <td><?= $this->Number->format($role->id) ?></td>
                        <td><?= h($role->type) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $role->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
        </div>
    </div>

</div>
