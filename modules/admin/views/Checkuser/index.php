<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CheckuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Приход/уход';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="checkuser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить Запись', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'str_date',
                'label'=>'differ',
                'value' => 'checkin',
                /*'value' =>function($model) {
                    $launchDate = new DateTime(Yii::$app->formatter->asDate(), new DateTimeZone("UTC"));
                    $today = new DateTime();
                    $daysToLaunch = $today->diff($launchDate, false)->h;
                 //   var_dump($launchDate,$today); die();
                    //$formater = Yii::$app->formatter->asDate($model->checkin);
                return $daysToLaunch;//($formater->date_diff($formater - 86400));
                },*/
                'format'=>['datetime', 'php:H:i'],
            ],
            [
                // the attribute
                'attribute' => 'checkin',
                'label'=>'Дата/Время',

                'format'=>['datetime', 'php:d-m-Y H:i'], // Доступные модификаторы - date:datetime:time
                'headerOptions' => ['width' => '140'],
               // 'headerOptions' => [ 'class' => 'col-md-2' ],

                'filter' => function() {
                return Yii::$app->formatter->asDatetime('now','php:Y-m-d H:i:s');
                },
                    /*kartik\datetime\DateTimePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'checkin',
                    'convertFormat' => true,
                    'size' => 'mx',
                    'pluginOptions' => [
                        // 'daysOfWeekDisabled' => [0, 6],
                        'todayBtn' => true,
                        'format' => 'php:d-m-Y H:i',
                        'autoclose' => true,

                    ]
                    ]),*/

            ],
            [
                'attribute'=>'status',
                'value'=>function($model) {
                    if($model->status == 1)return 'Пришел';
                    elseif($model->status == 2)return 'Ушел' ;
                    else return 0 ;
                },
                'filter'=>array('0'=>'нет','1'=>'Пришел','2'=>'Ушел'),
                'headerOptions' => ['width' => '80'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
