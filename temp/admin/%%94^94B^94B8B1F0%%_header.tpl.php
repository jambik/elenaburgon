<?php /* Smarty version 2.6.22, created on 2013-09-10 10:49:34
         compiled from _header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="<?php echo $this->_tpl_vars['page']['admpath']; ?>
css/admin.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo $this->_tpl_vars['page']['admpath']; ?>
css/print.css" type="text/css" rel="stylesheet" media="print" />
  <?php echo $this->_tpl_vars['page']['meta']; ?>

	<title><?php echo $this->_tpl_vars['page']['title']; ?>
</title>
</head>
<body onload="<?php echo $this->_tpl_vars['page']['onload']; ?>
"><a name="top"></a>
<?php if ($_SESSION['admin']): ?>
<table cellpadding="0" cellspacing="0" style="width:100%; margin:0 0 10px 0;" class="noprint">
	<tr>
		<td style="width:33%; text-align:left"><a href="<?php echo $this->_tpl_vars['page']['rootpath']; ?>
" target="_blank">Сайт</a> <img src="<?php echo $this->_tpl_vars['page']['admpath']; ?>
img/newwindow.png" alt="" /></td>
		<td style="width:33%; text-align:center;"><div class="admin-caption">Администрирование</div></td>
		<td style="width:33%; text-align:right;">
			<?php if ($_SESSION['admin']): ?>
				<img src="<?php echo $this->_tpl_vars['page']['admpath']; ?>
img/adminicon.gif" alt="" style="vertical-align:middle;" /> <?php echo $_SESSION['admin']['admin_name']; ?>
 | 
				<a class="logoff" href="login.php?action=logoff">Выход <img src="<?php echo $this->_tpl_vars['page']['admpath']; ?>
img/logoff.gif" alt="" style="vertical-align:middle; border:0px;" /></a> 
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td colspan="3"><div class="top-hr"></div></td>
	</tr>
</table>
<?php endif; ?>
<table cellpadding="0" cellspacing="3" class="admin-table">
	<tr>
		<?php if (! $this->_tpl_vars['hideMenu']): ?>
		<td class="admin-menu noprint">
			<div class="menu-item"><a href="<?php echo $this->_tpl_vars['page']['admpath']; ?>
pages.php"><img src="<?php echo $this->_tpl_vars['page']['admpath']; ?>
img/pages.png" alt="" /> Страницы</a></div>
			<div class="menu-hr"></div>
			<div class="menu-item"><a href="<?php echo $this->_tpl_vars['page']['admpath']; ?>
articles.php"><img src="<?php echo $this->_tpl_vars['page']['admpath']; ?>
img/news.png" alt="" /> Статьи</a></div>
			<div class="menu-item"><a href="<?php echo $this->_tpl_vars['page']['admpath']; ?>
gallery.php"><img src="<?php echo $this->_tpl_vars['page']['admpath']; ?>
img/news.png" alt="" /> Фотогалерея</a></div>
			<div class="menu-hr"></div>
			<?php if ($_SESSION['admin']['admin_group'] == 1): ?>
				<div class="menu-item"><a href="<?php echo $this->_tpl_vars['page']['admpath']; ?>
settings.php"><img src="<?php echo $this->_tpl_vars['page']['admpath']; ?>
img/bullet_wrench.png" alt="" /> Настройки</a></div>
				<div class="menu-item"><a href="<?php echo $this->_tpl_vars['page']['admpath']; ?>
log.php"><img src="<?php echo $this->_tpl_vars['page']['admpath']; ?>
img/log.png" alt="" /> Лог</a></div>
				<div class="menu-item"><a href="<?php echo $this->_tpl_vars['page']['admpath']; ?>
admins.php"><img src="<?php echo $this->_tpl_vars['page']['admpath']; ?>
img/user.png" alt="" /> Администраторы</a></div>
			<?php endif; ?>
		</td>
		<?php endif; ?>
		<td style="vertical-align:top;" class="admin-content">