<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="check-city"><?= $city->name ?></div>

<div class="select-location cities-select <?= $show; ?>">
    <div class="select-content">
        <div class="select-block">
            <h2>Выберите ваш город</h2>
            <div class="select-list">
                <?php
                foreach($cities as $city){
                    echo Html::a($city->name, Url::to(['site/checkcity', 'subdomain' => $city->subdomain]));
                }
                ?>
            </div>
        </div>
    </div>
</div>

