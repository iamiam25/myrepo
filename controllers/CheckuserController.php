<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\web\Controller;
use app\models\Checkuser;
use app\models\CheckuserSearch;
use yii\db\Expression;

class CheckuserController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CheckuserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $u_id = Yii::$app->user->id;

        $dataProvider->query->andWhere('user_id=:u_id', array(':u_id'=>$u_id));
        $dataUser = User::find()->orderBy('username ASC')->all();
        foreach ($dataUser as $value){
            $arrUser[$value->id] = $value->username;
        }

       // echo $dataProvider->
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrUser' => $arrUser,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     *
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * addcheck action.
     *
     * @return string
     */
    public function actionCreate()
    {
        $model = new Checkuser();
        $u_id = Yii::$app->user->id;
        $arrUser = User::findOne(['id'=>$u_id])->toArray();
        $dataUser[$arrUser['id']] = $arrUser['username'];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
              return $this->redirect('index');
        } else {
            $model->user_id = Yii::$app->user->id;

           // print_r($model,false);

           // die();
            if(!$model->checkin) {
               //  Yii::$app->formatter->timeZone = 'Europe/Kiev';// эта запись устанавливает часовой пояс такой же как на сервере
                   //Yii::$app->formatter->asDatetime($model->checkin, "php:d.m.Y H:i:s");
                //$date = date("Y-m-d H:i:s", time());
               // $model->checkin = Yii::$app->formatter->asDate('now', 'php:Y-m-d');
               // $model->checkout = Yii::$app->formatter->asTime('now', 'php:H:i:s');

               // $model->checkin = new Expression('NOW()');
               // $model->checkin = Yii::$app->formatter->asDatetime('now', 'php:Y-m-d H:i:s');
                var_dump($model->checkin);
               // $model->checkin = date('U');
            }

            return $this->render('create', [
                'model' => $model,
                'dataUser'=>$dataUser,
            ]);
        }
    }


}
