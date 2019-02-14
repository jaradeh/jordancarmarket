<?php

namespace frontend\controllers;

use Yii;
use yii\db\Expression;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use backend\models\Contact;
use common\models\User;
use backend\models\Make;
use backend\models\Cars;
use backend\models\Milage;
use backend\models\BodyType;
use backend\models\Colors;
use app\models\UploadForm;
use yii\web\UploadedFile;
use backend\models\Model;
use backend\models\ModelCategory;
use backend\models\FavList;
use yii\helpers\Json;
use yii\data\Pagination;
use backend\models\CarsFeaturesMainCategory;
use backend\models\CarsFeaturesCategory;
use backend\models\Stores;
use backend\models\Years;
use backend\models\CarFeatures;

/**
 * Site controller
 */
class SiteController extends Controller {

    public function init() {
        parent::init();
        $session = Yii::$app->session;

//        $session['cookieAgreement'] = 1;
//        $session['firstOpenModal'] = 1;

        if (isset($_GET['language'])) {
            $lang = $_GET['language'];
            $action = $_GET['action'];
            $session['language'] = $lang;
            if ($lang == "en-US") {
                $lang_id = "1";
            }
            if ($lang == "fr-FR") {
                $lang_id = "2";
            }
            if ($lang == "ar-AR") {
                $lang_id = "3";
            }
            $session['language_id'] = $lang_id;

            if ($action == "index") {
                $this->goHome();
            } else {
                $this->redirect($action);
            }
        }
        if ($session['language'] == "" || empty($session['language'])) {
            $session['language'] = "en-US";
            $session['language_id'] = "1";
        }
        Yii::$app->language = $session['language'];

        if ($session['cookieAgreement'] == "" || empty($session['cookieAgreement'])) {
            $session['cookieAgreement'] = 1;
        }
        if ($session['firstOpenModal'] == "" || empty($session['firstOpenModal'])) {
            $session['firstOpenModal'] = 1;
        }

        if ($session['firstOpenModal'] == "" || empty($session['firstOpenModal']) || $session['firstOpenModal'] == 1) {
            $session['firstOpenModal'] == 1;
        }
    }

    public function actionCookieagreement() {
        $session = Yii::$app->session;
        if (isset($_GET['cookieAgreement'])) {
            $session['cookieAgreement'] = 2;
            return 2;
        }
    }

    public function actionFirstopenmodal() {
        $session = Yii::$app->session;
        if (isset($_POST['firstOpenModal'])) {
            $session['firstOpenModal'] = 2;
            return 1;
        }
    }

    public function actionLang() {

        $session = Yii::$app->session;
        if (isset($_GET['language'])) {
            $lang = $_GET['language'];
            $action = $_GET['action'];
            $session['language'] = $lang;
            if ($lang == "en-US") {
                $lang_id = "1";
                Yii::$app->language = "en-US";
            }
            if ($lang == "ar-AR") {
                $lang_id = "2";
                Yii::$app->language = "ar-AR";
            }
            $session['language_id'] = $lang_id;

            if ($action == "index") {
                $this->goHome();
            } elseif ($action == "create") {
                $random_key = Yii::$app->security->generateRandomString(32);
                $random_key = preg_replace('/[^a-zA-Z0-9]/', '', $random_key);
                $this->redirect('/cars/create/' . $random_key);
            } else if ($action == "view") {
                $this->redirect('/cars');
            } else {
                $this->redirect($action);
            }
        }
        if ($session['language'] == "" || empty($session['language'])) {
            $session['language'] = "en-US";
            $session['language_id'] = "1";
        }
        Yii::$app->language = $session['language'];
    }

