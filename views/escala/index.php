<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EscalaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Escalas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escala-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Escala'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idEscala',
            'data_escalar',
            'hora_inicio',
            'hora_termino',
            'local',
            //'Funcionario_idFuncionario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
