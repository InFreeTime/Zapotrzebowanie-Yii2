<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RaportyarchiwumSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="raportyarchiwum-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'data_utworzenia') ?>

    <?= $form->field($model, 'przedmiot') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_dzialu') ?>

    <?= $form->field($model, 'opis') ?>

    <?php // echo $form->field($model, 'budzet') ?>

    <?php // echo $form->field($model, 'kwota_zakupu') ?>

    <?php // echo $form->field($model, 'kto_opiniuje') ?>

    <?php // echo $form->field($model, 'FV') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'archiwum') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
