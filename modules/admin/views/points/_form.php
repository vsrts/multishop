<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Points */
/* @var $form yii\widgets\ActiveForm */

?>



<div class="points-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Cities::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'second_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manager')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Profile::find()->all(), 'user_id', 'name')) ?>

    <?= $form->field($model, 'control')->textInput() ?>

    <?= $form->field($model, 'filial')->textInput() ?>

    <?= $form->field($model, 'api_key')->textInput() ?>

    <?= $form->field($model, 'min_sum')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['0' => 'Выключен', '1' => 'Включен',]) ?>

    <?= $form->field($model, 'categoriesArray')->checkboxList(\yii\helpers\ArrayHelper::map(\app\modules\admin\models\Categories::find()->all(), 'id', 'name')) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отмена', ['index'], ['class'=>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

