<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Escala".
 *
 * @property int $idEscala
 * @property string $data_escalar
 * @property string $hora_inicio
 * @property string $hora_termino
 * @property string $local
 * @property int $Funcionario_idFuncionario
 *
 * @property Funcionario $funcionarioIdFuncionario
 * @property Ponto[] $pontos
 */
class Escala extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Escala';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_escalar', 'hora_inicio', 'hora_termino', 'local', 'Funcionario_idFuncionario'], 'required'],
            [['data_escalar', 'hora_inicio', 'hora_termino'], 'safe'],
            [['Funcionario_idFuncionario'], 'integer'],
            [['local'], 'string', 'max' => 45],
            [['Funcionario_idFuncionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['Funcionario_idFuncionario' => 'idFuncionario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idEscala' => Yii::t('app', 'Id Escala'),
            'data_escalar' => Yii::t('app', 'Data Escalar'),
            'hora_inicio' => Yii::t('app', 'Hora Inicio'),
            'hora_termino' => Yii::t('app', 'Hora Termino'),
            'local' => Yii::t('app', 'Local'),
            'Funcionario_idFuncionario' => Yii::t('app', 'Funcionario Id Funcionario'),
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
    public function getPontos()
    {
        return $this->hasMany(Ponto::className(), ['Escala_idEscala' => 'idEscala']);
    }
}
