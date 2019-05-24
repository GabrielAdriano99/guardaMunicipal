<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ponto;

/**
 * PontoSearch represents the model behind the search form of `app\models\Ponto`.
 */
class PontoSearch extends Ponto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPonto', 'Event_id'], 'integer'],
            [['hora_chegada', 'hora_saida', 'status', 'hash_biometria'], 'safe'],
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
        $query = Ponto::find();

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
            'idPonto' => $this->idPonto,
            'hora_chegada' => $this->hora_chegada,
            'hora_saida' => $this->hora_saida,
            'Event_id' => $this->Event_id,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'hash_biometria', $this->hash_biometria]);

        return $dataProvider;
    }
}
