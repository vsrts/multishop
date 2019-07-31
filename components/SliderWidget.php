<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31.07.2019
 * Time: 15:07
 */

namespace app\components;

use app\models\Cities;
use app\models\Slides;
use yii\base\Widget;
use Yii;


class SliderWidget extends Widget
{

    public function run(){
        $session = Yii::$app->session;
        $session->open();
        $subdomain = $session['city'];
        $session->close();
        $city = Cities::find()->where(['subdomain' => $subdomain])->one();
        $slides = Slides::find()
            ->select('slides.*')
            ->leftJoin('slides_cities', 'slides_cities.slides_id=slides.id')
            ->where(['slides_cities.cities_id' => $city->id])
            ->all();

        return $this->render('slider', compact('slides'));
    }

}