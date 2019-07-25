<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>


<div class="cities-list show">
    <?php
    foreach($areas as $area){
        echo Html::a($area->name, Url::to(['site/checkpoint', 'point' => $area->point_id]));
    }
    ?>
</div>