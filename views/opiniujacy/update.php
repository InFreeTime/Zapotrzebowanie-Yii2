<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Opiniujacy */

$this->title = 'Update Opiniujacy: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Opiniujacies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="opiniujacy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
