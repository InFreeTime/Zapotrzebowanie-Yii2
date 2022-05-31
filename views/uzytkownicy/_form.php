<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Uzytkownicy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uzytkownicy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_opiniujacy')->textInput() ?>
    
    <?= $form->field($model, 'id_dzialu')->textInput() ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nazwisko')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dostep_admin')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'dostep_user')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
