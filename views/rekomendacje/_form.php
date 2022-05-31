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
        
    $id_zapotrzebowania = $request->get('id_zapotrzebowania');

    $id_opiniujacego = $request->get('id_opiniujacego');

    
    ?>

    <?php $form = ActiveForm::begin(); ?>
    
    

    <?= $form->field($model, 'id_zapotrzebowania')->textInput(['value' => $id_zapotrzebowania]) ?>

    <?= $form->field($model, 'id_opiniujacego')->textInput(['value' => $id_opiniujacego]) // ['value' => Yii::$app->user->identity->id_opiniujaccego]?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'tresc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_opiniowania')->textInput(['value' => date("Y-m-d H:i:s")]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
