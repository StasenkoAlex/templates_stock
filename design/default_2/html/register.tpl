{* Страница регистрации *}

{* Канонический адрес страницы *}
{$canonical="/user/register" scope=parent}

{$meta_title = "Регистрация" scope=parent}

<div class="container-fluid container-fluid--grey">
	<div class="row">
		<div class="col-xs-12 col-sm-6 offset-sm-3 register__col">
			<h3 class="register__title">Регистрация</h3>
			<p class="register__text">Если Вы уже зарегистрированы, перейдите на страницу <a class="register__link" href="user/login">авторизации.</a></p>
			<form class="register__form js-form" method="post">
				  {if $error}
				  <div class="message_error">
				  	{if $error == 'empty_name'}Введите имя
				  	{elseif $error == 'empty_email'}Введите email
				  	{elseif $error == 'empty_password'}Введите пароль
				  	{elseif $error == 'user_exists'}Пользователь с таким email уже зарегистрирован
				  	{elseif $error == 'captcha'}Неверно введена капча
				  	{else}{$error}{/if}
				  </div>
				  {/if}
				  <div class="form__group">
				  	<label class="after" for="register__name">Имя</label>
					  <input type="text" id="register__name" name="name" data-format=".+" data-notice="Введите имя" value="{$name|escape}" maxlength="255" minlength="2" required>
				  </div>
				  <div class="form__group">
				  	<label class="after" for="register__mail">Email</label>
					  <input type="text" id="register__mail"  name="email" data-format="email" data-notice="Введите email" value="{$email|escape}" maxlength="255" required>
				  </div>
				  <div class="form__group">
				  	<label class="after" for="register__password">Пароль</label>
					  <input type="password" id="register__password" name="password" data-format=".+" data-notice="Введите пароль" value="" minlength="4" required>
				  </div>
				  <div class="container-flex container-flex--form form__group">
            <div class="captcha__container">  
              <label class="after" for="comment_captcha">Введите число</label>
              <div class="captcha">
                <img class="captcha__img" src="captcha/image.php?{math equation='rand(10,10000)'}" alt='captcha'/>
                <input class="captcha__input" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу" required>
              </div>  
            </div>
            <input type="submit" class="btn register__btn captcha__btn" name="register" value="Зарегистрироваться">
        </div>
			</form>
			<div class="modal__success js-form__success">
				{include file="svg.tpl" svgId="ic_checkbox" width="100px" fill="#12a4dd"}
				<p class="modal__text">Регистрация прошла успешна!</p>
				<button class="btn modal__btn js-form__btn-close">Ок</button>
			</div>
		</div>
	</div>
</div>

		


