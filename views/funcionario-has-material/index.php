<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idFuncionarioHasMaterial',
            'Funcionario_idFuncionario',
            'Material_idMaterial',
            'qtd_posse',
            'status',
            //'data_emp',
            //'data_dev',
            //'qtd_dev',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
