{* Письмо пользователю для восстановления пароля *}

{* Канонический адрес страницы *}
{$canonical="/user/password_remind" scope=parent}

<div class="container-fluid container-fluid--grey">
	<div class="row">
		<div class="col-xs-12 col-sm-6  offset-sm-3 remind__col">
			{if $email_sent}
      <h1 class="remind__title">Вам отправлено письмо</h1>
      <p class="remind__text">На {$email|escape} отправлено письмо для восстановления пароля.</p>
      {else}
      <h1 class="remind__title">Напоминание пароля</h1>
        {if $error}
        <div class="message_error">
	        {if $error == 'user_not_found'}Пользователь не найден
	        {else}{$error}{/if}
        </div>
        {/if}
			<form class="remind__form js-form" method="post">
	      <label class="after" for="remind__email">Введите email, который вы указывали при регистрации</label>
	      <input type="text" id="remind__email" name="email" data-format="email" data-notice="Введите email" value="{$email|escape}"  maxlength="255"/>
	      <input type="submit" class="btn remind__btn" value="Вспомнить" />
      </form>
    {/if}
		</div>
	</div>
</div>


