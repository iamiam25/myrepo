<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;
use kartik\form\ActiveForm;///
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\CheckuserSearch */
/* @var $form yii\widgets\ActiveForm */
/*<?= $form->field($model, 'id') ?>*/
?>

<div class="checkuser-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
    ]); ?>



    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(),'id','username'),
        ['prompt' => '---Select Data---','style'=>'width:205px'])->label('Пользователь'); ?>

    <?php echo '<label class="control-label">Выберите период даты</label>'; ?>

    <?php echo DatePicker::widget([
    'model' => $model,
    //'value' => date('d-M-Y', strtotime('-10 days')),
    //'value2' => date('d-M-Y', strtotime('+10 days')),
    'attribute' => 'str_date',
    'attribute2' => 'end_date',
    'options' => ['placeholder' => 'Start date'],
    'options2' => ['placeholder' => 'End date'],
    //  'convertFormat' => true,
    'language' => 'ru',
       // the input - 'lg', 'md', 'sm', 'xs'
      'size' => 'md',
    'type' => DatePicker::TYPE_RANGE,
    'pluginOptions' => [
    'autoclose' => true,
    'format' => 'dd-mm-yyyy',

    // 'todayBtn' => true
    ]
    ]); ?>
    <div class="form-group">--------------------</div>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
