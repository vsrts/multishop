<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Tabs;
use yii\widgets\Pjax;

$this->title = "Страница управляющего";
?>

<div class = "profile-page">
    <div class="profile-info">
        <h1>Управляющий, <?= $profile->name; ?> </h1>

        <?php Pjax::begin(['id' => 'p' . $profile->id]); ?>
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'form-inline', 'data-pjax' => true],
        ]); ?>
        <?= $form->field($profile, 'phone')->textInput(['maxlength' => true]) ?>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end(); ?>
        <?php Pjax::end(); ?>
    </div>
<div class="profile-points">
    <!-- Nav tabs -->
    <ul class="nav nav-pills nav-stacked point-list">
        <?php $i = 0; ?>
        <?php foreach($points as $point) : ?>
            <li><a href="#<?= $point->id; ?>" data-toggle="tab"><?= 'г. ' . $point->cities->name . ', ' . $point->address ?></a></li>
        <?php endforeach; ?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content point-list-content">
        <div class="tab-pane active" id="home"><div class="alert alert-warning">Вы управляющий перечисленных слева точек, выберите одну из них и внесите необходимые изменения, после этого не забудьте нажать "Сохранить"</div></div>
        <?php foreach($points as $point) : ?>
            <div class="tab-pane" id="<?= $point->id; ?>">
                <?= $this->render('save', [
                    'point' => $point,
                ]) ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>



</div>

