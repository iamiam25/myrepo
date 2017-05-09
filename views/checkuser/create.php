<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Checkuser */

$this->title = 'Добавить запись';
$this->params['breadcrumbs'][] = ['label' => 'Приход/уход', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataUser'=>$dataUser,
    ]) ?>

</div>
