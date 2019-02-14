<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Make;
use backend\models\BodyType;
use backend\models\Colors;
use backend\models\Milage;
use backend\models\CarsFeaturesCategory;
use dosamigos\tinymce\TinyMce;

$session = Yii::$app->session;
$lang_id = $session['language_id'];
$lang = $session['language'];
$make_details = Make::find()->where(['lang_id' => $lang_id])->orderBy(['name' => SORT_ASC])->all();
$features = CarsFeaturesCategory::find()->all();
$select_body_type = BodyType::find()->all();
$select_colors = Colors::find()->all();
$select_milage = Milage::find()->all();
$select = 0;
$i = 0;
/* @var $this yii\web\View */
/* @var $model backend\models\Cars */
/* @var $form yii\widgets\ActiveForm */
?>



<section class='add_post_section' id='top_head_scrolling'>


    <div class='container'>
        <div class='row'>
            <div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1'>



                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'form-car-add']]); ?>

                <div class="panel panel-primary setup-content" id="step-1">
                    <div class="panel-heading add_car_big_header">
                        <h3 class="panel-title"><span class='header_left_text'>General Informatio</span></h3>
                    </div>

                    <div class="panel-body">

                        <div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1'>
                            <div class='add_fields_wrapper'>
                                <div class="form-group">
                                    <span class='required_star red_color'>*</span><label class="control-label">Make</label>
                                    <div class="dropdown">
                                        <input type="text" placeholder="Select Car Make" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name" required="required" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <input type="hidden" id="make_id_for_post_final" name='Cars[make_id]' value="">
                                        <img class="select_main_image" id="select_image" src="/images/logo/add_field_logo.png">
                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>

                                        <ul class="dropdown-menu drop_down_enable_scroll">
                                            <li class="dropdown-header">Select Car(s)</li>
                                            <?php foreach ($make_details as $car_make => $make) { ?>
                                                <?php
                                                $i++;
                                                ?>
                                                <li class="select_main_li" id="<?php echo $make->id; ?>">
                                                    <div class='select_make_li' id='image<?php echo $make->id ?>'><img id='img_<?php echo $make->id ?>' src="/media/car_logo/<?php echo $make->path ?>" class='custome_dropdown_img create_car_make_logo_image' ><span class='car_make_name' id='image_<?php echo $make->id ?>_span'><?php echo $make->name ?></span><input type="hidden" id="make_id_<?php echo $make->id; ?>" value="<?php echo $make->id ?>"></div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class='required_star red_color'>*</span><label class="control-label">Model</label>
                                    <div class="dropdown">
                                        <input type="text" placeholder="Select Car Model" id="dropdownMenu2" value='' class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" disabled="">
                                        <input type="hidden" id="model_id_for_post_final" name="Cars[model_id]" value="" >
                                        <img class="select_main_image" src="/images/logo/sport-tuning-car-auto-model-512.png">
                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>
                                        <ul class="dropdown-menu drop_down_enable_scroll" id="add_model_list">
                                            <li class="dropdown-header">Select Model</li>

                                        </ul>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class='required_star red_color'>*</span><label class="control-label">Car Location</label>
                                    <div class="dropdown">
                                        <input type="text" placeholder="Select Car Location" id="car_location_input" value='' class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                                        <input type="hidden" id="location_id_for_post_final" name="Cars[location]" value="" >
                                        <i class='select_main_image fa fa-globe icon_location_globe' style='margin-right: 15px;'></i>
                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>
                                        <ul class="dropdown-menu drop_down_enable_scroll" id="car_location_list">
                                            <li class="dropdown-header">Select Location</li>
                                            <li class="select_main_location_li" id="1">
                                                <div class="select_model_li">
                                                    <i class='fa fa-globe' style='margin-right: 15px;'></i>
                                                    <span class="car_make_name " id="car_location_li_name_1"> Amman
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="select_main_location_li" id="2">
                                                <div class="select_model_li">
                                                    <i class='fa fa-globe' style='margin-right: 15px;'></i>
                                                    <span class="car_make_name" id="car_location_li_name_2"> Agency
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="select_main_location_li" id="3">
                                                <div class="select_model_li">
                                                    <i class='fa fa-globe' style='margin-right: 15px;'></i>
                                                    <span class="car_make_name" id="car_location_li_name_3">
                                                        Free Zone (Al Zarqa')
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary setup-content" id="step-2">
                    <div class="panel-heading add_car_big_header">
                        <h3 class="panel-title"><span class='header_left_text'>Description & Status</span></h3>
                    </div>
                    <div class="panel-body">
                        <div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1'>
                            <div class='add_fields_wrapper'>
                                <div class="form-group">

                                    <div class="col-sm-12"><br /></div>
                                    <div class="col-xs-12 col-sm-12 col-md-6  col-lg-6 no_padding">
                                        <?= $form->field($model, 'price')->textInput(['id' => 'add_car_price_field', 'maxlength' => '8']) ?>
                                        <i class="add_price_icon ">JOD</i>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                        <div class="form-group">
                                            <span class='required_star red_color'>*</span><label class="control-label">Year</label>
                                            <div class="dropdown">
                                                <input type="text" placeholder="Select Car Year" id="car_year_input_field" maxlength="4" class="btn btn-default dropdown-toggle  custom_dropdown  car_make_name" name="" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true=">
                                                <input type="hidden" id="car_year_for_post_final" value="" name="Cars[year]">
                                                <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>
                                                <ul class="dropdown-menu drop_down_enable_scroll" id="add_model_list">
                                                    <li class="dropdown-header">Select Year</li>
                                                    <?php for ($i = 39; $i > 1; $i--) { ?>
                                                        <li class="select_main_model_li_on_ad_form_year" id="<?php echo $i ?>">
                                                            <div class="select_model_li">
                                                                <span class="car_year_li_years" id="years_span_<?php echo $i; ?>">
                                                                    <?php
                                                                    $date = date('Y') - 39;
                                                                    echo $date + $i;
                                                                    ?></span>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                    <li class="select_main_model_li_on_ad_form_year" id="40"><div class="select_model_li"><span class="car_year_li_years" id="years_span_40">Older</span></div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12"><br /></div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                        <div class="form-group">
                                            <span class='required_star red_color'>*</span><label class="control-label">Milage</label>
                                            <div class="dropdown">
                                                <input type="text" placeholder="Select Car Milage" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name"  required="required" type="button" id="dropdown_milage_input" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <input type="hidden" name="Cars[milage]" id="milage_id_for_post_final" value="">
                                                <img class="select_main_image" id="select_image" src="/images/elements/milage.png">
                                                <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>
                                                <ul class="dropdown-menu drop_down_enable_scroll">
                                                    <li class="dropdown-header">Select Car Milage</li>
                                                    <?php foreach ($select_milage as $milage_details => $milage) { ?>
                                                        <li class="select_main_milage_li" id="<?php echo $milage->id ?>">
                                                            <div class="select_model_li">
                                                                <span class="car_year_li_years" id="milage_span_<?php echo $milage->id ?>">
                                                                    <?php echo $milage->name ?>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                        <div class="form-group" style="margin-top: 7px;">
                                            <span class='required_star red_color margin_left_15px'>*</span><label class="control-label">Car Condition</label>
                                            <div class="col-sm-12" style="margin-top: 11px;"></div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-check">
                                                    <label class="toggle" id='condition_btn_1'>
                                                        <input type="radio" name="Cars[condition_id]" id='condition_btn_radio_1' value="1" checked=""> <span class="label-text">New</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-check">
                                                    <label class="toggle" id='condition_btn_2'>
                                                        <input type="radio" name="Cars[condition_id]"  id='condition_btn_radio_2' value="2" > <span class="label-text">Used</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-check">
                                                    <label class="toggle" id='condition_btn_3'>
                                                        <input type="radio" name="Cars[condition_id]" id='condition_btn_radio_3' value="3" > <span class="label-text">Other</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <input type='hidden' id='condition_id_hidden_input' value='1'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <ul class="tags seperator_content">
                            <li><b>Select Features</b></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1'>
                            <div class='add_fields_wrapper'>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <label class="container_check label_for_checkbox" for="checkbox_select_all">
                                                <input type="checkbox" name="check" id="checkbox_select_all" class="checkbox_for_features" > <span class="label-text"><b>Select All</b></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php foreach ($features as $features_data => $feature) { ?>
                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                            <div class="form-check">
                                                <label class="label_for_checkbox lable_for_features">
                                                    <?php if ($select < 4) { ?>
                                                        <input type="checkbox" name="check[car_features_<?php echo $feature->id ?>]" class="checkbox_for_features" value='<?php echo $feature->id ?>' checked> <span class="label-text"><?php echo $feature->name ?></span>
                                                    <?php } else { ?>
                                                        <input type="checkbox" name="check[car_features_<?php echo $feature->id ?>]" class="checkbox_for_features" value='<?php echo $feature->id ?>'>  <span class="label-text"><?php echo $feature->name ?></span>
                                                    <?php } ?>
                                                </label>
                                            </div>
                                        </div>
                                        <?php $select++; ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <ul class="tags seperator_content">
                            <li id="error_slide_section_two"><b>Select Specs</b></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12"></div>
                        <div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1'>
                            <div class='add_fields_wrapper'>
                                <div class="form-group">
                                    <span class='required_star red_color'>*</span><label class="control-label">Body Type</label>
                                    <div class="dropdown">
                                        <input type="text" placeholder="Select Car Body Type" id="dropdown_body_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name "  required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <input type="hidden" id="body_type_for_post_final" value="" name="Cars[body_type]" value="">
                                        <span id="select_body_type_image_main_container_span">
                                            <img class="select_main_image " id="select_body_type_image_placeholer" src="/images/logo/sport-tuning-car-auto-model-512.png">
                                        </span>
                                        <span class="select_body_new_image_body_holder"  style="display: none;">
                                            <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2" id="select_body_type_new_icon_holder_container">
                                            </div>
                                        </span>
                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                        <ul class="dropdown-menu drop_down_enable_scroll" id="add_body_type_li">
                                            <li class="dropdown-header">Select Body Type</li>
                                            <?php foreach ($select_body_type as $body_type_details => $bodyType) { ?>
                                                <li class="select_car_body_main_li" id="<?php echo $bodyType->id ?>">
                                                    <div class='select_car_body_first_div' id='select_car_body_first_div_<?php echo $bodyType->id ?>'>
                                                        
                                                        <div class="car_body_label_container">
                                                            <div class='select_car_body_first_span car_body_lable' id='select_car_body_first_span_<?php echo $bodyType->id ?>'><?php echo $bodyType->name ?></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1'>
                            <div class="col-sm-12"><br /></div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                <div class="form-group">
                                    <span class='required_star red_color'>*</span><label class="control-label">Interior Type</label>
                                    <div class="dropdown">
                                        <input type="text" placeholder="Select Car Interior" id="dropdown_interior_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name " required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <input type="hidden" id="car_interior_for_post_final" value="" name="Cars[interior_type]" value="">
                                        <img class="select_main_image " id="car_interior_dropdown_image" src="/images/elements/seating.png">
                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                        <ul class="dropdown-menu drop_down_enable_scroll" id="add_body_type_li">
                                            <li class="dropdown-header">Select Car Interior Type</li>
                                            <li class="select_car_interior_li" id="1">
                                                <div class='select_make_li'>
                                                    <i class="fa fa-list-alt custome_dropdown_img"></i>
                                                    <span class='car_make_name' id='interior_name_span_1'>
                                                        Leather
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="select_car_interior_li" id="2">
                                                <div class='select_make_li'>
                                                    <i class="fa fa-list-alt custome_dropdown_img"></i>
                                                    <span class='car_make_name' id='interior_name_span_2'>
                                                        Fabric
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="select_car_interior_li" id="3">
                                                <div class='select_make_li'>
                                                    <i class="fa fa-list-alt custome_dropdown_img"></i>
                                                    <span class='car_make_name' id='interior_name_span_3'>
                                                        Sport Leather
                                                    </span>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 " >
                                <div class="form-group" style="margin-top: 7px;">
                                    <span class='required_star red_color margin_left_15px'>*</span><label class="control-label">Transmission</label>
                                    <div class="col-sm-12" style="margin-top: 11px;"></div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 no_padding">
                                        <div class="form-check">
                                            <label class="toggle" id='transmission_btn_1'>
                                                <input type="radio" name="Cars[transmission]" id='transmission_btn_radio_1' value="1" checked=""> <span class="label-text transmission_text">Automatic</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 no_padding">
                                        <div class="form-check">
                                            <label class="toggle" id='transmission_btn_2'>
                                                <input type="radio" name="Cars[transmission]" id='transmission_btn_radio_2' value="2" > <span class="label-text transmission_text">Manual</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 no_padding">
                                        <div class="form-check">
                                            <label class="toggle" id='transmission_btn_3'>
                                                <input type="radio" name="Cars[transmission]" id='transmission_btn_radio_3' value="3" > <span class="label-text transmission_text">Other</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input type='hidden' id='transmission_id_hidden_input' value='1'>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1'>
                            <div class="col-sm-12"><br /></div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                <div class="form-group">
                                    <span class='required_star red_color'>*</span><label class="control-label">Engine</label>
                                    <div class="dropdown">
                                        <input type="text" placeholder="Select Car Engine" id="dropdown_engine_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name " required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <input type="hidden" id="car_engine_for_post_final" value="" name="Cars[engine]" value="">
                                        <img class="select_main_image " id="car_interior_dropdown_image" src="/images/elements/icons-engine.png">
                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                        <ul class="dropdown-menu drop_down_enable_scroll" id="add_body_type_li">
                                            <li class="dropdown-header">Select Car Engine</li>
                                            <li class="select_car_engine_li" id="1">
                                                <div class='select_make_li'>
                                                    <i class="fa fa-cogs custome_dropdown_img"></i>
                                                    <span class='car_make_name' id='engine_name_span_1'>
                                                        4 Cylinder
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="select_car_engine_li" id="2">
                                                <div class='select_make_li'>
                                                    <i class="fa fa-cogs custome_dropdown_img"></i>
                                                    <span class='car_make_name' id='engine_name_span_2'>
                                                        6 Cylinder
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="select_car_engine_li" id="3">
                                                <div class='select_make_li'>
                                                    <i class="fa fa-cogs custome_dropdown_img"></i>
                                                    <span class='car_make_name' id='engine_name_span_3'>
                                                        8 Cylinder
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="select_car_engine_li" id="4">
                                                <div class='select_make_li'>
                                                    <i class="fa fa-cogs custome_dropdown_img"></i>
                                                    <span class='car_make_name' id='engine_name_span_4'>
                                                        Other
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 " >
                                <div class="form-group" style="margin-top: 7px;">
                                    <span class='required_star red_color '>*</span><label class="control-label">DRIVETRAIN</label>
                                    <div class="col-sm-12" style="margin-top: 11px;"></div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no_padding">
                                        <div class="form-check">
                                            <label class="toggle" id='drivetrain_btn_1'>
                                                <input type="radio" name="Cars[drivetrain]" id='drivetrain_btn_radio_1' value="1" checked=""> <span class="label-text transmission_text">FWD</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no_padding">
                                        <div class="form-check">
                                            <label class="toggle" id='drivetrain_btn_2'>
                                                <input type="radio" name="Cars[drivetrain]" id='drivetrain_btn_radio_2' value="2" > <span class="label-text transmission_text">RWD</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no_padding">
                                        <div class="form-check">
                                            <label class="toggle" id='drivetrain_btn_3'>
                                                <input type="radio" name="Cars[drivetrain]" id='drivetrain_btn_radio_3' value="3" > <span class="label-text transmission_text">4X4</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no_padding">
                                        <div class="form-check">
                                            <label class="toggle" id='drivetrain_btn_4'>
                                                <input type="radio" name="Cars[drivetrain]" id='drivetrain_btn_radio_4' value="4" > <span class="label-text transmission_text">Other</span>
                                            </label>
                                        </div>
                                    </div>
                                    <input type='hidden' id='drivetrain_id_hidden_input' value='1'>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1'>
                            <div class="col-sm-12"><br /></div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                <div class="form-group">
                                    <span class='required_star red_color'>*</span><label class="control-label">Exterior Color</label>
                                    <div class="dropdown">
                                        <input type="text" placeholder="Select Exterior Color" id="dropdown_exterior_color_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name "  required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <input type="hidden" id="car_exterior_color_for_post_final" value="" name="Cars[exterior_color]"  value="">
                                        <img class="select_main_image " id="car_exterior_color_dropdown_image" src="/images/elements/Color_wheel.png">
                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                        <ul class="dropdown-menu drop_down_enable_scroll">
                                            <li class="dropdown-header">Select Car Exterior Color</li>
                                            <?php foreach ($select_colors as $colors_details => $colors) { ?>
                                                <li class="select_exterior_li" id="<?php echo $colors->id ?>">
                                                    <div class='select_make_li'>
                                                        <img id='color_img_<?php echo $colors->id ?>' src="/images/elements/<?php echo $colors->path ?>" class='custome_dropdown_img shadow_box  create_car_make_logo_image' >
                                                        <span class='car_make_name' id='color_span_<?php echo $colors->id ?>'>
                                                            <?php echo $colors->name ?>
                                                        </span>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
                                <div class="form-group">
                                    <span class='required_star red_color'>*</span><label class="control-label">Interior Color</label>
                                    <div class="dropdown">
                                        <input type="text" placeholder="Select Interior Color" id="dropdown_interior_color_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name "  required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <input type="hidden" id="car_interior_color_for_post_final" value="" name="Cars[interior_color]" value="">
                                        <img class="select_main_image " id="car_interior_color_dropdown_image" src="/images/elements/Color_wheel.png">
                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                        <ul class="dropdown-menu drop_down_enable_scroll">
                                            <li class="dropdown-header">Select Car Interior Color</li>
                                            <?php foreach ($select_colors as $colors_details => $colors) { ?>
                                                <li class="select_interior_li" id="<?php echo $colors->id ?>">
                                                    <div class='select_make_li'>
                                                        <img id='color_interior_img_<?php echo $colors->id ?>' src="/images/elements/<?php echo $colors->path ?>" class='custome_dropdown_img shadow_box create_car_make_logo_image' >
                                                        <span class='car_make_name' id='interior_color_span_<?php echo $colors->id ?>'>
                                                            <?php echo $colors->name ?>
                                                        </span>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-3">

                    <div class="panel-heading add_car_big_header" id="show_images_slide">
                        <h3 class="panel-title"><span class='header_left_text'>Upload main Image</span></h3>
                    </div>
                    <div class="col-sm-12"></div>
                    <div class="panel-body">

                        <div class="row">


                            <div class='col-xs-12 col-sm-12 col-md-4 col-md-offset-1 col-lg-4 col-lg-offset-1'>
                                <div class='add_fields_wrapper'>
                                    <div class="form-group">
                                        <div class="panel panel-info" >
                                            <div id="div_for_main_image_select">
                                                <label for="select_main_images_input" style='width: 100%'>
                                                    <center>
                                                        <img id='main_image_container_src' src="/images/elements/placeholder.png" class='img-responsive' style='margin-top: 12px;'>
                                                    </center>
                                                </label>
                                                <div class="panel-footer text-center select_image_footer_custom">
                                                    <div class="btn-group">
                                                        <label class="btn btn-info btn-file">
                                                            <i class="fa fa-folder-open"></i>
                                                            <span id="select_image_featured_image_text_span">Select Main Image</span>
                                                            <?= $form->field($model, 'image', ['options' => ['tag' => 'div', 'style' => 'display:none',]])->fileInput(['id' => 'select_main_images_input', 'multiple' => FALSE, 'accept' => 'image/*'])->label(false) ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 '>
                                <div class='add_fields_wrapper'>
                                    <div class="form-group">
                                        <center>
                                            <p><i class="fa fa-warning  warning_icon_custom "></i> Images must be clear and real otherwise will be declined.</p>
                                            <p>Preferred Size</p>
                                            <small class="text-success">234px X 250px</small>
                                            <br /><br />
                                            <div class="col-sm-6">
                                                <img src="/images/elements/BMW-G30.JPG" class="img-responsive">
                                                <i class="fa fa-check-circle text-success icon_leading_image"></i>
                                            </div>
                                            <div class="col-sm-6">
                                                <img src="/images/elements/bmw-m2-road-test-0273_0.jpg" class="img-responsive">
                                                <i class="fa fa-times-circle text-danger icon_leading_image"></i>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>






                <div class="panel panel-primary setup-content" id="step-3">

                    <div class="panel-heading add_car_big_header" id="show_images_slide">
                        <h3 class="panel-title"><span class='header_left_text'>Upload Images</span></h3>
                    </div>
                    <div class="col-sm-12"></div>
                    <div class="panel-body">

                        <div class="row">


                            <div class='col-xs-12 col-sm-12 col-md-4 col-md-offset-1 col-lg-4 col-lg-offset-1'>
                                <div class='add_fields_wrapper'>
                                    <div class="form-group">
                                        <div class="panel panel-info" >


                                            <div id="div_for_main_image_select_two" >
                                                <label for="select_main_images_input_two" style='width: 100%;'>
                                                    <div class="panel-body text-center select_images_main_wrapper">
                                                        <center>
                                                            <i class="fa fa-camera camera_icon_custom"></i>
                                                        </center>
                                                    </div>
                                                </label>
                                                <div class="panel-footer text-center select_image_footer_custom">
                                                    <div class="btn-group">
                                                        <label class="btn btn-info btn-file">
                                                            <i class="fa fa-folder-open"></i>
                                                            <span id="select_image_featured_image_text_span_two">Select Image(s)</span>
                                                            <input type="hidden" id="images_con_two" name="CarsImages[images][]" value="">
                                                            <input type="file" id="select_main_images_input_two" name="CarsImages[images][]" multiple="" accept="image/*" >
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 '>
                                <div class='add_fields_wrapper'>
                                    <div class="form-group">
                                        <center>
                                            <p><i class="fa fa-warning  warning_icon_custom "></i> Images must be clear and real otherwise will be declined.</p>
                                            <p>Preferred Size</p>
                                            <small class="text-success">234px X 250px</small>
                                            <br /><br />
                                            <div class="col-sm-6">
                                                <img src="/images/elements/BMW-G30.JPG" class="img-responsive">
                                                <i class="fa fa-check-circle text-success icon_leading_image"></i>
                                            </div>
                                            <div class="col-sm-6">
                                                <img src="/images/elements/bmw-m2-road-test-0273_0.jpg" class="img-responsive">
                                                <i class="fa fa-times-circle text-danger icon_leading_image"></i>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12' id="images_big_wrapper" style="display: none;">
                                <input type="hidden" value="0" id="number_of_uploaded_images">
                                <div class='add_fields_wrapper'>
                                    <div class="form-group" id="populate_images_div_two">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>









                <div class="panel panel-primary setup-content" id="step-4">

                    <div class="panel-heading add_car_big_header" id="insepection_section_scroll_img">
                        <h3 class="panel-title"><span class='header_left_text'>Upload Inspection Image</span></h3>
                    </div>


                    <div class="col-sm-12"></div>
                    <div class="panel-body" id='show_inspection_image_slide'>

                        <div class="row">


                            <div class='col-xs-12 col-sm-12 col-md-4 col-md-offset-1 col-lg-4 col-lg-offset-1'>
                                <div class='add_fields_wrapper'>
                                    <div class="form-group">
                                        <div class="panel panel-info" >
                                            <label for="select_inspection_image_input" style='width: 100%'>
                                                <center>
                                                    <img id='inspection_image_holder_img' src="/images/elements/placeholder.png" class='img-responsive' style='margin-top: 12px;'>
                                                </center>
                                            </label>
                                            <div class="panel-footer text-center select_image_footer_custom">
                                                <div class="btn-group">
                                                    <label class="btn btn-info btn-file">
                                                        <i class="fa fa-folder-open"></i> <span id="select_incpection_image_text_span">Select Inspection Image</span> <?= $form->field($model, 'inspection', ['options' => ['tag' => 'div', 'style' => 'display:none',]])->fileInput(['id' => 'select_inspection_image_input', 'accept' => 'image/*'])->label(false) ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 '>
                                <div class='add_fields_wrapper'>
                                    <div class="form-group">
                                        <center>
                                            <p><i class="fa fa-warning  warning_icon_custom "></i> Image must be clear and real otherwise will be declined.</p>
                                            <input type='hidden' value='0' id='input_hidden_number_of_inspection_ing'>
                                            <br /><br />
                                            <p>Acceptable extensions : </p>
                                            <ul class="list-group">
                                                <li class="list-group-item"><i class="fa fa-file-pdf-o red_color"></i> PDF <i class="fa fa-check text-success"></i></li>
                                                <li class="list-group-item"><i class="fa fa-image red_color"></i> JPG <i class="fa fa-check text-success"></i></li>
                                                <li class="list-group-item"><i class="fa fa-image red_color"></i> PNG <i class="fa fa-check text-success"></i></li>
                                            </ul>
                                        </center>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-5">

                    <div class="panel-heading add_car_big_header">
                        <h3 class="panel-title"><span class='header_left_text'>List your car to sale for free</span></h3>
                    </div>

                    <div class="col-sm-6">
                        <ul class="tags seperator_content">
                            <li><a href="#">Confirmation</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12"></div>
                    <div class="panel-body">
                        <div class="row">

                            <div class='col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2'>
                                <div class='add_fields_wrapper'>
                                    <div class="form-group">
                                        <p class="header_left_text">
                                            <i class="fa fa-warning text-warning"></i> Please review your information before submitting and saving ! 
                                        </p>
                                        <br />
                                        <div class="panel panel-info" >

                                            <div class="col-xs 12 col-sm-12 col-md-12 col-lg-12">
                                                <input type="submit" class="btn btn-primary" value="Save Listing">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</section>
