<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FuncionarioHasMaterialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="funcionario-has-material-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idFuncionarioHasMaterial') ?>

    <?= $form->field($model, 'Funcionario_idFuncionario') ?>

    <?= $form->field($model, 'Material_idMaterial') ?>

    <?= $form->field($model, 'qtd_posse') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'data_emp') ?>

    <?php // echo $form->field($model, 'data_dev') ?>

    <?php // echo $form->field($model, 'qtd_dev') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
