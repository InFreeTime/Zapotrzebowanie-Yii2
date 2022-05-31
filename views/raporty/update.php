<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Raporty */

$this->title = 'Update Raporty: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Raporties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="raporty-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        //'listaOpiniujacy' => $listaOpiniujacy,
    ]) ?>

</div>
