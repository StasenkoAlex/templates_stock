{* Постраничный вывод *}
{strip}
{if $total_pages_num>1}

<div class="pagination">
	
	{* Количество выводимых ссылок на страницы *}
	{$visible_pages = 5}

	{* По умолчанию начинаем вывод со страницы 1 *}
	{$page_from = 1}
	
	{* Если выбранная пользователем страница дальше середины "окна" - начинаем вывод уже не с первой *}
	{if $current_page_num > floor($visible_pages/2)}
		{$page_from = max(1, $current_page_num-floor($visible_pages/2)-1)}
	{/if}	
	
	{* Если выбранная пользователем страница близка к концу навигации - начинаем с "конца-окно" *}
	{if $current_page_num > $total_pages_num-ceil($visible_pages/2)}
		{$page_from = max(1, $total_pages_num-$visible_pages-1)}
	{/if}
	
	{* До какой страницы выводить - выводим всё окно, но не более ощего количества страниц *}
	{$page_to = min($page_from+$visible_pages, $total_pages_num-1)}
	
	{if $current_page_num==2}
		<a class="pagination__control" href="{url page=null}">{include file="svg.tpl" svgId="ic_arrow_left" width="35px" height="35px"}</a>
	{elseif $current_page_num>2}
		<a class="pagination__control" href="{url page=$current_page_num-1}">{include file="svg.tpl" svgId="ic_arrow_left" width="35px" height="35px"}</a>
	{else}
		<span class="pagination__control pagination__control--disabled">{include file="svg.tpl" svgId="ic_arrow_left" width="35px" height="35px"}</span>
	{/if}

	{* Ссылка на 1 страницу отображается всегда *}
	<a class="pagination__link{if $current_page_num==1} pagination__link--current{/if}" href="{url page=null}">1</a>
	
	{* Выводим страницы нашего "окна" *}	
	{section name=pages loop=$page_to start=$page_from}
		{* Номер текущей выводимой страницы *}	
		{$p = $smarty.section.pages.index+1}	
		{* Для крайних страниц "окна" выводим троеточие, если окно не возле границы навигации *}	
		{if ($p == $page_from+1 && $p!=2) || ($p == $page_to && $p != $total_pages_num-1)}	
		<a class="pagination__link{if $p==$current_page_num} pagination__link--current{/if}" href="{url page=$p}">...</a>
		{else}
		<a class="pagination__link{if $p==$current_page_num} pagination__link--current{/if}" href="{url page=$p}">{$p}</a>
		{/if}
	{/section}

	{* Ссылка на последнююю страницу отображается всегда *}
	<a class="pagination__link{if $current_page_num==$total_pages_num} pagination__link--current{/if}"  href="{url page=$total_pages_num}">{$total_pages_num}</a>

	{if $current_page_num<$total_pages_num}
		<a class="pagination__control" href="{url page=$current_page_num+1}">{include file="svg.tpl" svgId="ic_arrow_right" width="35px" height="35px"}</a>
	{else}
		<span class="pagination__control pagination__control--disabled">{include file="svg.tpl" svgId="ic_arrow_right" width="35px" height="35px"}</span>
	{/if}
	
</div>

{/if}
{/strip}