<?php
/*
Template Name: sing-up
*/

get_header(); ?>

<div class="container sing-up-block">


<div class="wplb_flex wplb_holder <?php echo is_user_logged_in() ? 'wplb_alert wplb_signon' : ''?>">
	<?php if(is_user_logged_in()) {
		echo 'Вы уже авторизованный пользователь! <a href="'.wp_logout_url().'">Выход</a>';
	}else { ?>

	<div class="wplb_login">
		<p class="wplb_heading">Авторизация</p>
		<form data-type="authorization" autocomplete="false">
			<div class="wplb_flex">
				<div>
					<label>Логин или E-mail</label>
					<input type="text" name="wplb_login" placeholder="Логин" required>
				</div>
				<div>
					<label>Пароль</label>
					<input type="password" name="wplb_password" placeholder="******" autocomplete="false" required>
				</div>
			</div>
			<input type="submit" name="wplb_submit" value="Войти"><span class="wplb_loading">Загрузка...</span>
			<div class="wplb_alert"></div>
		</form>
	</div>
	<div class="wplb_registration">
		<p class="wplb_heading">Регистрация</p>
		<form data-type="registration" autocomplete="off">
			<div>
				<label>Желаемый логин</label>
				<input type="text" name="wplb_login" placeholder="Имя пользователя" aria-required>
				<label>E-mail адрес</label>
				<input type="email" name="wplb_email" placeholder="E-mail">
			</div>
			<div>
				<label>Пароль</label>
				<input type="password" name="wplb_password" placeholder="Пароль" required>
			</div>
			<input type="submit" name="wplb_submit" value="Зарегистрироваться"><span class="wplb_loading">Загрузка...</span>
			<div class="wplb_alert"></div>
		</form>
	</div>

	<?php } ?>
	
</div>	


</div>

<?php get_footer();