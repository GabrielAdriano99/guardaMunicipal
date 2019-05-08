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
 * @property int $Event_id
 *
 * @property HorarioExtra[] $horarioExtras
 * @property Justificativa[] $justificativas
 * @property Event $event
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
            [['data_escalado', 'Event_id'], 'required'],
            [['data_escalado', 'hora_chegada', 'hora_saida'], 'safe'],
            [['status'], 'string'],
            [['Event_id'], 'integer'],
            [['Event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['Event_id' => 'id']],
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
            'Event_id' => Yii::t('app', 'Event ID'),
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
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'Event_id']);
    }
}
