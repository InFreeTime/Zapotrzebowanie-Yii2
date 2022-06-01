<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rekomendacje */

$this->title = 'Dodaj Rekomendacje / Zatwierdź';
$this->params['breadcrumbs'][] = ['label' => 'Rekomendacje', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rekomendacje-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
