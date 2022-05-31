<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Raportyarchiwum */

$this->title = 'Update Raportyarchiwum: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Raportyarchiwums', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="raportyarchiwum-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
