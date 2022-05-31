<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UzytkownicySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uzytkownicies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uzytkownicy-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Uzytkownicy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_opiniujacy',
            'username',
            'imie',
            'nazwisko',
            //'dostep_admin',
            //'dostep_user',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Uzytkownicy $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
