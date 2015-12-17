<?php /* Smarty version 2.6.22, created on 2015-07-28 19:10:54
         compiled from message.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'message.tpl', 1, false),)), $this); ?>
Дата сообщения: <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
 
 
<?php if ($this->_tpl_vars['post']['name']): ?>Имя: <?php echo $this->_tpl_vars['post']['name']; ?>
<?php endif; ?> 
<?php if ($this->_tpl_vars['post']['phone']): ?>Телефон: <?php echo $this->_tpl_vars['post']['phone']; ?>
<?php endif; ?> 
<?php if ($this->_tpl_vars['post']['email']): ?>Email: <?php echo $this->_tpl_vars['post']['email']; ?>
<?php endif; ?> 
	
<?php if ($this->_tpl_vars['post']['message']): ?>Сообщение: <?php echo $this->_tpl_vars['post']['message']; ?>
<?php endif; ?> 