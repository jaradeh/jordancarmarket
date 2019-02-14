<?php

use backend\models\CarFeatures;
?>
<section class="b-compare s-shadow">
    <div class="container">
        <div class="b-compare__images">
            <?php if (isset($_GET['car_1'])) { ?>
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12 col-md-offset-3" style="z-index: 2;">
                        <div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomInUp;">
                            <h3><?php echo $car_1_make->name . " " . $car_1_model->name; ?></h3>
                            <img class="img-responsive center-block" src="/media/620x485/<?php echo $car_1->image ?>" alt="<?php echo $car_1->name ?>" style="width:270px;height: 180px;">
                            <div class="b-compare__images-item-price m-right"><div class="b-compare__images-item-price-vs">vs</div><?php echo number_format($car_1->price) ?> JOD</div>
                        </div>
                    </div>
                    <?php if (isset($_GET['car_2']) && $_GET['car_2'] != "none") { ?>
                        <div class="col-md-3 col-sm-4 col-xs-12 " style="z-index: 1 ;">
                            <div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomInUp;">
                                <h3><?php echo $car_2_make->name . " " . $car_2_model->name; ?></h3>
                                <img class="img-responsive center-block" src="/media/620x485/<?php echo $car_2->image ?>" alt="<?php echo $car_2->image ?>" style="width:270px;height: 180px;">
                                <div class="b-compare__images-item-price m-right m-left"><div class="b-compare__images-item-price-vs">vs</div><?php echo number_format($car_2->price) ?> JOD</div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-3 col-sm-4 col-xs-12 " style="z-index: 1 ;">
                            <div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomInUp;">
                                <h3>Mercedes E-Class 2015</h3>
                                <img class="img-responsive center-block" src="/media/270x180/mercComp.jpg" alt="merc">
                                <div class="b-compare__images-item-price m-right m-left"><div class="b-compare__images-item-price-vs">vs</div>$52,650</div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($_GET['car_3']) && $_GET['car_3'] != "none") { ?>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomInUp;">
                                <h3><?php echo $car_3_make->name . " " . $car_3_model->name; ?></h3>
                                <img class="img-responsive center-block" src="/media/620x485/<?php echo $car_3->image ?>" alt="<?php echo $car_3->image ?>" style="width:270px;height: 180px;">
                                <div class="b-compare__images-item-price m-left"><?php echo number_format($car_3->price) ?> JOD</div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomInUp;">
                                <h3>Lexus LS 2015</h3>
                                <img class="img-responsive center-block" src="/media/270x180/lexusComp.jpg" alt="lexus">
                                <div class="b-compare__images-item-price m-left">$120,440</div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12 col-md-offset-3" style="z-index: 2;">
                        <div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomInUp;">
                            <h3>Jaguar XJ 2015</h3>
                            <img class="img-responsive center-block" src="/media/270x180/jaguarComp.jpg" alt="jaguar">
                            <div class="b-compare__images-item-price m-right"><div class="b-compare__images-item-price-vs">vs</div>$90,600</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12 " style="z-index: 1 ;">
                        <div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomInUp;">
                            <h3>Mercedes E-Class 2015</h3>
                            <img class="img-responsive center-block" src="/media/270x180/mercComp.jpg" alt="merc">
                            <div class="b-compare__images-item-price m-right m-left"><div class="b-compare__images-item-price-vs">vs</div>$52,650</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomInUp;">
                            <h3>Lexus LS 2015</h3>
                            <img class="img-responsive center-block" src="/media/270x180/lexusComp.jpg" alt="lexus">
                            <div class="b-compare__images-item-price m-left">$120,440</div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php foreach ($select_car_main_features_category as $cars_main_features => $cars_main_feature) { ?>




            <div class="b-compare__block wow zoomInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomInUp;">
                <div class="b-compare__block-title s-whiteShadow m-active">
                    <h3 class="s-titleDet"><?php echo $cars_main_feature->name ?></h3>
                    <a class="j-more" href="#"><span class="fa fa-angle-down"></span></a>
                </div>
                <div class="b-compare__block-inside j-inside m-active">
                    <?php if (isset($_GET['car_1'])) { ?>
                        <div class="row">
                            <div class="col-xs-3  arabic_col_compare">
                                <div class="b-compare__block-inside-title">
                                    Make / Year
                                </div>
                            </div>
                            <div class="col-xs-3  arabic_col_compare">
                                <div class="b-compare__block-inside-value">
                                    <?php echo $car_1_make->name . " " . $car_1_year->name; ?>
                                </div>
                            </div>
                            <?php if (isset($_GET['car_2'])) { ?>
                                <div class="col-xs-3  arabic_col_compare">
                                    <div class="b-compare__block-inside-value">
                                        <?php echo $car_2_make->name . " " . $car_2_year->name; ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-xs-3  arabic_col_compare">
                                    <div class="b-compare__block-inside-value">
                                        Mercedez-Benz 2015
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (isset($_GET['car_3'])) { ?>
                                <div class="col-xs-3  arabic_col_compare">
                                    <div class="b-compare__block-inside-value">
                                        <?php echo $car_3_make->name . " " . $car_3_year->name; ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-xs-3  arabic_col_compare">
                                    <div class="b-compare__block-inside-value">
                                        Mercedez-Benz 2015
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-xs-3  arabic_col_compare">
                                <div class="b-compare__block-inside-title">
                                    Make / Year
                                </div>
                            </div>
                            <div class="col-xs-3  arabic_col_compare">
                                <div class="b-compare__block-inside-value">
                                    Jaugar 2015
                                </div>
                            </div>
                            <div class="col-xs-3  arabic_col_compare">
                                <div class="b-compare__block-inside-value">
                                    Mercedez-Benz 2015
                                </div>
                            </div>
                            <div class="col-xs-3  arabic_col_compare">
                                <div class="b-compare__block-inside-value">
                                    Lexus 2015
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php foreach ($select_car_features_category as $car_features_category => $feature_by_catid) { ?>
                        <?php if ($feature_by_catid->cat_id == $cars_main_feature->id) { ?>
                            <div class="row">
                                <div class="col-xs-3  arabic_col_compare">
                                    <div class="b-compare__block-inside-title">
                                        <?php echo $feature_by_catid->name ?>
                                    </div>
                                </div>
                                <?php if ($_GET['car_1']) { ?>
                                    <?php $find_car_1_features = CarFeatures::find()->where(['car_id' => $car_1_model->id])->andWhere(['id' => $feature_by_catid->id])->one(); ?>
                                    <?php if (sizeof($find_car_1_features) > 0) { ?>
                                        <div class="col-xs-3  arabic_col_compare">
                                            <div class="b-compare__block-inside-value">
                                                <i class='fa fa-check text-success'></i>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-xs-3  arabic_col_compare">
                                            <div class="b-compare__block-inside-value">
                                                <i class='fa fa-times text-danger'></i>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="col-xs-3  arabic_col_compare">
                                        <div class="b-compare__block-inside-value">
                                            <i class='fa fa-times text-danger'></i>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($_GET['car_2']) { ?>
                                    <?php $find_car_2_features = CarFeatures::find()->where(['car_id' => $car_2_model->id])->andWhere(['id' => $feature_by_catid->id])->one(); ?>
                                    <?php if (sizeof($find_car_2_features) > 0) { ?>
                                        <div class="col-xs-3  arabic_col_compare">
                                            <div class="b-compare__block-inside-value">
                                                <i class='fa fa-check text-success'></i>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-xs-3  arabic_col_compare">
                                            <div class="b-compare__block-inside-value">
                                                <i class='fa fa-times text-danger'></i>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="col-xs-3  arabic_col_compare">
                                        <div class="b-compare__block-inside-value">
                                            <i class='fa fa-times text-danger'></i>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($_GET['car_3']) { ?>
                                    <?php $find_car_3_features = CarFeatures::find()->where(['car_id' => $car_3_model->id])->andWhere(['id' => $feature_by_catid->id])->one(); ?>
                                    <?php if (sizeof($find_car_3_features) > 0) { ?>
                                        <div class="col-xs-3  arabic_col_compare">
                                            <div class="b-compare__block-inside-value">
                                                <i class='fa fa-check text-success'></i>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-xs-3  arabic_col_compare">
                                            <div class="b-compare__block-inside-value">
                                                <i class='fa fa-times text-danger'></i>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="col-xs-3  arabic_col_compare">
                                        <div class="b-compare__block-inside-value">
                                            <i class='fa fa-times text-danger'></i>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>

        <?php } ?>


    </div>
</section>