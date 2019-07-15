<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

?>
<?php if(!empty($session['cart'])) : ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id => $item) : ?>
                <tr>
                    <td><a href="<?= Url::to(['products/view', 'alias' => $item['category'], 'itemname' => $item['alias']]) ?>" target="_blank"><?= $item['name'] ?></a></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><span data-id = "<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3">Итого: </td>
                <td><?= $session['cart.sum'] ?></td>
            </tr>
            </tbody>

        </table>
    </div>
    <?php
    $order->type_delivery = 0;
    $form = ActiveForm::begin()
    ?>
    <?= $form->field($order, 'type_delivery')->radioList(['0' => 'Самовывоз', '1' => 'Доставка']); ?>
    <?= $form->field($order, 'name'); ?>
    <?= $form->field($order, 'phone'); ?>
    <?= $form->field($order, 'street'); ?>
    <?= $form->field($order, 'home'); ?>
    <?= $form->field($order, 'apart'); ?>
    <?= $form->field($order, 'comment')->textarea(); ?>
    <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-success']) ?>
    <?php $form = ActiveForm::end() ?>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>
