<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<a class="check-area"><?= $point->address; ?></a>

<div class="select-location areas-list <?= $show; ?>">
    <?php
    foreach($areas as $area){
        echo Html::a($area->name, Url::to(['site/checkpoint', 'point' => $area->point_id]));
    }
    ?>
</div>