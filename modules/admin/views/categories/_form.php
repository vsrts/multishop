<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php if(!empty($model->image)) : ?>
        <?= Html::img('@web/' . $model->image, $options = ['class' => 'postImg', 'style' => ['width' => '180px']]);?>
        <span class="glyphicon glyphicon-remove text-danger del-image" data-id="<?= $model->id ?>"></span>
    <?php endif; ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <?php if(!empty($model->icon)) : ?>
        <?= Html::img('@web/' . $model->icon, $options = ['class' => 'postIcon', 'style' => ['width' => '50px']]);?>
        <span class="glyphicon glyphicon-remove text-danger del-icon" data-id="<?= $model->id ?>"></span>
    <?php endif; ?>
    <?= $form->field($model, 'icon')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отмена', ['index'], ['class'=>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
