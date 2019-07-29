<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09.07.2019
 * Time: 15:42
 */

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class ProductInfo extends ActiveRecord
{
    public static function tableName(){
        $subdomain = idn_to_utf8(Yii::$app->request->get('city'));
        $city = Cities::find()->where(['subdomain' => $subdomain])->one();
        if($city){
            return $city->alias . '_product_info';
        }
        return 'product_info';
    }
}