<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Funcionario".
 *
 * @property int $idFuncionario
 * @property string $nome
 * @property string $matricula
 * @property string $cargo
 * @property string $biometria
 * @property int $Usuario_idUsuario
 *
 * @property Escala[] $escalas
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'matricula', 'cargo', 'biometria', 'Usuario_idUsuario'], 'required'],
            [['Usuario_idUsuario'], 'integer'],
            [['nome', 'matricula', 'cargo', 'biometria'], 'string', 'max' => 45],
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
            'cargo' => Yii::t('app', 'Cargo'),
            'biometria' => Yii::t('app', 'Biometria'),
            'Usuario_idUsuario' => Yii::t('app', 'Usuario Id Usuario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscalas()
    {
        return $this->hasMany(Escala::className(), ['Funcionario_idFuncionario' => 'idFuncionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'Usuario_idUsuario']);
    }
}
