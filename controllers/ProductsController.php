<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09.07.2019
 * Time: 11:17
 */

namespace app\controllers;

use app\models\Products;

class ProductsController extends AppController
{
    public function actionView($alias, $itemname){
        $product = Products::find()->where(['alias' => $itemname])->with('productInfo', 'category')->one();

        $this->setMeta($product->name);

        return $this->render('view', compact('product'));
    }
}