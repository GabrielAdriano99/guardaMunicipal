<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Justificativa".
 *
 * @property int $idJustificativa
 * @property string $motivo
 * @property resource $anexo
 * @property int $Event_id
 *
 * @property Event $event
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
            [['anexo'], 'string'],
            [['Event_id'], 'required'],
            [['Event_id'], 'integer'],
            [['motivo'], 'string', 'max' => 250],
            [['Event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['Event_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idJustificativa' => Yii::t('app', 'Id Justificativa'),
            'motivo' => Yii::t('app', 'Motivo'),
            'anexo' => Yii::t('app', 'Anexo'),
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
