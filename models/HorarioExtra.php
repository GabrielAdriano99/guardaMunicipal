<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "HorarioExtra".
 *
 * @property int $idHorarioExtra
 * @property string $horas_excedidas
 * @property int $Ponto_idPonto
 *
 * @property Ponto $pontoIdPonto
 */
class HorarioExtra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'HorarioExtra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['horas_excedidas'], 'safe'],
            [['Ponto_idPonto'], 'required'],
            [['Ponto_idPonto'], 'integer'],
            [['Ponto_idPonto'], 'exist', 'skipOnError' => true, 'targetClass' => Ponto::className(), 'targetAttribute' => ['Ponto_idPonto' => 'idPonto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idHorarioExtra' => Yii::t('app', 'Id Horario Extra'),
            'horas_excedidas' => Yii::t('app', 'Horas Excedidas'),
            'Ponto_idPonto' => Yii::t('app', 'Ponto Id Ponto'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPontoIdPonto()
    {
        return $this->hasOne(Ponto::className(), ['idPonto' => 'Ponto_idPonto']);
    }
}
