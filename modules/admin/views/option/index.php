<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Опции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="option-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить Опцию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'image',
            'sku',
            'price',

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '50'],
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>


</div>
