<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.07.2019
 * Time: 13:47
 */

namespace app\models;

use yii\db\ActiveRecord;


class Categories extends ActiveRecord
{
    public static function tableName(){
        return 'categories';
    }

    public static function getCategories(){
        return Categories::find()->asArray()->all();
    }

}