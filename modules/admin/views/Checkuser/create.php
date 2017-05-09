<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Checkuser */

$this->title = 'Create Checkuser';
$this->params['breadcrumbs'][] = ['label' => 'Checkusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrUser'=>$arrUser,
    ]) ?>

</div>
