<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FavList */

$this->title = 'Create Fav List';
$this->params['breadcrumbs'][] = ['label' => 'Fav Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fav-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
