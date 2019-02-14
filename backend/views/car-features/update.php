<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CarFeatures */

$this->title = 'Update Car Features: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Car Features', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-features-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
