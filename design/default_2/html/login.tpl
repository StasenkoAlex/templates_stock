{* Страница входа пользователя *}

{* Канонический адрес страницы *}
{$canonical="/user/login" scope=parent}

{$meta_title = "Вход" scope=parent}
<div class="section--dark login">
	<div class="container-fluid">
	<div class="row">
		{if $error}
		<div class="message_error">
			{if $error == 'login_incorrect'}Неверный логин или пароль
			{elseif $error == 'user_disabled'}Ваш аккаунт еще не активирован.
			{else}{$error}{/if}
		</div>
		{/if}
		<div class="col-md-6">
			<div class="login__col">
				<p class="login__col-title">Новый клиент</p>
				<b class="login__col-title_strong">Регистрация</b>
				<p class="login__col-text">Создание учетной записи поможет покупать быстрее. Вы сможете контролировать состояние заказа, а также просматривать заказы сделанные ранее. Вы сможете накапливать призовые баллы и получать скидочные купоны.<br>
				А постоянным покупателям мы предлагаем гибкую систему скидок и персональное обслуживание.</p>
				<a href="user/register" class="btn">Продолжить</a>
			</div>
		</div>
		<div class="col-md-6">
			<div class="login__col">
				<p class="login__col-title">Зарегистрированный клиент</p>
				<b class="login__col-title_strong">Войти в личный кабинет</b>
				<form class="login__form js-form" method="post">
					<div class="form__group">
						<label for="login_email">Email</label>
					  <input id="login_email" type="text" name="email" data-format="email" data-notice="Введите email" value="{$email|escape}" maxlength="255" required>
					</div>
					<div class="form__group">
						<label for="login_password">Пароль</label>
					  <input id="login_password" type="password" name="password" data-format=".+" data-notice="Введите пароль" value="" required>
					</div>
					<a class="login__remaind" href="user/password_remind">Забыли пароль?</a>
					<input type="submit" class="btn" name="login" value="Войти">
				</form>
			</div>
		</div>
	</div>
</div>
</div>


