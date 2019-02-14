<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\ModelCategory;

/* @var $this yii\web\View */
/* @var $model backend\models\Model */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="../js/bootstrap-tagsinput.js"></script>

      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">


<style>
    .bootstrap-tagsinput {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        display: block;
        padding: 4px 6px;
        color: #555;
        vertical-align: middle;
        border-radius: 4px;
        max-width: 100%;
        line-height: 22px;
        cursor: text;
    }
    .bootstrap-tagsinput input {
        border: none;
        box-shadow: none;
        outline: none;
        background-color: transparent;
        padding: 0 6px;
        margin: 0;
        width: auto;
        max-width: inherit;
    }
</style>
<div class="model-form">

    <?php $form = ActiveForm::begin(); ?>




    <div class="form-group field-make-name required">
        <label class="control-label" for="make-name">Name</label>
        <br />
        <input type="text" value="" name="Model[name]" data-role="tagsinput" placeholder="Add Car Models" />

        <div class="help-block"></div>
    </div>
    <style>
        .bootstrap-tagsinput{
            width:100% !important;
        }
    </style>

    <script>
        $('input').tagsinput({
            typeahead: {
                source: function (query) {
                    return $.getJSON('citynames.json');
                }
            }
        });
    </script>


    <?= $form->field($model, 'make_id')->dropDownList(ArrayHelper::map(ModelCategory::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
<script src="tags-bootstrap/bootstrap-tagsinput.min.js"></script>-->