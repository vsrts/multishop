<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.07.2019
 * Time: 13:16
 */

namespace app\components;

use app\models\Cities;
use app\models\Area;
use app\models\Points;
use yii\base\Widget;
use Yii;

class AreaWidget extends Widget
{
    public $city;
    public $point;

    public function init(){
        $session = Yii::$app->session;
        $session->open();
        $this->city = $session['city'];
        $this->point = $session['point'];
        $session->close();
        print_r($this->point);
    }

    public function run(){
        if ($this->city != null) {
            if($this->point == null){
                $show = 'show';
            }
            $cityid = Cities::find()->where(['subdomain' => $this->city])->one();
            $cityid = $cityid->id;
            $areas = Area::find()->where(['city_id' => $cityid])->all();
            $point = Points::findOne($this->point);
            return $this->render('select-area', compact('areas', 'point', 'show'));
        }
    }
}