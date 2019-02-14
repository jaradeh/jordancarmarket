<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Milage */

$this->title = 'Create Milage';
$this->params['breadcrumbs'][] = ['label' => 'Milages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="milage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
