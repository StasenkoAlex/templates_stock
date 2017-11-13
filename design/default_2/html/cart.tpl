{* Шаблон корзины *}

{$meta_title = "Корзина" scope=parent}
<div class="container-fluid container-fluid--grey">
	<h1 class="cart__title">
    {include file="svg.tpl" svgId="ic_cart" fill="#12a4dd"}
    {if $cart->purchases}  Корзина покупок<br> ({$cart->total_price|convert}&nbsp;{$currency->sign})
    {else}Корзина пуста{/if}
  </h1>

  {if $cart->purchases}
  <form method="post" name="cart" class="cart__form js-form">
  	{* Список покупок *}
  	<table id="purchases" class="cart-table">
  		<tr class="cart-table__headers">
  			<th>Изображение</th>
  			<th>Название</th>
  			<th>Количество</th>
  			<th>Цена за шт.</th>
  			<th>Всего</th>
  			<th></th>
  		</tr>
  		{foreach $cart->purchases as $purchase}
  		<tr class="clearfix cart-table__row">
  			{* Изображение товара *}
  			<td class="cart-table__image">
  				{$image = $purchase->product->images|first}
  				{if $image}
  				<a href="products/{$purchase->product->url}"><img src="{$image->filename|resize:50:50}" alt="{$product->name|escape}"></a>
  				{/if}
  			</td>
  			{* Название товара *}
  			<td class="cart-table__name">
  				<a class="cart-table__name-link"href="products/{$purchase->product->url}">{$purchase->product->name|escape}</a>
  				{if $purchase->variant->name}
  				<br/>{$purchase->variant->name|escape}	
  				{/if}		
  			</td>

  			{* Количество *}
  			<td class="cart-table__amount js-counter_form">
  				<button class="counter js-counter js-counter_minus" type="button">
  					{include file="svg.tpl" svgId="ic_minus" width="15px" height="22px"}
  				</button>
  				<input type="text" data-max="{$purchase->variant->stock}" class="product__quantity-input quantity js-counter_input"  name="amounts[{$purchase->variant->id}]" value="{$purchase->amount}" onchange="document.cart.submit();">
  				<button class="counter js-counter js-counter_plus" type="button">
  					{include file="svg.tpl" svgId="ic_plus" width="15px" height="22px"}
  				</button>
  			</td>

  			{* Цена за единицу *}
  			<td class="cart-table__price-equal">
  				{($purchase->variant->price)|convert} {$currency->sign}
  			</td>

  			{* Цена(всего) *}
  			<td class="cart-table__price">
  				{($purchase->variant->price*$purchase->amount)|convert}&nbsp;{$currency->sign}
  			</td>

  			{* Удалить из корзины *}
  			<td class="cart-table__remove">
  				<a class="cart-table__remove-link" href="cart/remove/{$purchase->variant->id}">
  					{include file="svg.tpl" svgId="ic_close" width="14px" height="14px"}
  				</a>
  			</td>
  		</tr>
  		{/foreach}
  	</table>

  	<div class="row">
  		<div class="col-sm-6 offset-sm-6 col-md-5 offset-md-7">
  			<table class="cart__total-price">
  				<tr>
  					<td class="cart__total-price-name">Дисконт</td>
  					<td class="cart__total-price-data">{$user->discount}&nbsp;%</td>
  				</tr>
  				<tr>
  					<td class="cart__total-price-name">Итого</td>
  					<td class="cart__total-price-data">{$cart->total_price|convert}&nbsp;{$currency->sign}</td>
  				</tr>
  			</table>
  		</div>
  	</div>

  	{if $coupon_request}
  	<div class="cart-table__coupon">
  		<p>Если у вас есть код купона на скидку выберите соотвествующий пункт ниже</p>
  		<div class="cart-table__coupon js-cart_container"> <!-- js-cart_field -->
  			<button class="cart-table__form-trigger js-coupon_trigger">Использовать купон
  				{include file="svg.tpl" svgId="ic_arrow-down" width="9px" height="9px"}
  			</button>
  			<div class="cart-table__form cart-table__form--coupon js-coupon_content">
  				{if $coupon_error}
  				<div class="cart-table__message_error">
  					{if $coupon_error == 'invalid'}Купон недействителен{/if}
  				</div>
  				{/if}
  				<label for="coupon-code" class="cart-table__label">Введите код купона</label>
  				<input type="text" name="coupon_code" value="{$cart->coupon->code|escape}" id="coupon-code" class="cart-table__input" placeholder="Введите код ">
  				{if $cart->coupon->min_order_price>0}(купон {$cart->coupon->code|escape} действует для заказов от {$cart->coupon->min_order_price|convert} {$currency->sign}){/if}
  				<input class="btn btn--coupon" type="button" name="apply_coupon"  value="Применить купон" onclick="document.cart.submit();">
  			</div>
  		</div>
  	</div>

  	{if $cart->coupon_discount>0}
  	<div class="row">
  		<div class="col-sm-6 offset-sm-6 col-md-5 offset-md-7">
  			<table class="cart__total-price">
  				<tr>
  					<td class="cart__total-price-name">Cкидка по купону</td>
  					<td class="cart__total-price-data">&minus;{$cart->coupon_discount|convert}&nbsp;{$currency->sign}</td>
  				</tr>
  			</table>    
  		</div>
  	</div>
  	{/if}
    {/if}
    
  {*/*order-on-one-page*/*}
  {if $deliveries}
    {* Доставка *}
    <div class="cart-table__form cart-table__form--delivery">
      <legend class="order__paid__form-legend">Выберите способ  доставки</legend>
      <ul class="cart__delivery-list js-cart_list">
        {foreach $deliveries as $delivery}
        <li class="cart__delivery-item cart-table__checkbox js-cart_container">
          <input id="delivery-{$delivery->id}" class="hidden js-delivery-input" type="radio" name="delivery_id" value="{$delivery->id}" data-payments="{$delivery->payment_methods_ids}"{if $delivery@first} checked{/if} >
          <label for="delivery-{$delivery->id}"  class="js-cart_trigger">
            {$delivery->name}
            {include file="svg.tpl" svgId="ic_arrow-down" width="9px" height="9px"}
          </label>
          {if $delivery->description}
          <div class="cart__delivery-description js-cart_content"> 
            {$delivery->description}
          </div>
          {/if}   
        </li>
        {/foreach}
      </ul>
    </div>

    {* Оплата *}
    {if $payment_methods}
    <div class="order__paid-form">
      <legend class="order__paid__form-legend">Выберите способ оплаты</legend>
      <ul class="order__paid-list js-cart_list">
        {foreach $payment_methods as $payment}
        <li class="order__paid-checkbox js-payment js-cart_container">             
          <input id="payment-{$payment->id}" class="hidden js-payment-input" type="radio" name="payment_method_id" value="{$payment->id}" {if $payment@first} checked{/if}>
          <label for="payment-{$payment->id}" class="order__paid-label js-cart_trigger">
           {$payment->name}
           {include file="svg.tpl" svgId="ic_arrow-down" width="9px" height="9px"}
          </label>
          {if $payment->description}
          <div class="order__paid-description js-cart_content"> 
            {$payment->description}
          </div>
          {/if}
        </li>
        {/foreach}
      </ul>
    </div>
    {/if}
  {/if}
  {*/*order-on-one-page*/*}
   
    <div class="cart-table__form cart-table__form--user">
      {if $error}
      <div class="message_error">
        {if $error == 'empty_name'}Введите имя{/if}
        {if $error == 'empty_email'}Введите email{/if}
        {if $error == 'captcha'}Капча введена неверно{/if}
      </div>
      {/if}
    	<legend class="cart-table__form-legend">Личные данные</legend>
      <div class="form__group">
        <label class="after">Имя</label>
        <input name="name" type="text"  value="{$name|escape}" data-format=".+" data-notice="Введите имя" placeholder="Введите имя" minlength="2" required>
      </div>
    	<div class="form__group">
        <label class="after">Email</label>
        <input name="email" type="text" value="{$email|escape}" data-format="email" data-notice="Введите email" placeholder="Введите email" required>
      </div>
    	<div class="form__group">
        <label class="after">Телефон</label>
        <input name="phone" type="text" value="{$phone|escape}" placeholder="Телефон" required>
      </div>
    	<legend class="cart-table__form-legend">Адрес</legend>
      <div class="form__group">
        <label>Адрес доставки</label>
        <input name="address" type="text" value="{$address|escape}" placeholder="Адрес доставки" />
      </div>
    	<legend class="cart-table__form-legend">Комментарий к&nbsp;заказу</legend>
      <div class="form__group">
        <label>Комментарий</label>
        <textarea class="cart-table__textarea" name="comment" id="order_comment" placeholder="Комментарий">{$comment|escape}</textarea>
      </div>
      <div class="container-flex container-flex--form form__group">
        <div class="captcha__container">  
          <label class="after" for="comment_captcha">Введите число</label>
            <div class="captcha">
              <img class="captcha__img" src="captcha/image.php?{math equation='rand(10,10000)'}" alt='captcha'/>
              <input class="captcha__input" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу" required>
            </div>  
          </div>
        <input type="submit" name="checkout" class="btn captcha__btn" value="Оформить заказ">
      </div>
    </div>
  </form>
  {else}
   <p class="cart__absent">В корзине нет товаров</p>
  {/if}
</div>

