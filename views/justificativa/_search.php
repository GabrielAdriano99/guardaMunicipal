<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JustificativaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="justificativa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idJustificativa') ?>

    <?= $form->field($model, 'data_faltiva') ?>

    <?= $form->field($model, 'motivo') ?>

    <?= $form->field($model, 'anexo') ?>

    <?= $form->field($model, 'Ponto_idPonto') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
