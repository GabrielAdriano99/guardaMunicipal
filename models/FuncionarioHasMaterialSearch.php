<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FuncionarioHasMaterial;

/**
 * FuncionarioHasMaterialSearch represents the model behind the search form of `app\models\FuncionarioHasMaterial`.
 */
class FuncionarioHasMaterialSearch extends FuncionarioHasMaterial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idFuncionarioHasMaterial', 'Funcionario_idFuncionario', 'Material_idMaterial', 'qtd_posse', 'qtd_dev'], 'integer'],
            [['status', 'data_emp', 'data_dev'], 'safe'],
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
        $query = FuncionarioHasMaterial::find();

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
            'idFuncionarioHasMaterial' => $this->idFuncionarioHasMaterial,
            'Funcionario_idFuncionario' => $this->Funcionario_idFuncionario,
            'Material_idMaterial' => $this->Material_idMaterial,
            'qtd_posse' => $this->qtd_posse,
            'data_emp' => $this->data_emp,
            'data_dev' => $this->data_dev,
            'qtd_dev' => $this->qtd_dev,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
