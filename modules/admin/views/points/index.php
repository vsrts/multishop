<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Точки';

?>
<div class="points-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить точку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'city',
            [
                'attribute' => 'city',
                'value' => function($data){
                    return $data->cities->name;
                }
            ],
            //'phone',
            //'second_phone',
            //'email:email',
            'address',
            //'time',
            [
                'attribute' => 'manager',
                'value' => function($data){
                    return $data->profile->name;
                }
            ],
            //'filial',
//            [
//                'attribute' => 'points',
//                'value' => function($data){
//                    $listCategories = "";
//                    foreach($data->categories as $category){
//                        $listCategories .= $category->name . ", ";
//                    }
//                    return $listCategories;
//                }
//            ],
            [
                'attribute' => 'status',
                'value' => function($data){
                    return !$data->status ? '<span class="text-danger">Выключен</span>' : '<span class="text-success">Включен</span>';
                },
                'format' => 'html',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '50'],
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
</div>
