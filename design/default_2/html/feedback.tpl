{* Страница с формой обратной связи *}

{* Канонический адрес страницы *}
{$canonical="/{$page->url}" scope=parent}
<div class="container-fluid container-fluid--grey feedback">
	

  <div class="feedback__address col-sm-5 col-lg-4">
  	<h1>{$page->name|escape}</h1>
  	{$page->body}
  </div>

  {if $message_sent}  
  <div class="feedback__message modal__success feedback__form">
  	{include file="svg.tpl" svgId="ic_checkbox" width="100px" fill="#12a4dd"}
		<p class="modal__text"> {$name|escape}, ваше сообщение отправлено.</p>
		<button class="btn modal__btn js-form__btn-close" onclick="$('.feedback__message').hide();">Ок</button>
	</div>
  {else}

  <form class="feedback__form col-sm-5 col-lg-4 js-form" method="post">
	  <legend class="feedback__form-ledend">Обратная связь</legend>
	  {if $error}
	  <div class="message_error">
	  	{if $error=='captcha'}
	  	Неверно введена капча
	  	{elseif $error=='empty_name'}
	  	Введите имя
	  	{elseif $error=='empty_email'}
	  	Введите email
	  	{elseif $error=='empty_text'}
	  	Введите сообщение
	  	{/if}
	  </div>
	  {/if}
	  <div class="form__group">
	  	<label>Имя</label>
	    <input data-format=".+" data-notice="Введите имя" value="{$name|escape}" name="name" maxlength="255" minlength="2" type="text" required>
	  </div>
	  <div class="form__group">
	  	<label>Email</label>
	    <input data-format="email" data-notice="Введите email" value="{$email|escape}" name="email" maxlength="255" type="text" required>
	  </div>
	  <div class="form__group">
	  	<label>Сообщение</label>
	    <textarea data-format=".+" data-notice="Введите сообщение" value="{$message|escape}" name="message" required>{$message|escape}</textarea> 
	  </div>
	  <div class="captcha clearfix form__group">
	  	<img class="captcha__img" src="captcha/image.php?{math equation='rand(10,10000)'}"/>
	  	<input class="captcha__input" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу">
	  </div> 
	   <input class="btn btn--send" type="submit" name="feedback" value="Отправить" />
  </form>
  {/if}
  <div class="feedback__map" id="map"></div>
</div>
