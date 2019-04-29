<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Escala */

$this->title = Yii::t('app', 'Create Escala');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Escalas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escala-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
