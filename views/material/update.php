<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Material */

$this->title = Yii::t('app', 'Update Material: {name}', [
    'name' => $model->idMaterial,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Materials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idMaterial, 'url' => ['view', 'id' => $model->idMaterial]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
