<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Events');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?=Html::encode($this->title)?></h1>

    <!-- <p>
        <Html::a(Yii::t('app', 'Create Event'), ['create'], ['class' => 'btn btn-success'])>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
        $gridColumns = [
            //'id',
            'title',
            'description',
            'start',
            'end',
            //'Funcionario_idFuncionario',
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

            //'id',
            'title',
            'description',
            'start',
            'end',
            //'Funcionario_idFuncionario',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url = Url::toRoute(['event/view', 'id' => $model->id]), []);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
