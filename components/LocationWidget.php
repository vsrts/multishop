<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.07.2019
 * Time: 23:28
 */

namespace app\components;

use app\models\Cities;
use app\models\Area;
use yii\base\Widget;
use Yii;

class LocationWidget extends Widget
{
    public $city;
    public $point;

    public function init(){
        $session = Yii::$app->session;
        $this->city = $session['city'];
        $this->point = $session['point'];
        print_r($this->city);
        print_r($this->point);

    }
    public function run(){
        if($this->city == null){
            $cities = Cities::find()->all();
            return $this->render('select-city', compact('cities'));
        }

        if($this->city != null and $this->point == null){
            $cityid = Cities::find()->where(['subdomain' => $this->city])->one();
            $cityid = $cityid->id;
            $areas = Area::find()->where(['city_id' => $cityid])->all();
            return $this->render('select-area', compact('areas'));
        }
    }
}