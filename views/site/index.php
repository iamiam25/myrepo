<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <!--div class="jumbotron"-->

              <h2 class="text-center">Программа для учета вашего рабочего времени</h2>


        <!--h1>Congratulations!</h1-->
        <div class="row">
            <div class="col-lg-4 text-justify">
            <h3>Вам станет ясно, куда девался еще один рабочий день, а заказ почему-то так и не выполнен.</h3>
                <p> Подробная статистика наглядно покажет, какое количество времени Вы проводите в праздном безделье, а Ваша совесть не позволит этому повториться.</p>
            </div>
            <div class="col-lg-8">
                <?= Html::img(yii\helpers\Url::to('@web/imgs/img1.jpg'),['alt' =>'clock' ]) ?>
            </div>
        </div>
    <!--/div-->
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 text-justify">
                <h3>Продуктивность</h3>
                <p><?= Html::img(yii\helpers\Url::to('@web/imgs/ico1.gif'),['alt' =>'ileft' ]) ?></p>
                <p>Узнайте, наконец, сколько рабочего времени у
                    Вас на самом деле отнимает разглядывание фоток,
                    чтение постов и прочее
                    ничего не деланье.</p>


            </div>
            <div class="col-lg-4 text-justify">
                <h3>Время — деньги</h3>
                <p><?= Html::img(yii\helpers\Url::to('@web/imgs/ico2.gif'),['alt' =>'icenter' ]) ?></p>
                <p>Самомотивируйтесь. Оптимизируйте свое время работы над проектами,
                    чтоб зарабатывать больше. </p>


            </div>
            <div class="col-lg-4 text-justify">
                <h3>Отдых или работа</h3>
                <p><?= Html::img(yii\helpers\Url::to('@web/imgs/ico3.gif'),['alt' =>'iright' ]) ?></p>
                <p>Делу время, а потехе час.
                    О наступлении этого часа Вам просигнализирует Motivate Clock. Вы сами можете задавать время напоминаний
                    о необходимости отдыха.</p>

            </div>
        </div>

    </div>
</div>
