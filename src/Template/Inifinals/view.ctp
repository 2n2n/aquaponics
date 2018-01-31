<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inifinal $inifinal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Back'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="inifinals view large-9 medium-8 columns content">
    <h3 style="margin-bottom: 0px;"><?= $this->Html->link("[#".$inifinal->initial->id."]", ['controller' => 'Initials', 'action' => 'view', $inifinal->initial->id]) ?> <?= ucfirst($inifinal->type->label) ?></h3>
    <h6><?= h($inifinal->created) ?></h6>
    <?php 
        $gross = $inifinal->quantity * $inifinal->unitprice; 
        $loss = ($inifinal->initial->quantity - $inifinal->quantity) * $inifinal->quantity;
        $net = $gross - $loss;
    ?>
    <table class="vertical-table medium-4 large-4">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= ucfirst($inifinal->kind->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= h($inifinal->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unitprice') ?></th>
            <td><?= h($inifinal->unitprice) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Gross Income') ?></th>
            <td><?= $this->Number->format($gross) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Loss') ?></th>
            <td style="color: red;"><?= $this->Number->format($loss * -1) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Net Income') ?></th>
            <td><?= $this->Number->format($net) ?></td>
        </tr>
    </table>
</div>
