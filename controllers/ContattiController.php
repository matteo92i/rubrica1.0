<?php

namespace app\controllers;

use app\models\Contatti;
use app\models\Tags;
use app\models\ContattiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContattiController implements the CRUD actions for Contatti model.
 */
class ContattiController extends Controller
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
     * Lists all Contatti models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ContattiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contatti model.
     * @param int $contatti_id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($contatti_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($contatti_id),
        ]);
    }

    /**
     * Creates a new Contatti model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Contatti();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                //TODO: Esplodere $model->tag per le virgole e Salvare i tags sulla tabella tags con id $model->id
                $explode = explode(',',$model->tags);

                foreach( $explode as $singleTag){
                    $tag = new Tags();
                    $tag->nome =  $singleTag;
                    $tag->contatto_id = $model->contatti_id;
                    $tag->save();
                }
                return $this->redirect(['view', 'contatti_id' => $model->contatti_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Contatti model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $contatti_id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($contatti_id)
    {
        $model = $this->findModel($contatti_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            //TODO: Esplodere $model->tag per le virgole e Salvare i tags sulla tabella tags con id $model->id
            $explode = explode(',',$model->tags);

            Tags::deleteAll(['contatto_id' => $model->contatti_id]);
            foreach( $explode as $singleTag){
                $tag = new Tags();
                $tag->nome =  $singleTag;
                $tag->contatto_id = $model->contatti_id;
                $tag->save();
            }
            return $this->redirect(['view', 'contatti_id' => $model->contatti_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Contatti model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $contatti_id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($contatti_id)
    {
        $this->findModel($contatti_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Contatti model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $contatti_id ID
     * @return Contatti the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($contatti_id)
    {
        if (($model = Contatti::findOne(['contatti_id' => $contatti_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
