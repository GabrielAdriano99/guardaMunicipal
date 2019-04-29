<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Escala */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="escala-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data_escalar')->textInput() ?>

    <?= $form->field($model, 'hora_inicio')->textInput() ?>

    <?= $form->field($model, 'hora_termino')->textInput() ?>

    <?= $form->field($model, 'local')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Funcionario_idFuncionario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
