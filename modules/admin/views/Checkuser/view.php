<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Checkuser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Приход/уход', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkuser-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'comment',
            'checkin',
            'status',
        ],
    ]) ?>

</div>
