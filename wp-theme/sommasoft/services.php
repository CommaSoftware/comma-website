<section class="services">
	<div class="services__block content-area-wrapper">
		<a name="services"></a>
		<h2 class="heading">Услуги</h2>
		<p class="text">Мы работаем на всех этапах «жизненного цикла»  проектов: от создания до продвижения</p>
		<div class="services__categories-block">
			<div class="services-category">
				<div class="services-category__heading is-design"><h3>Дизайн</h3></div>
				<div class="services-category__cards-block">
					<?php
						$the_query = new WP_Query( array(
							'post_type' => 'service',
							'processes' => 'design',
							'posts_per_page'=> -1,
						) );
						// цикл вывода полученных записей
						while( $the_query->have_posts() ){
							$the_query->the_post();
					?>
						<a href="<?php the_permalink(); ?>" class="service-card <?php if(get_post_meta($post->ID, 'is_popular', 1)) echo 'is-popular'; ?>">
							<div class="service-card__heading"><h4><?php the_title(); ?></h4></div>
							<div class="service-card__descr">
								<span class="service-card__price"><?php if(get_post_meta($post->ID, 'price', 1) != '') echo get_post_meta($post->ID, 'price', 1); else echo 'Договорная'; ?></span>
								<span class="service-card__more"></span>
							</div>
						</a>
					<?php } wp_reset_postdata(); wp_reset_query(); ?>
				</div>
			</div>
			<div class="services-category">
				<div class="services-category__heading is-dev"><h3>IT-Разработка</h3></div>
				<div class="services-category__cards-block">
					<?php
						$the_query = new WP_Query( array(
							'posts_per_page'=> -1,
							'post_type' => 'service',
							'tax_query' => array(
								array(
									'taxonomy' => 'processes',
									'field'    => 'slug',
									'terms'    => 'it-development'
								)
							)
						) );
						// цикл вывода полученных записей
						while( $the_query->have_posts() ){
							$the_query->the_post();
					?>
						<a href="<?php the_permalink(); ?>" class="service-card <?php if(get_post_meta($post->ID, 'is_popular', 1)) echo 'is-popular'; ?>">
							<div class="service-card__heading"><h4><?php the_title(); ?></h4></div>
							<div class="service-card__descr">
								<span class="service-card__price"><?php if(get_post_meta($post->ID, 'price', 1) != '') echo get_post_meta($post->ID, 'price', 1); else echo 'Договорная'; ?></span>
								<span class="service-card__more"></span>
							</div>
						</a>
					<?php } wp_reset_postdata(); wp_reset_query(); ?>
				</div>
			</div>
			<div class="services-category">
				<div class="services-category__heading is-promotion"><h3>Продвижение</h3></div>
				<div class="services-category__cards-block">
					<?php
						$the_query = new WP_Query( array(
							'posts_per_page'=> -1,
							'post_type' => 'service',
							'tax_query' => array(
								array(
									'taxonomy' => 'processes',
									'field'    => 'slug',
									'terms'    => 'promotion'
								)
							)
						) );
						// цикл вывода полученных записей
						while( $the_query->have_posts() ){
							$the_query->the_post();
					?>
						<a href="<?php the_permalink(); ?>" class="service-card <?php if(get_post_meta($post->ID, 'is_popular', 1)) echo 'is-popular'; ?>">
							<div class="service-card__heading"><h4><?php the_title(); ?></h4></div>
							<div class="service-card__descr">
								<span class="service-card__price"><?php if(get_post_meta($post->ID, 'price', 1) != '') echo get_post_meta($post->ID, 'price', 1); else echo 'Договорная'; ?></span>
								<span class="service-card__more"></span>
							</div>
						</a>
					<?php } wp_reset_postdata(); wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</div>
</section>