<?php

namespace backend\controllers;

use Yii;
use common\models\TickData;
use backend\models\TickDataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TickDataController implements the CRUD actions for TickData model.
 */
class TickDataController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
     * Lists all TickData models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TickDataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TickData model.
     * @param string $date
     * @param string $code
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($date, $code)
    {
        return $this->render('view', [
            'model' => $this->findModel($date, $code),
        ]);
    }

    /**
     * Creates a new TickData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TickData();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'date' => $model->date, 'code' => $model->code]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TickData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $date
     * @param string $code
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($date, $code)
    {
        $model = $this->findModel($date, $code);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'date' => $model->date, 'code' => $model->code]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TickData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $date
     * @param string $code
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($date, $code)
    {
        $this->findModel($date, $code)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TickData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $date
     * @param string $code
     * @return TickData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($date, $code)
    {
        if (($model = TickData::findOne(['date' => $date, 'code' => $code])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
