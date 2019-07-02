<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sku',
            'name',
            'category_id',
            'text:ntext',
            'weight',
            'kkal',
            'count',
            'volume',
            [
                'attribute' => 'price',
                'value' => function($data){
                    return $data->productInfo->price;
                }
            ],
            [
                'attribute' => 'discount',
                'value' => function($data){
                    return $data->productInfo->discount;
                }
            ],
            [
                'attribute' => 'status',
                'value' => function($data){
                    return $data->productInfo->status;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '50'],
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>


</div>
