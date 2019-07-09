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

    public function actionView($alias){
        $id = Categories::find()->where(['alias' => $alias])->column();
        $products = Products::find()->where(['category_id' => $id])->all();
        $category = Categories::findOne(['alias' => $alias]);
        return $this->render('view', compact('products', 'category'));
    }

}