<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Justificativa;

/**
 * JustificativaSearch represents the model behind the search form of `app\models\Justificativa`.
 */
class JustificativaSearch extends Justificativa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idJustificativa', 'Ponto_idPonto'], 'integer'],
            [['data_faltiva', 'motivo', 'anexo'], 'safe'],
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
        $query = Justificativa::find();

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
            'idJustificativa' => $this->idJustificativa,
            'data_faltiva' => $this->data_faltiva,
            'Ponto_idPonto' => $this->Ponto_idPonto,
        ]);

        $query->andFilterWhere(['like', 'motivo', $this->motivo])
            ->andFilterWhere(['like', 'anexo', $this->anexo]);

        return $dataProvider;
    }
}
