<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slides */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slides-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if(!empty($model->image)) : ?>
        <?= Html::img('@web/' . $model->image, $options = ['class' => 'postImg', 'style' => ['width' => '180px']]);?>
        <a class="del-image" onclick="delImage(<?= $model->id ?>, '/admin/slides/deleteimage')" ><span class="glyphicon glyphicon-remove text-danger"></span></a>
    <?php endif; ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'citiesArray')->checkboxList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Cities::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отмена', ['index'], ['class'=>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
