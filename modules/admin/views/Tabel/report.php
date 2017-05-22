<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use yii\bootstrap\Modal;
//use kartik\form\ActiveForm;///
//use kartik\date\DatePicker;

$this->title = 'Отчет рез';
$this->params['breadcrumbs'][] = ['label' => 'Табель', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
/*foreach ($arrUser['profiln'] as $userfio)
{
    print_r($userfio);
    echo '<br/>';
}
 die(false);*/

 $diff_hour = 0;
 $worked = 0;
if (!empty($dataProvider->getModels())) {
    foreach ($dataProvider->getModels() as $key => $val) {
      $worked += $val->worked;
        }
    foreach ($dataProvider->getModels() as $key => $val) {
        $diff_hour += $val->diff_hour;
        }
    }

?>

<h3><?= Html::encode($this->title); ?></h3>
<?php echo '<label class="control-label">Пользователь:'.$arrUser['profiln']['FIO'].'</label></br>'; ?>
<?php echo '<label class="control-label">Филиал:'.$arrUser['profiln']['filial'].'</label>'; ?>
<div class="checkuser-index">

    <?php // echo $this->render('_search', ['model' => $model]); ?>

    <p>
        <?= Html::a('назад', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'pager' => [
            'firstPageLabel' => 'Первая страница',
            'lastPageLabel'  => 'Последняя страница'
        ],
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout' => "{summary}\n{items}\n<div class='text-center'>{pager}</div>",
       // 'layout'=>"{pager}\n{summary}\n{items}\n{pager}",
        'summary' => "--",
        'showOnEmpty'=>true,
        'showHeader'=>true,// show column name
        'showFooter'=>true,// shot footer
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['width' => '14'],
            ],
            [
                'attribute' =>'start_d',
                 'label' => 'день',

                'format' => ['date' , 'php:d.M'],
                //'value' => 'user.username',
                   'filter'=>false,
                'headerOptions' => ['width' => '34'],
                'footer' => '<strong>Итоги:</strong>',
            ],
            [
                 'attribute' => 'start_d',
                 'label'=>'приход',
                 'format'=>['time', 'php:H:i'], // Доступные модификаторы - date:datetime:time
                 'headerOptions' => ['width' => '100'],
                'footer' => 'Раб дни:'.$arrUser['profiln']['work_day'],
            ],
            [
                'attribute' => 'end_d',
                'label'=>'уход',
                'format'=>['time', 'php:H:i'], // Доступные модификаторы - date:datetime:time
                'headerOptions' => ['width' => '100'],
                'footer' => 'Отпуск:'.$arrUser['profiln']['rest_day'],
            ],
            [
                // the attribute
                'attribute' => 'worked',
                'label'=>'отработано',
                'format'=>['time', 'php:H:i'], // Доступные модификаторы
                'contentOptions'=>['style'=>'width: 10%;text-align:left'],
                'value' => function ($model, $key, $index, $widget) {
                    return $model->worked;
                },
                'footer' => 'h:'.round($worked/3600, 3),
            ],
            [
                // the attribute
                'attribute' => 'diff_hour',
                'label'=>'разница',
                'format'=>['time', 'php:H:i'], // Доступные
                'contentOptions'=>['style'=>'width: 10%;text-align:left'],
                'value' => function ($model, $key, $index, $widget) {
                    return $model->diff_hour;
                },
                'footer' => 'h:'.round($diff_hour/3600, 3),
            ],
            [
                // the attribute
                'attribute' => 'type_d',
                'label'=>'тип дня',
                'format'=>['date', 'php:l'],
            ],
            [
                'attribute' => 'dop_time',
                'label'=>'доп время',
               // 'format'=>['date', 'php:l'],

            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => ''
            ],

        ],

          /*  'attribute' => 'worked',
            'format' => 'raw',
            'contentOptions'=>['style'=>'width: 10%;text-align:left'],
            'value'=>function ($model, $key, $index, $widget) use ($total) {
                $total += $model->value;
                return $model->value;
            },
            'footer' => function () use ($total)
            {
                //format the total here
                return $total;
            },*/

        //'layout' => '{summary}{items}{pager}',
         //'filterPosition' => FILTER_POS_FOOTER,
       //  'rowOptions' => function ($model, $key, $index, $grid) {
      //    },


        /*  'emptyText' => '-',
         'showFooter' => true,*/
    ]); ?>
    <?php
   /* $worked = 0;

    if (!empty($dataProvider->getModels())) {
    foreach ($dataProvider->getModels() as $key => $val) {
    $worked += $val->worked;
    }
    }*/
    ?>
</div>