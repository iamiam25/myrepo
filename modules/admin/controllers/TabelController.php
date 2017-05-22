<?php

namespace app\modules\admin\controllers;


use Yii;
use app\models\Tabel;
use app\models\TabelSearch;
use app\models\User;
use app\models\Checkuser;
use app\models\CheckuserSearch;
use yii\web\Controller;


class TabelController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Tabel();
      //  $dataUser = User::find()->orderBy('username ASC')->all();
      /*  foreach ($dataUser as $value){
            $arrUser[$value->id] = $value->username;
            // $arrFilial[$value->id] = $value->filial;
        }*/

        return $this->render('index', [
            'model' => $model,
            //'arrUser'=>$arrUser,
        ]);
    }

    public function actionReport()
    {
        echo Yii::$app->language;
     //   var_dump(Yii::$app->formatter);
        if( !empty(Yii::$app->request->post()) )
        {
            Yii::$app->db->createCommand()->truncateTable('tabel')->execute();
            //Tabel::truncTable();
            $arr_post = Yii::$app->request->post();
            $u_id = $arr_post['Tabel']['user_id'];
            $userdata = User::find()->with('profiln')->andWhere(['id' => $u_id])->one();

            $period1= Checkuser::find()
                ->andWhere(['user_id' => $u_id])
                ->andFilterWhere(['between', 'checkin', strtotime($arr_post['Tabel']['str_date'])-10800, strtotime($arr_post['Tabel']['end_date'])+86399])
                ->andFilterWhere(['status' => 1])
                ->asArray()
                ->all();

           $i = 1; $arrid = array();
            foreach ($period1 as $valueck){
                $model = new Tabel();
               // print_r($valueck['checkin']);
              //  echo '<br/>';
                $model->user_id = $u_id;
                $model->start_d = $valueck['checkin'];
                $model->type_d = $valueck['checkin'];
                $model->dop_time = '5';
                $model->save();
                $arrid[$i] = $model->id;
                 $i++;
               // $arrUser[$value->id] = $value->username;
                // $arrFilial[$value->id] = $value->filial;
            }

            $period2= Checkuser::find()
                ->andWhere(['user_id' => $u_id])
                ->andFilterWhere(['between', 'checkin', strtotime($arr_post['Tabel']['str_date'])-10800, strtotime($arr_post['Tabel']['end_date'])+86399])
                ->andFilterWhere(['status' => 2])
                ->asArray()
                ->all();
            //var_dump( $period2);
            $j=1;
            foreach ($period2 as $valueck2){

              //  $model->user_id = $u_id;
                $model = $this->findModel($arrid[$j]);
                $j++;
                $model->end_d = $valueck2['checkin'];
               // $date1 = new yii\DateTime($model->end_d);
               // $date2 = new DateTime($model->start_d);
                //$interval = $date2->diff($date1);
                //разница между приходом и уходом времени
               // $diff = strtotime($valueck2['checkin']) - strtotime($model->start_d);
               $working = ($model->end_d - $model->start_d);// - $userdata['profiln']['dinner_hour']*3600;
                //разница минус обед
                $working = $working - $userdata['profiln']['dinner_hour']*3600;
                //отрабатано часов
                $model->worked = floor($working/60*60);//round(($working/3600), 3);
                //
                $model->diff_hour = $userdata['profiln']['work_hour']*3600 - $model->worked;
            //    var_dump($working);
           //   echo '<br/>';
                $model->save();
                // $arrUser[$value->id] = $value->username;
                // $arrFilial[$value->id] = $value->filial;
            }

          // die(false);


            //
        }
        else {
            $u_id = Yii::$app->user->id;
            $userdata = User::find()->with('profiln')->andWhere(['id' => $u_id])->one();
            }


      //  $searchModel = new CheckuserSearch();

        //$period_data = $searchModel->search(Yii::$app->request->queryParams);



        $searchModel = new TabelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        /*$dataUser = User::find()->orderBy('username ASC')->all();
        foreach ($dataUser as $value){
            $arrUser[$value->id] = $value->username;
        }*/

        return $this->render('report', [
            //'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
             'arrUser'=>$userdata,
        ]);
    }

    /**
     * Finds the Checkuser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tabel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tabel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
