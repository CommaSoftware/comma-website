<section class="command">
		<a name="team"></a>
		<div class="content-area-wrapper">
			<h2 class="heading">Команда</h2>
			<div class="command__block">
				<?php
					$the_query = new WP_Query( array(
						'post_type' => 'worker',
						'posts_per_page'=> -1,
						'order' => 'ASC'
					) );
					// цикл вывода полученных записей
					while( $the_query->have_posts() ){
						$the_query->the_post();
				?>
					<div class="command__card-3D-container">
						<a href="https://vk.com/<?php echo get_post_meta($post->ID, 'worker_vkname', 1); ?>" target="blank" title="Открыть профиль" class="command__card mousemove-card-animation">
							<div class="command__card__descr-block">
								<h3><?php the_title(); ?></h3>
								<span class="command__card__career"><?php echo get_post_meta($post->ID, 'worker_post', 1); ?></span>
								<?php the_excerpt(); ?>
								<div class="command__card__contact">@<?php echo get_post_meta($post->ID, 'worker_vkname', 1); ?></div>
							</div>
							<div class="command__card__img-block">
								<?php if (has_post_thumbnail()) { ?>
									<img loading="lazy" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php get_the_post_thumbnail_caption( $post ); ?>">
								<?php } ?>
							</div>
						</a>
					</div>
				<?php } wp_reset_postdata(); wp_reset_query(); ?>
				<a href="<?php echo get_theme_mod('btn_vacancy__href', '#!'); ?>" target="blank" title="Написать нам" class="command__card is-vacancy">
					<div class="command__card__descr-block">
						<h3>Хочу сотрудничать!</h3>
						<span class="command__card__career">вакансия</span>
						<p>Мы всегда рады работать<br>с выдающимися людьми.<br><br>Хочешь стать частью нашей команды или предложить сотрудничество? – Напиши нам и расскажи о себе)</p>
					</div>
					<div class="command__card__img-block"></div>
				</a>
			</div>
		</div>
		<svg class="svg">
			<clipPath id="rectangleCommandCard" clipPathUnits="objectBoundingBox">
				<path d="M0.046,0.017 C0.046,0.008,0.057,0,0.069,0 H0.977 C0.99,0,1,0.008,1,0.017 V0.958 C1,0.963,0.998,0.967,0.993,0.97 L0.961,0.995 C0.956,0.998,0.95,1,0.944,1 H0.023 C0.01,1,0,0.992,0,0.983 V0.507 C0,0.503,0.002,0.498,0.007,0.495 L0.039,0.47 C0.044,0.467,0.046,0.463,0.046,0.458 V0.017"/>
			</clipPath>
		</svg>
	</section>