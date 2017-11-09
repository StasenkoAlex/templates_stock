{* Информера корзины (отдаётся аяксом) *}

{if $cart->total_products>0}
	<a href="./cart/" class="cart">
	  {include file="svg.tpl" svgId="ic_cart" fill="#ffffff"}
		<span class="cart__total">{$cart->total_products} </span>
	</a>
	<span class="cart__price">
		{$cart->total_price|convert} {$currency->sign|escape}
	</span>
{/if}
