<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FuncionarioHasMaterial */

$this->title = Yii::t('app', 'Create Funcionario Has Material');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funcionario Has Materials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-has-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
