<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\FuncionarioHasMaterial */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="funcionario-has-material-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Funcionario_idFuncionario')->dropDownList(\app\models\Funcionario::getListarFuncionario(), ['prompt' => Yii::t('app', 'Select an employee')]) ?>

    <?= $form->field($model, 'Material_idMaterial')->dropDownList(\app\models\Material::getListarMaterial(), ['prompt' => Yii::t('app', 'Select the material to borrow')]) ?>

    <?= $form->field($model, 'qtd_posse')->textInput(['type' => 'number', 'min' => '0']) ?>

    <!-- $form->field($model, 'status')->dropDownList([ 'EM POSSE' => 'EM POSSE', 'DEVOLVIDO' => 'DEVOLVIDO', ], ['prompt' => '']) -->

    <!-- $form->field($model, 'data_emp')->textInput() -->

    <!-- $form->field($model, 'data_dev')->textInput() -->

    <!-- $form->field($model, 'qtd_dev')->textInput() -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Continue save'), ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Finish'), Url::to(['funcionario-has-material/index']), ['class' => 'btn btn-success']) ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>
