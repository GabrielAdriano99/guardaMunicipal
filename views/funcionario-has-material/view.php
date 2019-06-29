<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FuncionarioHasMaterial */

$this->title = $model->idFuncionarioHasMaterial;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funcionario Has Materials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="funcionario-has-material-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idFuncionarioHasMaterial], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idFuncionarioHasMaterial], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idFuncionarioHasMaterial',
            'Funcionario_idFuncionario',
            'Material_idMaterial',
            'qtd_posse',
            'status',
            'data_emp',
            'data_dev',
            'qtd_dev',
        ],
    ]) ?>

</div>
