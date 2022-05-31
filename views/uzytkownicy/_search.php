<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UzytkownicySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uzytkownicy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_opiniujacy') ?>

    <?= $form->field($model, 'id_dzialu') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'imie') ?>

    <?= $form->field($model, 'nazwisko') ?>

    <?php // echo $form->field($model, 'dostep_admin') ?>

    <?php // echo $form->field($model, 'dostep_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
