{include file="_header.tpl"}

{if $page.info}<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>{$page.info}</div>{/if}
{if $page.error}<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>{$page.error}</div>{/if}

{$page.content}

{if $page.module == 1}
	{if $allarticles}
		{foreach from=$allarticles key=key item=item}
			<div class="well well-sm">
				<h4>{$item.article_title}</h4>
				<p><small>{$item.article_text|strip_tags|truncate:500}</small></p>
				<a class="btn btn-primary btn-sm" href="{$page.rootpath}articles&amp;id={$item.article_id}">Читать статью</a>
			</div>
		{/foreach}
	{/if}
	{if $articleItem}
		<p>&larr; <a href="{$page.rootpath}articles">все статьи</a></p>
		{$articleItem.article_text}
	{/if}
{/if}

{if $page.module == 2}
	{if $selectedGallery}
		<p><a href="{$page.rootpath}photos">&larr; все галереи</a></p>
		<h2>{$selectedGallery.gallery_name}</h2>
		{if $photos}
			{foreach from=$photos item=photo}
				<a href="{$photo.image_path}original/{$photo.image}" class="fancybox" rel="group1" title="{$photo.photo_name}"><img class="img-polaroid" style="margin: 0 10px 10px 0;" src="{$photo.image_path}{$photo.image}" alt="" /></a>
			{/foreach}
		{else}
			- нет фото -
		{/if}
	{else}
		{foreach from=$galleries item=item}
			<div class="well well-sm">
				<h4 class="lead">{$item.gallery_name}</h4>
				{if $item.photos}
					{foreach from=$item.photos item=photo}
						<img class="img-thumbnail" style="margin: 0 10px 10px 0; width: 80px; height: 80px;" src="{$photo.image_path}{$photo.image}" alt="" />
					{/foreach}
					{$item.gallery_text}
					<p><a class="btn btn-primary btn-sm" href="{$page.rootpath}photos&amp;gallery={$item.gallery_id}">Смотреть</a></p>
				{/if}
			</div>
		{/foreach}
	{/if}
{/if}

{include file="_footer.tpl"}