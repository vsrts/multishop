<?php
use yii\bootstrap\BootstrapAsset;

$this->registerCssFile('/css/slick/slick.css');
    $this->registerCssFile('/css/slick/slick-theme.css');
    $this->registerJsFile('/js/slick/slick.min.js',
        ['depends' => 'yii\web\YiiAsset']);
    $this->registerJsFile('/js/slick/slick-init.js',
        ['depends' => 'yii\web\YiiAsset']);
?>

<div class="single-item">
    <?php foreach($slides as $slide): ?>
        <div>
            <img src="<?= $slide->image; ?>">
        </div>
    <?php endforeach; ?>
</div>