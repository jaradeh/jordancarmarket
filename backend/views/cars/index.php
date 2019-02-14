<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Make;
use backend\models\Model;
use backend\models\Years;
use backend\models\Milage;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cars';
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
        <?= Html::a('Create Cars', ['create'], ['class' => 'btn btn-success']) ?>
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
//                        ['class' => 'yii\grid\SerialColumn'],
//                        'id',
//                        'slug',
//                        'name',
//                        'title',
//                        'user_id',
                        [
                            'attribute' => 'make_id',
                            'format' => 'html',
                            'value' => function ($model) {
                                $get_make = Make::find()->where(['id' => $model->make_id])->one();
                                return $get_make['name'];
                            },
                        ],
                        [
                            'attribute' => 'model_id',
                            'format' => 'html',
                            'value' => function ($model) {
                                $get_model = Model::find()->where(['id' => $model->make_id])->one();
                                return $get_model['name'];
                            },
                        ],
                        [
                            'attribute' => 'image',
                            'format' => 'html',
                            'value' => function ($model) {

                                return "<img src='/media/115x85/" . $model->image . "'>";
                            },
                        ],
                        // 'description:ntext',
                        [
                            'attribute' => 'price',
                            'format' => 'html',
                            'value' => function ($model) {
                                return number_format($model->price)." JOD";
                            },
                        ],
                        [
                            'attribute' => 'year',
                            'format' => 'html',
                            'value' => function ($model) {
                                $get_year = Years::find()->where(['id' => $model->year])->one();
                                return $get_year['name'];
                            },
                        ],
                        [
                            'attribute' => 'status',
                            'format' => 'html',
                            'value' => function ($model) {
                                if($model->status == 1){
                                    return "<i class='fa fa-warning text-warning'></i> Pending";
                                }else if($model->status == 2){
                                    return "<i class='fa fa-times text-danger'></i> Cancled";
                                }else{
                                    return "<i class='fa fa-check text-success'></i> Approved";
                                }
                            },
                        ],
                        // 'condition_id',
                        // 'exterior_color',
                        // 'interior_color',
                        // 'interior_type',
                        // 'transmission',
                        // 'engine',
                        // 'drivetrain',
                        // 'inspection',
                        // 'body_type',
                        // 'featured',
                        // 'status',
                        // 'type',
                        // 'location',
                        // 'ad_type',
                        // 'date_created',
                        // 'date_edited',
                        // 'lang_id',
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

