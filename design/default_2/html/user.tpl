{* Шаблон страницы зарегистрированного пользователя *}

	<div class="container-fluid container-fluid--grey">
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="register__col">
          <span class="user__name">{$user->name|escape}</span>
        {if $error}
        <div class="message_error">
          {if $error == 'empty_name'}Введите имя
          {elseif $error == 'empty_email'}Введите email
          {elseif $error == 'empty_password'}Введите пароль
          {elseif $error == 'user_exists'}Пользователь с таким email уже зарегистрирован
          {else}{$error}{/if}
        </div>
        {/if}
        <form class="user__form" method="post">
          <div class="form__group">
            <label for="user__name">Имя</label>
            <input id="user__name" data-format=".+" data-notice="Введите имя" value="{$name|escape}" name="name" maxlength="255" type="text"/>
          </div>
          <div class="form__group">
            <label for="user__mail">Email</label>
            <input id="user__mail" data-format="email" data-notice="Введите email" value="{$email|escape}" name="email" maxlength="255" type="text"/>
          </div>
          <a class="btn user__btn-password" href='#' onclick="$('.user__password').show();return false;">Изменить пароль</a>
          <input class="user__password" value="" name="password" type="password" style="display:none;"/>
          <input type="submit" class="btn user__btn-save" value="Сохранить">
        </form>
      </div>
      </div>
      
      {if $orders}
      <div class="col-xs-12 col-sm-6">
        <div class="register__col">
          <p class="user__orders-title">Ваши заказы</p>
          <table class="user__orders-tables">
            {foreach $orders as $order}
            <tr class="user__orders-item">
              <td class="user__orders-td user__orders-td--date">{$order->date|date}</td>
              <td class="user__orders-td"><a href='order/{$order->url}'>Заказ №{$order->id}</a></td>
              <td class="user__orders-td">{if $order->paid == 1}оплачен,{/if} 
                {if $order->status == 0}ждет обработки{elseif $order->status == 1}в обработке{elseif $order->status == 2}выполнен{/if}
              </td>
            </tr>
            {/foreach}
          </table>
        </div>
      </div>
      {/if}
    </div>
	</div>

