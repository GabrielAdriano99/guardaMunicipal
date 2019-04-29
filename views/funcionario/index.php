<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FuncionarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Funcionarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Funcionario'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idFuncionario',
            'nome',
            'matricula',
            'cargo',
            'biometria',
            //'Usuario_idUsuario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
