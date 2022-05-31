<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Raporty;

/* @var $this yii\web\View */
/* @var $model app\models\Raporty */
/* @var $form yii\widgets\ActiveForm */

   function getCenter(){
                
        $x= \app\models\Opiniujacy::find()->all();
        $y= ArrayHelper::map($x, 'id', 'nazwa');
        
        return $y;
    }
    
?>

<div class="raporty-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'data_utworzenia')->hiddenInput(['value' => date("Y-m-d H:i:s")])->label(false) ?>

    <?= $form->field($model, 'przedmiot')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_user')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false) ?>
    
    <?= $form->field($model, 'id_dzialu')->hiddenInput(['value' => Yii::$app->user->identity->id_dzialu])->label(false) ?>

    <?= $form->field($model, 'opis')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'budzet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kwota_zakupu')->textInput(['maxlength' => true]) ?>
     <?php
    echo "<label>Kto rekomenduje?</label>"; 
    echo Select2::widget([
        'model' => $model,
        'name' => 'kto_opiniuje',
        'attribute' => 'kto_opiniuje',
        'data' => getCenter(),
        'options' => [
            'multiple' => true,
            'placeholder' => '----Wybierz z listy----',
            ]
]);
    ?>

    <?php //$form->field($model, 'kto_opiniuje')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FV')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'status')->dropDownList([ 'Realizowane' => 'Realizowane', 'Zrealizowano' => 'Zrealizowano', 'Odmowa' => 'Odmowa', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'archiwum')->dropDownList([ 'nie' => 'Nie', 'tak' => 'Tak', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
