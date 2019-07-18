<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Products;
use app\modules\admin\models\ProductInfo;
use app\models\Categories;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends AppAdminController
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
        $model = $this->findModel($id);
        $model->delete();
        if($model->image) {
            unlink(Yii::getAlias('') . $model->image);
        }
        return $this->redirect(['index']);
    }

    public function actionMass(){
        return $this->render('mass');
    }

    //Export Items
    public function actionExport(){
        $data = "Артикул;Название;Категория;Описание;Цена;Скидка;Вес;Калории;Количество в порции;Объём;Картинка;Статус\r\n";
        $model = Products::find()->with('category', 'productInfo')->all();
        foreach($model as $product){
            $data .= $product->sku .
                ';' . $product->name .
                ';' . $product->category->name .
                ';' . $product->text .
                ';' . $product->productInfo->price .
                ';' . $product->productInfo->discount .
                ';' . $product->weight .
                ';' . $product->kkal .
                ';' . $product->count .
                ';' . $product->volume .
                ';' . $product->image .
                ';' . $product->productInfo->status .
                "\r\n";
        }
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="export_' . date('d.m.Y') . '.csv"');
        return $data;
    }

    //Import Items
    public function actionImport(){
        $file = UploadedFile::getInstanceByName('csvFile');
        $file->saveAs('uploads/temp/' . $file->name);
        $pathToFile = Yii::getAlias('@app/web/uploads/temp/' . $file->name);
        if(!file_exists($pathToFile) || !is_readable($pathToFile) ){
            echo "Файл отсутствует";
        }
        if(($handle = fopen($pathToFile, r)) !== FALSE){
            $i=0;
            while(($row = fgetcsv($handle, 1000, ';')) !== FALSE){
                $category = Categories::find()->where(['name' => $row[2]])->one();
                $i++;
                if($i == 1){continue;}
                $thisProduct = Products::find()->where(['sku' => $row[0]])->with('productInfo')->one();
                if($thisProduct){
                    $thisProduct->sku = $row[0];
                    $thisProduct->name = $row[1];
                    $thisProduct->category_id = $category->id;
                    $thisProduct->text = $row[3];
                    $thisProduct->productInfo->price = $row[4];
                    $thisProduct->productInfo->discount = $row[5];
                    $thisProduct->weight = $row[6];
                    $thisProduct->kkal = $row[7];
                    $thisProduct->count = $row[8];
                    $thisProduct->volume = $row[9];
                    $thisProduct->image = $row[10];
                    $thisProduct->productInfo->status = $row[11];
                    if($thisProduct->alias == null){
                        $thisProduct->alias = mb_strtolower($this->translit($row[1]));
                    }
                        if ($thisProduct->validate() && $thisProduct->productInfo->validate()) {
                            $thisProduct->update();
                            $thisProduct->productInfo->update();
                        } else {
                            echo "Обновить не удалось";
                        }
                }else{
                    $newProduct = new Products();
                    $newProductInfo = new ProductInfo();
                    $newProduct->sku = $row[0];
                    $newProduct->name = $row[1];
                    $newProduct->category_id = $category->id;
                    $newProduct->text = $row[3];
                    $newProduct->weight = $row[6];
                    $newProduct->kkal = $row[7];
                    $newProduct->count = $row[8];
                    $newProduct->volume = $row[9];
                    $newProduct->image = $row[10];
                    $newProduct->alias =  mb_strtolower($this->translit($row[1]));
                    if ($newProduct->validate()) {
                        $newProduct->save();
                        $newProductInfo->product_id = $newProduct->id;
                        $newProductInfo->price = $row[4];
                        $newProductInfo->discount = $row[5];
                        $newProductInfo->status = $row[11];
                        if ($newProductInfo->validate()) {
                            $newProductInfo->save();
                        }
                    } else {
                        echo "Сохранить не удалось";
                    }
                }
            }
            fclose($handle);
        }
        return $this->redirect('mass');
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
