<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $category->name;
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="products">
    <?php foreach($products as $product) : ?>
        <a href="<?= Url::to(['products/view', 'alias' => $category->alias, 'itemname' => $product->alias]) ?>"><?= $product->name ?></a>
    <?php endforeach ?>
</div>
<?php
echo "<pre>";
print_r($products);
echo "</pre>";