<?php /* Smarty version 2.6.22, created on 2015-07-28 19:14:03
         compiled from 404.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['page']['info']): ?><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->_tpl_vars['page']['info']; ?>
</div><?php endif; ?>
<?php if ($this->_tpl_vars['page']['error']): ?><div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->_tpl_vars['page']['error']; ?>
</div><?php endif; ?>
<div class="alert alert-block">
	<h1>Ошибка 404</h1>
	<p class="lead">Страница не найдена</p>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>