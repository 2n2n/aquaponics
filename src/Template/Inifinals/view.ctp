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
    <a href="javascript:void(0)" class="button" onclick="printReport()">Print</a>
    <?php 
        $gross = $inifinal->quantity * $inifinal->unitprice; 
        $loss = ($inifinal->initial->quantity - $inifinal->quantity) * $inifinal->quantity;
        $net = $gross - $loss;
    ?>
    <div id="printable">
        <div class="medium-5 large-5 columns">
            <h2>Initial Entry:</h2>
            <table class="vertical-table">
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= ucfirst($initial->kind->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Quantity') ?></th>
                    <td><?= h($initial->quantity) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Unitprice') ?></th>
                    <td>P<?= h($initial->unitprice) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Encoder') ?></th>
                    <td><?= h($initial->user->fullname) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Status') ?></th>
                    <td><?= ucfirst(h($initial->status)) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($initial->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($initial->modified) ?></td>
                </tr>
            </table>
        </div>

        <div class="medium-5 large-5 columns">
            <h2>Final Entry:</h2>
            <table class="vertical-table">
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
                    <td>P<?= h($inifinal->unitprice) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Gross Income') ?></th>
                    <td>P<?= $this->Number->format($gross) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Loss') ?></th>
                    <td style="color: red;">P<?= $this->Number->format($loss * -1) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Net Income') ?></th>
                    <td>P<?= $this->Number->format($net) ?></td>
                </tr>
            </table >
        </div>
    </div>
</div>
<script>
    var printReport = function() {
        var prtContent = document.getElementById("printable");
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    } 
</script>