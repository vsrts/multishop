<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>


<div class="cities-list show">
<?php
foreach($cities as $city){
    echo Html::a($city->name, Url::to(['site/checkcity', 'subdomain' => $city->subdomain]));
}
?>
</div>

