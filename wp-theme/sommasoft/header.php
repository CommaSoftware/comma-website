<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<meta name="theme-color" content="#16191C">

	<title><?php wp_title('//', true, 'right');?> <?php bloginfo('name'); ?></title>

	<?php if(is_front_page()) { ?>
		<meta name="description" content="<?php echo get_bloginfo('description'); ?>">
	<?php } elseif(is_single()) { ?>
		<meta name="description" content="<?php echo get_post()->post_excerpt; ?>">
		<?php if(get_post_meta($post->ID, 'keyword', 1) != '') { ?>
		<meta name="keywords" content="<?php echo get_post_meta($post->ID, 'keyword', 1); ?>" />
		<?php } ?>
	<?php } ?>

	<?php wp_head(); ?>
</head>
<body>
	<header class="main-header">
		<div class="main-header__pannel">
			<a href="<?php echo get_home_url(); ?>" class="main-header__logo" title="На главную">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/comma-logo-white.png" alt="Comma">
			</a>
			<nav class="main-header__nav">
				<div class="main-header__nav__btn"></div>
				<div class="main-header__nav__container">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/command/general-photo.webp" loading="lazy">
					<div class="main-header__nav__container__hello">
						<h3>Рады тебя видеть!</h3>
						<p>Мы команда опытных фрилансеров, объединившихся для работы над стартап-проектом <a href="https://uprologue.com">соцсети «Пролог»</a>. Мы помогаем бизнесу расти и развиваться, создавая классные IT-продукты.</p>
					</div>
						<ul>
							<li><a href="<?php echo get_home_url(); ?>/cases" class="btn is-small is-transparent-bg text-animation-block">Кейсы</a></li>
							<li><a href="<?php echo get_home_url(); ?>#services" class="btn is-small is-transparent-bg text-animation-block">Услуги</a></li>
							<li><a href="<?php echo get_home_url(); ?>/blog" class="btn is-small is-transparent-bg text-animation-block">Блог</a></li>
						</ul>
						<a href="<?php echo get_theme_mod('btn_start__href', ''); ?>" class="btn text-animation-block" target="blank">Начать проект</a>
				</div>
			</nav>
		</div>
	</header>