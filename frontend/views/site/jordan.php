<?php
$random_key = Yii::$app->security->generateRandomString(32);
$random_key = preg_replace('/[^a-zA-Z0-9]/', '', $random_key);
?>
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
                        <p class="pull-right m-openFirstTime-Header-Text m-closeFirstOpen">Skip and proceed to website</p>
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
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center">
                        <p class="m-openFirstTime-sell-your-car-text-p">Looking for your dream car ? List your car for sale for FREE !</p>
                        <a href="/cars/create/<?php echo $random_key; ?>" class="sell_your_car_modal_button m-closeFirstOpen">SELL IT NOW <i class="fa fa-diamond m-firstOpen-sell-your-car-icon"></i></a>
                        <a href="/cars" class="m-firstOpen-discover-cars-btn m-closeFirstOpen" >Discover Cars <i class="fa fa-car m-firstOpen-sell-your-car-icon"></i></a>
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