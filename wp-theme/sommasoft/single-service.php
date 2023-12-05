<?php

/*
 Template name: Страница услуги
 Template post type: service
 */

get_header();
?>

<article>
	<?php $args = array(
		'post_type' => array( 'project' ),
		'publish' => true,	);
	$query = new WP_Query( $args );
	if( have_posts() ){
		while (have_posts()) {	the_post(); ?>
			<div class="article__headings-block is-service-heading">
				<div class="article__block">
					<h1 class="article__headings-block__heading"><?php the_title(); ?></h1>
					<?php if(has_excerpt()) { ?>
						<div class="article__headings-block__description"><?php the_excerpt(); ?></div>
					<?php } ?>
					<div class="is-service-heading__price-block">
						<a href="<?php echo get_theme_mod('btn_start__href', ''); ?>" class="btn text-animation-block">Начать проект</a> 
						<span class="is-service-heading__price"><?php if(get_post_meta($post->ID, 'price', 1) != '') echo get_post_meta($post->ID, 'price', 1); ?></span>
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
		<?php } wp_reset_postdata(); ?>	
	<?php } wp_reset_query(); ?>
</article>


<?php get_template_part( 'casesprev' ); ?>
<?php get_template_part( 'faq' ); ?>

<?php get_footer(); ?>