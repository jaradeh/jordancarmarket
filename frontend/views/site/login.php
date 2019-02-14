<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>



<section class="login-form page-section-ptb">
    <div class="row">
        <div class="container">
            <div class="col-md-6 col-md-offset-3 login_form_image wow slideInLeft" data-wow-delay="0.3s">
                <div class='login_form_first_container'>
                    <div>
                        <center>
                            <p class='login_top_text'>LOGIN TO YOUR ACCOUNT</p>
                            <p class="link">Not a member yet? please <a href="/signup"> signup here </a></p>
                        </center>
                        <br />
                    </div>
                    <div class='login_form_container container'>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['class' => 'login_input', 'placeholder' => ' Username ']) ?>

                        <?= $form->field($model, 'password')->passwordInput(['class' => 'login_input', 'placeholder' => ' Password ']) ?>

                        <div class="form-group">
                            <div class="remember-checkbox mb-30">
                                <input type="checkbox" name="one" id="one">
                                <label for="one" class=""> Remember me</label>
                                <a href="/request-password-reset" class="pull-right red_color">Forgot Password?</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <?= Html::submitButton('LOG IN', ['class' => 'btn login_red_btn', 'name' => 'login-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                        <div class="login-social text-center">
                            <div class="text_with_borders_on_sides"><span>OR</span></div>
                            <ul>
                                <li><a class="fb button" href="/site/auth?authclient=facebook"><i class="fa fa-facebook"></i> Facebook</a></li>
                                <li><a class="twitter button" href="/site/auth?authclient=twitter"><i class="fa fa-twitter"></i> Twitter</a></li>
                                <li><a class="pinterest button" href="/site/auth?authclient=google"><i class="fa fa-google-plus"></i> google+</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
