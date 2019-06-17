<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слайды';

?>
<div class="slides-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить слайд', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'image',
            'code',
            'sort',
//            [
//                'attribute' => 'cities',
//                'value' => function($data){
//                    $listCities = "";
//                    foreach($data->cities as $city){
//                        $listCities .= $city->name . ", ";
//                    }
//                    return $listCities;
//                }
//            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '50'],
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
</div>
