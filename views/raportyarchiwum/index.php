<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Raportyarchiwum;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RaportyarchiwumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Raporty archiwum';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raportyarchiwum-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Wróć do raportów', ['raporty/index'], ['class' => 'btn btn-success']) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'data_utworzenia',
            'przedmiot',
            'id_user',
            'opis:ntext',
            //'budzet',
            //'kwota_zakupu',
            //'kto_opiniuje',
            //'FV',
            //'status',
            //'archiwum',
                       ['class' => 'yii\grid\ActionColumn', 'template'=>'{view}'],

        ],
    ]); ?>


</div>
