<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "Usuario".
 *
 * @property int $idUsuario
 * @property string $username
 * @property string $password
 * @property string $access_token
 * @property string $auth_key
 * @property string $type
 *
 * @property Funcionario[] $funcionarios
 */
class Usuario extends \yii\db\ActiveRecord implements IdentityInterface
{

    public $password_repeat;

    const SCENARIO_CADASTRO = 'cadastro';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Usuario';
    }

    /**
    *   Criptografando a senha antes de salvar
    **/
    public function beforeSave($insert)
    {
        // Criptografando a senha
        if (array_key_exists('password', $this->dirtyAttributes)) {
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        }
        return parent::beforeSave($insert);
    }

    /*
    * Atribuir papeis ao usuario depois de salvar o usuario
    */
    public function afterSave($insert, $changedAttributes){
        if (isset($changedAttributes['type']) || $insert) {
            Yii::trace('Entrou no IF do isset');
            $auth = Yii::$app->authManager;
            if (!$insert) {
                Yii::trace('entrou no if do $insert');
                $auth->revokeAll($this->getId());
            }
            $novoPapel = $auth->getRole($this->type);
            Yii::trace('papel:');
            Yii::trace($novoPapel);
            $auth->assign($novoPapel,$this->getId());
        }
        return parent::afterSave($insert,$changedAttributes);
    }

    public function afterDelete() {
        Yii::$app->authManager->revokeAll($this->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['password_repeat', 'type'], 'required', 'on' => self::SCENARIO_CADASTRO],

            [['type'], 'string', 'max' => 45],
            [['type'], 'in', 'range' => ['admin', 'guard']],

            [['username'], 'string', 'max' => 45],
            [['password', 'access_token', 'auth_key'], 'string', 'max' => 100],
            [['username'], 'unique'],
            [['password'], 'unique'],

            [['password_repeat'], 'compare', 'compareAttribute' => 'password', 'operator' => '==='],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => Yii::t('app', 'Id Usuario'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'access_token' => Yii::t('app', 'Access Token'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * Localiza uma identidade pelo ID informado
     *
     * @param string|int $id o ID a ser localizado
     * @return IdentityInterface|null o objeto da identidade que corresponde ao ID informado
     */
    public static function findIdentity($idUsuario)
    {
        return static::findOne($idUsuario);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Localiza uma identidade pelo token informado
     *
     * @param string $token o token a ser localizado
     * @return IdentityInterface|null o objeto da identidade que corresponde ao token informado
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string o ID do usuário atual
     */
    public function getId()
    {
        return $this->idUsuario;
    }

    /**
     * @return string a chave de autenticação do usuário atual
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool se a chave de autenticação do usuário atual for válida
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password){
        return Yii::$app->getSecurity()->validatePassword($password,$this->password);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionario::className(), ['Usuario_idUsuario' => 'idUsuario']);
    }
}
