<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rekomendacje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rekomendacje-form">
    <?php
    $request= Yii::$app->request;
        
    $id_zapotrzebowania = $request->get('id');


    
    ?>

    <?php $form = ActiveForm::begin(); ?>
    
    

    <?= $form->field($model, 'id_zapotrzebowania')->hiddenInput(['value' => $id_zapotrzebowania])->label(false) ?>

    <?= $form->field($model, 'id_opiniujacego')->hiddenInput(['value' => Yii::$app->user->identity->id_opiniujacy])->label(false)?>

    <?= $form->field($model, 'id_user')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false) ?>

    <?= $form->field($model, 'tresc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_opiniowania')->textInput(['value' => date("Y-m-d H:i:s")]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
