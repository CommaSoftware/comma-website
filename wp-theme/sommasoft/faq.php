<section class="faq">
		<div class="content-area-wrapper">
			<a name="faq"></a>
			<h2 class="heading">FAQ</h2>
			<p class="text">Мы собрали список вопросов, которые часто задают наши клиенты</p>
			<div class="faq__block">

				<?php
					$the_query = new WP_Query( array(
						'post_type' => 'faq',
						'posts_per_page'=> -1,
						'order' => 'ASC'
					) );
					// цикл вывода полученных записей
					while( $the_query->have_posts() ){
						$the_query->the_post();
				?>
					<details class="faq__item">
						<summary class="faq__item__question"><?php the_title(); ?></summary>
						<div class="faq__item__answer"><?php the_content(); ?></div>
					</details>

				<?php } wp_reset_postdata(); wp_reset_query(); ?>
			</div>
	</section>