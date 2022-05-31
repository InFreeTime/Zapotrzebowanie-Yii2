<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Raportyarchiwum */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="raportyarchiwum-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data_utworzenia')->textInput() ?>

    <?= $form->field($model, 'przedmiot')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_user')->textInput() ?>
    
    <?= $form->field($model, 'id_dzialu')->textInput() ?>

    <?= $form->field($model, 'opis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'budzet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kwota_zakupu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kto_opiniuje')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FV')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Realizowane' => 'Realizowane', 'Zrealizowano' => 'Zrealizowano', 'Odmowa' => 'Odmowa', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'archiwum')->dropDownList([ 'nie' => 'Nie', 'tak' => 'Tak', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
