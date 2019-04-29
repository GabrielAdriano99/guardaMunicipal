<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ponto */

$this->title = Yii::t('app', 'Update Ponto: {name}', [
    'name' => $model->idPonto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pontos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPonto, 'url' => ['view', 'id' => $model->idPonto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ponto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
