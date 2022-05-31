<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Opiniujacy */

$this->title = 'Create Opiniujacy';
$this->params['breadcrumbs'][] = ['label' => 'Opiniujacies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opiniujacy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
