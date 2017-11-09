{* Шаблон текстовой страницы *}

{* Канонический адрес страницы *}
{$canonical="/{$page->url}" scope=parent}
<!-- Заголовок страницы -->
<h1 class="page__title" data-page="{$page->id}">{$page->header|escape}</h1>
<div class="container">
	<div class="user-text">
    <!-- Тело страницы -->
      {$page->body}
  </div>
</div>

