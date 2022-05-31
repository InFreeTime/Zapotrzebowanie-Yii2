<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OpinieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Opinies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opinie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Opinie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_zapotrzebowania',
            'id_opiniujacego',
            'id_user',
            'tresc:ntext',
            //'rekomendacja',
            //'data_opiniowania',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
