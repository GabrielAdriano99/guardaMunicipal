<?php

namespace app\controllers;

use Yii;
use app\models\FuncionarioHasMaterial;
use app\models\FuncionarioHasMaterialSearch;
use app\models\Funcionario;
use app\models\Material;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * FuncionarioHasMaterialController implements the CRUD actions for FuncionarioHasMaterial model.
 */
class FuncionarioHasMaterialController extends Controller
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
     * Lists all FuncionarioHasMaterial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FuncionarioHasMaterialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FuncionarioHasMaterial model.
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
     * Creates a new FuncionarioHasMaterial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FuncionarioHasMaterial();
        //$modelMaterial = Material::findOne($model->Material_idMaterial);
        //$modelMaterial = new Material();
               
        if ($model->load(Yii::$app->request->post())) {
            $transaction = FuncionarioHasMaterial::getDb()->beginTransaction();
            try{
                $quantidade = Material::findOne(['idMaterial' => $model->Material_idMaterial])->quant;
                if($model->qtd_posse <= $quantidade){
                    $modelMaterial = Material::findOne(['idMaterial' => $model->Material_idMaterial]);
                    $modelMaterial->quant = $quantidade - $model->qtd_posse;
                    $modelMaterial->save();

                    date_default_timezone_set('America/Sao_Paulo');
                    $model->data_emp = date('Y-m-d H:i:s', time());
                    $model->status = "EM POSSE";
                    if($model->save()){
                        $transaction->commit();
                        return $this->redirect(Url::toRoute(['funcionario-has-material/create']));
                    }
                }
            } catch(\Exception $e){
                $transaction->rollback();
                throw $e;
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FuncionarioHasMaterial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $transaction = FuncionarioHasMaterial::getDb()->beginTransaction();
            try {
                $quantidade_estoque = Material::findOne(['idMaterial' => $model->Material_idMaterial])->quant;
                if($model->qtd_posse <= $quantidade_estoque){
                    $modelMaterial = Material::findOne(['idMaterial' => $model->Material_idMaterial]);
                    $modelMaterial->quant = $quantidade_estoque + $model->qtd_posse;
                    $modelMaterial->save();

                    $model->status = "DEVOLVIDO";
                    date_default_timezone_set('America/Sao_Paulo');
                    $model->data_dev = date('Y-m-d H:i:s', time());
                    if($model->save()){
                        $transaction->commit();
                        return $this->redirect(Url::toRoute(['funcionario-has-material/index']));
                    }
                }

            } catch (\Exception $e) {
                $transaction->rollback();
                throw $e;
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FuncionarioHasMaterial model.
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

    /**
     * Finds the FuncionarioHasMaterial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FuncionarioHasMaterial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FuncionarioHasMaterial::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
