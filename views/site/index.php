<?php

/* @var $this yii\web\View */

$this->title = 'Суши Даром';
?>
<div class="slider">
    <?= \app\components\SliderWidget::widget(); ?>
</div>
<div class="main-content">
    <div class="latest">
        <h2 class="h2-head"><span>Новинки</span></h2>
        <?= \app\components\LatestWidget::widget(); ?>
    </div>
</div>
