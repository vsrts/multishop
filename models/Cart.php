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
        echo "Worked";
    }
}