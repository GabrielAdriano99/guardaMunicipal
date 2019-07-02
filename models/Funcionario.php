<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Funcionario".
 *
 * @property int $idFuncionario
 * @property string $nome
 * @property string $matricula
 * @property string $biometria
 * @property int $Usuario_idUsuario
 *
 * @property Event[] $events
 * @property Usuario $usuarioIdUsuario
 */
class Funcionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Funcionario';
    }

    public static function getListarFuncionario(){
        return ArrayHelper::map(Funcionario::find()->all(), 
            'idFuncionario',
            'nome');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'matricula', 'biometria', 'Usuario_idUsuario'], 'required'],
            [['Usuario_idUsuario'], 'integer'],
            [['nome', 'matricula', 'biometria'], 'string', 'max' => 45],
            [['matricula'], 'unique'],
            [['Usuario_idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['Usuario_idUsuario' => 'idUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idFuncionario' => Yii::t('app', 'Id Funcionario'),
            'nome' => Yii::t('app', 'Nome'),
            'matricula' => Yii::t('app', 'Matricula'),
            'biometria' => Yii::t('app', 'Biometria'),
            'Usuario_idUsuario' => Yii::t('app', 'Usuario Id Usuario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['Funcionario_idFuncionario' => 'idFuncionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'Usuario_idUsuario']);
    }
}
