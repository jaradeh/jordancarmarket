<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap\ActiveForm;
use common\models\LoginForm;
use backend\models\Cars;

$getLatestCarsForFooter = Cars::find()->where(['featured' => 2])->andWhere(['status' => 3])->limit(3)->orderBy(['id' => SORT_DESC])->all();
$getFeaturedCarsForFooter = Cars::find()->where(['featured' => 1])->andWhere(['status' => 3])->limit(3)->orderBy(['id' => SORT_DESC])->all();
$getHotCarsForFooter = Cars::find()->where(['ad_type' => 2])->andWhere(['status' => 3])->limit(3)->orderBy(['id' => SORT_DESC])->all();

if (sizeof($getFeaturedCarsForFooter) < 3) {
    $getFeaturedCarsForFooter = array_merge($getFeaturedCarsForFooter, $getHotCarsForFooter);
}


$login_modal = new LoginForm();
$model = new LoginForm();

$session = Yii::$app->session;
$lang_id = $session['language_id'];
$lang = $session['language'];
$cookieAgreement = $session['cookieAgreement'];
$firstOpenModal = $session['firstOpenModal'];
$current_action = $this->context->action->id;


$random_key = Yii::$app->security->generateRandomString(32);
$random_key = preg_replace('/[^a-zA-Z0-9]/', '', $random_key);

if ($lang_id == 1) {
    $show_languae = "EN";
    $style_sheet = '<link href="/css/home.css" rel="stylesheet">';
    $font = "";
} else {
    $font = "helvetica_arabic";
    $show_languae = "AR";
    $style_sheet = '<link href="/css/css-rtl.css" rel="stylesheet">';
}


$index = "";
$about = "";
$cars = "";
$compare = "";
$services = "";
$contact = "";
$bodyClass = "m-index";
if ($current_action == "index") {
    $index = "active_menue";
    $bodyClass = "m-index";
} else if ($current_action == "about") {
    $about = "active_menue";
    $bodyClass = "m-about";
} else if ($current_action == "cars") {
    $cars = "active_menue";

    if (isset($_GET['view'])) {
        if ($_GET['view'] == "list") {
            if ($lang_id == 1) {
                $bodyClass = "m-listings";
            } else {
                $bodyClass = "m-listingsTwo";
            }
        } else {
            $bodyClass = "m-listTableTwo";
        }
    } else {
        $bodyClass = "m-listTableTwo";
    }
} else if ($current_action == "view") {
    $bodyClass = "m-listTableTwo";
} else if ($current_action == "compare") {
    $compare = "active_menue";
    $bodyClass = "m-compare";
} else if ($current_action == "services") {
    $services = "active_menue";
    $bodyClass = "m-article";
} else if ($current_action == "contact") {
    $contact = "active_menue";
} else if ($current_action == "my-listings") {
    $bodyClass = "m-listTableTwo";
}






