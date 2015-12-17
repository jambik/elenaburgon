<?php /* Smarty version 2.6.22, created on 2015-07-28 19:10:31
         compiled from page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'page.tpl', 13, false),array('modifier', 'truncate', 'page.tpl', 13, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['page']['info']): ?><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->_tpl_vars['page']['info']; ?>
</div><?php endif; ?>
<?php if ($this->_tpl_vars['page']['error']): ?><div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->_tpl_vars['page']['error']; ?>
</div><?php endif; ?>

<?php echo $this->_tpl_vars['page']['content']; ?>


<?php if ($this->_tpl_vars['page']['module'] == 1): ?>
	<?php if ($this->_tpl_vars['allarticles']): ?>
		<?php $_from = $this->_tpl_vars['allarticles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			<div class="well well-sm">
				<h4><?php echo $this->_tpl_vars['item']['article_title']; ?>
</h4>
				<p><small><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['article_text'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 500) : smarty_modifier_truncate($_tmp, 500)); ?>
</small></p>
				<a class="btn btn-primary btn-sm" href="<?php echo $this->_tpl_vars['page']['rootpath']; ?>
articles&amp;id=<?php echo $this->_tpl_vars['item']['article_id']; ?>
">Читать статью</a>
			</div>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['articleItem']): ?>
		<p>&larr; <a href="<?php echo $this->_tpl_vars['page']['rootpath']; ?>
articles">все статьи</a></p>
		<?php echo $this->_tpl_vars['articleItem']['article_text']; ?>

	<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['page']['module'] == 2): ?>
	<?php if ($this->_tpl_vars['selectedGallery']): ?>
		<p><a href="<?php echo $this->_tpl_vars['page']['rootpath']; ?>
photos">&larr; все галереи</a></p>
		<h2><?php echo $this->_tpl_vars['selectedGallery']['gallery_name']; ?>
</h2>
		<?php if ($this->_tpl_vars['photos']): ?>
			<?php $_from = $this->_tpl_vars['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['photo']):
?>
				<a href="<?php echo $this->_tpl_vars['photo']['image_path']; ?>
original/<?php echo $this->_tpl_vars['photo']['image']; ?>
" class="fancybox" rel="group1" title="<?php echo $this->_tpl_vars['photo']['photo_name']; ?>
"><img class="img-polaroid" style="margin: 0 10px 10px 0;" src="<?php echo $this->_tpl_vars['photo']['image_path']; ?>
<?php echo $this->_tpl_vars['photo']['image']; ?>
" alt="" /></a>
			<?php endforeach; endif; unset($_from); ?>
		<?php else: ?>
			- нет фото -
		<?php endif; ?>
	<?php else: ?>
		<?php $_from = $this->_tpl_vars['galleries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			<div class="well well-sm">
				<h4 class="lead"><?php echo $this->_tpl_vars['item']['gallery_name']; ?>
</h4>
				<?php if ($this->_tpl_vars['item']['photos']): ?>
					<?php $_from = $this->_tpl_vars['item']['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['photo']):
?>
						<img class="img-thumbnail" style="margin: 0 10px 10px 0; width: 80px; height: 80px;" src="<?php echo $this->_tpl_vars['photo']['image_path']; ?>
<?php echo $this->_tpl_vars['photo']['image']; ?>
" alt="" />
					<?php endforeach; endif; unset($_from); ?>
					<?php echo $this->_tpl_vars['item']['gallery_text']; ?>

					<p><a class="btn btn-primary btn-sm" href="<?php echo $this->_tpl_vars['page']['rootpath']; ?>
photos&amp;gallery=<?php echo $this->_tpl_vars['item']['gallery_id']; ?>
">Смотреть</a></p>
				<?php endif; ?>
			</div>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>