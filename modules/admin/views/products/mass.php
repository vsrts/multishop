<?php
    use \yii\helpers\Html;
?>
<a href="<?= \yii\helpers\Url::to(['products/export']) ?>" class="btn btn-info">Экспортировать все товары</a>


<?= Html::beginForm(['products/import'], 'post', ['enctype' => 'multipart/form-data']); ?>
<?= Html::fileInput('csvFile'); ?>
<?= Html::submitButton('Импортировать', ['class' => 'btn btn-lg btn-primary']) ?>
<?= Html::endForm(); ?>