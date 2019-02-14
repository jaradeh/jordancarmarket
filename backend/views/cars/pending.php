<?php
$i = 1;

use common\models\User;
use common\models\SearchUsers;
use backend\models\Years;

$get_user = User::find()->one();
//die(var_dump($get_user['username']));
?>
<div class="content-wrapper" style="min-height: 901px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Live Cars            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cars</li>
        </ol>
        <br>
        <a class="btn btn-success" href="/backend/web/cars/create">Create Make</a>    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12 col-sm-8 col-xs-12">

                <table class="table table-striped table-bordered"><thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Main Image</th>
                            <th>Year</th>
                            <th>Store owner</th>
                            <th>Status</th>
                            <th class="action-column">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($model as $cars => $car) { ?>
                            <tr data-key="1">
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $car->name ?></td>
                                <td><img width="60" src="/frontend/web/media/115x85/<?php echo $car->image ?>" alt="<?php echo $car->name ?>"></td>
                                <?php $get_user = User::find()->where(['id' => $car->user_id])->one(); ?>
                                <?php $get_year = Years::find()->where(['id' => $car->year])->one(); ?>
                                <td><?php echo $get_user['username'] ?></td>
                                <td><?php echo $get_year['name'] ?></td>
                                <?php if ($car->status == 1) { ?>
                                    <td><i class="glyphicon glyphicon-warning-sign text-warning"></i> <b class="text-warning">Pending</b></td>
                                <?php } else if ($car->status == 2) { ?>
                                    <td><i class="glyphicon glyphicon-remove text-danger"></i> <b class="text-danger">Cancel</b></td>
                                <?php } else { ?>
                                    <td><i class="glyphicon glyphicon-signal text-success"></i> <b class="text-success">Live</b></td>
                                <?php } ?>
                                <td>
                                    <?php if ($car->status == 1) { ?>
                                        <div class="margin">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action 
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="/backend/web/cars/changelive/<?php echo $car->id ?>" title="Live" aria-label="Live" data-pjax="0" data-confirm="Are you sure you want to change this item to Live ?" data-method="post"><span class="glyphicon glyphicon-signal text-success"></span> Live</a></li>
                                                    <li><a href="/backend/web/cars/changecancel/<?php echo $car->id ?>" title="Cancel" aria-label="Cancel" data-pjax="0" data-confirm="Are you sure you want to Cancel this item ?" data-method="post"><span class="glyphicon glyphicon-time text-danger"></span> Cancel</a></li>  
                                                </ul>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <a href="/backend/web/cars/changelive/<?php echo $car->id ?>" title="Live" aria-label="Live" data-pjax="0" data-confirm="Are you sure you want to change this item to Live ?" data-method="post"><span class="glyphicon glyphicon-signal text-success"></span> Live</a>
                                        <br />
                                        <a href="/backend/web/cars/changepending/<?php echo $car->id ?>" title="Pending" aria-label="Pending" data-pjax="0" data-confirm="Are you sure you want to change this item to pending ?" data-method="post"><span class="glyphicon glyphicon-warning-sign text-warning"></span> Pending</a>
                                    <?php } ?>
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