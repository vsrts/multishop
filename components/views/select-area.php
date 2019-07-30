<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="check-area"><?= $point->address; ?></div>
<div class="header-phone"><?= $point->phone ?></div>

<div class="select-location areas-list <?= $show; ?>">
    <?php
    foreach($areas as $area){
        echo Html::a($area->name, Url::to(['site/checkpoint', 'point' => $area->point_id]));
    }
    ?>
</div>