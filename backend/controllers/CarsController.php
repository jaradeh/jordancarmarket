<?php

namespace backend\controllers;

use Yii;
use yii\db\Query;
use backend\models\Cars;
use backend\models\Make;
use backend\models\Model;
use backend\models\Years;
use backend\models\CarFeatures;
use backend\models\CarsImages;
use backend\models\CarsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;
use common\models\User;
use backend\models\CarsFeaturesMainCategory;
use backend\models\CarsFeaturesCategory;

/**
 * CarsController implements the CRUD actions for Cars model.
 */
class CarsController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionChangelive() {
        $car_id = $_GET['id'];

        $change_to_live = Yii::$app->db->createCommand('UPDATE cars
        SET status = 3
        WHERE id = ' . $car_id . '; ')
                ->execute();
        return $this->redirect('/backend/web/cars/pending');
    }
    
    
    
    public function actionChangepending() {
        $car_id = $_GET['id'];

        $change_to_live = Yii::$app->db->createCommand('UPDATE cars
        SET status = 1
        WHERE id = ' . $car_id . '; ')
                ->execute();
        return $this->redirect('/backend/web/cars/live');
    }
    
    public function actionChangecancel() {
        $car_id = $_GET['id'];

        $change_to_live = Yii::$app->db->createCommand('UPDATE cars
        SET status = 2
        WHERE id = ' . $car_id . '; ')
                ->execute();
        return $this->redirect('/backend/web/cars/live');
    }

    /**
     * Lists live Cars models.
     * @return mixed
     */
    public function actionLive() {
        $model = Cars::find()->where(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
        $searchModel = new CarsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('live', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model,
        ]);
    }

    /**
     * Lists pending Cars models.
     * @return mixed
     */
    public function actionPending() {
        $model_1 = Cars::find()->where(['status' => 1])->all();
        $model_2 = Cars::find()->where(['status' => 2])->all();
        $model = array_merge($model_1, $model_2);
        $searchModel = new CarsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('pending', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model,
        ]);
    }

    /**
     * Lists all Cars models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CarsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cars model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cars model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

        if (!\Yii::$app->user->isGuest) {
            $model = new Cars();
            $model_images = new CarsImages();

            $old_model_id = Cars::find()->orderBy(['id' => SORT_DESC])->one();
            if (sizeof($old_model_id) < 1) {
                $project_id_for_images = 1;
            } else {
                $project_id_for_images = (int) $old_model_id->id + 1;
            }



            if ($model->load(Yii::$app->request->post())) {

                $post = Yii::$app->request->post();
                $make_id = $post['Cars']['make_id'];
                $model_id = $post['Cars']['model_id'];
                $year_id = $post['Cars']['year'];
                $get_make = Make::find()->where(['id' => $make_id])->one();
                $get_model = Model::find()->where(['id' => $model_id])->one();
                $get_year = Years::find()->where(['id' => $year_id])->one();
                $model->name = $get_make['name'] . " " . $get_model['name'];
                $model->title = $get_make['name'] . " " . $get_model['name'] . " " . $get_year['name'];
                $model->description = "Empty Description";
//                die($model->name);
//                die(var_dump($post));
                $size_of_features = sizeof($post['check']);
                $car_features = $post['check'];

                function manageImageInspection($image) {
                    $image_extention = $image->extension;
                    if ($image_extention == "jpg" || $image_extention == "jpeg" || $image_extention == "png") {
                        if ($image->saveAs($full_path = dirname(__FILE__) . '/../../' . "/frontend/web/media/inspection/original/" . $inspection_image_name = $path = time() . "_" . Yii::$app->security->generateRandomString() . '.' . $image->extension)) {
                            $array = array(0, 1);
                            $waterMark_image = dirname(__FILE__) . '/../../' . "/frontend/web/images/logo/logo_1.png";
//                            Image::watermark($full_path, $waterMark_image, $array)
//                                    ->resize(new Box(284, 251))
//                                    ->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/284x251/" . $path, ['quality' => 50]);


                            $watermarkImage = dirname(__FILE__) . '/../../' . '/frontend/web/images/watermark/watermark_arabic_dark.png';
                            $image = $full_path;
                            $newImage = Image::watermark($image, $watermarkImage);
                            $newImage->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/inspection/arabic_dark/" . $inspection_image_name);

                            $watermarkImage = dirname(__FILE__) . '/../../' . '/frontend/web/images/watermark/watermark_arabic_white.png';
                            $image = $full_path;
                            $newImage = Image::watermark($image, $watermarkImage);
                            $newImage->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/inspection/arabic_white/" . $inspection_image_name);


                            $watermarkImage = dirname(__FILE__) . '/../../' . '/frontend/web/images/watermark/watermark_english_dark.png';
                            $image = $full_path;
                            $newImage = Image::watermark($image, $watermarkImage);
                            $newImage->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/inspection/english_dark/" . $inspection_image_name);


                            $watermarkImage = dirname(__FILE__) . '/../../' . '/frontend/web/images/watermark/watermark_english_white.png';
                            $image = $full_path;
                            $newImage = Image::watermark($image, $watermarkImage);
                            $newImage->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/inspection/english_white/" . $inspection_image_name);



//
//                            $thumbnail = Image::thumbnail($full_path, $img_size, $img_size);
//                            $size = $thumbnail->getSize();
//                            if ($size->getWidth() < $img_size or $size->getHeight() < $img_size) {
//                                $white = Image::getImagine()->create(new Box($img_size, $img_size));
//                                $thumbnail = $white->paste($thumbnail, new Point($img_size / 2 - $size->getWidth() / 2, $img_size / 2 - $size->getHeight() / 2));
//                            }
//                            $thumbnail->save($save_path);


                            return $path;
                        } else {
                            return "error";
                        }
                    } else {
                        return "not image";
                    }
                }

                function manageImage($image) {
                    $image_extention = $image->extension;
                    if ($image_extention == "jpg" || $image_extention == "jpeg" || $image_extention == "png") {
                        if ($image->saveAs($full_path = dirname(__FILE__) . '/../../' . "/frontend/web/media/original/" . $path = time() . "_" . Yii::$app->security->generateRandomString() . '.' . $image->extension)) {

                            Image::thumbnail($full_path, 80, 65)
                                    ->resize(new Box(80, 65))
                                    ->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/80x65/" . $path);
                            
                            Image::thumbnail($full_path, 284, 251)
                                    ->resize(new Box(284, 251))
                                    ->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/284x251/" . $path);

                            Image::thumbnail($full_path, 620, 485)
                                    ->resize(new Box(620, 485))
                                    ->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/620x485/" . $path);

                            Image::thumbnail($full_path, 115, 85)
                                    ->resize(new Box(115, 85))
                                    ->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/115x85/" . $path);

                            Image::thumbnail($full_path, 270, 150)
                                    ->resize(new Box(270, 150))
                                    ->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/270x150/" . $path);


                            return $path;
                        } else {
                            return "error";
                        }
                    } else {
                        return "not image";
                    }
                }

                $path = $model->image = UploadedFile::getInstance($model, "image");
                $inspection = $model->inspection = UploadedFile::getInstance($model, "inspection");
                $images = $model_images->images = UploadedFile::getInstances($model_images, 'images');


                if (($model->image)) {
                    $manage_image = manageImage($model->image);
                    if ($manage_image == "not image") {
                        Yii::$app->session->setFlash('error', 'images must be image (jpg or jpeg or png');
                        return $this->redirect(['projects/create']);
                    } else if ($manage_image == "error") {
                        Yii::$app->session->setFlash('error', 'Something went wrong, could not upload images');
                        return $this->redirect(['projects/create']);
                    } else {
                        $model->image = $manage_image;
                        Yii::$app->session->setFlash('success', 'image successfully uploaded!');
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'image cannot be empty!');
                    return $this->redirect(['projects/create']);
                }




                if (($model->inspection)) {
                    $manage_image = manageImageInspection($model->inspection);
                    if ($manage_image == "not image") {
                        Yii::$app->session->setFlash('error', 'images must be image (jpg or jpeg or png');
                        return $this->redirect(['projects/create']);
                    } else if ($manage_image == "error") {
                        Yii::$app->session->setFlash('error', 'Something went wrong, could not upload images');
                        return $this->redirect(['projects/create']);
                    } else {
                        $model->inspection = $manage_image;
                        Yii::$app->session->setFlash('success', 'image successfully uploaded!');
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'image cannot be empty!');
                    return $this->redirect(['projects/create']);
                }




                $array = "";
                $error_1 = "";
                $size_of_images = sizeof($images);
                for ($i = 0; $i < $size_of_images; $i++) {
                    $upload_image = $images[$i];
                    $manage_images = manageImage($upload_image);
                    if ($manage_images == "not image") {
                        Yii::$app->session->setFlash('error', $images[$i] . ' Not Image');
                    } else if ($manage_images == "error") {
                        Yii::$app->session->setFlash('error', $images[$i] . ' Error');
                    } else {
                        $model_images->car_id = $project_id_for_images;
                        $new_image = $model_images->images = $manage_images;
                        $save_into_images = Yii::$app->db->createCommand('INSERT INTO cars_images (car_id,images)
				VALUES (
				"' . $project_id_for_images . '",
				"' . $new_image . '")')
                                ->execute();
                    }
                }


                if ($size_of_features > 0) {
                    foreach ($car_features as $car_feat => $features) {
                        $save_into_features = Yii::$app->db->createCommand('INSERT INTO car_features (car_id,cat_id)
				VALUES (
				"' . $project_id_for_images . '",
				"' . $features . '")')
                                ->execute();
                    }
                }




                if (!$model->save()) {
                    die(var_dump($model->errors));
                } else {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                return $this->redirect(['/cars']);
            } else {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        } else {
            return $this->redirect('/login');
        }
    }

    /**
     * Updates an existing Cars model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cars model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cars model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cars the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Cars::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
