<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
//use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CheckuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
//<!--h1><?=// Html::encode($this->title) ></h1-->
?>
<div class="checkuser-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Новая Запись', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Фильтр вык', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'pager' => [
            'firstPageLabel' => 'Первая страница',
            'lastPageLabel'  => 'Последняя страница'
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'layout' => "{summary}\n{items}\n<div class='text-center'>{pager}</div>",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['width' => '38'],
            ],

           // 'id',
       /*     [
                'attribute' =>'filial',
                'label'=>'Филиал',
                'value' => 'user.filial',
           //     'filter'=>$arrFilial,
                'headerOptions' => ['width' => '80'],
            ],*/
            [
                'attribute' =>'user_id',
                'value' => 'user.username',
                'filter'=>$arrUser,
            ],
            'comment',
            /* [
                 'attribute' => 'str_date',
                 'label'=>'differ',
                 //'value' => 'checkin',
                 'value' =>function($model) {
                     $launchDate = new DateTime(Yii::$app->formatter->asDate(), new DateTimeZone("UTC"));
                     $today = new DateTime();
                     $daysToLaunch = $today->diff($launchDate, false)->h;
                  //   var_dump($launchDate,$today); die();
                     //$formater = Yii::$app->formatter->asDate($model->checkin);
                 return $daysToLaunch;//($formater->date_diff($formater - 86400));
                 },
                'format'=>['datetime', 'php:H:i'],
            ],*/
            [
                // the attribute
                'attribute' => 'checkin',
                'label'=>'Дата/Время',
                'format'=>['datetime', 'php:d-m-Y H:i'], // Доступные модификаторы - date:datetime:time
                'headerOptions' => ['width' => '180'],
               // 'headerOptions' => [ 'class' => 'col-md-2' ],

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
                'headerOptions' => ['width' => '75'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '70'],
            ],
        ],
    ]); ?>

</div>
