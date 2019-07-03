<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Option */

$this->title = 'Изменение опции: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Опции', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Изменение опции';
?>
<div class="option-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
