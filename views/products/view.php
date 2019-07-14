<?php
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => $product->category->name, 'url' => ['category/view', 'alias' => $product->category->alias]];
$this->params['breadcrumbs'][] = $product->name;


echo "<pre>";
print_r($product);
echo "</pre>";
?>

<a class="add-to-cart" data-id="<?= $product->id ?>" href="<?= Url::to(['cart/add', 'id' => $product->id]) ?>">В корзину</a>
