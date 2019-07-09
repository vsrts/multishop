<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09.07.2019
 * Time: 15:42
 */

namespace app\models;

use yii\db\ActiveRecord;

class ProductInfo extends ActiveRecord
{
    public static function tableName(){
        return 'product_info';
    }
}