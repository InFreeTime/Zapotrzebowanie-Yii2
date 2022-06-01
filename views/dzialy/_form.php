<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dzialy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dzialy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nazwa_dzialu')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
