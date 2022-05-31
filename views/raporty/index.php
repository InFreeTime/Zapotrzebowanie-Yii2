<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RaportySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Raporty';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raporty-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Stwórz Raport', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Archiwum Raportów', ['raportyarchiwum/index'], ['class' => 'btn btn-warning']) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'data_utworzenia',
            'przedmiot',
            //'id_user',
            'uzytkownicyNazwa',
            'opis:ntext',
            [
                'label' => 'Budzet (zł)',
                'attribute' => 'budzet',
                'contentOptions' => ['class' => 'col-lg-1'],
                'format' => ['decimal', 2],
            ],
            //'FV',
            'status',
           [
                'label' => 'Rekomendacje',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->getPrzycisk();
                },
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
        ],
    ]);
    ?>


</div>
