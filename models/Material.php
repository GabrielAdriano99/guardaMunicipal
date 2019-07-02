<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Material".
 *
 * @property int $idMaterial
 * @property string $cod_material
 * @property string $nome_material
 * @property int $quant
 *
 * @property FuncionarioHasMaterial[] $funcionarioHasMaterials
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Material';
    }

    public static function getListarMaterial(){
        return ArrayHelper::map(Material::find()->all(), 
            'idMaterial', 
            'nome_material');
    }

    public static function getMaterialQuantidade($id){
        return Material::find()
            ->select('quant')
            ->where(['idMaterial' => $id])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cod_material', 'nome_material', 'quant'], 'required'],
            [['quant'], 'integer'],
            [['cod_material', 'nome_material'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMaterial' => Yii::t('app', 'Id Material'),
            'cod_material' => Yii::t('app', 'Cod Material'),
            'nome_material' => Yii::t('app', 'Nome Material'),
            'quant' => Yii::t('app', 'Quant'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarioHasMaterials()
    {
        return $this->hasMany(FuncionarioHasMaterial::className(), ['Material_idMaterial' => 'idMaterial']);
    }
}
