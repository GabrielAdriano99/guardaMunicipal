<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ponto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ponto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data_escalado')->textInput() ?>

    <?= $form->field($model, 'hora_chegada')->textInput() ?>

    <?= $form->field($model, 'hora_saida')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'ATIVO' => 'ATIVO', 'INATIVO' => 'INATIVO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Escala_idEscala')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
