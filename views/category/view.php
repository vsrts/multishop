<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = $category->name;
?>
<h1><?= Html::encode($category->name) ?></h1>
<div class="products">
    <?php foreach($products as $product) : ?>
        <?= Html::img($product->image); ?>
        <a class="teaser-title" href="<?= Url::to(['products/view', 'alias' => $category->alias, 'itemname' => $product->alias]) ?>"><?= $product->name ?></a>
        <div class="teaser-description">Описание: <?= $product->text ?></div>
        <div class="teaser-price">
            <div class="old-price">Старая цена: <?= $product->productInfo->price ?></div>
            <div class="total-price">Цена: <?= round($product->productInfo->price / 100 * $product->productInfo->discount, 0) ?></div>
            <a class="add-to-cart" data-id="<?= $product->id ?>" href="<?= Url::to(['cart/add', 'id' => $product->id]) ?>">В корзину</a>
        </div>

    <?php endforeach ?>
</div>
<?php
echo "<pre>";
print_r($products);
echo "</pre>";