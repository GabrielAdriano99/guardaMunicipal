<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Escala;

/**
 * EscalaSearch represents the model behind the search form of `app\models\Escala`.
 */
class EscalaSearch extends Escala
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idEscala', 'Funcionario_idFuncionario'], 'integer'],
            [['data_escalar', 'hora_inicio', 'hora_termino', 'local'], 'safe'],
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
        $query = Escala::find();

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
            'idEscala' => $this->idEscala,
            'data_escalar' => $this->data_escalar,
            'hora_inicio' => $this->hora_inicio,
            'hora_termino' => $this->hora_termino,
            'Funcionario_idFuncionario' => $this->Funcionario_idFuncionario,
        ]);

        $query->andFilterWhere(['like', 'local', $this->local]);

        return $dataProvider;
    }
}
