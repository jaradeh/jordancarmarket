<?php

use common\models\User;
use backend\models\Cars;
use backend\models\Make;
use backend\models\Model;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use backend\models\FavList;

//die(var_dump($pages->getCount()));
$currentURL = Yii::$app->request->url;
//die($currentURL);
$today_date = time();
$fast_search_counter = 0;
$fast_search_model_counter = 0;
$today_date_before_7_days = date('Y-m-d H:i:s', strtotime('-7 day', $today_date));
$today_date_before_7_days_timeStamp = strtotime($today_date_before_7_days);
//die($today_date_before_7_days_timeStamp);
if ($currentURL == "/cars") {
    $grid_link = "/cars?view=grid";
    $list_link = "/cars?view=list";
} else {
    $grid_link = $currentURL . "&view=grid";
    $list_link = $currentURL . "&view=list";
}


$session = Yii::$app->session;
$lang_id = $session['language_id'];
$lang = $session['language'];

$i = 0;
$list = false;
$list_active = "";
$grid_active = "";
$grid_active = "m-active";
if (!isset($_GET['view'])) {
    $list = false;
} else {
    if ($_GET['view'] == "grid") {
        $list = false;
        $grid_active = "m-active";
        $list_active = "";
        ?>
        <?php
    } else {
        $list = true;
        $list_active = "m-active";
        $grid_active = "";
        ?>
        <?php
    }
}

//die(var_dump($cars));
?>




