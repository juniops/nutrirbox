<?php

namespace backend\modules\nutrirbox\controllers;

use Yii;
use backend\modules\nutrirbox\models\Assinatura;
use backend\modules\nutrirbox\models\search\AssinaturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * AssinaturaController implements the CRUD actions for Assinatura model.
 */
class AssinaturaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    public function init() {
        parent::init();
        $this->view->jsFiles = ['@backend/modules/nutrirbox/views/' . $this->id . '/ajax.js'];
        Yii::$app->assetManager->publish($this->view->jsFiles[0]);
        $this->getView()->registerJsFile(
            Yii::$app->assetManager->getPublishedUrl($this->view->jsFiles[0]),
            ['yii\web\YiiAsset']
        );
    }

    public function actionCalcular() {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $model = new Assinatura();
            $model->load(Yii::$app->request->post());

            $valor = $model->calcularAssinatura();
            if(!empty($model->qtd_dia)){
                $valorPorDia = $valor/$model->qtd_dia;
                $res = array(
                    'body'    => $this->renderAjax('calcular',['valor'=>$valor, 'model'=>$model, 'valorPorDia'=>$valorPorDia]),
                    'success' => true,
                );
            }else{
                $res = array(
                    'body'    => '<div class="alert alert-danger">Preencha a quantidade de dias</div>',
                    'success' => true,
                );
            }
            return $res;
        }
    }

    /**
     * Lists all Assinatura models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssinaturaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Assinatura model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Assinatura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Assinatura();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Assinatura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing Assinatura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Assinatura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Assinatura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Assinatura::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
