<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PontoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ponto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPonto') ?>

    <?= $form->field($model, 'data_escalado') ?>

    <?= $form->field($model, 'hora_chegada') ?>

    <?= $form->field($model, 'hora_saida') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'Event_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
