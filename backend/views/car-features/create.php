<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CarFeatures */

$this->title = 'Create Car Features';
$this->params['breadcrumbs'][] = ['label' => 'Car Features', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-features-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
