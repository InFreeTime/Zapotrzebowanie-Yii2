<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Opinie */

$this->title = 'Create Opinie';
$this->params['breadcrumbs'][] = ['label' => 'Opinies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opinie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
