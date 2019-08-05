<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = $category->name;
?>
<h1><?= Html::encode($category->name) ?></h1>
<div class="products">
    <?php foreach($products as $product) : ?>
        <?php if($product->productInfo->status == 1) : ?>
            <div class="teaser-item">
                <?= Html::img($product->image, ['class' => 'teaser-img', 'alt' => $product->name]); ?>
                <a class="teaser-title" href="<?= Url::to(['products/view', 'alias' => $category->alias, 'itemname' => $product->alias]) ?>"><?= $product->name ?></a>
                <div class="teaser-description"><?= $product->text ?></div>
                <div class="buy-block">
                    <div class="teaser-price">
                        <?php if($product->productInfo->discount > 0) : ?>
                            <div class="old-price">Старая цена: <?= $product->productInfo->price ?></div>
                            <div class="total-price">Цена: <?= round($product->productInfo->price / 100 * $product->productInfo->discount, 0) ?></div>
                        <?php else: ?>
                            <div class="total-price">Цена: <?= $product->productInfo->price ?></div>
                        <?php endif; ?>
                    </div>
                    <a class="add-to-cart" data-id="<?= $product->id ?>" href="<?= Url::to(['cart/add', 'id' => $product->id]) ?>">В корзину</a>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach ?>
</div>
<?php
//echo "<pre>";
//print_r($products);
//echo "</pre>";