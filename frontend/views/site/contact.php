<?php
$session = Yii::$app->session;
$lang_id = $session['language_id'];
$lang = $session['language'];
if ($lang_id == 1) {
    $header_image = "pageHead.jpg";
} else {
    $header_image = "pageHead-ar.jpg";
}
?>

<?php if ($lang_id == 1) { ?>
    <section class="b-pageHeader" style="background: url(../images/backgrounds/<?php echo $header_image; ?>); ">
        <div class="container">
            <h1 class="wow zoomInLeft" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInLeft;">Contact Us</h1>
            <!--            <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInRight;">
                            <h3>Get In Touch With Us Now</h3>
                        </div>-->
        </div>
    </section>
    <div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
        <div class="container">
            <a href="/" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="/contact" class="b-breadCumbs__page m-active">Contact Us</a>
        </div>
    </div>
    <section class="b-contacts s-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="b-contacts__form">
                        <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                            <h2 class="s-titleDet">Contact Form</h2> 
                        </header>
                        <p class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">Enter your comments through the form below, and our customer service professionals will contact you as soon as possible.</p>
                        <div id="success"></div>
                        <form id="contactForm" method="post" action="self" novalidate="" class="s-form wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                            <div class="s-relative">
                                <select name="user-topic" id="contactEnTopic" class="m-select" style="border-radius: 25px;">
                                    <option value="Not select">SELECT A TOPIC</option>
                                    <option value="Topic 1">Sales & marketing</option>
                                    <option value="Topic 2">Customer Service</option>
                                    <option value="Topic 3">Technical</option>
                                    <option value="Topic 4">Other</option>
                                </select>
                                <span class="fa fa-caret-down"></span>
                            </div>
                            <input type="text" placeholder="YOUR NAME" value="" name="user-name" id="contactEnUsername">
                            <input type="text" placeholder="EMAIL ADDRESS %" value="" name="user-email" id="contactEnEmail">
                            <input type="text" placeholder="PHONE NO." value="" name="user-phone" id="contactEnPhone">
                            <textarea id="contactEnMessage" name="user-message" placeholder="COMMENT/SUGGESTIONS/FEEDBACK"></textarea>
                            <a href="#" class="button register_button" id="contactEnSubmit">SUBMIT NOW </a>
                        </form>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="b-contacts__address">
                        <div class="b-contacts__address-info">
                            <h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">Contact Information</h2>
                            <address class="b-contacts__address-info-main wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">

                                <div class="b-contacts__address-info-main-item">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-xs-12">
                                            <span class="fa fa-phone"></span>
                                            PHONE
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-xs-12">
                                            <em>1-800- 624-5462</em>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-contacts__address-info-main-item">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-xs-12">
                                            <span class="fa fa-fax"></span>
                                            FAX
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-xs-12">
                                            <em>1-800- 624-5462</em>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-contacts__address-info-main-item">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-xs-12">
                                            <span class="fa fa-envelope"></span>
                                            EMAIL
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-xs-12">
                                            <a href="mailto:info@jordancarmarket.com"><em>info@jordancarmarket.com</em></a>
                                        </div>
                                    </div>
                                </div>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="b-pageHeader" style="background: url(../images/backgrounds/<?php echo $header_image; ?>); ">
        <div class="container">
            <h1 class="wow zoomInLeft" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInLeft;"><?= yii::t('app', 'Contact us') ?></h1>
            <!--            <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInRight;">
                            <h3><?= yii::t('app', 'Get In Touch With Us Now') ?></h3>
                        </div>-->
        </div>
    </section>
    <div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
        <div class="container">
            <a href="/" class="b-breadCumbs__page"><?= yii::t('app', 'home') ?></a><span class="fa fa-angle-left"></span><a href="/contact" class="b-breadCumbs__page m-active"><?= yii::t('app', 'Contact us') ?></a>
        </div>
    </div>
    <section class="b-contacts s-shadow">
        <div class="container">
            <div class="row">

                <div class="col-xs-6">
                    <div class="b-contacts__address">
                        <div class="b-contacts__address-hours">
                            <h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">ساعات العمل</h2>
                            <div class="b-contacts__address-hours-main wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <h5>قسم المبيعات</h5> 

                                        <p> 8:00  - 5:00  السبت - الخمبس<br>الجمعة مغلق</p>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <h5>قسم المبيعات</h5> 

                                        <p> 8:00  - 5:00  السبت - الخمبس<br>الجمعة مغلق</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="b-contacts__address-info">
                            <h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">ساعات العمل</h2>
                            <address class="b-contacts__address-info-main wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                                <div class="b-contacts__address-info-main-item">
                                    العنوان
                                    <span class="fa fa-home"></span>
                                    <p>900014 الصويفية عمان الأردن 202</p>
                                </div>
                                <div class="b-contacts__address-info-main-item">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-8 col-xs-12">
                                            <em>1-800- 624-5462</em>
                                        </div>
                                        <div class="col-lg-6 col-md-4 col-xs-12">
                                            الهاتف
                                            <span class="fa fa-phone"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-contacts__address-info-main-item">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-8 col-xs-12">
                                            <em>1-800- 624-5462</em>
                                        </div>
                                        <div class="col-lg-6 col-md-4 col-xs-12">
                                            الفاكس
                                            <span class="fa fa-fax"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-contacts__address-info-main-item">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-8 col-xs-12">
                                            <em>marketing@jordancarmarket.com</em>
                                        </div>
                                        <div class="col-lg-6 col-md-4 col-xs-12">
                                            البريد الالكتروني
                                            <span class="fa fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="b-contacts__form">
                        <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                            <h2 class="s-titleDet"><?= yii::t('app', 'Contact Form') ?></h2> 
                        </header>
                        <p class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                            ادخل تعليقاتك من خلال النموذج المرفق بالاسفل و سوف يتم الاجابة باسرع وقت ممكن من قبل فريقنا المحترف في خدمة الزبائن 
                        </p>
                        <div id="success"></div>
                        <form id="contactForm" novalidate="" class="s-form wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                            <div class="s-relative">
                                <select name="user-topic" id="user-topic" class="m-select">
                                    <option value="Not select"><?= yii::t('app', 'SELECT A TOPIC') ?></option>
                                    <option value="Topic 1">المبيعات والتسويق</option>
                                    <option value="Topic 2">خدمة الزبائن</option>
                                    <option value="Topic 3">تقني</option>
                                    <option value="Topic 4">اخرى</option>
                                </select>
                                <span class="fa fa-caret-down"></span>
                            </div>
                            <input type="text" placeholder="الاسم" value="" name="user-name" id="user-name">
                            <input type="text" placeholder="البريد الالكتروني" value="" name="user-email" id="user-email">
                            <input type="text" placeholder="رقم الهاتف" value="" name="user-phone" id="user-phone">
                            <textarea id="user-message" name="user_message" placeholder="التعليق \ الاقتراح \ التغذية الراجعة"></textarea>
                            <button type="submit" class="btn m-btn pull-right"><span class="fa fa-angle-left"></span>ارسل الان</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<script>
    $('#contactEnSubmit').click(function () {
        var enTopic = $('#contactEnTopic').val();
        var enUser = $('#contactEnUsername').val();
        var enEmail = $('#contactEnEmail').val();
        var enPhone = $('#contactEnPhone').val();
        var enMessage = $('#contactEnMessage').val();
        $.ajax({
            type: "POST",
            url: "/contact",
            data: {topic: enTopic, user: enUser, email: enEmail, phone: enPhone, message: enMessage},
            success: function (data) {
                console.log(data);
            }
        });

    });
</script>