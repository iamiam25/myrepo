<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use app\models\User;
use yii\bootstrap\Modal;
use kartik\form\ActiveForm;///
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Checkuser */
/* @var $form yii\widgets\ActiveForm */
  /*<?= $form->field($model, 'user_id')->textInput() ?>
   <?= $form->field($model, 'status')->hiddenInput()->label(false, ['style'=>'display:none']); ?>
  <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(),'id','username'),
        ['prompt' => '---Select Data---','style'=>'width:205px'])->label('Пользователь'); ?>
  */
?>

<div class="checkuser-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(),'id','username'),
        ['prompt' => '---Select Data---','style'=>'width:205px'])->label('Пользователь'); ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?php //Yii::$app->formatter->timeZone = 'Europe/Kiev';
    echo Yii::$app->formatter->asDatetime('now','php:d-m-Y H:i:s');
    //['value' =>Yii::$app->formatter->asDatetime('now','php:Y-m-d H:i:s')]
    //if(!empty($model->checkin)){
     //   $model->checkin = date('Y-m-d H:i:s', $model->checkin);
  //  }
    /* <?= $form->field($model, 'checkin')->widget(\yii\jui\DatePicker::classname(), [
            'language' => 'ru',
            'dateFormat' => 'php:d-m-Y H:i:s',
        ])
        ?>*/
?>
    <?= $form->field($model, 'checkin')->widget(DateTimePicker::classname(), [
       //'value' => Yii::$app->formatter->asDatetime($model->checkin),
        'convertFormat' => true,
        'size' => 'mx',
        'pluginOptions' => [
            'calendarWeeks' => true,
           // 'daysOfWeekDisabled' => [0, 6],
            'startDate' => date('php:d-m-Y H:i'),
            'todayBtn' => true,
            'format' => 'php:d-m-Y H:i',
            'autoclose' => true,
            'todayHighlight' => true
        ]
  /*  $form->field($model, 'checkin')->widget(DateTimePicker::classname(), [
        'convertFormat' => true,
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose' => true,

            //'todayHighlight' => true
        ]*/
    ])
    ?>


    <?= $form->field($model, 'status') ->dropDownList(['1'=>'Пришел','2'=>'Ушел'],['promt'=>''])  ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
