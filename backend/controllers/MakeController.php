<?php

namespace backend\controllers;

use Yii;
use backend\models\Make;
use backend\models\Model;
use backend\models\MakeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;

/**
 * MakeController implements the CRUD actions for Make model.
 */
class MakeController extends Controller {

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

    /**
     * Lists all Make models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new MakeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Make model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single Make model.
     * @param integer $id
     * @return mixed
     */
    public function actionCheckModels() {
        $make_id = $_GET['make_id'];
        $make_name = $_GET['make_name'];
        $make_make = new Make();
        $make_model = new Model();
        $find_all_models = Model::find()->where(['make_id' => $make_id])->all();
        return $this->render('check-models', [
                    'make_name' => $make_name,
                    'make_id' => $make_id,
                    'models' => $find_all_models
        ]);
    }

    /**
     * Creates a new Make model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Make();

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            
            function manageImage($image) {
                $image_extention = $image->extension;
                if ($image_extention == "jpg" || $image_extention == "jpeg" || $image_extention == "png") {
                    if ($image->saveAs($full_path = dirname(__FILE__) . '/../../' . "/frontend/web/media/car_logo_original/" . $path = time() . "_" . Yii::$app->security->generateRandomString() . '.' . $image->extension)) {

                        Image::resize($full_path, 60, 42)
                                ->resize(new Box(60, 42))
                                ->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/car_logo/" . $path, ['quality' => 50]);

                        return $path;
                    } else {
                        return "error";
                    }
                } else {
                    return "not image";
                }
            }

            $path = $model->path = UploadedFile::getInstance($model, "path");
            if (($model->path)) {
                $manage_image = manageImage($model->path);
                if ($manage_image == "not image") {
                    Yii::$app->session->setFlash('error', 'images must be image (jpg or jpeg or png');
                    return $this->redirect(['make/create']);
                } else if ($manage_image == "error") {
                    Yii::$app->session->setFlash('error', 'Something went wrong, could not upload images');
                    return $this->redirect(['make/create']);
                } else {
                    $model->path = $manage_image;
                    Yii::$app->session->setFlash('success', 'image successfully uploaded!');
                }
            } else {
                Yii::$app->session->setFlash('error', 'image cannot be empty!');
                return $this->redirect(['make/create']);
            }
            
            $model->lang_id = $post['Make']['lang_id'];
            $model->save();
            return $this->redirect(['make/create']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Make model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        $model2 = new Make();
        $old_image = $model->path;

        if ($model->load(Yii::$app->request->post())) {

            function manageImage($image) {
                $image_extention = $image->extension;
                if ($image_extention == "jpg" || $image_extention == "jpeg" || $image_extention == "png") {
                    if ($image->saveAs($full_path = dirname(__FILE__) . '/../../' . "/frontend/web/media/car_logo_original/" . $path = time() . "_" . Yii::$app->security->generateRandomString() . '.' . $image->extension)) {

                        Image::resize($full_path, 60, 42)
                                ->resize(new Box(60, 42))
                                ->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/car_logo/" . $path, ['quality' => 50]);

                        return $path;
                    } else {
                        return "error";
                    }
                } else {
                    return "not image";
                }
            }

            $model->path = UploadedFile::getInstance($model, 'path');
            if (isset($model->path)) {
                $manage_image = manageImage($model->path);
                if ($manage_image == "not image") {
                    Yii::$app->session->setFlash('error', 'image must be image (jpg or jpeg or png');
                    return $this->redirect(['make/update/' . $model->id]);
                } else if ($manage_image == "error") {
                    Yii::$app->session->setFlash('error', 'Something went wrong, could not upload images');
                    return $this->redirect(['make/update/' . $model->id]);
                } else {
                    $model->path = $manage_image;
                }
            } else {
                $model->path = $old_image;
            }
            $model->lang_id = $post['lang_id'];
            $model->save();
//            return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Make model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Make model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Make the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Make::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
