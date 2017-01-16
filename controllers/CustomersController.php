<?php

namespace app\controllers;

use Yii;
use app\models\Customers;
use app\models\CustomersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\widgets\DepDrop;
use yii\helpers\ArrayHelper;

/**
 * CustomersController implements the CRUD actions for Customers model.
 */
class CustomersController extends Controller
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
     * Lists all Customers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customers model.
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
     * Creates a new Customers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Customers model.
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
                'ch' => $ch,
                'am' => $am,
            ]);
        }
    }

    /**
     * Deletes an existing Customers model.
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
     * Finds the Customers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGetCh(){
        $out=[];
        if(isset($_POST['depdrop_parents'])){
            $parants= $_POST['depdrop_parents'];
            if($parants!=NULL){
                $c=$parants[0];
                $out=  $this->getCh($c);
                echo \yii\helpers\Json::encode(['output'=>$out,'select'=>'']);
                return;
            }
            echo \yii\helpers\Json::encode(['output'=>'','select'=>'']);
        }
    }
    
    protected function getCh($id){
        $datas = \app\models\Amp::find()->where(['chw_id'=>$id])->all();
        return $this->MapData($datas,'id','name');
    }
    
    public function actionGetAm(){
        $out=[];
        if(isset($_POST['depdrop_parents'])){
            $ids= $_POST['depdrop_parents'];
            $c=  empty($ids[0]) ? NULL : $ids[0];
            $a=  empty($ids[1]) ? NULL : $ids[1];
            if($c!=NULL){
                $data=  $this->getAm($a);
                echo \yii\helpers\Json::encode(['output'=>$out,'select'=>'']);
                return;
            }
            echo \yii\helpers\Json::encode(['output'=>'','select'=>'']);
        }
    }
    
    protected function getAm($id){
        $datas = \app\models\Tmb::find()->where(['amp_id'=>$id])->all();
        return $this->MapData($datas,'id','name');
    }
    
    protected function MapData(){
        $obj=[];
        foreach ($datas as $key => $value){
            array_push($obj, ['id']=>$value->{$fieldID,'id'});
        }
    }
}
