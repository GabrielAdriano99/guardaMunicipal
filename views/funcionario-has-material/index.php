<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use app\models\Funcionario;
use app\models\Material;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FuncionarioHasMaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Funcionario Has Materials');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-has-material-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Funcionario Has Material'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
        $gridColumns = [
            //'idFuncionarioHasMaterial',
            [
                'attribute' => 'Funcionario_idFuncionario',
                'value' => function($model){
                    $modelFuncionario = Funcionario::findOne(['idFuncionario' => $model->Funcionario_idFuncionario])->nome;
                    return $modelFuncionario;
                }
            ],
            [
                'attribute' => 'Material_idMaterial',
                'value' => function($model){
                    $modelMaterial = Material::findOne(['idMaterial' => $model->Material_idMaterial])->nome_material;
                    return $modelMaterial;
                }
            ],
            'data_emp',
            'qtd_posse',
            'data_dev',
            'qtd_dev',
            'status',
        ];

        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns
        ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idFuncionarioHasMaterial',
            [
                'attribute' => 'Funcionario_idFuncionario',
                'value' => function($model){
                    $modelFuncionario = Funcionario::findOne(['idFuncionario' => $model->Funcionario_idFuncionario])->nome;
                    return $modelFuncionario;
                }
            ],
            [
                'attribute' => 'Material_idMaterial',
                'value' => function($model){
                    $modelMaterial = Material::findOne(['idMaterial' => $model->Material_idMaterial])->nome_material;
                    return $modelMaterial;
                }
            ],
            'data_emp',
            'qtd_posse',
            //'data_dev',
            //'qtd_dev',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
