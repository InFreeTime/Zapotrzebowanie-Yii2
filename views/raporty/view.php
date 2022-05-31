<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



/* @var $this yii\web\View */
/* @var $model app\models\Raporty */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Raporties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="raporty-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'data_utworzenia',
            'przedmiot',
            'id_user',
            'id_dzialu',
            'opis:ntext',
            'budzet',
            'kwota_zakupu',
            'kto_opiniuje',
            'FV',
            'status',
            'archiwum',
        ],
    ]) ?>
    
     <?= Html::a('Wyślij do zaopiniowania <span class="glyphicon glyphicon-send"></span>', ['sendrekomendation', 'id' => $model->id], ['class' => 'btn btn-primary', 'target'=>'_blank']) ?>
     <?= Html::a('Wyślij do akceptacji <span class="glyphicon glyphicon-send"></span>', ['sendaccept', 'id' => $model->id], ['class' => 'btn btn-primary', 'target'=>'_blank']) ?>


</div>
