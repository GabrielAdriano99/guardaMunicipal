<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Funcionario */

$this->title = Yii::t('app', 'Update Funcionario: {name}', [
    'name' => $model->idFuncionario,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funcionarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idFuncionario, 'url' => ['view', 'id' => $model->idFuncionario]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="funcionario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
