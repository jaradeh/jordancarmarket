<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CarsImages */

$this->title = 'Create Cars Images';
$this->params['breadcrumbs'][] = ['label' => 'Cars Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
