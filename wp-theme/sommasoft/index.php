<?php get_header(); ?>

	<section class="main-banner">
		<div class="main-banner__block content-area-wrapper">
			<h1>Создаём продукты, <span>продвигающие</span> бизнес</h1>
			<ul>
				<li><a class="btn is-small is-transparent-bg text-animation-block" href="#services">Дизайн</a></li>
				<li><a class="btn is-small is-transparent-bg text-animation-block" href="#services">Сайты и ПО</a></li>
				<li><a class="btn is-small is-transparent-bg text-animation-block" href="#services">SMM и SEO</a></li>
			</ul>
		</div>
	</section>

	<?php get_template_part( 'services' ); ?>
	<?php get_template_part( 'casesprev' ); ?>
	<?php get_template_part( 'clients' ); ?>
	<?php get_template_part( 'reviews' ); ?>
	<?php get_template_part( 'about' ); ?>
	<?php get_template_part( 'command' ); ?>
	<?php get_template_part( 'faq' ); ?>
	<?php get_template_part( 'blogprev' ); ?>

<?php get_footer(); ?>