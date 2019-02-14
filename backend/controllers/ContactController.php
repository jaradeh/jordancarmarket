<?php

namespace backend\controllers;

use Yii;
use backend\models\Contact;
use backend\models\ContactSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContactController implements the CRUD actions for Contact model.
 */
class ContactController extends Controller {

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
     * Lists all Contact models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ContactSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contact model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Contact model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Contact();

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $model->date = time();
            $name = $post['Contact']['name'];
            $email = $post['Contact']['email'];
            $message = $post['Contact']['message'];

            if (!empty($name) && !empty($email) && !empty($message)) {
                $model->save();
                Yii::$app->session->setFlash('success', "Thank you for contacting us. we will get back to you as soon as possible");
                include '../../frontend/mailer/function.php';
                $body = "Thank you for contacting us!";
                $subject = "KidzMenia";
                $to = $email;
                $to2 = "info@kidzmenia.com";
                $body2 = "<center><p>Contact us form submit</p></center><br /><p>Name : <b>" . $name . "</b><p><br /><p>Email : <b>" . $email . "</b><p><br /><br /><p>Message : <b>" . $message . "</b><p>";
                $mail = sendMail($body, $subject, $to);
                $mail2 = sendMail($body2, $subject, $to2);
            } else {
                Yii::$app->session->setFlash('error', "All fields required.");
            }

            return $this->redirect(['../../../contact']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Contact model.
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
     * Deletes an existing Contact model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Contact model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contact the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Contact::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
