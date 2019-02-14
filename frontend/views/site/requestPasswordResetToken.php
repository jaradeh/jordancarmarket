<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="form-gap"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style='margin-bottom: 100px'>
            <div class="panel panel-default">
                <div class="panel-body" style='padding: 15px;'>
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>You can reset your password here.</p>
                        <div class="panel-body">

                            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'id' => 'register-form']); ?>

                            <div class="form-group">
                                <div class="">

                                    <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'Email Address'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?= Html::submitButton('Send', ['class' => 'btn login_red_btn']) ?>
                            </div>

                            <input type="hidden" class="hide" name="token" id="token" value=""> 
                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>
                    <?php if (Yii::$app->session->hasFlash('success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h5><i class="icon fa fa-check"></i> Successfully Sent !</h5>
                            <?= Yii::$app->session->getFlash('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (Yii::$app->session->hasFlash('error')): ?>
                        <div class="alert alert-warning alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h5><i class="icon fa fa-warning"></i> Warning !</h5>
                            <?= Yii::$app->session->getFlash('error') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>



