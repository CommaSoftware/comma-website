<section class="reviews">
	<div class="content-area-wrapper">
		<div class="reviews__block">
			<?php
				$the_query = new WP_Query( array(
					'post_type' => 'review',
					'posts_per_page'=> 3,
					'order' => 'ASC'
				) );
				// цикл вывода полученных записей
				while( $the_query->have_posts() ){
					$the_query->the_post();
			?>
				<blockquote class="quote reviews__quote">
					<p><?php the_content(); ?></p>
					<cite><?php the_title(); ?></cite>
				</blockquote>
			<?php } wp_reset_postdata(); wp_reset_query(); ?>
		</div>
		<div class="reviews__lights-block">
			<div class="reviews__light"></div>
			<div class="reviews__light"></div>
			<div class="reviews__light"></div>
			<div class="reviews__btn-block"><a href="<?php echo get_theme_mod('btn_review__href', '#!'); ?>" class="btn is-bordered text-animation-block">Оставить отзыв</a></div>
		</div>
	</div>
</section>