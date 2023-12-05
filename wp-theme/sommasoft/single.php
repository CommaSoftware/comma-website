<?php 

/*
 Template name: Запись
 Template post type: post
*/

get_header(); ?>


<?php $args = array(
		'post_type' => array( 'post' ),
		'publish'	=> true,	);
	$query = new WP_Query( $args );
	if( have_posts() ) {
		while (have_posts()) {	the_post(); ?>
	<article>
		<div class="article__headings-block">
			<div class="article__block">
				<h1 class="article__headings-block__heading"><?php the_title(); ?></h1>
				<?php if(has_excerpt()) { ?>
					<div class="article__headings-block__description"><?php the_excerpt(); ?></div>
				<?php } ?>
				<?php if (has_post_thumbnail()) { ?>
					<div class="article__headings-block__img-block">
						<img class="article__headings-block__img" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php get_the_post_thumbnail_caption( $post ); ?>">
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="article__block">
			<div class="article__author-block">
				<span class="article__author-block__span">Автор</span>
				<div class="article__author-block__author-name-date">
					<img src="<?php echo get_avatar_url($post->post_author); ?>" alt="" class="article__author-block__img">
					<div class="article__author-block__name-date">
						<span class="article__author-block__name"><?php the_author(); ?></span>
						<time class="article__author-block__date"><?php echo get_the_date('M j, Y'); ?></time>
					</div>
				</div>
			</div>
		</div>
		<div class="article__block comma-wp-content">
			<?php the_content(); ?>
		</div>
		<svg class="svg">
			<clipPath id="rectangleArticleCover" clipPathUnits="objectBoundingBox">
				<path d="M0,0.02 C0,0.009,0.005,0,0.011,0 H0.989 C0.995,0,1,0.009,1,0.02 V0.795 C1,0.801,0.999,0.806,0.996,0.81 L0.981,0.833 C0.979,0.837,0.977,0.843,0.977,0.848 V0.98 C0.977,0.991,0.972,1,0.966,1 H0.011 C0.005,1,0,0.991,0,0.98 V0.02"/>
			</clipPath>
		</svg>
	</article>
	<?php } wp_reset_postdata(); ?>	
	<?php } wp_reset_query(); ?>

	<?php get_template_part( 'blogprev' ); ?>

<?php get_footer(); ?>