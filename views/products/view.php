<?php

$this->params['breadcrumbs'][] = ['label' => $product->category->name, 'url' => ['category/view', 'alias' => $product->category->alias]];
$this->params['breadcrumbs'][] = $product->name;
echo "<pre>";
print_r($product);
echo "</pre>";