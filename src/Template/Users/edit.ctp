<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if(isset($is_mine)): ?>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link(__('Back'), ['controller' => 'Logins','action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <div class="row">
        <?php if($is_mine): ?>
        <div class="col-md-3">
            <?php if( !empty($profile_img) ): ?>
                <img src="<?= "/img/profiles/".$profile_img; ?>" 
                    alt="<?= $login->username ?> profile image."
                    class="image-responsive">
            <?php endif ?>
            <?= $this->Form->create($login, ['type' => 'file']) ?>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                <?= $this->Form->control('pictures', ['type' => 'file']); ?>
                <?= $this->Form->control('edit_profilepic', ['value' => true, 'type' => 'hidden']); ?>
             <?= $this->Form->end() ?>
        </div>
        <?php endif; ?>
        <div class="col-md-7 col-lg-7" style="margin:0px auto;">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('firstname');
                    echo $this->Form->control('mi');
                    echo $this->Form->control('lastname');
                    echo $this->Form->control('contactnumber');
                    echo $this->Form->control('email');
                ?>
            </fieldset>
            
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>

    $(function() {
        $("input[type='file']").on('change', function(e) {
            var form = $(this).closest('form');
            form.submit();
        })
    })
</script>