$this->title = yii::t('app', 'Jordan Car Market');
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="author" content="Jordan Car Market">
        <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">

        <meta name="keywords" content="Jordan Car Market">
        <meta name="description" content="Jordan Car Market">
        <meta name="subject" content="Jordan Car Market">
        <meta name="copyright"content="Jordan Car Market">
        <meta name="language" content="ES">
        <meta name="robots" content="index,follow" />
        <meta name="revised" content="<?php echo date('d m Y') ?>" />
        <meta name="Classification" content="Business">
        <meta name="author" content="Jordan Car Market, info@jordancarmarket.com">
        <meta name="copyright" content="Jordan Car Market">
        <meta name="reply-to" content="info@jordancarmarket.com">
        <meta name="owner" content="Jordan Car Market">
        <meta name="url" content="http://www.jordancarmarket.com">
        <meta name="identifier-URL" content="http://www.jordancarmarket.com">
        <meta name="directory" content="submission">
        <meta name="category" content="Ecommerce, business">
        <meta name="coverage" content="Worldwide">
        <meta name="distribution" content="Global">
        <meta name="rating" content="General">
        <meta name="revisit-after" content="1 days">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-cache">



        <meta property="og:url"           content="http://jordancarmarket.com" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Jordan Car Market" />
        <meta property="og:description"   content="Find Your Dream Car" />
        <meta property="og:image"         content="http://jordancarmarket.com/images/logo/600x105-old.png" />



        <meta name="og:title" content="Jordan Car Market"/>
        <meta name="og:type" content="business, ecommerce"/>
        <meta name="og:url" content="http://www.jordancarmarket.com"/>
        <meta name="og:image" content="http://new.jordancarmarket.com/images/logo.png"/>
        <meta name="og:site_name" content="Jordan Car Market"/>
        <meta name="og:description" content="Jordan Car Market"/>

        <!--        <meta name="fb:page_id" content="43929265776" />-->

        <!--        <meta name="og:email" content="info@matjrak.com"/>
                <meta name="og:phone_number" content="650-123-4567"/>
                <meta name="og:fax_number" content="+1-415-123-4567"/>
        
                <meta name="og:latitude" content="37.416343"/>
                <meta name="og:longitude" content="-122.153013"/>
                <meta name="og:street-address" content="1601 S California Ave"/>
                <meta name="og:locality" content="Palo Alto"/>
                <meta name="og:region" content="CA"/>
                <meta name="og:postal-code" content="94304"/>
                <meta name="og:country-name" content="USA"/>
        
                <meta property="og:type" content="game.achievement"/>
                <meta property="og:points" content="POINTS_FOR_ACHIEVEMENT"/>
        
                <meta property="og:video" content="http://example.com/awesome.swf" />
                <meta property="og:video:height" content="640" />
                <meta property="og:video:width" content="385" />
                <meta property="og:video:type" content="application/x-shockwave-flash" />
                <meta property="og:video" content="http://example.com/html5.mp4" />
                <meta property="og:video:type" content="video/mp4" />
                <meta property="og:video" content="http://example.com/fallback.vid" />
                <meta property="og:video:type" content="text/html" />
        
                <meta property="og:audio" content="http://example.com/amazing.mp3" />
                <meta property="og:audio:title" content="Amazing Song" />
                <meta property="og:audio:artist" content="Amazing Band" />
                <meta property="og:audio:album" content="Amazing Album" />
                <meta property="og:audio:type" content="application/mp3" />-->


        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="shortcut icon" type="image/png" href="/images/logo/fav.png"/>
        <link rel="stylesheet" href="/css/sweetalert.css">
        <script src="/js/sweetalert.js"></script>
        <link rel="stylesheet" href="/css/sweetalert.min.css">
        <link rel="stylesheet" href="/css/css_sweetalert.min.css">
        <script src="/js/sweetalert.min.js"></script>
        <script src="/js/js_sweetalert.min.js"></script>
        <script src="/js/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
        <!--<link href="https://fonts.googleapis.com/css?family=Roboto|Tajawal" rel="stylesheet">-->
        <?= Html::csrfMetaTags() ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php echo $style_sheet; ?>
        <?php $this->head() ?>

    </head>
    <body class="<?php echo $bodyClass; ?>" data-scrolling-animations="false" data-equal-height=".b-items__cell" style='font-family: <?php echo $font ?>;'>
        <?php $this->beginBody() ?>
        <?php if ($cookieAgreement == 1) { ?>
            <script>
                $(window).on('load', function () {
                    window.setTimeout(function () {
                        $('#we_use_cookies').slideDown("slow");
                    }
                    , 2000);
                });
            </script>
        <?php } ?>
        <?php if ($session['firstOpenModal'] == 1) { ?>
            <div id="first_open_modal">
                <div id="video_container">
                    <video class="video_div" autoplay="" loop="" muted="" style="margin: auto; position: absolute; z-index: -1; top: 50%; left: 0%; transform: translate(0%, -50%); visibility: visible; opacity: 1; width: 1351px; height: auto;">
                        <source src="/media/video/jordan-car-market-video.mp4" type="video/mp4">
                    </video>
                    <div class="shadow"></div>
                </div>
                <div id="video_text_container">
                    <section class="m-openfirst">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <img src="/images/logo/m-openFirstLogo.png" class="img-responsive">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <p class="pull-right m-openFirstTime-Header-Text m-closeFirstOpen">Skip and proceed to cars</p>
                                </div>
                                <div class="m-openFirst-chooseLanguage-container col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 ">
                                    <p class="m-openFirstTime-choose-language-text-p">Please choose a language</p>
                                    <br />
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <center>
                                            <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
                                                <a class="m-langLink dropdown-toggle language_a_center" href="/langandfirstopen?language=en-US&amp;action=index">
                                                    <div class='m-firstOpen-flag-title-container' id='m-firstOpen-flag-en'>
                                                        <span class='flag-en'></span>
                                                        <span class='flag-title'>English</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <style>
                                                @font-face {
                                                    font-family: helvetica_arabic;
                                                    src: url(/fonts/helveticaneueltarabicroman1.ttf);
                                                }
                                            </style>
                                            <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
                                                <a class="m-langLink dropdown-toggle language_a_center"  href="/langandfirstopen?language=ar-AR&amp;action=index">
                                                    <div class='m-firstOpen-flag-title-container' id='m-firstOpen-flag-ar'>
                                                        <span class='flag-ar'></span>
                                                        <span class='flag-title' style='font-family: helvetica_arabic;'>العربية</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </center>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12  col-lg-8 col-lg-offset-2 text-center">
                                    <br />
                                    <p class="m-openFirstTime-choose-language-text-p">Sign-in into your account</p>


                                    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                                        <?php $form = ActiveForm::begin(['id' => 'login-form', 'action' => '/login']); ?>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <?= $form->field($model, 'username')->textInput(['class' => 'form-control modal_first_open_username_field', 'placeholder' => ' Username '])->label(false) ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control modal_first_open_password_field', 'placeholder' => ' Password '])->label(false) ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <button class="m-firstOpen-create-accoun-btn m-closeFirstOpen" style="width:100%;">Login <i class="fa fa-sign-in m-firstOpen-sell-your-car-icon"></i></button>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 " style="padding-left:3px !important;padding-right:3px !important;">
                                                <span class='fa fa-facebook-square modal_first_open_facebook_icon'></span>
                                                <a href="#" class="modal_first_open_social_media_facebook modal_first_open_social_media_buttons" style='width:100%'>
                                                    <span class="modal_login_social_media_span_facebook">Facebook</span> 
                                                </a>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 " style="padding-left:3px !important;padding-right:3px !important;">
                                                <span class='fa fa-twitter-square modal_first_open_twitter_icon'></span>
                                                <a href="#" class="modal_first_open_social_media_twitter modal_first_open_social_media_buttons" style='width:100%'>
                                                    <span class="modal_login_social_media_span_twitter">Twitter</span>
                                                </a>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 " style="padding-left:3px !important;padding-right:3px !important;">
                                                <span class='fa fa-google-plus-square modal_first_open_google_icon'></span>
                                                <a href="#" class="modal_first_open_social_media_google modal_first_open_social_media_buttons" style='width:100%'>
                                                    <span class="modal_login_social_media_span_google">Google+</span>
                                                </a>
                                            </div> 
                                        </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center">
                                    <p class="m-openFirstTime-not-member-yet-text-p m-closeFirstOpen">Not a member yet ?</p>
                                    <a href="/signup" class="m-firstOpen-create-accoun-btn m-closeFirstOpen" >Create Account <i class="fa fa-user m-firstOpen-sell-your-car-icon"></i></a>
                                </div>
                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                                    <div class="col-xs-12">
                                        <p class="m-openFirstTime-bottom-text-p">
                                            <span class="we_use_cookies_span">Jordan Car Market</span> uses cookies to deliver our services and to show you relevant ads and listings. By using our site, you acknowledge that you have read and understand our <a href="#" class="we_use_cookies_a_href">Cookie Policy</a>, <a href="#" class="we_use_cookies_a_href">Privacy Policy</a>, and our <a href="#" class="we_use_cookies_a_href">Terms of Service</a>. Your use of our Products and Services is subject to these policies and terms.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <?php } ?>
        <div id="we_use_cookies" style="display: none;">
            <div class="container">
                <div class="">
                    <div class="col-xs-10">
                        <p id="we_use_cookies_p">
                            <span class="we_use_cookies_span">Jordan Car Market</span> uses cookies to deliver our services and to show you relevant ads and listings. By using our site, you acknowledge that you have read and understand our <a href="#" class="we_use_cookies_a_href">Cookie Policy</a>, <a href="#" class="we_use_cookies_a_href">Privacy Policy</a>, and our <a href="#" class="we_use_cookies_a_href">Terms of Service</a>. Your use of our Products and Services is subject to these policies and terms.
                        </p>
                    </div>
                    <div class="col-xs-2">
                        <div class="we_use_cookies_btn" id="we_use_cookies_btn_accept">Accept <i class="fa fa-check"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Loader -->
        <div id="page-preloader">
            <!--<span class="spinner"></span>-->
            <center><img class="img-loader" src="/images/elements/loader3.gif"></center>
        </div>
        <!-- Loader end -->
        <header class="b-topBar wow slideInDown" data-wow-delay="0.7s">
            <div class="container">
                <div class="row">

                    <?php if ($lang_id == 1) { ?>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 no_padding ">

                                <div class="b-topBar__lang">
                                    <a href="/signup-seller" class="font_special"> <i class="fa fa-car fa_top_red_icon"></i> <span class="font_special">Become a dealer</span></a>
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no_padding ">

                                <div class="b-topBar__lang">
                                    <a href="/contact" class="font_special"> <i class="fa fa-envelope fa_top_red_icon"></i> <span class="font_special">Contact Us</span></a>
                                </div>

                            </div>
                        </div>


                        <!--<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>-->

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <center>
                                <a href="/"><img src="/images/logo/jordan_car_market_logo.png" class='custome_logo'></a>
                            </center>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 no_padding">
                            <?php if (Yii::$app->user->isGuest) { ?>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no_padding">
                                    <div class="b-topBar__lang">
                                        <a href="/login" class="font_special" style='display: inherit;'> <i class="fa fa-user fa_top_red_icon"></i> <span class="font_special"><?= yii::t('app', 'Sign in') ?></span></a>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no_padding">
                                    <div class="b-topBar__lang">
                                        <a href="/signup" class="font_special" style='display: inherit;'> <i class="fa fa-sign-in fa_top_red_icon"></i> <span class="font_special"><?= yii::t('app', 'Register') ?></span></a>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6 no_padding">
                                    <div class="b-topBar__lang">
                                        <a href="/" class="font_special dropdown-toggle text-trans-none header_signed_in_profile_a" data-toggle='dropdown' style='display: inherit;'><img src="/images/team/22x22/02.jpg" class="img-circle img-bordered login_avatar" /> <?= Yii::$app->user->identity->username ?> <i class="fa fa-caret-down red_color"></i> </a>
                                        <ul class="dropdown-menu h-lang profile_dropdown_ul">
                                            <li class='profile_dropdown_li'>
                                                <a class="m-langLink dropdown-toggle profile_dropdown_li_a" href="#" data-method="post">
                                                    <img src="/images/team/50x50/02.jpg" class="img-circle img-bordered login_avatar dropdown_menue_avatar" />
                                                    <span class='profile_dropdown_span_text'>
                                                        <?= Yii::$app->user->identity->first_name ?> <?= Yii::$app->user->identity->last_name ?>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class='profile_dropdown_li'><a class="m-langLink dropdown-toggle profile_dropdown_li_a" href="/my-messages" data-method="post"><span class="fa fa-envelope profile_dropdown_icon"></span><span class='profile_dropdown_span_text'><?= yii::t('app', 'My Messages') ?></span></a></li>
                                            <li class='profile_dropdown_li'><a class="m-langLink dropdown-toggle profile_dropdown_li_a" href="/my-listings" data-method="post"><span class="fa fa-list-alt profile_dropdown_icon"></span><span class='profile_dropdown_span_text'><?= yii::t('app', 'My Listings') ?></span></a></li>
                                            <li class='profile_dropdown_li'><a class="m-langLink dropdown-toggle profile_dropdown_li_a" href="/favorite-listings" data-method="post"><span class="fa fa-heart-o profile_dropdown_icon"></span><span class='profile_dropdown_span_text'><?= yii::t('app', 'Favorite Listings') ?></span></a></li>
                                            <li class='profile_dropdown_li'><a class="m-langLink dropdown-toggle profile_dropdown_li_a" href="/profile" data-method="post"><span class="fa fa-cogs profile_dropdown_icon"></span><span class='profile_dropdown_span_text'><?= yii::t('app', 'Profile Settings') ?></span></a></li>
                                            <li class='profile_dropdown_li'><a class="m-langLink dropdown-toggle profile_dropdown_li_a" href="/backend/web/site/logout" data-method="post"><span class="fa fa-lock profile_dropdown_icon red_color"></span> <span class='profile_dropdown_span_text profile_dropdown_span_text_logout'><?= yii::t('app', 'Not') ?> <?= Yii::$app->user->identity->first_name ?>? <?= yii::t('app', 'Logout') ?></span> </a></li>
                                        </ul>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <div class="b-topBar__lang" style='margin-top: -2px;'>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle font_special" data-toggle='dropdown'><?= yii::t('app', 'Language') ?></a>
                                    <a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-<?php echo strtolower($show_languae) ?>"></span><?php echo $show_languae ?><span class="fa fa-caret-down"></span></a>
                                    <ul class="dropdown-menu h-lang">
                                        <li><a class="m-langLink dropdown-toggle language_a_center" href="/lang?language=en-US&amp;action=<?php echo $current_action; ?>"><span class="b-topBar__lang-flag m-en"></span>EN</a></li>
                                        <li><a class="m-langLink dropdown-toggle language_a_center"  href="/lang?language=ar-AR&amp;action=<?php echo $current_action; ?>"><span class="b-topBar__lang-flag m-ar"></span>AR</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>








                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <div class="b-topBar__lang" style='margin-top: -2px;'>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle font_special" data-toggle='dropdown'><?= yii::t('app', 'Language') ?></a>
                                    <a class="m-langLink dropdown-toggle" data-toggle='dropdown' href="#"><span class="b-topBar__lang-flag m-<?php echo strtolower($show_languae) ?>"></span><?php echo $show_languae ?><span class="fa fa-caret-down"></span></a>
                                    <ul class="dropdown-menu h-lang">
                                        <li><a class="m-langLink dropdown-toggle language_a_center" href="/lang?language=en-US&amp;action=<?php echo $current_action; ?>"><span class="b-topBar__lang-flag m-en"></span>EN</a></li>
                                        <li><a class="m-langLink dropdown-toggle language_a_center"  href="/lang?language=ar-AR&amp;action=<?php echo $current_action; ?>"><span class="b-topBar__lang-flag m-ar"></span>AR</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 no_padding">
                            <?php if (Yii::$app->user->isGuest) { ?>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no_padding">
                                    <div class="b-topBar__lang">
                                        <a href="/login" class="font_special" style='display: inherit;'>  <span class="font_special"><?= yii::t('app', 'Sign in') ?></span> <i class="fa fa-user fa_top_red_icon"></i></a>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no_padding">
                                    <div class="b-topBar__lang">
                                        <a href="/signup" class="font_special" style='display: inherit;'>  <span class="font_special"><?= yii::t('app', 'Register') ?></span> <i class="fa fa-sign-in fa_top_red_icon"></i></a>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no_padding">
                                    <div class="b-topBar__lang">
                                        <a href="/" class="font_special dropdown-toggle text-trans-none header_signed_in_profile_a" data-toggle='dropdown' style='display: inherit;'><img src="/images/team/22x22/02.jpg" class="img-circle img-bordered login_avatar" /> <?= Yii::$app->user->identity->username ?> <i class="fa fa-caret-down red_color"></i> </a>
                                        <ul class="dropdown-menu h-lang profile_dropdown_ul">
                                            <li class='profile_dropdown_li'>
                                                <a class="m-langLink dropdown-toggle profile_dropdown_li_a" href="#" data-method="post">
                                                    <span class='profile_dropdown_span_text'>
                                                        <?= Yii::$app->user->identity->first_name ?> <?= Yii::$app->user->identity->last_name ?>
                                                    </span>
                                                    <img src="/images/team/50x50/02.jpg" class="img-circle img-bordered login_avatar dropdown_menue_avatar" />
                                                </a>
                                            </li>
                                            <li class='profile_dropdown_li'><a class="m-langLink dropdown-toggle profile_dropdown_li_a" href="/my-messages" data-method="post"><span class="fa fa-envelope profile_dropdown_icon"></span><span class='profile_dropdown_span_text'><?= yii::t('app', 'My Messages') ?></span></a></li>
                                            <li class='profile_dropdown_li'><a class="m-langLink dropdown-toggle profile_dropdown_li_a" href="/my-listings" data-method="post"><span class="fa fa-list-alt profile_dropdown_icon"></span><span class='profile_dropdown_span_text'><?= yii::t('app', 'My Listings') ?></span></a></li>
                                            <li class='profile_dropdown_li'><a class="m-langLink dropdown-toggle profile_dropdown_li_a" href="/favorite-listings" data-method="post"><span class="fa fa-heart-o profile_dropdown_icon"></span><span class='profile_dropdown_span_text'><?= yii::t('app', 'Favorite Listings') ?></span></a></li>
                                            <li class='profile_dropdown_li'><a class="m-langLink dropdown-toggle profile_dropdown_li_a" href="/profile" data-method="post"><span class="fa fa-cogs profile_dropdown_icon"></span><span class='profile_dropdown_span_text'><?= yii::t('app', 'Profile Settings') ?></span></a></li>
                                            <li class='profile_dropdown_li'><a class="m-langLink dropdown-toggle profile_dropdown_li_a" href="/backend/web/site/logout" data-method="post"><span class="fa fa-lock profile_dropdown_icon red_color"></span> <span class='profile_dropdown_span_text profile_dropdown_span_text_logout'><?= yii::t('app', 'Not') ?> <?= Yii::$app->user->identity->first_name ?>? <?= yii::t('app', 'Logout') ?></span> </a></li>
                                        </ul>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <center>
                                <a href="/"><img src="/images/logo/jordan_car_market_logo_arabic.png" class='custome_logo'></a>
                            </center>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 no_padding ">

                                <div class="b-topBar__lang">
                                    <a href="/signup-seller" class="font_special">  <span class="font_special">اضف معرضك</span> <i class="fa fa-car fa_top_red_icon"></i></a>
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 no_padding ">

                                <div class="b-topBar__lang">
                                    <a href="/contact" class="font_special">  <span class="font_special">اتصل بنا</span> <i class="fa fa-envelope fa_top_red_icon"></i></a>
                                </div>

                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </header><!--b-topBar-->

        <section class="s-main_top_bar">
            <div class="container">
                <nav class="b-nav">

                    <div class="b-nav__list wow slideInRight" data-wow-delay="0.3s">
                        <div class="navbar-header" style='height: 40px;'>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse navbar-main-slide" id="nav" style="margin: auto; width: 100%;">
                            <?php if ($lang_id == 1) { ?>
                                <ul class="navbar-nav-menu">
                                    <!--<li class="dropdown"><a href="/" class="header_menu_a <?php echo $index ?>"><?= yii::t('app', 'home') ?></a></li>-->
                                    <li><a href="/amman-show-rooms" class="header_menu_a <?php echo $about ?>"><?= yii::t('app', 'Amman Area Showrooms') ?></a></li>
                                    <li><a href="/dealerships" class="header_menu_a <?php echo $cars ?>"><?= yii::t('app', 'Dealerships') ?></a></li>
                                    <li><a href="/free-zone" class="header_menu_a <?php echo $compare ?>"><?= yii::t('app', "Free Zone's Cars") ?></a></li>
                                    <!--<li><a href="/services" class="header_menu_a <?php echo $services ?>"><?= yii::t('app', "Community & services") ?></a></li>-->
                                </ul>
                            <?php } else { ?>
                                <ul class="navbar-nav-menu">
                                    <!--<li><a href="/services" class="header_menu_a <?php echo $services ?>"><?= yii::t('app', "Community & services") ?></a></li>-->
                                    <li><a href="/free-zone" class="header_menu_a <?php echo $compare ?>"><?= yii::t('app', "Free Zone's Cars") ?></a></li>
                                    <li><a href="/dealerships" class="header_menu_a <?php echo $cars ?>"><?= yii::t('app', 'Dealerships') ?></a></li>
                                    <li><a href="/amman-show-rooms" class="header_menu_a <?php echo $about ?>"><?= yii::t('app', 'Amman Area Showrooms') ?></a></li>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </nav>
            </div>
        </section>







        <?= $content ?>


        <div class="b-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="b-info__latest">
                            <h3><?= yii::t('app', 'LATEST AUTOS') ?></h3>


                            <?php foreach ($getFeaturedCarsForFooter as $FeaturedCars => $FeaturedCar) { ?>
                                <div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
                                    <a href="/cars/<?php echo $FeaturedCar->slug ?>">
                                        <div class="b-info__latest-article-photo" style="background: url(../media/80x65/<?php echo $FeaturedCar->image ?>) no-repeat;"></div>
                                    </a>
                                    <div class="b-info__latest-article-info">
                                        <h6><a href="/cars/<?php echo $FeaturedCar->slug ?>"><?php echo $FeaturedCar->name ?></a></h6>
                                        <p><span class="fa fa-calendar"></span> <?php echo $FeaturedCar->year ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <div class="b-info__latest">
                            <h3><?= yii::t('app', 'Featured AUTOS') ?></h3>
                            <?php foreach ($getLatestCarsForFooter as $latestCars => $latestCar) { ?>
                                <div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
                                    <a href="/cars/<?php echo $FeaturedCar->slug ?>">
                                        <div class="b-info__latest-article-photo" style="background: url(../media/80x65/<?php echo $latestCar->image ?>) no-repeat;"></div>
                                    </a>
                                    <div class="b-info__latest-article-info">
                                        <h6><a href="/cars/<?php echo $latestCar->slug ?>"><?php echo $latestCar->name ?></a></h6>
                                        <p><span class="fa fa-calendar"></span> <?php echo $latestCar->year ?></p>
                                    </div>
                                </div>
                            <?php } ?>



                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <address class="b-info__contacts wow zoomInUp" data-wow-delay="0.3s">
                            <p><?= yii::t('app', 'Contact us') ?></p>
                            <div class="b-info__contacts-item">
                                <span class="fa fa-map-marker"></span>
                                <em><?= yii::t('app', '202 Swiefyeh, AM - JORDAN 90014') ?></em>
                            </div>
                            <div class="b-info__contacts-item">
                                <span class="fa fa-phone"></span>
                                <em><?= yii::t('app', 'Phone:  1-800- 624-5462') ?></em>
                            </div>
                            <div class="b-info__contacts-item">
                                <span class="fa fa-fax"></span>
                                <em><?= yii::t('app', 'FAX:  1-800- 624-5462') ?></em>
                            </div>
                            <div class="b-info__contacts-item">
                                <span class="fa fa-envelope"></span>
                                <em><?= yii::t('app', 'Email:  info@domain.com') ?></em>
                            </div>
                        </address>
                        <address class="b-info__map">
                            <a href="#"><?= yii::t('app', 'Open Location Map') ?></a>
                        </address>
                    </div>
                </div>
            </div>
        </div><!--b-info-->

        <footer class="b-footer">
            <!--<a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a>-->



            <!--Back To Top Start-->
            <div class="car-top">
                <span><img src="/images/elements/car.png" alt="Jordan Car Market"></span>
            </div>
            <!--Back To Top End-->


            <div class="container">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="b-footer__company wow fadeInLeft" data-wow-delay="0.3s">
                            <img src="/images/logo/logo-light.png">
                            <p>All copyrights reserved &copy; <?php echo date('Y'); ?> Jordan Car Market</p>
                        </div>
                    </div>
                    <div class="col-xs-8">
                        <div class="b-footer__content wow fadeInRight" data-wow-delay="0.3s">
                            <div class="b-footer__content-social">
                                <a href="#"><span class="fa fa-facebook-square"></span></a>
                                <a href="#"><span class="fa fa-twitter-square"></span></a>
                                <a href="#"><span class="fa fa-google-plus-square"></span></a>
                                <a href="#"><span class="fa fa-instagram"></span></a>
                                <a href="#"><span class="fa fa-youtube-square"></span></a>
                                <a href="#"><span class="fa fa-skype"></span></a>
                            </div>
                            <nav class="b-footer__content-nav">
                                <ul>
                                    <li><a href="/privacy-policy"><?= yii::t('app', 'Privacy Policy') ?></a></li>
                                    <li><a href="/terms-conditions"><?= yii::t('app', 'Terms & Conditions') ?></a></li>
                                    <li><a href="/contact"><?= yii::t('app', 'Contact us') ?></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!--b-footer-->

        <?php if ($lang_id == 1) { ?>
            <!-- livezilla.net PLACE SOMEWHERE IN BODY -->
            <div id="lvztr_b01" style="display:none"></div><script id="lz_r_scr_e3b6a91f30ded68780d047ea5facd645" type="text/javascript">lz_code_id = "e3b6a91f30ded68780d047ea5facd645";var script = document.createElement("script");script.async = true;script.type = "text/javascript";var src = "http://new.jordancarmarket.com/frontend/web/livechat/server.php?rqst=track&output=jcrpt&fbpos=12&fbw=39&fbh=137&fbmr=40&fbmb=30&nse=" + Math.random();script.src = src;document.getElementById('lvztr_b01').appendChild(script);</script><div style="display:none;"><a href="javascript:void(window.open('http://new.jordancarmarket.com/frontend/web/livechat/chat.php?epc=I2RlNDgzZA__&esc=I2RlNDgzZA__','','width=400,height=600,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))" class="lz_fl"><img id="chat_button_image" src="http://new.jordancarmarket.com/frontend/web/livechat/image.php?id=5&type=overlay" width="39" height="137" style="border:0px;" alt="LiveZilla Live Chat Software"></a></div>
            <!-- livezilla.net PLACE SOMEWHERE IN BODY -->
        <?php } else { ?>
            <!-- PASS THRU DATA OBJECT -->
            <script type="text/javascript">
                var lz_data = {overwrite: false, language: 'ar'};
            </script>
            <!-- livezilla.net PLACE SOMEWHERE IN BODY -->
            <div id="lvztr_5dc" style="display:none"></div><script id="lz_r_scr_08f13f1b12009f1924e09b43f7882e89" type="text/javascript">lz_code_id = "08f13f1b12009f1924e09b43f7882e89";var script = document.createElement("script");script.async = true;script.type = "text/javascript";var src = "http://new.jordancarmarket.com/frontend/web/livechat/server.php?rqst=track&output=jcrpt&fbpos=12&fbw=39&fbh=137&fbmr=40&fbmb=30&nse=" + Math.random();script.src = src;document.getElementById('lvztr_5dc').appendChild(script);</script><div style="display:none;"><a href="javascript:void(window.open('http://new.jordancarmarket.com/frontend/web/livechat/chat.php?epc=I2RlNDgzZA__&esc=I2RlNDgzZA__','','width=400,height=600,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))" class="lz_fl"><img id="chat_button_image" src="http://new.jordancarmarket.com/frontend/web/livechat/image.php?id=6&type=overlay" width="39" height="137" style="border:0px;" alt="LiveZilla Live Chat Software"></a></div>
            <!-- livezilla.net PLACE SOMEWHERE IN BODY -->
        <?php } ?>


        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

<?php
if (isset($_GET['cars_language'])) {
    if ($_GET['cars_language'] == 1) {
        ?>
        <script>
            $("#checkBox_for_cars_language_english_all_div").hide();
            $("#checkBox_for_cars_language_english_div").show();
        </script>
        <?php
    } else {
        ?>
        <script>
            $("#checkBox_for_cars_language_english_div").hide();
            $("#checkBox_for_cars_language_english_all_div").show();
        </script>
        <?php
    }
}
?>
<script>


//
//    window.setTimeout(function () {
//        $('#ajaxModal').modal({
//            backdrop: 'static',
//            keyboard: false
//        });
//        $('.modal-backdrop').removeClass("modal-backdrop");
//        $('body').removeClass("modal-open");
//
//    }
//    , 120000);

    $('#showModal').click(function () {
        alert("hi");

    });
</script>
<div id="ajaxModal" class="modal fade product_view in" role="dialog" style="margin-right: 40px;">
    <div class=" modal-dialog-car-sell modal-side modal-bottom-right" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12 product_content">
                        <center>
                            <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s" style="color: #000000; visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">Selling Your Car ?</h2>
                            <img src="/images/modals/sell-your-car.png" class="img-responsive">
                        </center>
                    </div>
                </div>
            </div>
            <div class="model-footer model_sell_your_car_footer">
                <center>
                    <a href="/cars/create/<?php echo $random_key; ?>" class="sell_your_car_modal_button">SELL IT NOW <i class="fa fa-diamond"></i></a>
                    <a href="javascript:void(0)" class="sell_your_car_modal_no_button" data-dismiss="modal">No, Thanks</a>
                </center>
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
    $('.m-closeFirstOpen').click(function () {
        var firstOpenModal = 1;
        $.ajax({
            type: "post",
            url: "/firstopenmodal",
            data: {firstOpenModal: firstOpenModal},
            success: function (data) {
//                window.location = "/";
                $('html, body').animate({
                    scrollTop: $("body").offset().top
                }, 500);
                $('#video_text_container').slideUp("slow");
                $('#first_open_modal').slideUp("slow");
            }
        });
    });

    $('#m-firstOpen-flag-en').click(function () {
        var language = "en-US";
        var action = <?php echo $current_action; ?>;
        $.ajax({
            type: "get",
            url: "/lang",
            data: {language: language, action: action},
            success: function (data) {
                window.location = "/";
            }
        });
    });





</script>