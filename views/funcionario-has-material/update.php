<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FuncionarioHasMaterial */

$this->title = Yii::t('app', 'Update Funcionario Has Material: {name}', [
    'name' => $model->idFuncionarioHasMaterial,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funcionario Has Materials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idFuncionarioHasMaterial, 'url' => ['view', 'id' => $model->idFuncionarioHasMaterial]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="funcionario-has-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-update', [
        'model' => $model,
    ]) ?>

</div>
