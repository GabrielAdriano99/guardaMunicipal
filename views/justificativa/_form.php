<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Justificativa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="justificativa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data_faltiva')->textInput() ?>

    <?= $form->field($model, 'motivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anexo')->textInput() ?>

    <?= $form->field($model, 'Ponto_idPonto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
