<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.07.2019
 * Time: 11:40
 */

namespace app\controllers;

use app\models\OrderItems;
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
        if($order->load(Yii::$app->request->post())){
            $order->user_id = (Yii::$app->user->isGuest) ? 0 : Yii::$app->user->id;
            $order->sum = $session['cart.sum'];
            $transaction=Yii::$app->db->beginTransaction();
            try {
                if ($order->save()) {
                    $this->saveOrderItems($session['cart'], $order->id);
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', 'Ваш заказ принят');
                    $session->remove('cart');
                    $session->remove('cart.sum');
                    return $this->refresh();
                } else {
                    Yii::$app->session->setFlash('error', 'Ошибка');
                }
            }catch(Exception $e){
                $transaction->rollBack();
                throw $e;
            }
        }
        return $this->render('view', compact('session', 'order'));
    }

    public function saveOrderItems($items, $order_id){
        foreach($items as $id => $item){
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['price'] * $item['qty'];
            $order_items->save();
        }
    }
}