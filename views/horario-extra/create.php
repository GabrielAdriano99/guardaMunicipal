<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HorarioExtra */

$this->title = Yii::t('app', 'Create Horario Extra');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Horario Extras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horario-extra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
