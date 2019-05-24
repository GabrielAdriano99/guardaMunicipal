<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HorarioExtra */

$this->title = Yii::t('app', 'Update Horario Extra: {name}', [
    'name' => $model->idHorarioExtra,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Horario Extras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idHorarioExtra, 'url' => ['view', 'id' => $model->idHorarioExtra]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="horario-extra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
