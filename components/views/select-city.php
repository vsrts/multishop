<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="cities-list show">
<?php
    foreach($cities as $city){
     echo Html::a($city->name, 'http://' . $city->subdomain . '.' . $host) . '<br>';
    }
?>
</div>

<div class="points-list show">
    
</div>