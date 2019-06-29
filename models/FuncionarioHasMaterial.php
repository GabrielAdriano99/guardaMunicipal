<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Funcionario_has_Material".
 *
 * @property int $idFuncionarioHasMaterial
 * @property int $Funcionario_idFuncionario
 * @property int $Material_idMaterial
 * @property int $qtd_posse
 * @property string $status
 * @property string $data_emp
 * @property string $data_dev
 * @property int $qtd_dev
 *
 * @property Funcionario $funcionarioIdFuncionario
 * @property Material $materialIdMaterial
 */
class FuncionarioHasMaterial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Funcionario_has_Material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Funcionario_idFuncionario', 'Material_idMaterial', 'qtd_posse'], 'required'],
            [['Funcionario_idFuncionario', 'Material_idMaterial', 'qtd_posse', 'qtd_dev'], 'integer'],
            [['status'], 'string'],
            [['data_emp', 'data_dev'], 'safe'],
            [['Funcionario_idFuncionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['Funcionario_idFuncionario' => 'idFuncionario']],
            [['Material_idMaterial'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['Material_idMaterial' => 'idMaterial']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idFuncionarioHasMaterial' => Yii::t('app', 'Id Funcionario Has Material'),
            'Funcionario_idFuncionario' => Yii::t('app', 'Funcionario Id Funcionario'),
            'Material_idMaterial' => Yii::t('app', 'Material Id Material'),
            'qtd_posse' => Yii::t('app', 'Qtd Posse'),
            'status' => Yii::t('app', 'Status'),
            'data_emp' => Yii::t('app', 'Data Emp'),
            'data_dev' => Yii::t('app', 'Data Dev'),
            'qtd_dev' => Yii::t('app', 'Qtd Dev'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarioIdFuncionario()
    {
        return $this->hasOne(Funcionario::className(), ['idFuncionario' => 'Funcionario_idFuncionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialIdMaterial()
    {
        return $this->hasOne(Material::className(), ['idMaterial' => 'Material_idMaterial']);
    }
}
