<?php
use yii\helpers\Html;
use yii\helpers\Url;

foreach($cities as $city){
 echo Html::a($city->name, 'http://' . $city->subdomain . '.' . $host);
}
