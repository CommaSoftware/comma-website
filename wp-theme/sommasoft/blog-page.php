<?php
/*
Template Name: Страница блога
*/

get_header();
?>

	<section class="blog content-area-wrapper">
		<h2 class="heading">Блог</h2>
		<div class="blog__block">
			<?php 
			// set the "paged" parameter (use 'page' if the query is on a static front page)
			if ( get_query_var('paged') ) $paged = get_query_var('paged');
			elseif ( get_query_var('page') ) $paged = get_query_var('page');
			else $paged = 1;

			$the_query = new WP_Query( array(
				'post_type' => 'post',
				'posts_per_page'=>12,
				'paged' => $paged,
			) );
			// цикл вывода полученных записей
			while( $the_query->have_posts() ){
				$the_query->the_post(); ?>
				<a href="<?php the_permalink(); ?>" class="blog-card">
					<div class="blog-card__img-block">
						<?php if (has_post_thumbnail()) { ?>
							<img src="<?php the_post_thumbnail_url('medium'); ?>" class="blog-card__img" alt="<?php get_the_post_thumbnail_caption( $post ); ?>">
						<?php } ?>
					</div>
					<h3 class="blog-card__heading"><?php the_title(); ?></h3>
					<div class="blog-card__description"><?php the_excerpt(); ?></div>
				</a>
			<?php } ?>
			<?php wp_reset_postdata(); ?> 
			<svg class="svg">
				<clipPath id="rectangleBlogCover" clipPathUnits="objectBoundingBox">
					<path d="M0,0.039 C0,0.017,0.01,0,0.022,0 H0.978 C0.99,0,1,0.017,1,0.039 V0.591 C1,0.602,0.998,0.611,0.994,0.619 L0.972,0.657 C0.968,0.665,0.965,0.676,0.965,0.688 V0.961 C0.965,0.983,0.955,1,0.943,1 H0.022 C0.01,1,0,0.983,0,0.961 V0.039"/>
				</clipPath>
			</svg>
		</div>
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
				'prev_text'    => ('<svg viewBox="0 0 9 10" xmlns="http://www.w3.org/2000/svg"><path d="M7.79798 0.0923631C7.52042 -0.0504737 7.18631 -0.0262117 6.9323 0.155225L2.41667 3.38068V0.833336C2.41667 0.373099 2.04357 3.00254e-06 1.58333 3.00254e-06C1.1231 3.00254e-06 0.75 0.373099 0.75 0.833336V9.16666C0.75 9.6269 1.1231 10 1.58333 10C2.04357 10 2.41667 9.6269 2.41667 9.16666V6.61932L6.9323 9.84477C7.18631 10.0262 7.52042 10.0505 7.79798 9.90764C8.07554 9.7648 8.25 9.47882 8.25 9.16666V0.833336C8.25 0.52118 8.07554 0.2352 7.79798 0.0923631Z" fill="#000000"/></svg>'),
				'next_text'    => ('<svg viewBox="0 0 9 10" xmlns="http://www.w3.org/2000/svg"><path d="M1.20202 0.0923633C1.47957 -0.0504736 1.81369 -0.0262119 2.0677 0.155225L6.58333 3.38068V0.833336C6.58333 0.373099 6.95643 3.06343e-06 7.41666 3.06343e-06C7.8769 3.06343e-06 8.25 0.373099 8.25 0.833336V9.16666C8.25 9.6269 7.8769 10 7.41666 10C6.95643 10 6.58333 9.6269 6.58333 9.16666V6.61932L2.0677 9.84477C1.81369 10.0262 1.47957 10.0505 1.20202 9.90764C0.924456 9.7648 0.75 9.47882 0.75 9.16666V0.833336C0.75 0.52118 0.924456 0.2352 1.20202 0.0923633Z" fill="#000000"/></svg>'),
				'type'         => 'plain',
				'add_args'     => False,
				'add_fragment' => '',
				'before_page_number' => '',
				'after_page_number'  => ''
			) );
			wp_reset_query(); ?>
		</div>
	</section>

<?php get_footer(); ?>