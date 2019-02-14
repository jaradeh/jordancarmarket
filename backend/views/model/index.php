<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\ModelCategory;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $this->title ?>
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $this->title ?></li>
        </ol>
        <br />
        <?= Html::a('Create Model', ['create'], ['class' => 'btn btn-success']) ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12 col-sm-8 col-xs-12">
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
//                        'id',
                        'name',
                        [
                            'attribute' => 'make_id',
                            'format' => 'html',
                            'value' => function ($model) {
                                $get_make = ModelCategory::find()->where(['id' => $model->make_id])->one();
                                return $get_make['name'];
                            },
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

