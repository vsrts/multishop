<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Categories;
use yii\widgets\Menu;
use yii\helpers\Url;

AppAsset::register($this);


$this->registerLinkTag([
    'rel' => 'shortcut icon',
    'type' => 'image/x-icon',
    'href' => '../../web/favicon.ico',
]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

    <header class="header">
        <div class="header-content">
            <div class="left-info">
                <a class="logo" href="<?= Url::home(); ?>"><img src="/images/logo.png" alt="Суши Даром"></a>
                <?= \app\components\CityWidget::widget(); ?>
                <?= \app\components\AreaWidget::widget(); ?>
            </div>
            <?php echo Menu::widget([
                'items' => [
                    ['label' => 'Акции', 'url' => ['site/stock']],
                    ['label' => 'Доставка и оплата', 'url' => ['site/delivery']],
                    ['label' => 'Вакансии', 'url' => ['site/vacansy']],
                    ['label' => 'Контакты', 'url' => ['site/contacts']],
                ],
                'options' =>[
                    'class' => 'main-menu',
                ],
                'activeCssClass' => 'active',
            ]); ?>
            <div class="right-info">
                <a class="cart-button" id="cart-button" href="#"><img src="/images/cart.png" alt="Корзина"></a>
                <?php echo Nav::widget([
                    'options' => ['class' => 'user-menu'],
                    'items' => [
                        Yii::$app->user->isGuest ? (
                        ['label' => 'Войти', 'url' => ['/admin']]
                        ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                'Выйти (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                        )
                    ],
                ]);  ?>
            </div>
        </div>
    </header>

    <div class="body">
        <?php echo Menu::widget([
            'encodeLabels' => false,
            'items' => Categories::getCategorieslist(),
            'options' =>[
                'class' => 'left-menu',
            ],
            'activeCssClass' => 'active',
        ]); ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <main class="main">
            <?= $content ?>
        </main>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Суши Даром <?= date('Y') ?></p>

            <!--<p class="pull-right"><?= Yii::powered() ?></p>-->
        </div>
    </footer>

<?php \yii\bootstrap\Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
        <a href="' . Url::to(['cart/view']) . '" class="btn btn-success">Оформить заказ</a>
        <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>',
]);
echo "<h3>Корзина пуста</h3>";
\yii\bootstrap\Modal::end();
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
