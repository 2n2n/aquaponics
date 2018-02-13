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
        <?php 
        $role = $this->request->session()->read('Auth.User');
        if( !is_null($role) ):
            if($role['roles_id'] == 1):
        ?>
        <li id="uri-logins">
            <?= $this->Html->link(__('Accounts and Users'), ['controller' => 'Logins', 'action' => 'index']) ?>
            <ul>
                <li id="uri-logins"><?= $this->Html->link(__('Accounts Overview'), ['controller' => 'Logins', 'action' => 'index']) ?></li>
                <li id="uri-roles"><?= $this->Html->link(__('Add Roles'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
                <li id="uri-users"><?= $this->Html->link(__('Add User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                <li id="uri-logins"><?= $this->Html->link(__('Add Account Login'), ['controller' => 'Logins', 'action' => 'add']) ?></li>
            </ul>
        </li>
        <?php
            endif; 
        endif; ?>
    </ul>
</nav>
<div class="logins index large-9 medium-8 columns content">
    <h3 class="text-center"><?= __('Welcome to integrated Aquaponics Management System') ?></h3>
    <p id="landing-img">
        <img src="/img/logo.png" alt="aquaponics image" >
        <canvas id="myChart" style="width:100%; min-height: 200px;"></canvas>
    </p>
</div>


<script> 
    const socket = io('http://0.0.0.0:4000');

   var ctx = document.getElementById("myChart");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [],
        datasets: [
            {
                label: 'PH LEVEL',
                data: [],
                backgroundColor: [
                    'rgba(40, 141, 145, 0.2)'
                ],
                borderColor: [
                    'rgba(40, 141, 145,1)'
                ],
                borderWidth: 1
            },
            {
                label: 'TEMPRATURE LEVEL',
                data: [],
                backgroundColor: [
                    'rgba(232, 87, 66, 0.2)'
                ],
                borderColor: [
                    'rgba(232, 87, 66, 1)'
                ],
                borderWidth: 1
            },
            {
                label: 'TURBIDITY LEVEL',
                data: [],
                backgroundColor: [
                    'rgba(240, 157, 48, 0.2)'
                ],
                borderColor: [
                    'rgba(240, 157, 48, 1)'
                ],
                borderWidth: 1
            },
            {
                label: 'WATER LEVEL',
                data: [],
                backgroundColor: [
                    'rgba(52, 72, 136, 0.2)'
                ],
                borderColor: [
                    'rgba(52, 72, 136, 1)'
                ],
                borderWidth: 1
            },
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
    socket.on('arduino-shout', function(_data) {
        myLineChart.config.data.datasets[0].data.push(_data.phlevel);
        myLineChart.config.data.datasets[1].data.push(_data.templevel);
        myLineChart.config.data.datasets[2].data.push(_data.turblevel);
        myLineChart.config.data.datasets[3].data.push(_data.waterlevel);
        
        var date = moment(_data.c).format('lll');;
        myLineChart.config.data.labels.push(date);
        myLineChart.update();
    });

    
</script>