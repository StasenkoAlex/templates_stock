{* Информера избранного (отдаётся аяксом) *}
{if $wished_products|count>0}
  <a class="wishlist__link" href="./wishlist/">	
  {include file="svg.tpl" svgId="ic_favorite"} 
  <span class="wishlist__link-counter">{$wished_products|count}</span>
  </a>
{else}
  <span>{include file="svg.tpl" svgId="ic_favorite"}</span>
{/if}
