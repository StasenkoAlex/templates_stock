{* Страница заказа *}
{$meta_title = "Ваш заказ №`$order->id`" scope=parent}
<div class="container-fluid container-fluid--grey">
<h1 class="order__title">Ваш заказ №{$order->id} 
{if $order->status == 0}принят{/if}
{if $order->status == 1}в обработке{elseif $order->status == 2}выполнен{/if}
{if $order->paid == 1}, оплачен{else}{/if}
</h1>

{* Список покупок *}
<table id="purchases" class="order__table">

{foreach $purchases as $purchase}
<tr class="order__table-row clearfix">
	{* Изображение товара *}
	<td class="order__table-image">
		{$image = $purchase->product->images|first}
		{if $image}
		<a href="products/{$purchase->product->url}"><img src="{$image->filename|resize:50:50}" alt="{$product->name|escape}"></a>
		{/if}
	</td>
	
	{* Название товара *}
	<td class="order__table-name">
		<a class="order__table-name-link" href="/products/{$purchase->product->url}">{$purchase->product_name|escape}</a>
		<span class="order__table-name-variant">{$purchase->variant_name|escape}</span>
		{if $order->paid && $purchase->variant->attachment}
			<a class="download_attachment" href="order/{$order->url}/{$purchase->variant->attachment}">скачать файл</a>
		{/if}
	</td>

	{* Цена за единицу *}
	<td class="order__table-price-equal">
		{($purchase->price)|convert}&nbsp;{$currency->sign}
	</td>

	{* Количество *}
	<td class="order__table-amount">
		&times; {$purchase->amount}&nbsp;{$settings->units}
	</td>

	{* Цена *}
	<td class="order__table-price">
		{($purchase->price*$purchase->amount)|convert}&nbsp;{$currency->sign}
	</td>
</tr>
{/foreach}
</table>

<div class="row">
	<div class="col-sm-6 offset-sm-6 col-md-5 offset-md-7 clearfix">
		<table class="order__total-price">
			{* Скидка, если есть *}
      {if $order->discount > 0}
	    <tr>
		    <td class="order__total-price-name">Дисконт</td>
		    <td class="order__total-price-data">{$order->discount}&nbsp;%</td>
	    </tr>
      {/if}
      {* Купон, если есть *}
      {if $order->coupon_discount > 0}
	    <tr>
		    <td class="order__total-price-name">Купон</td>
		    <td class="order__total-price-data">&minus;{$order->coupon_discount|convert}&nbsp;{$currency->sign}</td>
	    </tr>
	    {/if}
	    {* Если стоимость доставки входит в сумму заказа *}
      {if !$order->separate_delivery && $order->delivery_price>0}
      <tr>
     	  <td class="order__total-price-name">{$delivery->name|escape}</td>
		    <td class="order__total-price-data">{$order->delivery_price|convert}&nbsp;{$currency->sign}</td>
	    </tr>
	    {/if}
	    {* Итого *}
      <tr>
     	  <td class="order__total-price-name">Итого</td>
		    <td class="order__total-price-data">{$order->total_price|convert}&nbsp;{$currency->sign}</td>
	    </tr>
	    {* Если стоимость доставки не входит в сумму заказа *}
      {if $order->separate_delivery}
      <tr>
	      <td class="order__total-price-name">Итого</td>
		    <td class="order__total-price-data">{$order->delivery_price|convert}&nbsp;{$currency->sign}</td>
		  </tr>
      {/if}
    </table>
	</div>
</div>

{* Детали заказа *}
<h2 class="order__title order__title--min">Детали заказа</h2>
<table class="order__table-info">
	<tr>
		<td class="order__total-price-name">
			Дата заказа
		</td>
		<td class="order__total-price-data">
			{$order->date|date} в
			{$order->date|time}
		</td>
	</tr>
	{if $order->name}
	<tr>
		<td class="order__total-price-name">
			Имя
		</td>
		<td class="order__total-price-data">
			{$order->name|escape}
		</td>
	</tr>
	{/if}
	{if $order->email}
	<tr>
		<td class="order__total-price-name">
			Email
		</td>
		<td class="order__total-price-data">
			{$order->email|escape}
		</td>
	</tr>
	{/if}
	{if $order->phone}
	<tr>
		<td class="order__total-price-name">
			Телефон
		</td>
		<td class="order__total-price-data">
			{$order->phone|escape}
		</td>
	</tr>
	{/if}
	{if $order->address}
	<tr>
		<td class="order__total-price-name">
			Адрес доставки
		</td>
		<td class="order__total-price-data">
			{$order->address|escape}
		</td>
	</tr>
	{/if}
	{if $order->comment}
	<tr>
		<td class="order__total-price-name">
			Комментарий
		</td>
		<td class="order__total-price-data">
			{$order->comment|escape|nl2br}
		</td>
	</tr>
	{/if}
</table>


{if !$order->paid}
{* Выбор способа оплаты *}
{if $payment_methods && !$payment_method && $order->total_price>0}
<form method="post" class="order__paid-form">
	<legend class="order__paid__form-legend">Выберите способ оплаты</legend>
  <ul class="order__paid-list">
    {foreach $payment_methods as $payment_method}
    	<li class="order__paid-checkbox">
    		<input type=radio name=payment_method_id value='{$payment_method->id}' {if $payment_method@first}checked{/if} id=payment_{$payment_method->id}>			
		    <label class="order__paid-label" for=payment_{$payment_method->id}>	{$payment_method->name}, к оплате {$order->total_price|convert:$payment_method->currency_id}&nbsp;{$all_currencies[$payment_method->currency_id]->sign}</label>
			  <div class="order__paid-description">
			    {$payment_method->description}
			  </div>
    	</li>
    {/foreach}
</ul>
<input type='submit' class="btn order__paid-btn" value='Завершить оформление'>
</form>

	{* Выбраный способ оплаты *}
  {elseif $payment_method}
<div class="order__payment-method">
  <h3 class="order__payment-method-title">Способ оплаты &mdash; {$payment_method->name}</h3>
  <p>{$payment_method->description}</p>
  <h2 class="order__payment-method-title">
    К оплате {$order->total_price|convert:$payment_method->currency_id}&nbsp;{$all_currencies[$payment_method->currency_id]->sign}
  </h2>
  <form method=post>
	  <input class="btn" type=submit name='reset_payment_method' value='Выбрать другой способ оплаты'>
  </form>	
  <div class="order__payment-method-form">
  	{* Форма оплаты, генерируется модулем оплаты *}
    {checkout_form order_id=$order->id module=$payment_method->module}
  </div>
  {/if}
</div>
{/if}
</div>

 