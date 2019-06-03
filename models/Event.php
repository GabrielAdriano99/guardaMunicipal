<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Event".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $start
 * @property string $end
 * @property int $Funcionario_idFuncionario
 *
 * @property Funcionario $funcionarioIdFuncionario
 * @property HorarioExtra[] $horarioExtras
 * @property Justificativa[] $justificativas
 * @property Ponto[] $pontos
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'start', 'end', 'Funcionario_idFuncionario'], 'required'],
            [['start', 'end'], 'safe'],
            [['Funcionario_idFuncionario'], 'integer'],
            [['title', 'description'], 'string', 'max' => 45],
            [['Funcionario_idFuncionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['Funcionario_idFuncionario' => 'idFuncionario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'start' => Yii::t('app', 'Start'),
            'end' => Yii::t('app', 'End'),
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
    public function getHorarioExtras()
    {
        return $this->hasMany(HorarioExtra::className(), ['Event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJustificativas()
    {
        return $this->hasMany(Justificativa::className(), ['Event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPontos()
    {
        return $this->hasMany(Ponto::className(), ['Event_id' => 'id']);
    }
}
