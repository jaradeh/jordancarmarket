<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CarFeaturesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Car Features';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-features-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Car Features', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'car_id',
            'cat_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
