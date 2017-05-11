<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfilnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profilns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profiln-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Profiln', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            [
            'attribute' => 'user_id',
                'label' => 'Login',
            'value' => 'user.username',
           // 'filter'=>$arrUser,
            ],
            'FIO',
            'filial',
            [
                'attribute' => 'work_day',
                'headerOptions' => ['width' => '80'],
            ],
            [
                'attribute' =>'rest_day',
            'headerOptions' => ['width' => '70'],
            ],
            [
                'attribute' =>'work_hour',
            'headerOptions' => ['width' => '70'],
            ],
            [
                'attribute' =>'dinner_hour',
            'headerOptions' => ['width' => '60'],
             ],

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '70']
            ],
        ],
    ]); ?>
</div>
