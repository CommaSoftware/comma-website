<section class="clients">
	<div class="content-area-wrapper">
		<h2 class="heading">Наши клиенты</h2>
		<div class="clients__block scrolling-through">
			<ul>
				<?php
					$the_query = new WP_Query( array(
						'post_type' => 'client',
						'posts_per_page'=> -1,
						'order' => 'ASC'
					) );
					// цикл вывода полученных записей
					while( $the_query->have_posts() ){
						$the_query->the_post();
				?>
					<?php if (has_post_thumbnail()) { ?>
						<li>
							<a href="<?php echo get_post_meta($post->ID, 'client_link', 1); ?>" class="clients__item" title="<?php the_title(); ?>">
								<img 
									src="<?php the_post_thumbnail_url('medium'); ?>"	 
									loading="lazy"
									alt="<?php the_title(); ?> - logo"
								/>
							</a>
						</li>
					<?php } ?>
				<?php } wp_reset_postdata(); wp_reset_query(); ?>
			</ul>
		</div>
	</div>
</section>