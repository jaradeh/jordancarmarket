<?php

use yii\helpers\Html;
use yii\grid\GridView;

$i = 0;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MakeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Makes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $make_name ?>
        </h1>
        <br />
        <a href="/backend/web/make" class="btn btn-primary">Back to make section</a>
        <br />
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12 col-sm-8 col-xs-12">
                <div id="w0" class="grid-view">
                    <table class="table table-striped table-bordered"><thead>
                            <tr>
                                <th>#</th>
                                <th><a href="#" data-sort="id">Model Name</a></th>
                                <th><a href="#">Action</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($models as $models_data => $model) { ?>
                                <tr data-key="1">
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $model->name ?></td>
                                    <td>
                                        <a href="/backend/web/model/<?php echo $model->id ?>" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        <a href="/backend/web/model/update/<?php echo $model->id ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="/backend/web/model/delete/<?php echo $model->id ?>" title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Are you sure you want to delete this item?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>            
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

