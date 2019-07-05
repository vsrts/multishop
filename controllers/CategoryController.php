<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05.07.2019
 * Time: 11:30
 */

namespace app\controllers;

use app\models\Categories;
use app\models\Products;

class CategoryController extends AppController
{

    public function actionView(){
        $id = Categories::find()->where(['alias' => $alias])->column();
        $products = Products::find()->where(['category_id' => $id])->all();

        return $this->render('view', compact('products', 'id', 'alias'));
    }

}