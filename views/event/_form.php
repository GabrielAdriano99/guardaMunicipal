<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Funcionario_idFuncionario')->dropDownList(\app\models\Funcionario::getListarFuncionario(), ['prompt' => Yii::t('app', 'Select an employee')]) ?>

    <!-- $form->field($model, 'title')->textInput(['maxlength' => true]) -->

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start')->widget(DateTimePicker::classname(), [
        'name' => 'datetime_12',
        //'value' => '08-Apr-2004 10:20 AM',
        'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd H:i:s P',
            'autoclose' => true,
        ]
]); ?>

    <?= $form->field($model, 'end')->widget(DateTimePicker::classname(), [
        'name' => 'datetime_12',
        //'value' => '08-Apr-2004 10:20 AM',
        'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd H:i:s P',
            'autoclose' => true,
        ]
]); ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
