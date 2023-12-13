<footer class="main-footer">
		<div class="main-footer__block">
			<div class="main-footer__about">
				<a href="<?php echo get_home_url(); ?>" title="На главную" class="main-footer__about__logo">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/comma-logo-white.png" alt="Comma">
				</a>
				<p>Дизайн, разработка ПО и продвижение сайтов и аккаунтов соцсетей для Вашего бизнеса!</p>
			</div>
			<div class="main-footer__links">
				<nav>
					<ul>
						<li><a href="<?php echo get_home_url(); ?>/blog" class="btn is-small is-transparent-bg text-animation-block">Блог</a></li>
						<li><a href="<?php echo get_home_url(); ?>#services" class="btn is-small is-transparent-bg text-animation-block">Услуги и цены</a></li>
						<li><a href="<?php echo get_home_url(); ?>#about" class="btn is-small is-transparent-bg text-animation-block">О «Comma»</a></li>
						<li><a href="<?php echo get_home_url(); ?>/cases" class="btn is-small is-transparent-bg text-animation-block">Кейсы</a></li>
						<li><a href="<?php echo get_home_url(); ?>#team" class="btn is-small is-transparent-bg text-animation-block">Наша команда</a></li>
						<li><a href="<?php echo get_home_url(); ?>#faq" class="btn is-small is-transparent-bg text-animation-block">FAQ</a></li>
					</ul>
				</nav>
			</div>
			<div class="main-footer__actions">
				<a href="<?php echo get_theme_mod('btn_start__href', ''); ?>" class="btn text-animation-block" target="blank">Начать проект</a>
				<a href="<?php echo get_home_url(); ?>#services" class="btn is-bordered text-animation-block">Каталог услуг</a>
			</div>
			<div class="main-footer__contacts">
				<p><i>Пишите нам по любым вопросам или просто познакомиться :)</i></p>
				<address><a href="mailto:<?php echo get_theme_mod('contacts_email', 'example@site.com'); ?>" title="Отправить письмо" class="btn is-small is-transparent-bg"><?php echo get_theme_mod('contacts_email', 'example@site.com'); ?></a></address>
			</div>
			<div class="main-footer__copyright">
				<span>© 2023 Comma Software</span>
				<a href="<?php echo get_home_url(); ?>/privacy-policy"  class="btn is-small is-transparent-bg text-animation-block">Пользовательское соглашение</a>
			</div>
			<div class="main-footer__socials">
				<ul>
					<?php if(get_theme_mod('contacts_vk_use', 1)) {?>
						<li><a title="Vkontakte" class="is-vk-icon" target="blank" href="<?php echo get_theme_mod('contacts_vk_link', '#!'); ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 25 24" style="enable-background:new 0 0 25 24;" xml:space="preserve"><path d="M22.8,1.7C21.1,0,18.4,0,13,0h-1C6.6,0,3.9,0,2.2,1.7s-1.7,4.4-1.7,9.8v1c0,5.4,0,8.1,1.7,9.8S6.6,24,12,24h1c5.4,0,8.1,0,9.8-1.7s1.7-4.4,1.7-9.8v-1C24.5,6.1,24.5,3.4,22.8,1.7z M17.7,17.3c-0.6-1.9-2.1-3.4-4.1-3.6v3.6h-0.3c-5.5,0-8.6-3.8-8.7-10h2.7c0.1,4.6,2.1,6.5,3.7,6.9V7.3h2.5v3.9c1.6-0.1,3.2-1.9,3.8-3.9h2.6c-0.4,2.5-2.2,4.3-3.5,5c1.3,0.6,3.3,2.2,4.1,5H17.7z"/></svg></a></li>
					<?php }; ?>
					<?php if(get_theme_mod('contacts_tg_use', 1)) {?>
						<li><a title="Telegram" class="is-tg-icon" target="blank" href="<?php echo get_theme_mod('contacts_tg_link', '#!'); ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve"><path d="M75.5,0.5h-51c-13.3,0-24,10.7-24,24v51c0,13.3,10.7,24,24,24h51c13.3,0,24-10.7,24-24v-51C99.5,11.2,88.8,0.5,75.5,0.5z M70,30.5C70,30.5,70,30.5,70,30.5c0.7,0,1.4,0.2,1.9,0.6l0,0c0.4,0.3,0.6,0.8,0.7,1.3v0c0.1,0.4,0.1,0.8,0.1,1.3c0,0.2,0,0.4,0,0.6v0c-0.7,7.5-3.8,25.8-5.4,34.3c-0.7,3.6-2,4.8-3.3,4.9c-2.8,0.3-4.9-1.8-7.6-3.6c-4.2-2.8-6.6-4.5-10.6-7.2c-4.7-3.1-1.7-4.8,1-7.6c0.7-0.7,12.9-11.8,13.1-12.8c0-0.1,0-0.1,0-0.2c0-0.2-0.1-0.5-0.2-0.6l0,0c-0.2-0.1-0.4-0.2-0.6-0.2c-0.1,0-0.3,0-0.4,0.1l0,0c-0.4,0.1-7.1,4.5-20.1,13.3c-1.4,1.1-3.2,1.8-5.2,1.9h0c-2.8-0.3-5.3-0.9-7.6-1.8l0.2,0.1c-3-1-5.4-1.5-5.2-3.1c0.1-0.9,1.3-1.7,3.5-2.6c13.9-6.1,23.2-10,27.8-12c5.1-2.7,11-5,17.3-6.4L70,30.5L70,30.5z"/></svg></a></li>
					<?php }; ?>
					<?php if(get_theme_mod('contacts_vcru_use', 1)) {?>
						<li><a title="VC.RU" class="is-vcru-icon" target="blank" href="<?php echo get_theme_mod('contacts_vcru_link', '#!'); ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve"><path d="M75.5,0.5h-51c-13.3,0-24,10.7-24,24v51c0,13.3,10.7,24,24,24h51c13.3,0,24-10.7,24-24v-51C99.5,11.2,88.8,0.5,75.5,0.5z M65.4,19.7c4-0.3,7.7,0.6,10.9,3.1c0.3,0.3,0.6,0.9,0.6,1.3c0.1,1.9,0,3.8,0,5.7c-1.5,0-2.9,0-4.5,0c0-1.1-0.1-2.3,0-3.4c0.1-0.9-0.3-1.3-1.1-1.6c-4.5-2-9.6-0.6-12,3.3c-2.6,4.2-1.7,9.8,2,12.8c3.5,2.8,8.9,2.4,12.1-1c0.3-0.1,0.5-0.4,0.8-0.7c1.2,0.9,2.3,1.8,3.5,2.7c-2,2.7-4.6,4.5-7.8,5.1c-8.8,1.9-16.7-4.3-17-13.3C52.6,26.7,58.4,20.2,65.4,19.7z M19.7,79c-1.5,0-3,0-4.5,0c0-1.6,0-3,0-4.5c1.5,0,3,0,4.5,0C19.7,76,19.7,77.5,19.7,79z M45.1,60.6c-1.5,0-2.9,0-4.4,0c0-1.3,0-2.5,0-3.9c-1.6,0-3,0.5-4.3,1.5c-2,1.7-3.1,3.8-3.2,6.5c0,3,0,5.9,0,8.9c0,0.3,0,0.7,0,1.1c3.8,0,7.4,0,11.2,0c0,1.5,0,2.8,0,4.2c-6.7,0-13.4,0-20.1,0c0-1.4,0-2.8,0-4.3c1.4,0,2.8,0,4.2,0c0.1-6,0.1-11.8,0.1-17.8c-1.5,0-2.8,0-4.2,0c0-1.4,0-2.6,0-4c2.7,0,5.4,0,8.1,0c0.1,1.6,0.2,3.1,0.3,5.1c3-4.9,7.3-5.7,12.3-5.1C45.1,55.4,45.1,58,45.1,60.6z M47.1,25.7C44.6,32.5,42,39.2,39.5,46c-0.3,0.8-0.7,1.1-1.5,1c-1-0.1-2.3,0.3-3.1-0.2c-0.7-0.5-0.8-1.8-1.2-2.8c-2.2-6.1-4.4-12.1-6.5-18.2c-0.3-0.8-0.6-1.1-1.5-1.1c-0.9,0.2-2,0.1-3.3,0.1c0-1.5,0-3,0-4.5c2.6,0,5.2,0,7.8,0c0.2,0,0.6,0.5,0.7,0.9c2,5.9,4,11.7,6,17.6c0.1,0.2,0.2,0.5,0.3,1c0.2-0.5,0.3-0.8,0.4-1.1c2-5.8,4-11.7,6-17.5c0.2-0.7,0.5-0.9,1.3-0.9c2.2,0.1,4.4,0,6.8,0c0,1.5,0,2.9,0,4.5c-1.1,0-2.2,0-3.3,0C47.7,24.8,47.4,25,47.1,25.7z M79.5,78.9c-0.9,0-1.8,0-2.7,0c-1.2,0-2.3-0.1-3.5,0c-0.7,0-0.9-0.2-1-0.9c-0.1-1.1-0.3-2.1-0.5-3.3c-0.2,0.3-0.4,0.5-0.5,0.7c-2.3,3.4-5.6,4.8-9.6,4c-3.9-0.8-6.5-3.4-7.2-7.4c-0.2-1-0.3-2-0.3-3c0-3.6,0-7.1,0-10.7c0-0.3,0-0.7,0-1.2c-1.3,0-2.6,0-3.9,0c0-1.6,0-3,0-4.5c2.9,0,5.7,0,8.6,0c0,0.4,0,0.8,0,1.2c0,4.9,0,9.7,0,14.5c0,1.1,0.1,2.3,0.4,3.3c0.7,2.9,3.2,4.4,6.1,3.7c3-0.7,5.4-3.3,5.6-6.7c0.2-3.7,0-7.5,0.2-11.5c-1.6,0-3,0-4.5,0c0-1.5,0-2.9,0-4.4c3.1,0,6.1,0,9.3,0c0,7.2,0,14.5,0,21.8c1.3,0,2.3,0,3.5,0C79.5,76,79.5,77.4,79.5,78.9z"/></svg></a></li>
					<?php }; ?>
					<?php if(get_theme_mod('contacts_behance_use', 1)) {?>
						<li><a title="Behance" class="is-behance-icon" target="blank" href="<?php echo get_theme_mod('contacts_behance_link', '#!'); ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve"><path d="M0,24v52c0,13.3,10.7,24,24,24h52c13.3,0,24-10.7,24-24V24c0-13.3-10.7-24-24-24H24C10.7,0,0,10.7,0,24z M39.9,53.3c-1-0.5-2.5-0.7-4.4-0.7h-9.4v11.6h9.2c1.9,0,3.4-0.2,4.4-0.8c1.9-0.9,2.9-2.8,2.9-5.4C42.7,55.8,41.8,54.2,39.9,53.3z M40.1,44.3c1.2-0.7,1.8-2,1.8-3.8c0-2-0.8-3.4-2.3-4c-1.3-0.4-3.1-0.7-5.1-0.7h-8.1v9.6h9.2C37.3,45.4,38.9,45,40.1,44.3z M68.3,45.1c-2.1,0-3.7,0.6-4.9,1.8c-1.2,1.2-1.9,2.8-2.2,4.8h14.1c-0.2-2.2-0.9-3.8-2.2-4.9C71.9,45.7,70.3,45.1,68.3,45.1z M59.5,30h17.6v4.4H59.5V30z M50,65.6c-0.8,1.4-1.9,2.5-3.1,3.4c-1.4,1.1-3,1.8-4.9,2.2c-1.9,0.4-3.9,0.6-6.2,0.6H16.2V28.2h21.1c5.3,0.1,9.1,1.6,11.3,4.6c1.3,1.9,2,4.1,2,6.7c0,2.7-0.7,4.8-2,6.4c-0.7,0.9-1.9,1.7-3.3,2.5c2.2,0.8,3.9,2.1,5,3.9c1.1,1.8,1.7,3.9,1.7,6.4C51.9,61.2,51.3,63.6,50,65.6z M83.8,57.1H61.1c0.1,3.1,1.2,5.3,3.3,6.6c1.2,0.8,2.7,1.2,4.5,1.2c1.9,0,3.4-0.5,4.5-1.4c0.6-0.5,1.2-1.2,1.7-2.1h8.3c-0.2,1.9-1.2,3.7-3,5.6c-2.8,3-6.7,4.6-11.7,4.6c-4.2,0-7.8-1.3-11-3.8c-3.2-2.6-4.8-6.7-4.8-12.5c0-5.4,1.4-9.6,4.3-12.5c2.9-2.9,6.6-4.3,11.2-4.3c2.7,0,5.2,0.5,7.3,1.5c2.2,1,4,2.5,5.4,4.6c1.3,1.9,2.1,4,2.5,6.5C83.8,52.4,83.9,54.4,83.8,57.1z"/></svg></a></li>
					<?php }; ?>
					<?php if(get_theme_mod('contacts_github_use', 1)) {?>
						<li><a title="GitHub" class="is-github-icon" target="blank" href="<?php echo get_theme_mod('contacts_github_link', '#!'); ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 25 24" style="enable-background:new 0 0 25 24;" xml:space="preserve"><path d="M12.5,0C5.7,0,0.3,5.5,0.3,12.3c0,5.4,3.5,10,8.4,11.7c0.6,0.1,0.8-0.3,0.8-0.6c0-0.3,0-1.3,0-2.3c-3.4,0.7-4.1-1.5-4.1-1.5C4.8,18.2,4,17.8,4,17.8C2.8,17.1,4,17.1,4,17.1c1.2,0.1,1.9,1.3,1.9,1.3c1.1,1.9,2.9,1.3,3.6,1c0.1-0.8,0.4-1.3,0.8-1.6c-2.7-0.3-5.6-1.3-5.6-6.1c0-1.3,0.5-2.4,1.3-3.3C5.8,8,5.4,6.8,6.1,5.1c0,0,1-0.3,3.4,1.3c1-0.3,2-0.4,3.1-0.4c1,0,2.1,0.1,3.1,0.4c2.3-1.6,3.4-1.3,3.4-1.3c0.7,1.7,0.2,3,0.1,3.3c0.8,0.9,1.3,2,1.3,3.3c0,4.7-2.9,5.8-5.6,6.1c0.4,0.4,0.8,1.1,0.8,2.3c0,1.6,0,3,0,3.4c0,0.3,0.2,0.7,0.8,0.6c4.9-1.6,8.4-6.2,8.4-11.7C24.7,5.5,19.2,0,12.5,0z"/></svg></a></li>
					<?php }; ?>
				</ul>
			</div>
		</div>
	</footer>
</body>
</html>
<?php wp_footer(); ?>