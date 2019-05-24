<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HorarioExtra;

/**
 * HorarioExtraSearch represents the model behind the search form of `app\models\HorarioExtra`.
 */
class HorarioExtraSearch extends HorarioExtra
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idHorarioExtra', 'Event_id'], 'integer'],
            [['horas_excedidas'], 'safe'],
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
        $query = HorarioExtra::find();

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
            'idHorarioExtra' => $this->idHorarioExtra,
            'horas_excedidas' => $this->horas_excedidas,
            'Event_id' => $this->Event_id,
        ]);

        return $dataProvider;
    }
}
