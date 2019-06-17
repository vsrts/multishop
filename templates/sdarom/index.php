<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

//Получаем данные точки
$pointId = VslibVs::selectPoint();
$vs = new VslibVs();

$pointData = $vs->getPoint($pointId);

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

$doc->addScriptVersion($this->baseurl . '/templates/' . $this->template . '/js/template.js');
$doc->addScriptVersion($this->baseurl . '/templates/' . $this->template . '/js/custom.js');

// Add Stylesheets
$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/template.css');
$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/custom.css');
$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/mobile.css');

// Check for a custom CSS file
$userCss = JPATH_SITE . '/templates/' . $this->template . '/css/user.css';

if (file_exists($userCss) && filesize($userCss) > 0)
{
	$this->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/user.css');
}

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
	<jdoc:include type="head" />
	<!--[if lt IE 9]><script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script><![endif]-->
	<?php unset($this->_generator);?>
</head>
<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
	echo ($this->direction == 'rtl' ? ' rtl' : '');
?>">

	<!-- Body -->

	<header class="header" role="banner">
		<div class="top-line">
			<div class="top-inner">
                <?php if($pointData->name) : ?>
                <div class="geo-top2">
                    г. <?= $pointData->name; ?>,
                    <span> <?= $pointData->address; ?></span>
                    <a class="select-gorod" id="select-gorod">Изменить</a>
                </div>
                <?php endif; ?>
				<?php if ($this->countModules('position-1')) : ?>
					<nav class="navigation" role="navigation">
						<div class="navbar pull-left">
							<a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
						</div>
						<div class="nav-collapse">
							<jdoc:include type="modules" name="position-1" style="none" />
						</div>
					</nav>
				<?php endif; ?>
			</div>
		</div>
		<div class="header-inner clearfix">

			<a class="logo" href="<?php echo $this->baseurl; ?>/">
				<img src="/images/logo.png" alt="Суши-Даром">
			</a>
            <div class="head-links">
                <a href="/index.php?option=com_zoo&controller=basket&task=index" class="to-cart"><span>Перейти в корзину</span></a>
                <a href="/aktsii.html" class="to-skidka"><span>Получить скидку <!--50%--></span></a>
            </div>
            <div class="head-social">
                <a href="https://vk.com/sushidarom_rf" class="to-vk" target="_blank"><span>sushidarom_rf </span></a>
                <a href="https://www.instagram.com/sushidarom_rf/" class="to-insta" target="_blank"><span>sushidarom_rf</span></a>
            </div>
            <div class="top-time">
                <?= str_replace(',', '<br>', $pointData->time); ?>
            </div>
            <?php if($pointData->phone) : ?>
			<div class="top-tel">
                <?php if($pointData->second_phone) : ?>
                    <?= $pointData->phone; ?> <br> <!--<span class="tel-text">Сделайте заказ по телефону</span>-->
                    <?= $pointData->second_phone; ?>
                <?php else: ?>
                    <?= $pointData->phone; ?><br> <span class="tel-text">Сделайте заказ по телефону</span>
                <?php endif; ?>
			</div>
            <?php endif; ?>
            <div class="mobile-head">
                <a href="/index.php?option=com_zoo&amp;controller=basket&amp;task=index" class="go-cart"><span class="tochka"></span></a>
                <a class="call" href="tel:<?= $pointData->phone; ?>"></a>
                <div class="menu-mob"></div>
            </div>


				<jdoc:include type="modules" name="position-0" style="none" />

		</div>

		<div class="slide_panel_wrap">	
			<div class="slide_panel">
				<div class="open"><img src="/images/cart.png"></div>
				<jdoc:include type="modules" name="cart" />
			</div>
		</div>	
	</header>
	<?php if ($this->countModules('banner')) : ?>
	<div class="slider">
		<div class="slider-inner">
			<jdoc:include type="modules" name="banner" style="xhtml" />
		</div>
	</div>
	<?php endif; ?>

	<?php if ($this->countModules('position-8')) : ?>
		<!-- Begin Sidebar -->
		<div class="katalog-nav">
				<jdoc:include type="modules" name="position-8" style="xhtml" />
		</div>
		<!-- End Sidebar -->
	<?php endif; ?>
	<div class="body">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
			<!-- Header -->
			
			
			
			<div class="row-fluid">
				
				<main id="content" role="main" class="<?php echo $span; ?>">
					<!-- Begin Content -->
					<jdoc:include type="modules" name="position-2" style="none" />
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<jdoc:include type="modules" name="position-3" style="xhtml" />
					<!-- End Content -->
				</main>
				<?php if ($this->countModules('position-7')) : ?>
					<div id="aside" class="span3">
						<!-- Begin Right Sidebar -->
						<jdoc:include type="modules" name="position-7" style="well" />
						<!-- End Right Sidebar -->
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="footer" role="contentinfo">
		<div class="footer-inner">
			<jdoc:include type="modules" name="footer" style="none" />
			<hr />
			<p>
				<span class="copyright">&copy; <?php echo date('Y'); ?> <?php echo $sitename; ?></span>
				<span class="developer">
					<a href="http://webmaster.vsmart.su/" title="Разработчик сайта" target="_blank">Разработчик сайта</a> - <img src="/images/vs.png" alt="VS">
				</span>
			</p>
		</div>
	</footer>
	<jdoc:include type="modules" name="debug" style="none" />
	<script> window.appsConfig = {"apiDomain":"ru.foodsoul.pro","chainId":958,"buttonOffset":24,"position":"bottomRight","transformButton":false,"orientation":"horizontal","delay":100,"buttonOffsetVertical":24,"buttonOffsetHorizontal":24,"backgroundUrl":"https://static.foodsoul.pro/apps-promoter/images/backgrounds/city_1.jpg"}; </script>
<script src="https://static.foodsoul.pro/apps-promoter/dist/apps-promoter.js" async></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter49982179 = new Ya.Metrika2({
                        id:49982179,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/tag.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks2");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/49982179" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</body>
</html>
