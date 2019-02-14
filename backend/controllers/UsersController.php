<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use frontend\models\SignupForm;
use common\models\SearchUsers;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Cat model.
 */
class UsersController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Cat models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SearchUsers();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cat model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $post2 = $post['SignupForm'];
            $model->username = $post2['username'];
            $model->pass = $post2['password'];
            $model->password = $post2['password'];
            $model->email = $post2['email'];
            if ($user = $model->signup()) {
                //include '../../frontend/mailer/function.php';
                $body = "";
                $body .= "<table style='color:#1f497d;'>";
                $body .= "<tr>";
                $body .=' <td>Dear <b>' . strtoupper($model->username) . '</b><br /></td>';
                $body .= "</tr>";
                $body .= "<tr>";
                $body .=' <td><br />You have been successfully registered at Tabuk Pharmaceuticals Brands Platform. <br /></td>';
                $body .= "</tr>";
                $body .= "<tr>";
                $body .= "<td>With the below access information, you will be able to sign in,<br /> view all Tabuk Pharmaceuticals promotional kits uploaded by marketers,<br /> and upload promotional items you prepared.</td>";
                $body .= "</tr>";
                $body .= "<tr>";
                $body .= "<td><br /><b>Username</b> : <b>" . $model->username . "</b></td>";
                $body .= "</tr>";
                $body .= "<tr>";
                $body .= "<td><b>Password</b> : <b>" . $model->pass . "</b></td>";
                $body .= "</tr>";
                $body .= "<tr>";
                $body .= "<td>";
                $body .= "<p>Please use the below link to access the platform:</p>";
                $body .= '<a href="http://merit.tabukpharmaceuticals.com/" target="blank">Tabuk Pharmaceuticals Brands Platform</a><br />';
                $body .= "if the link is not working please copy and paste the following link into your browser: <br />";
                $body .= 'http://merit.tabukpharmaceuticals.com <br />For further assistance please contact <a href="mailto:noureddin.balawi@tabukpharmaceuticals.com" target="_blank">noureddin.balawi@<wbr>tabukpharmaceuticals.com</a> ';
                $body .= "</td>";
                $body .= "</tr>";
                $body .= "</table>";
                $subject = "Tabuk Pharmaceuticals Brands Platform";
                $to = $model->email;
                //$mail = sendMail($body, $subject, $to);
                
            }
            return $this->redirect('/backend/web/users');
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $post2 = $post['User'];
            $model->username = $post2['username'];
            $model->pass = $post2['pass'];
            $model->email = $post2['email'];
            $model->country_id = $post2['country_id'];
            $model->password_hash = $post2['pass'];
            $model->setPassword($model->password_hash);
            $model->save();
            $update_reset_status = Yii::$app->db->createCommand('UPDATE user SET `reset` = 1 where `email` = "' . $model->email . '" ')
                    ->execute();
            include '../../frontend/mailer/function.php';
            $body = "";
            $body .= "<table style='color:#1f497d;'>";
            $body .= "<tr>";
            $body .=' <td>Dear <b>' . strtoupper($model->username) . '</b><br /></td>';
            $body .= "</tr>";
            $body .= "<tr>";
            $body .=' <td><br />Your account have been successfully reset by Tabuk Pharmaceuticals Brands Platform admin. <br /></td>';
            $body .= "</tr>";
            $body .= "<tr>";
            $body .= "<td>With the below new access information, you will be able to sign in,<br /> view all Tabuk Pharmaceuticals promotional kits uploaded by marketers,<br /> and upload promotional items you prepared.</td>";
            $body .= "</tr>";
            $body .= "<tr>";
            $body .= "<td><br /><b>Username</b> : <b>" . $model->username . "</b></td>";
            $body .= "</tr>";
            $body .= "<tr>";
            $body .= "<td><b>Password</b> : <b>" . $model->pass . "</b></td>";
            $body .= "</tr>";
            $body .= "<tr>";
            $body .= "<td>";
            $body .= "<p>Please use the below link to access the platform:</p>";
            $body .= '<a href="http://merit.tabukpharmaceuticals.com/" target="blank">Tabuk Pharmaceuticals Brands Platform</a><br />';
            $body .= "if the link is not working please copy and paste the following link into your browser: <br />";
            $body .= 'http://merit.tabukpharmaceuticals.com <br />For further assistance please contact <a href="mailto:noureddin.balawi@tabukpharmaceuticals.com" target="_blank">noureddin.balawi@<wbr>tabukpharmaceuticals.com</a> ';
            $body .= "</td>";
            $body .= "</tr>";
            $body .= "</table>";
            $subject = "Tabuk Pharmaceuticals Brands Platform";
            $to = $model->email;
            $mail = sendMail($body, $subject, $to);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionReset() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $update_reset_status = Yii::$app->db->createCommand('UPDATE user SET `reset` = 1 where `id` = "' . $id . '" ')
                    ->execute();
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Cat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
