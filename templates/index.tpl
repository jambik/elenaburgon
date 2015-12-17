{include file="_header.tpl"}

{if $page.info}<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>{$page.info}</div>{/if}
{if $page.error}<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>{$page.error}</div>{/if}
{$page.content}

{include file="_footer.tpl"}