<section class="cases">
	<a name="cases"></a>
	<div class="cases-banner">
		<div class="content-area-wrapper">
			<?php
				if(is_single()){
					$terms = get_the_terms( $post->ID, 'processes' );
					if( $terms ){
						$term = array_shift( $terms );
						echo '<h2 class="heading">Кейсы по теме <span>'.$term->name.'</span></h2>';
					}
					
				}
				else { echo '<h2 class="heading">Кейсы</h2>'; }
			?>
		</div>
	</div>
	<div class="cases-list">
		<div class="content-area-wrapper">
			<?php
				if(is_single()){ $current_post_terms = array(array('taxonomy' => 'processes', 'field'     => 'id', 'terms'     => wp_get_post_terms( $post->ID, 'processes', array( 'fields' => 'ids' ) ))); }
				else { $current_post_terms = null; }

				$the_query = new WP_Query( array(
					'posts_per_page'=> 5,
					'post_type' => 'case',
					'tax_query' => $current_post_terms,
				) );
				// цикл вывода полученных записей
				while( $the_query->have_posts() ){
					$the_query->the_post();
			?>
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
			<?php } wp_reset_postdata(); wp_reset_query(); ?>
			<a href="<?php echo get_home_url(); ?>/cases" class="btn is-bordered text-animation-block">Больше кейсов</a>
		</div>
		<svg class="svg">
			<clipPath id="rectangleCasesCover" clipPathUnits="objectBoundingBox">	
				<path d='M0.047,0.019 C0.047,0.008,0.053,0,0.061,0 H0.986 C0.994,0,1,0.008,1,0.019 V0.981 C1,0.992,0.994,1,0.986,1 H0.014 C0.006,1,0,0.992,0,0.981 V0.577 C0,0.572,0.001,0.568,0.004,0.564 L0.043,0.506 C0.046,0.502,0.047,0.498,0.047,0.493 V0.019'/>
			</clipPath>
		</svg>
	</div>
</section>