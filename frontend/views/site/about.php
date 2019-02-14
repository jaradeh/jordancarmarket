<?php
$session = Yii::$app->session;
$lang_id = $session['language_id'];
$lang = $session['language'];
if($lang_id == 1){
    $header_image = "pageHead.jpg";
}else{
    $header_image = "pageHead-ar.jpg";
}
?>
<section class="b-pageHeader" style="background: url(../images/backgrounds/<?php echo $header_image; ?>); ">
    <div class="container">
        
        <h1 class="wow zoomInLeft" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: zoomInLeft;" ><?= yii::t('app', 'About Us') ?></h1>

    </div>
</section>
<?php if ($lang_id == 1) { ?>
    <div class="b-breadCumbs s-shadow">
        <div class="container">
            <a href="/" class="b-breadCumbs__page"><?= yii::t('app', 'home') ?></a><span class="fa fa-angle-right"></span><a href="/about" class="b-breadCumbs__page m-active"><?= yii::t('app', 'About Us') ?></a>
        </div>
    </div>
<?php } else { ?>
    <div class="b-breadCumbs s-shadow">
        <div class="container">
            <a href="/" class="b-breadCumbs__page"><?= yii::t('app', 'home') ?></a><span class="fa fa-angle-left"></span><a href="/about" class="b-breadCumbs__page m-active"><?= yii::t('app', 'About Us') ?></a>
        </div>
    </div>
<?php } ?>
<section class="b-best" style="padding-top: 150px;border-bottom: 0px;">
    <div class="container">
        <div class="row">


            <?php if ($lang_id == 1) { ?>
                <div class="col-sm-6 col-xs-12">
                    <div class="b-best__info">
                        <header class="s-lineDownLeft b-best__info-head">
                            <h2 class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">Jordan Can Market Mission & Future Plans</h2>
                        </header>
                        <h6 class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod etg tempor incididunt ut labore dolore magna aliqua. </h6>
                        <p class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam mus etern nunc. Nunc conseq sem velde metus imperdiet lacinia. Aenean vulputate. Donec vene natis leo curabitur at neque ut sapien fusce cursus dapibus ligula Lorem ipsum dolor sitter amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Uit enim ad minim veniami quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat. Duis aute irure dolor in reprehenderit.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.5s" alt="best" src="/media/about/vision_2.jpg" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                </div>
            <?php } else { ?>

                <div class="col-sm-6 col-xs-12">
                    <img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.5s" alt="best" src="/media/about/vision_2.jpg" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="b-best__info">
                        <header class="s-lineDownLeft b-best__info-head">
                            <h2 class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;"> مهمة سوق السيارات الأردنية و الخطط المستقبلية</h2>
                        </header>
                        <h6 class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;"> حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. </h6>
                        <p class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج 
                        </p>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>


<section class="b-best" style="border-bottom: 0px;">
    <div class="container">
        <div class="row">
            <?php if ($lang_id == 1) { ?>
                <div class="col-sm-6 col-xs-12">
                    <img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.5s" alt="best" src="/media/about/mission.jpg" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="b-best__info">
                        <header class="s-lineDownLeft b-best__info-head">
                            <h2 class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">Jordan Car Market Vision & Message</h2>
                        </header>
                        <h6 class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod etg tempor incididunt ut labore dolore magna aliqua. </h6>
                        <p class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam mus etern nunc. Nunc conseq sem velde metus imperdiet lacinia. Aenean vulputate. Donec vene natis leo curabitur at neque ut sapien fusce cursus dapibus ligula Lorem ipsum dolor sitter amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Uit enim ad minim veniami quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod consequat. Duis aute irure dolor in reprehenderit.</p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-sm-6 col-xs-12">
                    <div class="b-best__info">
                        <header class="s-lineDownLeft b-best__info-head">
                            <h2 class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">رسيالة و رؤية سوق السيارات الأردنية</h2>
                        </header>
                        <h6 class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;"> حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. </h6>
                        <p class="wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج 
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.5s" alt="best" src="/media/about/mission.jpg" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                </div>
            <?php } ?>

        </div>
    </div>
</section>



<section class="b-what s-shadow m-home">
    <div class="container">
        <h3 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;"><?= yii::t('app', 'CUSTOMERS ARE IMPORTANT FOR US') ?></h3><br>
        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;"><?= yii::t('app', 'WHAT WE OFFERS') ?></h2>
        <div class="row">
            <?php if ($lang_id == 1) { ?>
                <div class="col-sm-4 col-xs-12">
                    <div class="b-world__item wow zoomInLeft" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInLeft;">
                        <img class="img-responsive" src="/media/about/oil_change_3.jpg" alt="wolks">
                        <div class="b-world__item-val">
                            <span class="b-world__item-val-title"><?= yii::t('app', 'WE OFFER') ?></span>
                        </div>
                        <h2><?= yii::t('app', 'FREE Oil Change') ?></h2>
                        <p>If you purchase a car through <a href='/'><b>Jordan Car Market</b></a>, you will receive a coupon to have a FREE on the first oil change and it will remain valid for 3 months </p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="b-world__item wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                        <img class="img-responsive" src="/media/about/registration_2.jpg" alt="mazda">
                        <div class="b-world__item-val">
                            <span class="b-world__item-val-title">BE SAFE BY</span>
                        </div>
                        <h2>15% OFF On The Insurance</h2>
                        <p>Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequ sem velde metus imp erdiet lacinia.</p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="b-world__item wow zoomInRight" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInRight;">
                        <img class="img-responsive" src="/media/about/mechanic_2.jpg" alt="chevrolet">
                        <div class="b-world__item-val">
                            <span class="b-world__item-val-title">OUR CUSTOMERS GET</span>
                        </div>
                        <h2>Multipoint Safety Check</h2>
                        <p>Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam. Vivamus et nunc. Nunc consequ
                            sem velde metus imp         erdiet lacinia.</p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-sm-4 col-xs-12">
                    <div class="b-world__item wow zoomInRight" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInRight;">
                        <img class="img-responsive" src="/media/about/mechanic_2.jpg" alt="chevrolet">
                        <div class="b-world__item-val">
                            <span class="b-world__item-val-title"><?= yii::t('app', 'OUR CUSTOMERS GET') ?></span>
                        </div>
                        <h2>فحص السلامة متعددة النقاط</h2>
                        <p>
                            موذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه بروشور او فلاير على سبيل المثال او نماذج مواقع انترنت
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="b-world__item wow zoomInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInUp;">
                        <img class="img-responsive" src="/media/about/registration_2.jpg" alt="mazda">
                        <div class="b-world__item-val">
                            <span class="b-world__item-val-title"><?= yii::t('app', 'BE SAFE BY') ?></span>
                        </div>
                        <h2><?= yii::t('app', '25% OFF On The Insurance') ?></h2>
                        <p>
                            موذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه بروشور او فلاير على سبيل المثال او نماذج مواقع انترنت
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="b-world__item wow zoomInLeft" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInLeft;">
                        <img class="img-responsive" src="/media/about/oil_change_3.jpg" alt="wolks">
                        <div class="b-world__item-val">
                            <span class="b-world__item-val-title"><?= yii::t('app', 'WE OFFER') ?></span>
                        </div>
                        <h2><?= yii::t('app', 'FREE Oil Change') ?></h2>
                        <p>
                            موذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه بروشور او فلاير على سبيل المثال او نماذج مواقع انترنت
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="b-more">
    <div class="container">
        <div class="row">
            <?php if ($lang_id == 1) { ?>
                <div class="col-sm-6 col-xs-12">
                    <div class="b-more__why wow zoomInLeft" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInLeft;">
                        <h2 class="s-title">WHY CHOOSE US</h2>
                        <p>Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat. Aenean vitae quam. Vivamus etyd nunc. Nunc consequsem velde metus imperdiet lacinia. Lorem ipsum dolor sit amet sed consectetur adipisicing elit sed do eiusmod.</p>
                        <ul class="s-list">
                            <li><span class="fa fa-check"></span>Donec facilisis velit eu est phasellus consequat quis nostrud</li>
                            <li><span class="fa fa-check"></span>Aenean vitae quam. Vivamus et nunc nunc conseq</li>
                            <li><span class="fa fa-check"></span>Sem vel metus imperdiet lacinia enean </li>
                            <li><span class="fa fa-check"></span>Dapibus aliquam augue fusce eleifend quisque tels</li>
                            <li><span class="fa fa-check"></span>Lorem ipsum dolor sit amet, consectetur </li>
                            <li><span class="fa fa-check"></span>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore Magna </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="b-more__info wow zoomInRight" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInRight;">
                        <h2 class="s-title">MORE INFO</h2>
                        <div class="b-more__info-block">
                            <div class="b-more__info-block-title background_grey m-active">Fair Price for Everyone<a class="j-more" href="#"><span class="fa fa-angle-down"></span></a></div>
                            <div class="b-more__info-block-inside j-inside m-active">
                                <p>Curabitur libero. Donec facilisis velit est. Phasellus consquat. Aenean vitae quam. Vivam
                                    etl nunc. Nunc con sequsem velde metus imperdiet lacinia. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                        <div class="b-more__info-block">
                            <div class="b-more__info-block-title background_grey">Large Number of Vehicles<a href="#" class="j-more"><span class="fa fa-angle-left"></span></a></div>
                            <div class="b-more__info-block-inside j-inside">
                                <p>Curabitur libero. Donec facilisis velit est. Phasellus consquat. Aenean vitae quam. Vivam
                                    etl nunc. Nunc con sequsem velde metus imperdiet lacinia. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                        <div class="b-more__info-block">
                            <div class="b-more__info-block-title background_grey">Auto Loan Available<a href="#" class="j-more"><span class="fa fa-angle-left"></span></a></div>
                            <div class="b-more__info-block-inside j-inside">
                                <p>Curabitur libero. Donec facilisis velit est. Phasellus consquat. Aenean vitae quam. Vivam
                                    etl nunc. Nunc con sequsem velde metus imperdiet lacinia. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-sm-6 col-xs-12">
                    <div class="b-more__info wow zoomInRight b-more_arabic" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInRight;">
                        <h2 class="s-title">المزيد من المعلومات</h2>
                        <div class="b-more__info-block">
                            <div class="b-more__info-block-title background_grey m-active">سعر مناسب للجميع<a class="j-more" href="#"><span class="fa fa-angle-down"></span></a></div>
                            <div class="b-more__info-block-inside j-inside m-active">
                                <p>
                                    وعند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي
                                </p>
                            </div>
                        </div>
                        <div class="b-more__info-block">
                            <div class="b-more__info-block-title background_grey">اعداد ضخمة من السيارات<a href="#" class="j-more"><span class="fa fa-angle-left"></span></a></div>
                            <div class="b-more__info-block-inside j-inside">
                                <p>
                                    وعند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي
                                </p>
                            </div>
                        </div>
                        <div class="b-more__info-block">
                            <div class="b-more__info-block-title background_grey">توفير قروض سيارات<a href="#" class="j-more"><span class="fa fa-angle-left"></span></a></div>
                            <div class="b-more__info-block-inside j-inside">
                                <p>
                                    وعند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="b-more__why b-more_arabic wow zoomInLeft" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInLeft;">
                        <h2 class="s-title">لماذا تختارنا نحن</h2>
                        <p>
                            عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي. وخلافاَ للاعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب اللاتيني الكلاسيكي منذ العام 45 قبل الميلاد
                        </p>
                        <ul class="s-list">
                            <li>خسائر اللازمة ومطالبة حدة بل. الآخر الحلفاء أن غزو, إجلاء وتنامت عدد مع. لقهر <span class="fa fa-check"></span></li>
                            <li>حتى هاربر موسكو ثم, وتقهقر المنتصرة حدة عل, التي فهرست واشتدّت أن أسر<span class="fa fa-check"></span></li>
                            <li>شد الثقيل المنتصر ثم, أسر قررت تم. وغير تصفح الحزب <span class="fa fa-check"></span></li>
                            <li>كما أن وقام وبدأت, لم أدوات للمجهود<span class="fa fa-check"></span></li>
                            <li>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض<span class="fa fa-check"></span></li>
                            <li>>العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه<span class="fa fa-check"></span</li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>