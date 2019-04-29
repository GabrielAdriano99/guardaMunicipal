<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Escala */

$this->title = Yii::t('app', 'Update Escala: {name}', [
    'name' => $model->idEscala,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Escalas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEscala, 'url' => ['view', 'id' => $model->idEscala]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="escala-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
