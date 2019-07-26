<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.07.2019
 * Time: 23:28
 */

namespace app\components;

use app\models\Cities;
use yii\base\Widget;
use Yii;

class CityWidget extends Widget
{
    public $city;

    public function init(){
        $session = Yii::$app->session;
        $session->open();
        $this->city = $session['city'];
        $session->close();
        print_r($this->city);


    }
    public function run(){
        if($this->city == null){
           $show = 'show';
        }
        $cities = Cities::find()->all();
        $city = Cities::find()->where(['subdomain' => $this->city])->one();
        return $this->render('select-city', compact('cities', 'city', 'show'));
    }
}