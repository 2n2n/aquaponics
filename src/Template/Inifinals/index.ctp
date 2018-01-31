<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Inifinal[]|\Cake\Collection\CollectionInterface $inifinals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Back'), ['controller' => 'Initials','action' => 'index']) ?></li>
    </ul>
</nav>
<div class="inifinals index large-9 medium-8 columns content">
    <h3><?= __('Sales Report') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('initials_id', 'Type') ?></th>
                <th scope="col"><?= __('Gross Profit') ?></th>
                <th scope="col"><?= __('Net Profit') ?></th></th>
                <th scope="col"><?= $this->Paginator->sort('Inifinals.Initials.fullname', 'Encoder') ?></th>                
                <th scope="col"><?= $this->Paginator->sort('created', 'Harvest Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inifinals as $inifinal): ?>
            <tr>
                <td>
                    [#<?= $this->Number->format($inifinal->initials_id) ?>]
                    <?= ucfirst($inifinal->type->label) . ' - '. ucfirst($inifinal->kind->name) ?> 
                </td>
                <td>
                    P
                        <?php 
                        echo $this->Number->format($inifinal->quantity * $inifinal->unitprice)
                    ?>
                </td>
                <td>
                    P <?php 
                        $gross = $inifinal->quantity * $inifinal->unitprice;
                        $net = $gross - (($inifinal->initial->quantity - $inifinal->quantity) * $inifinal->unitprice);
                        echo $this->Number->format($net);
                    ?>
                </td>
                <td><?= h($inifinal->initial->user->fullname) ?></td>                
                <td><?= h($inifinal->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $inifinal->id]) ?>
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