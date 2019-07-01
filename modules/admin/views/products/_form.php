<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\admin\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'sku')->textInput() ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'category_id')->dropDownList(Categories::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt' => 'Выберите категорию']) ?>
    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'weight')->textInput() ?>
    <?= $form->field($model, 'kkal')->textInput() ?>
    <?= $form->field($model, 'count')->textInput() ?>
    <?= $form->field($model, 'volume')->textInput() ?>
    <?= $form->field($productInfo, 'price')->textInput() ?>
    <?= $form->field($productInfo, 'discount')->textInput() ?>
    <?= $form->field($productInfo, 'status')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отмена', ['index'], ['class'=>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
