<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tabel;

/**
 * CheckuserSearch represents the model behind the search form about `app\models\`.
 */
class TabelSearch extends Tabel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','user_id', 'start_d', 'end_d', 'type_d', 'dop_time'], 'integer'],
            [['worked','diff_hour'], 'number'],
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
        $query = Tabel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->pagination->pageSize = 45;

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
           // 'date1' => $this->date1,
            'start_d' => $this->start_d,
            'end_d' => $this->end_d,
            'worked' => $this->worked,
            'type_d' => $this->type_d,
            'dop_time' => $this->dop_time,
        ]);

       // $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
