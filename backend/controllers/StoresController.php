<?php

namespace backend\controllers;

use Yii;
use backend\models\Stores;
use backend\models\StoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;

/**
 * StoresController implements the CRUD actions for Stores model.
 */
class StoresController extends Controller {

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
    
    
    public function actionChangelive() {
        $store_id = $_GET['id'];

        $change_to_live = Yii::$app->db->createCommand('UPDATE stores
        SET status = 3
        WHERE id = ' . $store_id . '; ')
                ->execute();
        return $this->redirect('/backend/web/stores/pending');
    }
    
    
    
    public function actionChangepending() {
        $store_id = $_GET['id'];

        $change_to_live = Yii::$app->db->createCommand('UPDATE stores
        SET status = 1
        WHERE id = ' . $store_id . '; ')
                ->execute();
        return $this->redirect('/backend/web/stores/live');
    }
    
    public function actionChangecancel() {
        $store_id = $_GET['id'];

        $change_to_live = Yii::$app->db->createCommand('UPDATE stores
        SET status = 2
        WHERE id = ' . $store_id . '; ')
                ->execute();
        return $this->redirect('/backend/web/stores/live');
    }
    
    
    
    /**
     * Lists live Cars models.
     * @return mixed
     */
    public function actionLive() {
        $model = Stores::find()->where(['status' => 3])->orderBy(['id' => SORT_DESC])->all();
        $searchModel = new StoresSearch();
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
        $model_1 = Stores::find()->where(['status' => 1])->all();
        $model_2 = Stores::find()->where(['status' => 2])->all();
        $model = array_merge($model_1, $model_2);
        $searchModel = new StoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('pending', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model,
        ]);
    }
    
    
    

    /**
     * Lists all Stores models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new StoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Stores model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Stores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Stores();

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            function manageImage($image) {
                $image_extention = $image->extension;
                if ($image_extention == "jpg" || $image_extention == "jpeg" || $image_extention == "png") {
                    if ($image->saveAs($full_path = dirname(__FILE__) . '/../../' . "/frontend/web/media/stores_logo/" . $path = time() . "_" . Yii::$app->security->generateRandomString() . '.' . $image->extension)) {

                        Image::frame($full_path)
                                ->resize(new Box(150, 150))
                                ->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/stores_logo_150x150/" . $path, ['quality' => 80]);

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
                    Yii::$app->session->setFlash('error', 'images must be image (jpg or jpeg or png)');
                    return $this->redirect(['stores/create']);
                } else if ($manage_image == "error") {
                    Yii::$app->session->setFlash('error', 'Something went wrong, could not upload images');
                    return $this->redirect(['stores/create']);
                } else {
                    $model->path = $manage_image;
                    Yii::$app->session->setFlash('success', 'image successfully uploaded!');
                }
            } else {
                Yii::$app->session->setFlash('error', 'image cannot be empty!');
                return $this->redirect(['stores/create']);
            }
            
            $model->date_created = time();
            $model->date_updated = time();
            $user_id = Yii::$app->user->getId();
            $model->created_user_id = $user_id;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'You have successfully created a new store.');
                return $this->redirect(['stores/create']);
            } else {
                Yii::$app->session->setFlash('error', 'Something went wrong');
                return $this->redirect(['stores/create']);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Stores model.
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
     * Deletes an existing Stores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Stores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Stores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Stores::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
