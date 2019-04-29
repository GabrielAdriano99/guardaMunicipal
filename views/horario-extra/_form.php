<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HorarioExtra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="horario-extra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'horas_excedidas')->textInput() ?>

    <?= $form->field($model, 'Ponto_idPonto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>