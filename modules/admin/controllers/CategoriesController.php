<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Categories;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends Controller
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
     * Lists all Categories models.
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Categories::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categories model.
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
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categories();

        if ($model->load(Yii::$app->request->post())) {
            $this->saveImage($model);
            $this->saveIcon($model);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $this->saveImage($model);
            $this->saveIcon($model);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        if($model->image) {
            unlink(Yii::getAlias('') . $model->image);
        }
        if($model->icon) {
            unlink(Yii::getAlias('') . $model->icon);
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function saveImage($model){
        $model->image = UploadedFile::getInstance($model, 'image');
        if(!empty($model->image)){
            $model->image->saveAs('uploads/categories/' . $model->image->name);
            $model->image = 'uploads/categories/' . $model->image->name;
        }
    }

    public function saveIcon($model){
        $model->icon = UploadedFile::getInstance($model, 'icon');
        if(!empty($model->icon)){
            $model->icon->saveAs('uploads/icons/' . $model->icon->name);
            $model->icon = 'uploads/icons/' . $model->icon->name;
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

    public function actionDeleteicon($id){
        $model = $this->findModel($id);
        unlink(Yii::getAlias('').$model->icon);
        $model->icon = null;
        $model->update();
        if(Yii::$app->request->isAjax){
            return 'Изображение удалено';
        }else{
            return $this->redirect(['update', 'id' => $model->id]);
        }
    }
}
