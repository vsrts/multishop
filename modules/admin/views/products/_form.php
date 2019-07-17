<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\admin\models\Categories;
use app\modules\admin\models\Option;
use yii\helpers\Url;

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
    <?php if(!empty($model->image)) : ?>
        <?= Html::img('@web/' . $model->image, $options = ['class' => 'postImg', 'style' => ['width' => '180px']]);?>
        <a class="del-image" onclick="delImage(<?= $model->id ?>, '/admin/products/deleteimage')" ><span class="glyphicon glyphicon-remove text-danger"></span></a>
    <?php endif; ?>
    <?= $form->field($model, 'image')->fileInput() ?>
    <?= $form->field($model, 'alias')->textInput() ?>
    <?= $form->field($model, 'optionsArray')->dropDownList(Option::find()->select(['name', 'id'])->indexBy('id')->column(), [ 'multiple' => 'multiple']) ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отмена', ['index'], ['class'=>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
