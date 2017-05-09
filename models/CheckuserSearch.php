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
            [['id', 'user_id','checkin','str_date','status'], 'integer'],
            [['comment'], 'safe'],
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
        $dataProvider->pagination->pageSize = 60;
        //var_dump($params);die();
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            //'checkin' => $this->checkin,

            'status' => $this->status,
           // 'DATE(checkin)' => $this->checkin,
        ]);
       // $query->andFilterWhere(['between', 'checkin', $this->str_date,$this->end_date]);
        //$query->andFilterWhere(['between', 'checkin', $this->getStrDate($this->checkin), $this->getEndDate($this->checkin)]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
