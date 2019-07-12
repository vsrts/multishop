<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.07.2019
 * Time: 11:40
 */

namespace app\controllers;

use app\models\Products;
use app\models\Cart;
use Yii;


class CartController extends AppController
{
    public function actionAdd(){
        $id = Yii::$app->request->get('id');
        $product = Products::findOne($id);
        if(empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }
}