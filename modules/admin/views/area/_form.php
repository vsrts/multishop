<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Area */
/* @var $form yii\widgets\ActiveForm */



?>

<div class="area-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Cities::find()->all(), 'id', 'name'), ['prompt' => 'Выберите город', 'id' => 'select-city']) ?>

    <?php if($model->city_id) : ?>
    <?= $form->field($model, 'point_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Points::find()->where(['city' => $model->city_id])->all(), 'id', 'address'), ['prompt' => 'Выберите точку', 'id' => 'select-point']) ?>
    <?php else: ?>
        <?= $form->field($model, 'point_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Points::find()->all(), 'id', 'address'), ['prompt' => 'Выберите точку', 'id' => 'select-point', 'disabled' => $model->isNewRecord ? 'disabled' : false]) ?>
    <?php endif; ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отмена', ['index'], ['class'=>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
