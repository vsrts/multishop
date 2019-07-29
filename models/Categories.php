<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.07.2019
 * Time: 13:47
 */

namespace app\models;

use yii\db\ActiveRecord;
use Yii;


class Categories extends ActiveRecord
{
    public static function tableName(){
        return 'categories';
    }

    public static function getCategorieslist(){
        $session = Yii::$app->session;
        $session->open();
        $pointId = $session['point'];
        $session->close();
        $categories = Categories::find()
            ->select('categories.*')
            ->leftJoin('point_categories', 'point_categories.category_id=categories.id')
            ->where(['point_categories.point_id' => $pointId])
            ->asArray()
            ->all();
        $categoryList = array();
        foreach($categories as $category){
            $categoryList[] = ['label' => $category['icon'] . "<span>" .$category['name'] . "</span>", 'url' => ['/' . $category['alias']]];
        }
        return $categoryList;
    }

}