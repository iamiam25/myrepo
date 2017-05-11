<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\CheckuserSearch */
/* @var $form yii\widgets\ActiveForm */
/*<?= $form->field($model, 'id') ?>*/
?>

<div class="checkuser-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>



    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(),'id','username'),
        ['prompt' => '---Select Data---','style'=>'width:205px'])->label('Пользователь'); ?>
    <?= $form->field($model, 'comment') ?>

    <?= $form->field($model, 'checkin') ?>


    <?php  echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
