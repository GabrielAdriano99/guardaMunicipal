<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Ponto".
 *
 * @property int $idPonto
 * @property string $data_escalado
 * @property string $hora_chegada
 * @property string $hora_saida
 * @property string $status
 * @property int $Escala_idEscala
 *
 * @property HorarioExtra[] $horarioExtras
 * @property Justificativa[] $justificativas
 * @property Escala $escalaIdEscala
 */
class Ponto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Ponto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_escalado', 'Escala_idEscala'], 'required'],
            [['data_escalado', 'hora_chegada', 'hora_saida'], 'safe'],
            [['status'], 'string'],
            [['Escala_idEscala'], 'integer'],
            [['Escala_idEscala'], 'exist', 'skipOnError' => true, 'targetClass' => Escala::className(), 'targetAttribute' => ['Escala_idEscala' => 'idEscala']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPonto' => Yii::t('app', 'Id Ponto'),
            'data_escalado' => Yii::t('app', 'Data Escalado'),
            'hora_chegada' => Yii::t('app', 'Hora Chegada'),
            'hora_saida' => Yii::t('app', 'Hora Saida'),
            'status' => Yii::t('app', 'Status'),
            'Escala_idEscala' => Yii::t('app', 'Escala Id Escala'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorarioExtras()
    {
        return $this->hasMany(HorarioExtra::className(), ['Ponto_idPonto' => 'idPonto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJustificativas()
    {
        return $this->hasMany(Justificativa::className(), ['Ponto_idPonto' => 'idPonto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscalaIdEscala()
    {
        return $this->hasOne(Escala::className(), ['idEscala' => 'Escala_idEscala']);
    }
}
