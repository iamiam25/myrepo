<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProfilnSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profiln-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'work_day') ?>

    <?= $form->field($model, 'rest_day') ?>

    <?= $form->field($model, 'work_hour') ?>

    <?php // echo $form->field($model, 'dinner_hour') ?>

    <?php // echo $form->field($model, 'FIO') ?>

    <?php // echo $form->field($model, 'filial') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
