<?php
/*
Template Name: Страница кейсов
*/

get_header();
?>


	<section class="cases is-cases-page">
		<div class="content-area-wrapper">
			<h2 class="heading">Кейсы</h2>
		</div>
		<div class="cases-list">
			<div class="content-area-wrapper">
				<?php
				if ( get_query_var('paged') ) $paged = get_query_var('paged');
				elseif ( get_query_var('page') ) $paged = get_query_var('page');
				else $paged = 1;
				$the_query = new WP_Query( array(
					'post_type' => 'case',
					'posts_per_page'=>5,
					'paged' => $paged,
				) );
				// цикл вывода полученных записей
				while( $the_query->have_posts() ){
					$the_query->the_post(); ?>
						<a href="<?php the_permalink(); ?>" class="cases-list__item <?php if(!is_single() && get_post_meta($post->ID, 'is_banner', 1)) echo "is-banner"; ?> cases__link">
							<figure class="cases-list__item__image-block">
								<?php if (has_post_thumbnail()) { ?>
									<?php if (get_post_meta($post->ID, 'is_banner', 1)) { ?>
										<img class="cases-list__item__image" loading="lazy" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php get_the_post_thumbnail_caption( $post ); ?>">
									<?php } else { ?>
										<img class="cases-list__item__image" loading="lazy" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php get_the_post_thumbnail_caption( $post ); ?>">
									<?php } ?>
								<?php } ?>
								<?php if(get_post_meta($post->ID, 'website_link', 1) != '' && get_post_meta($post->ID, 'website_name', 1) != '') { ?>
									<figcaption class="cases__btn-to-web">
										<object>
											<a href="<?php echo get_post_meta($post->ID, 'website_link', 1); ?>" target="blank">
												<img class="favicon" src="https://favicon.yandex.net/favicon/<?php echo get_post_meta($post->ID, 'website_link', 1); ?>"  loading="lazy"/>
												<?php echo get_post_meta($post->ID, 'website_name', 1); ?>
											</a>
										</object>
									</figcaption>
								<?php } ?>
							</figure>
							<div class="cases-list__item__descr-block">
								<h3 class="cases__heading"><?php the_title(); ?></h3>
								<div class="cases__descr"><?php the_excerpt(); ?></div>
								<ul class="cases__category-list">
									<?php 
										$cur_terms = get_the_terms( $post->ID, 'processes' );
										if( is_array( $cur_terms ) ){
											foreach( $cur_terms as $cur_term ){ ?>
												<li tabindex="0" onclick='window.location=`<?php echo get_term_link( $cur_term->term_id, $cur_term->taxonomy); ?>`'><?php echo $cur_term->name; ?></li>
											<?php }
										}
									?>
								</ul>
							</div>
							<svg class="svg">
								<clipPath id="rectangleCasesBanner" clipPathUnits="objectBoundingBox">
									<path d="M0,0 H0.989 C0.995,0,1,0.004,1,0.009 V0.479 C1,0.481,0.999,0.483,0.997,0.485 L0.961,0.515 C0.959,0.517,0.958,0.519,0.958,0.521 V0.991 C0.958,0.996,0.953,1,0.947,1 H0 V0"></path>
								</clipPath>
							</svg>
						</a>
					<?php } ?>
				<?php wp_reset_postdata(); ?> 
				<div class="pagination">
					<?php 
					// пагинация для произвольного запроса
						$big = 999999999; // уникальное число
						echo paginate_links( array(
						'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format'  => '?paged=%#%',
						'total'   => $the_query->max_num_pages,
						'current' => max( 1, get_query_var('paged') ),
						'show_all'     => False,
						'end_size'     => 0,
						'mid_size'     => 2,
						'prev_next'    => True,
						'prev_text'    => ('<svg viewBox="0 0 9 10" xmlns="https://www.w3.org/2000/svg"><path d="M7.79798 0.0923631C7.52042 -0.0504737 7.18631 -0.0262117 6.9323 0.155225L2.41667 3.38068V0.833336C2.41667 0.373099 2.04357 3.00254e-06 1.58333 3.00254e-06C1.1231 3.00254e-06 0.75 0.373099 0.75 0.833336V9.16666C0.75 9.6269 1.1231 10 1.58333 10C2.04357 10 2.41667 9.6269 2.41667 9.16666V6.61932L6.9323 9.84477C7.18631 10.0262 7.52042 10.0505 7.79798 9.90764C8.07554 9.7648 8.25 9.47882 8.25 9.16666V0.833336C8.25 0.52118 8.07554 0.2352 7.79798 0.0923631Z" fill="#000000"/></svg>'),
						'next_text'    => ('<svg viewBox="0 0 9 10" xmlns="https://www.w3.org/2000/svg"><path d="M1.20202 0.0923633C1.47957 -0.0504736 1.81369 -0.0262119 2.0677 0.155225L6.58333 3.38068V0.833336C6.58333 0.373099 6.95643 3.06343e-06 7.41666 3.06343e-06C7.8769 3.06343e-06 8.25 0.373099 8.25 0.833336V9.16666C8.25 9.6269 7.8769 10 7.41666 10C6.95643 10 6.58333 9.6269 6.58333 9.16666V6.61932L2.0677 9.84477C1.81369 10.0262 1.47957 10.0505 1.20202 9.90764C0.924456 9.7648 0.75 9.47882 0.75 9.16666V0.833336C0.75 0.52118 0.924456 0.2352 1.20202 0.0923633Z" fill="#000000"/></svg>'),
						'type'         => 'plain',
						'add_args'     => False,
						'add_fragment' => '',
						'before_page_number' => '',
						'after_page_number'  => ''
					) );
					wp_reset_query(); ?>
				</div>
			</div>
			<svg class="svg">
				<clipPath id="rectangleCasesCover" clipPathUnits="objectBoundingBox">	
					<path d='M0.047,0.019 C0.047,0.008,0.053,0,0.061,0 H0.986 C0.994,0,1,0.008,1,0.019 V0.981 C1,0.992,0.994,1,0.986,1 H0.014 C0.006,1,0,0.992,0,0.981 V0.577 C0,0.572,0.001,0.568,0.004,0.564 L0.043,0.506 C0.046,0.502,0.047,0.498,0.047,0.493 V0.019'/>
				</clipPath>
			</svg>
		</div>
	</section>

<?php get_footer(); ?>