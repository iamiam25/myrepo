<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\User;
use app\models\Checkuser;
use app\models\CheckuserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use yii\db\Expression;

/**
 * CheckuserController implements the CRUD actions for Checkuser model.
 */
class CheckuserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Checkuser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CheckuserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       $dataUser = User::find()->orderBy('username ASC')->all();
        foreach ($dataUser as $value){
            $arrUser[$value->id] = $value->username;
        }
        //var_dump(strtotime("27-05-2017")-86399); die();
      //  var_dump($searchModel); die();
     /*   $arrChk = Checkuser::find()
            ->where(['between', 'checkin', "1494115200", "1494201599" ])
            ->andwhere(['status' => ['1','2']])
            ->andwhere(['user_id' => '1'])
            ->asArray()
            ->all();
        //var_dump($arrChk);
        $i=0;
        foreach ($arrChk as $val){
       //     $arrDiff[$i] = $val->checkin;
            var_dump($val);
            $i++;
        }*/
        //var_dump($arrChk);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
           'arrUser' => $arrUser,
        ]);
    }

    /**
     * Displays a single Checkuser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Checkuser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Checkuser();

        $dataUser = User::find()->orderBy('username ASC')->all();
        foreach ($dataUser as $value){
            $arrUser[$value->id] = $value->username;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
             /*  if(!$model->checkin) {
                // Yii::$app->formatter->timeZone = 'Europe/Kiev';// эта запись устанавливает часовой пояс такой же как на сервере
                //Yii::$app->formatter->asDatetime($model->checkin, "php:d.m.Y H:i:s");
                //$date = date("Y-m-d H:i:s", time());
                // $model->checkin = Yii::$app->formatter->asDate('now', 'php:Y-m-d');
                // $model->checkout = Yii::$app->formatter->asTime('now', 'php:H:i:s');
              //     print_r($model,false);
             //   $model->checkin = new Expression('NOW()');
                   var_dump($model->checkin); die();
                   $model->checkin = date('U');//Yii::$app->formatter->asDatetime('now', 'php:Y-m-d H:i:s');
                // $model->checkin = Yii::$app->formatter->asDatetime($model->checkin, "php:d.m.Y H:i:s");
            }*/

            return $this->render('create', [
                'model' => $model,
                'arrUser'=>$arrUser,
            ]);
        }
    }

    /**
     * Updates an existing Checkuser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
           /* if(!$model->checkin) {

                var_dump($model->checkin); die();
                $model->checkin = date('U');//Yii::$app->formatter->asDatetime('now', 'php:Y-m-d H:i:s');
                // $model->checkin = Yii::$app->formatter->asDatetime($model->checkin, "php:d.m.Y H:i:s");
            }*/
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Checkuser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Checkuser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Checkuser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Checkuser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
