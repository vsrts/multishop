<?php
use yii\helpers\Html;
use yii\helpers\Url;


?>
<h1><?= Html::encode($category->name) ?></h1>
<div class="products">
    <?php foreach($products as $product) : ?>

        <a class="teaser-title" href="<?= Url::to(['products/view', 'alias' => $category->alias, 'itemname' => $product->alias]) ?>"><?= $product->name ?></a>
        <div class="teaser-description">Описание: <?= $product->text ?></div>
        <div class="teaser-price">
            <div class="old-price">Старая цена: <?= $product->productInfo->price ?></div>
            <div class="total-price">Цена: <?= round($product->productInfo->price / 100 * $product->productInfo->discount, 0) ?></div>
        </div>

    <?php endforeach ?>
</div>
<?php
echo "<pre>";
print_r($products);
echo "</pre>";