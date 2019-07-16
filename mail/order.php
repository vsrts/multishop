<div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id => $item) : ?>
                <tr>
                    <td><a href="<?= yii\helpers\Url::to(['products/view', 'alias' => $item['category'], 'itemname' => $item['alias']], true) ?>" target="_blank"><?= $item['name'] ?></a></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price'] ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="2">Итого: </td>
                <td><?= $session['cart.sum'] ?></td>
            </tr>
            </tbody>

</table>
</div>