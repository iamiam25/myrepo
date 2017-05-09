<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Приход/уход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkuser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            [
                'attribute' =>'user_id',
                'value' => 'user.username',
                'filter'=>$arrUser,
            ],
            'comment',
            [
                'attribute' => 'checkin',
                'label'=>'Дата',
                'format'=>['date', 'php:d-m-Y'], // Доступные модификаторы - date:datetime:time
                'headerOptions' => ['width' => '100'],
                //'filter' => \yii\jui\DatePicker::widget(\yii\jui\DatePicker::className(), ['language' => 'ru', 'dateFormat' => 'php:Y-m-d']),
           // 'filter' => \yii\jui\DatePicker::widget([
          //      'model'=>$searchModel,
          //      'attribute'=>'checkin',
           //     'language' => 'ru',
          //      'dateFormat' => 'php:Y-m-d',
         //   ]),
           // 'format' => 'html',
            ],
            [
                'attribute' => 'checkin',
                'label'=>'Время',
                'format'=>['time', 'php:H:i'], // Доступные модификаторы - date:datetime:time
                'headerOptions' => ['width' => '80'],

            ],
            [
                'attribute'=>'status',
                'value'=>function($model) {
                    if($model->status == 1)return 'Пришел';
                    elseif($model->status == 2)return 'Ушел' ;
                    else return 0 ;
                },
                'filter'=>array('0'=>'нет','1'=>'Пришел','2'=>'Ушел'),
                'headerOptions' => ['width' => '120'],
            ],

            ['class' => 'yii\grid\ActionColumn',
            'template' => ''
            ],
        ],
    ]); ?>

</div>