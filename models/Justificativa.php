<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Justificativa".
 *
 * @property int $idJustificativa
 * @property string $data_faltiva
 * @property string $motivo
 * @property resource $anexo
 * @property int $Ponto_idPonto
 *
 * @property Ponto $pontoIdPonto
 */
class Justificativa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Justificativa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_faltiva', 'Ponto_idPonto'], 'required'],
            [['data_faltiva'], 'safe'],
            [['anexo'], 'string'],
            [['Ponto_idPonto'], 'integer'],
            [['motivo'], 'string', 'max' => 250],
            [['Ponto_idPonto'], 'exist', 'skipOnError' => true, 'targetClass' => Ponto::className(), 'targetAttribute' => ['Ponto_idPonto' => 'idPonto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idJustificativa' => Yii::t('app', 'Id Justificativa'),
            'data_faltiva' => Yii::t('app', 'Data Faltiva'),
            'motivo' => Yii::t('app', 'Motivo'),
            'anexo' => Yii::t('app', 'Anexo'),
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
