<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;


$this->title = 'Приход/уход';
$this->params['breadcrumbs'][] = $this->title;
$layout3 = <<< HTML
    <span class="input-group-addon"></span>
    {input1}
   
    <span class="input-group-addon"></span>
    {input2}    
    <span class="input-group-addon kv-date-remove">
       <i class="glyphicon glyphicon-remove"></i> 
    </span>
HTML;
?>
<div class="checkuser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'pager' => [
            'firstPageLabel' => 'Первая страница',
            'lastPageLabel'  => 'Последняя страница'
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            [
                'attribute' =>'user_id',
                'value' => 'user.username',
                'filter'=>false,
            ],
            'comment',
            [
                'attribute' => 'checkin',
                'label'=>'Дата/Время',
                'format'=>['date', 'php:d-m-Y H:i'], // Доступные модификаторы - date:datetime:time
                'headerOptions' => ['width' => '190'],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    //'value' => date('d-M-Y', strtotime('-2 days')),
                    // 'value2' => date('d-M-Y', strtotime('+2 days')),
                    'attribute' => 'str_date',
                    'attribute2' => 'end_date',
                    'options' => ['placeholder' => 'Start date'],
                    'options2' => ['placeholder' => 'End date'],
                    //  'convertFormat' => true,
                    'separator' => '<i class="glyphicon glyphicon-resize-horizontal"></i>',
                    'layout' => $layout3,
                    'type' => DatePicker::TYPE_RANGE,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',

                        // 'todayBtn' => true
                    ]
                ]),

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