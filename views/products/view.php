<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => $product->category->name, 'url' => ['category/view', 'alias' => $product->category->alias]];
$this->params['breadcrumbs'][] = $product->name;


//echo "<pre>";
//print_r($product);
//echo "</pre>";
?>

<div class="full-item">
    <?= Html::img('@web/' . $product->image, ['class' => 'full-img', 'alt' => $product->name]); ?>
    <div class="full-info">
        <div class="full-name"><?= $product->name ?></div>
        <div class="full-description"><?= $product->text ?></div>
        <div class="full-params">
            <div class="full-count"><?= $product->count ?> шт.</div>
            <div class="full-weight"><?= $product->weight ?> гр.</div>
            <div class="full-kkal"><?= $product->kkal ?> кКалл.</div>
        </div>
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
</div>