    public function actionLangandfirstopen() {

        $session = Yii::$app->session;
        $session['firstOpenModal'] = 2;
        if (isset($_GET['language'])) {
            $lang = $_GET['language'];
            $action = $_GET['action'];
            $session['language'] = $lang;
            if ($lang == "en-US") {
                $lang_id = "1";
                Yii::$app->language = "en-US";
            }
            if ($lang == "ar-AR") {
                $lang_id = "2";
                Yii::$app->language = "ar-AR";
            }
            $session['language_id'] = $lang_id;

            $this->goHome();
        }
        if ($session['language'] == "" || empty($session['language'])) {
            $session['language'] = "en-US";
            $session['language_id'] = "1";
        }
        Yii::$app->language = $session['language'];
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'oAuthSuccess'],
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action) {
        $session = Yii::$app->session;
        if ($session['firstOpenModal'] === 1) {
//            $this->redirect('/site/cars');
        }


        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function successCallback($client) {
        $attributes = $client->getUserAttributes();
        // user login or signup comes here
        /*
          Checking facebook email registered yet?
          Maxsure your registered email when login same with facebook email
          die(print_r($attributes));
         */
        //die(print_r($attributes));
        $user = \common\models\User::find()->where(['email' => $attributes['email']])->one();
        if (!empty($user)) {
            Yii::$app->user->login($user);
        } else {
            // Save session attribute user from FB
            $session = Yii::$app->session;
            $session['attributes'] = $attributes;
            // redirect to form signup, variabel global set to successUrl
            $this->successUrl = \yii\helpers\Url::to(['index']);
        }
    }

    public $successUrl = 'Success';

    public function oAuthSuccess($client) {
        $attributes = $client->getUserAttributes();
        //die(var_dump($attributes));
        if (!empty($attributes['email']) && $attributes['email'] != "") {
            $user = \common\models\User::find()->where(['email' => $attributes['email']])->one();
            if (!empty($user)) {
                Yii::$app->user->login($user);
            } else {
                $model = new SignupForm();
                $model->username = $attributes['name'];
                $model->pass = "testingfacebook123123";
                $model->password = "testingfacebook123123";
                $model->email = $attributes['email'];

                if ($user = $model->signup()) {
                    $user = \common\models\User::find()->where(['email' => $attributes['email']])->one();
                    Yii::$app->user->login($user);
                }
            }
        } else {
            if (empty($attributes['email']) || $attributes['email'] == "") {
                $attributes['email'] = $attributes['screen_name'] . "@gmail.com";
            }
            $model = new SignupForm();
            $model->username = $attributes['name'];
            $model->pass = "testingfacebook123123";
            $model->password = "testingfacebook123123";
            $model->email = $attributes['email'];

            if ($user = $model->signup()) {
                $user = \common\models\User::find()->where(['email' => $attributes['email']])->one();
                Yii::$app->user->login($user);
            }
        }
    }

    public function actionGetmodel() {
        $make_id = $_POST['id'];

        $customers = Model::find()
                ->select('*')
                ->leftJoin('model_category', '`model_category`.`make_id` = `model`.`id`')
                ->where(['model.make_id' => $make_id])
                ->with('modelcat')
                ->all();

        return Json::encode($customers);
    }

    public function actionAddtofavlist() {
        $listing_id = $_POST['id'];
        $user_id = Yii::$app->user->getId();
        $model = new FavList();
        $check_fav_list = FavList::find()->where(['listing_id' => $listing_id])->one();
        if (sizeof($check_fav_list) > 0) {
            if ($check_fav_list->status == 2) {
                if ($save_into_fav_list = Yii::$app->db->createCommand('
                    UPDATE fav_list
                    SET status = 1
                    WHERE listing_id = "' . $listing_id . '" ')
                        ->execute()) {
                    return 1;
                } else {
                    return 3;
                }
            } else {
                return 2;
            }
        } else {
            if ($save_into_fav_list = Yii::$app->db->createCommand('INSERT INTO fav_list (listing_id,user_id,status,date_added)
				VALUES (
				"' . $listing_id . '",
				"' . $user_id . '",
				"1",
				"' . time() . '")')
                    ->execute()) {
                return 1;
            } else {
                return 3;
            }
        }
    }

    public function actionRemovefromfavlist() {
        $listing_id = $_POST['id'];
        $user_id = Yii::$app->user->getId();
        $model = new FavList();
        $check_fav_list = FavList::find()->where(['listing_id' => $listing_id])->one();
//        die($check_fav_list->id);
        if (sizeof($check_fav_list) > 0) {
            if ($check_fav_list->status == 1) {
                if ($save_into_fav_list = Yii::$app->db->createCommand('
                    UPDATE fav_list
                    SET status = 2
                    WHERE listing_id = "' . $listing_id . '" ')
                        ->execute()) {
                    return 1;
                } else {
                    return 3;
                }
            } else {
                return 3;
            }
        } else {
            return 2;
        }
    }

    /**
     * Displays home page.
     *
     * @return mixed
     */
    public function actionIndex() {
        $session = Yii::$app->session;
        $lang_id = $session['language_id'];
        $model_make = new Make();
        $model_car = new Cars();
        $get_make = Make::find()->where(['lang_id' => $lang_id])->all();
        $get_cars_featured = Cars::find()->where(['featured' => 1])->andWhere(['status' => 3])->andWhere(['lang_id' => $lang_id])->limit(6)->orderBy(['id' => SORT_DESC])->all();
        $featured_cars_size = sizeof($get_cars_featured);
        if ($featured_cars_size < 6) {
            $hot_cars_limit = 6 - $featured_cars_size;
            $get_cars_hot = Cars::find()->where(['ad_type' => 2])->andWhere(['status' => 3])->andWhere(['lang_id' => $lang_id])->limit($hot_cars_limit)->orderBy(['id' => SORT_DESC])->all();
        } else {
            $get_cars_hot = array();
        }
        $hot_car_size = sizeof($get_cars_hot);
        $total_cars_featured_and_hot = $featured_cars_size + $hot_car_size;
        if ($total_cars_featured_and_hot < 6) {
            $regular_cars_limit = 6 - $total_cars_featured_and_hot;
            $get_regular_cars = Cars::find()->where(['status' => 3])->andWhere(['lang_id' => $lang_id])->limit($regular_cars_limit)->orderBy(['id' => SORT_DESC])->all();
        } else {
            $get_regular_cars = array();
        }
        $get_cars = array_merge($get_cars_featured, $get_cars_hot, $get_regular_cars);
        $get_cars_make = Make::find()->where(['lang_id' => $lang_id])->limit(8)->all();
        $select_milage = Milage::find()->all();
        $select_car_main_features_category = CarsFeaturesMainCategory::find()->where(['lang_id' => $lang_id])->all();
        $select_car_features_category = CarsFeaturesCategory::find()->where(['lang_id' => $lang_id])->all();
        $select_colors = Colors::find()->all();
        $select_stores = Stores::find()->where(['location' => 1])->limit(5)->orderBy(new Expression('rand()'))->all();
        $select_stores_dealership = Stores::find()->where(['location' => 2])->limit(5)->orderBy(new Expression('rand()'))->all();
        return $this->render('index', [
                    'make_details' => $get_make,
                    'cars' => $get_cars,
                    'get_cars_make' => $get_cars_make,
                    'select_milage' => $select_milage,
                    'select_car_main_features_category' => $select_car_main_features_category,
                    'select_car_features_category' => $select_car_features_category,
                    'select_colors' => $select_colors,
                    'select_stores' => $select_stores,
                    'select_stores_dealership' => $select_stores_dealership,
        ]);
    }

    /**
     * Displays Amman show rooms page.
     *
     * @return mixed
     */
    public function actionAmmanShowRooms() {
        $session = Yii::$app->session;
        $lang_id = $session['language_id'];
        $get_make = Make::find()->where(['lang_id' => $lang_id])->all();
        $select_milage = Milage::find()->all();
        $select_colors = Colors::find()->all();
        $select_stores = Stores::find()->where(['location' => 1])->orderBy(['id' => SORT_DESC])->all();
        $select_car_main_features_category = CarsFeaturesMainCategory::find()->where(['lang_id' => $lang_id])->all();
        $select_car_features_category = CarsFeaturesCategory::find()->where(['lang_id' => $lang_id])->all();
        return $this->render('amman-show-rooms', [
                    'make_details' => $get_make,
                    'select_milage' => $select_milage,
                    'select_car_main_features_category' => $select_car_main_features_category,
                    'select_car_features_category' => $select_car_features_category,
                    'select_colors' => $select_colors,
                    'select_stores' => $select_stores,
        ]);
    }

    /**
     * Displays Free Zone page.
     *
     * @return mixed
     */
    public function actionFreeZone() {
        $session = Yii::$app->session;
        $lang_id = $session['language_id'];
        $get_make = Make::find()->where(['lang_id' => $lang_id])->all();
        $select_milage = Milage::find()->all();
        $select_colors = Colors::find()->all();
        $select_stores = Stores::find()->where(['location' => 1])->orderBy(['id' => SORT_DESC])->all();
        $select_car_main_features_category = CarsFeaturesMainCategory::find()->where(['lang_id' => $lang_id])->all();
        $select_car_features_category = CarsFeaturesCategory::find()->where(['lang_id' => $lang_id])->all();
        return $this->render('free-zone', [
                    'make_details' => $get_make,
                    'select_milage' => $select_milage,
                    'select_car_main_features_category' => $select_car_main_features_category,
                    'select_car_features_category' => $select_car_features_category,
                    'select_colors' => $select_colors,
                    'select_stores' => $select_stores,
        ]);
    }

    /**
     * Displays dealerships page.
     *
     * @return mixed
     */
    public function actionDealerships() {
        $session = Yii::$app->session;
        $lang_id = $session['language_id'];
        $get_make = Make::find()->where(['lang_id' => $lang_id])->all();
        $select_milage = Milage::find()->all();
        $select_colors = Colors::find()->all();
        $select_car_main_features_category = CarsFeaturesMainCategory::find()->where(['lang_id' => $lang_id])->all();
        $select_car_features_category = CarsFeaturesCategory::find()->where(['lang_id' => $lang_id])->all();
        return $this->render('dealerships', [
                    'make_details' => $get_make,
                    'select_milage' => $select_milage,
                    'select_car_main_features_category' => $select_car_main_features_category,
                    'select_car_features_category' => $select_car_features_category,
                    'select_colors' => $select_colors
        ]);
    }

    /**
     * Displays about.
     *
     * @return mixed
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Displays privacy-policy.
     *
     * @return mixed
     */
    public function actionPrivacyPolicy() {
        return $this->render('privacy-policy');
    }

    /**
     * Displays terms-conditions.
     *
     * @return mixed
     */
    public function actionTermsConditions() {
        return $this->render('terms-conditions');
    }

    /**
     * Displays first-page.
     *
     * @return mixed
     */
    public function actionFirstPage() {
        $session = Yii::$app->session;
        $first = $session['firstOpenModal'];
        if ($first == 1) {
            return $this->render('first-page');
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays cars.
     *
     * @return mixed
     */
    public function actionCars() {

        $session = Yii::$app->session;
        $lang_id = $session['language_id'];
        $lang = $session['language'];
        $request = Yii::$app->request;
        if ($request->get('cars_search') && $request->get('cars_search') != "none_filter") {
            $model = new Cars();
            $cars_language = $request->get('cars_language');
            if ($cars_language == "1") {
                $get_cars_by_language = Cars::find()->where(['lang_id' => $lang_id])->andWhere(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
            } else if ($cars_language == "0") {
                $get_cars_by_language = Cars::find()->all();
            } else {
                $get_cars_by_language = array();
            }
            $name = $request->get('name');
            if ($name != "") {
                $get_by_name = Cars::find()->where(['like', 'name', $name . '%', false])->andWhere(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
            } else {
                $get_by_name = array();
            }
            $make = $request->get('make');
            if ($make != "") {
                $get_by_make = Cars::find()->where(['make_id' => $make])->andWhere(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
            } else {
                $get_by_make = array();
            }
            $model = $request->get('model');
            if ($model != "") {
                $get_by_model = Cars::find()->where(['model_id' => $model])->andWhere(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
            } else {
                $get_by_model = array();
            }

            $price_from = $request->get('price_from');
            $price_to = $request->get('price_to');



            if ($price_from != 0) {
                $price_from = preg_replace('[\D]', '', $request->get('price_from'));
            } else {
                $price_from = 0;
            }
            if ($price_to != 0) {
                $price_to = preg_replace('[\D]', '', $request->get('price_to'));
            } else {
                $price_to = 0;
            }
//            die("From : ".$price_from . " <br /> To :".$price_to);
            if ($price_from != 0 && $price_to != 0) {
                $get_by_price = Cars::find()->where(['between', 'price', $price_from, $price_to])->andWhere(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
            } else {
                $get_by_price = array();
            }


            $condition = $request->get('condition');
            if ($condition != "") {
                $get_by_condition = Cars::find()->where(['condition_id' => $condition])->andWhere(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
            } else {
                $get_by_condition = array();
            }
            $milage = $request->get('milage');
            if ($milage != "") {
                $get_by_milage = Cars::find()->where(['milage' => $milage])->andWhere(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
            } else {
                $get_by_milage = array();
            }
            $type = $request->get('body_type');
            if ($type != "") {
                $get_by_type = Cars::find()->where(['body_type' => $type])->andWhere(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
            } else {
                $get_by_type = array();
            }
            $location = $request->get('car_location');
            if ($location != "") {
                $get_by_location = Cars::find()->where(['location' => $location])->andWhere(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
            } else {
                $get_by_location = array();
            }
            $color = $request->get('car_color');
            if ($color != "") {
                $get_by_color = Cars::find()->where(['exterior_color' => $color])->andWhere(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
            } else {
                $get_by_color = array();
            }
            $transmission = $request->get('car_transmission');
            if ($transmission != "") {
                $get_by_transmission = Cars::find()->where(['transmission' => $transmission])->andWhere(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
            } else {
                $get_by_transmission = array();
            }
            $engine = $request->get('car_engine');
            if ($engine != "") {
                $get_by_engine = Cars::find()->where(['engine' => $engine])->andWhere(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
            } else {
                $get_by_engine = array();
            }
            $all_data = array_merge($get_cars_by_language, $get_by_name, $get_by_make, $get_by_model, $get_by_price, $get_by_condition, $get_by_milage, $get_by_milage, $get_by_type, $get_by_type, $get_by_location, $get_by_location, $get_by_color, $get_by_transmission, $get_by_engine);

//            die(var_dump($all_data));
            new Cars();
            new Make();
            new Milage();
            new BodyType();
            new Colors();

//            $countQuery = clone $all_data;
            $pages = new Pagination([
                'totalCount' => sizeof($all_data),
                'pageSize' => 12,
                'pageParam' => 'start',
                'defaultPageSize' => 10,
                'forcePageParam' => false,
            ]);

            $select_cars = Cars::find()->where(['lang_id' => $lang_id])->andWhere(['status' => 3])->all();
            $make_details = Make::find()->where(['lang_id' => $lang_id])->orderBy(['name' => SORT_ASC])->all();
            $select_milage = Milage::find()->all();
            $select_body_type = BodyType::find()->all();
            $select_colors = Colors::find()->all();
            return $this->render('cars', [
                        'make_details' => $make_details,
                        'select_milage' => $select_milage,
                        'select_body_type' => $select_body_type,
                        'select_colors' => $select_colors,
                        'cars' => $all_data,
                        'all_cars' => $select_cars,
                        'pages' => $pages,
            ]);
        } else {
            new Cars();
            new Make();
            new Milage();
            new BodyType();
            new Colors();

            $select_cars = Cars::find()->where(['lang_id' => $lang_id])->andWhere(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
            $make_details = Make::find()->where(['lang_id' => $lang_id])->orderBy(['name' => SORT_ASC])->all();
            $select_milage = Milage::find()->all();
            $select_body_type = BodyType::find()->all();
            $select_colors = Colors::find()->all();




            $querys = new Query;
            $querys->select(['*', 'make.name as make_name', 'model.name as model_name', 'years.name as year_name'])
                    ->from('cars')
                    ->where(['cars.status' => 3])
                    ->where(['cars.lang_id' => $lang_id])
                    ->leftJoin('make', 'make.id = cars.make_id')
                    ->leftJoin('model', 'model.id = cars.model_id')
                    ->leftJoin('years', 'years.id = cars.year');

            $command = $querys->createCommand();
            $querys = $command->queryAll();





            $query = Cars::find(['*', 'make.name as make_name'])
                    ->joinWith('make', 'make.id = cars.make_id')
                    ->where(['status' => 3])
                    ->andwhere(['cars.lang_id' => $lang_id])
                    ->orderBy(['featured' => SORT_ASC, 'id' => SORT_DESC]);


            $countQuery = clone $query;
            $pages = new Pagination([
                'totalCount' => $countQuery->count(),
                'pageSize' => 12,
                'pageParam' => 'start',
                'defaultPageSize' => 10,
                'forcePageParam' => false,
            ]);
            $models = $query->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all();







            return $this->render('cars', [
                        'cars' => $models,
                        'all_cars' => $select_cars,
                        'make_details' => $make_details,
                        'select_milage' => $select_milage,
                        'select_body_type' => $select_body_type,
                        'select_colors' => $select_colors,
                        'pages' => $pages,
            ]);
        }
    }

    /**
     * Displays compare.
     *
     * @return mixed
     */
    public function actionCompare() {
        $session = Yii::$app->session;
        $lang_id = $session['language_id'];
        if (isset($_GET['car_1'])) {
            $id = $_GET['car_1'];
            $select_car_1 = Cars::find()->where(['slug' => $id])->one();
            $select_car_1_make = Make::find()->where(['id' => $select_car_1->make_id])->one();
            $select_car_1_model = Model::find()->where(['id' => $select_car_1->make_id])->one();
            $select_car_1_year = Years::find()->where(['id' => $select_car_1->year])->one();

            if (isset($_GET['car_2']) && $_GET['car_2'] != "none") {
                $id2 = $_GET['car_2'];
                $select_car_2 = Cars::find()->where(['slug' => $id2])->one();
                $select_car_2_make = Make::find()->where(['id' => $select_car_2->make_id])->one();
                $select_car_2_model = Model::find()->where(['id' => $select_car_2->make_id])->one();
                $select_car_2_year = Years::find()->where(['id' => $select_car_2->year])->one();
            } else {
                $select_car_2 = "";
                $select_car_2_make = "";
                $select_car_2_model = "";
                $select_car_2_year = "";
            }

            if (isset($_GET['car_3']) && $_GET['car_3'] != "none") {
                $id3 = $_GET['car_3'];
                $select_car_3 = Cars::find()->where(['slug' => $id3])->one();
                $select_car_3_make = Make::find()->where(['id' => $select_car_3->make_id])->one();
                $select_car_3_model = Model::find()->where(['id' => $select_car_3->make_id])->one();
                $select_car_3_year = Years::find()->where(['id' => $select_car_3->year])->one();
            } else {
                $select_car_3 = "";
                $select_car_3_make = "";
                $select_car_3_model = "";
                $select_car_3_year = "";
            }


            $select_car_main_features_category = CarsFeaturesMainCategory::find()->where(['lang_id' => $lang_id])->all();
            $select_car_features_category = CarsFeaturesCategory::find()->where(['lang_id' => $lang_id])->all();
            return $this->render('compare', [
                        'select_car_main_features_category' => $select_car_main_features_category,
                        'select_car_features_category' => $select_car_features_category,
                        'car_1' => $select_car_1,
                        'car_1_make' => $select_car_1_make,
                        'car_1_model' => $select_car_1_model,
                        'car_1_year' => $select_car_1_year,
                        'car_2' => $select_car_2,
                        'car_2_make' => $select_car_2_make,
                        'car_2_model' => $select_car_2_model,
                        'car_2_year' => $select_car_2_year,
                        'car_3' => $select_car_3,
                        'car_3_make' => $select_car_3_make,
                        'car_3_model' => $select_car_3_model,
                        'car_3_year' => $select_car_3_year,
            ]);
        } else {
            $session = Yii::$app->session;
            $lang_id = $session['language_id'];
            $select_car_main_features_category = CarsFeaturesMainCategory::find()->where(['lang_id' => $lang_id])->all();
            $select_car_features_category = CarsFeaturesCategory::find()->where(['lang_id' => $lang_id])->all();
            return $this->render('compare', [
                        'select_car_main_features_category' => $select_car_main_features_category,
                        'select_car_features_category' => $select_car_features_category,
            ]);
        }
    }

    public function actionSignupSeller() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $post = Yii::$app->request->post();

            $password = $post['SignupForm']['password'];
            $confirm_password = $post['SignupForm']['confirm_password'];
            $model->login_status = 2;
            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
//                    return $this->redirect('/');
//                }
            }
            return $this->redirect('/');
        }

        return $this->render('signup-seller', [
                    'model' => $model,
        ]);
    }

    public function actionGetcarsforcompare() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $get_car = Cars::find()->where(['id' => $id])->one();
            $get_make = Make::find()->where(['id' => $get_car->make_id])->one();
            $get_model = Model::find()->where(['id' => $get_car->model_id])->one();
            $get_year = Years::find()->where(['id' => $get_car->year])->one();

            $arr = array('car' => $get_car->name, 'slug' => $get_car->slug, 'image' => $get_car->image, 'make' => $get_make->name, 'model' => $get_model->name, 'year' => $get_year->name);

            return json_encode($arr);
        } else {
            return "No data";
        }
    }

    /**
     * Displays Services.
     *
     * @return mixed
     */
    public function actionServices() {
        return $this->render('services');
    }

    /**
     * Displays profile.
     *
     * @return mixed
     */
    public function actionProfile() {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if (isset($_POST['username'])) {
            return $this->goBack();
        } else {
            return $this->render('profile');
        }
    }

    /**
     * Displays MyMessages.
     *
     * @return mixed
     */
    public function actionMyMessages() {
        return $this->render('my-messages');
    }

    /**
     * Displays my Listings.
     *
     * @return mixed
     */
    public function actionMyListings() {
        if (!\Yii::$app->user->isGuest) {
            $user_data = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
            return $this->render('my-listings', [
                        'data' => $user_data,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays Favorite Listings.
     *
     * @return mixed
     */
    public function actionFavoriteListings() {
        if (!\Yii::$app->user->isGuest) {
            $user_data = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
            return $this->render('favorite-listings', [
                        'data' => $user_data,
            ]);
        } else {
            return $this->goHome();
        }
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $model = new Contact();
        $success = "";
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            die(var_dump($post));
            $model->save();
            $model->sendItEmail();
            return $this->redirect(['/contact']);
            $success = "Successfully sent";
        } else {
            return $this->render('contact', [
                        'model' => $model,
                        'success' => $success,
            ]);
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login() && $model->validate()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $post = Yii::$app->request->post();

            $password = $post['SignupForm']['password'];
            $confirm_password = $post['SignupForm']['confirm_password'];
            $model->login_status = 1;
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->redirect('/');
                }
            }
            return $this->redirect('/');
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

}
