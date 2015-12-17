<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="{$page.description}" />
		<meta name="keywords" content="{$page.keywords}" />
		{$page.meta}
		<link rel="shortcut icon" href="favicon.ico" />
		<link href="{$page.tplpath}css/bootstrap.min.css" type="text/css" rel="stylesheet" />
		<link href="{$page.tplpath}css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" />
		<link href="{$page.tplpath}css/global.css" type="text/css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="{$page.tplpath}js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{$page.tplpath}js/functions.js"></script>
		<title>{$page.title}</title>
	</head>
	<body onload="{$page.onload}"><a name="top"></a>
		<header class="container">
			<div class="text-center brand">
				ElenaBurgon
			</div>
		</header>
		
		<div class="container">
			<div class="text-center subbrand">
				школа кройки и шитья
			</div>
		</div>
		
		<div class="container page">
			<div class="row">
				<div class="col-lg-2 col-md-2">
					
				</div>
				<div class="col-lg-2 col-md-2 col-sm-3">
					<nav>
						<ul>
							{foreach from=$menu item=item}
								<li><a href="{$page.rootpath}{if $item.page_id == 1}{else}{$item.page_alias}{/if}"{if (!$smarty.get.alias && $item.page_id == 1) || $page.id == $item.page_id} class="active"{/if}>{$item.page_name}</a></li>
							{/foreach}
						</ul>
					</nav>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-9 content">					