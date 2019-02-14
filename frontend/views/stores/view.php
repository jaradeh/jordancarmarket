<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Make;
use backend\models\Model;
use backend\models\FavList;

/* @var $this yii\web\View */
/* @var $model backend\models\Stores */
$session = Yii::$app->session;
$lang_id = $session['language_id'];
$lang = $session['language'];
$i = 0;
$today_date = time();
$fast_search_counter = 0;
$fast_search_model_counter = 0;
$today_date_before_7_days = date('Y-m-d H:i:s', strtotime('-7 day', $today_date));
$today_date_before_7_days_timeStamp = strtotime($today_date_before_7_days);
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='container'>
    <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12' id='store_cover_photo_wrapper'>
            <?php if ($model->location == 2) { ?>
                <div class='cover_photo_div'>
                    <img src='/media/cover_photo/original/bmw-banner.jpg' class='img-responsive' style='max-height: 300px;width: 100%;'>
                </div>

            <?php } else { ?>
                <div class='video_wrapper'>
                    <iframe style='width:100%;height: 240px;' src="https://www.youtube.com/embed/OURAnmWjzeM?rel=0&amp;autoplay=1&mute=1&controls=0" frameborder="0" allow="autoplay;  encrypted-media" allowfullscreen></iframe>        
                </div>
            <?php } ?>
        </div>
        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
            <ul class="nav nav-pills" >
                <?php if ($model->location == 2) { ?>
                    <li class="store_profile_li active"><a href="#about" data-toggle="tab">About <b><?php echo $model->name ?></b> </a></li>
                    <li class='store_profile_li'><a href="#listings" data-toggle="tab">Listings (12) </a></li>
                    <li class='store_profile_li'><a href="#Promotions" data-toggle="tab"><i class="fa fa-star text-danger"></i> Promotions (5) </a></li>
                    <li class='store_profile_li'><a href="#certified" data-toggle="tab">Certified Pre-owned </a></li>
                <?php } else { ?>
                    <li class="dealer_store_profile_li active"><a href="#about" data-toggle="tab">About <b><?php echo $model->name ?></b> </a></li>
                    <li class='dealer_store_profile_li'><a href="#listings" data-toggle="tab">Listings (12) </a></li>
                    <li class='dealer_store_profile_li'><a href="#Promotions" data-toggle="tab"><i class="fa fa-star text-danger"></i> Promotions (5) </a></li>
                <?php } ?>
            </ul>

            <div class="tab-content clearfix">
                <div class="tab-pane active" id="about">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class='col-xs-6 col-sm-6 col-md-4 col-lg-4'>
                            <center>
                                <img src="/media/stores_logo_150x150/<?php echo $model->path ?>" class="img-responsive ">
                            </center>
                        </div>
                        <div class='col-xs-6 col-sm-6 col-md-8 col-lg-8'>
                            <div class="store_about_wrapper">
                                <div class="media-body fnt-smaller">
                                    <a href="/stores/<?php echo $model->slug ?>" target="_parent"></a>

                                    <h4 class="media-heading top-padding-10">
                                        <a href="/stores/<?php echo $model->slug ?>" target="_parent"><?php echo $model->name ?></a>
                                    </h4>


                                    <ul class="list-inline mrg-0 btm-mrg-10 clr-535353 top-padding-10">
                                        <li><i class='fa fa-map-marker'></i> Amman</li>

                                        <li style="list-style: none">|</li>

                                        <li><i class='fa fa-car'></i> 12 Listing</li>

                                        <li style="list-style: none">|</li>

                                        <li><i class='fa fa-shield text-success'></i> Verified</li>
                                    </ul>

                                    <span class="fnt-smaller fnt-lighter fnt-arial">Offers guaranteed New, used and pre-owned cars</span>
                                    <br /><br />
                                    <div>
                                        <ul class="dealer_info_ul">
                                            <li><i class="fa fa-clock-o"></i> Opening hours : Sun - Thu 08:00AM - 06:00PM</li>
                                            <li><i class="fa fa-envelope-o"></i> info@dealershio.com</li>
                                            <li><i class="fa fa-phone"></i> +962 799 799 799</li>
                                            <li><i class="fa fa-fax"></i> +962 799 799 799</li>
                                            <li><i class="fa fa-globe"></i> www.website.com</li>
                                        </ul>
                                    </div>

                                    <div class="b-footer__content-social" style='margin-top: 10px;text-align: left;'>
                                        <a href="#"><span class="fa fa-facebook-square"></span></a>
                                        <a href="#"><span class="fa fa-twitter-square"></span></a>
                                        <a href="#"><span class="fa fa-pinterest-square"></span></a>
                                        <a href="#"><span class="fa fa-instagram"></span></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="#Promotions" data-toggle="tab">
                                <img src="/media/promotions/original/unnamed (6).jpg">
                            </a>
                        </div>
                    </div>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                        <div class="store_google_map_wrapper">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.27819662138!2d35.83548611481545!3d31.980473181219846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca185283dfb89%3A0x611dda32fcd10faa!2sCity+Mall!5e0!3m2!1sen!2sjo!4v1533993057059" style="width: 100%;" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="listings">
                    <section class="b-search">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="car-search-tool-container b-search__main-type wow zoomInUp" data-wow-delay="0.3s" style="padding:5px;background:#f0f0f0;">

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no_padding">


                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                <div class="content_wrapper" style="margin-top: 25px;">
                                                                    <div class="dropdown">
                                                                        <input type="text" placeholder="Make" class="home-page-search-fields-input-text btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name"  type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <input type="hidden" id="input_home_search_make"  value="">
                                                                        <img class="select_main_image" id="select_image" src="/images/logo/add_field_logo.png">
                                                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>

                                                                        <ul class="dropdown-menu drop_down_enable_scroll">
                                                                            <li class="dropdown-header">Select Car(s)</li>
                                                                            <?php foreach ($make_details as $car_make => $make) { ?>
                                                                                <?php
                                                                                $i++;
                                                                                ?>
                                                                                <li class="select_main_li" id="<?php echo $i; ?>">
                                                                                    <div class='select_make_li' id='image<?php echo $i ?>'><img id='img_<?php echo $i ?>' src="/media/car_logo/<?php echo $make->path ?>" class='custome_dropdown_img create_car_make_logo_image' ><span class='car_make_name' id='image_<?php echo $i ?>_span'><?php echo $make->name ?></span><input type="hidden" id="make_id_<?php echo $i; ?>" value="<?php echo $make->id ?>"></div>
                                                                                </li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                <div class="content_wrapper" style="margin-top: 25px;">
                                                                    <div class="dropdown">
                                                                        <div class="dropdown">
                                                                            <input type="text" placeholder="Model" id="dropdownMenu2" value='' class="home-page-search-fields-input-text btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name"  type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" disabled="">
                                                                            <input type="hidden" id="model_id_for_post_final" name="Cars[model_id]" value="" >
                                                                            <img class="select_main_image" src="/images/logo/sport-tuning-car-auto-model-512.png">
                                                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>
                                                                            <ul class="dropdown-menu drop_down_enable_scroll" id="add_model_list">
                                                                                <li class="dropdown-header">Select Model</li>

                                                                            </ul> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no_padding">


                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                            <div class="content_wrapper">
                                                                <label class="color_dark form_lable" for="text_search">  Car Year</label>
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                                    <div class="dropdown">
                                                                        <input type="text" placeholder="From" id="input_home_search_year_from_container" maxlength="4" class="home-page-search-fields-input-text btn btn-default dropdown-toggle  custom_dropdown  car_make_name" name=""  type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true=">
                                                                        <input type="hidden" id="input_home_search_year_from" value="" >
                                                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_year_home_search" id="dropdown_icon_for_input_make"></span>
                                                                        <ul class="dropdown-menu drop_down_enable_scroll" id="add_model_list">
                                                                            <li class="dropdown-header">Select Year From</li>
                                                                            <?php for ($i = 39; $i > 1; $i--) { ?>
                                                                                <li class="select_year_from_input_home_search_main_li" id="<?php echo $i ?>">
                                                                                    <div class="select_model_li">
                                                                                        <span class="home_search_year_from_name" id="home_search_year_from_<?php echo $i; ?>">
                                                                                            <?php
                                                                                            $date = date('Y') - 39;
                                                                                            echo $date + $i;
                                                                                            ?></span>
                                                                                    </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                            <li class="select_year_from_input_home_search_main_li" id="40"><div class="select_model_li"><span class="car_year_li_years" id="home_search_year_from_40">Older</span></div></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                                    <div class="dropdown">
                                                                        <input type="text" placeholder="To" id="input_home_search_year_to_container" maxlength="4" class="home-page-search-fields-input-text btn btn-default dropdown-toggle  custom_dropdown  car_make_name" name=""  type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true=">
                                                                        <input type="hidden" id="input_home_search_year_to" value="" >
                                                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_year_home_search" id="dropdown_icon_for_input_make"></span>
                                                                        <ul class="dropdown-menu drop_down_enable_scroll" id="add_model_list">
                                                                            <li class="dropdown-header">Select Year From</li>
                                                                            <?php for ($i = 39; $i > 1; $i--) { ?>
                                                                                <li class="select_year_to_input_home_search_main_li" id="<?php echo $i ?>">
                                                                                    <div class="select_model_li">
                                                                                        <span class="home_search_year_from_name" id="home_search_year_to_<?php echo $i; ?>">
                                                                                            <?php
                                                                                            $date = date('Y') - 39;
                                                                                            echo $date + $i;
                                                                                            ?></span>
                                                                                    </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                            <li class="select_year_to_input_home_search_main_li" id="40"><div class="select_model_li"><span class="car_year_li_years" id="home_search_year_to_40">Older</span></div></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                                                <div class="content_wrapper">
                                                                    <label class="color_dark form_lable" for="text_search"> Price</label>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                                        <input type="text" class="home-page-search-fields-input-text input_form search_car_price_number custom_dropdown  " id="input_home_search_price_from" maxlength="8" placeholder="From">
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                                        <input type="text" class="home-page-search-fields-input-text input_form search_car_price_number custom_dropdown  " id="input_home_search_price_to" maxlength="8" placeholder="To">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 no_padding">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                <div class="content_wrapper" style="margin-left:3px;margin-top: 25px;">
                                                                    <div id="home_search_input_button_submit" class="button red pull-right" style="width: 100%; margin-bottom: 10px; padding: 0px; padding-top: 11px; padding-bottom: 10px;"><i class="glyphicon glyphicon-filter home_search_tool_icon"></i> Search </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" id="home_search_advanced_div_wrapper" style="display: none;">

                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding" >
                                                            <div class="content_wrapper">
                                                                <label class="color_dark form_lable" for="text_search"> Drivetrain</label>
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                    <input type="text" placeholder="Drivetrain" id="dropdown_engine_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name " required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                    <input type="hidden" id="car_engine_for_post_final" value="" name="Cars[engine]" value="">
                                                                    <img class="select_main_image " id="car_interior_dropdown_image" src="/images/elements/icons-engine.png" style="margin-left: 10px;">
                                                                    <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                                                    <ul class="dropdown-menu drop_down_enable_scroll" id="add_body_type_li">
                                                                        <li class="dropdown-header">Select Car Drivetrain</li>
                                                                        <li class="select_car_engine_li" id="1">
                                                                            <div class='select_make_li'>
                                                                                <i class="fa fa-cogs custome_dropdown_img"></i>
                                                                                <span class='car_make_name' id='engine_name_span_1'>
                                                                                    Rear wheel drive (RWD)
                                                                                </span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="select_car_engine_li" id="2">
                                                                            <div class='select_make_li'>
                                                                                <i class="fa fa-cogs custome_dropdown_img"></i>
                                                                                <span class='car_make_name' id='engine_name_span_2'>
                                                                                    Front wheel drive (FWD)
                                                                                </span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="select_car_engine_li" id="3">
                                                                            <div class='select_make_li'>
                                                                                <i class="fa fa-cogs custome_dropdown_img"></i>
                                                                                <span class='car_make_name' id='engine_name_span_3'>
                                                                                    4X4
                                                                                </span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                                                <div class="content_wrapper">
                                                                    <label class="color_dark form_lable" for="text_search"> Milage</label>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                        <input type="text" placeholder="<?= yii::t('app', 'Select Car Milage') ?>" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name"  required="required" type="button" id="dropdown_milage_input" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <input type="hidden" name="Cars[milage]" id="milage_id_for_post_final" value="">
                                                                        <img class="select_main_image" name="Cars[milage]" id="select_image" src="/images/elements/milage.png">
                                                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>
                                                                        <ul class="dropdown-menu drop_down_enable_scroll">
                                                                            <li class="dropdown-header"><?= yii::t('app', 'Select Car Milage') ?></li>
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
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">


                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                                                <div class="content_wrapper">
                                                                    <label class="color_dark form_lable" for="text_search"> Interior Color</label>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                        <input type="text" placeholder="Color" id="dropdown_interior_color_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name "  required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <input type="hidden" id="car_interior_color_for_post_final" value="" name="Cars[interior_color]"  value="">
                                                                        <img class="select_main_image " id="car_interior_color_dropdown_image" src="/images/elements/Color_wheel.png">
                                                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                                                        <ul class="dropdown-menu drop_down_enable_scroll">
                                                                            <li class="dropdown-header">Select Color</li>
                                                                            <?php foreach ($select_colors as $colors_details => $colors) { ?>
                                                                                <li class="select_interior_li" id="<?php echo $colors->id ?>">
                                                                                    <div class='select_make_li'>
                                                                                        <img id='color_img_<?php echo $colors->id ?>' src="/images/elements/<?php echo $colors->path ?>" class='custome_dropdown_img shadow_box create_car_color_image' >
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
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                                                <div class="content_wrapper">
                                                                    <label class="color_dark form_lable" for="text_search"> Exterior Color</label>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                        <input type="text" placeholder="Color" id="dropdown_exterior_color_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name "  required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <input type="hidden" id="car_exterior_color_for_post_final" value="" name="Cars[exterior_color]"  value="">
                                                                        <img class="select_main_image " id="car_exterior_color_dropdown_image" src="/images/elements/Color_wheel.png">
                                                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_exterior_color"></span>
                                                                        <ul class="dropdown-menu drop_down_enable_scroll">
                                                                            <li class="dropdown-header">Select Color</li>
                                                                            <?php foreach ($select_colors as $colors_details => $colors) { ?>
                                                                                <li class="select_interior_li" id="exterior_<?php echo $colors->id ?>">
                                                                                    <div class='select_make_li'>
                                                                                        <img id='exterior_color_img_<?php echo $colors->id ?>' src="/images/elements/<?php echo $colors->path ?>" class='custome_dropdown_img shadow_box create_car_color_image' >
                                                                                        <span class='car_make_name' id='exterior_color_span_<?php echo $colors->id ?>'>
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

                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><br /><br /></div>


                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">


                                                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 no_padding">
                                                            <h4>Select vehicle type</h4>
                                                        </div>

                                                        <div class="col-xs12 col-sm-12 col-md-10 col-lg-10 no_padding">


                                                            <div class="col-xs-2">
                                                                <input id="type1" type="radio" name="type" />
                                                                <label for="type1" class="b-search__main-type-svg">
                                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                         viewBox="47.6 310.9 500 220" enable-background="new 47.6 310.9 500 220" xml:space="preserve">
                                                                    <g>
                                                                    <path d="M258.3,343.6H277v41.2h-25.2l7.8-40.8L258.3,343.6L258.3,343.6z M295.4,343.6h39.4c18.3,1.8,33,8.7,47.2,19.7
                                                                          c-1.4,0.5-2.7,1.4-4.1,2.3v0.5c-3.7,3.7-5.5,13.3-5.5,18.8h-76.9V343.6L295.4,343.6z"/>
                                                                    <path d="M107.6,476.4c-20.6,0-46.2-7.8-47.6-8.2l-2.7-1.4v-39.8l2.3-1.4c1.8-1.8,6.9-7.3,6.9-11v-7.8c0.5-5.5,0.5-11.9,0.9-17.4
                                                                          c0-3.7,6-11,11.9-13.3l1.8-0.5h146.5l7.3-38.9c1.4-6.9,6.9-11.4,14.2-11.4h86.5c27.5,2.3,43.5,15.6,61.4,29.8
                                                                          c8.2,6.4,16.5,15.1,26.1,21.1c4.1,0.5,10.5,0.5,17.9,0.9c43.5,1.8,83.3,4.6,87.5,24.3l4.1,34.8c2.7,1.8,6.4,5.5,6.4,10.5v15.1
                                                                          c0,4.1-0.5,6.4-4.1,9.2c-6.9,4.1-14.7,6-30.7,6h-6.4v-9.2h6.9c13.7,0,20.1-0.9,25.2-4.1c0,0,0,0.5,0-1.4V447c0-1.4-2.3-2.7-3.2-3.2
                                                                          l-2.7-0.9l-4.6-39.4c-3.2-13.3-54-15.1-78.3-16c-8.2-0.5-15.1-0.5-19.7-0.9l-1.8-0.5c-10.5-6.4-19.7-16-27.9-22.9
                                                                          c-16.9-13.7-31.6-25.6-55.4-27.5h-87.5c-2.3,0-4.1,0.9-4.6,3.2l-8.7,47.2H81.5c-2.7,1.4-5,4.1-5.5,5c0,4.6-0.5,11.4-0.5,16.9v7.3
                                                                          c0,6.9-6.4,13.3-9.2,16v28.4c7.3,2.7,26.6,8.7,41.7,8.2h8.7v9.2h-8.2C108.1,476.4,108.1,476.4,107.6,476.4L107.6,476.4z
                                                                          M423.6,476.4H185.5v-9.2h238.1V476.4L423.6,476.4z"/>
                                                                    <polygon points="529.3,444.3 523.4,407.7 515.1,407.7 515.1,444.3 	"/>
                                                                    <polygon points="327.4,398.5 304.5,398.5 304.5,393.9 327.4,393.9 	"/>
                                                                    <path d="M70.5,412.2h5c9.6,0,22.4-5.5,22.9-14.2v-8.7H72.3C72.3,397.6,71,406.3,70.5,412.2L70.5,412.2z"/>
                                                                    <path d="M381,368.7L381,368.7c-2.7,2.7-4.1,12.4-4.1,16c0,1.4,0.5,2.3,1.4,3.2c0.9,0.9,1.8,1.4,3.2,1.4H392c11.4,0-1.8-20.1-6-21.5
                                                                          C384.2,366.9,382.4,367.4,381,368.7L381,368.7z"/>
                                                                    <polygon points="222.1,443.4 222.1,453.5 394.3,453.5 	"/>
                                                                    <path d="M405.2,471.8h-4.6v-12.4c0-33.4,25.6-60.4,59.1-60.4s60,27,60,60.4v12.4h-4.6v-13.3c0-29.8-25.6-53.1-55.4-53.1
                                                                          c-29.8,0-54.5,24.3-54.5,54V471.8L405.2,471.8z"/>
                                                                    <path d="M460.7,457.1c-6,0-10.5,4.6-10.5,10.5s4.6,10.5,10.5,10.5c6,0,10.5-4.6,10.5-10.5S466.6,457.1,460.7,457.1L460.7,457.1z"/>
                                                                    <path d="M210.2,471.8h-6.4v-12.4c0-29.8-23.8-54-53.6-54s-51.7,24.3-51.7,54v12.4h-9.2V459c0-33.4,27-60,60.4-60
                                                                          s62.7,25.6,62.7,59.1L210.2,471.8L210.2,471.8z"/>
                                                                    <path d="M460.7,413.2L460.7,413.2c12.8,0,24.3,5,32.5,13.7h-0.9c8.2,8.2,13.7,19.7,13.7,32.5v14.2v3.2h-4.6H500
                                                                          c-2.3,7.8-6.9,15.1-12.8,20.1c-6.9,6-16,11.4-26.1,11.4s-19.2-3.7-26.1-9.6V497c-6-5-10.5-12.4-12.8-20.1h-2.3h-5v-4.6v-12.4
                                                                          c0-12.8,5-24.3,13.7-32.5h0.5C436.8,418.2,448.3,413.2,460.7,413.2L460.7,413.2L460.7,413.2z M460.7,440.6c-14.7,0-27,11.9-27,27
                                                                          c0,14.7,11.9,27,27,27c14.7,0,27-11.9,27-27C487.7,452.5,475.8,440.6,460.7,440.6L460.7,440.6L460.7,440.6z M152,440.6
                                                                          c-14.7,0-27,11.9-27,27c0,14.7,11.9,27,27,27c14.7,0,27-11.9,27-27C179,452.5,166.7,440.6,152,440.6L152,440.6L152,440.6z
                                                                          M152,413.2L152,413.2c12.8,0,24.3,5,32.5,13.7h0.9c8.2,8.2,13.7,19.7,13.7,32.5v14.2v3.2h-4.6h-3.7c-2.3,7.8-6.9,15.1-12.8,20.1
                                                                          c-6.9,6-16,11.4-26.1,11.4c-10.1,0-19.2-5.5-26.1-11.4c-6-5-10.5-12.4-12.8-20.1h-2.3h-3.2v-4.6v-12.4c0-12.8,5-24.3,13.7-32.5
                                                                          C129.6,418.2,139.2,413.2,152,413.2L152,413.2z"/>
                                                                    <path d="M152,457.1c-6,0-10.5,4.6-10.5,10.5s4.6,10.5,10.5,10.5c6,0,10.5-4.6,10.5-10.5S158,457.1,152,457.1L152,457.1z"/>
                                                                    </g>
                                                                    </svg>
                                                                </label>
                                                                <h5><label for="type1">Pickup</label></h5>
                                                            </div>
                                                            <div class="col-xs-2">
                                                                <input id="type2" type="radio" name="type" />
                                                                <label for="type2" class="b-search__main-type-svg">
                                                                    <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                         viewBox="47.6 310.9 500 220" enable-background="new 47.6 310.9 500 220" xml:space="preserve">
                                                                    <g>
                                                                    <path d="M199.2,342.6h95.7c23.8,2.3,47.2,17.4,68.7,31.1c-0.5,0.5-0.9,0.9-1.4,1.4l0,0c-3.7,3.2-5.5,7.8-5.5,12.4
                                                                          c0,0.5,0,0.9,0,1.4l-218.4-8.2C161.2,361.9,174.9,342.6,199.2,342.6L199.2,342.6z"/>
                                                                    <path d="M115.4,475.4c-21.5,0-33.4-11.4-33.9-11.9l-1.4-1.4v-28.4l0.5-0.9c0.9-1.8,3.2-7.3,3.2-11.9c0-4.1,0.5-10.5,0.5-16.9v-11
                                                                          c0.5-7.3,27.5-36.6,36.6-44.9v-9.6l4.6-2.7c18.8-4.1,55.4-6.4,80.6-6.4h89.3c33.4,2.7,64.6,22.9,92,40.3c5,3.2,9.6,7.8,14.2,10.5
                                                                          c2.3,0,4.6,0.5,8.2,0.9c51.7,5,100.3,11.9,104.9,32.1v62.3l-3.7,2.7c-6.9,1.4-13.3,2.3-27.9,2.3h-13.7v-9.2h14.2
                                                                          c11.9,0,17.9-0.5,22.4-1.4v-56.3c-2.3-9.6-34.8-17.9-96.2-23.8c-3.7-0.5-6.9-0.5-9.6-0.9l-1.8-0.5c-5-3.2-10.1-8.2-15.6-11.4
                                                                          c-27.9-17.9-56.8-36.2-87.5-38.5h-89.7c-22.9,0-55.9,1.8-75.1,5.5v8.2l-4.1,1.8c-4.6,2.7-30.7,34.3-32.5,40.3v10.5
                                                                          c0,6.4-0.9,12.8-0.9,16.9c0,6.4-1.8,12.8-3.7,15.6v19.7c3.2,2.7,12.4,10.5,26.6,10.1h5.5v9.2L115.4,475.4
                                                                          C114.5,475.4,115.9,475.4,115.4,475.4L115.4,475.4z M396.1,475.4H194.6v-9.2h201.5V475.4L396.1,475.4z"/>
                                                                    <path d="M365.4,378.4L365.4,378.4c-2.7,2.7-4.1,6-4.1,9.6c0,1.4,0.5,2.7,1.4,3.7c0.9,0.9,1.8,1.4,3.2,1.4h10.5
                                                                          c1.8,0,3.2-0.9,4.1-2.3c0.9-1.4,0.9-3.7,0-5c-1.8-3.2-5-6.4-10.1-8.2C368.6,376.5,366.8,377,365.4,378.4L365.4,378.4z"/>
                                                                    <path d="M367.2,390.7c-0.9,0-1.8-0.5-2.7-1.4l-6-8.2c-0.9-1.4-0.9-3.2,0.9-4.6c1.4-0.9,3.2-0.9,4.6,0.9l6,8.2
                                                                          c0.9,1.4,0.9,3.2-0.9,4.6C368.2,390.3,367.7,390.7,367.2,390.7L367.2,390.7z"/>
                                                                    <path d="M90.2,406.7h8.2c7.8,0,17.9-5.5,18.3-12.4v-6H92.5C92.5,394.8,90.2,400.3,90.2,406.7L90.2,406.7z"/>
                                                                    <path d="M478.1,402.2l11,20.1c3.7-2.3,9.2-4.1,13.3-4.1l0,0l0,0l0,0l0,0l0,0l0,0c2.7,0,5.5-1.8,8.7-1.8c0-8.2,0.9-8.7-6.4-14.2
                                                                          H478.1L478.1,402.2z"/>
                                                                    <polygon points="299.9,406.7 277,406.7 277,402.2 299.9,402.2 	"/>
                                                                    <polygon points="194.6,402.2 171.7,402.2 171.7,397.6 194.6,397.6 	"/>
                                                                    <polygon points="222.1,450.7 222.1,457.1 371.4,457.1 	"/>
                                                                    <path d="M508.7,436.1c-6.9,0-10.1,0-16.9,0c-3.7,3.7-3.7,8.2-3.7,12.8c6.9,0,13.7,0,20.6,0C508.7,444.8,508.7,440.2,508.7,436.1
                                                                          L508.7,436.1z"/>
                                                                    <path d="M488.6,457.1c-1.4-2.7-1.4-6.4-1.4-9.2c6.9,0,7.3,0.5,14.2,0.5v8.7H488.6L488.6,457.1z"/>
                                                                    <path d="M138.3,347.7l-44.4,38.9v-8.7c9.2-12.4,28.4-33.4,32.1-35.7L138.3,347.7L138.3,347.7z"/>
                                                                    <path d="M126.8,500.2c-6-5-10.5-12.4-12.8-20.1h-2.3h-3.7v-4.6v-16c0-12.8,5-24.3,13.7-32.5c8.2-8.2,18.8-13.7,31.6-13.7l0,0
                                                                          c12.8,0,24.3,5,32.5,13.7h0.5c8.2,8.2,13.7,19.7,13.7,32.5v14.2v6.9h-4.6h-2.7c-2.3,7.8-6.9,15.1-12.8,20.1c-6.9,6-16,7.8-26.1,7.8
                                                                          s-19.2-3.7-26.1-9.6v1.4H126.8z M427.2,440.6c-14.7,0-27,11.9-27,27c0,14.7,11.9,27,27,27c14.7,0,27-11.9,27-27
                                                                          C453.8,452.5,441.9,440.6,427.2,440.6L427.2,440.6L427.2,440.6z M152.9,440.6c-14.7,0-27,11.9-27,27c0,14.7,11.9,27,27,27
                                                                          c14.7,0,27-11.9,27-27C179.5,452.5,167.6,440.6,152.9,440.6L152.9,440.6L152.9,440.6z M427.2,413.2L427.2,413.2
                                                                          c12.8,0,24.3,5,32.5,13.7h0.9c8.2,8.2,13.7,19.7,13.7,32.5v14.2v6.9h-4.6h-3.2c-2.3,7.8-6.9,15.1-12.8,20.1c-6.9,6-16,7.8-26.1,7.8
                                                                          s-19.2-3.7-26.1-9.6v1.8c-6-5-10.5-12.4-12.8-20.1h-2.3h-3.7v-4.6v-16c0-12.8,5-24.3,13.7-32.5
                                                                          C404.3,418.2,414.4,413.2,427.2,413.2L427.2,413.2L427.2,413.2z M427.2,457.1c6,0,10.5,4.6,10.5,10.5s-4.6,10.5-10.5,10.5
                                                                          c-6,0-10.5-4.6-10.5-10.5S421.3,457.1,427.2,457.1L427.2,457.1L427.2,457.1z M152.9,457.1c-6,0-10.5,4.6-10.5,10.5
                                                                          s4.6,10.5,10.5,10.5c6,0,10.5-4.6,10.5-10.5C163,461.7,158.4,457.1,152.9,457.1L152.9,457.1z"/>
                                                                    </g>
                                                                    </svg>
                                                                </label>
                                                                <h5><label for="type2">Suv</label></h5>
                                                            </div>
                                                            <div class="col-xs-2">
                                                                <input id="type3" type="radio" name="type" />
                                                                <label for="type3" class="b-search__main-type-svg">
                                                                    <svg  version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                          viewBox="47.6 310.9 500 220" enable-background="new 47.6 310.9 500 220" xml:space="preserve">
                                                                    <g>
                                                                    <path d="M198.7,492.4v-9.2h21.1c65.9,0,134.2-0.5,198.7,0v9.2c-64.6,0-132.8,0-198.7,0H198.7L198.7,492.4z M152.9,493.8
                                                                          c-20.6-2.7-57.2-13.7-69.1-22.4l-4.1-1.4v-25.6l1.4-1.4c1.8-1.8,6-8.2,6-12.8l4.1-18.3L86.5,393l22,2.7h37.5
                                                                          c3.7-1.4,8.7-3.7,14.2-6c29.3-11.9,56.8-21.5,68.7-21.5h78.8c1.4,0,2.3,0,3.7,0.5c23.8,6.9,45.3,18.8,70.5,33.4h0.5
                                                                          c70.1,2.7,111.3,8.2,125.5,16.5l2.3,1.4v14.7l5.5,4.6v2.3c0,17.9-7.8,25.2-12.4,29.3c0,0.5-0.5,0.9,0,0.9c1.4,2.7,2.3,5,2.3,7.8
                                                                          v3.2l-5,1.4c-11,4.6-22.4,7.3-36.2,8.7v-9.6c11-0.9,21.1-3.2,30.2-6.4c0-0.5,0.9-0.5,0.9-0.9c-0.9-2.3-1.8-4.1-1.8-6v-2.3l0.9-0.9
                                                                          c0.9-0.9,1.4-1.4,2.3-2.3c4.1-3.7,9.2-7.8,9.6-20.1l-5.5-4.6v-16c-11-5-40.3-11-118.1-14.2h-3.7l-0.9-0.5
                                                                          c-24.7-14.7-46.2-24.7-69.1-31.1c-0.5,0-0.9,0-0.9,0H229c-10.5,0-44.9,13.7-65,22c-6.4,2.3-11.4,4.1-15.6,5.5l-1.4,0.5h-39.4h-8.2
                                                                          l1.4,5.5l-4.6,20.6c0,6.4-5,13.7-7.8,16.5v16.9c12.4,7.3,46.2,16.9,64.1,19.2v9.2H152.9z"/>
                                                                    <path d="M243.6,385.2c0.5,8.2,1.4,16,1.8,24.3c-12.4-2.7-25.2-5.5-37.5-8.7C223,390.7,225.7,385.2,243.6,385.2L243.6,385.2
                                                                          L243.6,385.2z M253.2,385.2c17.9,0,36.2,0,54,0c12.8,3.7,25.2,9.2,37.5,15.1l-0.5,0.5l0,0c-2.7,2.7-4.6,6.4-5.5,10.1
                                                                          c-9.2,0-19.7,0-30.7,0c-17.4,0-35.3,0-52.7,0C254.6,402.6,254.1,393.9,253.2,385.2L253.2,385.2z"/>
                                                                    <path d="M424.9,503.4c-4.6-2.3-8.2-6-11.4-10.1l-3.2-0.5c-1.8-0.5-5-0.9-6.9-0.9l-3.7-0.9v-3.7V475c0-11.9,2.7-22.4,10.5-30.2h1.4
                                                                          c6.4-6.4,16-10.5,30.2-10.5c13.7,0,23.4,4.1,30.2,10.5l0,0c7.8,7.8,10.5,18.3,10.5,30.2v7.8v4.1l-4.1,0.5c-1.4,0.5-2.7,0.5-4.1,0.9
                                                                          l0,0l-1.4,0.5c-2.7,5.5-6.4,10.1-11.4,13.7c-5.5,3.7-12.4,6-19.7,6C435.9,507.9,430,506.1,424.9,503.4L424.9,503.4L424.9,503.4
                                                                          L424.9,503.4z M441.9,449.3c-13.3,0-23.8,10.5-23.8,23.8s10.5,23.8,23.8,23.8c13.3,0,23.8-10.5,23.8-23.8
                                                                          C465.7,460.3,455.2,449.3,441.9,449.3L441.9,449.3L441.9,449.3z M174.5,449.3c-13.3,0-23.8,10.5-23.8,23.8s10.5,23.8,23.8,23.8
                                                                          c13.3,0,23.8-10.5,23.8-23.8C198.3,460.3,187.7,449.3,174.5,449.3L174.5,449.3L174.5,449.3z M145.2,444.3h-0.5
                                                                          c6.4-6.4,16-10.5,30.2-10.5c13.7,0,23.4,4.1,30.2,10.5h1.8c7.8,7.8,10.5,18.3,10.5,30.2v15.1v2.7h-4.6h-11.4
                                                                          c-2.7,3.7-6.4,6.9-11,9.2c-5,2.7-10.5,6-16,6c-6,0-11.9-1.4-16.5-4.6c-4.6-2.3-8.2-6-11.4-10.1l-3.2-0.5c-1.8-0.5-3.2-0.9-5-1.4
                                                                          l-3.7-0.9v-3.7v-12.4C134.6,462.6,137.4,452.1,145.2,444.3L145.2,444.3z"/>
                                                                    <path d="M174.5,464.9c-5,0-8.7,3.7-8.7,8.7c0,4.6,3.7,8.7,8.7,8.7c4.6,0,8.7-4.1,8.7-8.7C183.2,468.6,179,464.9,174.5,464.9
                                                                          L174.5,464.9z"/>
                                                                    <polygon points="281.2,423.7 258.3,423.7 258.3,419.1 281.2,419.1 	"/>
                                                                    <polygon points="230.8,465.4 230.8,474.1 388.8,474.1 	"/>
                                                                    <path d="M441.9,464.9c-4.6,0-8.7,3.7-8.7,8.7c0,4.6,3.7,8.7,8.7,8.7s8.7-4.1,8.7-8.7C450.6,468.6,446.5,464.9,441.9,464.9
                                                                          L441.9,464.9z"/>
                                                                    <path d="M464.3,396.2h-49.9l-21.1,9.2v2.3c21.5,1.4,47.6,3.2,71,6V396.2L464.3,396.2z"/>
                                                                    <path d="M347.1,404.5L347.1,404.5c-2.7,2.7-4.1,6-4.1,9.6c0,1.4,0.5,2.7,1.4,4.1c0.9,0.9,1.8,1.4,3.2,1.4h10.5
                                                                          c1.8,0,3.2-0.9,4.1-2.3c0.9-1.4,0.9-3.7,0-5c-1.8-3.2-5-6.4-10.1-8.2C350.3,402.6,348.5,403.1,347.1,404.5L347.1,404.5z"/>
                                                                    <path d="M355.8,423.7c-0.9,0-1.8-0.5-2.7-1.4l-6-8.2c-0.9-1.4-0.9-3.2,0.9-4.6c1.4-0.9,3.2-0.9,4.6,0.5l6,8.2
                                                                          c0.9,1.4,0.9,3.2-0.5,4.6C357.2,423.2,356.7,423.7,355.8,423.7L355.8,423.7z"/>
                                                                    </g>
                                                                    </svg>
                                                                </label>
                                                                <h5><label for="type3">Coupe</label></h5>
                                                            </div>
                                                            <div class="col-xs-2">
                                                                <input id="type4" type="radio" name="type" />
                                                                <label for="type4" class="b-search__main-type-svg">
                                                                    <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                         viewBox="47.6 310.9 500 220" enable-background="new 47.6 310.9 500 220" xml:space="preserve">
                                                                    <g>
                                                                    <path d="M249.1,378.4h-0.9c-4.1,0.5-6,4.1-7.3,8.2l-2.3,8.7c-4.1,12.8,19.2,12.8,18.8,1.8v-11.4
                                                                          C256.9,381.1,253.7,377.9,249.1,378.4L249.1,378.4z"/>
                                                                    <path d="M142,488.3c-21.1,0-41.7-14.2-42.6-14.7l-2.3-1.4v-32.1l2.3-1.4c0.9-1.8,2.3-7.3,2.3-11.9v-30.2l58.6-3.7
                                                                          c25.2-1.4,40.8,1.4,58.2,4.1c9.6,1.4,19.7,3.2,31.6,4.1h95.2c5.5,0,11-0.9,16.9-1.4c6-0.9,11.9-1.8,18.3-1.8
                                                                          c0.9,0,38.9,4.1,69.6,11.9c33,8.2,44,21.5,45.3,27.5l2.7,47.2l-4.1,0.9c-7.8,1.8-14.2,2.7-31.1,2.7h-18.3v-9.2h16
                                                                          c12.8,0,19.7-0.5,25.2-1.8v-2.7v-35.7c-0.5-1.4-9.6-11.9-38-19.2c-29.8-7.8-67.3-11.9-67.8-11.9c-5,0-10.5,0.5-16.5,1.4
                                                                          c-6,0.9-11.9,1.8-18.3,1.8h-95.7c-12.8-0.9-22.9-2.7-33-4.1c-16.5-2.7-31.6-4.6-55.9-3.7l-49.9,2.7v21.5c0,6.4-3.2,12.8-4.6,15.6
                                                                          v23.8c6,3.7,22.9,12.4,38,11.9h12.4v9.2h-14.2C142,488.3,142.4,488.3,142,488.3L142,488.3z M394.7,488.3H207v-9.2h187.7V488.3
                                                                          L394.7,488.3z"/>
                                                                    <path d="M106.2,415.9c0,4.6-1.8,9.6-1.8,12.4h6.4c7.8,0,17.9-6,18.3-12.4v-6h-22.9V415.9L106.2,415.9L106.2,415.9z"/>
                                                                    <path d="M458.8,433.3l9.2,16.5c3.2-1.8,7.3-2.7,11-2.7l0,0l0,0l0,0l0,0l0,0l0,0c4.6,0,9.6,0,14.2,0v-0.9c-0.5-1.4-5-9.2-9.6-12.8
                                                                          C475.3,433.3,467.1,433.3,458.8,433.3L458.8,433.3z"/>
                                                                    <path d="M213.4,488.3c-1.8,3.7-4.1,6.9-6.9,9.6l0,0c-6.4,6.4-14.7,10.1-24.3,10.1s-17.9-4.1-24.3-10.1c-2.7-2.7-5-6-6.9-9.6h-4.6
                                                                          h-3.7v-4.6v-12.4c0-11,4.6-21.5,11.9-28.8c7.3-7.3,16.5-11.9,27.5-11.9l0,0c11,0,21.1,4.1,28.8,11.4l0,0h2.3
                                                                          c7.3,7.3,11.9,17.4,11.9,28.8v12.4v4.6h-4.6h-7.3V488.3L213.4,488.3z M420.4,449.3c-13.3,0-23.8,10.5-23.8,23.8
                                                                          s10.5,23.8,23.8,23.8c13.3,0,23.8-10.5,23.8-23.8C444.6,460.3,433.6,449.3,420.4,449.3L420.4,449.3L420.4,449.3z M182.2,449.3
                                                                          c-13.3,0-23.8,10.5-23.8,23.8S169,497,182.2,497s23.8-10.5,23.8-23.8C206.5,460.3,195.5,449.3,182.2,449.3L182.2,449.3L182.2,449.3
                                                                          z M420.4,431L420.4,431c11,0,21.1,4.1,28.8,11.4l0,0h2.3c7.3,7.3,11.9,17.4,11.9,28.8v12.4v4.6h-4.6h-7.3c-1.8,3.7-4.1,6.9-6.9,9.6
                                                                          c-6.4,6.4-14.7,10.1-24.3,10.1c-9.6,0-17.9-3.7-24.3-10.1l0,0c-2.7-2.7-5-6-6.9-9.6h-4.6H381v-4.6v-12.4c0-11,4.6-21.1,11.9-28.8
                                                                          H392l0,0C399.3,435.6,409.4,431,420.4,431L420.4,431z"/>
                                                                    <path d="M420.4,464.9c-4.6,0-8.7,3.7-8.7,8.7c0,4.6,4.1,8.7,8.7,8.7s8.7-3.7,8.7-8.7C429.1,468.6,425.4,464.9,420.4,464.9
                                                                          L420.4,464.9z"/>
                                                                    <polygon points="266.5,424.2 243.6,424.2 243.6,419.6 266.5,419.6 	"/>
                                                                    <path d="M182.2,464.9c-5,0-8.7,3.7-8.7,8.7c0,4.6,3.7,8.7,8.7,8.7c4.6,0,8.7-3.7,8.7-8.7C190.9,468.6,187.3,464.9,182.2,464.9
                                                                          L182.2,464.9z"/>
                                                                    <polygon points="234.4,464 234.4,469.9 367.7,469.9 	"/>
                                                                    <polygon points="490.9,469.9 481.7,469.9 481.7,465.4 490.9,465.4 	"/>
                                                                    <path d="M483.1,460.8h-6.9c-1.8,0-3.2,1.8-3.2,3.7v2.3c0,1.8,1.4,3.2,3.2,3.2h6.9c1.8,0,3.2-1.4,3.2-3.2v-2.3
                                                                          C486.3,462.2,484.9,460.8,483.1,460.8L483.1,460.8z"/>
                                                                    <path d="M101.7,465.4v13.3h36.6v-0.9C123.6,476.4,107.6,469,101.7,465.4L101.7,465.4z"/>
                                                                    <path d="M185,376.1L185,376.1c-4.1,0.5-6,4.1-6.9,8.2l-2.7,8.7c-0.5,0.9-0.5,1.4-0.5,1.8c6.4,0.5,11.9,0.9,18.3,1.4
                                                                          c0-0.5,0-0.9,0-1.4v-11.4C192.8,378.8,189.6,375.6,185,376.1L185,376.1z"/>
                                                                    <path d="M383.3,398.5c0,0-46.7-28.4-65.9-34.3c-2.3-0.9-4.6-1.4-6.9-1.8l0,0c-2.3-0.5-5-0.9-7.8-1.4l-1.8,9.2
                                                                          c24.3,6,33.9,21.1,54.9,33.9c3.2,1.8,19.2,0.9,22.4,2.7L383.3,398.5L383.3,398.5z"/>
                                                                    <path d="M337.5,400.8L337.5,400.8c-2.7,2.7-4.1,6-4.1,9.6c0,1.4,0.5,2.3,1.4,3.2c0.9,0.9,1.8,1.4,3.2,1.4H348
                                                                          c1.8,0,3.2-0.9,4.1-2.3c0.9-1.4,0.9-3.2,0-4.6c-1.8-3.2-5-6.4-10.1-8.2C340.2,399,338.4,399.4,337.5,400.8L337.5,400.8z"/>
                                                                    <path d="M345.7,412.7c-0.9,0-1.8-0.5-2.7-1.4l-6-8.2c-0.9-1.4-0.9-3.2,0.5-4.6c1.4-0.9,3.2-0.9,4.6,0.9l6,8.2
                                                                          c0.9,1.4,0.9,3.2-0.9,4.6C347.1,412.7,346.6,412.7,345.7,412.7L345.7,412.7z"/>
                                                                    </g>
                                                                    </svg>
                                                                </label>
                                                                <h5><label for="type4">Convertible</label></h5>
                                                            </div>
                                                            <div class="col-xs-2">
                                                                <input id="type5" type="radio" name="type" />
                                                                <label for="type5" class="b-search__main-type-svg">
                                                                    <svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                         viewBox="47.6 310.9 500 220" enable-background="new 47.6 310.9 500 220" xml:space="preserve">
                                                                    <g>
                                                                    <path d="M207.9,399.4c-9.2,0-34.8-2.3-48.1-9.6c20.6-11,57.2-23.8,76-23.8c16.5,0,36.6,0,52.7,0c25.2,0,46.2,9.2,66.9,20.6
                                                                          c-3.2,3.2-5,6.4-5.5,11.4c0,0.5,0,0.9,0,1.4H207.9L207.9,399.4z"/>
                                                                    <path d="M134.6,486.4c-21.1,0-45.3-12.4-46.7-12.8l-2.3-1.4v-32.1l-1.4-0.9c0.9-1.8,6-7.3,6-11.9v-29.8l17.9-4.1
                                                                          c24.3-11.4,90.7-34.3,134.6-34.3h54.9c12.4,0.9,22.9,3.2,32.1,5.5c17.9,5.5,58.6,30.2,65,34.3c6.4,0.9,40.3,5,67.8,11.9
                                                                          c33,8.2,44,21.5,45.3,27.5l2.7,47.2l-4.1-0.9c-7.8,1.8-14.2,2.7-31.1,2.7h-18.8v-9.2h13.7c12.8,0,22-0.5,27.5-1.8v-0.9v-35.7
                                                                          c-0.5-1.4-9.6-11.9-38-19.2c-29.8-7.8-66.9-11.9-67.3-11.9l-1.8-0.5c-0.5-0.5-45.8-28.8-64.1-34.3c-8.2-2.3-18.3-4.1-29.3-5.5h-54
                                                                          c-42.6,0-104.4,22.9-127.8,33.9l-4.6,1.4l-11,2.3v22c0,6.4-3.2,12.8-4.6,15.6v22.9c6,3.7,22.9,12.4,38,11.9h12.4v9.2h-12.4
                                                                          C132.8,486.4,135.1,486.4,134.6,486.4L134.6,486.4z M402,486.4H200.6v-9.2H402V486.4L402,486.4z"/>
                                                                    <path d="M99.8,414.1c0,4.6-2.3,9.6-2.7,12.4h6.9c7.8,0,17.9-6,18.3-12.4v-6H99.4L99.8,414.1L99.8,414.1L99.8,414.1z"/>
                                                                    <path d="M471.6,433.3l9.2,16.5c2.7-1.8,7.3-2.7,11-2.7l0,0l0,0l0,0l0,0l0,0l0,0c4.6,0,9.6,0,14.2,0v-0.9c-0.5-1.4-5-9.2-9.6-12.8
                                                                          C487.7,433.3,479.9,433.3,471.6,433.3L471.6,433.3z"/>
                                                                    <polygon points="310.5,426.9 287.6,426.9 287.6,422.3 310.5,422.3 	"/>
                                                                    <polygon points="214.3,426.9 191.4,426.9 191.4,422.3 214.3,422.3 	"/>
                                                                    <polygon points="232.6,459.9 232.6,468.1 381.9,468.1 	"/>
                                                                    <polygon points="502.8,468.1 493.6,468.1 493.6,463.5 502.8,463.5 	"/>
                                                                    <path d="M494.5,463.5h-6.9c-1.8,0-3.2-0.9-3.2,0.9v4.6c0,1.8,1.4,3.2,3.2,3.2h6.9c1.8,0,3.2-1.4,3.2-3.2v-2.3
                                                                          C498.2,464.9,496.8,463.5,494.5,463.5L494.5,463.5z"/>
                                                                    <path d="M359,396.2L359,396.2c-2.7,2.7-4.1,6-4.1,9.6c0,1.4,0.5,0.5,1.4,1.4c0.9,0.9,1.8,1.4,3.2,1.4H370c1.8,0,3.2-0.9,4.1-2.3
                                                                          c0.9-1.4,0.9-0.9,0-2.7c-1.8-3.2-5-6.4-10.1-8.2C362.2,394.4,360.4,394.8,359,396.2L359,396.2z"/>
                                                                    <path d="M367.7,415.5c-0.9,0-1.8-0.5-2.7-1.4l-6-8.2c-0.9-1.4-0.9-3.2,0.9-4.6c1.4-0.9,3.2-0.9,4.6,0.9l6,8.2
                                                                          c0.9,1.4,0.9,3.2-0.9,4.6C369.1,415,368.6,415.5,367.7,415.5L367.7,415.5z"/>
                                                                    <path d="M95.2,463.5v13.3h35.3l-0.5-0.9C115.4,474.5,101.2,467.2,95.2,463.5L95.2,463.5z"/>
                                                                    <path d="M175.4,431L175.4,431c11,0,21.1,4.6,28.8,11.9l0,0h-1.4c7.3,7.3,11.9,17.4,11.9,28.8v11.9v2.7h-4.6h-8.7
                                                                          c2.7-4.6,4.1-9.6,4.1-14.7c0-16-13.3-27.5-29.3-27.5s-29.3,11-29.3,27.5c0,5.5,1.4,10.5,4.1,14.7h-10.5h-3.2v-4.6v-10.5
                                                                          c0-11,4.6-21.1,11.9-28.8h-1.8l0,0C153.9,435.6,163.9,431,175.4,431L175.4,431z"/>
                                                                    <path d="M151.1,449.3c6.4-6.4,14.7-10.1,24.3-10.1c9.6,0,17.9,3.7,24.3,10.1l0,0c6.4,6.4,10.1,14.7,10.1,24.3
                                                                          c0,9.6-3.7,17.9-10.1,24.3l0,0c-6.4,6.4-14.7,10.1-24.3,10.1c-9.6,0-17.9-3.7-24.3-10.1c-6.4-6.4-10.1-14.7-10.1-24.3
                                                                          C141,464,144.7,455.3,151.1,449.3L151.1,449.3L151.1,449.3L151.1,449.3z M175.4,449.3c-13.3,0-23.8,10.5-23.8,23.8
                                                                          s10.5,23.8,23.8,23.8c13.3,0,23.8-10.5,23.8-23.8C199.2,460.3,188.7,449.3,175.4,449.3L175.4,449.3z"/>
                                                                    <path d="M175.4,464.9c-5,0-8.7,4.1-8.7,8.7c0,5,3.7,8.7,8.7,8.7c4.6,0,8.7-3.7,8.7-8.7C184.1,468.6,180,464.9,175.4,464.9
                                                                          L175.4,464.9z"/>
                                                                    <path d="M432.7,431L432.7,431c11,0,21.1,4.6,28.8,11.9l0,0h1.8c7.3,7.3,11.9,17.4,11.9,28.8v11.9v2.7h-4.6h-11.9
                                                                          c2.7-4.6,4.1-9.6,4.1-14.7c0-16-13.3-27.5-29.3-27.5s-29.3,11-29.3,27.5c0,5.5,1.4,10.5,4.1,14.7h-10.5h-4.6v-4.6v-10.5
                                                                          c0-11,4.6-21.1,11.9-28.8h-0.5l0,0C411.7,435.6,421.7,431,432.7,431L432.7,431z"/>
                                                                    <path d="M408.5,449.3c6.4-6.4,14.7-10.1,24.3-10.1c9.6,0,17.9,3.7,24.3,10.1l0,0c6.4,6.4,10.1,14.7,10.1,24.3
                                                                          c0,9.6-3.7,17.9-10.1,24.3l0,0c-6.4,6.4-14.7,10.1-24.3,10.1c-9.6,0-17.9-3.7-24.3-10.1c-6.4-6.4-10.1-14.7-10.1-24.3
                                                                          C398.8,464,402.5,455.3,408.5,449.3L408.5,449.3L408.5,449.3L408.5,449.3z M432.7,449.3c-13.3,0-23.8,10.5-23.8,23.8
                                                                          s10.5,23.8,23.8,23.8c13.3,0,23.8-10.5,23.8-23.8C457,460.3,446,449.3,432.7,449.3L432.7,449.3z"/>
                                                                    <path d="M432.7,464.9c-4.6,0-8.7,4.1-8.7,8.7c0,5,3.7,8.7,8.7,8.7c4.6,0,8.7-3.7,8.7-8.7C441.9,468.6,437.8,464.9,432.7,464.9
                                                                          L432.7,464.9z"/>
                                                                    </g>
                                                                    </svg>
                                                                </label>
                                                                <h5><label for="type5">Sedan</label></h5>
                                                            </div>
                                                            <div class="col-xs-2">
                                                                <input id="type6" type="radio" name="type" />
                                                                <label for="type6" class="b-search__main-type-svg">
                                                                    <svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                         viewBox="47.6 310.9 500 220" enable-background="new 47.6 310.9 500 220" xml:space="preserve">
                                                                    <g>
                                                                    <path d="M367.7,491.9h-142v-9.2h142V491.9L367.7,491.9z M408.9,490.1v-9.2c8.2,0,14.2-0.9,18.3-1.4V448c-2.7-11-39.8-27.5-54-27.5
                                                                          l-0.9-1.4h-1.4h-5c-27.9-16.9-49.9-29.3-82-32.1h-25.6c-19.7,0-35.7,1.4-48.1,4.6l1.8,0.5l-4.1,2.7c-13.3,8.2-36.2,28.8-34.3,39.8
                                                                          c0,6.9-4.6,11.9-7.3,14.2v22.9c1.4,2.3,5.5,7.8,14.7,9.2l-2.3,9.2c-16-2.7-21.1-14.7-21.1-15.1l-0.5-1.8v-29.3l2.3-1.4
                                                                          c1.8-0.9,4.1-4.6,4.1-7.3c-2.3-16.5,22.4-37.1,35.7-46.2l-3.7-5.5l6,0.9c14.2-4.6,33-6.9,56.8-6.9h26.1
                                                                          c34.8,3.2,58.6,17.9,86.5,34.8l2.7-1.4c16.5,0.9,58.2,18.3,62.3,36.2l2.7,40.3h-6.4C425.9,488.7,420.4,489.6,408.9,490.1
                                                                          L408.9,490.1z"/>
                                                                    <path d="M202.4,442.9L202.4,442.9c9.2,0,17.9,3.7,24.3,10.1h-1.4c6,6,10.1,14.7,10.1,24.3v8.7v6.4h-4.6H229c-1.4,3.2-3.7,6.4-6,8.7
                                                                          v-1.4l0,0c-5,5-12.4,8.7-20.6,8.7c-7.8,0-15.1-3.2-20.6-8.7l0,0l0,0c-2.7-2.7-5-6.4-6.4-10.1c-1.4-0.5-5-0.9-6-1.4l-2.7-1.4v-3.2
                                                                          v-6.4c0-9.2,3.7-17.9,10.1-24.3h2.3C184.5,447,192.8,442.9,202.4,442.9L202.4,442.9L202.4,442.9z M388.3,459
                                                                          c-11,0-19.7,8.7-19.7,19.7c0,11,8.7,19.7,19.7,19.7c11,0,19.7-8.7,19.7-19.7C408,468.1,399.3,459,388.3,459L388.3,459L388.3,459z
                                                                          M202.4,459c-11,0-19.7,8.7-19.7,19.7c0,11,8.7,19.7,19.7,19.7s19.7-8.7,19.7-19.7C222.1,468.1,213.4,459,202.4,459L202.4,459
                                                                          L202.4,459z M388.3,442.9L388.3,442.9c9.2,0,17.9,3.7,24.3,10.1l0,0c6,6,10.1,14.7,10.1,24.3v8.2v6.4h-4.6c-0.9,0-1.8,0-3.2,0
                                                                          c-1.4,3.2-3.7,4.6-6,7.3l0,0l0,0c-5,5-12.4,8.7-20.6,8.7c-7.8,0-15.1-3.2-20.6-8.7l0,0v1.4c-2.7-2.7-4.6-5.5-6-8.7H359h-5v-4.6
                                                                          v-10.1c0-9.2,3.7-17.9,10.1-24.3h0.5C370.4,447,378.7,442.9,388.3,442.9L388.3,442.9z"/>
                                                                    <path d="M205.1,393.9c-9.2,5-23.4,12.8-30.2,20.1h16l21.5-22.9L205.1,393.9L205.1,393.9z"/>
                                                                    <path d="M212,416.4c14.7-16.5,24.7-25.2,37.1-25.2h34.8c20.6,1.8,37.5,8.7,54.5,17.9c-0.5,0-0.5-0.5-0.9,0l0,0
                                                                          c-3.2,3.2-5,6.9-5,11.4c0,0.9,0,1.4,0,2.3L212,416.4L212,416.4z"/>
                                                                    <path d="M166.2,425.5v0.9v11h13.3c0,0,8.2-9.6,7.8-15.1C186.8,421.9,177.7,422.3,166.2,425.5L166.2,425.5z"/>
                                                                    <path d="M202.4,471.8c-4.1,0-7.3,3.2-7.3,7.3c0,4.1,3.2,7.3,7.3,7.3c4.1,0,7.3-3.2,7.3-7.3C209.3,475,206.1,471.8,202.4,471.8
                                                                          L202.4,471.8z"/>
                                                                    <path d="M388.3,471.8c-4.1,0-7.3,3.2-7.3,7.3c0,4.1,3.2,7.3,7.3,7.3c4.1,0,7.3-3.2,7.3-7.3C395.6,475,392.4,471.8,388.3,471.8
                                                                          L388.3,471.8z"/>
                                                                    <polygon points="285.3,432.4 271.5,432.4 271.5,427.8 285.3,427.8 	"/>
                                                                    <path d="M339.8,411.3L339.8,411.3c-2.7,2.7-4.1,6-4.1,9.6c0,1.4,0.5,4.6,1.4,5.5c0.9,0.9,1.8,1.4,3.2,1.4h10.5
                                                                          c1.8,0,3.2-0.9,4.1-2.3c0.9-1.4,0.9-5.5,0-6.9c-1.8-3.2-5-6.4-10.1-8.2C343,409.5,341.1,410,339.8,411.3L339.8,411.3z"/>
                                                                    <path d="M348.5,430.6c-0.9,0-1.8-0.5-2.7-1.4l-6-8.2c-0.9-1.4-0.9-3.2,0.9-4.6c1.4-0.9,3.2-0.9,4.6,0.9l6,8.2
                                                                          c0.9,1.4,0.9,3.2-0.9,4.6C349.8,430.1,348.9,430.6,348.5,430.6L348.5,430.6z"/>
                                                                    <polygon points="225.7,427.8 212,427.8 212,423.2 225.7,423.2 	"/>
                                                                    <path d="M397,423.2c11.9,21.1,16,26.6,31.6,26.6v0.5l0,0l0,0l0,0l0,0h0.5h1.8v-2.7c-1.8-8.7-16-17.9-30.7-24.3H397L397,423.2z"/>
                                                                    </g>
                                                                    </svg>
                                                                </label>
                                                                <h5><label for="type6">Minicar</label></h5>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="b-world__item wow zoomInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                                                                    <div class="b-world__item-val">
                                                                    </div>
                                                                    <h2 style="margin:0px;">Vehicle Features</h2>
                                                                </div>
                                                            </div>
                                                            <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <hr style="border-top: 1px solid #ccc;" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                                <label class="container_check label_for_checkbox_home_advaced_search" for="car_feature_by_id_all">
                                                                    <input type="checkbox" name="check[all]" id="car_feature_by_id_all" class="checkbox_for_features" >
                                                                    <span class="label-text"><b>Select All</b></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <?php foreach ($select_car_main_features_category as $cars_main_features => $cars_main_feature) { ?>
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <label class="home_advanced_search_category_label"><?php echo $cars_main_feature->name ?></label>
                                                                </div>
                                                                <?php foreach ($select_car_features_category as $car_features_category => $feature_by_catid) { ?>
                                                                    <?php if ($feature_by_catid->cat_id == $cars_main_feature->id) { ?>
                                                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                                            <label class="container_check label_for_checkbox_home_advaced_search" for="car_feature_by_id_<?php echo $feature_by_catid->id ?>">
                                                                                <input type="checkbox" name="check[car_features_<?php echo $feature_by_catid->id ?>]" id="car_feature_by_id_<?php echo $feature_by_catid->id ?>" class="checkbox_for_features_home_advanced_search" >
                                                                                <span class="label-text"><?php echo $feature_by_catid->name ?></span>
                                                                            </label>
                                                                        </div>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style='margin-top:5px;'>
                                            <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding'>
                                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding'>
                                                    <div class='more_options_wrapper' style="margin-left:24px;padding-bottom:5px;">
                                                        <div class='more_options_container'>
                                                            <div id='HomeShowMoreOptionsBTN'>
                                                                <i class='fa fa-plus-circle more_options_icon'></i><span id='HomeShowMoreText'>ADVANCED OPTIONS</span>
                                                            </div>
                                                            <div id='HomeShowLessOptionsBTN' style='display: none;'>
                                                                <i class='fa fa-minus-circle more_options_icon'></i><span>LESS OPTIONS</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!--b-search-->
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <div class="row m-border">
                            <?php if (sizeof($cars) > 0) { ?>
                                <?php foreach ($cars as $cars_details => $car) { ?>
                                    <div class="col-lg-4 col-md-6 col-xs-12 wow zoomInUp language_grid_cars_col"  data-wow-delay="0.5s">
                                        <div class="b-items__cell" style="height: 515px;">
                                            <div class="b-items__cars-one-img">
                                                <a href="/cars/<?php echo $car->slug ?>">
                                                    <?php
                                                    $path = Yii::$app->request->baseUrl . 'media/284x251/' . $car->image;
                                                    $type = pathinfo($path, PATHINFO_EXTENSION);
                                                    $data = file_get_contents($path);
                                                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                                    ?>
                                                    <?php $i++; ?>
                                                    <img class='img-responsive' src="<?php echo $base64 ?>" alt='<?php echo $car->name ?>'/>
                                                </a>
                                                <?php if ($car->featured == 1) { ?>
                                                    <span class="b-items__cars-one-img-type m-premium">PREMIUM</span>
                                                <?php } else if ($car->ad_type == 2) { ?>
                                                    <span class="b-items__cars-one-img-type m-listing">HOT OFFER</span>
                                                <?php } else if ($car->date_created >= $today_date_before_7_days_timeStamp) { ?>
                                                    <span class="b-items__cars-one-img-type m-leasing">NEW LISTING</span>
                                                <?php } else { ?>

                                                <?php } ?>


                                                <label class="label_for_checkbox lable_for_features home_checkbox_for_compare_lable" id='<?php echo $car->id ?>'>
                                                    <input type="checkbox" name="check[car_features1]" class="checkbox_for_features" value='<?php echo $car->id ?>' id="car_compare_id_<?php echo $car->id ?>">  <span class="label-text"></span>
                                                </label>

                                            </div>
                                            <div class="b-items__cell-info">
                                                <div class="s-lineDownLeft b-items__cell-info-title">
                                                    <div class="row">
                                                        <div class="col-xs-10">
                                                            <h2 class="">
            <!--                                                                <a href="/cars/<?php echo $car->slug ?>" class="car_grid_view_name">
                                                                <?php if (strlen($car->name) < 21) { ?>
                                                                    <?php echo $car->name ?>
                                                                <?php } else { ?>
                                                                    <?php echo substr($car->name, 0, 18) . "..."; ?>
                                                                <?php } ?>
                                                                </a>-->
                                                                <a href="/cars/<?php echo $car->slug ?>" class="car_grid_view_name">
                                                                    <?php $select_car_make = Make::find()->where(['id' => $car->make_id])->one(); ?>
                                                                    <?php $select_car_model = Model::find()->where(['id' => $car->make_id])->one(); ?>
                                                                    <?php echo $select_car_make['name'] . " " . $select_car_model['name']; ?>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                        <div class="col-xs-2  text-right">
                                                            <?php if (Yii::$app->user->isGuest) { ?>
                                                                <i class="fa fa-heart-o fav_icon" id="<?php echo $car->id ?>" data-toggle="modal" data-target="#modalLogin"></i>
                                                            <?php } else { ?>
                                                                <?php
                                                                $get_fav = FavList::find()->where(['listing_id' => $car->id])->andWhere(['user_id' => Yii::$app->user->getId()])->andWhere(['status' => 1])->one();
                                                                ?>
                                                                <?php if (sizeof($get_fav) > 0) { ?>
                                                                    <i class="fa fa-heart remove_fav_car fav_icon" id="<?php echo $car->id ?>"></i>
                                                                <?php } else { ?> 
                                                                    <i class="fa fa-heart-o add_fav_icon fav_icon" id="<?php echo $car->id ?>"></i>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <?php if ($lang_id == 1) { ?>
                                                    <div>
                                                        <div class="row m-smallPadding">
                                                            <div class="col-xs-5">
                                                                <span class="b-items__cars-one-info-title"><?= yii::t('app', 'Body Style') ?>:</span>
                                                                <span class="b-items__cars-one-info-title"><?= yii::t('app', 'Mileage') ?>:</span>
                                                                <span class="b-items__cars-one-info-title"><?= yii::t('app', 'Transmission') ?>:</span>
                                                                <span class="b-items__cars-one-info-title"><?= yii::t('app', 'Specs') ?>:</span>
                                                            </div>
                                                            <div class="col-xs-7">
                                                                <span class="b-items__cars-one-info-value">Sedan</span>
                                                                <span class="b-items__cars-one-info-value">35,000 KM</span>
                                                                <span class="b-items__cars-one-info-value">6-Speed Auto</span>
                                                                <span class="b-items__cars-one-info-value">2-Passenger, 2-Door</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h5 class="b-items__cell-info-price pull-left"><?php echo number_format($car->price) . " JOD" ?></h5>
                                                    <div class="store_image_div pull-right">
                                                        <a href="#" class="font_special dropdown-toggle text-trans-none" data-toggle="dropdown">
                                                            <img src="/media/stores_logo_150x150/1533031603_WFwGHRnRzjGE3Rzudn7b1t3hbmq71TWt.jpg" class=" login_avatar" style='width:50px;'>
                                                        </a>
                                                    </div>
                                                <?php } else { ?>
                                                    <div>
                                                        <div class="row m-smallPadding">
                                                            <div class="col-xs-7">
                                                                <span class="b-items__cars-one-info-value">Sedan</span>
                                                                <span class="b-items__cars-one-info-value">35,000 KM</span>
                                                                <span class="b-items__cars-one-info-value">6-Speed Auto</span>
                                                                <span class="b-items__cars-one-info-value">2-Passenger, 2-Door</span>
                                                            </div>
                                                            <div class="col-xs-5">
                                                                <span class="b-items__cars-one-info-title">:<?= yii::t('app', 'Body Style') ?></span>
                                                                <span class="b-items__cars-one-info-title">:<?= yii::t('app', 'Mileage') ?></span>
                                                                <span class="b-items__cars-one-info-title">:<?= yii::t('app', 'Transmission') ?></span>
                                                                <span class="b-items__cars-one-info-title">:<?= yii::t('app', 'Specs') ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="store_image_div pull-left">
                                                        <a href="#" class="font_special dropdown-toggle text-trans-none" data-toggle="dropdown">
                                                            <img src="/images/team/50x50/02.jpg" class="img-circle img-bordered login_avatar">
                                                        </a>
                                                    </div>
                                                    <h5 class="b-items__cell-info-price pull-right"><span> السعر </span><?php echo number_format($car->price) . " دينار " ?> </h5>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                No Cars
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="#Promotions" data-toggle="tab">
                                <img src="/media/promotions/original/unnamed (6).jpg" class='img-responsive'>
                                <br />
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="#Promotions" data-toggle="tab">
                                <img src="/media/promotions/original/mazda-freedon-to-choice-ar.jpg" class='img-responsive'>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="Promotions">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <center>
                            <img id="myImg" src="/media/promotions/original/unnamed (6).jpg" alt="" class="img-responsive">
                        </center>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <br /><br />
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <img id="myImg2" src="/media/promotions/original/mazda-freedon-to-choice-ar.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <img id="myImg3" src="/media/promotions/original/My-Auto-Fest-2016-2_resize.jpg" class="img-responsive">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <img id="myImg4" src="/media/promotions/original/promotion-header-2.jpg" class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="certified">
                    <section class="b-search">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="car-search-tool-container b-search__main-type wow zoomInUp" data-wow-delay="0.3s" style="padding:5px;background:#f0f0f0;">

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no_padding">


                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                <div class="content_wrapper" style="margin-top: 25px;">
                                                                    <div class="dropdown">
                                                                        <input type="text" placeholder="Make" class="home-page-search-fields-input-text btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name"  type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <input type="hidden" id="input_home_search_make"  value="">
                                                                        <img class="select_main_image" id="select_image" src="/images/logo/add_field_logo.png">
                                                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>

                                                                        <ul class="dropdown-menu drop_down_enable_scroll">
                                                                            <li class="dropdown-header">Select Car(s)</li>
                                                                            <?php foreach ($make_details as $car_make => $make) { ?>
                                                                                <?php
                                                                                $i++;
                                                                                ?>
                                                                                <li class="select_main_li" id="<?php echo $i; ?>">
                                                                                    <div class='select_make_li' id='image<?php echo $i ?>'><img id='img_<?php echo $i ?>' src="/media/car_logo/<?php echo $make->path ?>" class='custome_dropdown_img create_car_make_logo_image' ><span class='car_make_name' id='image_<?php echo $i ?>_span'><?php echo $make->name ?></span><input type="hidden" id="make_id_<?php echo $i; ?>" value="<?php echo $make->id ?>"></div>
                                                                                </li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                <div class="content_wrapper" style="margin-top: 25px;">
                                                                    <div class="dropdown">
                                                                        <div class="dropdown">
                                                                            <input type="text" placeholder="Model" id="dropdownMenu2" value='' class="home-page-search-fields-input-text btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name"  type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" disabled="">
                                                                            <input type="hidden" id="model_id_for_post_final" name="Cars[model_id]" value="" >
                                                                            <img class="select_main_image" src="/images/logo/sport-tuning-car-auto-model-512.png">
                                                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>
                                                                            <ul class="dropdown-menu drop_down_enable_scroll" id="add_model_list">
                                                                                <li class="dropdown-header">Select Model</li>

                                                                            </ul> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no_padding">


                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                            <div class="content_wrapper">
                                                                <label class="color_dark form_lable" for="text_search">  Car Year</label>
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                                    <div class="dropdown">
                                                                        <input type="text" placeholder="From" id="input_home_search_year_from_container" maxlength="4" class="home-page-search-fields-input-text btn btn-default dropdown-toggle  custom_dropdown  car_make_name" name=""  type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true=">
                                                                        <input type="hidden" id="input_home_search_year_from" value="" >
                                                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_year_home_search" id="dropdown_icon_for_input_make"></span>
                                                                        <ul class="dropdown-menu drop_down_enable_scroll" id="add_model_list">
                                                                            <li class="dropdown-header">Select Year From</li>
                                                                            <?php for ($i = 39; $i > 1; $i--) { ?>
                                                                                <li class="select_year_from_input_home_search_main_li" id="<?php echo $i ?>">
                                                                                    <div class="select_model_li">
                                                                                        <span class="home_search_year_from_name" id="home_search_year_from_<?php echo $i; ?>">
                                                                                            <?php
                                                                                            $date = date('Y') - 39;
                                                                                            echo $date + $i;
                                                                                            ?></span>
                                                                                    </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                            <li class="select_year_from_input_home_search_main_li" id="40"><div class="select_model_li"><span class="car_year_li_years" id="home_search_year_from_40">Older</span></div></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                                    <div class="dropdown">
                                                                        <input type="text" placeholder="To" id="input_home_search_year_to_container" maxlength="4" class="home-page-search-fields-input-text btn btn-default dropdown-toggle  custom_dropdown  car_make_name" name=""  type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true=">
                                                                        <input type="hidden" id="input_home_search_year_to" value="" >
                                                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_year_home_search" id="dropdown_icon_for_input_make"></span>
                                                                        <ul class="dropdown-menu drop_down_enable_scroll" id="add_model_list">
                                                                            <li class="dropdown-header">Select Year From</li>
                                                                            <?php for ($i = 39; $i > 1; $i--) { ?>
                                                                                <li class="select_year_to_input_home_search_main_li" id="<?php echo $i ?>">
                                                                                    <div class="select_model_li">
                                                                                        <span class="home_search_year_from_name" id="home_search_year_to_<?php echo $i; ?>">
                                                                                            <?php
                                                                                            $date = date('Y') - 39;
                                                                                            echo $date + $i;
                                                                                            ?></span>
                                                                                    </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                            <li class="select_year_to_input_home_search_main_li" id="40"><div class="select_model_li"><span class="car_year_li_years" id="home_search_year_to_40">Older</span></div></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                                                <div class="content_wrapper">
                                                                    <label class="color_dark form_lable" for="text_search"> Price</label>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                                        <input type="text" class="home-page-search-fields-input-text input_form search_car_price_number custom_dropdown  " id="input_home_search_price_from" maxlength="8" placeholder="From">
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                                        <input type="text" class="home-page-search-fields-input-text input_form search_car_price_number custom_dropdown  " id="input_home_search_price_to" maxlength="8" placeholder="To">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 no_padding">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                <div class="content_wrapper" style="margin-left:3px;margin-top: 25px;">
                                                                    <div id="home_search_input_button_submit" class="button red pull-right" style="width: 100%; margin-bottom: 10px; padding: 0px; padding-top: 11px; padding-bottom: 10px;"><i class="glyphicon glyphicon-filter home_search_tool_icon"></i> Search </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" id="home_search_advanced_div_wrapper" style="display: none;">

                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding" >
                                                            <div class="content_wrapper">
                                                                <label class="color_dark form_lable" for="text_search"> Drivetrain</label>
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                    <input type="text" placeholder="Drivetrain" id="dropdown_engine_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name " required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                    <input type="hidden" id="car_engine_for_post_final" value="" name="Cars[engine]" value="">
                                                                    <img class="select_main_image " id="car_interior_dropdown_image" src="/images/elements/icons-engine.png" style="margin-left: 10px;">
                                                                    <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                                                    <ul class="dropdown-menu drop_down_enable_scroll" id="add_body_type_li">
                                                                        <li class="dropdown-header">Select Car Drivetrain</li>
                                                                        <li class="select_car_engine_li" id="1">
                                                                            <div class='select_make_li'>
                                                                                <i class="fa fa-cogs custome_dropdown_img"></i>
                                                                                <span class='car_make_name' id='engine_name_span_1'>
                                                                                    Rear wheel drive (RWD)
                                                                                </span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="select_car_engine_li" id="2">
                                                                            <div class='select_make_li'>
                                                                                <i class="fa fa-cogs custome_dropdown_img"></i>
                                                                                <span class='car_make_name' id='engine_name_span_2'>
                                                                                    Front wheel drive (FWD)
                                                                                </span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="select_car_engine_li" id="3">
                                                                            <div class='select_make_li'>
                                                                                <i class="fa fa-cogs custome_dropdown_img"></i>
                                                                                <span class='car_make_name' id='engine_name_span_3'>
                                                                                    4X4
                                                                                </span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                                                <div class="content_wrapper">
                                                                    <label class="color_dark form_lable" for="text_search"> Milage</label>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                        <input type="text" placeholder="<?= yii::t('app', 'Select Car Milage') ?>" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name"  required="required" type="button" id="dropdown_milage_input" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <input type="hidden" name="Cars[milage]" id="milage_id_for_post_final" value="">
                                                                        <img class="select_main_image" name="Cars[milage]" id="select_image" src="/images/elements/milage.png">
                                                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>
                                                                        <ul class="dropdown-menu drop_down_enable_scroll">
                                                                            <li class="dropdown-header"><?= yii::t('app', 'Select Car Milage') ?></li>
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
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">


                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                                                <div class="content_wrapper">
                                                                    <label class="color_dark form_lable" for="text_search"> Interior Color</label>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                        <input type="text" placeholder="Color" id="dropdown_interior_color_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name "  required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <input type="hidden" id="car_interior_color_for_post_final" value="" name="Cars[interior_color]"  value="">
                                                                        <img class="select_main_image " id="car_interior_color_dropdown_image" src="/images/elements/Color_wheel.png">
                                                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                                                        <ul class="dropdown-menu drop_down_enable_scroll">
                                                                            <li class="dropdown-header">Select Color</li>
                                                                            <?php foreach ($select_colors as $colors_details => $colors) { ?>
                                                                                <li class="select_interior_li" id="<?php echo $colors->id ?>">
                                                                                    <div class='select_make_li'>
                                                                                        <img id='color_img_<?php echo $colors->id ?>' src="/images/elements/<?php echo $colors->path ?>" class='custome_dropdown_img shadow_box create_car_color_image' >
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
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                                                <div class="content_wrapper">
                                                                    <label class="color_dark form_lable" for="text_search"> Exterior Color</label>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                                        <input type="text" placeholder="Color" id="dropdown_exterior_color_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name "  required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <input type="hidden" id="car_exterior_color_for_post_final" value="" name="Cars[exterior_color]"  value="">
                                                                        <img class="select_main_image " id="car_exterior_color_dropdown_image" src="/images/elements/Color_wheel.png">
                                                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_exterior_color"></span>
                                                                        <ul class="dropdown-menu drop_down_enable_scroll">
                                                                            <li class="dropdown-header">Select Color</li>
                                                                            <?php foreach ($select_colors as $colors_details => $colors) { ?>
                                                                                <li class="select_interior_li" id="exterior_<?php echo $colors->id ?>">
                                                                                    <div class='select_make_li'>
                                                                                        <img id='exterior_color_img_<?php echo $colors->id ?>' src="/images/elements/<?php echo $colors->path ?>" class='custome_dropdown_img shadow_box create_car_color_image' >
                                                                                        <span class='car_make_name' id='exterior_color_span_<?php echo $colors->id ?>'>
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

                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><br /><br /></div>


                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">


                                                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 no_padding">
                                                            <h4>Select vehicle type</h4>
                                                        </div>

                                                        <div class="col-xs12 col-sm-12 col-md-10 col-lg-10 no_padding">


                                                            <div class="col-xs-2">
                                                                <input id="type1" type="radio" name="type" />
                                                                <label for="type1" class="b-search__main-type-svg">
                                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                         viewBox="47.6 310.9 500 220" enable-background="new 47.6 310.9 500 220" xml:space="preserve">
                                                                    <g>
                                                                    <path d="M258.3,343.6H277v41.2h-25.2l7.8-40.8L258.3,343.6L258.3,343.6z M295.4,343.6h39.4c18.3,1.8,33,8.7,47.2,19.7
                                                                          c-1.4,0.5-2.7,1.4-4.1,2.3v0.5c-3.7,3.7-5.5,13.3-5.5,18.8h-76.9V343.6L295.4,343.6z"/>
                                                                    <path d="M107.6,476.4c-20.6,0-46.2-7.8-47.6-8.2l-2.7-1.4v-39.8l2.3-1.4c1.8-1.8,6.9-7.3,6.9-11v-7.8c0.5-5.5,0.5-11.9,0.9-17.4
                                                                          c0-3.7,6-11,11.9-13.3l1.8-0.5h146.5l7.3-38.9c1.4-6.9,6.9-11.4,14.2-11.4h86.5c27.5,2.3,43.5,15.6,61.4,29.8
                                                                          c8.2,6.4,16.5,15.1,26.1,21.1c4.1,0.5,10.5,0.5,17.9,0.9c43.5,1.8,83.3,4.6,87.5,24.3l4.1,34.8c2.7,1.8,6.4,5.5,6.4,10.5v15.1
                                                                          c0,4.1-0.5,6.4-4.1,9.2c-6.9,4.1-14.7,6-30.7,6h-6.4v-9.2h6.9c13.7,0,20.1-0.9,25.2-4.1c0,0,0,0.5,0-1.4V447c0-1.4-2.3-2.7-3.2-3.2
                                                                          l-2.7-0.9l-4.6-39.4c-3.2-13.3-54-15.1-78.3-16c-8.2-0.5-15.1-0.5-19.7-0.9l-1.8-0.5c-10.5-6.4-19.7-16-27.9-22.9
                                                                          c-16.9-13.7-31.6-25.6-55.4-27.5h-87.5c-2.3,0-4.1,0.9-4.6,3.2l-8.7,47.2H81.5c-2.7,1.4-5,4.1-5.5,5c0,4.6-0.5,11.4-0.5,16.9v7.3
                                                                          c0,6.9-6.4,13.3-9.2,16v28.4c7.3,2.7,26.6,8.7,41.7,8.2h8.7v9.2h-8.2C108.1,476.4,108.1,476.4,107.6,476.4L107.6,476.4z
                                                                          M423.6,476.4H185.5v-9.2h238.1V476.4L423.6,476.4z"/>
                                                                    <polygon points="529.3,444.3 523.4,407.7 515.1,407.7 515.1,444.3 	"/>
                                                                    <polygon points="327.4,398.5 304.5,398.5 304.5,393.9 327.4,393.9 	"/>
                                                                    <path d="M70.5,412.2h5c9.6,0,22.4-5.5,22.9-14.2v-8.7H72.3C72.3,397.6,71,406.3,70.5,412.2L70.5,412.2z"/>
                                                                    <path d="M381,368.7L381,368.7c-2.7,2.7-4.1,12.4-4.1,16c0,1.4,0.5,2.3,1.4,3.2c0.9,0.9,1.8,1.4,3.2,1.4H392c11.4,0-1.8-20.1-6-21.5
                                                                          C384.2,366.9,382.4,367.4,381,368.7L381,368.7z"/>
                                                                    <polygon points="222.1,443.4 222.1,453.5 394.3,453.5 	"/>
                                                                    <path d="M405.2,471.8h-4.6v-12.4c0-33.4,25.6-60.4,59.1-60.4s60,27,60,60.4v12.4h-4.6v-13.3c0-29.8-25.6-53.1-55.4-53.1
                                                                          c-29.8,0-54.5,24.3-54.5,54V471.8L405.2,471.8z"/>
                                                                    <path d="M460.7,457.1c-6,0-10.5,4.6-10.5,10.5s4.6,10.5,10.5,10.5c6,0,10.5-4.6,10.5-10.5S466.6,457.1,460.7,457.1L460.7,457.1z"/>
                                                                    <path d="M210.2,471.8h-6.4v-12.4c0-29.8-23.8-54-53.6-54s-51.7,24.3-51.7,54v12.4h-9.2V459c0-33.4,27-60,60.4-60
                                                                          s62.7,25.6,62.7,59.1L210.2,471.8L210.2,471.8z"/>
                                                                    <path d="M460.7,413.2L460.7,413.2c12.8,0,24.3,5,32.5,13.7h-0.9c8.2,8.2,13.7,19.7,13.7,32.5v14.2v3.2h-4.6H500
                                                                          c-2.3,7.8-6.9,15.1-12.8,20.1c-6.9,6-16,11.4-26.1,11.4s-19.2-3.7-26.1-9.6V497c-6-5-10.5-12.4-12.8-20.1h-2.3h-5v-4.6v-12.4
                                                                          c0-12.8,5-24.3,13.7-32.5h0.5C436.8,418.2,448.3,413.2,460.7,413.2L460.7,413.2L460.7,413.2z M460.7,440.6c-14.7,0-27,11.9-27,27
                                                                          c0,14.7,11.9,27,27,27c14.7,0,27-11.9,27-27C487.7,452.5,475.8,440.6,460.7,440.6L460.7,440.6L460.7,440.6z M152,440.6
                                                                          c-14.7,0-27,11.9-27,27c0,14.7,11.9,27,27,27c14.7,0,27-11.9,27-27C179,452.5,166.7,440.6,152,440.6L152,440.6L152,440.6z
                                                                          M152,413.2L152,413.2c12.8,0,24.3,5,32.5,13.7h0.9c8.2,8.2,13.7,19.7,13.7,32.5v14.2v3.2h-4.6h-3.7c-2.3,7.8-6.9,15.1-12.8,20.1
                                                                          c-6.9,6-16,11.4-26.1,11.4c-10.1,0-19.2-5.5-26.1-11.4c-6-5-10.5-12.4-12.8-20.1h-2.3h-3.2v-4.6v-12.4c0-12.8,5-24.3,13.7-32.5
                                                                          C129.6,418.2,139.2,413.2,152,413.2L152,413.2z"/>
                                                                    <path d="M152,457.1c-6,0-10.5,4.6-10.5,10.5s4.6,10.5,10.5,10.5c6,0,10.5-4.6,10.5-10.5S158,457.1,152,457.1L152,457.1z"/>
                                                                    </g>
                                                                    </svg>
                                                                </label>
                                                                <h5><label for="type1">Pickup</label></h5>
                                                            </div>
                                                            <div class="col-xs-2">
                                                                <input id="type2" type="radio" name="type" />
                                                                <label for="type2" class="b-search__main-type-svg">
                                                                    <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                         viewBox="47.6 310.9 500 220" enable-background="new 47.6 310.9 500 220" xml:space="preserve">
                                                                    <g>
                                                                    <path d="M199.2,342.6h95.7c23.8,2.3,47.2,17.4,68.7,31.1c-0.5,0.5-0.9,0.9-1.4,1.4l0,0c-3.7,3.2-5.5,7.8-5.5,12.4
                                                                          c0,0.5,0,0.9,0,1.4l-218.4-8.2C161.2,361.9,174.9,342.6,199.2,342.6L199.2,342.6z"/>
                                                                    <path d="M115.4,475.4c-21.5,0-33.4-11.4-33.9-11.9l-1.4-1.4v-28.4l0.5-0.9c0.9-1.8,3.2-7.3,3.2-11.9c0-4.1,0.5-10.5,0.5-16.9v-11
                                                                          c0.5-7.3,27.5-36.6,36.6-44.9v-9.6l4.6-2.7c18.8-4.1,55.4-6.4,80.6-6.4h89.3c33.4,2.7,64.6,22.9,92,40.3c5,3.2,9.6,7.8,14.2,10.5
                                                                          c2.3,0,4.6,0.5,8.2,0.9c51.7,5,100.3,11.9,104.9,32.1v62.3l-3.7,2.7c-6.9,1.4-13.3,2.3-27.9,2.3h-13.7v-9.2h14.2
                                                                          c11.9,0,17.9-0.5,22.4-1.4v-56.3c-2.3-9.6-34.8-17.9-96.2-23.8c-3.7-0.5-6.9-0.5-9.6-0.9l-1.8-0.5c-5-3.2-10.1-8.2-15.6-11.4
                                                                          c-27.9-17.9-56.8-36.2-87.5-38.5h-89.7c-22.9,0-55.9,1.8-75.1,5.5v8.2l-4.1,1.8c-4.6,2.7-30.7,34.3-32.5,40.3v10.5
                                                                          c0,6.4-0.9,12.8-0.9,16.9c0,6.4-1.8,12.8-3.7,15.6v19.7c3.2,2.7,12.4,10.5,26.6,10.1h5.5v9.2L115.4,475.4
                                                                          C114.5,475.4,115.9,475.4,115.4,475.4L115.4,475.4z M396.1,475.4H194.6v-9.2h201.5V475.4L396.1,475.4z"/>
                                                                    <path d="M365.4,378.4L365.4,378.4c-2.7,2.7-4.1,6-4.1,9.6c0,1.4,0.5,2.7,1.4,3.7c0.9,0.9,1.8,1.4,3.2,1.4h10.5
                                                                          c1.8,0,3.2-0.9,4.1-2.3c0.9-1.4,0.9-3.7,0-5c-1.8-3.2-5-6.4-10.1-8.2C368.6,376.5,366.8,377,365.4,378.4L365.4,378.4z"/>
                                                                    <path d="M367.2,390.7c-0.9,0-1.8-0.5-2.7-1.4l-6-8.2c-0.9-1.4-0.9-3.2,0.9-4.6c1.4-0.9,3.2-0.9,4.6,0.9l6,8.2
                                                                          c0.9,1.4,0.9,3.2-0.9,4.6C368.2,390.3,367.7,390.7,367.2,390.7L367.2,390.7z"/>
                                                                    <path d="M90.2,406.7h8.2c7.8,0,17.9-5.5,18.3-12.4v-6H92.5C92.5,394.8,90.2,400.3,90.2,406.7L90.2,406.7z"/>
                                                                    <path d="M478.1,402.2l11,20.1c3.7-2.3,9.2-4.1,13.3-4.1l0,0l0,0l0,0l0,0l0,0l0,0c2.7,0,5.5-1.8,8.7-1.8c0-8.2,0.9-8.7-6.4-14.2
                                                                          H478.1L478.1,402.2z"/>
                                                                    <polygon points="299.9,406.7 277,406.7 277,402.2 299.9,402.2 	"/>
                                                                    <polygon points="194.6,402.2 171.7,402.2 171.7,397.6 194.6,397.6 	"/>
                                                                    <polygon points="222.1,450.7 222.1,457.1 371.4,457.1 	"/>
                                                                    <path d="M508.7,436.1c-6.9,0-10.1,0-16.9,0c-3.7,3.7-3.7,8.2-3.7,12.8c6.9,0,13.7,0,20.6,0C508.7,444.8,508.7,440.2,508.7,436.1
                                                                          L508.7,436.1z"/>
                                                                    <path d="M488.6,457.1c-1.4-2.7-1.4-6.4-1.4-9.2c6.9,0,7.3,0.5,14.2,0.5v8.7H488.6L488.6,457.1z"/>
                                                                    <path d="M138.3,347.7l-44.4,38.9v-8.7c9.2-12.4,28.4-33.4,32.1-35.7L138.3,347.7L138.3,347.7z"/>
                                                                    <path d="M126.8,500.2c-6-5-10.5-12.4-12.8-20.1h-2.3h-3.7v-4.6v-16c0-12.8,5-24.3,13.7-32.5c8.2-8.2,18.8-13.7,31.6-13.7l0,0
                                                                          c12.8,0,24.3,5,32.5,13.7h0.5c8.2,8.2,13.7,19.7,13.7,32.5v14.2v6.9h-4.6h-2.7c-2.3,7.8-6.9,15.1-12.8,20.1c-6.9,6-16,7.8-26.1,7.8
                                                                          s-19.2-3.7-26.1-9.6v1.4H126.8z M427.2,440.6c-14.7,0-27,11.9-27,27c0,14.7,11.9,27,27,27c14.7,0,27-11.9,27-27
                                                                          C453.8,452.5,441.9,440.6,427.2,440.6L427.2,440.6L427.2,440.6z M152.9,440.6c-14.7,0-27,11.9-27,27c0,14.7,11.9,27,27,27
                                                                          c14.7,0,27-11.9,27-27C179.5,452.5,167.6,440.6,152.9,440.6L152.9,440.6L152.9,440.6z M427.2,413.2L427.2,413.2
                                                                          c12.8,0,24.3,5,32.5,13.7h0.9c8.2,8.2,13.7,19.7,13.7,32.5v14.2v6.9h-4.6h-3.2c-2.3,7.8-6.9,15.1-12.8,20.1c-6.9,6-16,7.8-26.1,7.8
                                                                          s-19.2-3.7-26.1-9.6v1.8c-6-5-10.5-12.4-12.8-20.1h-2.3h-3.7v-4.6v-16c0-12.8,5-24.3,13.7-32.5
                                                                          C404.3,418.2,414.4,413.2,427.2,413.2L427.2,413.2L427.2,413.2z M427.2,457.1c6,0,10.5,4.6,10.5,10.5s-4.6,10.5-10.5,10.5
                                                                          c-6,0-10.5-4.6-10.5-10.5S421.3,457.1,427.2,457.1L427.2,457.1L427.2,457.1z M152.9,457.1c-6,0-10.5,4.6-10.5,10.5
                                                                          s4.6,10.5,10.5,10.5c6,0,10.5-4.6,10.5-10.5C163,461.7,158.4,457.1,152.9,457.1L152.9,457.1z"/>
                                                                    </g>
                                                                    </svg>
                                                                </label>
                                                                <h5><label for="type2">Suv</label></h5>
                                                            </div>
                                                            <div class="col-xs-2">
                                                                <input id="type3" type="radio" name="type" />
                                                                <label for="type3" class="b-search__main-type-svg">
                                                                    <svg  version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                          viewBox="47.6 310.9 500 220" enable-background="new 47.6 310.9 500 220" xml:space="preserve">
                                                                    <g>
                                                                    <path d="M198.7,492.4v-9.2h21.1c65.9,0,134.2-0.5,198.7,0v9.2c-64.6,0-132.8,0-198.7,0H198.7L198.7,492.4z M152.9,493.8
                                                                          c-20.6-2.7-57.2-13.7-69.1-22.4l-4.1-1.4v-25.6l1.4-1.4c1.8-1.8,6-8.2,6-12.8l4.1-18.3L86.5,393l22,2.7h37.5
                                                                          c3.7-1.4,8.7-3.7,14.2-6c29.3-11.9,56.8-21.5,68.7-21.5h78.8c1.4,0,2.3,0,3.7,0.5c23.8,6.9,45.3,18.8,70.5,33.4h0.5
                                                                          c70.1,2.7,111.3,8.2,125.5,16.5l2.3,1.4v14.7l5.5,4.6v2.3c0,17.9-7.8,25.2-12.4,29.3c0,0.5-0.5,0.9,0,0.9c1.4,2.7,2.3,5,2.3,7.8
                                                                          v3.2l-5,1.4c-11,4.6-22.4,7.3-36.2,8.7v-9.6c11-0.9,21.1-3.2,30.2-6.4c0-0.5,0.9-0.5,0.9-0.9c-0.9-2.3-1.8-4.1-1.8-6v-2.3l0.9-0.9
                                                                          c0.9-0.9,1.4-1.4,2.3-2.3c4.1-3.7,9.2-7.8,9.6-20.1l-5.5-4.6v-16c-11-5-40.3-11-118.1-14.2h-3.7l-0.9-0.5
                                                                          c-24.7-14.7-46.2-24.7-69.1-31.1c-0.5,0-0.9,0-0.9,0H229c-10.5,0-44.9,13.7-65,22c-6.4,2.3-11.4,4.1-15.6,5.5l-1.4,0.5h-39.4h-8.2
                                                                          l1.4,5.5l-4.6,20.6c0,6.4-5,13.7-7.8,16.5v16.9c12.4,7.3,46.2,16.9,64.1,19.2v9.2H152.9z"/>
                                                                    <path d="M243.6,385.2c0.5,8.2,1.4,16,1.8,24.3c-12.4-2.7-25.2-5.5-37.5-8.7C223,390.7,225.7,385.2,243.6,385.2L243.6,385.2
                                                                          L243.6,385.2z M253.2,385.2c17.9,0,36.2,0,54,0c12.8,3.7,25.2,9.2,37.5,15.1l-0.5,0.5l0,0c-2.7,2.7-4.6,6.4-5.5,10.1
                                                                          c-9.2,0-19.7,0-30.7,0c-17.4,0-35.3,0-52.7,0C254.6,402.6,254.1,393.9,253.2,385.2L253.2,385.2z"/>
                                                                    <path d="M424.9,503.4c-4.6-2.3-8.2-6-11.4-10.1l-3.2-0.5c-1.8-0.5-5-0.9-6.9-0.9l-3.7-0.9v-3.7V475c0-11.9,2.7-22.4,10.5-30.2h1.4
                                                                          c6.4-6.4,16-10.5,30.2-10.5c13.7,0,23.4,4.1,30.2,10.5l0,0c7.8,7.8,10.5,18.3,10.5,30.2v7.8v4.1l-4.1,0.5c-1.4,0.5-2.7,0.5-4.1,0.9
                                                                          l0,0l-1.4,0.5c-2.7,5.5-6.4,10.1-11.4,13.7c-5.5,3.7-12.4,6-19.7,6C435.9,507.9,430,506.1,424.9,503.4L424.9,503.4L424.9,503.4
                                                                          L424.9,503.4z M441.9,449.3c-13.3,0-23.8,10.5-23.8,23.8s10.5,23.8,23.8,23.8c13.3,0,23.8-10.5,23.8-23.8
                                                                          C465.7,460.3,455.2,449.3,441.9,449.3L441.9,449.3L441.9,449.3z M174.5,449.3c-13.3,0-23.8,10.5-23.8,23.8s10.5,23.8,23.8,23.8
                                                                          c13.3,0,23.8-10.5,23.8-23.8C198.3,460.3,187.7,449.3,174.5,449.3L174.5,449.3L174.5,449.3z M145.2,444.3h-0.5
                                                                          c6.4-6.4,16-10.5,30.2-10.5c13.7,0,23.4,4.1,30.2,10.5h1.8c7.8,7.8,10.5,18.3,10.5,30.2v15.1v2.7h-4.6h-11.4
                                                                          c-2.7,3.7-6.4,6.9-11,9.2c-5,2.7-10.5,6-16,6c-6,0-11.9-1.4-16.5-4.6c-4.6-2.3-8.2-6-11.4-10.1l-3.2-0.5c-1.8-0.5-3.2-0.9-5-1.4
                                                                          l-3.7-0.9v-3.7v-12.4C134.6,462.6,137.4,452.1,145.2,444.3L145.2,444.3z"/>
                                                                    <path d="M174.5,464.9c-5,0-8.7,3.7-8.7,8.7c0,4.6,3.7,8.7,8.7,8.7c4.6,0,8.7-4.1,8.7-8.7C183.2,468.6,179,464.9,174.5,464.9
                                                                          L174.5,464.9z"/>
                                                                    <polygon points="281.2,423.7 258.3,423.7 258.3,419.1 281.2,419.1 	"/>
                                                                    <polygon points="230.8,465.4 230.8,474.1 388.8,474.1 	"/>
                                                                    <path d="M441.9,464.9c-4.6,0-8.7,3.7-8.7,8.7c0,4.6,3.7,8.7,8.7,8.7s8.7-4.1,8.7-8.7C450.6,468.6,446.5,464.9,441.9,464.9
                                                                          L441.9,464.9z"/>
                                                                    <path d="M464.3,396.2h-49.9l-21.1,9.2v2.3c21.5,1.4,47.6,3.2,71,6V396.2L464.3,396.2z"/>
                                                                    <path d="M347.1,404.5L347.1,404.5c-2.7,2.7-4.1,6-4.1,9.6c0,1.4,0.5,2.7,1.4,4.1c0.9,0.9,1.8,1.4,3.2,1.4h10.5
                                                                          c1.8,0,3.2-0.9,4.1-2.3c0.9-1.4,0.9-3.7,0-5c-1.8-3.2-5-6.4-10.1-8.2C350.3,402.6,348.5,403.1,347.1,404.5L347.1,404.5z"/>
                                                                    <path d="M355.8,423.7c-0.9,0-1.8-0.5-2.7-1.4l-6-8.2c-0.9-1.4-0.9-3.2,0.9-4.6c1.4-0.9,3.2-0.9,4.6,0.5l6,8.2
                                                                          c0.9,1.4,0.9,3.2-0.5,4.6C357.2,423.2,356.7,423.7,355.8,423.7L355.8,423.7z"/>
                                                                    </g>
                                                                    </svg>
                                                                </label>
                                                                <h5><label for="type3">Coupe</label></h5>
                                                            </div>
                                                            <div class="col-xs-2">
                                                                <input id="type4" type="radio" name="type" />
                                                                <label for="type4" class="b-search__main-type-svg">
                                                                    <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                         viewBox="47.6 310.9 500 220" enable-background="new 47.6 310.9 500 220" xml:space="preserve">
                                                                    <g>
                                                                    <path d="M249.1,378.4h-0.9c-4.1,0.5-6,4.1-7.3,8.2l-2.3,8.7c-4.1,12.8,19.2,12.8,18.8,1.8v-11.4
                                                                          C256.9,381.1,253.7,377.9,249.1,378.4L249.1,378.4z"/>
                                                                    <path d="M142,488.3c-21.1,0-41.7-14.2-42.6-14.7l-2.3-1.4v-32.1l2.3-1.4c0.9-1.8,2.3-7.3,2.3-11.9v-30.2l58.6-3.7
                                                                          c25.2-1.4,40.8,1.4,58.2,4.1c9.6,1.4,19.7,3.2,31.6,4.1h95.2c5.5,0,11-0.9,16.9-1.4c6-0.9,11.9-1.8,18.3-1.8
                                                                          c0.9,0,38.9,4.1,69.6,11.9c33,8.2,44,21.5,45.3,27.5l2.7,47.2l-4.1,0.9c-7.8,1.8-14.2,2.7-31.1,2.7h-18.3v-9.2h16
                                                                          c12.8,0,19.7-0.5,25.2-1.8v-2.7v-35.7c-0.5-1.4-9.6-11.9-38-19.2c-29.8-7.8-67.3-11.9-67.8-11.9c-5,0-10.5,0.5-16.5,1.4
                                                                          c-6,0.9-11.9,1.8-18.3,1.8h-95.7c-12.8-0.9-22.9-2.7-33-4.1c-16.5-2.7-31.6-4.6-55.9-3.7l-49.9,2.7v21.5c0,6.4-3.2,12.8-4.6,15.6
                                                                          v23.8c6,3.7,22.9,12.4,38,11.9h12.4v9.2h-14.2C142,488.3,142.4,488.3,142,488.3L142,488.3z M394.7,488.3H207v-9.2h187.7V488.3
                                                                          L394.7,488.3z"/>
                                                                    <path d="M106.2,415.9c0,4.6-1.8,9.6-1.8,12.4h6.4c7.8,0,17.9-6,18.3-12.4v-6h-22.9V415.9L106.2,415.9L106.2,415.9z"/>
                                                                    <path d="M458.8,433.3l9.2,16.5c3.2-1.8,7.3-2.7,11-2.7l0,0l0,0l0,0l0,0l0,0l0,0c4.6,0,9.6,0,14.2,0v-0.9c-0.5-1.4-5-9.2-9.6-12.8
                                                                          C475.3,433.3,467.1,433.3,458.8,433.3L458.8,433.3z"/>
                                                                    <path d="M213.4,488.3c-1.8,3.7-4.1,6.9-6.9,9.6l0,0c-6.4,6.4-14.7,10.1-24.3,10.1s-17.9-4.1-24.3-10.1c-2.7-2.7-5-6-6.9-9.6h-4.6
                                                                          h-3.7v-4.6v-12.4c0-11,4.6-21.5,11.9-28.8c7.3-7.3,16.5-11.9,27.5-11.9l0,0c11,0,21.1,4.1,28.8,11.4l0,0h2.3
                                                                          c7.3,7.3,11.9,17.4,11.9,28.8v12.4v4.6h-4.6h-7.3V488.3L213.4,488.3z M420.4,449.3c-13.3,0-23.8,10.5-23.8,23.8
                                                                          s10.5,23.8,23.8,23.8c13.3,0,23.8-10.5,23.8-23.8C444.6,460.3,433.6,449.3,420.4,449.3L420.4,449.3L420.4,449.3z M182.2,449.3
                                                                          c-13.3,0-23.8,10.5-23.8,23.8S169,497,182.2,497s23.8-10.5,23.8-23.8C206.5,460.3,195.5,449.3,182.2,449.3L182.2,449.3L182.2,449.3
                                                                          z M420.4,431L420.4,431c11,0,21.1,4.1,28.8,11.4l0,0h2.3c7.3,7.3,11.9,17.4,11.9,28.8v12.4v4.6h-4.6h-7.3c-1.8,3.7-4.1,6.9-6.9,9.6
                                                                          c-6.4,6.4-14.7,10.1-24.3,10.1c-9.6,0-17.9-3.7-24.3-10.1l0,0c-2.7-2.7-5-6-6.9-9.6h-4.6H381v-4.6v-12.4c0-11,4.6-21.1,11.9-28.8
                                                                          H392l0,0C399.3,435.6,409.4,431,420.4,431L420.4,431z"/>
                                                                    <path d="M420.4,464.9c-4.6,0-8.7,3.7-8.7,8.7c0,4.6,4.1,8.7,8.7,8.7s8.7-3.7,8.7-8.7C429.1,468.6,425.4,464.9,420.4,464.9
                                                                          L420.4,464.9z"/>
                                                                    <polygon points="266.5,424.2 243.6,424.2 243.6,419.6 266.5,419.6 	"/>
                                                                    <path d="M182.2,464.9c-5,0-8.7,3.7-8.7,8.7c0,4.6,3.7,8.7,8.7,8.7c4.6,0,8.7-3.7,8.7-8.7C190.9,468.6,187.3,464.9,182.2,464.9
                                                                          L182.2,464.9z"/>
                                                                    <polygon points="234.4,464 234.4,469.9 367.7,469.9 	"/>
                                                                    <polygon points="490.9,469.9 481.7,469.9 481.7,465.4 490.9,465.4 	"/>
                                                                    <path d="M483.1,460.8h-6.9c-1.8,0-3.2,1.8-3.2,3.7v2.3c0,1.8,1.4,3.2,3.2,3.2h6.9c1.8,0,3.2-1.4,3.2-3.2v-2.3
                                                                          C486.3,462.2,484.9,460.8,483.1,460.8L483.1,460.8z"/>
                                                                    <path d="M101.7,465.4v13.3h36.6v-0.9C123.6,476.4,107.6,469,101.7,465.4L101.7,465.4z"/>
                                                                    <path d="M185,376.1L185,376.1c-4.1,0.5-6,4.1-6.9,8.2l-2.7,8.7c-0.5,0.9-0.5,1.4-0.5,1.8c6.4,0.5,11.9,0.9,18.3,1.4
                                                                          c0-0.5,0-0.9,0-1.4v-11.4C192.8,378.8,189.6,375.6,185,376.1L185,376.1z"/>
                                                                    <path d="M383.3,398.5c0,0-46.7-28.4-65.9-34.3c-2.3-0.9-4.6-1.4-6.9-1.8l0,0c-2.3-0.5-5-0.9-7.8-1.4l-1.8,9.2
                                                                          c24.3,6,33.9,21.1,54.9,33.9c3.2,1.8,19.2,0.9,22.4,2.7L383.3,398.5L383.3,398.5z"/>
                                                                    <path d="M337.5,400.8L337.5,400.8c-2.7,2.7-4.1,6-4.1,9.6c0,1.4,0.5,2.3,1.4,3.2c0.9,0.9,1.8,1.4,3.2,1.4H348
                                                                          c1.8,0,3.2-0.9,4.1-2.3c0.9-1.4,0.9-3.2,0-4.6c-1.8-3.2-5-6.4-10.1-8.2C340.2,399,338.4,399.4,337.5,400.8L337.5,400.8z"/>
                                                                    <path d="M345.7,412.7c-0.9,0-1.8-0.5-2.7-1.4l-6-8.2c-0.9-1.4-0.9-3.2,0.5-4.6c1.4-0.9,3.2-0.9,4.6,0.9l6,8.2
                                                                          c0.9,1.4,0.9,3.2-0.9,4.6C347.1,412.7,346.6,412.7,345.7,412.7L345.7,412.7z"/>
                                                                    </g>
                                                                    </svg>
                                                                </label>
                                                                <h5><label for="type4">Convertible</label></h5>
                                                            </div>
                                                            <div class="col-xs-2">
                                                                <input id="type5" type="radio" name="type" />
                                                                <label for="type5" class="b-search__main-type-svg">
                                                                    <svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                         viewBox="47.6 310.9 500 220" enable-background="new 47.6 310.9 500 220" xml:space="preserve">
                                                                    <g>
                                                                    <path d="M207.9,399.4c-9.2,0-34.8-2.3-48.1-9.6c20.6-11,57.2-23.8,76-23.8c16.5,0,36.6,0,52.7,0c25.2,0,46.2,9.2,66.9,20.6
                                                                          c-3.2,3.2-5,6.4-5.5,11.4c0,0.5,0,0.9,0,1.4H207.9L207.9,399.4z"/>
                                                                    <path d="M134.6,486.4c-21.1,0-45.3-12.4-46.7-12.8l-2.3-1.4v-32.1l-1.4-0.9c0.9-1.8,6-7.3,6-11.9v-29.8l17.9-4.1
                                                                          c24.3-11.4,90.7-34.3,134.6-34.3h54.9c12.4,0.9,22.9,3.2,32.1,5.5c17.9,5.5,58.6,30.2,65,34.3c6.4,0.9,40.3,5,67.8,11.9
                                                                          c33,8.2,44,21.5,45.3,27.5l2.7,47.2l-4.1-0.9c-7.8,1.8-14.2,2.7-31.1,2.7h-18.8v-9.2h13.7c12.8,0,22-0.5,27.5-1.8v-0.9v-35.7
                                                                          c-0.5-1.4-9.6-11.9-38-19.2c-29.8-7.8-66.9-11.9-67.3-11.9l-1.8-0.5c-0.5-0.5-45.8-28.8-64.1-34.3c-8.2-2.3-18.3-4.1-29.3-5.5h-54
                                                                          c-42.6,0-104.4,22.9-127.8,33.9l-4.6,1.4l-11,2.3v22c0,6.4-3.2,12.8-4.6,15.6v22.9c6,3.7,22.9,12.4,38,11.9h12.4v9.2h-12.4
                                                                          C132.8,486.4,135.1,486.4,134.6,486.4L134.6,486.4z M402,486.4H200.6v-9.2H402V486.4L402,486.4z"/>
                                                                    <path d="M99.8,414.1c0,4.6-2.3,9.6-2.7,12.4h6.9c7.8,0,17.9-6,18.3-12.4v-6H99.4L99.8,414.1L99.8,414.1L99.8,414.1z"/>
                                                                    <path d="M471.6,433.3l9.2,16.5c2.7-1.8,7.3-2.7,11-2.7l0,0l0,0l0,0l0,0l0,0l0,0c4.6,0,9.6,0,14.2,0v-0.9c-0.5-1.4-5-9.2-9.6-12.8
                                                                          C487.7,433.3,479.9,433.3,471.6,433.3L471.6,433.3z"/>
                                                                    <polygon points="310.5,426.9 287.6,426.9 287.6,422.3 310.5,422.3 	"/>
                                                                    <polygon points="214.3,426.9 191.4,426.9 191.4,422.3 214.3,422.3 	"/>
                                                                    <polygon points="232.6,459.9 232.6,468.1 381.9,468.1 	"/>
                                                                    <polygon points="502.8,468.1 493.6,468.1 493.6,463.5 502.8,463.5 	"/>
                                                                    <path d="M494.5,463.5h-6.9c-1.8,0-3.2-0.9-3.2,0.9v4.6c0,1.8,1.4,3.2,3.2,3.2h6.9c1.8,0,3.2-1.4,3.2-3.2v-2.3
                                                                          C498.2,464.9,496.8,463.5,494.5,463.5L494.5,463.5z"/>
                                                                    <path d="M359,396.2L359,396.2c-2.7,2.7-4.1,6-4.1,9.6c0,1.4,0.5,0.5,1.4,1.4c0.9,0.9,1.8,1.4,3.2,1.4H370c1.8,0,3.2-0.9,4.1-2.3
                                                                          c0.9-1.4,0.9-0.9,0-2.7c-1.8-3.2-5-6.4-10.1-8.2C362.2,394.4,360.4,394.8,359,396.2L359,396.2z"/>
                                                                    <path d="M367.7,415.5c-0.9,0-1.8-0.5-2.7-1.4l-6-8.2c-0.9-1.4-0.9-3.2,0.9-4.6c1.4-0.9,3.2-0.9,4.6,0.9l6,8.2
                                                                          c0.9,1.4,0.9,3.2-0.9,4.6C369.1,415,368.6,415.5,367.7,415.5L367.7,415.5z"/>
                                                                    <path d="M95.2,463.5v13.3h35.3l-0.5-0.9C115.4,474.5,101.2,467.2,95.2,463.5L95.2,463.5z"/>
                                                                    <path d="M175.4,431L175.4,431c11,0,21.1,4.6,28.8,11.9l0,0h-1.4c7.3,7.3,11.9,17.4,11.9,28.8v11.9v2.7h-4.6h-8.7
                                                                          c2.7-4.6,4.1-9.6,4.1-14.7c0-16-13.3-27.5-29.3-27.5s-29.3,11-29.3,27.5c0,5.5,1.4,10.5,4.1,14.7h-10.5h-3.2v-4.6v-10.5
                                                                          c0-11,4.6-21.1,11.9-28.8h-1.8l0,0C153.9,435.6,163.9,431,175.4,431L175.4,431z"/>
                                                                    <path d="M151.1,449.3c6.4-6.4,14.7-10.1,24.3-10.1c9.6,0,17.9,3.7,24.3,10.1l0,0c6.4,6.4,10.1,14.7,10.1,24.3
                                                                          c0,9.6-3.7,17.9-10.1,24.3l0,0c-6.4,6.4-14.7,10.1-24.3,10.1c-9.6,0-17.9-3.7-24.3-10.1c-6.4-6.4-10.1-14.7-10.1-24.3
                                                                          C141,464,144.7,455.3,151.1,449.3L151.1,449.3L151.1,449.3L151.1,449.3z M175.4,449.3c-13.3,0-23.8,10.5-23.8,23.8
                                                                          s10.5,23.8,23.8,23.8c13.3,0,23.8-10.5,23.8-23.8C199.2,460.3,188.7,449.3,175.4,449.3L175.4,449.3z"/>
                                                                    <path d="M175.4,464.9c-5,0-8.7,4.1-8.7,8.7c0,5,3.7,8.7,8.7,8.7c4.6,0,8.7-3.7,8.7-8.7C184.1,468.6,180,464.9,175.4,464.9
                                                                          L175.4,464.9z"/>
                                                                    <path d="M432.7,431L432.7,431c11,0,21.1,4.6,28.8,11.9l0,0h1.8c7.3,7.3,11.9,17.4,11.9,28.8v11.9v2.7h-4.6h-11.9
                                                                          c2.7-4.6,4.1-9.6,4.1-14.7c0-16-13.3-27.5-29.3-27.5s-29.3,11-29.3,27.5c0,5.5,1.4,10.5,4.1,14.7h-10.5h-4.6v-4.6v-10.5
                                                                          c0-11,4.6-21.1,11.9-28.8h-0.5l0,0C411.7,435.6,421.7,431,432.7,431L432.7,431z"/>
                                                                    <path d="M408.5,449.3c6.4-6.4,14.7-10.1,24.3-10.1c9.6,0,17.9,3.7,24.3,10.1l0,0c6.4,6.4,10.1,14.7,10.1,24.3
                                                                          c0,9.6-3.7,17.9-10.1,24.3l0,0c-6.4,6.4-14.7,10.1-24.3,10.1c-9.6,0-17.9-3.7-24.3-10.1c-6.4-6.4-10.1-14.7-10.1-24.3
                                                                          C398.8,464,402.5,455.3,408.5,449.3L408.5,449.3L408.5,449.3L408.5,449.3z M432.7,449.3c-13.3,0-23.8,10.5-23.8,23.8
                                                                          s10.5,23.8,23.8,23.8c13.3,0,23.8-10.5,23.8-23.8C457,460.3,446,449.3,432.7,449.3L432.7,449.3z"/>
                                                                    <path d="M432.7,464.9c-4.6,0-8.7,4.1-8.7,8.7c0,5,3.7,8.7,8.7,8.7c4.6,0,8.7-3.7,8.7-8.7C441.9,468.6,437.8,464.9,432.7,464.9
                                                                          L432.7,464.9z"/>
                                                                    </g>
                                                                    </svg>
                                                                </label>
                                                                <h5><label for="type5">Sedan</label></h5>
                                                            </div>
                                                            <div class="col-xs-2">
                                                                <input id="type6" type="radio" name="type" />
                                                                <label for="type6" class="b-search__main-type-svg">
                                                                    <svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                         viewBox="47.6 310.9 500 220" enable-background="new 47.6 310.9 500 220" xml:space="preserve">
                                                                    <g>
                                                                    <path d="M367.7,491.9h-142v-9.2h142V491.9L367.7,491.9z M408.9,490.1v-9.2c8.2,0,14.2-0.9,18.3-1.4V448c-2.7-11-39.8-27.5-54-27.5
                                                                          l-0.9-1.4h-1.4h-5c-27.9-16.9-49.9-29.3-82-32.1h-25.6c-19.7,0-35.7,1.4-48.1,4.6l1.8,0.5l-4.1,2.7c-13.3,8.2-36.2,28.8-34.3,39.8
                                                                          c0,6.9-4.6,11.9-7.3,14.2v22.9c1.4,2.3,5.5,7.8,14.7,9.2l-2.3,9.2c-16-2.7-21.1-14.7-21.1-15.1l-0.5-1.8v-29.3l2.3-1.4
                                                                          c1.8-0.9,4.1-4.6,4.1-7.3c-2.3-16.5,22.4-37.1,35.7-46.2l-3.7-5.5l6,0.9c14.2-4.6,33-6.9,56.8-6.9h26.1
                                                                          c34.8,3.2,58.6,17.9,86.5,34.8l2.7-1.4c16.5,0.9,58.2,18.3,62.3,36.2l2.7,40.3h-6.4C425.9,488.7,420.4,489.6,408.9,490.1
                                                                          L408.9,490.1z"/>
                                                                    <path d="M202.4,442.9L202.4,442.9c9.2,0,17.9,3.7,24.3,10.1h-1.4c6,6,10.1,14.7,10.1,24.3v8.7v6.4h-4.6H229c-1.4,3.2-3.7,6.4-6,8.7
                                                                          v-1.4l0,0c-5,5-12.4,8.7-20.6,8.7c-7.8,0-15.1-3.2-20.6-8.7l0,0l0,0c-2.7-2.7-5-6.4-6.4-10.1c-1.4-0.5-5-0.9-6-1.4l-2.7-1.4v-3.2
                                                                          v-6.4c0-9.2,3.7-17.9,10.1-24.3h2.3C184.5,447,192.8,442.9,202.4,442.9L202.4,442.9L202.4,442.9z M388.3,459
                                                                          c-11,0-19.7,8.7-19.7,19.7c0,11,8.7,19.7,19.7,19.7c11,0,19.7-8.7,19.7-19.7C408,468.1,399.3,459,388.3,459L388.3,459L388.3,459z
                                                                          M202.4,459c-11,0-19.7,8.7-19.7,19.7c0,11,8.7,19.7,19.7,19.7s19.7-8.7,19.7-19.7C222.1,468.1,213.4,459,202.4,459L202.4,459
                                                                          L202.4,459z M388.3,442.9L388.3,442.9c9.2,0,17.9,3.7,24.3,10.1l0,0c6,6,10.1,14.7,10.1,24.3v8.2v6.4h-4.6c-0.9,0-1.8,0-3.2,0
                                                                          c-1.4,3.2-3.7,4.6-6,7.3l0,0l0,0c-5,5-12.4,8.7-20.6,8.7c-7.8,0-15.1-3.2-20.6-8.7l0,0v1.4c-2.7-2.7-4.6-5.5-6-8.7H359h-5v-4.6
                                                                          v-10.1c0-9.2,3.7-17.9,10.1-24.3h0.5C370.4,447,378.7,442.9,388.3,442.9L388.3,442.9z"/>
                                                                    <path d="M205.1,393.9c-9.2,5-23.4,12.8-30.2,20.1h16l21.5-22.9L205.1,393.9L205.1,393.9z"/>
                                                                    <path d="M212,416.4c14.7-16.5,24.7-25.2,37.1-25.2h34.8c20.6,1.8,37.5,8.7,54.5,17.9c-0.5,0-0.5-0.5-0.9,0l0,0
                                                                          c-3.2,3.2-5,6.9-5,11.4c0,0.9,0,1.4,0,2.3L212,416.4L212,416.4z"/>
                                                                    <path d="M166.2,425.5v0.9v11h13.3c0,0,8.2-9.6,7.8-15.1C186.8,421.9,177.7,422.3,166.2,425.5L166.2,425.5z"/>
                                                                    <path d="M202.4,471.8c-4.1,0-7.3,3.2-7.3,7.3c0,4.1,3.2,7.3,7.3,7.3c4.1,0,7.3-3.2,7.3-7.3C209.3,475,206.1,471.8,202.4,471.8
                                                                          L202.4,471.8z"/>
                                                                    <path d="M388.3,471.8c-4.1,0-7.3,3.2-7.3,7.3c0,4.1,3.2,7.3,7.3,7.3c4.1,0,7.3-3.2,7.3-7.3C395.6,475,392.4,471.8,388.3,471.8
                                                                          L388.3,471.8z"/>
                                                                    <polygon points="285.3,432.4 271.5,432.4 271.5,427.8 285.3,427.8 	"/>
                                                                    <path d="M339.8,411.3L339.8,411.3c-2.7,2.7-4.1,6-4.1,9.6c0,1.4,0.5,4.6,1.4,5.5c0.9,0.9,1.8,1.4,3.2,1.4h10.5
                                                                          c1.8,0,3.2-0.9,4.1-2.3c0.9-1.4,0.9-5.5,0-6.9c-1.8-3.2-5-6.4-10.1-8.2C343,409.5,341.1,410,339.8,411.3L339.8,411.3z"/>
                                                                    <path d="M348.5,430.6c-0.9,0-1.8-0.5-2.7-1.4l-6-8.2c-0.9-1.4-0.9-3.2,0.9-4.6c1.4-0.9,3.2-0.9,4.6,0.9l6,8.2
                                                                          c0.9,1.4,0.9,3.2-0.9,4.6C349.8,430.1,348.9,430.6,348.5,430.6L348.5,430.6z"/>
                                                                    <polygon points="225.7,427.8 212,427.8 212,423.2 225.7,423.2 	"/>
                                                                    <path d="M397,423.2c11.9,21.1,16,26.6,31.6,26.6v0.5l0,0l0,0l0,0l0,0h0.5h1.8v-2.7c-1.8-8.7-16-17.9-30.7-24.3H397L397,423.2z"/>
                                                                    </g>
                                                                    </svg>
                                                                </label>
                                                                <h5><label for="type6">Minicar</label></h5>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="b-world__item wow zoomInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                                                                    <div class="b-world__item-val">
                                                                    </div>
                                                                    <h2 style="margin:0px;">Vehicle Features</h2>
                                                                </div>
                                                            </div>
                                                            <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <hr style="border-top: 1px solid #ccc;" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                                <label class="container_check label_for_checkbox_home_advaced_search" for="car_feature_by_id_all">
                                                                    <input type="checkbox" name="check[all]" id="car_feature_by_id_all" class="checkbox_for_features" >
                                                                    <span class="label-text"><b>Select All</b></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <?php foreach ($select_car_main_features_category as $cars_main_features => $cars_main_feature) { ?>
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <label class="home_advanced_search_category_label"><?php echo $cars_main_feature->name ?></label>
                                                                </div>
                                                                <?php foreach ($select_car_features_category as $car_features_category => $feature_by_catid) { ?>
                                                                    <?php if ($feature_by_catid->cat_id == $cars_main_feature->id) { ?>
                                                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                                            <label class="container_check label_for_checkbox_home_advaced_search" for="car_feature_by_id_<?php echo $feature_by_catid->id ?>">
                                                                                <input type="checkbox" name="check[car_features_<?php echo $feature_by_catid->id ?>]" id="car_feature_by_id_<?php echo $feature_by_catid->id ?>" class="checkbox_for_features_home_advanced_search" >
                                                                                <span class="label-text"><?php echo $feature_by_catid->name ?></span>
                                                                            </label>
                                                                        </div>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " style='margin-top:5px;'>
                                            <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding'>
                                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding'>
                                                    <div class='more_options_wrapper' style="margin-left:24px;padding-bottom:5px;">
                                                        <div class='more_options_container'>
                                                            <div id='HomeShowMoreOptionsBTN'>
                                                                <i class='fa fa-plus-circle more_options_icon'></i><span id='HomeShowMoreText'>ADVANCED OPTIONS</span>
                                                            </div>
                                                            <div id='HomeShowLessOptionsBTN' style='display: none;'>
                                                                <i class='fa fa-minus-circle more_options_icon'></i><span>LESS OPTIONS</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!--b-search-->
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <div class="row m-border">
                            <?php if (sizeof($cars) > 0) { ?>
                                <?php foreach ($cars as $cars_details => $car) { ?>
                                    <div class="col-lg-4 col-md-6 col-xs-12 wow zoomInUp language_grid_cars_col"  data-wow-delay="0.5s">
                                        <div class="b-items__cell" style="height: 515px;">
                                            <div class="b-items__cars-one-img">
                                                <a href="/cars/<?php echo $car->slug ?>">
                                                    <?php
                                                    $path = Yii::$app->request->baseUrl . 'media/284x251/' . $car->image;
                                                    $type = pathinfo($path, PATHINFO_EXTENSION);
                                                    $data = file_get_contents($path);
                                                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                                    ?>
                                                    <?php $i++; ?>
                                                    <img class='img-responsive' src="<?php echo $base64 ?>" alt='<?php echo $car->name ?>'/>
                                                </a>
                                                <?php if ($car->featured == 1) { ?>
                                                    <span class="b-items__cars-one-img-type m-premium">PREMIUM</span>
                                                <?php } else if ($car->ad_type == 2) { ?>
                                                    <span class="b-items__cars-one-img-type m-listing">HOT OFFER</span>
                                                <?php } else if ($car->date_created >= $today_date_before_7_days_timeStamp) { ?>
                                                    <span class="b-items__cars-one-img-type m-leasing">NEW LISTING</span>
                                                <?php } else { ?>

                                                <?php } ?>


                                                <label class="label_for_checkbox lable_for_features home_checkbox_for_compare_lable" id='<?php echo $car->id ?>'>
                                                    <input type="checkbox" name="check[car_features1]" class="checkbox_for_features" value='<?php echo $car->id ?>' id="car_compare_id_<?php echo $car->id ?>">  <span class="label-text"></span>
                                                </label>

                                            </div>
                                            <div class="b-items__cell-info">
                                                <div class="s-lineDownLeft b-items__cell-info-title">
                                                    <div class="row">
                                                        <div class="col-xs-10">
                                                            <h2 class="">
            <!--                                                                <a href="/cars/<?php echo $car->slug ?>" class="car_grid_view_name">
                                                                <?php if (strlen($car->name) < 21) { ?>
                                                                    <?php echo $car->name ?>
                                                                <?php } else { ?>
                                                                    <?php echo substr($car->name, 0, 18) . "..."; ?>
                                                                <?php } ?>
                                                                </a>-->
                                                                <a href="/cars/<?php echo $car->slug ?>" class="car_grid_view_name">
                                                                    <?php $select_car_make = Make::find()->where(['id' => $car->make_id])->one(); ?>
                                                                    <?php $select_car_model = Model::find()->where(['id' => $car->make_id])->one(); ?>
                                                                    <?php echo $select_car_make['name'] . " " . $select_car_model['name']; ?>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                        <div class="col-xs-2  text-right">
                                                            <?php if (Yii::$app->user->isGuest) { ?>
                                                                <i class="fa fa-heart-o fav_icon" id="<?php echo $car->id ?>" data-toggle="modal" data-target="#modalLogin"></i>
                                                            <?php } else { ?>
                                                                <?php
                                                                $get_fav = FavList::find()->where(['listing_id' => $car->id])->andWhere(['user_id' => Yii::$app->user->getId()])->andWhere(['status' => 1])->one();
                                                                ?>
                                                                <?php if (sizeof($get_fav) > 0) { ?>
                                                                    <i class="fa fa-heart remove_fav_car fav_icon" id="<?php echo $car->id ?>"></i>
                                                                <?php } else { ?> 
                                                                    <i class="fa fa-heart-o add_fav_icon fav_icon" id="<?php echo $car->id ?>"></i>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <?php if ($lang_id == 1) { ?>
                                                    <div>
                                                        <div class="row m-smallPadding">
                                                            <div class="col-xs-5">
                                                                <span class="b-items__cars-one-info-title"><?= yii::t('app', 'Body Style') ?>:</span>
                                                                <span class="b-items__cars-one-info-title"><?= yii::t('app', 'Mileage') ?>:</span>
                                                                <span class="b-items__cars-one-info-title"><?= yii::t('app', 'Transmission') ?>:</span>
                                                                <span class="b-items__cars-one-info-title"><?= yii::t('app', 'Specs') ?>:</span>
                                                            </div>
                                                            <div class="col-xs-7">
                                                                <span class="b-items__cars-one-info-value">Sedan</span>
                                                                <span class="b-items__cars-one-info-value">35,000 KM</span>
                                                                <span class="b-items__cars-one-info-value">6-Speed Auto</span>
                                                                <span class="b-items__cars-one-info-value">2-Passenger, 2-Door</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h5 class="b-items__cell-info-price pull-left"><?php echo number_format($car->price) . " JOD" ?></h5>
                                                    <div class="store_image_div pull-right">
                                                        <a href="#" class="font_special dropdown-toggle text-trans-none" data-toggle="dropdown">
                                                            <img src="/media/stores_logo_150x150/1533031603_WFwGHRnRzjGE3Rzudn7b1t3hbmq71TWt.jpg" class=" login_avatar" style='width:50px;'>
                                                        </a>
                                                    </div>
                                                <?php } else { ?>
                                                    <div>
                                                        <div class="row m-smallPadding">
                                                            <div class="col-xs-7">
                                                                <span class="b-items__cars-one-info-value">Sedan</span>
                                                                <span class="b-items__cars-one-info-value">35,000 KM</span>
                                                                <span class="b-items__cars-one-info-value">6-Speed Auto</span>
                                                                <span class="b-items__cars-one-info-value">2-Passenger, 2-Door</span>
                                                            </div>
                                                            <div class="col-xs-5">
                                                                <span class="b-items__cars-one-info-title">:<?= yii::t('app', 'Body Style') ?></span>
                                                                <span class="b-items__cars-one-info-title">:<?= yii::t('app', 'Mileage') ?></span>
                                                                <span class="b-items__cars-one-info-title">:<?= yii::t('app', 'Transmission') ?></span>
                                                                <span class="b-items__cars-one-info-title">:<?= yii::t('app', 'Specs') ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="store_image_div pull-left">
                                                        <a href="#" class="font_special dropdown-toggle text-trans-none" data-toggle="dropdown">
                                                            <img src="/images/team/50x50/02.jpg" class="img-circle img-bordered login_avatar">
                                                        </a>
                                                    </div>
                                                    <h5 class="b-items__cell-info-price pull-right"><span> السعر </span><?php echo number_format($car->price) . " دينار " ?> </h5>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                No Cars
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="store_promotions_wapper">
                            <a href="#Promotions" data-toggle="tab">
                                <img src="/media/promotions/original/unnamed (6).jpg" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
            </div>









        </div>
    </div>
</div>


<!-- The Modal -->
<div id="myModal" class="modal" style="background:rgba(0,0,0,0.9);">
    <span class="close" style="font-size: 60px;position: absolute;right:100px;top:100px;opacity:1;color: #fff;">&times;</span>
    <img class="modal-content" id="img01" class="img-responsive" style="max-width: 600px;">
    <div id="caption"></div>
</div>
<script>
// Get the modal
    var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var img2 = document.getElementById('myImg2');
    var img3 = document.getElementById('myImg3');
    var img4 = document.getElementById('myImg4');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    img2.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
    
    img3.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
    
    img4.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
</script>