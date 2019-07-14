<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.07.2019
 * Time: 11:43
 */

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($product, $qty=1){
        if(isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->productInfo->price,
                'alias' => $product->alias,
                'category' => $product->category->alias,
            ];
        }
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->productInfo->price : $qty * $product->productInfo->price;
    }

    public function recalc($id){
        if(!isset($_SESSION['cart'][$id])) return false;
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }
}