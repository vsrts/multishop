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
use yii\helpers\Url;

class LocationWidget extends Widget
{
    public function run(){
        $host = substr(Url::base(true), strpos(Url::base(true), "." ) + 1 );
        $cities = Cities::find()->all();
        return $this->render('select-city', compact('cities', 'host'));
    }
}