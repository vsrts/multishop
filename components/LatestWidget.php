<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.07.2019
 * Time: 23:28
 */

namespace app\components;

use app\models\Cities;
use app\models\Products;
use yii\base\Widget;
use Yii;

class LatestWidget extends Widget
{
    public $alias;

    public function init(){
        $session = Yii::$app->session;
        $session->open();
        $subdomain = $session['city'];
        $session->close();
        $city = Cities::find()->where(['subdomain' => $subdomain])->one();
        $this->alias = $city->alias;
    }
    public function run(){
        $products = Products::find()
            ->select('categories.alias as category, products.*')
            ->leftJoin($this->alias . '_product_info', $this->alias . '_product_info.product_id=products.id')
            ->leftJoin('categories', 'categories.id=products.category_id')
            ->where([$this->alias . '_product_info.status' => 1])
            ->orderBy('products.id DESC')
            ->limit(6)
            ->all();
        return $this->render('latest', compact('products'));
    }
}