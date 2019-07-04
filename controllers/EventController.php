<?php

namespace app\controllers;

use Yii;
use app\models\Event;
use app\models\EventSearch;
use app\models\Funcionario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        $listas = Event::find()->all();
        $events = [];

        foreach ($listas as $lista) {
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $lista->id;
            $Event->title = $lista->title;
            $Event->start = date('Y-m-d\TH:i:s\Z',strtotime($lista->start));
            $events[] = $Event;
        }

        return $this->render('index', [
            'events' => $events,
        ]);

        /*$searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
    }

    /**
     * Displays a single Event model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($date)
    {
        
        if(\Yii::$app->user->can('createUserGuard')){
            $model = new Event();
            $model->start = $date;

            if ($model->load(Yii::$app->request->post())) {
                $transaction = Event::getDb()->beginTransaction();
                try{
                    $modelFuncionario = Funcionario::findOne(['idFuncionario' => $model->Funcionario_idFuncionario])->nome;
                    $model->title = $modelFuncionario;
                    if($model->save()){
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch(\Exception $e){
                    $transaction->rollback();
                    throw $e;
                }
            } else {
                return $this->renderAjax('create', [
                    'model' => $model,
                ]);
            }
        } else {
            throw new ForbiddenHttpException;
        }

    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        if(\Yii::$app->user->can('updateScale')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $transaction = Event::getDb()->beginTransaction();
                    try{
                        $modelFuncionario = Funcionario::findOne(['idFuncionario' => $model->Funcionario_idFuncionario])->nome;
                        $model->title = $modelFuncionario;
                        if($model->save()){
                            $transaction->commit();
                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                    } catch(\Exception $e){
                        $transaction->rollback();
                        throw $e;
                    }
            } else {
                return $this->renderAjax('update', [
                    'model' => $model,
                ]);
            }
        } else {
            throw new ForbiddenHttpException;
        }

    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionReport(){
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
