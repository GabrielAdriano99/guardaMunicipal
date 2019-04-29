<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Justificativa */

$this->title = Yii::t('app', 'Update Justificativa: {name}', [
    'name' => $model->idJustificativa,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Justificativas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idJustificativa, 'url' => ['view', 'id' => $model->idJustificativa]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="justificativa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
