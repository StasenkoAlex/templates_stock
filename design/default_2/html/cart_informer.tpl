{* Информера корзины (отдаётся аяксом) *}

{if $cart->total_products>0}
	<a href="./cart/" class="cart">
	  {include file="svg.tpl" svgId="ic_cart" width="26px" height="26px"}
		<span class="cart__total">{$cart->total_products}</span>
		<span class="cart__price">
		{$cart->total_price|convert} {$currency->sign|escape}
	  </span>
	</a>
{else}
<span class="cart">
	  {include file="svg.tpl" svgId="ic_cart" width="26px" height="26px"}
		<span class="cart__total">{$cart->total_products}</span>
		<span class="cart__price">
		{$cart->total_price|convert} {$currency->sign|escape}
	  </span>
	</span>	
{/if}
