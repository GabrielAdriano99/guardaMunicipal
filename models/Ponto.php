<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Ponto".
 *
 * @property int $idPonto
 * @property string $hora_chegada
 * @property string $hora_saida
 * @property string $status
 * @property string $hash_biometria
 * @property int $Event_id
 *
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
            [['hora_chegada', 'hora_saida'], 'safe'],
            [['status'], 'string'],
            [['Event_id'], 'required'],
            [['Event_id'], 'integer'],
            [['hash_biometria'], 'string', 'max' => 45],
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
            'hora_chegada' => Yii::t('app', 'Hora Chegada'),
            'hora_saida' => Yii::t('app', 'Hora Saida'),
            'status' => Yii::t('app', 'Status'),
            'hash_biometria' => Yii::t('app', 'Hash Biometria'),
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
