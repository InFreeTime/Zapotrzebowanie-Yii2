<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Raporty */

$this->title = 'Tworzenie Raportu';
$this->params['breadcrumbs'][] = ['label' => 'Raporty', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raporty-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        //'listaOpiniujacy'=> $listaOpiniujacy,
    ]) ?>

</div>
