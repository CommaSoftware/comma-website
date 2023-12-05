<section class="blog-preview">
	<div class="content-area-wrapper">
		<div class="blog-preview__heading-block">
			<h2 class="heading">Блог</h2>
			<a href="<?php echo get_home_url(); ?>/blog" class="btn is-bordered text-animation-block">Больше статей</a>
		</div>
		
		<div class="blog-preview__block">
			<?php
				if(is_single()){ $current_post_id = $post->ID; }
					else { $current_post_id = null; }

				$the_query = new WP_Query( array(
					'posts_per_page'=> 3,
					'post_type' => 'post',
					'post__not_in'=>array($current_post_id),
				) );
				// цикл вывода полученных записей
				while( $the_query->have_posts() ){
					$the_query->the_post();
			?>
				<a href="<?php the_permalink(); ?>" class="blog-card">
					<div class="blog-card__img-block">
						<?php if (has_post_thumbnail()) { ?>
							<img src="<?php the_post_thumbnail_url('medium'); ?>" loading="lazy" alt="<?php get_the_post_thumbnail_caption( $post ); ?>" class="blog-card__img">
						<?php } ?>
					</div>
					<h3 class="blog-card__heading"><?php the_title(); ?></h3>
				</a>
			<?php } wp_reset_postdata(); wp_reset_query(); ?>
		</div>
		<svg class="svg">
			<clipPath id="rectangleBlogCover" clipPathUnits="objectBoundingBox">
				<path d="M0,0.039 C0,0.017,0.01,0,0.022,0 H0.978 C0.99,0,1,0.017,1,0.039 V0.591 C1,0.602,0.998,0.611,0.994,0.619 L0.972,0.657 C0.968,0.665,0.965,0.676,0.965,0.688 V0.961 C0.965,0.983,0.955,1,0.943,1 H0.022 C0.01,1,0,0.983,0,0.961 V0.039"/>
			</clipPath>
		</svg>
	</div>
</section>