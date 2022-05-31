<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Raportyarchiwum */

$this->title = 'Create Raportyarchiwum';
$this->params['breadcrumbs'][] = ['label' => 'Raportyarchiwums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raportyarchiwum-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
