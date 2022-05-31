<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Opinie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="opinie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_zapotrzebowania')->textInput() ?>

    <?= $form->field($model, 'id_opiniujacego')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'tresc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_opiniowania')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
