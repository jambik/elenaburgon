<?php /* Smarty version 2.6.22, created on 2013-09-10 10:49:39
         compiled from settings.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['page']['error']): ?><div class="error"><?php echo $this->_tpl_vars['page']['error']; ?>
</div><?php endif; ?>
<?php if ($this->_tpl_vars['page']['info']): ?><div class="info"><?php echo $this->_tpl_vars['page']['info']; ?>
</div><?php endif; ?>

<fieldset style="margin:0 0 10px 0;">
	<legend>Настройки</legend>
	<form action="" method="post" name="form_settings" id="form_settings">
		<table style="width: 100%;">
			<tr>
				<td style="width: 80px;">Email</td>
				<td><input type="text" name="email_request" value="<?php echo $this->_tpl_vars['settings']['email_request']; ?>
" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit_settings" value="Сохранить" /></td>
			</tr>
		</table>
	</form>
</fieldset>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>