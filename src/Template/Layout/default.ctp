<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Aquaponics: Backend Built with CakePHP and Arduino';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css'); ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('custom.css') ?>
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script('jquery.min'); ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="<?= $this->Url->build('/') ?>">Aquaponics System</a></h1>
            </li>
        </ul>
        <?php 
            $is_logged_in = $this->request->session()->read('Auth.User'); 
        ?>
        <?php 
            if( !isset($force_hide) ):
        ?>
        <div class="top-bar-section">
            <ul class="right">
                <li><a href="#" id="time"></a></li>
                <?php if( $is_logged_in ): ?>
                <li>
                    <a href="#">Welcome, <?= ucfirst($is_logged_in['username']); ?></a>
                </li>
                <li id="my-account">
                    <?php $user_id = $is_logged_in['users_id']?>
                    <?php 
                        $profile_link = $is_logged_in['profile_img'];
                    ?>
                    <?php 
                    
                    if(!empty($profile_link)): ?>
                    <a href="/users/edit/<?= $is_logged_in['users_id']?>"><img src='/img/profiles/<?= $profile_link ?>'> My Account</a>
                    <?php else: ?>
                    <a href="/users/edit/<?=$is_logged_in['users_id']?>"><img src='/img/profile-default.jpg'> My Account</a>                        
                    <?php endif; ?>
                </li>
                <li>
                    <?= $this->Html->link('Logout',['controller' => 'Logins', 'action' => 'logout']) ?>
                </li>
                <?php endif; ?>
            </ul>
        </div>
            <?php endif; ?>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container-fluid clearfix" style="padding: 0px;" id="main-container">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
        <?= $this->Html->script('bootstrap.bundle.min'); ?>        
        <?= $this->Html->script('app'); ?>
        <script>
        window.onload = function(){date()}, setInterval(function(){date()}, 1000);

        function date() {
            var now = new Date(),
                now = (now.getMonth() + 1)+ "/" + now.getDate() +"/"+ now.getFullYear()+" "+now.getHours()+':'+now.getMinutes()+':'+now.getSeconds();
            $('#time').html(now);
        }
</script>
    </footer>
</body>
</html>
