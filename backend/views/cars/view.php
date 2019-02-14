<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Cars */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
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
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12 col-sm-8 col-xs-12">
                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'slug',
                        'name',
                        'title',
                        'user_id',
                        'image',
                        'description:ntext',
                        'make_id',
                        'model_id',
                        'price',
                        'year',
                        'milage',
                        'condition_id',
                        'exterior_color',
                        'interior_color',
                        'interior_type',
                        'transmission',
                        'engine',
                        'drivetrain',
                        'inspection',
                        'body_type',
                        'featured',
                        'status',
                        'type',
                        'location',
                        'ad_type',
                        'date_created',
                        'date_edited',
                        'lang_id',
                    ],
                ])
                ?>
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