<section>
    <div class="container">
        <div class="row">
            <div class="car-search-tool-container b-search__main-type wow zoomInUp" data-wow-delay="0.3s">
                <div class="col-xs-12 filter_wrap">
                    <?php if ($lang_id == 1) { ?>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                <div class="content_wrapper">
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-search red_color"></i>
                                        <?php if (isset($_GET['name'])) { ?>
                                            <input type="text" class="input_form add_field_custome" id="input_home_search_text" value="<?php echo $_GET['name'] ?>" placeholder="Search EX: Mercedes Benz , BMW , Toyota ..."/>
                                        <?php } else { ?>
                                            <input type="text" class="input_form add_field_custome" id="input_home_search_text" placeholder="Search EX: Mercedes Benz , BMW , Toyota ..."/>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no_padding">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                    <div class="content_wrapper">
                                        <div class="dropdown">
                                            <input type="text" placeholder="Make" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name" required="required" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
                                    <div class="content_wrapper">
                                        <div class="dropdown">
                                            <div class="dropdown">
                                                <input type="text" placeholder="Model" id="dropdownMenu2" value='' class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" disabled="">
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
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 no_padding">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                <div class="content_wrapper">
                                    <!--<label class="color_dark form_lable" for="text_search"> Car Location</label>-->
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                        <input type="text" placeholder="Location" id="car_location_input" value='' class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                                        <input type="hidden" id="location_id_for_post_final" name="Cars[type]" value="" >
                                        <i class='select_main_image fa fa-globe icon_location_globe' style='margin-left: 17px;'></i>
                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>
                                        <ul class="dropdown-menu drop_down_enable_scroll" id="car_location_list">
                                            <li class="dropdown-header">Select Location</li>
                                            <li class="select_main_location_li" id="1">
                                                <div class="select_model_li">
                                                    <!--<i class='fa fa-globe' style='margin-right: 15px;'></i>-->
                                                    <span class="car_make_name " id="car_location_li_name_1"> Amman
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="select_main_location_li" id="2">
                                                <div class="select_model_li">
                                                    <!--<i class='fa fa-globe' style='margin-right: 15px;'></i>-->
                                                    <span class="car_make_name" id="car_location_li_name_2">Dealership & Agency
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="select_main_location_li" id="3">
                                                <div class="select_model_li">
                                                    <!--<i class='fa fa-globe' style='margin-right: 15px;'></i>-->
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
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 no_padding">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                <div class="content_wrapper">
                                    <label class="color_dark form_lable" for="text_search">  Car Year</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                        <div class="dropdown">
                                            <input type="text" placeholder="From" id="input_home_search_year_from_container" maxlength="4" class="btn btn-default dropdown-toggle  custom_dropdown  car_make_name" name="" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true=">
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
                                            <input type="text" placeholder="To" id="input_home_search_year_to_container" maxlength="4" class="btn btn-default dropdown-toggle  custom_dropdown  car_make_name" name="" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true=">
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

                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 no_padding">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                <div class="content_wrapper">
                                    <label class="color_dark form_lable" for="text_search"> Price</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                        <input type="text" class="input_form search_car_price_number custom_dropdown  " id="input_home_search_price_from" maxlength="8" placeholder="From">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                        <input type="text" class="input_form search_car_price_number custom_dropdown  " id="input_home_search_price_to" maxlength="8" placeholder="To">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no_padding">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                    <div class="content_wrapper">
                                        <label class="color_dark form_lable" for="text_search"> Condition</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                            <input type="text" placeholder="Condition" id="input_home_search_condition_container" maxlength="4" class="btn btn-default dropdown-toggle  custom_dropdown  car_make_name" name="" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true=">
                                            <input type="hidden" id="input_home_search_condition" value="" >
                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_year_home_search" id="dropdown_icon_for_input_make"></span>
                                            <ul class="dropdown-menu drop_down_enable_scroll" id="add_model_list">
                                                <li class="dropdown-header">Select Car Condition</li>
                                                <li class="home_search_condition_main_li" id="1">
                                                    <div class="select_model_li">
                                                        <span class="car_condtion_li_home_search_span_name" id="home_search_condition_name_1">New</span>
                                                    </div>
                                                </li>
                                                <li class="home_search_condition_main_li" id="2">
                                                    <div class="select_model_li">
                                                        <span class="car_condtion_li_home_search_span_name" id="home_search_condition_name_2">Used</span>
                                                    </div>
                                                </li>
                                                <li class="home_search_condition_main_li" id="3">
                                                    <div class="select_model_li">
                                                        <span class="car_condtion_li_home_search_span_name" id="home_search_condition_name_3">Other</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                    <div class="content_wrapper">
                                        <label class="color_dark form_lable" for="text_search"> Transmission</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                            <input type="text" placeholder="Transmission" id="home_search_input_condition_container" value='' class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                                            <input type="hidden" id="home_search_input_condition_id" name="Cars[type]" value="" >
                                            <i class='select_main_image fa fa-cogs icon_location_globe' style='margin-left: 15px;'></i>
                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>
                                            <ul class="dropdown-menu drop_down_enable_scroll" id="car_location_list">
                                                <li class="dropdown-header">Select Transmission</li>
                                                <li class="select_main_transmission_li" id="1">
                                                    <div class="select_model_li">
                                                        <i class='fa fa-cogs' style='margin-right: 15px;'></i>
                                                        <span class="car_make_name " id="home_search_transmission_name_1">
                                                            Automatic
                                                        </span>
                                                    </div>
                                                </li>
                                                <li class="select_main_transmission_li" id="2">
                                                    <div class="select_model_li">
                                                        <i class='fa fa-cogs' style='margin-right: 15px;'></i>
                                                        <span class="car_make_name" id="home_search_transmission_name_2">
                                                            Manual
                                                        </span>
                                                    </div>
                                                </li>
                                                <li class="select_main_transmission_li" id="3">
                                                    <div class="select_model_li">
                                                        <i class='fa fa-cogs' style='margin-right: 15px;'></i>
                                                        <span class="car_make_name" id="home_search_transmission_name_3"> 
                                                            Other
                                                        </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 no_padding">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                <div class="content_wrapper">
                                    <label class="color_dark form_lable" for="text_search"> Car Milage</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                        <input type="text" placeholder="Milage" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name"  required="required" type="button" id="dropdown_milage_input" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <input type="hidden" name="Cars[milage]" id="milage_id_for_post_final" value="">
                                        <img class="select_main_image" name="Cars[milage]" id="select_image" src="/images/elements/milage.png">
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
                        </div>



                        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding' id='moreOptionsContainer' style='display: none;'>


                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 no_padding">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                    <div class="content_wrapper">
                                        <label class="color_dark form_lable" for="text_search"> Car Color</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                            <input type="text" placeholder="Color" id="dropdown_exterior_color_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name "  required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <input type="hidden" id="car_exterior_color_for_post_final" value="" name="Cars[exterior_color]" value="">
                                            <img class="select_main_image " id="car_exterior_color_dropdown_image" src="/images/elements/Color_wheel.png">
                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                            <ul class="dropdown-menu drop_down_enable_scroll">
                                                <li class="dropdown-header">Select Color</li>
                                                <?php foreach ($select_colors as $colors_details => $colors) { ?>
                                                    <li class="select_exterior_li" id="<?php echo $colors->id ?>">
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
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 no_padding">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                    <div class="content_wrapper">
                                        <label class="color_dark form_lable" for="text_search"> Interior Color</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                            <input type="text" placeholder="Color" id="dropdown_interior_color_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name "  required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <input type="hidden" id="car_interior_color_for_post_final" value="" name="Cars[interior_color]"  value="">
                                            <img class="select_main_image " id="car_exterior_color_dropdown_image" src="/images/elements/Color_wheel.png">
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
                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no_padding">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                        <div class="content_wrapper">
                                            <label class="color_dark form_lable" for="text_search"> Car Engine</label>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                <input type="text" placeholder="Engine" id="dropdown_engine_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name " required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <input type="hidden" id="car_engine_for_post_final" value="" name="Cars[engine]" value="">
                                                <img class="select_main_image " id="car_interior_dropdown_image" src="/images/elements/icons-engine.png" style="margin-left: 10px;">
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
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                        <div class="content_wrapper">
                                            <label class="color_dark form_lable" for="text_search"> Drivetrain</label>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                                <input type="text" placeholder="Drivetrain" id="dropdown_drivetrain_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name " required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <input type="hidden" id="car_drivetrain_for_post_final" value="" name="Cars[engine]" value="">
                                                <img class="select_main_image " id="car_interior_dropdown_image" src="/images/elements/icons-engine.png" style="margin-left: 10px;">
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
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 no_padding">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                    <div class="content_wrapper">
                                        <label class="color_dark form_lable" for="text_search"> Body Type</label>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                            <input type="text" placeholder="Select Car Body Type" id="dropdown_body_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name " name="Cars[body_type]" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <input type="hidden" id="body_type_for_post_final" value="" name="Cars[body_type]" value="">
                                            <span id="select_body_type_image_main_container_span">
                                                <img class="select_main_image " id="select_body_type_image_placeholer" src="/images/logo/sport-tuning-car-auto-model-512.png" style="margin-left: 11px;">
                                            </span>
                                            <span class="select_body_new_image_body_holder"  style="display: none;">
                                                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-3 select_body_type_new_icon_holder_container" id="select_body_type_new_icon_holder_container">
                                                </div>
                                            </span>
                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                            <ul class="dropdown-menu drop_down_enable_scroll" id="add_body_type_li">
                                                <li class="dropdown-header">Select Body Type</li>
                                                <?php foreach ($select_body_type as $body_type_details => $bodyType) { ?>
                                                    <li class="select_car_body_main_li" id="<?php echo $bodyType->id ?>">
                                                        <div class='select_car_body_first_div' id='select_car_body_first_div_<?php echo $bodyType->id ?>'>
                                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-4">
                                                                <input id="type1" type="radio" name="type" />
                                                                <label for="type1" class="b-search__main-type-svg">
                                                                    <span id="body_type_image_container_<?php echo $bodyType->id ?>"><?php echo $bodyType->path ?></span>
                                                                </label>
                                                            </div>
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







                        </div>


                        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding'>
                            <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                                <div class='more_options_wrapper'>
                                    <div class='more_options_container'>
                                        <div id='ShowMoreOptionsBTN'>
                                            <i class='fa fa-plus-circle more_options_icon'></i><span id='ShowMoreText'>MORE OPTIONS</span>
                                        </div>
                                        <div id='ShowLessOptionsBTN' style='display: none;'>
                                            <i class='fa fa-minus-circle more_options_icon'></i><span>LESS OPTIONS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6' style="padding-right:0px; padding-left:0px;">
                                <footer class="b-items__aside-main-footer pull-right ">
                                    <a href="/cars" class='reset_form_btn'>RESET ALL FILTERS</a>
                                    <button type="submit" id="home_search_input_button_submit" class="btn m-btn filter_search_BTN">FILTER VEHICLES<span class="fa fa-angle-right"></span></button>
                                </footer>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                <div class="content_wrapper">
                                    <div class="dropdown">
                                        <div class="dropdown">
                                            <input type="text" placeholder="<?= yii::t('app', 'Select Car Model') ?>" id="dropdownMenu2" value='' class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" disabled="">
                                            <input type="hidden" id="model_id_for_post_final" name="Cars[model_id]" value="" >
                                            <img class="select_main_image" src="/images/logo/sport-tuning-car-auto-model-512.png">
                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>
                                            <ul class="dropdown-menu drop_down_enable_scroll" id="add_model_list">
                                                <li class="dropdown-header"><?= yii::t('app', 'Select Model') ?></li>

                                            </ul> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                <div class="content_wrapper">
                                    <div class="dropdown">
                                        <input type="text" placeholder="<?= yii::t('app', 'Select Car Make') ?>" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name" required="required" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <input type="hidden" id="input_home_search_make"  value="">
                                        <img class="select_main_image" id="select_image" src="/images/logo/add_field_logo_arabic.png">
                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>

                                        <ul class="dropdown-menu drop_down_enable_scroll select_car_make_ul">
                                            <li class="dropdown-header"><?= yii::t('app', 'Select Car(s)') ?></li>
                                            <?php foreach ($make_details as $car_make => $make) { ?>
                                                <?php
                                                $i++;
                                                ?>
                                                <li class="select_main_li" id="<?php echo $i; ?>">
                                                    <div class='select_make_li' id='image<?php echo $i ?>'><span class='car_make_name' id='image_<?php echo $i ?>_span'><?php echo $make->name ?></span><img id='img_<?php echo $i ?>' src="/media/car_logo/<?php echo $make->path ?>" class='custome_dropdown_img create_car_make_logo_image' ><input type="hidden" id="make_id_<?php echo $i; ?>" value="<?php echo $make->id ?>"></div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                <div class="content_wrapper">
                                    <div class="inner-addon left-addon">
                                        <input type="text" class="input_form add_field_custome" id="input_home_search_text" placeholder="<?= yii::t('app', 'Search EX: Mercedes Benz , BMW , Toyota ...') ?> "/>
                                        <i class="glyphicon glyphicon-search red_color"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                <div class="content_wrapper">
                                    <label class="color_dark form_lable" for="text_search"> <?= yii::t('app', 'Car Condition') ?></label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                        <input type="text" placeholder="<?= yii::t('app', 'Select Car Condition') ?>" id="input_home_search_condition_container" maxlength="4" class="btn btn-default dropdown-toggle  custom_dropdown  car_make_name" name="" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true=">
                                        <input type="hidden" id="input_home_search_condition" value="" >
                                        <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_year_home_search" id="dropdown_icon_for_input_make"></span>
                                        <ul class="dropdown-menu drop_down_enable_scroll" id="add_model_list">
                                            <li class="dropdown-header"><?= yii::t('app', 'Select Car Condition') ?></li>
                                            <li class="home_search_condition_main_li" id="1">
                                                <div class="select_model_li">
                                                    <span class="car_condtion_li_home_search_span_name" id="home_search_condition_name_1"><?= yii::t('app', 'New') ?></span>
                                                </div>
                                            </li>
                                            <li class="home_search_condition_main_li" id="2">
                                                <div class="select_model_li">
                                                    <span class="car_condtion_li_home_search_span_name" id="home_search_condition_name_2"><?= yii::t('app', 'Used') ?></span>
                                                </div>
                                            </li>
                                            <li class="home_search_condition_main_li" id="3">
                                                <div class="select_model_li">
                                                    <span class="car_condtion_li_home_search_span_name" id="home_search_condition_name_3"><?= yii::t('app', 'Other') ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                <div class="content_wrapper">
                                    <label class="color_dark form_lable" for="text_search"> <?= yii::t('app', 'Price') ?></label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                        <input type="text" class="input_form search_car_price_number custom_dropdown  " id="input_home_search_price_to" maxlength="8" placeholder="<?= yii::t('app', 'To') ?>">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                        <input type="text" class="input_form search_car_price_number custom_dropdown  " id="input_home_search_price_from" maxlength="8" placeholder="<?= yii::t('app', 'From') ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                <div class="content_wrapper">
                                    <label class="color_dark form_lable" for="text_search">  <?= yii::t('app', 'Car Year') ?></label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                        <div class="dropdown">
                                            <input type="text" placeholder="<?= yii::t('app', 'To') ?>" id="input_home_search_year_to_container" maxlength="4" class="btn btn-default dropdown-toggle  custom_dropdown  car_make_name" name="" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true=">
                                            <input type="hidden" id="input_home_search_year_to" value="" >
                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_year_home_search" id="dropdown_icon_for_input_make"></span>
                                            <ul class="dropdown-menu drop_down_enable_scroll" id="add_model_list">
                                                <li class="dropdown-header"><?= yii::t('app', 'Select Year To') ?></li>
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
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no_padding">
                                        <div class="dropdown">
                                            <input type="text" placeholder="<?= yii::t('app', 'From') ?>" id="input_home_search_year_from_container" maxlength="4" class="btn btn-default dropdown-toggle  custom_dropdown  car_make_name" name="" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true=">
                                            <input type="hidden" id="input_home_search_year_from" value="" >
                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_year_home_search" id="dropdown_icon_for_input_make"></span>
                                            <ul class="dropdown-menu drop_down_enable_scroll" id="add_model_list">
                                                <li class="dropdown-header"><?= yii::t('app', 'Select Year From') ?></li>
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
                                </div>
                            </div>
                        </div>




                        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding' id='moreOptionsContainer' style='display: none;'>


                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                    <div class="content_wrapper">
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
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                    <div class="content_wrapper">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                            <input type="text" placeholder="<?= yii::t('app', 'Select Car Body Type') ?>" id="dropdown_body_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name " name="Cars[body_type]" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <input type="hidden" id="body_type_for_post_final" value="" name="Cars[body_type]" value="">
                                            <span id="select_body_type_image_main_container_span">
                                                <img class="select_main_image " id="select_body_type_image_placeholer" src="/images/logo/sport-tuning-car-auto-model-512.png" style="margin-left: 17px;">
                                            </span>
                                            <span class="select_body_new_image_body_holder"  style="display: none;">
                                                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-3 select_body_type_new_icon_holder_container" id="select_body_type_new_icon_holder_container">
                                                </div>
                                            </span>
                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                            <ul class="dropdown-menu drop_down_enable_scroll" id="add_body_type_li">
                                                <li class="dropdown-header"><?= yii::t('app', 'Select Car Body Type') ?></li>
                                                <?php foreach ($select_body_type as $body_type_details => $bodyType) { ?>
                                                    <li class="select_car_body_main_li" id="<?php echo $bodyType->id ?>">
                                                        <div class='select_car_body_first_div' id='select_car_body_first_div_<?php echo $bodyType->id ?>'>
                                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-4" style='float:right;'>
                                                                <input id="type1" type="radio" name="type" />
                                                                <label for="type1" class="b-search__main-type-svg">
                                                                    <span id="body_type_image_container_<?php echo $bodyType->id ?>"><?php echo $bodyType->path ?></span>
                                                                </label>
                                                            </div>
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
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                    <div class="content_wrapper">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                            <input type="text" placeholder="<?= yii::t('app', 'Select Car Location') ?>" id="car_location_input" value='' class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                                            <input type="hidden" id="location_id_for_post_final" name="Cars[type]" value="" >
                                            <i class='select_main_image fa fa-globe icon_location_globe' style='margin-left: 22px;'></i>
                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>
                                            <ul class="dropdown-menu drop_down_enable_scroll" id="car_location_list">
                                                <li class="dropdown-header"><?= yii::t('app', 'Select Car Location') ?></li>
                                                <li class="select_main_location_li" id="1">
                                                    <div class="select_model_li">
                                                        <span class="car_make_name " id="car_location_li_name_1">
                                                            <?= yii::t('app', 'Amman') ?>
                                                        </span>
                                                        <i class='fa fa-globe' style='margin-left: 15px;'></i>
                                                    </div>
                                                </li>
                                                <li class="select_main_location_li" id="2">
                                                    <div class="select_model_li">
                                                        <span class="car_make_name" id="car_location_li_name_2"> 
                                                            <?= yii::t('app', "Agency") ?>
                                                        </span>
                                                        <i class='fa fa-globe' style='margin-left: 15px;'></i>
                                                    </div>
                                                </li>
                                                <li class="select_main_location_li" id="3">
                                                    <div class="select_model_li">
                                                        <span class="car_make_name" id="car_location_li_name_3">
                                                            <?= yii::t('app', "Free Zone (Al Zarqa')") ?>
                                                        </span>
                                                        <i class='fa fa-globe' style='margin-left: 15px;'></i>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                    <div class="content_wrapper">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                            <input type="text" placeholder="<?= yii::t('app', 'Select Car Color') ?>" id="dropdown_exterior_color_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name "  required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <input type="hidden" id="car_exterior_color_for_post_final" value="" name="Cars[exterior_color]" name="Cars[exterior_color]" value="">
                                            <img class="select_main_image " id="car_exterior_color_dropdown_image" src="/images/elements/Color_wheel.png">
                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                            <ul class="dropdown-menu drop_down_enable_scroll">
                                                <li class="dropdown-header"><?= yii::t('app', 'Select Car Color') ?></li>
                                                <?php foreach ($select_colors as $colors_details => $colors) { ?>
                                                    <li class="select_exterior_li" id="<?php echo $colors->id ?>">
                                                        <div class='select_make_li'>
                                                            <span class='car_make_name' id='color_span_<?php echo $colors->id ?>'>
                                                                <?php echo $colors->name ?>
                                                            </span>
                                                            <img id='color_img_<?php echo $colors->id ?>' src="/images/elements/<?php echo $colors->path ?>" class='custome_dropdown_img shadow_box create_car_make_logo_image' >
                                                        </div>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                    <div class="content_wrapper">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                            <input type="text" placeholder="<?= yii::t('app', 'Select Car Transmission') ?>" id="home_search_input_condition_container" value='' class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name" required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                                            <input type="hidden" id="home_search_input_condition_id" name="Cars[type]" value="" >
                                            <i class='select_main_image fa fa-cogs icon_location_globe' style='margin-left: 22px;'></i>
                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_make"></span>
                                            <ul class="dropdown-menu drop_down_enable_scroll" id="car_location_list">
                                                <li class="dropdown-header"><?= yii::t('app', 'Select Car Transmission') ?></li>
                                                <li class="select_main_transmission_li" id="1">
                                                    <div class="select_model_li">
                                                        <span class="car_make_name " id="home_search_transmission_name_1">
                                                            <?= yii::t('app', 'Automatic') ?>
                                                        </span>
                                                        <i class='fa fa-cogs' style='margin-left: 15px;'></i>
                                                    </div>
                                                </li>
                                                <li class="select_main_transmission_li" id="2">
                                                    <div class="select_model_li">
                                                        <span class="car_make_name" id="home_search_transmission_name_2">
                                                            <?= yii::t('app', 'Manual') ?>
                                                        </span>
                                                        <i class='fa fa-cogs' style='margin-left: 15px;'></i>
                                                    </div>
                                                </li>
                                                <li class="select_main_transmission_li" id="3">
                                                    <div class="select_model_li">
                                                        <span class="car_make_name" id="home_search_transmission_name_3"> 
                                                            <?= yii::t('app', 'Other') ?>
                                                        </span>
                                                        <i class='fa fa-cogs' style='margin-left: 15px;'></i>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 no_padding">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" >
                                    <div class="content_wrapper">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                            <input type="text" placeholder="<?= yii::t('app', 'Select Car Engine') ?>" id="dropdown_engine_type" class="btn btn-default dropdown-toggle  custom_dropdown add_field_custome car_make_name " required="required" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <input type="hidden" id="car_engine_for_post_final" value="" name="Cars[engine]" value="">
                                            <img class="select_main_image " id="car_interior_dropdown_image" src="/images/elements/icons-engine.png" style="margin-left: 17px;">
                                            <span class="fa fa-caret-down red_color pull-right dropdown_icon_for_input_make" id="dropdown_icon_for_input_body_type"></span>
                                            <ul class="dropdown-menu drop_down_enable_scroll" id="add_body_type_li">
                                                <li class="dropdown-header"><?= yii::t('app', 'Select Car Engine') ?></li>
                                                <li class="select_car_engine_li" id="1">
                                                    <div class='select_make_li'>
                                                        <span class='car_make_name' id='engine_name_span_1'>
                                                            <?= yii::t('app', '4 Cylinder') ?>
                                                        </span>
                                                        <i class="fa fa-cogs custome_dropdown_img"></i>
                                                    </div>
                                                </li>
                                                <li class="select_car_engine_li" id="2">
                                                    <div class='select_make_li'>
                                                        <span class='car_make_name' id='engine_name_span_2'>
                                                            <?= yii::t('app', '6 Cylinder') ?>
                                                        </span>
                                                        <i class="fa fa-cogs custome_dropdown_img"></i>
                                                    </div>
                                                </li>
                                                <li class="select_car_engine_li" id="3">
                                                    <div class='select_make_li'>
                                                        <span class='car_make_name' id='engine_name_span_3'>
                                                            <?= yii::t('app', '8 Cylinder') ?>
                                                        </span>
                                                        <i class="fa fa-cogs custome_dropdown_img"></i>
                                                    </div>
                                                </li>
                                                <li class="select_car_engine_li" id="4">
                                                    <div class='select_make_li'>
                                                        <span class='car_make_name' id='engine_name_span_4'>
                                                            <?= yii::t('app', 'Other') ?>
                                                        </span>
                                                        <i class="fa fa-cogs custome_dropdown_img"></i>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding'>
                            <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6' style="padding-right:0px; padding-left:0px;">
                                <footer class="b-items__aside-main-footer pull-left ">
                                    <button type="submit" id="home_search_input_button_submit" class="btn m-btn filter_search_BTN" style='margin-left: 10px;'><span class="fa fa-angle-left"></span>فلترة السيارات</button>
                                    <a href="/cars" class='reset_form_btn'>إعادة ضبط جميع الفلاتر</a>
                                </footer>
                            </div>
                            <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                                <div class='more_options_wrapper'>
                                    <div class='more_options_container'>
                                        <div id='ShowMoreOptionsBTN'>
                                            <span id='ShowMoreText'>المزيد من الخيارات</span><i class='fa fa-plus-circle more_options_icon'></i>
                                        </div>
                                        <div id='ShowLessOptionsBTN' style='display: none;'>
                                            <span>اخفاء الخيارات الاخرى</span><i class='fa fa-minus-circle more_options_icon'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="b-breadCumbs ">
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12 col-xs-12'>
                <div class="col-lg-12 col-xs-12" data-wow-delay="0.5s">
                    <?php if ($lang_id == 1) { ?>
                        <a href="/" class="b-breadCumbs__page"><?= yii::t('app', 'home') ?></a><span class="fa fa-angle-right"></span><a href="/cars" class="b-breadCumbs__page m-active"><?= yii::t('app', 'Stores & Cars') ?></a>
                    <?php } else { ?>
                        <a href="/" class="b-breadCumbs__page"><?= yii::t('app', 'home') ?></a><span class="fa fa-angle-left"></span><a href="/cars" class="b-breadCumbs__page m-active"><?= yii::t('app', 'Stores & Cars') ?></a>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div><!--b-breadCumbs-->


<?php if (isset($_GET['make'])) { ?>
    <?php
    $make_id = $_GET['make'];
    $find_model = Model::find()->where(['make_id' => $make_id])->all();
    ?>
    <section class='c-cars-modals'>
        <div class='container'>
            <div class='row'>
                <?php if (sizeof($find_model) > 12) { ?>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 c-cars-title-div-container-border">
                            <div class='col-xs-12 col-sm-12 col-md-11 col-lg-11 no_padding'>
                                <div class=''>
                                    <?php foreach ($find_model as $model => $car_model) { ?>
                                        <?php $fast_search_model_counter++; ?>
                                        <?php if ($fast_search_model_counter < 13) { ?>
                                            <div class='col-xs-6 col-sm-4 col-md-2 col-lg-2 no_padding'>
                                                <div class="c-fast-search-make-div">
                                                    <a href='/cars?cars_search=1&model=<?php echo $car_model->id ?>' class='c-fast-search-make-a'><?php echo $car_model->name ?></a>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" style="display: none;" id="c-fast-car-search-hidden-make-div">
                                                <div class='col-xs-6 col-sm-4 col-md-2 col-lg-2 no_padding'>
                                                    <div class="c-fast-search-make-div">
                                                        <a href='/cars?cars_search=1&model=<?php echo $car_model->id ?>' class='c-fast-search-make-a'><?php echo $car_model->name ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 no_padding">
                                <div class="c-fast-car-search-more-container">
                                    <span class="c-fast-car-search-more-text-span" id="c-fast-car-search-span-more">More <i class="fa fa-caret-down red_color"></i></span>
                                    <span class="c-fast-car-search-more-text-span" id="c-fast-car-search-span-less" style="display: none;">Less <i class="fa fa-caret-up red_color"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 c-cars-title-div-container-border">
                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding'>
                                <div class=''>
                                    <?php foreach ($find_model as $model => $car_model) { ?>
                                        <div class='col-xs-6 col-sm-4 col-md-2 col-lg-2 no_padding'>
                                            <div class="c-fast-search-make-div">
                                                <a href='/cars?cars_search=1&model=<?php echo $car_model->id ?>' class='c-fast-search-make-a'><?php echo $car_model->name ?></a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section class='c-cars-modals'>
        <div class='container'>
            <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 c-cars-title-div-container-border">
                        <div class='col-xs-12 col-sm-12 col-md-11 col-lg-11 no_padding'>
                            <div class=''>
                                <?php foreach ($make_details as $make => $car_make) { ?>
                                    <?php $fast_search_counter++; ?>
                                    <?php if ($fast_search_counter < 13) { ?>
                                        <div class='col-xs-6 col-sm-4 col-md-2 col-lg-2 no_padding'>
                                            <div class="c-fast-search-make-div">
                                                <img src="/media/car_logo/<?php echo $car_make->path ?>" class="c-fast-search-make-img">
                                                <a href='/cars?cars_search=1&make=<?php echo $car_make->id ?>' class='c-fast-search-make-a'><?php echo $car_make->name ?></a>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding" style="display: none;" id="c-fast-car-search-hidden-make-div">
                                            <div class='col-xs-6 col-sm-4 col-md-2 col-lg-2 no_padding'>
                                                <div class="c-fast-search-make-div">
                                                    <img src="/media/car_logo/<?php echo $car_make->path ?>" class="c-fast-search-make-img">
                                                    <a href='/cars?cars_search=1&make=<?php echo $car_make->id ?>' class='c-fast-search-make-a'><?php echo $car_make->name ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 no_padding">
                            <div class="c-fast-car-search-more-container">
                                <span class="c-fast-car-search-more-text-span" id="c-fast-car-search-span-more">More <i class="fa fa-caret-down red_color"></i></span>
                                <span class="c-fast-car-search-more-text-span" id="c-fast-car-search-span-less" style="display: none;">Less <i class="fa fa-caret-up red_color"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<div class="">
    <div class="container">
        <div class="row">

            <?php if ($lang_id == 1) { ?>
                <div class="col-lg-3 col-md-3 hidden-sm col-sm-12 col-xs-12">
                    <aside class="b-items__aside">
                        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">Follow Us</h2>

                        <div class="b-footer__content-social left_icons">
                            <a href="#"><span class="fa fa-facebook-square"></span></a>
                            <a href="#"><span class="fa fa-twitter-square"></span></a>
                            <a href="#"><span class="fa fa-instagram"></span></a>
                            <a href="#"><span class="fa fa-youtube-square"></span></a>
                        </div>

                        <div class="hidden-xs b-items__aside-sell wow zoomInUp" data-wow-delay="0.5s">
                            <a href='/cars/create/1'>
                                <div class="b-items__aside-sell-img">
                                    <!--<h3>SELL YOUR CAR</h3>-->
                                </div>
                            </a>

                        </div>
                    </aside>
                    <div class="b-blog__aside-popular wow zoomInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomInUp;">
                        <header class="s-lineDownLeft">
                            <h2 class="s-titleDet">POPULAR POSTS</h2>
                        </header>
                        <div class="b-blog__aside-popular-posts">
                            <div class="b-blog__aside-popular-posts-one">
                                <img class="img-responsive" src="/media/270x150/Mercedes.jpg" alt="merc">
                                <h4><a href="article.html">2016 Mercedes-Benz GLE-Class Debuts</a></h4>
                                <div class="b-blog__aside-popular-posts-one-date"><img src="/media/car_logo/Mercedes-Benz-logo-2009-1920x1080.png"> Mercedes Benz</div>
                            </div>
                            <div class="b-blog__aside-popular-posts-one">
                                <img class="img-responsive" src="/media/270x150/1528468814_rg6yEoq3FxvAgr_FxUBo_S6gpHXUWR8J.jpg" alt="outlander">
                                <h4><a href="article.html">Refreshed 2016 Mitsubishi Outlander</a></h4>
                                <div class="b-blog__aside-popular-posts-one-date"><img  src="/media/car_logo/Mitsubishi_Motors-logo-77529D8491-seeklogo.com.png"> Mitsubishi</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class='col-sm-12 view_customizer_wrapper_list'>
                        <div class="b-infoBar container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-12" style="padding-right:0px; padding-left:0px;">
                                        <div class="b-infoBar__compare wow zoomInUp" data-wow-delay="0.5s">
                                            <a href="#" class="b-infoBar__compare-item"><span class="fa fa-list-alt"></span>Result: <?php echo sizeof($all_cars) - sizeof($cars) ?> - <?php echo sizeof($cars) ?> From <?php echo sizeof($all_cars) ?> Car(s)</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-xs-12" >
                                        <div class="b-infoBar__select wow zoomInUp" data-wow-delay="0.5s">
                                            <form method="post" action="/">
                                                <div class="b-infoBar__select-one">
                                                    <a href="<?php echo $grid_link ?>" class="m-list <?php echo $grid_active ?>" style='background: #f5f5f5;'><span class="fa fa-table"></span></a>
                                                    <a href="<?php echo $list_link ?>" class="m-table <?php echo $list_active ?>" style='background: #f5f5f5;'><span class="fa fa-list"></span></a>
                                                </div>
                                                <div class="b-infoBar__select-one">
                                                    <span class="b-infoBar__select-one-title">Sort By</span>
                                                    <select name="select1" class="m-select">
                                                        <option value="" selected=""> -- Select -- </option>
                                                        <option value="" > Date : Newest </option>
                                                        <option value="" > Date : Oldest </option>
                                                        <option value="" > Price : Highest </option>
                                                        <option value="" > Price : Lowest </option>
                                                    </select>
                                                    <span class="fa fa-caret-down red_color"></span>
                                                </div>
                                                <div class="b-infoBar__select-one" id="checkBox_for_cars_language_english_div">
                                                    <div class="b-infoBar__compare wow zoomInUp" data-wow-delay="0.5s">
                                                        <label class="label_for_checkbox lable_for_features select_cars_language">
                                                            <input type="checkbox" id="checkBox_for_cars_language_english" name="check_home_search[only_english]" class="checkbox_for_features select_cars_language_all" value="1" checked > <span class="label-text">English</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="b-infoBar__select-one" id="checkBox_for_cars_language_english_all_div" style="display: none;">
                                                    <div class="b-infoBar__compare wow zoomInUp" data-wow-delay="0.5s">
                                                        <label class="label_for_checkbox lable_for_features select_cars_language">
                                                            <input type="checkbox" id="checkBox_for_cars_language_english_all"  name="check_home_search[only_english]" class="checkbox_for_features select_cars_language_only_english" value="1"  > <span class="label-text">English</span>
                                                        </label>
                                                    </div>
                                                </div>


                                                <div class="b-infoBar__select-one">
                                                    <div class="b-infoBar__compare wow zoomInUp" data-wow-delay="0.5s">
                                                        <label class="label_for_checkbox lable_for_features">
                                                            <input type="checkbox" name="check_home_search[premium]" class="checkbox_for_features" value="2" > <span class="label-text">Premium</span>
                                                        </label>
                                                    </div>
                                                </div> 
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--b-infoBar-->
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-lg-10 col-lg-10 col-sm-12 col-xs-12">
                    <div class='col-sm-12 view_customizer_wrapper_list'>
                        <div class="b-infoBar container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7 col-xs-12" >
                                        <div class="b-infoBar__select wow zoomInUp" data-wow-delay="0.5s">
                                            <form method="post" action="/">
                                                <div class="b-infoBar__select-one">
                                                    <a href="<?php echo $grid_link ?>" class="m-list <?php echo $grid_active ?>" style='background: #f5f5f5;'><span class="fa fa-table"></span></a>
                                                    <a href="<?php echo $list_link ?>" class="m-table <?php echo $list_active ?>" style='background: #f5f5f5;'><span class="fa fa-list"></span></a>
                                                </div>
                                                <div class="b-infoBar__select-one">
                                                    <select name="select1" class="m-select">
                                                        <option value="" selected="">10 items</option>
                                                    </select>
                                                    <span class="fa fa-caret-down red_color"></span>
                                                    <span class="b-infoBar__select-one-title">SHOW ON PAGE</span>
                                                </div>
                                                <div class="b-infoBar__select-one">
                                                    <select name="select2" class="m-select ">
                                                        <option value="" selected="">Last Added</option>
                                                    </select>
                                                    <span class="fa fa-caret-down red_color"></span>
                                                    <span class="b-infoBar__select-one-title">SORT BY</span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 col-xs-12" style="padding-right:0px; padding-left:0px;">
                                        <div class="b-infoBar__compare wow zoomInUp" data-wow-delay="0.5s">
                                            <a href="#" class="b-infoBar__compare-item">1 - 30 نتيجة من  57862<span class="fa fa-list-alt"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--b-infoBar-->
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 hidden-sm col-sm-4 col-xs-12" id='cars_arabic_follow_us_div'>
                    <aside class="b-items__aside">
                        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s"><?= yii::t('app', 'Follow Us') ?></h2>

                        <div class="b-footer__content-social left_icons">
                            <a href="#"><span class="fa fa-facebook-square"></span></a>
                            <a href="#"><span class="fa fa-twitter-square"></span></a>
                            <a href="#"><span class="fa fa-instagram"></span></a>
                            <a href="#"><span class="fa fa-youtube-square"></span></a>
                        </div>

                        <div class="hidden-xs b-items__aside-sell wow zoomInUp" data-wow-delay="0.5s">
                            <div class="b-items__aside-sell-img">
                            </div>
                            <div class="b-items__aside-sell-info">
                                <p class='arabic_right'>
                                    لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم
                                </p>
                            </div>
                        </div>
                    </aside>
                </div>
            <?php } ?>




            <?php if ($list == true) { ?>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="b-items__cars">
                        <?php if (sizeof($cars) > 0) { ?>
                            <?php foreach ($cars as $cars_details => $car) { ?>
                                <div class="b-items__cars-one wow zoomInUp" data-wow-delay="0.5s">
                                    <div class="b-items__cars-one-img">
                                        <a href="/cars/<?php echo $car->slug ?>">
                                            <?php
                                            $path = Yii::$app->request->baseUrl . 'media/284x251/' . $car->image;
                                            $type = pathinfo($path, PATHINFO_EXTENSION);
                                            $data = file_get_contents($path);
                                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                            ?>
                                            <img src="<?php echo $base64 ?>" alt='<?php echo $car->name ?>' class='img-responsive'/>
                                        </a>
                                        <?php if ($car->featured == 1) { ?>
                                            <span class="b-items__cars-one-img-type m-premium">PREMIUM</span>
                                        <?php } else if ($car->ad_type == 2) { ?>
                                            <span class="b-items__cars-one-img-type m-listing">HOT OFFER</span>
                                        <?php } else if ($car->date_created >= $today_date_before_7_days_timeStamp) { ?>
                                            <span class="b-items__cars-one-img-type m-leasing">NEW LISTING</span>
                                        <?php } else { ?>

                                        <?php } ?>
                                    </div>
                                    <div class="b-items__cars-one-info">
                                        <form class="b-items__cars-one-info-header s-lineDownLeft">
                                            <?php $select_car_name = Make::find()->where(['id' => $car->make_id])->one(); ?>
                                            <a href="/cars/<?php echo $car->slug ?>"><h2><?php echo $select_car_name['name']; ?></h2></a>
                                            <?php if ($lang_id == 1) { ?>
                                                <div class="pull-right">
                                                    <h4 class="cars_list_price"><?php echo number_format($car->price) . " JOD" ?></h4>
                                                </div>
                                            <?php } else { ?>
                                                <div class="pull-left">
                                                    <h4 class="cars_list_price"><?php echo "دينار" . number_format($car->price) ?></h4>
                                                </div>
                                            <?php } ?>
                                        </form>
                                        <div class="row s-noRightMargin">
                                            <div class="col-md-9 col-xs-12 language_list_details_col_1">
                                                <br />
                                                <div class="m-width row m-smallPadding">
                                                    <div class="col-xs-6">
                                                        <div class="row m-smallPadding">
                                                            <div class="col-xs-6">
                                                                <span class="b-items__cars-one-info-title">Body Style:</span>
                                                                <span class="b-items__cars-one-info-title">Mileage:</span>
                                                                <span class="b-items__cars-one-info-title">Transmission:</span>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <span class="b-items__cars-one-info-value">Sedan</span>
                                                                <span class="b-items__cars-one-info-value">35,000 KM</span>
                                                                <span class="b-items__cars-one-info-value">6-Speed Auto</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="row m-smallPadding">
                                                            <div class="col-xs-4">
                                                                <span class="b-items__cars-one-info-title">Engine:</span>
                                                                <span class="b-items__cars-one-info-title">Color:</span>
                                                                <span class="b-items__cars-one-info-title">Specs:</span>
                                                            </div>
                                                            <div class="col-xs-8">
                                                                <span class="b-items__cars-one-info-value">DOHC 24-valve V-6</span>
                                                                <span class="b-items__cars-one-info-value">White</span>
                                                                <span class="b-items__cars-one-info-value">2-Passenger, 2-Door</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-12">
                                                <div class="b-items__cars-one-info-price">
                                                    <div class="pull-right"> 
                                                        <img src="/images/team/50x50/02.jpg" class="img-circle img-bordered login_avatar">
                                                    </div>
                                                    <a href="/cars/<?php echo $car->slug ?>" class="btn m-btn" style="margin-top:20px;">VIEW DETAILS<span class="fa fa-angle-right"></span></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            No Cars
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
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
                <?php } ?>
            </div>



            <div class='col-sm-12'>
                <div class="b-items__pagination">
                    <div class="b-items__pagination-main wow zoomInUp" data-wow-delay="0.5s" style="border:none;">
<!--                            <a data-toggle="modal" data-target="#myModal" href="#" class="m-left"><span class="fa fa-angle-left"></span></a>
                        <span class="m-active"><a href="#">1</a></span>
                        <span><a href="#">2</a></span>
                        <span><a href="#">3</a></span>
                        <span><a href="#">4</a></span>
                        <a href="#" class="m-right"><span class="fa fa-angle-right"></span></a>    -->
                        <?php
                        echo LinkPager::widget([
                            'pagination' => $pages,
                        ]);
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div><!--b-items-->




    <section class="b-brands s-shadow" style="background: #fff;padding-top:0px;">


        <script>
            $(document).ready(function () {
                $('#myCarousel').carousel({
                    interval: 100
                })
            });
        </script>



        <div class="container">
            <h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;"><?= yii::t('app', 'FIND OUT MORE') ?></h5><br>
            <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;"><?= yii::t('app', 'BRANDS WE OFFER') ?></h2>
            <br /> <br /><br />
            <div class="row">
                <div class="span12">

                    <div id="myCarousel" class="carousel slide">

                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                        </ol>

                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <div class="item active">
                                <div class="row-fluid">
                                    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2"><a href="#x" class=""><img src="/media/brands/bmwLogo.png" alt="brand"></a></div>
                                    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2"><a href="#x" class=""><img src="/media/brands/mercLogo.png" alt="brand"></a></div>
                                    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2"><a href="#x" class=""><img src="/media/brands/audiLogo.png" alt="brand"></a></div>
                                    <div class="hidden-xs col-sm-3 col-md-2 col-lg-2"><a href="#x" class=""><img src="/media/brands/ferrariLogo.png" alt="brand"></a></div>
                                    <div class="hidden-xs hidden-sm col-md-2 col-lg-2"><a href="#x" class=""><img src="/media/brands/honda.png" alt="brand"></a></div>
                                    <div class="hidden-xs hidden-sm col-md-2 col-lg-2"><a href="#x" class=""><img src="/media/brands/peugeot.png" alt="brand"></a></div>
                                </div><!--/row-fluid-->
                            </div><!--/item-->

                            <div class="item">
                                <div class="row-fluid">
                                    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2"><a href="#x" class=""><img src="/media/brands/bmwLogo.png" alt="brand"></a></div>
                                    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2"><a href="#x" class=""><img src="/media/brands/mercLogo.png" alt="brand"></a></div>
                                    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2"><a href="#x" class=""><img src="/media/brands/audiLogo.png" alt="brand"></a></div>
                                    <div class="hidden-xs col-sm-3 col-md-2 col-lg-2"><a href="#x" class=""><img src="/media/brands/ferrariLogo.png" alt="brand"></a></div>
                                    <div class="hidden-xs hidden-sm col-md-2 col-lg-2"><a href="#x" class=""><img src="/media/brands/honda.png" alt="brand"></a></div>
                                    <div class="hidden-xs hidden-sm col-md-2 col-lg-2"><a href="#x" class=""><img src="/media/brands/peugeot.png" alt="brand"></a></div>
                                </div><!--/row-fluid-->
                            </div><!--/item-->


                        </div><!--/carousel-inner-->

                        <a class="left carousel-control make-bottom-carousel-left" href="#myCarousel" data-slide="prev">‹</a>
                        <a class="right carousel-control make-bottom-carousel-right" href="#myCarousel" data-slide="next">›</a>
                    </div><!--/myCarousel-->

                </div>
            </div>
        </div>
    </section>

    <script>

        function myFunction() {
            swal({
                title: "Are you sure?",
                text: "Your will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
                    function () {
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    });
        }

    </script>



    <div id="modalReport" class="modal fade" role="dialog" >
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                    <center><h4 class="modal-title"><i class="fa fa-flag report_icon_modal_title"></i> Report Ad</h4></center>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!--                       <div class="col-md-6">
                                                    <img id="report_modal_image" src="" class="img-responsive">
                                                </div>-->
                        <div class="col-md-12 product_content">
                            <b>Please select one of the following reasons:</b>
                            <br /><br />
                            <div class="col-md-12 no_padding">
                                <div class="form_check_for_report_modal">
                                    <label class="label_for_checkbox lable_for_report_topics label_for_report_modal">
                                        <input type="radio" name="check[car_features_5]" class="checkbox_for_features" value="5">
                                        <span class="label-text">Indecent Ad </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 no_padding">
                                <div class="form_check_for_report_modal">
                                    <label class="label_for_checkbox lable_for_report_topics label_for_report_modal">
                                        <input type="radio" name="check[car_features_5]" class="checkbox_for_features" value="5">
                                        <span class="label-text">Indecent Image(s) </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 no_padding">
                                <div class="form_check_for_report_modal">
                                    <label class="label_for_checkbox lable_for_report_topics label_for_report_modal">
                                        <input type="radio" name="check[car_features_5]" class="checkbox_for_features" value="5">
                                        <span class="label-text">Technical </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 no_padding">
                                <div class="form_check_for_report_modal">
                                    <label class="label_for_checkbox lable_for_report_topics label_for_report_modal">
                                        <input type="radio" name="check[car_features_5]" class="checkbox_for_features" value="5">
                                        <span class="label-text">Other </span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <!-- start col -->
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <br />
                                    <input type="text" placeholder="Write your message here!" class="form-control report_ad_modal_message_field">
                                </div>
                                <!-- end col -->

                            </div>
                            <div class="space-ten"></div>
                            <div class="btn-ground">
                                <br />
                                <a href="javascript:void(0)" class="button register_button submit_final_car_add" role="button"><span class="glyphicon glyphicon-flag"></span> Save Report</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <div id='cars_page_show_compare_car_div' style='display: none;'>
        <div class='modal-content'>
            <div class='modal-header compare_box_header'>
                <i class='fa fa-times pull-right' id='close_compare_cars_div'></i>
                <h4 class='modal-title'>
                    <strong>Compare Vehicles</strong>
                </h4>
            </div>
            <!-- / modal-header -->
            <div class='modal-body'>
                <div class='row'>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 compare_big_div'>
                        <div class='col-xs-6 col-sm-6 col-md-4 col-lg-4'>
                            <img class="img-responsive" id="compare_image_1" src="http://placehold.it/600x350&text=MODAL" />
                        </div>
                        <div class='col-xs-6 col-sm-6 col-md-8 col-lg-8 no_padding'>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding'><ul class="list-inline mrg-0 btm-mrg-10 clr-535353 top-padding-10">
                                    <li class="compare_li_text">
                                    <center>
                                        <i class='fa fa-circle-o text-danger'></i> 
                                        <p id="compare_make_1">Ford</p>
                                        <input type="hidden" id="compare_slug_1" value="none">
                                    </center>
                                    </li>

                                    <li class="compare_li_sep" style="list-style: none">|</li>

                                    <li class="compare_li_text">
                                    <center>
                                        <i class='fa fa-car text-info'></i> 
                                        <p id="compare_model_1">Fusion</p>
                                    </center>
                                    </li>

                                    <li class="compare_li_sep" style="list-style: none">|</li>

                                    <li class="compare_li_text">
                                    <center>
                                        <i class='fa fa-calendar text-success'></i> 
                                        <p id="compare_year_1">2017</p>
                                    </center>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 compare_big_div'>
                        <div class='col-xs-6 col-sm-6 col-md-4 col-lg-4'>
                            <img class="img-responsive" id="compare_image_2" src="http://placehold.it/600x350&text=MODAL" />
                        </div>
                        <div class='col-xs-6 col-sm-6 col-md-8 col-lg-8 no_padding'>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding'><ul class="list-inline mrg-0 btm-mrg-10 clr-535353 top-padding-10">
                                    <li class="compare_li_text">
                                    <center>
                                        <i class='fa fa-circle-o text-danger'></i> 
                                        <p id="compare_make_2">Ford</p>
                                        <input type="hidden" id="compare_slug_2" value="none">
                                    </center>
                                    </li>

                                    <li class="compare_li_sep" style="list-style: none">|</li>

                                    <li class="compare_li_text">
                                    <center>
                                        <i class='fa fa-car text-info'></i> 
                                        <p id="compare_model_2">Fusion</p>
                                    </center>
                                    </li>

                                    <li class="compare_li_sep" style="list-style: none">|</li>

                                    <li class="compare_li_text">
                                    <center>
                                        <i class='fa fa-calendar text-success'></i> 
                                        <p id="compare_year_2">2017</p>
                                    </center>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 compare_big_div'>
                        <div class='col-xs-6 col-sm-6 col-md-4 col-lg-4'>
                            <img class="img-responsive" id="compare_image_3" src="http://placehold.it/600x350&text=MODAL" />
                        </div>
                        <div class='col-xs-6 col-sm-6 col-md-8 col-lg-8 no_padding'>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding'><ul class="list-inline mrg-0 btm-mrg-10 clr-535353 top-padding-10">
                                    <li class="compare_li_text">
                                    <center>
                                        <i class='fa fa-circle-o text-danger'></i> 
                                        <p id="compare_make_3">Ford</p>
                                        <input type="hidden" id="compare_slug_3" value="none">
                                    </center>
                                    </li>

                                    <li class="compare_li_sep" style="list-style: none">|</li>

                                    <li class="compare_li_text">
                                    <center>
                                        <i class='fa fa-car text-info'></i> 
                                        <p id="compare_model_3">Fusion</p>
                                    </center>
                                    </li>

                                    <li class="compare_li_sep" style="list-style: none">|</li>

                                    <li class="compare_li_text">
                                    <center>
                                        <i class='fa fa-calendar text-success'></i> 
                                        <p id="compare_year_3">2017</p>
                                    </center>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / modal-body -->
            <div class='modal-footer'>
                <div class='row'>
                    <div class='col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3'>
                        <center>
                            <div class='sell_your_car_modal_button' id="start_comparing_btn">Start Comparing</div>
                        </center>
                    </div>
                </div>
                <!--/ checkbox -->
            </div>
            <!--/ modal-footer -->
        </div>

    </div>