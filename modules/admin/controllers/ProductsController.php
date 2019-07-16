<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Products;
use app\modules\admin\models\ProductInfo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();
        $productInfo = new ProductInfo();

        if ($model->load(Yii::$app->request->post()) && $productInfo->load(Yii::$app->request->post())) {

            $model->attributes = $model->load(Yii::$app->request->post());
            $productInfo->attributes = $productInfo->load(Yii::$app->request->post());

            $isValid = $model->validate();
            $transaction=Yii::$app->db->beginTransaction();
            try {
                if ($isValid) {
                    $this->saveImage($model);
                    $model->save(false);
                }

                $productInfo->product_id = $model->id;
                $isValid = $productInfo->validate() && $isValid;

                if ($isValid) {
                    $productInfo->save(false);
                    $transaction->commit();
                    return $this->redirect(['index', 'id' => $model->id]);
                }
            }catch(Exception $e){
                $transaction->rollBack();
                throw $e;
            }
        }

        return $this->render('create', [
            'model' => $model,
            'productInfo' => $productInfo,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $productInfo = ProductInfo::findOne(['product_id' => $id]);

        if(!isset($model, $productInfo)){
            throw new NotFoundHttpException('Товар не найден');
        }

        if ($model->load(Yii::$app->request->post()) && $productInfo->load(Yii::$app->request->post())) {
            $isValid = $model->validate();
            $isValid = $productInfo->validate() && $isValid;
            if($isValid){
                $this->saveImage($model);
                $model->save();
                $productInfo->save();
                return $this->redirect('index');
            }
        }

        return $this->render('update', [
            'model' => $model,
            'productInfo' => $productInfo,
        ]);
    }

    /**
     * Deletes an existing Products model.
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
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function saveImage($model){
        $model->image = UploadedFile::getInstance($model, 'image');
        if(!empty($model->image)){
            $model->image->saveAs('uploads/items/' . $model->image->name);
            $model->image = 'uploads/items/' . $model->image->name;
        }
    }

    public function actionDeleteimage($id){
        $model = $this->findModel($id);
        unlink(Yii::getAlias('').$model->image);
        $model->image = null;
        $model->update();
        if(Yii::$app->request->isAjax){
            return 'Изображение удалено';
        }else{
            return $this->redirect(['update', 'id' => $model->id]);
        }
    }
}
