<?php /* Smarty version 2.6.22, created on 2015-07-28 19:09:20
         compiled from _header.tpl */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo $this->_tpl_vars['page']['description']; ?>
" />
		<meta name="keywords" content="<?php echo $this->_tpl_vars['page']['keywords']; ?>
" />
		<?php echo $this->_tpl_vars['page']['meta']; ?>

		<link rel="shortcut icon" href="favicon.ico" />
		<link href="<?php echo $this->_tpl_vars['page']['tplpath']; ?>
css/bootstrap.min.css" type="text/css" rel="stylesheet" />
		<link href="<?php echo $this->_tpl_vars['page']['tplpath']; ?>
css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" />
		<link href="<?php echo $this->_tpl_vars['page']['tplpath']; ?>
css/global.css" type="text/css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['page']['tplpath']; ?>
js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['page']['tplpath']; ?>
js/functions.js"></script>
		<title><?php echo $this->_tpl_vars['page']['title']; ?>
</title>
	</head>
	<body onload="<?php echo $this->_tpl_vars['page']['onload']; ?>
"><a name="top"></a>
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
							<?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
								<li><a href="<?php echo $this->_tpl_vars['page']['rootpath']; ?>
<?php if ($this->_tpl_vars['item']['page_id'] == 1): ?><?php else: ?><?php echo $this->_tpl_vars['item']['page_alias']; ?>
<?php endif; ?>"<?php if (( ! $_GET['alias'] && $this->_tpl_vars['item']['page_id'] == 1 ) || $this->_tpl_vars['page']['id'] == $this->_tpl_vars['item']['page_id']): ?> class="active"<?php endif; ?>><?php echo $this->_tpl_vars['item']['page_name']; ?>
</a></li>
							<?php endforeach; endif; unset($_from); ?>
						</ul>
					</nav>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-9 content">					