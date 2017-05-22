<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 13.05.2017
 * Time: 14:34
 */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use app\models\User;
use yii\bootstrap\Modal;
use kartik\form\ActiveForm;///
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Checkuser */

$this->title = 'Создать очет';
$this->params['breadcrumbs'][] = ['label' => 'Tabel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        //'arrUser'=>$arrUser,
    ]) ?>

</div>

