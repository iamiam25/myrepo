<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Checkuser;

/**
 * CheckuserSearch represents the model behind the search form about `app\models\Checkuser`.
 */
class CheckuserSearch extends Checkuser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id','checkin','status'], 'integer'],
            [['comment'], 'safe'],
            [['str_date','end_date'], 'date'],
           // [['str_date','end_date'],'date'],
          // [['str_date','end_date'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        //'1494250996',
        $query = Checkuser::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->pagination->pageSize = 25;

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
       // var_dump($query); die();
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            //'checkin' => $this->checkin,
            'status' => $this->status,
           // 'DATE(checkin)' => $this->checkin,
        ]);
        if (($this->str_date)&&($this->end_date) )
        {//var_dump($query); die();
            $query->andFilterWhere(['between', 'checkin', strtotime($this->str_date)-10800, strtotime($this->end_date)+86399]);
            //$query->andFilterWhere(['checkin' => $this->checkin]);
        }
        /*if ( ! is_null($this->checkin) && strpos($this->checkin, ' to ') !== false ) {
         //   list($str_date, $end_date) = explode(' to ', $this->checkin);

            $query->andFilterWhere(['between', 'checkin', $str_date, $end_date]);
           // $this->checkin = null;
        }
        else
            {//die();
            $query->andFilterWhere(['checkin' => $this->checkin,]);
        }*/
       // $query->andFilterWhere(['between', 'checkin', $this->str_date,$this->end_date]);
        //$query->andFilterWhere(['between', 'checkin', $this->getStrDate($this->checkin), $this->getEndDate($this->checkin)]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
