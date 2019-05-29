<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

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
        Modal::begin([
            'header' => '<h4>Events</h4>',
            'id' => 'modal',
            'size' => 'modal-lg'
        ]);

        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>

    <?= \yii2fullcalendar\yii2fullcalendar::widget([
        'events' => $events,
        'id' => 'calendar',
        'clientOptions' => [
            'editable' => false,
            'draggable' => false,
        ],
        'eventClick' => "function(calEvent, jsEvent, view) {
            $(this).css('border-color', 'red');

            $.get('index.php?r=event/update', {'id':calEvent.id}, function(data){
                $('.modal').modal('show')
                .find('#modalContent')
                .html(data);
            })
        }",
    ]);
    ?>

    <!-- GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description',
            'start',
            'end',
            //'Funcionario_idFuncionario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); -->


</div>
