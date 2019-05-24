<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "HorarioExtra".
 *
 * @property int $idHorarioExtra
 * @property string $horas_excedidas
 * @property int $Event_id
 *
 * @property Event $event
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
            [['Event_id'], 'required'],
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
            'idHorarioExtra' => Yii::t('app', 'Id Horario Extra'),
            'horas_excedidas' => Yii::t('app', 'Horas Excedidas'),
            'Event_id' => Yii::t('app', 'Event ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'Event_id']);
    }
}
