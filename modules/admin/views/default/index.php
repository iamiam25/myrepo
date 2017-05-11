<?php

use yii\helpers\Url;
?>
<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <h3>
        <a href="<?=Url::to(['/admin/checkuser/index'], true);?>"> Приход/уход(ред.)</a>
    </h3>
    <h3>
        <a href="<?=Url::to(['/admin/profiln/index'], true);?>">Профиль (ред.) </a>
    </h3>
    <h3>
        <a href="<?=Url::to(['/checkuser/index'], true);?>"> На сайт!</a>
    </h3>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>

</div>
