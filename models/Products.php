<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05.07.2019
 * Time: 11:32
 */

namespace app\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord
{
    public static function tableName(){
        return 'products';
    }

    public function getCategory(){
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
}