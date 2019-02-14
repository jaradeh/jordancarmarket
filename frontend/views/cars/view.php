<?php
//die(var_dump($model));
$i = 0;
$session = Yii::$app->session;
$lang_id = $session['language_id'];

//die(var_dump($car_make));
//die($car_make['make_name']);
//die(Yii::setAlias('@anyname', realpath(dirname(__FILE__).'/../../')));
use backend\models\Make;
use yii\bootstrap\ActiveForm;
use common\models\LoginForm;

//die(var_dump($car_make));
$login_modal = new LoginForm();
?>

<section class="b-detail s-shadow">
    <div class="container">
        <header class="b-detail__head s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
            <div class="row">
                <div class="col-sm-9 col-xs-12">
                    <div class="b-detail__head-title">
                        <h1 style="color: #000;text-transform: capitalize;"><?php echo $car_make['make_name'] . " " . $car_make['model_name'] . " " . $car_make['years_name']; ?></h1>
                        <h3 class="arabic_car_view_title" style="text-transform: capitalize;"><?php echo $car_make['exterior_color_name'] . " " . $car_make['make_name'] . " " . $car_make['model_name']; ?></h3>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="b-detail__head-price">
                        <div class="b-detail__head-price-num view_price_div_custom"><?php echo number_format($model->price) . " JOD" ?> </div>
                        <p>Included Taxes &amp; Checkup</p>
                    </div>
                </div>
            </div>
        </header>
        <div class="b-detail__main">
            <div class="row">
                <div class="col-md-12">
                    <div class="details-nav">
                        <ul>
                            <?php if (Yii::$app->user->isGuest) { ?>
                                <li>
                                    <a data-toggle="modal" data-target="#modalLogin" data-whatever="@mdo" href="#" class="css_btn">
                                        <i class="fa fa-heart "></i>Add To Favorites
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="#" id="addtoFavPopupbtn">
                                        <i class="fa fa-heart "></i>Add To Favorites
                                    </a>
                                </li>
                            <?php } ?>
                            <li>
                                <a data-toggle="modal" data-target="#shareSocialMediaPopup" data-whatever="@mdo" href="#" class="css_btn">
                                    <i class="fa fa-facebook-official"></i>Share it with your friends
                                </a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#emailToFriendsPopup" data-whatever="@mdo" href="#" class="css_btn">
                                    <i class="fa fa-envelope"></i>Email it to friends
                                </a>                               
                            </li>
                            <?php if ($model->location == 2) { ?>
                                <li>
                                    <a data-toggle="modal" data-target="#testDrivePopup" data-whatever="@mdo" href="#" class="css_btn">
                                        <i class="fa fa-calendar"></i>Schedule Test Drive
                                    </a>
                                </li>
                            <?php } ?>
                            <li><a href="javascript:window.print()"><i class="fa fa-print"></i>Print this page</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="b-detail__main-info">
                        <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
                            <div class="row m-smallPadding">
                                <div class="col-xs-10">
                                    <ul class="b-detail__main-info-images-big bxslider enable-bx-slider" data-pager-custom="#bx-pager" data-mode="horizontal" data-pager-slide="true" data-mode-pager="vertical" data-pager-qty="5">
                                        <li class="s-relative"> 
                                            <div data-toggle="modal" data-target="#imagesModal" class="image_overFlow_div">
                                                <i class="glyphicon glyphicon-zoom-in image_overFlow_icon"></i>
                                            </div>
                                            <?php
                                            $path_2 = Yii::$app->request->baseUrl . 'media/620x485/' . $model->image;
                                            $type_2 = pathinfo($path_2, PATHINFO_EXTENSION);
                                            $data_2 = file_get_contents($path_2);
                                            $base64_2 = 'data:image/' . $type_2 . ';base64,' . base64_encode($data_2);
                                            ?>
                                            <img class="img-responsive center-block" src="<?php echo $base64_2 ?>" alt="<?php echo $model->name ?>"/>

                                        </li>
                                        <?php foreach ($get_car_images as $car_images => $images) { ?>
                                            <?php
                                            $path_1 = Yii::$app->request->baseUrl . 'media/620x485/' . $images->images;
                                            $type_1 = pathinfo($path_1, PATHINFO_EXTENSION);
                                            $data_1 = file_get_contents($path_1);
                                            $base64_1 = 'data:image/' . $type_1 . ';base64,' . base64_encode($data_1);
                                            ?>
                                            <li class="s-relative">  
                                                <div data-toggle="modal" data-target="#imagesModal" class="image_overFlow_div">
                                                    <i class="glyphicon glyphicon-zoom-in image_overFlow_icon"></i>
                                                </div>
                                                <img class="img-responsive center-block" src="<?php echo $base64_1 ?>" alt="<?php echo $model->name ?>"/>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                                <div class="col-xs-2 pagerSlider pagerVertical">
                                    <div class="b-detail__main-info-images-small" id="bx-pager">
                                        <a href="#" data-slide-index="0" class="b-detail__main-info-images-small-one">
                                            <img class="img-responsive" src="/media/115x85/<?php echo $model->image ?>" alt="<?php echo $model->name ?>" />
                                        </a>
                                        <?php foreach ($get_car_images_small as $car_img => $img) { ?>
                                            <?php
                                            $path = Yii::$app->request->baseUrl . 'media/115x85/' . $img->images;
                                            $type = pathinfo($path, PATHINFO_EXTENSION);
                                            $data = file_get_contents($path);
                                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                            ?>
                                            <?php $i++; ?>
                                            <a href="#" data-slide-index="<?php echo $i ?>" class="b-detail__main-info-images-small-one">
                                                <img class="img-responsive" src="<?php echo $base64; ?>" alt="<?php echo $model->name ?>" />
                                            </a>
                                        <?php } ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <aside class="b-detail__main-aside">
                        <div class="b-detail__main-aside-desc wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;margin-bottom:0px;">
                            <h2 class="s-titleDet">Description</h2>
                            <div class="row view_car_side_menu_row">
                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding'>
                                    <div class="col-xs-6">
                                        <h4 class="b-detail__main-aside-desc-title">Make</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="b-detail__main-aside-desc-value">
                                            <?php echo $car_make['make_name']; ?>
                                            <img src="/media/car_logo/<?php echo $car_make['make_path'] ?>" class="view_page_car_make_logo">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row view_car_side_menu_row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Model</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $car_make['model_name']; ?></p>
                                </div>
                            </div>
                            <div class="row view_car_side_menu_row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Year</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $car_make['years_name']; ?></p>
                                </div>
                            </div>
                            <div class="row view_car_side_menu_row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Milage</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $car_make['milage_name'] . " KM"; ?></p>
                                </div>
                            </div>
                            <div class="row view_car_side_menu_row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Condition</h4>
                                </div>
                                <div class="col-xs-6">
                                    <?php if ($model->condition_id == 1) { ?>
                                        <p class="b-detail__main-aside-desc-value">New</p>
                                    <?php } else if ($model->condition_id == 2) { ?>
                                        <p class="b-detail__main-aside-desc-value">Used</p>
                                    <?php } else { ?>
                                        <p class="b-detail__main-aside-desc-value">Certified Pre-Owned</p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row view_car_side_menu_row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Exterior Color</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $car_make['exterior_color_name']; ?></p>
                                </div>
                            </div>
                            <div class="row view_car_side_menu_row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Interior Color</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><?php echo $car_make['exterior_color_name']; ?></p>
                                </div>
                            </div>
                            <div class="row view_car_side_menu_row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Drivetrain</h4>
                                </div>
                                <div class="col-xs-6">
                                    <?php if ($model->drivetrain == 1) { ?>
                                        <p class="b-detail__main-aside-desc-value">FWD</p>
                                    <?php } else if ($model->drivetrain == 2) { ?>
                                        <p class="b-detail__main-aside-desc-value">RWD</p>
                                    <?php } else { ?>
                                        <p class="b-detail__main-aside-desc-value">4x4</p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row view_car_side_menu_row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Location</h4>
                                </div>
                                <div class="col-xs-6">
                                    <?php if ($model->location == 1) { ?>
                                        <p class="b-detail__main-aside-desc-value">Amman Showroom</p>
                                    <?php } else if ($model->location == 2) { ?>
                                        <p class="b-detail__main-aside-desc-value">Dealership</p>
                                    <?php } else { ?>
                                        <p class="b-detail__main-aside-desc-value">Free zone (Al Zarqa'a)</p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row view_car_side_menu_row">
                                <div class="col-xs-6">
                                    <h4 class="b-detail__main-aside-desc-title">Inspection</h4>
                                </div>
                                <div class="col-xs-6">
                                    <p class="b-detail__main-aside-desc-value"><a href='#' data-toggle="modal" data-target="#modalInspection">View</a></p>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                    <div class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
                        <div class="b-detail__main-info-extra wow zoomInUp" data-wow-delay="0.5s">
                            <h2 class="s-titleDet">EXTRA FEATURES</h2>
                            <div class="row">
                                <?php foreach ($select_car_features_category as $car_features_category => $feature_by_catid) { ?>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                                        <ul>
                                            <li><span class="fa fa-check"></span><?php echo $feature_by_catid['name'] ?></li>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
                        <aside class="b-detail__main-aside">

                            <div class="b-detail__main-aside-about wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                                <h2 class="s-titleDet">INQUIRE ABOUT THIS VEHICLE</h2>
                                <div class="b-detail__main-aside-about-form">
                                    <form id="form1" action="/" method="post">
                                        <input type="text" placeholder="YOUR NAME" value="" name="name">
                                        <input type="email" placeholder="EMAIL ADDRESS" value="" name="email">
                                        <input type="tel" placeholder="PHONE NO." value="" name="name">
                                        <textarea name="text" placeholder="message"></textarea>
                                        <div><input type="checkbox" name="one" value=""><label>Send me a copy of this message</label></div>
                                        <div><input type="checkbox" name="two" value=""><label>Send me a copy of this message</label></div>
                                        <button type="submit" class="btn m-btn">SEND MESSAGE<span class="fa fa-angle-right"></span></button>
                                    </form>
                                </div>
                            </div>

                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--b-detail-->
<section class="b-related m-home">
    <div class="container">
        <h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">FIND OUT MORE</h5><br />
        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">RELATED VEHICLES ON SALE</h2>
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <div class="b-auto__main-item wow zoomInLeft" data-wow-delay="0.5s">
                    <img class="img-responsive center-block"  src="/media/270x150/LandRover.jpg" alt="LandRover" />
                    <div class="b-world__item-val">
                        <span class="b-world__item-val-title">REGISTERED <span>2014</span></span>
                    </div>
                    <h2><a href="detail.html">Land Rover Range Rover</a></h2>
                    <div class="b-auto__main-item-info s-lineDownLeft">
                        <span class="m-price">
                            $44,380
                        </span>
                        <span class="m-number">
                            <span class="fa fa-tachometer"></span>35,000 KM
                        </span>
                    </div>
                    <div class="b-featured__item-links m-auto">
                        <a href="#">Used</a>
                        <a href="#">2014</a>
                        <a href="#">Manual</a>
                        <a href="#">Orange</a>
                        <a href="#">Petrol</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="b-auto__main-item wow zoomInLeft" data-wow-delay="0.5s">
                    <img class="img-responsive center-block"  src="/media/270x150/nissanGT.jpg" alt="nissan" />
                    <div class="b-world__item-val">
                        <span class="b-world__item-val-title">REGISTERED <span>2014</span></span>
                    </div>
                    <h2><a href="detail.html">Nissan GT-R NISMO</a></h2>
                    <div class="b-auto__main-item-info s-lineDownLeft">
                        <span class="m-price">
                            $10,857
                        </span>
                        <span class="m-number">
                            <span class="fa fa-tachometer"></span>35,000 KM
                        </span>
                    </div>
                    <div class="b-featured__item-links m-auto">
                        <a href="#">Used</a>
                        <a href="#">2014</a>
                        <a href="#">Manual</a>
                        <a href="#">Orange</a>
                        <a href="#">Petrol</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="b-auto__main-item wow zoomInRight" data-wow-delay="0.5s">
                    <img class="img-responsive center-block"  src="/media/270x150/bmw.jpg" alt="bmw" />
                    <div class="b-world__item-val">
                        <span class="b-world__item-val-title">REGISTERED <span>2014</span></span>
                    </div>
                    <h2><a href="detail.html">BMW 650i Coupe</a></h2>
                    <div class="b-auto__main-item-info s-lineDownLeft">
                        <span class="m-price">
                            $95,900
                        </span>
                        <span class="m-number">
                            <span class="fa fa-tachometer"></span>12,000 KM
                        </span>
                    </div>
                    <div class="b-featured__item-links m-auto">
                        <a href="#">Used</a>
                        <a href="#">2014</a>
                        <a href="#">Manual</a>
                        <a href="#">Orange</a>
                        <a href="#">Petrol</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="b-auto__main-item wow zoomInRight" data-wow-delay="0.5s">
                    <img class="img-responsive center-block"  src="/media/270x150/camaro.jpg" alt="camaro" />
                    <div class="b-world__item-val">
                        <span class="b-world__item-val-title">REGISTERED <span>2014</span></span>
                    </div>
                    <h2><a href="detail.html">Chevrolet Corvette Z06</a></h2>
                    <div class="b-auto__main-item-info s-lineDownLeft">
                        <span class="m-price">
                            $95,900
                        </span>
                        <span class="m-number">
                            <span class="fa fa-tachometer"></span>12,000 KM
                        </span>
                    </div>
                    <div class="b-featured__item-links m-auto">
                        <a href="#">Used</a>
                        <a href="#">2014</a>
                        <a href="#">Manual</a>
                        <a href="#">Orange</a>
                        <a href="#">Petrol</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--"b-related-->

<section class="b-brands s-shadow">
    <div class="container">
        <h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">FIND OUT MORE</h5><br />
        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">BRANDS WE OFFER</h2>
        <div class="">
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="/media/brands/bmwLogo.png" alt="brand" />
            </div>
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="/media/brands/ferrariLogo.png" alt="brand" />
            </div>
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="/media/brands/volvo.png" alt="brand" />
            </div>
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="/media/brands/mercLogo.png" alt="brand" />
            </div>
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="/media/brands/audiLogo.png" alt="brand" />
            </div>
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="/media/brands/honda.png" alt="brand" />
            </div>
            <div class="b-brands__brand wow rotateIn" data-wow-delay="0.5s">
                <img src="/media/brands/peugeot.png" alt="brand" />
            </div>
        </div>
    </div>
</section><!--b-brands-->


























<div class="modal fade" id="addtoFavPopup" tabindex="-1" role="dialog" aria-labelledby="addtoFavPopupLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addtoFavPopupLabel">Request More Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="sub-title">Please fill out the information below and the filled information will be sent directly to the can owner. </p>
                <form class="gray-form reset_css" id="rmi_form" action="post">
                    <input type="hidden" name="action" value="request_more_info">
                    <div class="alrt">
                        <span class="alrt"></span>
                    </div>
                    <div class="form-group">
                        <label>Name*</label>
                        <input type="text" class="form-control" name="rmi_name" id="rmi_name">
                    </div>
                    <div class="form-group">
                        <label>Email address*</label>
                        <input type="text" class="form-control" name="rmi_email" id="rmi_email">
                    </div>
                    <div class="form-group">
                        <label>Phone*</label>
                        <input type="text" class="form-control" id="rmi_phone" name="rmi_phone">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" name="rmi_message" id="rmi_message"></textarea>                            
                    </div>
                    <div class="form-group">
                        <label>Preferred Contact*</label>
                        <div class="radio">
                            <label><input type="radio" name="rmi_radio" value="Email" checked="checked">Email</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="rmi_radio" value="Phone">Phone</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="recaptcha1">
                            <div style="width: 304px; height: 78px;">
                                <div>
                                    <iframe src="https://www.google.com/recaptcha/api2/anchor?ar=2&amp;k=6LfYqRkUAAAAABMrLp0FdD0G3j8MwP8kBbwMJMHi&amp;co=aHR0cDovL3RoZW1lcy5wb3RlbnphZ2xvYmFsc29sdXRpb25zLmNvbTo4MA..&amp;hl=en&amp;v=v1525674693836&amp;theme=light&amp;size=normal&amp;cb=hs70scj1u49w" width="304" height="78" role="presentation" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe>
                                </div>
                                <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a class="button red" id="request_more_info_submit">Submit</a>
                        <i class="fa fa-refresh fa-spin fa-3x fa-fw load_spiner" style="display: none;"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<input type="hidden" value="<?php echo $user->phone ?>" id="hidden_phone">

<div class="modal fade" id="testDrivePopup" tabindex="-1" role="dialog" aria-labelledby="testDrivePopupLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="testDrivePopupLabel">Schedule Test Drive</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div id="std_message"></div>
            <div class="modal-body">
                <p class="sub-title">Complete this form to request a test drive of your favorite car. Our Sales Advisor will contact you promptly to confirm your appointment. </p>
                <form class="gray-form reset_css" id="std_form" action="post">
                    <input type="hidden" name="action" value="schedule_test_drive">
                    <div class="form-group">
                        <label>Name*</label>
                        <input type="text" class="form-control" id="std_firstname" name="std_firstname">
                    </div>
                    <div class="form-group">
                        <label>Email address*</label>
                        <input type="text" class="form-control" id="std_email" name="std_email">
                    </div>
                    <div class="form-group">
                        <label>Phone*</label>
                        <input type="text" class="form-control" id="std_phone" name="std_phone">
                    </div>
                    <div class="form-group">
                        <label>Preferred Day*</label>
                        <input type="date" class="form-control" id="std_day" name="std_day">
                    </div>
                    <div class="form-group">
                        <label>Preferred Time*</label>
                        <input type="time" class="form-control" id="std_time" name="std_time">
                    </div>
                    <div class="form-group">
                        <label>Preferred Contact*</label>
                        <div class="radio">
                            <label><input type="radio" id="std_optradio" name="std_optradio" value="email" checked="">Email</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" id="std_optradio" name="std_optradio" value="phone">Phone</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <a class="button red" id="schedule_test_drive_submit">Schedule Now</a>
                        <i class="fa fa-refresh fa-spin fa-3x fa-fw load_spiner" style="display: none;"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="shareSocialMediaPopup" tabindex="-1" role="dialog" aria-labelledby="shareSocialMediaPopupLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="shareSocialMediaPopupLabel">Share it with friends</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div id="mao_message"></div>
            <div class="modal-body" style="height: 120px;">
                <div class="col-sm-12">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <center><a href="#"><span class="fa fa-facebook-square view_page_share_social_media_icons"></span></a></center>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <center><a href="#"><span class="fa fa-twitter-square view_page_share_social_media_icons"></span></a></center>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <center><a href="#"><span class="fa fa-instagram view_page_share_social_media_icons"></span></a></center>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <center><a href="#"><span class="fa fa-youtube-square view_page_share_social_media_icons"></span></a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="emailToFriendsPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Email to a Friend</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div id="etf_message"></div>
            <div class="modal-body">
                <form class="gray-form reset_css" action="post" id="etf_form">
                    <input type="hidden" name="action" value="email_to_friend">
                    <div>
                        <span style="color: red;" class="sp"></span>
                    </div>
                    <div class="form-group">
                        <label>Name*</label>
                        <input name="etf_name" type="text" id="etf_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email address*</label>
                        <input type="text" class="form-control" id="etf_email" name="etf_email">
                    </div>
                    <div class="form-group">
                        <label>Friends Email*</label>
                        <input type="Email" class="form-control" id="etf_fmail" name="etf_fmail">
                    </div>
                    <div class="form-group">
                        <label>Message to friend*</label>
                        <textarea class="form-control input-message" id="etf_fmessage" name="etf_fmessage" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <a class="button red" id="email_to_friend_submit">Submit</a>
                        <i class="fa fa-refresh fa-spin fa-3x fa-fw load_spiner" style="display: none;"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modalReport" class="modal fade" role="dialog">
    <div class="modal-dialog">
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

<div id="modalInspection" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <center><h4 class="modal-title"><i class="fa fa-paperclip red_color"></i> Car Inspection</h4></center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 product_content">
                        <?php if ($lang_id == 1) { ?>
                            <img src="/media/inspection/english_dark/<?php echo $model->inspection ?>" class="img-responsive" />                                                                                                                                                                                                                                                                                                     
                        <?php } else { ?>
                            <img src="/media/inspection/arabic_dark/<?php echo $model->inspection ?>" class="img-responsive" />
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalImages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Email to a Friend</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div id="etf_message"></div>
            <div class="modal-body">
                <form class="gray-form reset_css" action="post" id="etf_form">
                    <input type="hidden" name="action" value="email_to_friend">
                    <div>
                        <span style="color: red;" class="sp"></span>
                    </div>
                    <div class="form-group">
                        <label>Name*</label>
                        <input name="etf_name" type="text" id="etf_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email address*</label>
                        <input type="text" class="form-control" id="etf_email" name="etf_email">
                    </div>
                    <div class="form-group">
                        <label>Friends Email*</label>
                        <input type="Email" class="form-control" id="etf_fmail" name="etf_fmail">
                    </div>
                    <div class="form-group">
                        <label>Message to friend*</label>
                        <textarea class="form-control input-message" id="etf_fmessage" name="etf_fmessage" rows="4"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg modal-images " id="imagesModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 90% !important;">
        <div class="modal-content modal-content-images">
            <div class="row">
                <div class="col-sm-8">
                    <div id="thumbCarousel" class="carousel slide">
                        <!-- Carousel items -->
                        <div class="carousel-inner thumb-inner">
                            <div class="active item">
                                <div class="col-xs-12 slide1 slider-div">
                                    <center>
                                        <img class="img-responsive" src="/media/620x485/<?php echo $model->image ?>" alt="<?php echo $model->name ?>">
                                    </center>
                                </div>
                            </div><!--/item-->
                            <?php foreach ($get_car_images as $car_images => $images) { ?>
                                <div class="item">
                                    <div class="col-xs-12 fade1 slider-div">
                                        <center>
                                            <img class="img-responsive" src="/media/620x485/<?php echo $images->images ?>" alt="<?php echo $model->name ?>">
                                        </center>
                                    </div>
                                </div><!--/item-->
                            <?php } ?>
                        </div><!--/carousel-inner-->

                        <a class="right carousel-control modal-images-right-carousel" data-href="#thumbCarousel" data-target="#thumbCarousel" data-toggle="carousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                        <a class="left carousel-control modal-images-left-carousel" data-href="#thumbCarousel" data-target="#thumbCarousel" data-toggle="carousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <ul class="nav nav-justified nav-carousel">
                            <li style="width:50px;" data-target="#thumbCarousel" data-slide-to="0" class="carousel-border active"><a style="padding:0px;margin:0px;" data-href="#"><img src="/media/115x85/<?php echo $model->image ?>" class="modal-images-img" ></a></li>
                            <?php $image_counter = 1; ?>
                            <?php foreach ($get_car_images as $car_images => $images) { ?>
                                <li style="width:50px;" data-target="#thumbCarousel" data-slide-to="<?php echo $image_counter; ?>" class="carousel-border"><a style="padding:0px;margin:0px;" data-href="#"><img src="/media/115x85/<?php echo $images->images ?>" class="modal-images-img" ></a></li>
                                <?php $image_counter++; ?>
                            <?php } ?>
                        </ul>
                    </div><!--/myCarousel-->
                </div>
                <div class="col-sm-4">
                    <div class="b-detail__head-title">
                        <h3 style="color: #000;"><?php echo $model->name ?></h3>
                        <h5 class="arabic_car_view_title"><?php echo $model->title ?></h5>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <center>
                                <div class="" style="padding:0px;">
                                    <div class="b-detail__head-price-num view_price_div_custom" style="background:transparent;"><i class="fa fa-tag" style="margin-right:20px;font-size: 20px;"></i> <?php echo number_format($model->price) . " JOD" ?> </div>
                                </div>
                            </center>
                            <hr />
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-4 no_padding">
                                <center>
                                    <img src="/images/team/50x50/02.jpg" class="img-circle img-responsive " />
                                </center>
                            </div>
                            <div class="col-sm-8 no_padding">
                                <p><i class="fa fa-circle-o"></i> <a href="#"><?php echo $user->first_name . " " . $user->last_name ?></a></p>
                                <p><i class="fa fa-shield"></i> Verified <i class="fa fa-globe text-info" style="margin-left: 10px;margin-right:5px;"></i> <i class="fa fa-phone text-success"></i></p>
                                <p><i class="fa fa-calendar"></i> Member since <b><?php echo date('Y-m-d', $user->created_at) ?></b></p>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <br />
                            <div class="well" style="padding:0px;">
                                <div class="b-detail__head-price-num view_price_div_custom" style="background:transparent;font-size: 20px;"><i class="fa fa-phone" style="margin-right:20px;font-size: 20px;"></i> <span style="color:#337ab7;"><?php echo substr($user->phone, 0, -4) . "XXXX" ?></span> <i class="fa fa-eye pull-right"></i></div>
                            </div>
                            <hr />
                            <center>
                                <p style="font-size: 12px;color:#555;">
                                    For security reason, please do not give any payment details via website or email as Jordan Car Market is not responsible of any fraud.
                                </p>
                            </center>
                            <br />
                        </div>
                        <div class="col-sm-12">
                            <center>
                                <b>Share it with friends</b>
                                <div class="view_social_media_container">
                                    <a href="#"><span class="fa fa-facebook-square view_page_share_social_media_icons"></span></a>
                                    <a href="#"><span class="fa fa-twitter-square view_page_share_social_media_icons"></span></a>
                                    <a href="#"><span class="fa fa-instagram view_page_share_social_media_icons"></span></a>
                                    <a href="#"><span class="fa fa-youtube-square view_page_share_social_media_icons"></span></a>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modalLogin" class="modal fade product_view in" role="dialog">
    <div class=" modal-dialog modal-side " role="document">
        <div class="modal-content model_content_modal_login">
            <div class="modal-header-login">
                <center>
                    <p class='login_modal_header_p'>
                        <span>Login using your Jordan Car Market account</span>
                        <span>
                            <a href="javascript:void(0)" data-dismiss="modal" class="pull-right">
                                <i class='fa fa-times modal_login_dismiss_icon'></i>
                            </a>
                        </span>
                    </p>

                </center>
            </div>
            <div class="modal-body m-login-body">
                <div class='row'>
                    <div class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>
                        <div class="col-sm-12 no_padding">
                            <span class='fa fa-facebook-square modal_login_facebook_icon'></span>
                            <a href="#" class="modal_login_social_media_facebook modal_login_social_media_buttons" style='width:100%'>
                                <span class="modal_login_social_media_span_facebook">Connect with Facebook</span> 
                            </a>
                        </div>
                        <div class="col-sm-12 no_padding">
                            <span class='fa fa-twitter-square modal_login_twitter_icon'></span>
                            <a href="#" class="modal_login_social_media_twitter modal_login_social_media_buttons" style='width:100%'>
                                <span class="modal_login_social_media_span_twitter">Login using Twitter</span>
                            </a>
                        </div>
                        <div class="col-sm-12 no_padding">
                            <span class='fa fa-google-plus-square modal_login_google_icon'></span>
                            <a href="#" class="modal_login_social_media_google modal_login_social_media_buttons" style='width:100%'>
                                <span class="modal_login_social_media_span_google">Login Using Google+</span>
                            </a>
                        </div>
                        <div class="col-sm-12 no_padding">
                            <p class='modal_login_social_media_p'>
                                <span class="modal_login_social_media_p">It's Safe! We will never post anything without your permission</span>
                            </p>
                        </div>
                    </div>

                    <div class='hidden-xs hidden-sm col-md-1 col-lg-1'>
                        <div class="modal_login_middle_div">
                            <span class="modal_login_middle_div_span">OR</span>
                        </div>
                    </div>

                    <div class='col-xs-12 col-sm-12 col-md-7 col-lg-7'>

                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($login_modal, 'username')->textInput(['class' => 'login_input modal_login_input_text', 'placeholder' => ' Username '])->label(false) ?>

                        <?= $form->field($login_modal, 'password')->passwordInput(['class' => 'login_input modal_login_input_text', 'placeholder' => ' Password '])->label(false) ?>

                        <div class="form-group">
                            <div class="remember-checkbox mb-30">
                                <input type="checkbox" name="one" id="one">
                                <label for="one" class=""> Remember me</label>
                                <a href="/request-password-reset" class="pull-right red_color">Forgot Password?</a>
                            </div>
                        </div>
                        <center>
                            <a href="javascript:void(0)" class="sell_your_car_modal_button" role='button' style='margin-bottom:5px;'>Login <i class="fa fa-sign-in"></i></a>
                        </center>
                        <?php ActiveForm::end(); ?>

                        <div class="login-social text-center">
                            <div class="text_with_borders_on_sides"><span>Not a member yet?</span></div>
                            <center><a href="javascript:void(0)" class="sell_your_car_modal_no_button"  style='margin-bottom:5px;margin-top:7px;'>Create Account</a></center>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#addtoFavPopupbtn').click(function () {
        swal({
            title: "Successfully",
            text: "added the lisitng to favorites!",
            type: "success",
            showInfoButton: false,
        });
    });

</script>