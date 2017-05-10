<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\Checkuser */
/* @var $form yii\widgets\ActiveForm */
  /*<?= $form->field($model, 'user_id')->textInput() ?>
   <?= $form->field($model, 'checkout')->textInput(['readonly' => true]) ?>
  <?= $form->field($model, 'status')->hiddenInput()->label(false, ['style'=>'display:none']); ?>

$date = date("Y-m-d H:i:s", time());
echo (new DateTime($date))->format("Y-m-d H:i:s");   //2014-10-03 10:39:16
echo '<br>';
echo Yii::$app->formatter->asTime($date, "php:Y-m-d H:i:s");  //2014-10-03 14:39:16
echo '<br>';
echo Yii::$app->formatter->asTime(time(), "php:Y-m-d H:i:s");  //2014-10-03 10:39:16
echo '<br>';
echo Yii::$app->formatter->asDatetime($date, "php:Y-m-d H:i:s"); //2014-10-03 14:39:16
echo '<br>';
echo Yii::$app->formatter->asDatetime($date, "php:Y-m-d H:i:s"); //2014-10-03 10:39:16
echo '<br>';
<?= $form->field($model, 'checkin')->textInput(['readonly' => true]) ?>

$date = date("Y-m-d H:i:s", time());
echo Yii::$app->formatter->asDatetime(strtotime($date), "php:Y-m-d H:i:s"); //2014-10-03 10:39:16
echo "<br>";
echo Yii::$app->formatter->asTime(strtotime($date), "php:H:i:s");
  */
//$date = date("Y-m-d H:i:s", time());
//->textInput(['maxlength' => true,'readonly'=>true,'value'=>$dataUser['username']])
//dropDownList($arrUser,['promt'=>'----',"Selected"=>false,"readonly"=>true]) 'value'=>$model->getUser() 'attribute'=>'user_id'
  ?>

<div class="checkuser-form">

    <?php $form = ActiveForm::begin(
           // ['enableClientValidation'=>false,]
    ); ?>

    <?= $form->field($model, 'user_id')->dropDownList($dataUser,['promt'=>'----',"readonly"=>true]) ?>


    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?php //Yii::$app->formatter->timeZone = 'Europe/Kiev';
    echo Yii::$app->formatter->asDatetime('now','php:Y-m-d H:i:s'); ?>

    <?= $form->field($model, 'status') ->dropDownList(['1'=>'Пришел','2'=>'Ушел'],['promt'=>'']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Записать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
