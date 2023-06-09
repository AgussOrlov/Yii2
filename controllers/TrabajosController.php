<?php

namespace app\controllers;

use app\models\Trabajos;
use app\models\TrabajosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TrabajosController implements the CRUD actions for Trabajos model.
 */
class TrabajosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
            
        );
    }

    /**
     * Lists all Trabajos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TrabajosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trabajos model.
     * @param int $idtrabajos Idtrabajos
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idtrabajos)
    {
        return $this->render('view', [
            'model' => $this->findModel($idtrabajos),
        ]);
    }

    /**
     * Creates a new Trabajos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Trabajos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idtrabajos' => $model->idtrabajos]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trabajos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idtrabajos Idtrabajos
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idtrabajos)
    {
        $model = $this->findModel($idtrabajos);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idtrabajos' => $model->idtrabajos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Trabajos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idtrabajos Idtrabajos
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idtrabajos)
    {
        $this->findModel($idtrabajos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trabajos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idtrabajos Idtrabajos
     * @return Trabajos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idtrabajos)
    {
        if (($model = Trabajos::findOne(['idtrabajos' => $idtrabajos])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
