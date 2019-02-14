<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FavList */

$this->title = 'Update Fav List: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fav Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fav-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
