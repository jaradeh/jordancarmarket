<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Milage */

$this->title = 'Update Milage: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Milages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="milage-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
