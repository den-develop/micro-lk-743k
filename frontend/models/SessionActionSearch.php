<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\SessionAction;

/**
 * SessionActionSearch represents the model behind the search form of `frontend\models\SessionAction`.
 */
class SessionActionSearch extends SessionAction
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_action_id', 'session_id', 'action_data_raw'], 'integer'],
            [['action_type', 'action_data', 'action_time', 'action_type_raw'], 'safe'],
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
        $query = SessionAction::find();

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
            'session_action_id' => $this->session_action_id,
            'session_id' => $this->session_id,
            'action_time' => $this->action_time,
            'action_data_raw' => $this->action_data_raw,
        ]);

        $query->andFilterWhere(['like', 'action_type', $this->action_type])
            ->andFilterWhere(['like', 'action_data', $this->action_data])
            ->andFilterWhere(['like', 'action_type_raw', $this->action_type_raw]);

        return $dataProvider;
    }
}
