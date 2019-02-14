<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="register-form page-section-ptb" style='padding-bottom: 150px;'>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10" style='text-align: center;'>
                <div class="section-title">
                    <h2>Sign up</h2>
                    <br />
                    <div class="separator"></div>
                </div>
            </div>
        </div>













        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="gray-form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>First Name*</label>
                            <?= $form->field($model, 'first_name')->textInput(['maxlength' => 30, 'class' => 'form-control placeholder', 'placeholder' => 'Enter your First Name'])->label(false); ?>
                        </div> 
                        <div class="form-group col-md-6">
                            <label>Last Name*</label>
                            <?= $form->field($model, 'last_name')->textInput(['maxlength' => 30, 'class' => 'form-control placeholder', 'placeholder' => 'Enter your Last Name'])->label(false); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Username* </label>
                        <?= $form->field($model, 'username')->textInput(['maxlength' => 30, 'class' => 'form-control placeholder', 'placeholder' => 'Enter your username'])->label(false); ?>
                    </div>
                    <div class="form-group">
                        <label>Password* </label>
                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => 30, 'class' => 'form-control placeholder', 'placeholder' => 'Password'])->label(false); ?>
                    </div>
                    <div class="form-group">
                        <label>Re-enter Password*</label>
                        <input class="form-control placeholder" type="password" placeholder="Password" name="SignupForm[confirm_password]">
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <?= $form->field($model, 'email')->textInput(['maxlength' => 30, 'class' => 'form-control placeholder', 'placeholder' => 'Enter your email'])->label(false); ?>
                    </div>
                    <div class="form-group">
                        <label>Mobile phone *</label>
                        <?= $form->field($model, 'phone')->textInput(['maxlength' => 30, 'class' => 'form-control placeholder', 'placeholder' => 'Enter your phone'])->label(false); ?>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <div class="remember-checkbox">
                                    <input type="checkbox" name="one" id="one">
                                    <label for="one">Accept our <a href="#"> privacy policy</a> and <a href="#"> customer agreement</a></label>
                                </div>
                            </div>
                            <?= Html::submitInput('Register an account', ['id' => 'submit', 'class' => 'button register_button', 'name' => 'signup-button']) ?>
                            <br /><br />
                            <p class="link">Already have an account? please <a href="/login"> login here </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</section>