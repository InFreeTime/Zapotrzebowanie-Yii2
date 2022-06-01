<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dzialy */

$this->title = 'Create Dzialy';
$this->params['breadcrumbs'][] = ['label' => 'Dzialies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dzialy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
