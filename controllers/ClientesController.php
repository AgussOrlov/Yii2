<?php

namespace app\controllers;

use app\models\Clientes;
use app\models\ClientesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ClienteController implements the CRUD actions for Clientes model.
 */
class ClientesController extends Controller
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
     * Lists all Clientes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ClientesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clientes model.
     * @param int $idCli Id Cli
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idCli)
    {
        return $this->render('view', [
            'model' => $this->findModel($idCli),
        ]);
    }

    /**
     * Creates a new Clientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Clientes();

        $this->subirFoto($model);

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Clientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idCli Id Cli
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idCli)
    {
        $model = $this->findModel($idCli);
        $this->subirFoto($model);


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Clientes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idCli Id Cli
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idCli)
    {
        $model= $this->findModel($idCli);

        if (file_exists($model->logo)) {
            unlink($model->logo);
        }
        
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Clientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idCli Id Cli
     * @return Clientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCli)
    {
        if (($model = Clientes::findOne(['idCli' => $idCli])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    protected function subirFoto(Clientes $model)
    {
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $model->archivo = UploadedFile::getInstance($model,'archivo');
    

                if ($model->validate()) {
                    
                    if ($model->archivo) {

                        if (file_exists($model->logo)) {
                            unlink($model->logo);
                        }

                        $rutaArchivo='uploads/'.time()."_".$model->archivo->basename.".".$model->archivo->extension;
                        if ($model->archivo->saveAs($rutaArchivo)) {
                            $model->logo=$rutaArchivo;
    
                        }
                    }
                }
            }
        



        if($model->save(false)){

            return $this->redirect(['index']);

        }


        }

        
    }
}
