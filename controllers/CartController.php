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
use app\models\Order;
use Yii;


class CartController extends AppController
{
    public function actionAdd(){
        $id = Yii::$app->request->get('id');
        $product = Products::find()->where(['id' => $id])->with('productInfo')->one();
        if(empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionClear(){
       $session =  Yii::$app->session;
       $session->open();
       $session->remove('cart');
       $session->remove('cart.sum');
       $session->close();
       $this->layout = false;
       return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionView(){
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Корзина');
        $order = new Order();
        return $this->render('view', compact('session', 'order'));
    }
}