{include file="_header.tpl"}

{if $page.info}<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>{$page.info}</div>{/if}
{if $page.error}<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>{$page.error}</div>{/if}
<div class="alert alert-block">
	<h1>Ошибка 404</h1>
	<p class="lead">Страница не найдена</p>
</div>

{include file="_footer.tpl"}