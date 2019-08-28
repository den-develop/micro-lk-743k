<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Sessions;

/**
 * SessionsSearch represents the model behind the search form of `frontend\models\Sessions`.
 */
class SessionsSearch extends Sessions
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'operators_id', 'salon_id', 'tariff_id', 'is_additional_sale', 'is_test'], 'integer'],
            [['time_start', 'time_finish', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Sessions::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'operators_id' => $this->operators_id,
            'salon_id' => $this->salon_id,
            'tariff_id' => $this->tariff_id,
            'time_start' => $this->time_start,
            'time_finish' => $this->time_finish,
            'is_additional_sale' => $this->is_additional_sale,
            'is_test' => $this->is_test,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
